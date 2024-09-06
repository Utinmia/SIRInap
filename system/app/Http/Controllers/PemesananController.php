<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{

    public function index()
    {
        $data['list_kamar'] = Kamar::All();
        $data['list_pesanan'] = Reservasi::where('id_pelanggan', session('user')->id)->get();
        return view('web.riwayatPesanan', $data);
    }

    public function formPesanan()
    {
        // $data['list_kamar'] = Kamar::where('status', 'Tersedia')->whereNotIn('id_kamar', [999])->get();
        $list_kamar = $data['list_kamar'] = Kamar::whereNotIn('id_kamar', [999])
            ->whereDoesntHave('reservasis', function ($query) {
                $query->whereIn('status', ['Booked', 'Verified', 'Confirmed', 'Checked-in']);
            })->get();

        $kamar = $data['kamar'] = Kamar::whereNotIn('id_kamar', [999])
            ->whereDoesntHave('reservasis', function ($query) {
                $query->where('status', 'Verified');
            })->get();

        // $data['list_pesanan'] = Reservasi::where('id_pelanggan', session('user')->id)->where('status', 'Booked')->get();
        $list_pesanan = $data['list_pesanan'] = Reservasi::where('id_pelanggan', session('user')->id)
            ->whereIn('status', ['Booked', 'Verified'])
            ->whereDoesntHave('pembayarans')
            ->get();

        $data['hasPenginapan'] = $kamar->first()->penginapan->nama ?? null;

        // $data['hasPenginapan'] = Penginapan::whereIn('id_penginapan', $penginapanIds)
        //     ->pluck('nama', 'id_penginapan');

        $data['hasBooked'] = $list_pesanan->contains('status', 'Booked');

        return view('web.formPesanan', $data);
    }

    public function cekTersedia(Request $request)
    {
        $checkin = Carbon::parse($request->checkin);
        $checkout = Carbon::parse($request->checkout);

        // Ambil kamar yang tidak ada di dalam reservasi antara checkin dan checkout
        $availableKamars = Kamar::whereNotIn('id_kamar', [999])
            ->whereDoesntHave('reservasis', function ($query) use ($checkin, $checkout) {
                $query->where(function ($q) use ($checkin, $checkout) {
                    $q->whereBetween('tanggal_check_in', [$checkin, $checkout])
                        ->orWhereBetween('tanggal_check_out', [$checkin, $checkout])
                        ->orWhere(function ($query) use ($checkin, $checkout) {
                            $query->where('tanggal_check_in', '<=', $checkin)
                                ->where('tanggal_check_out', '>=', $checkout);
                        });
                });
            })->with('penginapan')->get();

        return response()->json(['kamars' => $availableKamars]);
    }


    // Create Reservation
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'checkin' => 'required|date',
            'checkout' => 'required|date|after:checkin',
        ], [
            'checkin.required' => 'Pilih tanggal checkin',
            'checkout.required' => 'Pilih tanggal checkout',
        ]);
        // dd($request->checkin);

        $id = Auth::guard('web')->user()->id;
        $selectedPenginapanId = Kamar::where('id_kamar', $request->id_kamars)->pluck('id_penginapan')->first();

        $unpaidReservation = Reservasi::whereHas('kamars', function ($query) use ($selectedPenginapanId) {
            $query->where('id_penginapan', '!=', $selectedPenginapanId);
        })->where('id_pelanggan', $id)
            ->whereIn('status', ['Booked', 'Verified'])
            ->exists();

        if ($unpaidReservation) {
            return redirect()->back()->with('error', 'Anda tidak bisa melakukan reservasi di penginapan lain sebelum melakukan pembayaran pada reservasi sebelumnya.');
        }

        $totalBiaya = $this->calculateTotalCost($request->id_kamars, $request->checkin, $request->checkout);

        $reservasi = Reservasi::create([
            'id_pelanggan' => auth()->user()->id,
            'tanggal_check_in' => $request->checkin,
            'tanggal_check_out' => $request->checkout,
            'total_biaya' => $totalBiaya,
            'status' => 'Booked',
        ]);

        if ($reservasi->kamars()->sync($request->id_kamars)) {
            // foreach ($request->id_kamars as $id_kamar) {
            $kamar = Kamar::find($request->id_kamars);
            if ($kamar) {
                $kamar->status = 'Dipesan';
                $kamar->save();
            }
            // }
            return redirect('/form-pesanan')->with('success', 'Pemesanan berhasil dilakukan!');
        } else {
            dd('gagal');
        }
    }

    public function delete($id)
    {
        $kamarIds = DB::table('tb_reservasi_kamar')
            ->where('reservasi_id', $id)
            ->pluck('kamar_id');

        $query = Kamar::whereIn('id_kamar', $kamarIds)->update(['status' => 'Tersedia']);

        if ($query) {
            $pesanan = Reservasi::find($id);
            $pesanan->delete();
            return redirect('/form-pesanan')->with('success', 'Data berhasil dihapus!');
        } else {
            dd($kamarIds);
        }
        // return redirect('/form-pesanan')->with('error', 'Pesanan gagal dihapus.');

        // Redirect atau kembalikan respons sesuai kebutuhan
    }

    private function calculateTotalCost($id_kamars, $check_in, $check_out)
    {
        // Implementasi logika perhitungan total biaya berdasarkan kamar dan tanggal check-in/check-out
        $totalBiaya = 0;
        $checkInDate = new \DateTime($check_in);
        $checkOutDate = new \DateTime($check_out);
        $days = $checkOutDate->diff($checkInDate)->days;

        // foreach ($id_kamars as $kamarId) {
        $kamar = Kamar::find($id_kamars);
        // if ($kamar) {
        $totalBiaya += $kamar->harga * $days;
        // }
        // }

        return $totalBiaya;
    }
}
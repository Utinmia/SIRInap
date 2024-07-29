<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $data['list_kamar'] = Kamar::where('status', 'Tersedia')->get();
        // $data['list_pesanan'] = Reservasi::where('id_pelanggan', session('user')->id)->where('status', 'Booked')->get();
        $data['list_pesanan'] = Reservasi::where('id_pelanggan', session('user')->id)
            ->where('status', 'Booked')
            ->whereDoesntHave('pembayarans')
            ->get();

        return view('web.formPesanan', $data);
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

        $totalBiaya = $this->calculateTotalCost($request->id_kamars, $request->checkin, $request->checkout);

        $reservasi = Reservasi::create([
            'id_pelanggan' => auth()->user()->id,
            'tanggal_check_in' => $request->checkin,
            'tanggal_check_out' => $request->checkout,
            'total_biaya' => $totalBiaya,
            'status' => 'Booked',
        ]);

        if ($reservasi->kamars()->sync($request->id_kamars)) {
            return redirect('/form-pesanan')->with('success', 'Pemesanan berhasil dilakukan!');
        } else {
            dd('gagal');
        }
    }

    public function delete($id)
    {
        // Lakukan logika penghapusan berdasarkan $id
        $pesanan = Reservasi::find($id);
        // dd($id);

        // Lakukan proses penghapusan (contoh)
        if ($pesanan->delete()) {
            return redirect('/form-pesanan')->with('success', 'Pemesanan berhasil dilakukan!');
        }
        return redirect('/form-pesanan')->with('error', 'Pesanan gagal dihapus.');

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

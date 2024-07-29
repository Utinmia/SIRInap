<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use App\Models\Layanan;
use App\Models\Reservasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ReservasiController extends Controller
{
    public function index()
    {
        $data['list_reservasi'] = Reservasi::all();
        $data['list_pelanggan'] = User::all();
        $data['list_kamar'] = Kamar::whereNotIn('id_kamar', [999])->get();
        // $data['list_layanan'] = Layanan::all();
        return view('admin.reservasi.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required|integer|exists:users,id',
            // 'id_kamars' => 'required|array',
            // 'id_kamars.*' => 'integer|exists:tb_kamar,id_kamar',
            'id_kamars' => 'required|integer|exists:tb_kamar,id_kamar',
            'tanggal_check_in' => 'required|date',
            'tanggal_check_out' => 'required|date|after:tanggal_check_in',
            'status' => 'required|string',
        ]);

        $totalBiaya = $this->calculateTotalCost($request->id_kamars, $request->tanggal_check_in, $request->tanggal_check_out);

        $reservasi = Reservasi::create([
            'id_pelanggan' => $request->id_pelanggan,
            'tanggal_check_in' => $request->tanggal_check_in,
            'tanggal_check_out' => $request->tanggal_check_out,
            'total_biaya' => $totalBiaya,
            'status' => $request->status,
        ]);

        if ($reservasi->kamars()->sync($request->id_kamars)) {
            return redirect('administrator/reservasi')->with('success', 'Data reservasi berhasil disimpan.');
        } else {
            dd('gagal');
        }

    }

    // private function calculateTotalCost($id_kamars, $check_in, $check_out)
    // {
    //     // Implementasi logika perhitungan total biaya berdasarkan kamar dan tanggal check-in/check-out
    //     $totalBiaya = 0;
    //     $checkInDate = new \DateTime($check_in);
    //     $checkOutDate = new \DateTime($check_out);
    //     $days = $checkOutDate->diff($checkInDate)->days;

    //     foreach ($id_kamars as $kamarId) {
    //         $kamar = Kamar::find($kamarId);
    //         if ($kamar) {
    //             $totalBiaya += $kamar->harga * $days;
    //         }
    //     }

    //     return $totalBiaya;
    // }

    private function calculateTotalCost($id_kamars, $check_in, $check_out)
    {
        $totalBiaya = 0;
        $checkInDate = new \DateTime($check_in);
        $checkOutDate = new \DateTime($check_out);
        $days = $checkOutDate->diff($checkInDate)->days;

        $kamar = Kamar::find($id_kamars);
        $totalBiaya += $kamar->harga * $days;

        return $totalBiaya;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // 'id_pelanggan' => 'required|integer',
            // 'id_kamar' => 'required|integer',
            'tanggal_check_in' => 'required|date',
            'tanggal_check_out' => 'required|date|after:tanggal_check_in',
            'status' => 'required|string',
        ]);

        $query = Reservasi::findOrFail($id);
        // $query->id_pelanggan = $request->id_pelanggan;
        // $query->id_kamar = $request->id_kamar;
        $query->tanggal_check_in = $request->tanggal_check_in;
        $query->tanggal_check_out = $request->tanggal_check_out;
        $query->status = $request->status;

        if ($query->save()) {
            if ($request->status == 'Checked-out') {
                $kamarIds = DB::table('tb_reservasi_kamar')
                    ->where('reservasi_id', $query->id_reservasi)
                    ->pluck('kamar_id');

                // Update status kamar menjadi "Tersedia"
                Kamar::whereIn('id_kamar', $kamarIds)->update(['status' => 'Tersedia']);
                return redirect('administrator/reservasi')->with('success', 'Data reservasi berhasil diubah.');
            }else{
                return redirect('administrator/reservasi')->with('success', 'Data reservasi berhasil diubah.');
            }
        }

    }

    public function destroy($id)
    {
        $admin = Reservasi::findOrFail($id);
        $admin->delete();

        return redirect('administrator/reservasi')->with('success', 'Data reservasi berhasil dihapus.');
    }
}

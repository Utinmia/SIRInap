<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Reservasi;

class KonfirmasiController extends Controller
{
    public function store(Request $request)
    {
        $list_reservasi = Reservasi::where('id_pelanggan', session('user')->id)->where('status', 'Booked')->get();
        $totalHarga = $list_reservasi->sum('total_biaya');

        $validated = $request->validate([
            'bukti_bayar' => 'required|file|mimes:jpeg,jpg,png,pdf|max:10000',
        ]);

        // Menghasilkan nama unik untuk file bukti_bayar
        $namaFile = uniqid() . '.' . $request->bukti_bayar->getClientOriginalExtension();

        // Simpan bukti_bayar ke storage dengan nama unik
        $buktiBayarPath = $request->file('bukti_bayar')->storeAs('bukti', $namaFile, 'public');

        foreach ($list_reservasi as $reservasi) {
            Pembayaran::create([
                'id_reservasi' => $reservasi->id_reservasi,
                'jumlah' => $totalHarga, 
                'metode_bayar' => 'Transfer Bank', 
                'tgl_bayar' => now(), 
                'bukti_bayar' => $buktiBayarPath,
                'status' => 'Pending',
            ]);
        }
        
        return redirect('riwayat-pemesanan')->with('success', 'Pembayaran berhasil ditambahkan.');
    }
}

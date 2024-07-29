<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use App\Models\Pembayaran;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $data['list_pembayaran'] = Pembayaran::all();
        $data['list_reservasi'] = Reservasi::all();
        return view('admin.pembayaran.index', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_reservasi' => 'required|integer',
            'jumlah' => 'required|numeric|min:0',
            'metode_bayar' => 'required|string',
            'tgl_bayar' => 'required|date',
            'bukti_bayar' => 'required|file|mimes:jpeg,jpg,png,pdf|max:10000',
            'status' => 'required|string',
        ]);

        $namaFile = uniqid() . '.' . $request->bukti_bayar->getClientOriginalExtension();

        // Simpan bukti_bayar ke storage dengan nama unik
        $buktiBayarPath = $request->file('bukti_bayar')->storeAs('bukti', $namaFile, 'public');

        Pembayaran::create([
            'id_reservasi' => $request->id_reservasi,
            'jumlah' => $request->jumlah,
            'metode_bayar' => $request->metode_bayar,
            'tgl_bayar' => $request->tgl_bayar,
            'bukti_bayar' => $buktiBayarPath,
            'status' => $request->status,
        ]);

        // $query = Reservasi::findOrFail($request->id_reservasi);
        // $query->status = $request->status;
        
        return redirect('administrator/pembayaran')->with('success', 'Data pembayaran berhasil disimpan.');
        

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_reservasi' => 'required|integer',
            'jumlah' => 'required|numeric|min:0',
            'metode_bayar' => 'required|string',
            'tgl_bayar' => 'required|date',
            'status' => 'required|string',
        ]);

        $query = Pembayaran::findOrFail($id);
        $query->id_reservasi = $request->id_reservasi;
        $query->jumlah = $request->jumlah;
        $query->metode_bayar = $request->metode_bayar;
        $query->tgl_bayar = $request->tgl_bayar;
        $query->status = $request->status;

        if ($query->save()) {
            if ($request->status == 'Success') {
                $queryStatus = Reservasi::findOrFail($request->id_reservasi);
                $queryStatus->status = 'Confirmed';

                if ($queryStatus->save()) {
                    $kamarList = $queryStatus->kamars;
                    foreach ($kamarList as $kamar) {
                        $kamar->status = 'Dipesan';

                        if (!$kamar->save()) {
                            dd('gagal ubah status');
                        }
                    }
                    return redirect('administrator/pembayaran')->with('success', 'Data pembayaran berhasil diubah.');
                } else {
                    dd('gagal update status reservasi');
                }
            } elseif ($request->status == 'Failed') {

                $queryStatus = Reservasi::findOrFail($request->id_reservasi);
                $queryStatus->status = 'Canceled';

                if ($queryStatus->save()) {
                    $kamarList = $queryStatus->kamars;
                    foreach ($kamarList as $kamar) {
                        $kamar->status = 'Tersedia';

                        if (!$kamar->save()) {
                            dd('gagal ubah status');
                        }
                    }
                    return redirect('administrator/pembayaran')->with('success', 'Data pembayaran berhasil diubah.');
                } else {
                    dd('gagal update status reservasi');
                }
            } else {
                return redirect('administrator/pembayaran')->with('success', 'Data pembayaran berhasil diubah.');
                // dd('gagal update pembayaran');
            }
        } else {
            dd('gagal update pembayaran');
        }
    }

    public function destroy($id)
    {
        $admin = Pembayaran::findOrFail($id);
        $admin->delete();

        return redirect('administrator/pembayaran')->with('success', 'Data pembayaran berhasil dihapus.');
    }
}

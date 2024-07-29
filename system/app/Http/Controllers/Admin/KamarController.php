<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $data['list_kamar'] = Kamar::whereNotIn('id_kamar', [999])->get();

        return view('admin.kamar.index', $data);
    }

    public function store(Request $request)
    {
        // Log::info('Store method called.');
        // Log::info($request->all());
        $request->validate([
            'nomor_kamar' => 'required|string|max:10',
            'tipe_kamar' => 'required|string|max:50',
            'harga' => 'required|numeric|min:0',
            'status' => 'required|string|max:20',
        ]);
        
        Kamar::create([
            'nomor_kamar' => $request->nomor_kamar,
            'tipe_kamar' => $request->tipe_kamar,
            'harga' => $request->harga,
            'status' => $request->status,
        ]);

        return redirect('administrator/kamar')->with('success', 'Data kamar berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_kamar' => 'required|string|max:10',
            'tipe_kamar' => 'required|string|max:50',
            'harga' => 'required|numeric|min:0',
            'status' => 'required|string|max:20',
        ]);

        $query = Kamar::findOrFail($id);
        $query->nomor_kamar = $request->nomor_kamar;
        $query->tipe_kamar = $request->tipe_kamar;
        $query->harga = $request->harga;
        $query->status = $request->status;
        $query->save();

        return redirect('administrator/kamar')->with('success', 'Data kamar berhasil diubah.');
    }

    public function destroy($id)
    {
        $admin = Kamar::findOrFail($id);
        $admin->delete();

        return redirect('administrator/kamar')->with('success', 'Data kamar berhasil dihapus.');
    }
}

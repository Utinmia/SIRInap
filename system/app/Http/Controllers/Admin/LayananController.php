<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $data['list_layanan'] = Layanan::all();
        return view('admin.layanan.index', $data);
    }

    public function store(Request $request)
    {
        // Log::info('Store method called.');
        // Log::info($request->all());
        $request->validate([
            'nama_layanan' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
        ]);
        
        Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
        ]);

        return redirect('administrator/layanan')->with('success', 'Data layanan berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_layanan' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
        ]);

        $query = Layanan::findOrFail($id);
        $query->nama_layanan = $request->nama_layanan;
        $query->deskripsi = $request->deskripsi;
        $query->harga = $request->harga;
        $query->save();

        return redirect('administrator/layanan')->with('success', 'Data layanan berhasil diubah.');
    }

    public function destroy($id)
    {
        $admin = Layanan::findOrFail($id);
        $admin->delete();

        return redirect('administrator/layanan')->with('success', 'Data layanan berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Kamar;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class GaleriController extends Controller
{
    public function index()
    {
        $data['list_galeri'] = Galeri::all();
        $data['list_kamar'] = Kamar::whereNotIn('id_kamar', [999])->get();
        return view('admin.galeri.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kamar' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:10000',
            'deskripsi_gambar' => 'nullable|string',
        ]);

        // Menghasilkan nama unik untuk file gambar
        $namaFile = uniqid() . '.' . $request->gambar->getClientOriginalExtension();

        // Simpan gambar ke storage dengan nama unik
        $gambarPath = $request->file('gambar')->storeAs('galeri', $namaFile, 'public');

        Galeri::create([
            'id_kamar' => $request->id_kamar,
            'url_gambar' => $gambarPath,
            'deskripsi_gambar' => $request->deskripsi_gambar,
        ]);

        return redirect('administrator/galeri')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kamar' => 'required|integer',
            'deskripsi_gambar' => 'nullable|string',
        ]);

        $galeri = Galeri::findOrFail($id);

        // Jika ada gambar yang diunggah, proses gambar baru
        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Hapus gambar lama dari storage
            Storage::disk('public')->delete($galeri->url_gambar);

            // Menghasilkan nama unik untuk file gambar baru
            $namaFile = uniqid() . '.' . $request->gambar->getClientOriginalExtension();

            // Simpan gambar baru ke storage dengan nama yang dihasilkan secara acak
            $gambarPath = $request->file('gambar')->storeAs('galeri', $namaFile, 'public');

            // Update path gambar di database
            $galeri->url_gambar = $gambarPath;
        }

        // Update data kamar dan deskripsi gambar (jika ada perubahan)
        $galeri->id_kamar = $request->id_kamar;
        $galeri->deskripsi_gambar = $request->deskripsi_gambar;
        $galeri->save();


        return redirect('administrator/galeri')->with('success', 'Gambar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // Hapus gambar dari storage
        Storage::disk('public')->delete($galeri->url_gambar);

        $galeri->delete();

        return redirect('administrator/galeri')->with('success', 'Gambar berhasil dihapus.');
    }
}

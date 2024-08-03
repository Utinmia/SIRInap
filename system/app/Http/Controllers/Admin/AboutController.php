<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    //
    public function index()
    {
        $data['list_about'] = About::all();
        return view('admin.about.index', $data);
    } 

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'kelas' => 'required|string',
        ]);

       
        About::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
        ]);

        return redirect('administrator/about')->with('success', 'nama berhasil ditambahkan.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'kelas' => 'required|string',
        ]);

        $about = About::findOrFail($id);
        $about->nama = $request->nama;
        $about->kelas = $request->kelas;
        $about->save();


        return redirect('administrator/about')->with('success', 'Nama berhasil diubah.');
    }
    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->delete();

        return redirect('administrator/about')->with('success', 'nama berhasil dihapus.');
    }
}

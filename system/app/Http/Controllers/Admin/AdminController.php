<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        $data['list_admin'] = Admin::all();
        return view('admin.users.administrator.index', $data);
    }

    public function store(Request $request)
    {
        Log::info('Store method called.');
        Log::info($request->all());
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:3|confirmed',
            'role' => 'required|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        Admin::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return redirect('administrator/admin')->with('success', 'Data admin berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $id,
            'password' => 'nullable|string|min:3|confirmed',
            'role' => 'required|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->nama = $request->nama;
        $admin->email = $request->email;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->role = $request->role;
        $admin->status = $request->status;
        $admin->save();

        return redirect('administrator/admin')->with('success', 'Data admin berhasil diubah.');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect('administrator/admin')->with('success', 'Data admin berhasil dihapus.');
    }
}

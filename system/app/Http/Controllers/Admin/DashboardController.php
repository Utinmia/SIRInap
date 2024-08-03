<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Kamar;
use App\Models\Reservasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(){
        $data['list_reservasi'] = Reservasi::all();
        // $data['total_reservasi'] = Reservasi::all()->count();
        // $data['total_kamar'] = Kamar::all()->count();
        // $data['total_admin'] = Admin::all()->count();
        // $data['total_user'] = User::all()->count();
        // $data['total_kamar_tersedia'] = Kamar::where('status', 'tersedia')->count();
        return view('admin.dashboard', $data);
    }

    public function profile()
    {
        $data['admin'] = Admin::where('id', session('admin')->id)->first();
        return view('admin.profile', $data);
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $id,
            'password' => 'nullable|string|min:3|confirmed',
        ]);

        // Log::info('Data request:', $request->all());

        $admin = Admin::findOrFail($id);
        $admin->nama = $request->nama;
        $admin->email = $request->email;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }

        if($admin->save()){
            session()->put('admin', $admin);
            
            return redirect('admin/profile')->with('success', 'Data konsumen berhasil diubah.');
        }else{
            dd('gagal save');
        }

    }
}

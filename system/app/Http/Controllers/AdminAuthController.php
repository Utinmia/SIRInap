<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function showRegisterForm()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Masukkan alamat email yang valid.',
            'password.required' => 'Kata sandi wajib diisi.'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::user();
            $request->session()->put('user', $user);
            // Autentikasi pengguna web
            return redirect()->intended('/')
                ->with('success', 'Anda berhasil login');
        } elseif (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user(); // Menggunakan guard 'admin'
            $request->session()->put('admin', $admin);
            // Autentikasi pengguna admin
            return redirect()->intended('administrator')
                ->with('success', 'Anda berhasil login');
        }

        return redirect('login')->with('error', 'Gagal login! Cek email dan kata sandi Anda.');
    }

    public function register(Request $request)
    {
        // Validasi data input jika diperlukan
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tgl_lahir' => 'required|date',
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:3',
        ],[
            'nama.required' => 'Nama wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'tgl_lahir.required' => 'Taggal lahir wajib diisi.',
            'telepon.required' => 'Telepon wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Masukkan alamat email yang valid.',
            'password.required' => 'Kata sandi wajib diisi.'
        ]);

        // Simpan data ke dalam database
        $user = new User();
        $user->nama = $request->nama;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->telepon = $request->telepon;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Menggunakan bcrypt untuk enkripsi password
        $user->save();

        // Redirect atau melakukan sesuatu setelah berhasil menyimpan
        return redirect('login')->with('success', 'Pendaftaran berhasil!');
    }

    public function logout()
    {
        Auth::guard('admin')->logout(); // logout menggunakan guard admin

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect('login')->with('success', 'Anda berhasil keluar!');
    }

    public function logoutWeb(Request $request)
    {
        Auth::guard('web')->logout();

        // Flush session
        $request->session()->invalidate();

        // Regenerasi token CSRF
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda berhasil keluar!');
    }
}

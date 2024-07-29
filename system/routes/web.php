<?php

// use App\Http\Controllers\admin\userController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\KamarController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
//login

//endlogin
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\ReservasiController;
use App\Http\Controllers\KonfirmasiController;

Route::get('/', [LandingController::class, 'index']);
Route::get('/hubungi-kami', [LandingController::class, 'hubungiKami']);
Route::get('/fasilitas', [LandingController::class, 'fasilitas']);
Route::get('/galeri', [LandingController::class, 'galeri']);
Route::get('/kamar', [LandingController::class, 'kamar']);
Route::get('/detail-kamar/{id}', [LandingController::class, 'detailKamar']);
Route::get('/filter-kamar', [LandingController::class, 'filter'])->name('filter.kamar');


Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::get('register', [AdminAuthController::class, 'showRegisterForm'])->name('register');
Route::post('prosesLogin', [AdminAuthController::class, 'login']);
Route::post('prosesRegister', [AdminAuthController::class, 'register']); // Hanya untuk User

Route::group(['prefix' => 'administrator', 'middleware' => 'auth:admin'], function () {
    // Route untuk area admin
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('/admin', AdminController::class);
    Route::resource('/konsumen', PelangganController::class);
    Route::resource('/kamar', KamarController::class);
    Route::resource('/galeri', GaleriController::class);
    // Route::resource('/layanan', LayananController::class);
    Route::resource('/pembayaran', PembayaranController::class);
    Route::resource('/reservasi', ReservasiController::class);
    
    Route::get('/profile', [DashboardController::class, 'profile']);
    Route::post('/update-profile/{id}', [DashboardController::class, 'updateProfile']);

    Route::get('/logout', [AdminAuthController::class, 'logout']);
    Route::get('/invoice/{paymentId}', [InvoiceController::class, 'generateInvoice']);

});


Route::group(['middleware' => 'auth'], function () {
    Route::resource('/profile', ProfileController::class);
    // Route::get('konsumen/', [LandingController::class, 'index']);
    Route::get('/logout', [LandingController::class, 'logout'])->name('logout');
    // Route::get('/profile', [ProfileController::class, 'index']);
    // Route::post('/update-profile', [ProfileController::class, 'update']);

    Route::get('/riwayat-pemesanan', [PemesananController::class, 'index']);
    Route::post('/pesan', [PemesananController::class, 'store'])->name('pesan.store');
    Route::post('/pembayaran', [KonfirmasiController::class, 'store'])->name('pembayaran.store');
    Route::delete('/form-pesanan/{id}', [PemesananController::class, 'delete'])->name('form-pesanan.delete');
    // Route::get('/form-pesanan/{id}', [PemesananController::class, 'delete']);
    Route::get('/form-pesanan', [PemesananController::class, 'formPesanan']);
    // Route::get('/detail-kamar/{id}', [LandingController::class, 'detailKamar']);
    
    // Route::get('/invoice/{paymentId}', [InvoiceController::class, 'generateInvoice']);

    // Route::get('/logout', [AdminAuthController::class, 'logoutWeb']);
    Route::post('/logout', [AdminAuthController::class, 'logoutWeb'])->name('logout');

});

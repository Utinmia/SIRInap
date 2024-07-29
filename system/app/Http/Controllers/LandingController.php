<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Galeri;
use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\User;

class LandingController extends Controller
{
    public function index()
    {
        // $data['list_kamar'] = Kamar::all();
        $data['list_kamar'] = Kamar::where('status', 'Tersedia')->whereNotIn('id_kamar', [999])->get();
        return view('web.index', $data);
    }
    public function hubungiKami()
    {
        // $data['list_kamar'] = Kamar::all();
        return view('web.hubungiKami');
    }
    public function kamar()
    {
        $data['list_kamar'] = Kamar::where('status', 'Tersedia')->whereNotIn('id_kamar', [999])->get();
        return view('web.kamar', $data);
    }

    public function detailKamar($id)
    {
        $data['kamar'] = Kamar::findOrFail($id);

        return view('web.detailKamar', $data);
    }

    public function filter(Request $request)
    {
        $tipe_kamar = $request->input('tipe_kamar');
        $checkin = $request->input('checkin');
        $checkout = $request->input('checkout');

        $query = Kamar::query();

        if ($tipe_kamar && $tipe_kamar != 'select') {
            $query->where('tipe_kamar', $tipe_kamar);
        }

         // Filter berdasarkan tanggal checkin dan checkout
         if ($checkin && $checkout) {
            // Asumsi ada relasi dengan reservasi menggunakan belongsToMany
            $query->whereDoesntHave('reservasis', function ($q) use ($checkin, $checkout) {
                $q->where(function ($query) use ($checkin, $checkout) {
                    $query->whereBetween('tanggal_check_in', [$checkin, $checkout])
                          ->orWhereBetween('tanggal_check_out', [$checkin, $checkout])
                          ->orWhere(function ($query) use ($checkin, $checkout) {
                              $query->where('tanggal_check_in', '<=', $checkin)
                                    ->where('tanggal_check_out', '>=', $checkout);
                          });
                });
            });
        }

        // Filter by availability or any other conditions if needed
        // Example:
        // if ($checkin) {
        //     $query->where('available_from', '<=', $checkin);
        // }
        // if ($checkout) {
        //     $query->where('available_to', '>=', $checkout);
        // }

        $data['list_kamar'] = $query->where('status', 'Tersedia')->with('galeri')->get();

        return view('web.kamar', $data);
    }

    // public function fasilitas()
    // {
    //     $data['list_kamar'] = Kamar::all();
    //     return view('web.index', $data);
    // }
    public function galeri()
    {
        $data['list_galeri'] = Galeri::all();
        return view('web.galeri', $data);
    }
}

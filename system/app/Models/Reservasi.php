<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Carbon;

class Reservasi extends Model
{
    use HasFactory;
    // Nama tabel (opsional jika nama tabel mengikuti konvensi Laravel)
    protected $table = 'tb_reservasi';

    // Primary key (opsional jika menggunakan 'id' sebagai primary key)
    protected $primaryKey = 'id_reservasi';

    protected $fillable = [
        'id_pelanggan',
        'tanggal_check_in',
        'tanggal_check_out',
        'total_biaya',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pelanggan', 'id');
    }

    public function kamars()
    {
        return $this->belongsToMany(Kamar::class, 'tb_reservasi_kamar', 'reservasi_id', 'kamar_id');
    }

    // public function layanans()
    // {
    //     return $this->belongsToMany(Layanan::class, 'tb_reservasi_layanan', 'reservasi_id', 'layanan_id');
    // }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class, 'id_reservasi', 'id_reservasi');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_reservasi', 'id_reservasi');
    }

    public function calculateTotalBiaya()
    {
        $totalBiaya = 0;
        $checkIn = Carbon::parse($this->tanggal_check_in);
        $checkOut = Carbon::parse($this->tanggal_check_out);
        $durasiMenginap = $checkOut->diffInDays($checkIn);

        foreach ($this->kamars as $kamar) {
            $totalBiaya += $durasiMenginap * $kamar->harga;
        }

        // foreach ($this->layanans as $layanan) {
        //     $totalBiaya += $layanan->harga_layanan;
        // }

        return $totalBiaya;
    }
    public function calculateHarga()
    {
        $totalBiaya = 0;
        $checkIn = Carbon::parse($this->tanggal_check_in);
        $checkOut = Carbon::parse($this->tanggal_check_out);
        $durasiMenginap = $checkOut->diffInDays($checkIn);

        foreach ($this->kamars as $kamar) {
            // Hitung total harga per malam untuk kamar ini
            $totalHargaKamar = $durasiMenginap * $kamar->harga;
    
            // Simpan total harga per malam ke dalam array dengan key id kamar
            $totalHargaPerKamar[$kamar->id] = $totalHargaKamar;
        }
    
        return $totalHargaPerKamar;
    }

    public function getStatusBadgeClass()
    {
        switch ($this->status) {
            case 'Confirmed':
                return 'badge-info';
            case 'Checked-in':
                return 'badge-success';
            case 'Checked-out':
                return 'badge-primary';
            case 'Canceled':
                return 'badge-danger';
            default:
                return 'badge-secondary';
        }
    }
}

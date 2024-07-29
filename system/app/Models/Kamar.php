<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika nama tabel mengikuti konvensi Laravel)
    protected $table = 'tb_kamar';

    // Primary key (opsional jika menggunakan 'id' sebagai primary key)
    protected $primaryKey = 'id_kamar';

    protected $fillable = [
        'nomor_kamar',
        'tipe_kamar',
        'harga',
        'status',
    ];

    public function galeri()
    {
        return $this->hasMany(Galeri::class, 'id_kamar', 'id_kamar');
    }

    public function reservasis()
    {
        return $this->belongsToMany(Reservasi::class, 'tb_reservasi_kamar', 'kamar_id', 'reservasi_id');
    }

    public function getStatusBadgeClass()
    {
        switch ($this->status) {
            case 'Tersedia':
                return 'badge-success';
            case 'Dipesan':
                return 'badge-warning';
            case 'Perawatan':
                return 'badge-danger';
            default:
                return 'badge-secondary';
        }
    }
}

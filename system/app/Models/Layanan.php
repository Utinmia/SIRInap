<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika nama tabel mengikuti konvensi Laravel)
    protected $table = 'tb_layanan';

    // Primary key (opsional jika menggunakan 'id' sebagai primary key)
    protected $primaryKey = 'id_layanan';

    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'harga',
    ];

    public function reservasis()
    {
        return $this->belongsToMany(Reservasi::class, 'tb_reservasi_layanan', 'layanan_id', 'reservasi_id');
    }
}

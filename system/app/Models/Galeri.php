<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'tb_galeri';
    protected $primaryKey = 'id_galeri';

    protected $fillable = [
        'id_kamar',
        'url_gambar',
        'deskripsi_gambar',
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar', 'id_kamar');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika nama tabel mengikuti konvensi Laravel)
    protected $table = 'tb_pembayaran';

    // Primary key (opsional jika menggunakan 'id' sebagai primary key)
    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_reservasi',
        'jumlah',
        'metode_bayar',
        'tgl_bayar',
        'bukti_bayar',
        'status',
    ];

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class, 'id_reservasi', 'id_reservasi');
    }

    public function getStatusBadgeClass()
    {
        switch ($this->status) {
            case 'Pending':
                return 'badge-info';
            case 'Success':
                return 'badge-success';
            case 'Falied':
                return 'badge-warning';
            case 'Refunded':
                return 'badge-danger';
            default:
                return 'badge-secondary';
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = 'tb_about';
    protected $primaryKey = 'id_about';

    protected $fillable = [
        'nama',
        'kelas',
    ];
}

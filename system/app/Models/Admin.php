<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'nama', 'email', 'password', 'role', 'status',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Di dalam model Admin.php

    public function getRoleBadgeClass()
    {
        switch ($this->role) {
            case 'Administrator':
                return 'badge-primary';
            case 'Resepsionis':
                return 'badge-success';
            case 'Operator':
                return 'badge-warning';
            case 'Owner':
                return 'badge-danger';
            default:
                return 'badge-secondary';
        }
    }
    public function getStatusBadgeClass()
    {
        switch ($this->status) {
            case 'Aktif':
                return 'badge-primary';
            case 'Non-aktif':
                return 'badge-danger';
            default:
                return 'badge-secondary';
        }
    }
}

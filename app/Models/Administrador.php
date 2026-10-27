<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Administrador extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'administradores';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellidos',
        'correo',
        'usuario',
        'contraseña',
        'rol',
        'activo',
        'imagen',
        'google_id',
        'avatar',
    ];

    protected $hidden = [
        'contraseña',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'contraseña' => 'hashed',
            'activo' => 'integer',
        ];
    }

    public function getAuthPassword()
    {
        return $this->contraseña;
    }

    public function esMaster()
    {
        return $this->rol === 'master';
    }

    public function esBase()
    {
        return $this->rol === 'base';
    }
}

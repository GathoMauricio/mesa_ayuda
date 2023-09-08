<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'rol_id',
        'cliente_id',
        'estatus',
        'nombre',
        'apaterno',
        'amaterno',
        'telefono',
        'telefono_emergencia',
        'email',
        'direccion',
        'password',
        'imagen',
        'api_token',
    ];


    protected $hidden = [
        'password',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            $query->password = bcrypt($query->password);
            $query->imagen = 'perfil.png';
            $query->estatus = 1;
        });
    }

    public function rol()
    {
        return $this->belongsTo(
            'App\Models\Rol',
            'rol_id',
            'id'
        )
            ->withDefault();
    }

    public function cliente()
    {
        return $this->belongsTo(
            'App\Models\Cliente',
            'cliente_id',
            'id'
        )
            ->withDefault();
    }
}

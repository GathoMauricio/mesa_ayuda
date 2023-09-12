<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id',
        'razon_social',
        'rfc',
        'direccion',
        'imagen'
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            $query->imagen = 'cliente.png';
        });
    }
}

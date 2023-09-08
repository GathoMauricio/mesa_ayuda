<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatusTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'estatus',
        'descripcion'
    ];
}

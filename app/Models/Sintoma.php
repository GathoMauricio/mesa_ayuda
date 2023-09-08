<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sintoma extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'categoria_id',
        'sintoma',
    ];

    public function categoria()
    {
        return $this->belongsTo(
            'App\Models\Categoria',
            'categoria_id',
            'id'
        )
            ->withDefault();
    }
}

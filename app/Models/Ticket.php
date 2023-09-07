<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'estatus_id',
        'sintoma_id',
        'usuario_final_id',
        'folio',
        'prioridad',
        'descripcion',
    ];

    public function estatus()
    {
        return $this->belongsTo(
            'App\Models\Estatus',
            'estatus_id',
            'id'
        )
            ->withDefault();
    }

    public function sintoma()
    {
        return $this->belongsTo(
            'App\Models\Sintoma',
            'sintoma_id',
            'id'
        )
            ->withDefault();
    }

    public function usuario_final()
    {
        return $this->belongsTo(
            'App\Models\User',
            'usuario_final_id',
            'id'
        )
            ->withDefault();
    }
}

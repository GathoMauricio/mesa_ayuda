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

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            $query->estatus_id = 1;
            $query->usuario_final_id = \Auth::user()->id;
        });
    }

    public function estatus()
    {
        return $this->belongsTo(
            'App\Models\EstatusTicket',
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

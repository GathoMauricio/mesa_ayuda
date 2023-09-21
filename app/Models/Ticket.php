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
        'cliente_id',
        'usuario_final_id',
        'folio',
        'prioridad',
        'descripcion',
        'origen',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            $query->estatus_id = 1;
            $query->cliente_id = \Auth::user()->cliente_id;
            $query->usuario_final_id = isset(\Auth::user()->id) ? \Auth::user()->id : 1;
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

    public function seguimientos()
    {
        return $this->hasMany('App\Models\Seguimiento');
    }
    public function archivos()
    {
        return $this->hasMany('App\Models\TicketArchivo');
    }
}

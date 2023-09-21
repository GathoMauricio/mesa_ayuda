<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketArchivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ticket_id',
        'nombre',
        'ruta',
        'mime_type',
    ];

    public function ticket()
    {
        return $this->belongsTo(
            'App\Models\Ticket',
            'ticket_id',
            'id'
        )
            ->withDefault();
    }
}

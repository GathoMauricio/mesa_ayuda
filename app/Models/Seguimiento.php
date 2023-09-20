<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ticket_id',
        'autor_id',
        'texto',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            $query->autor_id = \Auth::user()->id;
        });
    }

    public function ticket()
    {
        return $this->belongsTo(
            'App\Models\Ticket',
            'ticket_id',
            'id'
        )
            ->withDefault();
    }

    public function autor()
    {
        return $this->belongsTo(
            'App\Models\User',
            'autor_id',
            'id'
        )
            ->withDefault();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'area_id',
        'categoria',
    ];

    public function area()
    {
        return $this->belongsTo(
            'App\Models\Area',
            'area_id',
            'id'
        )
            ->withDefault();
    }
}

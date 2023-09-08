<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('cargar_categorias/{area_id}', [\App\Http\Controllers\TicketController::class, 'cargarCategorias']);
Route::get('cargar_sintomas/{categoria_id}', [\App\Http\Controllers\TicketController::class, 'cargarSintomas']);

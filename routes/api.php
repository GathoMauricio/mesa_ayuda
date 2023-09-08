<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('api-login', [\App\Http\Controllers\UserController::class, 'apiLogin']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('api-datos-usuario', [\App\Http\Controllers\UserController::class, 'apiDatosUsuario']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('cargar_categorias/{area_id}', [\App\Http\Controllers\TicketController::class, 'cargarCategorias']);
Route::get('cargar_sintomas/{categoria_id}', [\App\Http\Controllers\TicketController::class, 'cargarSintomas']);

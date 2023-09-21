<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('api-login', [\App\Http\Controllers\UserController::class, 'apiLogin']);
Route::post('api-ultima-version-android', [\App\Http\Controllers\HomeController::class, 'apiUltimaVersionAndroid']);
Route::get('api-descargar-android-app', [\App\Http\Controllers\HomeController::class, 'descargarAndroidApp']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('api-datos-usuario', [\App\Http\Controllers\UserController::class, 'apiDatosUsuario']);
    Route::get('api-home', [App\Http\Controllers\HomeController::class, 'apiHome']);
    Route::get('api-logout', [\App\Http\Controllers\UserController::class, 'apiLogout']);
    Route::get('api-obtener-areas', [\App\Http\Controllers\AreaController::class, 'apiObtenerAreas']);
    Route::get('api-obtener-categorias-por-area', [\App\Http\Controllers\CategoriaController::class, 'apiObtenerCategoriasPorArea']);
    Route::get('api-obtener-sintomas-por-categoria', [\App\Http\Controllers\SintomaController::class, 'apiObtenerSintomasPorCategoria']);
    Route::post('api-store-ticket', [\App\Http\Controllers\TicketController::class, 'apiStoreTicket']);
    Route::post('api-store-seguimiento', [\App\Http\Controllers\SeguimientoController::class, 'apiStoreSeguimiento']);
    Route::get('api-get-ticket', [\App\Http\Controllers\TicketController::class, 'apiGetTicket']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('cargar_categorias/{area_id}', [\App\Http\Controllers\TicketController::class, 'cargarCategorias']);
Route::get('cargar_sintomas/{categoria_id}', [\App\Http\Controllers\TicketController::class, 'cargarSintomas']);

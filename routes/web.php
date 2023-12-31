<?php

use Illuminate\Support\Facades\Route;

\Auth::routes();
#Tickets
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/iniciar_ticket', [\App\Http\Controllers\TicketController::class, 'create']);
Route::post('/guardar_ticket', [\App\Http\Controllers\TicketController::class, 'store']);
Route::get('/ver_ticket/{id}', [\App\Http\Controllers\TicketController::class, 'show']);
Route::get('/editar_ticket/{id}', [\App\Http\Controllers\TicketController::class, 'edit']);
Route::put('updater_ticket/{id}', [\App\Http\Controllers\TicketController::class, 'update']);
#Clientes
Route::resource('/clientes', ClienteController::class);
#Empleados
Route::resource('/empleados', EmpleadoController::class);
#seguimientos
Route::post('/guardar_seguimiento', [\App\Http\Controllers\SeguimientoController::class, 'store']);
#Catálogos
Route::get('/catalogos', [\App\Http\Controllers\CatalogoController::class, 'index']);
Route::post('/guardar_area', [\App\Http\Controllers\CatalogoController::class, 'guardarArea']);
Route::post('/guardar_categoria', [\App\Http\Controllers\CatalogoController::class, 'guardarCategoria']);
Route::post('/guardar_sintoma', [\App\Http\Controllers\CatalogoController::class, 'guardarSintoma']);

Route::delete('/eliminar_area/{id}', [\App\Http\Controllers\CatalogoController::class, 'eliminarArea']);
Route::delete('/eliminar_categoria/{id}', [\App\Http\Controllers\CatalogoController::class, 'eliminarCategoria']);
Route::delete('/eliminar_sintoma/{id}', [\App\Http\Controllers\CatalogoController::class, 'eliminarSintoma']);

Route::get('descargar_archivo_ticket', [App\Http\Controllers\TicketArchivoController::class, 'descargarArchivo']);

Route::any('/', function () {
})->name('/');
Route::get('/', function () {
    if (\Auth::check())
        return redirect('home');
    return view('auth.login');
})->name('/');

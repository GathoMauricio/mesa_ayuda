<?php

use Illuminate\Support\Facades\Route;

\Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/iniciar_ticket', [\App\Http\Controllers\TicketController::class, 'create']);
Route::post('/guardar_ticket', [\App\Http\Controllers\TicketController::class, 'store']);
Route::get('/ver_ticket/{id}', [\App\Http\Controllers\TicketController::class, 'show']);
Route::get('/editar_ticket/{id}', [\App\Http\Controllers\TicketController::class, 'edit']);

Route::get('/test', function () {
    return "Test Route";
});

Route::any('/', function () {
})->name('/');

Route::get('/', function () {
    if (\Auth::check())
        return redirect('home');
    return view('auth.login');
})->name('/');

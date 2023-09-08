<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (\Auth::check())
        return redirect('home');
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/iniciar_ticket', [\App\Http\Controllers\TicketController::class, 'create']);
Route::post('/guardar_ticket', [\App\Http\Controllers\TicketController::class, 'store']);

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (\Auth::check())
        return redirect('home');
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

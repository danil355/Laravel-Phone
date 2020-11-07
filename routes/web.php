<?php

use App\Http\Controllers\PhoneController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::middleware('auth')
    ->group(function () {
        // Тут проверка на авторизацию

        Route::resource('phones', PhoneController::class)
            ->except('index', 'show');

    });

Route::resource('phones', PhoneController::class)
    ->only('index', 'show');

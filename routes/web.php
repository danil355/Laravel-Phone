<?php

use App\Http\Controllers\PhoneController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::resource('phones', PhoneController::class)->only('index','show');

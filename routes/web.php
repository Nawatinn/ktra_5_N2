<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);

Route::get('/them-phim', [App\Http\Controllers\MovieController3::class, 'create']);

Route::post('/them-phim', [App\Http\Controllers\MovieController3::class, 'store']);
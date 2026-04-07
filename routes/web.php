<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController2; 

Route::get('/', [MovieController2::class, 'index']);
Route::get('/theloai/{id}', [MovieController2::class, 'Genre']);
Route::get('/movie/{id}', [MovieController2::class, 'Detail'])->name('movie.detail');
Route::post('/timkiem', [MovieController2::class, 'search']);
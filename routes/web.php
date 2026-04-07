<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/them-phim', [App\Http\Controllers\MovieController3::class, 'create']);
Route::post('/them-phim', [App\Http\Controllers\MovieController3::class, 'store']);


Route::get('/movie/list', 'App\Http\Controllers\MovieController4@movielist')->name('movielist');
Route::get('/movie/detail/{id}', 'App\Http\Controllers\MovieController4@moviedetail')->name('moviedetail');
Route::post('/movie/delete', 'App\Http\Controllers\MovieController4@moviedelete')->name('moviedelete');
Route::get('/movie/create', 'App\Http\Controllers\MovieController4@moviecreate')->name('moviecreate');
Route::post('/movie/save', 'App\Http\Controllers\MovieController4@moviesave')->name('moviesave');

Route::get('/', 'App\Http\Controllers\MovieController2@index');
Route::get('/theloai/{id}', 'App\Http\Controllers\MovieController2@Genre');
Route::get('/movie/{id}', 'App\Http\Controllers\MovieController2@Detail')->name('movie.detail');
Route::post('/timkiem', 'App\Http\Controllers\MovieController2@search');


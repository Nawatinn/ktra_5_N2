<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MovieController2::class, 'index']);

Route::get('/movie/list', 'App\Http\Controllers\MovieController4@movielist')->name('movielist');

Route::get('/movie/detail/{id}', 'App\Http\Controllers\MovieController4@moviedetail')->name('moviedetail');

Route::post('/movie/delete', 'App\Http\Controllers\MovieController4@moviedelete')->name('moviedelete');

Route::get('/movie/create', 'App\Http\Controllers\MovieController4@moviecreate')->name('moviecreate');

Route::post('/movie/save', 'App\Http\Controllers\MovieController4@moviesave')->name('moviesave');
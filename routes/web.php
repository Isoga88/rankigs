<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RankingController;

Route::get('/', [RankingController::class, 'current'])->name('ranking.current');
Route::get('/previous', [RankingController::class, 'previous'])->name('ranking.previous');
Route::get('/user', [RankingController::class, 'showUsers'])->name('User');
Route::post('/adduser', [RankingController::class, 'addUsers'])->name('users.add');



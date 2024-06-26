<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RankingController;

Route::get('/', [RankingController::class, 'current'])->name('ranking.current');
Route::get('/previous', [RankingController::class, 'previous'])->name('ranking.previous');

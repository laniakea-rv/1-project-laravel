<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\LesController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/abonnementen', [AbonnementController::class, 'showAbonnement'])->name('abonnement');
Route::get('/lessen', [LesController::class, 'index']);
Route::get('/lessen/{les}', [LesController::class, 'show']);

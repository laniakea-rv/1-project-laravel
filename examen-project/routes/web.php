<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\LesController;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login.login');
    Route::get('/register', [AuthController::class, 'register'])->name('login.register');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'store'])->name('login.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/', function () {return view('welcome');});
    Route::get('/abonnementen', [AbonnementController::class, 'showAbonnement'])->name('abonnement');
    Route::get('/lessen', [LesController::class, 'index']);
    Route::get('/lessen/{les}', [LesController::class, 'show']);
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
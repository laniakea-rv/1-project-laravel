<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\LesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MuziekController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login.login');
    Route::get('/register', [AuthController::class, 'register'])->name('login.register');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'store'])->name('login.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/', function () {return view('home');});
    Route::get('/abonnementen', [AbonnementController::class, 'showAbonnement'])->name('abonnementen');
    Route::get('/lessen', [LesController::class, 'index'])->name('lessen');
    Route::get('/lessen/{les}', [LesController::class, 'show'])->name('lessen.show');
    Route::get('/muziekShop', [MuziekController::class, 'displayMuziek'])->name('muziek');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/abonnement/create', [AbonnementController::class, 'showAbonnementForm'])->name('abonnementForm');
Route::post('/abonnement/create', [AbonnementController::class, 'store'])->name('saveAbonnement');
});
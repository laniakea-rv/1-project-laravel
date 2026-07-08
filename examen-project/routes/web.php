<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\LesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MuziekController;
use App\Http\Controllers\StreamController;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {return view('login');});
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('login.register');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'store'])->name('login.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/', function () {return view('home');});

    Route::get('/lessen', [LesController::class, 'index'])->name('lessen');
    Route::get('/lessen/{les}', [LesController::class, 'show'])->name('lessen.show');
    Route::post('/lessen/{les}/afronden', [LesController::class, 'afronden'])->name('lessen.lesindex');

    Route::get('/muziek', [MuziekController::class, 'index'])->name('muziek');
    Route::get('/muziek/create', [MuziekController::class, 'create'])->name('muziek.create');
    Route::post('/muziek/create', [MuziekController::class, 'store'])->name('muziek.store');
    Route::put('/muziek/{muziek}', [MuziekController::class, 'update'])->name('muziek.update');
    Route::get('/muziek/{muziek}/edit', [MuziekController::class, 'edit'])->name('muziek.edit');

    Route::get('/abonnementen', [AbonnementController::class, 'showAbonnementen'])->name('abonnementen');
    Route::get('/abonnement/create', [AbonnementController::class, 'showAbonnementForm'])->name('abonnementForm');
    Route::post('/abonnement/create', [AbonnementController::class, 'storeAbonnement'])->name('saveAbonnement');
    Route::get('/stream', [StreamController::class, 'showStream'])->name('liveStream');

    Route::post('/abonnement/link', [AbonnementController::class, 'storeUserAbonnement'])->name('saveUserAbonnement');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
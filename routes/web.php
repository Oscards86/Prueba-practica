<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LibroController;

// Rutas de login (visibles para todos)
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Rutas protegidas por login (middleware auth)
Route::middleware('auth')->group(function () {
    // Página principal con navbar y logo (Inicio)
    Route::get('/', function () {
        return view('Inicio.inicio');
    })->name('home');

    // Rutas de clientes
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

    // Rutas de libros
    Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
    Route::get('/libros/create', [LibroController::class, 'create'])->name('libros.create');
    Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
    Route::get('/libros/{libro}/edit', [LibroController::class, 'edit'])->name('libros.edit');
    Route::put('/libros/{libro}', [LibroController::class, 'update'])->name('libros.update');
    Route::delete('/libros/{libro}', [LibroController::class, 'destroy'])->name('libros.destroy');
});

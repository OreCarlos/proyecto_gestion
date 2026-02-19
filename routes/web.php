<?php

use App\Http\Controllers\AlamacenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    // Ambos roles pueden ver la lista
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');

    // Usuario Solo admin puede crear, editar, eliminar
    Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UserController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{user}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{user}', [UserController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{user}', [UserController::class, 'destroy'])->name('usuarios.destroy');

    //Almacenes
    Route::get('/almacenes', [AlamacenController::class, 'index'])->name('almacenes.index');
    Route::get('/almacenes/create', [AlamacenController::class, 'create'])->name('almacenes.create');
    Route::post('/almacenes', [AlamacenController::class, 'store'])->name('almacenes.store');
    Route::get('/almacenes/{almacen}/edit', [AlamacenController::class, 'edit'])->name('almacenes.edit');
    Route::put('/almacenes/{almacen}', [AlamacenController::class, 'update'])->name('almacenes.update');
    Route::delete('/almacenes/{almacen}', [AlamacenController::class, 'destroy'])->name('almacenes.destroy');

    // Ruta extra para ver inactivos
    Route::get('/almacenes-inactivos', [AlamacenController::class, 'inactivos'])->name('almacenes.inactivos');


    // Productos
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');


    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

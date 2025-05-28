<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CamionController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CalculoRentabilidadController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/clientes/crear', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');

    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::post('/clientes/calcular-ruta', [ClienteController::class, 'calcularRuta'])->name('clientes.calcularRuta');
    Route::get('clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('clientes/{cliente}',      [ClienteController::class, 'update'])->name('clientes.update');
    Route::get('clientes/{cliente}/confirm-delete', [ClienteController::class, 'confirmDelete'])
        ->name('clientes.confirm-delete');
    Route::delete('clientes/{cliente}',   [ClienteController::class, 'destroy'])->name('clientes.delete');


    Route::get('/camiones/crear', [CamionController::class, 'create'])->name('camiones.create');
    Route::post('/camiones', [CamionController::class, 'store'])->name('camiones.store');

    Route::get('/calcular-rentabilidad', [CalculoRentabilidadController::class, 'mostrarFormulario'])
        ->name('rentabilidad.formulario');

    Route::post('/calcular-rentabilidad', [CalculoRentabilidadController::class, 'calcularRentabilidad'])
        ->name('rentabilidad.calcular');
    
    Route::get('/usuario/cambiar-base', function(){ return view('usuario.base'); })->name('usuario.cambiar-base');
    Route::post('/usuario/guardar-base', [UsuarioController::class, 'guardarBase'])->name('usuario.guardar-base');

});

require __DIR__.'/auth.php';

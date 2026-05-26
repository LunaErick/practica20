<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PerfilController;

// Login
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas
Route::middleware('auth')->group(function () {

    // Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/crear', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/guardar', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/editar/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/actualizar/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/eliminar/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    // Usuario
    Route::get('/perfil', [UsuarioController::class, 'perfil'])->name('usuario.perfil');

    // Editar perfil
    Route::get('/perfil/editar', [PerfilController::class, 'edit'])->name('perfil.edit');
    Route::put('/perfil/actualizar', [PerfilController::class, 'update'])->name('perfil.update');

});
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

    Route::middleware(['auth', 'lang'])->group(function (){            

        Route::get('/Carrera/index', [CarreraController::class, 'index'])->name('carrera.index');
        
        Route::resource('/Carrera', CarreraController::class)->names([
            'create' => 'carrera.create',
            'store' => 'carrera.store',
            'edit' => 'carrera.edit', 
            'update' => 'carrera.update', 
            'show' => 'carrera.show',
            'destroy' => 'carrera.destroy'
        ]);
        
        Route::get('/Usuario/index', [UserController::class, 'index'])->name('usuario.index');
        
        Route::resource('/Usuario', UserController::class)->names([
            'create' => 'usuario.create',
            'store' => 'usuario.store',
            'edit' => 'usuario.edit', 
            'update' => 'usuario.update', 
            'show' => 'usuario.show',
            'destroy' => 'usuario.destroy'
        ]);
    
        Route::get('/Materia/index', [MateriaController::class, 'index'])->name('materia.index');

        Route::resource('/Materia', MateriaController::class)->names([
            'create' => 'materia.create',
            'store' => 'materia.store',
            'edit' => 'materia.edit', 
            'update' => 'materia.update', 
            'show' => 'materia.show',
            'destroy' => 'materia.destroy'
        ]);
        
        Route::get('/Examen/index', [ExamenController::class, 'index'])->name('examen.index');
        
        Route::resource('/Examen', ExamenController::class)->names([
            'create' => 'examen.create',
            'store' => 'examen.store',
            'edit' => 'examen.edit', 
            'update' => 'examen.update', 
            'show' => 'examen.show',
            'destroy' => 'examen.destroy'
        ]);
    });
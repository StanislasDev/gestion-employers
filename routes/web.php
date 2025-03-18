<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmployerController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'handleLogin'])->name('handleLogin');
});


Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [AppController::class, 'index'])->name('index');

    Route::prefix('departements')->group(function(){
        Route::get('/', [DepartementController::class, 'index'])->name('departement.index');
        Route::get('/create', [DepartementController::class, 'create'])->name('departement.create');
        Route::post('/create', [DepartementController::class, 'store'])->name('departement.store');
        Route::get('/edit/{departement}', [DepartementController::class, 'edit'])->name('departement.edit');
        Route::put('/update/{departement}', [DepartementController::class, 'update'])->name('departement.update');
        Route::get('/{departement}', [DepartementController::class, 'delete'])->name('departement.delete');
    });
    Route::prefix('employers')->group(function(){
        Route::get('/', [EmployerController::class, 'index'])->name('employer.index');
        Route::get('/create', [EmployerController::class, 'create'])->name('employer.create');
        Route::post('/create', [EmployerController::class, 'store'])->name('employer.store');
        Route::get('/edit/{employer}', [EmployerController::class, 'edit'])->name('employer.edit');
        Route::put('/update/{employer}', [EmployerController::class, 'update'])->name('employer.update');
        Route::get('/{employer}', [EmployerController::class, 'destroy'])->name('employer.delete');
    });

    Route::prefix('configurations')->group(function(){
        Route::get('/', [ConfigurationController::class, 'index'])->name('configuration');
        Route::get('/create', [ConfigurationController::class, 'create'])->name('configuration.create');

        // Enregistrer les informations de la configuration
        Route::post('/create', [ConfigurationController::class, 'store'])->name('configuration.store');
        // Supprimer la configuration 
        Route::get('/{configuration}', [ConfigurationController::class, 'delete'])->name('configuration.delete');
    });
});


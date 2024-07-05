<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IconController;
use App\Http\Controllers\ClasificacionController;
use App\Http\Controllers\SubClasificacionController;
use App\Http\Controllers\RazonSocialController;


// Rutas accesibles para usuarios no autenticados
Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/icons', [IconController::class, 'getIcons']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas para administradores
Route::resource('razon_social', RazonSocialController::class);

Route::resource('clasificaciones', ClasificacionController::class);
Route::resource('clasificaciones/{parentId}/subclasificaciones', SubClasificacionController::class)->except(['show']);

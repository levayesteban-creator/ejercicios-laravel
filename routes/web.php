<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController; // ¡Línea agregada!

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Rutas para el Paso 4: Formulario de Creación de Productos
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// --- Rutas Personalizadas para Productos ---
// ¡Línea agregada para listar productos activos!
Route::get('/products/active-json', [ProductController::class, 'activeProducts']);

// --- Rutas de Resource ---
// Rutas de Recurso para Categorías
Route::resource('categories', CategoryController::class);

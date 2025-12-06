<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; // ¡Importación necesaria!

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rutas para el Paso 4: Formulario de Creación de Productos
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// --- Rutas de Resource (Si ya hiciste el Paso 3 y 6) ---
// Si estás usando rutas resource completas, estas dos líneas ya estarían cubiertas por:
// Route::resource('products', ProductController::class);
// Route::resource('categories', CategoryController::class);

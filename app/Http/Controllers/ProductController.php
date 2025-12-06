<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Importante para interactuar con la tabla 'products'

class ProductController extends Controller
{
    /**
     * Muestra una lista de todos los productos (INDEX).
     */
    public function index()
    {
        // En una aplicación real, esto manejaría la lógica de paginación y filtros.
        $products = Product::all();
        // return view('products.index', compact('products')); // Se usaría si la vista existe
        return response()->json($products); // Devolvemos JSON temporalmente para la prueba
    }

    /**
     * Muestra el formulario para crear un nuevo producto (CREATE).
     */
    public function create()
    {
        // return view('products.create');
        return "Formulario de Creación de Producto (Paso 4)";
    }

    /**
     * Almacena un producto recién creado en la base de datos
     */
    public function store(Request $request)
    {

        return response()->json(['message' => 'Método STORE pendiente de implementación.', 'data' => $request->all()]);
    }

    /**
     * Muestra un producto específico (SHOW).
     */
    public function show($id)
    {
        // Pendiente
    }

    /**
     * Muestra el formulario para editar un producto (EDIT).
     */
    public function edit($id)
    {
        // Pendiente
    }

    /**
     * Actualiza el producto especificado en la base de datos (UPDATE).
     */
    public function update(Request $request, $id)
    {
        // Pendiente
    }

    /**
     * Elimina un producto de la base de datos (DESTROY).
     */
    public function destroy($id)
    {
        // Pendiente
    }
}

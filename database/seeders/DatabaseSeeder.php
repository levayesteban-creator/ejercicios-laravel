<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; // Importar el modelo Category
use App\Models\Product;  // Importar el modelo Product

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Crear un usuario de prueba (mantenido de tu código original)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 2. Crear 5 categorías de prueba
        // $categories es una colección de los 5 objetos Category creados.
        $categories = Category::factory(5)->create();

        // 3. Crear 20 productos y asignarlos a una de las categorías anteriores
        Product::factory(20)->make()->each(function($product) use ($categories) {
            // Asigna un ID de categoría al producto, tomado al azar de la colección $categories
            $product->category_id = $categories->random()->id;

            // Guarda el producto en la base de datos con el category_id asignado
            $product->save();
        });
    }
}

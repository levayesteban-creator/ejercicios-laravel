<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product; // Asegúrate de que el modelo esté correctamente referenciado
use App\Models\Category; // Importar el modelo Category para la relación

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Datos del Producto generados por Faker
            'nombre' => $this->faker->word(),
            'descripcion' => $this->faker->sentence(),
            'precio' => $this->faker->randomFloat(2, 10, 500), // Dos decimales, entre 10 y 500
            'stock' => $this->faker->numberBetween(1, 100),    // Stock entre 1 y 100
            'status' => true,                                  // Por defecto, activo

            // Relación: Genera una nueva Category al crear un Product.
            // Esto asegura que cada producto tenga una categoría asociada.
            'category_id' => Category::factory(),
        ];
    }
}

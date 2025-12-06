<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category; // Asumiendo que tu modelo se llama Category

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    // Opcional: Especificar el modelo si el nombre no sigue la convención
    // protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Línea agregada para generar un nombre de categoría aleatorio
            'nombre' => $this->faker->word(),
        ];
    }
}

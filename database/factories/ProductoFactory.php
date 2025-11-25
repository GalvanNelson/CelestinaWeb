<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_producto' => $this->faker->words(3, true), // Crea un nombre de 3 palabras
            'imagen' => $this->faker->imageUrl(640, 480, 'products', true), // URL de imagen falsa
            'precio_unitario' => $this->faker->randomFloat(2, 10, 50), // Precio entre 10.00 y 50.00
            
            // Asumimos que estos son IDs. Faker pondrá números al azar entre 1 y 10.
            // Si tienes tablas reales para esto, podrías usar Categoria::factory()
            'categoria' => $this->faker->numberBetween(1, 10), 
            'unidad_medida' => $this->faker->numberBetween(1, 5),
            'vendedor' => $this->faker->numberBetween(1, 3), // Asume que tienes 3 vendedores/teams
        ];
    }
}

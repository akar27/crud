<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tache>
 */
class TacheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom_tache' => fake()->name(),
            'date_debut' => fake()->date(),
            'date_fin' => fake()->date(),
            'cout' => fake()->randomFloat(2),
        ];
    }
}

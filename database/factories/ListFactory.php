<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
            return [
                'statut' => $this->faker->title('A faire' || 'En cours' || 'Terminé'),
                'projet_id' => $this->faker->title(),
            ];
        
    }
}

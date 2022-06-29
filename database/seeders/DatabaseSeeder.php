<?php

namespace Database\Seeders;

use App\Models\List;
use App\Models\Card;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{   
    public function definition()
    {
        return [
            // ‘active’ => 1,
            // ‘statut’ => $this->faker->title('A faire' || 'En cours' || 'Terminé')
    ];
    }
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Projet::factory()->count(10)->create();

        // List::factory()->count(10)->create();

        // List::factory()->count(10)->create([
        //     'list_id' => 4
        // ]);
    }
}

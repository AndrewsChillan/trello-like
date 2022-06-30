<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Card;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{   
    public function definition()
    {
        return [
            
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

        

        Card::factory()->count(10)->create();

        Card::factory()->count(10)->create([
            'list_id' => 4
        ]);
    }
}

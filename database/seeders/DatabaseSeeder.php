<?php

namespace Database\Seeders;

use App\Models\Comment;
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

        Card::factory()->count(50)->create();

        Comment::factory()->count(10)->create();

        Comment::factory()->count(10)->create([
            'poject_id' => 2
        ]);
    }
}

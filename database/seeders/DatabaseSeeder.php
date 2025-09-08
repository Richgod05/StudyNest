<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\MaterialSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Call additional seeders
        $this->call([
            MaterialSeeder::class,
        ]);

    }

    public function runB(): void
    {
    // Make sure users exist first
    \App\Models\User::factory()->count(5)->create();

    // Create 20 questions
    \App\Models\Question::factory()->count(20)->create();

    }

}
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    public function definition(): array
{
    return [
        // Assign to a random existing user, or create one if none exist
        'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
        'title' => $this->faker->sentence(6), // 6-word title
        'body' => $this->faker->paragraph(4), // 4 sentences

        // Engagement metrics
        'likes_count'   => $this->faker->numberBetween(0, 50),
        'replies_count' => $this->faker->numberBetween(0, 30),
        'views_count'   => $this->faker->numberBetween(100, 1000),

        // Timestamps
        'created_at' => now(),
        'updated_at' => now(),
    ];
}
}
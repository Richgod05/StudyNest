<?php

namespace Database\Factories;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
        'title' => $this->faker->sentence(6), // 6-word title
        'description' => $this->faker->paragraph(4), // 4 sentences
        'subject' =>$this->faker->sentence(2),
        'level' =>$this->faker->sentence(2),
        'tags' =>$this->faker->sentence(1),
        'file_path' =>$this->faker->filePath(),
        'created_at' => now(),
        'updated_at' => now(),
        ];
    }
}

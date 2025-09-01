<?php
// database/factories/MaterialFactory.php

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'title' => $this->faker->sentence(6),
            'description' => $this->faker->paragraph(4),
            'subject' => $this->faker->word(),
            'level' => $this->faker->word(),
            'tags' => implode(',', $this->faker->words(3)),
            'file_path' => $this->faker->filePath(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
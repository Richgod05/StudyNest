<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        // Create 100 fake messages
        Question::factory()->count(100)->create();
    }
}
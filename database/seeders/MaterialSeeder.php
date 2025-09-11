<?php

// database/seeders/MaterialSeeder.php

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\User;

class MaterialSeeder extends Seeder
{
    public function run(): void
    {
        
        // Ensure at least one user exists
        User::factory()->count(5)->create();

        // Create materials
        Material::factory()->count(20)->create();
    }
}
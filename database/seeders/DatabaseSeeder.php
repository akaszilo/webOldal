<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(
            [
                BrandSeeder::class,
                CategorySeeder::class,
                ProductSeeder::class,
                CartSeeder::class,
                OrderSeeder::class,
            ]
        );

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}


<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Foundation',
            'Powder',
            'Blush',
            'Bronzer',
            'Contour',
            'Lipstick',
            'Lip Liner',
            'Lip Gloss',
            'Lip Oil',
            'Eyeliner',
            'Eyeshadow Palette',
            'Mascara',
            'Eyebrow Pencil',
        ];
        
        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Foundation',
            'Concealer',
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

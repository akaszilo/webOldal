<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Estée Lauder',
            'Clinique',
            'Guerlain',
            'Maybelline New York',
            'L\'Oréal Paris',
            'Lancôme',
            'MAC Cosmetics',
            'NARS',
            'Urban Decay',
            'Benefit Cosmetics',
            'Bobbi Brown',
            'Shiseido',
            'Dior Beauty',
            'Chanel',
            'Charlotte Tilbury',
            'Fenty Beauty',
            'Glossier',
            'Anastasia Beverly Hills',
            'Tarte Cosmetics',
            'Too Faced',
            'Huda Beauty',
            'Pat McGrath Labs',
            'Milk Makeup',
            'Kylie Cosmetics',
            'ColourPop',
            'Revlon',
            'NYX Professional Makeup',
            'Smashbox',
            'BareMinerals',
            'La Mer',
            'Drunk Elephant',
            'The Ordinary',
            'Paula’s Choice',
            'CeraVe',
            'E.l.f. Cosmetics',
            'Josie Maran',
            'Pixi Beauty',
            'Cover FX',
            'IT Cosmetics',
            'Almay',
            'Elizabeth Arden',
            'Lush',
            'Origins',
            'Fresh',
            'Caudalie',
            'Kiehl\'s',
            'Burt\'s Bees',
            'Tatcha',
            'Herbivore Botanicals',
            'Mario Badescu',
        ];    

        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Nette\Utils\Random;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Face products
        $faceProducts = [
            'No Filter Foundation',
            'Serum Foundation',
            'Coverage Foundation',
            'Realist Invisible Setting Powder',
            'Multi Purpose Powder - Blush & Eye',
            'Pressed Powder Foundation',
            'Bronzer - loose',
            'Bronzer - pressed',
            'Amalia',
            'Pressed Foundation',
            'Pressed Eye Shadow',
            'Mineral Blush',
            'Marcelle Quad Bronzer Sunkissed',
            'Marcelle Monochromatic Bronzer',
            'Stila Stay All Day Bronzer in Medium',
            'Mineral Fusion Bronzer Duo',
            'Mineral Fusion Liquid Foundation',
            'Bronzer',
            'Annabelle Biggy Bronzer Haute Gold',
            'Annabelle SkinTrue Foundation',
            'Dr. Hauschka Bronzing Powder Compact',
            'Dr. Hauschka Foundation',
            'Super BB InstaReady Filter BB Bronzer',
            'Argan Wear Ultra-Nourishing Argan Oil Bronzer',
            'Bronze Booster Glow-Boosting Pressed Bronzer',
            'Nude Wear Glowing Nude Blush',
            'Happy Booster Glow & Mood Boosting Blush',
            'Organic Wear 100% Natural Origin Bronzer',
            'Mineral Wear Airbrushing Blush',
            'Nude Wear Touch of Glow Foundation',
            'Youthful Wear Spotless Foundation',
            'Big Bronzer',
            'Matte Bronzer',
            'Bronzer',
            'Liquid Foundation',
            'OneBase for Face',
            'truBLEND Bronzer',
            'Clean Glow Bronzer',
            'Clean Glow Blush',
            'Cheekers Blush',
            'Instant Cheekbones Contouring Blush',
            'Outlast Stay Luminous Foundation Creamy Natural (820)',
            'Ready, Set Gorgeous Liquid Makeup 105',
            'Outlast Stay Fabulous 3-in-1 Foundation',
            'Clean Liquid Makeup Normal Skin',
            'Smoothers All-Day Hydrating Makeup',
            'Clean Oil Control Makeup',
            'Advanced Radiance Age Defying Liquid Makeup',
        ];
        // Eyes products
        $eyesProducts = [
            'Liquid Liner',
            'Eyeshadow',
            'Perfect Lash Mascara',
            'Loose Mineral Eyeshadow',
            'Gel Liner',
            'Eyeliner',
            'Super Luscious Mascara',
            'Eyebrow Marker',
            'Eyebrow Kit With Stencil',
            'Eyebrow Push-Up Bra',
            '3-Dimensional Brow Marker',
            'Eyebrow Shaper',
            'Build \'Em Up Brow Powder',
            '3-in-1 Brow Pencil',
            'Proof It! Waterproof Eyebrow Primer',
            'Eyebrow Powder Pencil',
            'Precision Brow Pencil',
            'Sculpt & Highlight Brow Contour',
            'Control Freak Eyebrow Gel',
            'Eyebrow Cake Powder',
            'Tinted Brow Mascara',
            'Auto Eyebrow Pencil',
            'Eyebrow Gel',
            'Tame & Frame Brow Pomade',
            'Micro Brow Pencil',
            'Holographic Halo Cream Eyeliner',
            'Cake That! Powder Eyeliner',
            'Epic Black Mousse Liner',
            'Cosmic Gel Liner',
            'Gel Liner And Smudger',
            'Metallic Eyeliner',
            'Tres Jolie Gel Pencil Liner',
            'Faux Whites Eye Brightener',
            'Faux Blacks Eyeliner',
            'Collection Noir',
            'Slim Eye Pencil',
            'Retractable Eye Liner',
            'Slide On Pencil',
            'Marcelle Kajal Kohl Eyeliner Blackest Black',
            'Marcelle Waterproof Liquid DIP-PEN Eyeliner 10H+',
            'Dr. Hauschka Liquid Eyeliner',
            'Eye Booster Lash Boosting Eyeliner + Serum',
            'LineExact Liquid Eyeliner',
            'Professional Mascara Curved Brush Very Black',
            'Professional Mascara Curved Brush Black Brown',
            'LashBlast Fusion Water Resistant Mascara',
            'LastBlast Clump Crusher Water Resistant Mascara',
            'Professional Super Thick Lash Mascara Very Black',
            'Professional Waterproof Mascara',
        ];
        // Lips products
        $lipsProducts = [
            'Lippie Pencil',
            'Blotted Lip',
            'Lippie Stix',
            'Lipstick',
            'B Smudged',
            'B Glossy Lip Gloss',
            'Lip Gloss',
            'Lipstick',
            'Lip Gloss',
            'Dr. Hauschka Lipstick',
        ];

        $lipsImg = [
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/048/original/open-uri20180708-4-13okqci?1531093614',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/047/original/open-uri20180708-4-e7idod?1531087336',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/046/original/open-uri20180708-4-1f333k1?1531086651',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/044/original/data?1531071233',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/037/original/open-uri20180630-4-1fa1p2f?1530390384',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/030/original/open-uri20180630-4-ucbwbt?1530390380',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/029/original/open-uri20180630-4-1rfkucb?1530390379',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/023/original/open-uri20180630-4-149dwc3?1530390375',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/887/original/data?1514082438',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/886/original/open-uri20171224-4-1pbaddr?1514082437',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/885/original/open-uri20171224-4-j5xh6b?1514082436',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/884/original/open-uri20171224-4-1b2b0di?1514082434',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/883/original/open-uri20171224-4-25gmgo?1514082433',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/861/original/open-uri20171224-4-1s2vu19?1514082377',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/860/original/open-uri20171224-4-1cgu3rl?1514082374',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/859/original/open-uri20171224-4-1jzc6ty?1514082372',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/858/original/open-uri20171224-4-7z9c9k?1514082356',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/857/original/open-uri20171224-4-4k5tpf?1514082354',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/770/original/data?1514072332',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/769/original/data?1514072332',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/768/original/data?1514072331',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/663/original/open-uri20171223-4-sznyox?1514062723',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/662/original/open-uri20171223-4-b9oitk?1514062722',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/614/original/open-uri20171223-4-1ouwppd?1514061757',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/613/original/open-uri20171223-4-13bs4e0?1514061757',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/612/original/open-uri20171223-4-tnj626?1514061757',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/521/original/open-uri20171223-4-15x0iu?1514062149',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/519/original/data?1514062148',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/518/original/data?1514062147',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/517/original/open-uri20171223-4-1p0ttc5?1514062147',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/516/original/data?1514062146',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/515/original/data?1514062146',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/413/original/data?1514063320',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/412/original/data?1514063320',
            'https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/398/original/open-uri20171223-4-11xbwij?1514063314'
        ];
        
        $eyesImg = [
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/048/original/open-uri20180708-4-13okqci?1531093614",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/047/original/open-uri20180708-4-e7idod?1531087336",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/046/original/open-uri20180708-4-1f333k1?1531086651",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/044/original/data?1531071233",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/037/original/open-uri20180630-4-1fa1p2f?1530390384",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/030/original/open-uri20180630-4-ucbwbt?1530390380",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/029/original/open-uri20180630-4-1rfkucb?1530390379",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/023/original/open-uri20180630-4-149dwc3?1530390375",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/022/original/data?1530390374",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/010/original/open-uri20180630-4-dywvay?1530390364",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/009/original/open-uri20180630-4-xznfso?1530390363",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/007/original/open-uri20180630-4-1m2hvd7?1530390361",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/999/original/open-uri20171227-4-2ul0s6?1514341420",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/893/original/open-uri20171224-4-1xaya6j?1514082456",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/892/original/open-uri20171224-4-1vxfgx0?1514082451",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/891/original/open-uri20171224-4-mgfb2y?1514082448",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/890/original/open-uri20171224-4-1p3hisz?1514082445",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/889/original/open-uri20171224-4-1jtkojq?1514082440",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/888/original/open-uri20171224-4-zjnp6o?1514082438",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/887/original/data?1514082438",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/886/original/open-uri20171224-4-1pbaddr?1514082437",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/885/original/open-uri20171224-4-j5xh6b?1514082436",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/884/original/open-uri20171224-4-1b2b0di?1514082434",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/883/original/open-uri20171224-4-25gmgo?1514082433",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/882/original/open-uri20171224-4-111jmk6?1514082432",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/880/original/open-uri20171224-4-dp6rrb?1514082429",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/879/original/open-uri20171224-4-1loshoq?1514082428",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/878/original/open-uri20171224-4-1tsev2u?1514082427",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/877/original/open-uri20171224-4-r7y0wz?1514082426",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/876/original/open-uri20171224-4-wz7a6o?1514082425",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/875/original/open-uri20171224-4-16xna3r?1514082424",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/874/original/open-uri20171224-4-14udrjs?1514082454",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/872/original/open-uri20171224-4-193brnk?1514082418",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/871/original/open-uri20171224-4-qu6f92?1514082411",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/870/original/open-uri20171224-4-1x4oohd?1514082406",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/869/original/open-uri20171224-4-13sob9z?1514082404",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/868/original/open-uri20171224-4-i4duyu?1514082402",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/867/original/open-uri20171224-4-tp7kxq?1514082397",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/866/original/open-uri20171224-4-9fhzot?1514082394",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/865/original/open-uri20171224-4-1jh734z?1514082393",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/864/original/open-uri20171224-4-1xq0aej?1514082390",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/863/original/open-uri20171224-4-16oiz6q?1514082389",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/862/original/open-uri20171224-4-zsba91?1514082381",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/861/original/open-uri20171224-4-1s2vu19?1514082377",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/860/original/open-uri20171224-4-1cgu3rl?1514082374",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/859/original/open-uri20171224-4-1jzc6ty?1514082372",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/858/original/open-uri20171224-4-7z9c9k?1514082356",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/857/original/open-uri20171224-4-4k5tpf?1514082354",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/856/original/open-uri20171224-4-n7nifg?1514082369",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/855/original/open-uri20171224-4-10m51gg?1514082383",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/854/original/open-uri20171224-4-seihwb?1514082398",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/853/original/open-uri20171224-4-107hboe?1514082386",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/852/original/open-uri20171224-4-1a0jfqz?1514082384",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/851/original/open-uri20171224-4-b88byj?1514082335",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/850/original/open-uri20171224-4-w3yj1s?1514073895",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/848/original/open-uri20171223-4-gjj2xg?1514072782",
        ];
        
        $faceImg = [
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/048/original/open-uri20180708-4-13okqci?1531093614",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/047/original/open-uri20180708-4-e7idod?1531087336",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/046/original/open-uri20180708-4-1f333k1?1531086651",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/044/original/data?1531071233",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/037/original/open-uri20180630-4-1fa1p2f?1530390384",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/030/original/open-uri20180630-4-ucbwbt?1530390380",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/029/original/open-uri20180630-4-1rfkucb?1530390379",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/023/original/open-uri20180630-4-149dwc3?1530390375",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/022/original/data?1530390374",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/010/original/open-uri20180630-4-dywvay?1530390364",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/664/original/open-uri20171223-4-1mdas12?1514062725",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/663/original/open-uri20171223-4-sznyox?1514062723",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/662/original/open-uri20171223-4-b9oitk?1514062722",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/661/original/open-uri20171223-4-10ntph3?1514062721",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/660/original/open-uri20171223-4-19og9mv?1514062721",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/659/original/open-uri20171223-4-14wnn4c?1514062721",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/658/original/open-uri20171223-4-1c7npm6?1514062721",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/646/original/open-uri20171223-4-nxq9so?1514062282",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/624/original/open-uri20171223-4-12tcoyi?1514061760",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/623/original/open-uri20171223-4-15ajw4w?1514061759",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/622/original/open-uri20171223-4-1c5ch8u?1514061759",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/621/original/open-uri20171223-4-1l72nxj?1514061759",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/620/original/open-uri20171223-4-1rloh6o?1514061759",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/619/original/open-uri20171223-4-1a52xvo?1514061758",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/618/original/open-uri20171223-4-1kdyf02?1514061758",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/617/original/open-uri20171223-4-9ylmgx?1514061758",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/616/original/open-uri20171223-4-os3kc?1514061758",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/615/original/open-uri20171223-4-1tvj5bs?1514061757",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/614/original/open-uri20171223-4-1ouwppd?1514061757",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/613/original/open-uri20171223-4-13bs4e0?1514061757",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/612/original/open-uri20171223-4-tnj626?1514061757",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/521/original/open-uri20171223-4-15x0iu?1514062149",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/519/original/data?1514062148",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/518/original/data?1514062147",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/517/original/open-uri20171223-4-1p0ttc5?1514062147",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/516/original/data?1514062146",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/515/original/data?1514062146",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/413/original/data?1514063320",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/412/original/data?1514063320",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/411/original/data?1514063320",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/410/original/data?1514063319",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/409/original/data?1514063319",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/408/original/data?1514063319",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/407/original/data?1514063319",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/406/original/data?1514063319",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/405/original/data?1514063319",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/404/original/data?1514063319",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/403/original/data?1514063319",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/402/original/open-uri20171223-4-1410iph?1514063318",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/401/original/data?1514063317",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/400/original/data?1514063317",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/399/original/data?1514063317",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/398/original/open-uri20171223-4-11xbwij?1514063314",
        ];

        $faker = Faker::create();
        $brands = Brand::all()->pluck('id')->toArray();
        $categories = Category::all()->pluck('id')->toArray();

        for ($i = 0; $i < 100; $i++) {
            // Randomly select a category id from 1 to 3
            $categoryId = Arr::random($categories);

            // Determine which product and image arrays to use based on the category
            switch ($categoryId) {
                case 1:
                    $productName = Arr::random($faceProducts);
                    $imageLink = Arr::random($faceImg);
                    break;
                case 2:
                    $productName = Arr::random($eyesProducts);
                    $imageLink = Arr::random($eyesImg);
                    break;
                case 3:
                    $productName = Arr::random($lipsProducts);
                    $imageLink = Arr::random($lipsImg);
                    break;
                default:
                    $productName = Arr::random($faceProducts);
                    $imageLink = Arr::random($faceImg);
                    break;
            }

            Product::create([
                'name' => $productName,
                'price' => rand(1000, 100000) / 100,
                'image_link' => $imageLink,
                'description' => $faker->paragraph(2),
                'rating' => rand(1, 5),
                'sold_quantity' => rand(10, 1200),
                'brand_id' => Arr::random($brands),
                'category_id' => $categoryId,
            ]);
        }
    }
}
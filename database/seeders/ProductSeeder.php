<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Nette\Utils\Random;
use Faker\Factory as Faker;
use SebastianBergmann\Environment\Console;

class ProductSeeder extends Seeder
{
    


    public function run(): void
    {
        $faker = Faker::create();

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
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/873/original/open-uri20171224-4-1r5y1g1?1514082422",
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
        
        

$foundationImg = [
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/045/original/open-uri20180708-4-4bvqii?1531074237",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/043/original/open-uri20180706-4-nszgw9?1530919194",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/042/original/open-uri20180706-4-1e74943?1530916234",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/039/original/open-uri20180630-4-rfmkzd?1530390386",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/033/original/open-uri20180630-4-1mibdm?1530390382",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/028/original/open-uri20180630-4-1u219s0?1530390378",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/004/original/open-uri20171227-4-1wp63cr?1514344255",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/002/original/open-uri20171227-4-1ne7r73?1514343097"
];

$blushImg = [
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/035/original/open-uri20180630-4-n6wb0y?1530390383",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/026/original/open-uri20180630-4-18e9ua7?1530390377",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/017/original/open-uri20180630-4-1r5paz3?1530390370",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/003/original/open-uri20171227-4-13ivnwv?1514343870",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/924/original/open-uri20171224-4-7p4zdp?1514082648",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/923/original/open-uri20171224-4-13zuxu4?1514082646",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/922/original/open-uri20171224-4-1fun686?1514082642",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/920/original/open-uri20171224-4-11ndp61?1514082635"
];

$contourImg = [
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/977/original/open-uri20171224-4-ylht42?1514082762",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/911/original/open-uri20171224-4-lx4vmq?1514082615",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/900/original/open-uri20171224-4-1byvmqd?1514082593",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/847/original/open-uri20171224-4-1se9mcb?1514074989",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/806/original/data?1514072321",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/788/original/data?1514072313",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/787/original/data?1514072312",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/786/original/data?1514072312"
];

$lipglossImg = [
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/037/original/open-uri20180630-4-1fa1p2f?1530390384",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/030/original/open-uri20180630-4-ucbwbt?1530390380",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/022/original/data?1530390374",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/009/original/open-uri20180630-4-xznfso?1530390363",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/861/original/open-uri20171224-4-1s2vu19?1514082377",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/860/original/open-uri20171224-4-1cgu3rl?1514082374",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/859/original/open-uri20171224-4-1jzc6ty?1514082372",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/858/original/open-uri20171224-4-7z9c9k?1514082356"
];

$liplinerImg = [
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/048/original/open-uri20180708-4-13okqci?1531093614",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/007/original/open-uri20180630-4-1m2hvd7?1530390361",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/893/original/open-uri20171224-4-1xaya6j?1514082456",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/892/original/open-uri20171224-4-1vxfgx0?1514082451",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/891/original/open-uri20171224-4-mgfb2y?1514082448",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/890/original/open-uri20171224-4-1p3hisz?1514082445",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/889/original/open-uri20171224-4-1jtkojq?1514082440",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/874/original/open-uri20171224-4-14udrjs?1514082454"
];

$eyelinerImg = [
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/041/original/open-uri20180630-4-1huiv9y?1530390387",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/021/original/open-uri20180630-4-10sgmvz?1530390373",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/020/original/open-uri20180630-4-y548d5?1530390373",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/006/original/open-uri20180630-4-u4c1jh?1530390360",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/969/original/open-uri20171224-4-59b48d?1514082749",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/968/original/open-uri20171224-4-159mdg6?1514082748",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/967/original/data?1514082747",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/966/original/open-uri20171224-4-kpqxp4?1514082746"
];

$lipstickImg = [
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/047/original/open-uri20180708-4-e7idod?1531087336",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/046/original/open-uri20180708-4-1f333k1?1531086651",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/044/original/data?1531071233",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/037/original/open-uri20180630-4-1fa1p2f?1530390384",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/030/original/open-uri20180630-4-ucbwbt?1530390380",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/029/original/open-uri20180630-4-1rfkucb?1530390379",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/023/original/open-uri20180630-4-149dwc3?1530390375",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/022/original/data?1530390374"
];

$bronzerImg = [
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/032/original/open-uri20180630-4-1bl3btv?1530390381",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/031/original/open-uri20180630-4-1axfay6?1530390380",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/928/original/open-uri20171224-4-1jps0th?1514082663",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/927/original/open-uri20171224-4-firpx4?1514082659",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/926/original/open-uri20171224-4-6mx0la?1514082656",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/921/original/open-uri20171224-4-wm9lld?1514082660",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/919/original/open-uri20171224-4-1lhzgye?1514082657",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/917/original/open-uri20171224-4-1e7o792?1514082654"
];

$powderImg = [
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/039/original/open-uri20180630-4-rfmkzd?1530390386",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/038/original/open-uri20180630-4-xhqdne?1530390385",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/036/original/open-uri20180630-4-ign3hh?1530390384",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/035/original/open-uri20180630-4-n6wb0y?1530390383",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/034/original/open-uri20180630-4-1n63e1y?1530390382",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/033/original/open-uri20180630-4-1mibdm?1530390382",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/028/original/open-uri20180630-4-1u219s0?1530390378",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/017/original/open-uri20180630-4-1r5paz3?1530390370"
];

$eyebrowpencilImg = [
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/019/original/open-uri20180630-4-1h8zp2k?1530390372",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/987/original/data?1514082776",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/986/original/open-uri20171224-4-14z5x4y?1514082775",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/985/original/data?1514082775",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/984/original/open-uri20171224-4-1uh3nw7?1514082773",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/983/original/data?1514082773",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/982/original/open-uri20171224-4-15afdg3?1514082772",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/981/original/open-uri20171224-4-1i8mko9?1514082770"
];

$MascaraImg = [
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/025/original/open-uri20180630-4-yxmmga?1530390376",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/018/original/open-uri20180630-4-g58t74?1530390371",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/011/original/open-uri20180630-4-ojcehy?1530390366",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/008/original/open-uri20180630-4-bk6ign?1530390362",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/998/original/data?1514082787",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/997/original/data?1514082787",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/996/original/data?1514082786",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/995/original/data?1514082785"
];

$eyeshadowImg = [
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/040/original/open-uri20180630-4-1afkyee?1530390386",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/038/original/open-uri20180630-4-xhqdne?1530390385",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/036/original/open-uri20180630-4-ign3hh?1530390384",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/034/original/open-uri20180630-4-1n63e1y?1530390382",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/027/original/open-uri20180630-4-2ii6k2?1530390377",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/024/original/open-uri20180630-4-13b5ehh?1530390375",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/016/original/open-uri20180630-4-1mmjptw?1530390369",
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/015/original/open-uri20180630-4-egfs2g?1530390369"
];

$lipoilImg = [
    "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/856/original/open-uri20171224-4-n7nifg?1514082369"
];
        
        
        $brands = Brand::all()->pluck('id')->toArray();
        $categories = Category::all()->pluck('id')->toArray();
        

            for ($i = 0; $i < 1000; $i++) {
                // Random category id selection
                $categoryId = Arr::random($categories);  
                $categories = Category::all()->pluck('id')->toArray();
            
                switch ($categoryId) {
                    case 1: // Foundation
                        $productName = Arr::random($faceProducts);
                        $imageLink = Arr::random($foundationImg);
                        break;
                    case 2: // Powder
                        $productName = Arr::random($faceProducts); 
                        $imageLink = Arr::random($powderImg); 
                        break;
                    case 3: // Blush
                        $productName = Arr::random($faceProducts);
                        $imageLink = Arr::random($blushImg);
                        break;
                        case 4: // Bronzer
                            $productName = Arr::random($faceProducts);
                            $imageLink = Arr::random($bronzerImg);
                            break;
                     case 5: // Contour
                         $productName = Arr::random($faceProducts);
                         $imageLink = Arr::random($contourImg);
                         break;
                      case 6: // Lipstick
                          $productName = Arr::random($lipsProducts);
                          $imageLink = Arr::random($lipstickImg);
                          break;
                    case 7: // Lip Liner
                        $productName = Arr::random($lipsProducts);
                        $imageLink = Arr::random($liplinerImg);
                        break;
                   case 8: // Lipgloss
                       $productName = Arr::random($lipsProducts);
                       $imageLink = Arr::random($lipglossImg);
                       break;
                    case 9: // Lip oil
                      $productName = Arr::random($lipsProducts);
                      $imageLink = Arr::random($lipoilImg);
                      break;
                    case 10: // Eyeliner
                        $productName = Arr::random($eyesProducts);
                        $imageLink = Arr::random($eyelinerImg);
                        break;
                   case 11: // Eyeshadow
                       $productName = Arr::random($eyesProducts);
                       $imageLink = Arr::random($eyeshadowImg);
                       break;
                case 12: // Mascara
                   $productName = Arr::random($eyesProducts);
                   $imageLink = Arr::random($MascaraImg);
                   break;
                   case 13: // Eyebrow pencil
                    $productName = Arr::random($eyesProducts);
                    $imageLink = Arr::random($eyebrowpencilImg);
                    break;
                    default:
                        // Default product
                        $productName = Arr::random($eyesProducts);
                        $imageLink = Arr::random($eyesImg);
                        break;
                }
                       
            Product::create([
                'name' => $productName,
                'price' => rand(3, 100000),
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
<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $foundationName = [
            'Idole Ultra Wear Foundation',
            'Infallible Fresh Wear Foundation',
            'Makeup Total Control Pro Drop Foundation',
            'Hydromaniac Glowy Tinted Hydrator',
            'True Match Super-Blendable Foundation',
            '#FauxFilter Foundation',
            'Woke Up Like This Foundation',
            'Skin Fetish Sublime Foundation',
            'Matte + Poreless Foundation',
            'Double Wear Stay-in-Place Foundation',
            'Fix Fluid Foundation',
            'Pro Filt\'r Soft Matte Longwear Foundation',
            'Natural Radiant Longwear Foundation',
            'Airbrush Flawless Foundation',
            'ColorStay Makeup Foundation',
            'Forever Skin Glow Foundation',
            'Even Better Makeup Foundation',
            'Skin Long-Wear Weightless Foundation',
            'Born This Way Foundation',
            'Skin Self-Refreshing Foundation'
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

        $concealerName = [
            'Luminous Silk Concealer',
            'SurrealSkin Awakening Concealer',
            'Very Valentino Concealer',
            'Swipe Serum Concealer',
            'Lasting Perfection Concealer',
            'Be Bright Concealer',
            'PhotoReady Candid Concealer',
            'True Skin Serum Concealer',
            'Magic Away Liquid Concealer',
            'Idole Ultra Wear All Over Face Concealer',
            'Miracle Pure Concealer',
            'Instant Age Rewind Eraser',
            'Radiant Creamy Concealer',
            'Shape Tape Concealer',
            'Infallible Full Wear Concealer',
            'Double Wear Stay-in-Place Flawless Wear Concealer',
            'Pro Filt\'r Instant Retouch Concealer',
            'Fix 24-Hour Smooth Wear Concealer',
            'Stay Naked Correcting Concealer',
            '16HR Camo Concealer'
        ];

        $concealerImg = [
            'https://media.dm-static.com/images/f_auto,q_auto,c_fit,h_320,w_320/v1744713225/products/pim/hu_03607349791292_b_p1_miss_sporty_so_clear_01_korrektor_t820/miss-sporty-korrektor-so-clear-01',
            'https://media.dm-static.com/images/f_auto,q_auto,c_fit,h_320,w_320/v1744752224/products/pim/219916_essence_korrektor_stift_30_4251232219890/essence-korrektor-cover-stick-nr-30-matt-honey',
            'https://media.dm-static.com/images/f_auto,q_auto,c_fit,h_320,w_320/v1744825533/products/pim/4066447212662_sk/alverde-naturkosmetik-alapozo-korrektor-perfect-cover-40-caramel',
            'https://cache.rossmann.hu/asset/w_384/4059729394484_226925_1_jpg_9ae140b7.jpg',
            'https://media.dm-static.com/images/f_auto,q_auto,c_fit,h_320,w_320/v1744752225/products/pim/219912_essence_korrektor_stift_10_4251232219876/essence-korrektor-cover-stick-nr-10-matt-naturelle',
            'https://media.dm-static.com/images/f_auto,q_auto,c_fit,h_320,w_320/v1744756396/products/pim/467317_catrice_korrektor_folyekony_camouflage_10_4250947544662/catrice-korrektor-liquid-camouflage-nr-010-porcellain',
            'https://cache.rossmann.hu/asset/w_384/800897129781_216442_1_jpg_ca51c644.jpg',
            'https://cache.rossmann.hu/asset/w_384/800897168568_216459_1_jpg_3a68fa94.jpg',
            'https://cache.rossmann.hu/asset/w_384/5057566016841_186394_jpg_ed1fb90f.jpg',
            'https://cache.rossmann.hu/asset/w_384/800897129873_216439_1_jpg_70fcae80.jpg'
        ];

        $powderName = [
            'Translucent Loose Setting Powder',
            'Airbrush Flawless Finish Powder',
            'Prisme Libre Loose Powder',
            'Veil Translucent Setting Powder',
            'Pro Filt\'r Instant Retouch Setting Powder',
            'Mineralize Skinfinish Natural',
            'Ultra HD Microfinishing Loose Powder',
            'Translucent Setting Powder',
            'Light Reflecting Setting Powder',
            'Forever Cushion Powder',
            'Universelle Libre Natural Finish Loose Powder',
            'Sheer Finish Pressed Powder',
            'Stay-Matte Sheer Pressed Powder',
            'Long Time No Shine Setting Powder',
            'Loose Finishing Powder',
            'PhotoReady Powder',
            'Photo Focus Pressed Powder',
            'Trublend Pressed Powder',
            'HD Finishing Powder',
            'Halo Glow Setting Powder'
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

        $blushName = [
            'Blush',
            'Rouge Blush',
            'Soft Pinch Liquid Blush',
            'Pillow Talk Cheek to Chic Blush',
            'Powder Blush',
            'Baked Blush',
            'Dandelion Brightening Blush',
            'Ambient Lighting Blush',
            'Cloud Crush Blurring Blush',
            'Blush Color Infusion',
            'Prisme Libre Blush',
            'Pressed Blush Powder',
            'Soft Pop Powder Blush',
            'Dimension II Rose Eyeshadow Palette',
            'Hills Blush Trio',
            'Long-Wearing Staining Powder Blush',
            'Blush',
            'Cheek Pop Blush',
            'Flower Pots Powder Blush',
            'Primer-Infused Blush'
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

        $bronzerName = [
            'Bronzing Powder',
            'Airbrush Bronzer',
            'Hoola Matte Bronzer',
            'Sun Stalk\'r Instant Warmth Bronzer',
            'Chocolate Soleil Matte Bronzer',
            'Bronzer',
            'Lighting Bronzer',
            'Bronzing Powder',
            'Butter Bronzer',
            'Matte Radiance Baked Powder',
            'Les Beiges Healthy Glow Bronzing Cream',
            'Poudre Bonne Mine Healthy Glow Powder',
            'Bronzer',
            'Shaping Stick',
            'Sculpt Crème Contour & Powder Bronzer Duo',
            'Hills Contour & Highlight Stick',
            'Warm Wishes Effortless Bronzer Sticks',
            'Natural Cream Bronzer',
            'Bronzer Powder',
            'Beached Bronzer'
        ];

        $bronzerImg = [
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/032/original/open-uri20180630-4-1bl3btv?1530390381",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/031/original/open-uri20180630-4-1axfay6?1530390380",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/928/original/open-uri20171224-4-1jps0th?1514082663",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/927/original/open-uri20171224-4-firpx4?1514082659",
        ];

        $contourName = [
            "Matte Skinstick",
            "Contour Kit",
            "Wonder Stick",
            "Shade + Light Contour Palette",
            "Master Contour",
            "Ambient Lighting Bronzer",
            "Hoola Matte Bronzer",
            "Cocoa Contour Palette",
            "Park Avenue Princess Palette",
            "Contour Eye Pencil",
            "True Match Contour Palette",
            "Step-By-Step Contour Kit",
            "Contour Palette",
            "Filmstar Bronze & Glow",
            "Butter Bronzer",
            "Chubby Stick Sculpting Contour",
            "Highlighting Powder",
            "Sculpt and Shape Palette",
            "Pro Contour Palette",
            "Vegan Beauty Contour Palette"
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

        $lipstickName = [
            "Ruby Red",
            "Rouge Allure",
            "Addict Lipstick",
            "Audacious Lipstick",
            "SuperStay Matte Ink",
            "Stunna Lip Paint",
            "Matte Revolution",
            "Rouge Pur Couture",
            "Vice Lipstick",
            "Crushed Lip Color",
            "L'Absolu Rouge",
            "Super Lustrous Lipstick",
            "Pop Lip Colour",
            "Lip Color Matte",
            "Natural Lipstick",
            "Cream Lip Stain",
            "Soft Matte Lip Cream",
            "Rouge G Lipstick",
            "Melted Matte",
            "Pure Color Envy"
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

        $liplinerName = [
            "Lip Pencil",
            "Lip Cheat",
            "Slim Lip Pencil",
            "Glide-On Lip Pencil",
            "Precision Lip Liner",
            "Color Sensational Lipliner",
            "Lip Liner",
            "ColorStay Lip Liner",
            "Line & Define Lip Primer",
            "Quickliner for Lips",
            "Lip Pencil",
            "Lip Liner",
            "Colour Riche Lipliner",
            "Perfect Lips Lip Liner",
            "Always Sharp Lip Liner",
            "Tarteist Lip Liner",
            "Longlasting Lipliner",
            "Everlasting Lip Liner",
            "Flypencil Longwear Pencil",
            "Color Statement Lipliner"
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

        $lipglossName = [
            "Gloss Bomb",
            "Lipglass",
            "Butter Gloss",
            "Full-On Plumping Lip Cream",
            "Addict Lip Maximizer",
            "Lip Gloss",
            "Lifter Gloss",
            "Lip Gloss",
            "Lip Injection Glossy",
            "High Impact Lip Gloss",
            "Hi-Fi Shine Lip Gloss",
            "Super Lustrous Lip Gloss",
            "Power Gloss",
            "Lip Gloss",
            "Lip Gloss",
            "Juicy Tubes",
            "Shine Shine Shine Lipgloss",
            "Keep It Full Lip Plumper",
            "Collagen Lip Bath",
            "Everlasting Lip Gloss"
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

        $lipoilName = [
            "Conditioning Lip Oil",
            "Lip Comfort Oil",
            "Lip Oil",
            "Lip Glow Oil",
            "Lip Oil",
            "Squalane + Vitamin C Rose Oil",
            "Sugar Lip Treatment Oil",
            "Emerald Lip Oil",
            "Almond Supple Skin Oil",
            "Lip Glowy Oil",
            "Maracuja Oil Lip Treatment",
            "Lip Conditioner",
            "Agave+ Lip Oil",
            "Argan Lip Conditioner",
            "Moisture Surge Lip Treatment",
            "Lippe Balm",
            "Honey Butter Lip Oil",
            "Lip Oil",
            "Hydro Boost Lip Treatment",
            "Vitamin E Lip Care Oil"
        ];

        $lipoilImg = [
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/856/original/open-uri20171224-4-n7nifg?1514082369"
        ];

        $eyelinerName = [
            "Stay All Day Waterproof Liquid Eyeliner",
            "Tattoo Liner",
            "Eye Studio Master Precise",
            "Glide-On Eye Pencil",
            "Fluidline Gel Eyeliner",
            "Epic Ink Liner",
            "Long-Wear Gel Eyeliner",
            "Liquid Eyelining Pen",
            "Infallible Super Slim Liquid Eyeliner",
            "Roller Liner",
            "Sex Kitten Eyeliner",
            "Retractable Waterproof Eyeliner",
            "Highliner Gel Eye Crayon",
            "Sketch Marker Waterproof Eyeliner",
            "Liquid Ink Eyeliner",
            "Always On Gel Liner",
            "On Stage Liner",
            "Flyliner Longwear Liquid Eyeliner",
            "Artliner Precision Point Eyeliner",
            "ColorStay Liquid Liner"
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

        $eyeshadowpaletteName = [
            "Naked Palette",
            "Modern Renaissance",
            "Chocolate Bar Palette",
            "Desert Dusk Palette",
            "Nature Glow Palette",
            "Tartelette In Bloom",
            "Glam Palette",
            "Yes, Please!",
            "Eye Shadow x15 Palette",
            "Neutral Matte Palette",
            "Snap Shadows",
            "Cheekleaders Palette",
            "Colorful Eyeshadow Palette",
            "Ultimate Shadow Palette",
            "Mothership Palette",
            "Luxury Palette",
            "Reloaded Palette",
            "All About Shadow Palette",
            "Nude Drama Palette",
            "Hypnôse Palette"
        ];

        $eyeshadowpaletteImg = [
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/040/original/open-uri20180630-4-1afkyee?1530390386",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/038/original/open-uri20180630-4-xhqdne?1530390385",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/036/original/open-uri20180630-4-ign3hh?1530390384",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/034/original/open-uri20180630-4-1n63e1y?1530390382",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/027/original/open-uri20180630-4-2ii6k2?1530390377",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/024/original/open-uri20180630-4-13b5ehh?1530390375",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/016/original/open-uri20180630-4-1mmjptw?1530390369",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/015/original/open-uri20180630-4-egfs2g?1530390369"

        ];

        $mascaraName = [
            "Lash Sensational",
            "They're Real! Mascara",
            "Better Than Sex",
            "Voluminous Lash Paradise",
            "Hypnôse Drama",
            "Diorshow Mascara",
            "High Impact Mascara",
            "Lights, Camera, Lashes",
            "Lash Princess",
            "Perversion Mascara",
            "In Extreme Dimension",
            "Full Frontal Mascara",
            "Smokey Eye Mascara",
            "Worth The Hype Mascara",
            "Full Fat Lashes",
            "Full Exposure Mascara",
            "Outrageous Curl Mascara",
            "Lash Mascara",
            "Superhero Mascara",
            "Volumazing Mascara"
        ];

        $mascaraImg = [
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/025/original/open-uri20180630-4-yxmmga?1530390376",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/018/original/open-uri20180630-4-g58t74?1530390371",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/011/original/open-uri20180630-4-ojcehy?1530390366",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/001/008/original/open-uri20180630-4-bk6ign?1530390362",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/998/original/data?1514082787",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/997/original/data?1514082787",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/996/original/data?1514082786",
            "https://s3.amazonaws.com/donovanbailey/products/api_featured_images/000/000/995/original/data?1514082785"

        ];

        $eyebrowpencilName = [
            "Brow Wiz",
            "Precisely, My Brow Pencil",
            "Micro Brow Pencil",
            "Brow Ultra Slim Pencil",
            "Boy Brow",
            "Easy Liner for Brows",
            "Brow Stylist Definer",
            "Instant Lift Brow Pencil",
            "Amazonian Clay Waterproof Brow Pencil",
            "Perfectly Defined Long-Wear Brow Pencil",
            "Retractable Brow Pencil",
            "ColorStay Brow Pencil",
            "Brow Lift",
            "Goof Proof Brow Pencil",
            "Brow Struck",
            "Make Me Brow",
            "Brow Tech Shaping Pencil",
            "Brow MVP Ultra Fine Brow Pencil",
            "Brow Quickie",
            "Brow Defining Pencil"
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

        $brands = Brand::all()->pluck('id')->toArray();
        $categories = Category::all()->pluck('id')->toArray();

        if (empty($brands) || empty($categories)) {
            $this->command->info('Kérlek, először futtasd a BrandSeeder és CategorySeeder seedereket!');
            return;
        }

        for ($i = 0; $i < 100; $i++) {
            $categoryId = Arr::random($categories);

            $productName = null;
            $imageLink = null;

            switch ($categoryId) {
                case 1: // Foundation
                    $productName = Arr::random($foundationName);
                    $imageLink = Arr::random($foundationImg);
                    break;
                case 2: // Concealer
                    $productName = Arr::random($concealerName);
                    $imageLink = Arr::random($concealerImg);
                    break;
                case 3: // Powder
                    $productName = Arr::random($powderName);
                    $imageLink = Arr::random($powderImg);
                    break;
                case 4: // Blush
                    $productName = Arr::random($blushName);
                    $imageLink = Arr::random($blushImg);
                    break;
                case 5: // Bronzer
                    $productName = Arr::random($bronzerName);
                    $imageLink = Arr::random($bronzerImg);
                    break;
                case 6: // Contour
                    $productName = Arr::random($contourName);
                    $imageLink = Arr::random($contourImg);
                    break;
                case 7: // Lipstick
                    $productName = Arr::random($lipstickName);
                    $imageLink = Arr::random($lipstickImg);
                    break;
                case 8: // Lip Liner
                    $productName = Arr::random($liplinerName);
                    $imageLink = Arr::random($liplinerImg);
                    break;
                case 9: // Lipgloss
                    $productName = Arr::random($lipglossName);
                    $imageLink = Arr::random($lipglossImg);
                    break;
                case 10: // Lip oil
                    $productName = Arr::random($lipoilName);
                    $imageLink = Arr::random($lipoilImg);
                    break;
                case 11: // Eyeliner
                    $productName = Arr::random($eyelinerName);
                    $imageLink = Arr::random($eyelinerImg);
                    break;
                case 12: // Eyeshadow
                    $productName = Arr::random($eyeshadowpaletteName);
                    $imageLink = Arr::random($eyeshadowpaletteImg);
                    break;
                case 13: // Mascara
                    $productName = Arr::random($mascaraName);
                    $imageLink = Arr::random($mascaraImg);
                    break;
                case 14: // Eyebrow pencil
                    $productName = Arr::random($eyebrowpencilName);
                    $imageLink = Arr::random($eyebrowpencilImg);
                    break;
            }

            Product::create([
                'name' => $productName,
                'price' => rand(3, 1000),
                'image_link' => $imageLink,
                'description' => $faker->paragraph(4),
                'rating' => rand(1, 5),
                'sold_quantity' => rand(10, 1200),
                'brand_id' => Arr::random($brands),
                'category_id' => $categoryId,
                'instock' => rand(0, 1500),
                'ingredients' => $faker->paragraph(5),
                'howtouse' => $faker->paragraph(4),
            ]);
        }
    }
}
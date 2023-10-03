<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $products = [
        [
            "name" => "Luxury Powermatic 80 Black Men's Watch",
            "brandId" => 2,
            "price" => 794.99,
            "image" => "shop-1.jpg",
            "imageHover" => "shop-11.jpg",
            "description" => "Silver-tone stainless steel case and bracelet. Fixed silver-tone stainless steel bezel. Black dial with silver-tone hands and index hour markers. Minute markers around the outer rim. Dial Type: Analog."
        ],
        [
            "name" => "Endurer Chronograph Automatic Black Dial Men's Watch",
            "brandId" => 7,
            "price" => 15999.99,
            "image" => "shop-2.jpg",
            "imageHover" => "shop-22.jpg",
            "description" =>"Stainless steel case with a black rubber strap. Fixed bezel. Black dial with silver-tone hands and index hour markers. Dial Type: Analog. Luminescent hands and markers. Date display at the 12 o'clock position."
        ],
        [
            "name" => "Ballon Bleu Silver Diamond Dial 18kt Pink Gold Ladies Watch",
            "brandId" => 9,
            "price" => 16099.99,
            "image" => "shop-3.jpg",
            "imageHover" => "shop-33.jpg",
            "description" => "Cartier Ballon Bleu Silver Dial 18K Rose Gold Ladies Watch W6900256. Quartz movement. Caliber 057. Round 18k rose gold case 28.0 mm in diameter."
        ],
        [
            "name" => "Quartz Mother of Pearl Dial Ladies Watch",
            "brandId" => 6,
            "price" => 7450.00,
            "image" => "shop-4.jpg",
            "imageHover" => "shop-44.jpg",
            "description" => "Popular series 'Bulgari Bulgari' representing Bvlgari. The brand logo engraved around the bezel and the simple and elegant design are popular. "
        ],
        [
            "name" => "Calatrava Pilot Travel Time 18kt White Gold Automatic Men's Watch",
            "brandId" => 8,
            "price" => 55590.59,
            "image" => "shop-5.jpg",
            "imageHover" => "shop-55.jpg",
            "description" => "8kt white gold case with a brown calfskin leather strap. Fixed white 18kt white gold bezel. Blue varnished dial with luminous sword-shaped hands and Arabic numeral hour markers."
        ],
        [
            "name" => "Open Box - Tommy Hilfiger Sport Champagne Dial Men's Watch",
            "brandId" => 5,
            "price" => 164.95,
            "image" => "shop-6.jpg",
            "imageHover" => "shop-66.jpg",
            "description" => "VERSATILE AND CONTEMPORARY: A 44mm case with slim bezel and brushed curved dial with textured sub-eyes and iconic Tommy Hilfiger tipped hands."
        ],
        [
            "name" => "Blue Altiplano Ultra-This Hand Wind Men's Watch",
            "brandId" => 11,
            "price" => 27100,
            "image" => "shop-7.jpg",
            "imageHover" => "shop-77.jpg",
            "description" => "18kt rose gold case with a blue (alligator) leather strap. Fixed 18kt rose gold bezel. Blue dial with rose gold hands. No markers. Dial Type: Analog."
        ],
        [
            "name" => "Datejust 36mm Automatic Chronometer Diamond Pink Dial Ladies Watch",
            "brandId" => 1,
            "price" => 12915,
            "image" => "shop-8.jpg",
            "imageHover" => "shop-88.jpg",
            "description" => "Stainless steel case with a stainless steel Rolex oyster bracelet. Fixed 18kt white gold bezel set with diamonds."
        ],
        [
            "name" => "Boheme Silver Dial Black Leather Ladies Watch",
            "brandId" => 10,
            "price" => 1950,
            "image" => "shop-9.jpg",
            "imageHover" => "shop-99.jpg",
            "description" => "Display model. Excellent condition. Comes with an original box and the seller's warranty card. No manuals."
        ],
        [
            "name" => "Baby G Shock Resistant Black Multi-Function Sport Ladies Watch",
            "brandId" => 12,
            "price" => 64,
            "image" => "shop-10.jpg",
            "imageHover" => "shop-1010.jpg",
            "description" => "Slip on a splash of clean, fresh color with an eye-catcher inspired by the popular design of the G-SHOCK GA-110."
        ],
        [
            "name" => "GMT-Master II Pepsi Blue and Red Bezel Stainless Steel Jubilee Men's Watch",
            "brandId" => 1,
            "price" => 35500,
            "image" => "shop-p11.jpg",
            "imageHover" => "shop-1111.jpg",
            "description" => "Designed to show the time in two different time zones simultaneously, the GMT-Master, launched in 1955, was originally developed as a navigation instrument for professionals criss-crossing the globe."
        ],
        [
            "name" => "Lady Heart Flower Automatic White Mother of Pearl Dial Ladies Watch",
            "brandId" => 2,
            "price" => 795,
            "image" => "shop-12.jpg",
            "imageHover" => "shop-1212.jpg",
            "description" => "Case Size: 35.00 mm, Band Width: 16, Case Thickness: 9.75 mm. Swiss automatic movement, 316L stainless steel case, Index + Arabic dial type"
        ],
        [
            "name" => "Classic Fusion Automatic Blue Sunray Dial Titanium Men's Watch",
            "brandId" => 3,
            "price" => 6150,
            "image" => "shop-13.jpg",
            "imageHover" => "shop-1313.jpg",
            "description" => "STUNNING Hublot Classic Fusion 45 in Titanium with the Blue Dial on Dark Blue Alligator Strap & Deploy Clasp!"
        ],
        [
            "name" => "Classic Fusion Titanium Black Dial Black Rubber Ladies Watch",
            "brandId" => 3,
            "price" => 4325,
            "image" => "shop-14.jpg",
            "imageHover" => "shop-1414.jpg",
            "description" => "Titanium case with a black rubber strap. Fixed titanium bezel. Black composite resin bezel lug sandwiched between the bezel and case. Black dial with rhodium-plated hands and index hour markers."
        ],
        [
            "name" => "Georgia Beige Dial Sand Tan Leather Ladies Watch",
            "brandId" => 4,
            "price" => 164.95,
            "image" => "shop-15.jpg",
            "imageHover" => "shop-1515.jpg",
            "description" => "Stainless steel case with a sand tan leather strap. Fixed stainless steel bezel. Beige dial with luminous silver-tone hands and index hour markers. Arabic numerals mark the 6 and 12 o'clock positions."
        ],
        [
            "name" => "Star Classique Date Stainless Steel Brown Leather Men's Watch",
            "brandId" => 10,
            "price" => 2290,
            "image" => "shop-16.jpg",
            "imageHover" => "shop-1616.jpg",
            "description" => "Stainless steel case with a brown (alligator) leather strap. Fixed stainless steel bezel. Silver dial with silver-tone hands and stick hour markers. An Arabic numeral appears at the 12 o'clock position."
        ],

    ];
    public function run()
    {
        foreach ($this->products as $product)
            Product::create($product);
    }
}

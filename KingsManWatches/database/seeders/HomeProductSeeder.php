<?php

namespace Database\Seeders;

use App\Models\homeProducts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $homeProducts = [
        [
            "brandId"=>1,
            "image"=>"grid-1.jpg"
        ],
        [
            "brandId"=>6,
            "image"=>"grid2.jpg"
        ],
        [
            "brandId"=>2,
            "image"=>"grid3.jpg"
        ],
        [
            "brandId"=>7,
            "image"=>"grid4.jpg"
        ],
        [
            "brandId"=>3,
            "image"=>"grid5.jpg"
        ],
        [
            "brandId"=>5,
            "image"=>"grid6.jpg"
        ],
    ];
    public function run()
    {
        foreach ($this->homeProducts as $homeProducts)
            homeProducts::create($homeProducts);
    }
}

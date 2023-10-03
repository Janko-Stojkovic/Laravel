<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $brands = [
        [
            "name"=>"Rolex"
        ],
        [

            "name"=>"Tissot"
        ],

        [
            "name"=>"Hublot"
        ],
        [
            "name"=>"Fossil"
        ],
        [
            "name"=>"Tommy Hilfiger"
        ],
        [
            "name"=>"Bvlgari"
        ],
        [
            "name"=>"Citizen"
        ],
        [
            "name"=>"Patek Philippe"
        ],
        [
            "name"=>"Cartier"
        ],
        [
            "name"=>"Montblanc"
        ],
        [
            "name"=>"Piaget"
        ],
        [
            "name"=>"Casio"
        ]
    ];
    public function run()
    {
        foreach ($this->brands as $brand)
            Brand::create($brand);
    }
}

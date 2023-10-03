<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $navLinks = [
        [
            "name" => "Home",
            "route" => "home",
            "order" => 1,
            "admin" => 0
        ],
        [
            "name" => "About",
            "route" => "about",
            "order" => 2,
            "admin" => 0
        ],
        [
            "name" => "Shop",
            "route" => "shop",
            "order" => 3,
            "admin" => 0
        ],
        [
            "name" => "Contact",
            "route" => "contact",
            "order" => 4,
            "admin" => 0
        ],
        [
            "name" => "Dashboard",
            "icon" => 'fas fa-tachometer-alt',
            "route" => "admin.dashboard",
            "order" => 1,
            "admin" => 1
        ],
        [
            "name" => "Actions",
            "icon" => 'fas fa-tasks',
            "route" => "admin.actions",
            "order" => 2,
            "admin" => 1
        ],
        [
            "name" => "Users",
            "icon" => 'fa fa-user',
            "route" => "admin.users.index",
            "order" => 3,
            "admin" => 1
        ],

        [
            "name" => "Products",
            "icon" => 'fas fa-equals',
            "route" => "admin.products.index",
            "order" => 4,
            "admin" => 1
        ],
        [
            "name" => "Brands",
            "icon" => 'fas fa-equals',
            "route" => "admin.brands.index",
            "order" => 5,
            "admin" => 1
        ],
        [
            "name" => "Orders",
            "icon" => 'fas fa-shopping-cart',
            "route" => "admin.orders",
            "order" => 6,
            "admin" => 1
        ]
    ];

    public function run()
    {
        foreach($this->navLinks as $nl)
            \DB::table("menus")->insert($nl);
    }
}

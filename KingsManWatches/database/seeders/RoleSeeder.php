<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $roles = [
        [
            "name" => "user"
        ],
        [
            "name" => "admin"
        ]
    ];

    public function run()
    {
        \DB::table("roles")->insert($this->roles);
    }
}

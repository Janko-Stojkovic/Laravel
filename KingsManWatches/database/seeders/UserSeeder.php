<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "username" => "test1",
                "email" => "test1@gmail.com",
                "password" => md5('test1'),
                "role_id" => 1
            ],
            [
                "username" => "test2",
                "email" => "test2@gmail.com",
                "password" => md5(env('test2')),
                "role_id" => 1
            ],
            [
                "username" => "testAdmin1",
                "email" => "admin1@gmail.com",
                "password" => md5('admin1'),
                "role_id" => 2
            ],
            [
                "username" => "testAdmin2",
                "email" => "admin2@gmail.com",
                "password" => md5('admin2'),
                "role_id" => 2
            ]
        ];

        foreach($users as $u) {
            $u["created_at"] = now();
            \DB::table("users")->insert($u);
        }
    }
}

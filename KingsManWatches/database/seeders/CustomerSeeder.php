<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $customers = [
        [
            "name"=>'Lora Grill',
            "image"=>"c2.jpg",
            "feedback"=>"Get closer than ever to your customers. So close, in fact, that you tell them what they need well before they realize it themselves."
        ],
        [
            "name"=>'Smith Roy',
            "image"=>"c1.jpg",
            "feedback"=>"A satisfied customer
									 is one who will continue to buy from you,
									  seldom shop around, refer other customers and in general
									 be a superstar advocate for your business."
        ],
        [
            "name"=>'John Lee',
            "image"=>"c3.jpg",
            "feedback"=>"I always want to know whether the customers are satisfied;
									customer satisfaction is, after all, my ultimate goal!"
        ],
        [
            "name"=>'Steve Jobs',
            "image"=>"c4.jpg",
            "feedback"=>"There is
									 a big difference between a satisfied customer
									 and a loyal customer. Never settle for ‘satisfied’"
        ]

    ];
    public function run()
    {
        foreach ($this->customers as $customers)
            Customer::create($customers);
    }
}

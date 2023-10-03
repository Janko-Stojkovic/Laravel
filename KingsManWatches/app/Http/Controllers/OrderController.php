<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends ClientController
{
    private $orderModel;
    public function details($id) {
        $this->orderModel = new Order();
        $this->data['details'] = $this->orderModel->details($id);
        $this->data['nav'] = $this->navModel->getAdminNav();
        $this->data['pages'] = [
            [
                "name" => "Orders",
                "route"=> "admin.orders"
            ],
            [
                "name" => "Order details"
            ]
        ];

        return view('pages.admin.orders.details', $this->data);
    }
}

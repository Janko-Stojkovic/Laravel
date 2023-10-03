<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\homeProducts;
use App\Models\Product;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;


class FrontendController extends ClientController
{

    public function home(){
        $homeProductModel = new homeProducts();
        $customerModel = new Customer();
        $this->data["homeProducts"] = $homeProductModel->brands();
        $this->data["customers"] = $customerModel->get();
        return view('pages.client.home',$this->data);
    }
    public function create(){

        $brandModel = new Brand();
        $this->data['brands'] = $brandModel->get();
        return view('pages.client.create',$this->data);
    }

    public function about(){
        return view('pages.client.about',$this->data);
    }

    public function loginForm(){
        return view('pages.client.login');
    }
    public function registration(){
        return view('pages.client.register');
    }

    public function cart(){
        return view('pages.client.cart',$this->data);
    }
}


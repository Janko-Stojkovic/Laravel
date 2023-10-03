<?php

namespace App\Http\Controllers;

use App\Models\Menu;

use Illuminate\Http\Request;

class ClientController extends BaseController
{
    public $navModel;

    public function __construct() {
        parent::__construct();

        $this->navModel = new Menu();
        $this->data['nav'] = $this->navModel->getClientNav();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public static function getClientNav() {
        return Menu::where("admin", false)->orderBy("order")->get();
    }

    public static function getAdminNav() {
        return Menu::where("admin", true)->orderBy("order")->get();
    }

}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class homeProducts extends Model
{
    use HasFactory;
    protected $table = 'home_products';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function brands(){
        $query = DB::table("home_products");

        $query = $query->join("brands as b", "home_products.brandId","=","b.id");
        $query = $query->select("home_products.*","b.name");
        return $query->get();
    }

}

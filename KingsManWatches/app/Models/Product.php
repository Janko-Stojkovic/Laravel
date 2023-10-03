<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    public function get(Request $request) {


        $query = DB::table("products");

        $query = $query->join("brands as b", "products.brandId","=","b.id");

        if($request->has("brandIds[]")){
            $query = $query->whereIn("products.brandId",$request->get("brandIds[]"));

        }

        if ($request->has("keyword")){
            $query = $query->where("products.productName","like", "%". $request->get("keyword") ."%");
            $query = $query->orWhere("b.brandName","like", "%". $request->get("keyword") ."%");
        }
        $query = $query->select("products.*","b.brandName as brandName");
        if ($request->has("sort")){
            if($request->get("sort")=="asc"){
                $query = $query->orderBy("price");
            }else if($request->get("sort")=="desc"){
                $query = $query->orderByDesc("price");
            }
            else{
                $query = $query->orderBy("id");
            }
        }
        else{
            $query = $query->orderBy("products.id");
        }

        return $query->paginate(8)->appends([
            "keyword"=>$request->get("keyword"),
            "sort"=>$request->get("sort"),
            "brandIds[]"=>$request->get("brandIds[]")
        ]);

    }

    public function getAll() {
        return \DB::table('products')->join("brands as b", "products.brandId","=","b.id")
            ->select("products.*","b.name as brandName")
            ->orderBy('name')
            ->paginate(5);
    }


    public function myDelete($id) {
        \DB::table('products')->delete($id);
    }
}

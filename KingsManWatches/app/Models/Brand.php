<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function get() {
        return \DB::table('brands')->paginate(10);
        return $this->belongsToMany(Product::class);
    }
    public function homeProducts(){
        return $this->belongsTo(homeProducts::class, "brandId","id");
    }
    public function take($onlyListed = false) {
        $query = \DB::table("brands")->orderBy("name");

        if($onlyListed)
            $query->where("listed", true);

        return $query->get();
    }

    public function find($id) {
        return \DB::table('brands')->find($id);
    }

    public function insert($name, $listed) {
        \DB::table('brands')->insert([
            "brandName" => $name,
            "listed" => $listed,
            "created_at" => now()
        ]);
    }

    public function myUpdate($id, $name, $listed) {
        \DB::table('brands')
            ->where('id', $id)
            ->update([
                "brandName" => $name,
                "listed" => $listed,
                "updated_at" => now()
            ]);
    }

    public function myDelete($id) {
        \DB::table('brands')->delete($id);
    }

}

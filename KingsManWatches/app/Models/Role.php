<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public function get() {
        return \DB::table("roles")->get();
        return $this->belongsToMany(User::class);
    }
}

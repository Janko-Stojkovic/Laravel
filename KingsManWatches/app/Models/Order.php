<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function get() {
        return \DB::table('orders as o')
            ->join('users as u', 'o.user_id', '=', 'u.id')
            ->join('order_details as op', 'o.id', '=', 'op.order_id')
            ->join('products as p', 'op.product_id', '=', 'p.id')
            ->groupBy(['o.id', 'o.address', 'u.username', 'o.created_at', 'o.updated_at','o.total'])
            ->select(['o.id', 'o.address', 'u.username', 'o.created_at', 'o.updated_at', 'o.total'])
            ->paginate(5);
    }
    public function getCount() {
        return \DB::table('orders')
            ->count();
    }
    public function getTotalEarnings() {
        return \DB::table('orders as o')
            ->join('order_details as op', 'o.id', '=', 'op.order_id')
            ->sum(\DB::raw('op.unitPrice * op.quantity'));
    }

    public function details($id) {
        return \DB::table('order_details as op')
            ->join('products as p', 'op.id', '=', 'p.id')
            ->where('op.order_id', $id)
            ->paginate(5);
    }

}

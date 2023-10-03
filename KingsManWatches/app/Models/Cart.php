<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    private $cartLimit = 10;

    public function addItem($userId, $foodId) {
        $alreadyInCart = \DB::table('cart')
            ->where('user_id', $userId)
            ->where('food_id', $foodId)
            ->first();

        if($alreadyInCart) {
            $newAmount = $alreadyInCart->amount + 1;

            if($alreadyInCart->amount >= $this->cartLimit)
                $newAmount = $this->cartLimit;

            \DB::table('cart')
                ->where('id', $alreadyInCart->id)
                ->update([
                    'amount' => $newAmount,
                    'updated_at' => now()
                ]);
        } else {
            \DB::table('cart')
                ->insert([
                    'user_id' => $userId,
                    'food_id' => $foodId,
                    'amount' => 1,
                    'created_at' => now()
                ]);
        }
    }

    public function change($userId, $cartId, $action) {
        $alreadyInCart = \DB::table('cart')
            ->where('id', $cartId)
            ->where('user_id', $userId)
            ->first();

        if(!$alreadyInCart)
            return false;

        $oldAmount = $alreadyInCart->amount;

        if($action === 'increase') {
            if($oldAmount >= $this->cartLimit)
                $newAmount = $this->cartLimit;
            else
                $newAmount = $oldAmount + 1;

            \DB::table('cart')
                ->where('id', $cartId)
                ->update([
                    'amount' => $newAmount,
                    'updated_at' => now()
                ]);
        } else if($action === 'decrease') {
            if($oldAmount === 1)
                $newAmount = 1;
            else
                $newAmount = $oldAmount - 1;

            \DB::table('cart')
                ->where('id', $cartId)
                ->update([
                    'amount' => $newAmount,
                    'updated_at' => now()
                ]);
        } else if($action === 'remove') {
            \DB::table('cart')->delete($cartId);
        } else {
            return false;
        }

        return true;
    }

    public function getItems($userId, $brandId) {
        return \DB::table('cart as c')
            ->join('products as p', 'c.product_id', '=', 'p.id')
            ->where('p.brandId', $brandId)
            ->where('c.user_id', $userId)
            ->select(["p.*", 'c.amount', 'c.id as cart_id'])
            ->get();
    }

    public function empty($items) {
        $idsToRemove = [];

        foreach($items as $i)
            $idsToRemove[] = $i->cart_id;

        \DB::table('cart')
            ->whereIn('id', $idsToRemove)
            ->delete();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckOutRequest;
use App\Models\Cart;
use App\Models\Invoice;
use App\Models\InvoiceLine;
use App\Models\Order;
use App\Models\OrderedProduct;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index(){
        return view("client.cart");
    }

    public function addToCart(Request $request, $productId){
        try {
            $product = Product::findOrFail($productId);
            $userId = $request->session()->get('user')->id;

            $cartItems = session()->get("cartItems");

            if(!$cartItems){
                $cartItems = [];
            }

            $existingIndex = null;

            foreach ($cartItems as $index=>$item){
                if($item->product->id == $productId){
                    $existingIndex = $index;
                    break;
                }
            }

            if ($existingIndex !== null){
                $cartItems[$existingIndex]->quantity++;
            }
            else{
                $cartItem = new \Stdclass();
                $cartItem->quantity = 1;
                $cartItem->product=$product;
                array_push($cartItems,$cartItem);

            }

            session()->put("cartItems",$cartItems);
            $this->logAction('User added ' . $product->find($productId)->name . " (ID: $productId)" . ' to their cart.', $request, $userId);
            return redirect()->back()->with('messages', ['Item added to cart.']);
        }
        catch(\Exception $ex) {
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $ex->getMessage());
            return redirect()->back()->withErrors(["We encountered an error.", 'Error ID: ' . $uniqueId]);
        }


    }
    public function removeFromCart($productId){
        try {
            $existingIndex = null;

            $cartItems = session()->get("cartItems");

            if(!$cartItems){
                $cartItems = [];
            }

            foreach ($cartItems as $index=>$item){
                if($item->product->id == $productId){
                    $existingIndex = $index;
                    break;
                }
            }
            if ($existingIndex !== null){
                unset($cartItems[$existingIndex]);
                session()->put("cartItems",$cartItems);
                return response()->json([],204);
            }
            return response()->json(["message"=>"Can't remove that item because it's not in the cart"],409);
        }
        catch(\Exception $ex) {
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $ex->getMessage());
            return redirect()->back()->withErrors(["We encountered an error.", 'Error ID: ' . $uniqueId]);
        }



    }
    public function changeProductQuantity(Request $request){
        try {
            $productId = $request->get("productId");
            $quantity = $request->get("quantity");

            $existingIndex = null;

            $cartItems = session()->get("cartItems");

            if(!$cartItems){
                $cartItems = [];
            }

            foreach ($cartItems as $index=>$item){
                if($item->product->id == $productId){
                    $existingIndex = $index;
                    break;
                }
            }
            if ($existingIndex !== null){
                $cartItems[$existingIndex]->quantity = $quantity;
                session()->put("cartItems",$cartItems);
                return response()->json([],204);
            }

            return response()->json(["message"=>"Can't remove that item because it's not in the cart"],409);
        }
        catch(\Exception $ex) {
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $ex->getMessage());
            return redirect()->back()->withErrors(["We encountered an error.", 'Error ID: ' . $uniqueId]);
        }


    }

    public function checkout(CheckOutRequest $request) {
        $cartItems = session()->get("cartItems");

        $order = new Order();

        $order->id = Order::max("id") + 1;
        $order->user_id = session()->get("user")->id;
        $order->address = $request->address;
        $order->created_at = Carbon::now();

        $lines = [];
        $total = 0;

        $lastLineId = OrderedProduct::max("id");

        foreach($cartItems as $ci) {
            $line = new OrderedProduct();

            $line->product_id = $ci->product->id;
            $line->unitPrice = $ci->product->price;
            $line->quantity = $ci->quantity;
            $line->id = ++$lastLineId;
            $line->order_id = $order->id;
            $lines[] = $line;
            $total += $line->quantity * $line->unitPrice;

        }

        $order->total = $total;

        try {
            \DB::beginTransaction();

            $order->save();

            foreach($lines as $l) {
                $l->save();
            }
            \DB::commit();

            session()->remove("cartItems");

            return redirect()->route('shop')->with('messages', ['Your order was created successfully.']);
        }catch (\Exception $e) {
            \DB::rollBack();
            \Log::error($e->getMessage());
            return redirect()->back()->withErrors(['We encountered an error.']);
        }
    }
}

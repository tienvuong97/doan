<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use Mail;


class CartController extends Controller
{
    //

    public function getAdd($id, Request $request)
    {
        $product = Product::find($id);
        if ($request->qty) {
            $qty = $request->qty;
        } else $qty = 1;
        if ($product->promotional > 0) {
            $price = $product->promotional;
        } else {
            $price = $product->price;
        }
        Cart::add(array('id' => $id, 'name' => $product->name, 'quantity' => $qty, 'price' => $price, 'attributes' => array('img' => $product->image)));
        return response()->json([200, array(
            'status' => true,
            'data' => Cart::getTotalQuantity() 
        )]);
    }
    public function getPrice(Request $request, $id)
    {
        if ($request->quantity) {
            Cart::update($id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                )
            ));
            return response()->json([
                'total' => Cart::getTotal()
            ]);
        }
    }
    public function getDeleteCart($id)
    {
        Cart::remove($id);
        return back();
    }
}

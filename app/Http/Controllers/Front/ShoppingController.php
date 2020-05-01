<?php

namespace App\Http\Controllers\Front;

use Cart;
use Session;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShoppingController extends Controller
{
    public function add_to_cart()
    {
        $pdt = Product::find(request()->pdt_id);
        //dd($pdt);

        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->title,
            'image' => $pdt->thumb_image,
            'qty' => request()->qty,
            'price' => $pdt->price,
            'weight' => 0
        ]);

        //dd(Cart::content());

        Cart::associate($cartItem->rowId, 'App\Product');
        Session::flash('success', 'Product added to cart.');

        return redirect()->route('cart');
    }    


    public function cart()
    {
        //Cart::destroy();
        return view('front.cart');
    }

    public function cart_delete($id)
    {
        Cart::remove($id);

        Session::flash('success', 'Product removed from cart.');
        return redirect()->back();
    }

    public function incr($id, $qty)
    {
        Cart::update($id, $qty + 1);

        Session::flash('success', 'Product qunatity updated.');

        return redirect()->back();
    }
    public function decr($id, $qty)
    {
        Cart::update($id, $qty - 1);

        Session::flash('success', 'Product qunatity updated.');

        return redirect()->back();
    }
    public function rapid_add($id)
    {
        $pdt = Product::find($id);

        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->title,
            'qty' => 1,
            'price' => $pdt->price,
            'weight' => 0
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

        Session::flash('success', 'Product added to cart.');

        return redirect()->route('cart');
    }

}

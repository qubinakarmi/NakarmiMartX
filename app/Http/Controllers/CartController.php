<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;


use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function AddToCart(Request $request)
    {

        $cart = new Cart();
        $cart->user_id = Auth::id(); // automatically logged-in user's ID
        $cart->product_id = $request->product_id;
        $cart->save();

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    static function cartItem()
    {
        $userId = Auth::id();
        return Cart::where('user_id', $userId)->count();
    }

    function cartList()
    {
        $userId = Auth::id();
        $data =  DB::table('carts')
            ->join('products', 'carts.product_id', 'products.id')
            ->select('products.*', 'carts.id as cart_id')
            ->where('carts.user_id', $userId)
            ->get();

        return view('cartlist', ['products' => $data]);
    }


    function removeCart($id)
    {
        cart::destroy($id);

        return redirect(route('cart.list'))->with('danger', 'cart has been deleted');
    }

    function orderNow()
    {
        $userId = Auth::id();
        $total =  DB::table('carts')
            ->join('products', 'carts.product_id', 'products.id')
            ->where('carts.user_id', $userId)
            ->sum('products.amount');

        return view('orderlist', ['total' => $total]);
    }

    function placeOrder(Request $request)
    {
        $userId = Auth::id();
        $allcart = Cart::where('user_id', $userId)->get();
        foreach ($allcart as $cart) {
            $order = new Order();
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->address = $request->address;
            $order->status = "pending";
            $order->payment_method = $request->payment;
            $order->payment_status = "pending";
            $order->save();
        }

        Cart::where('user_id', $userId)->delete();
        return redirect()->intended(route('home'));
    }
    function myOrder()
    {
         $userId = Auth::id();
        $total =  DB::table('orders')
            ->join('products', 'orders.product_id', 'products.id')
            ->where('orders.user_id', $userId)
            ->get();


        return view('orders', ['products' => $total]);

    }

    function search(Request $request)

    {
        $data=$request->search;
        $products=Product::where('title','LIKE',"%{$data}%" )->paginate(2)
        ;
        return view('search',compact('products')) ;
    }
}

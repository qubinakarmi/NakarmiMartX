<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




class UserController extends Controller
{
    function newProduct(Request $request)
    {
        $product = new Product();
        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file('file')->extension();
            $request->file('file')->move(public_path('product_images'), $fileName);
        }
        $product->image = $fileName;
        $product->title = $request->title;
        $product->amount = $request->amount;
        $product->category = $request->category;

        if ($product->save()) {
            return redirect()->back()->with('success', 'Product added successfully!');
        }
    }

    // function showProduct()
    // {
    //     $products = Product::all();
    //     return view('home', compact('products'));
    // }

    public function home()
    {
        // Get only top deals
        $products = Product::where('is_top_deal', true)->get();

        return view('home', compact('products'));
    }


    public function mobiles()
    {

        $products = Product::where('category', 'mobiles')->get();

        return view('mobiles', compact('products'));
    }

    public function fashions()
    {
        // Get only top deals
        $products = Product::where('category', 'fashions')->get();

        return view('fashions', compact('products'));
    }

    public function electronics()
    {
        // Get only top deals
        $products = Product::where('category', 'electronics')->get();

        return view('electronics', compact('products'));
    }

    public function furnitures()
    {
        // Get only top deals
        $products = Product::where('category', 'furnitures')->get();

        return view('furnitures', compact('products'));
    }

    public function grocery()
    {
        // Get only top deals
        $products = Product::where('category', 'grocery')->get();

        return view('grocery', compact('products'));
    }





    function addProduct()
    {
        return view('addProduct');
    }

    function contact(Request $request)

    {
        $contact = new Contact();
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->message = $request->message;
        if ($contact->save()) {
            return redirect()->intended(route('contact'))->with('success', 'Your contact form has been received');
        }




        return $request->message;
    }

    public function cart() {}
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
        $userId=Auth::id();
        return Cart::where('user_id',$userId)->count();
    }

    function cartList()
    {
        $userId=Auth::id();
       $data=  DB::table('carts')
        ->join('products','carts.product_id','products.id')
        ->select('products.*')
        ->where('carts.user_id',$userId)
        ->get();

        return view('cartlist',['products'=>$data]);
    }

    function cartDelete($id)

    {
        $delete_cart=Cart::Destroy($id);
        if($delete_cart)
        {
            return redirect()->intended(route('cart.list'))->with('danger','item has been deleted');
        }
    }

    
}

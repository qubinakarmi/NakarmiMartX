<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

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
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Contact;





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


    public function category($category)
    {
        $data = $category;
        $products = Product::where('category', $category)->paginate(2);
        return view('category', compact('products', 'category', 'data'));
    }


    public function home()
    {
        // Get only top deals
        $products = Product::where('is_top_deal', true)->orderBy('created_at', 'desc')->get();

        return view('home', compact('products'));
    }

    function addProduct()
    {
        return view('addProduct');
    }



    function contact(Request $request)

    {

        $validated = $request->validate([
            'email' => 'required|email',
            'phone' => 'required|max:10',
            'address' => 'required|min:10',
            'message' => 'required',


        ]);


        Contact::create($validated);

        return redirect()->route('contact')
            ->with('success', 'Your contact form has been received!');
    }
}

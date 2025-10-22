<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
  public function showByCategory($category)
{
    // Fetch only products that match the selected category (e.g., 'mobile')
    $products = Product::where('category', $category)->get();

    // Pass to view
    return view('home', compact('products', 'category'));
}

}

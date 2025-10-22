<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

  // Example: ProductController.php
public function category($slug)
{
    // Fetch products based on category
    $products = Product::where('category_slug', $slug)->get();

    // Convert slug to proper title
    $categoryTitle = ucwords(str_replace('-', ' ', $slug));

    return view('products.category', compact('products', 'categoryTitle'));
}

  public function showByCategory($category)
{
    // Fetch only products that match the selected category (e.g., 'mobile')
    $products = Product::where('category', $category)->get();

    // Pass to view
    return view('home', compact('products', 'category'));
}

}

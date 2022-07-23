<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGalery;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() 
    {
        return view('product', [
            'items' => Product::with('category')->filter(request(['category', 'search']))->latest()->get(), 
        ]);
    }

    public function details($id)
    {
        $item = Product::with('category')->findOrFail($id);
        $gallery = ProductGalery::latest()->where('products_id', $id)->get();
        $product = Product::with('category')->latest()->limit(4)->get();
        return view('product-details', [
            'item' => $item, 
            'galleries' => $gallery, 
            'products' => $product
        ]);
    }
}

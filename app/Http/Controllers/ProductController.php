<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductGalery;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() 
    {
        return view('product', [
            'items' => Product::all(), 
        ]);
    }
}

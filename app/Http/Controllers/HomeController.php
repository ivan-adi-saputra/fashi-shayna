<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $item = Product::with('category')->latest()->limit(4)->get();
        return view('home', [
            'items' => $item
        ]);
    }
}

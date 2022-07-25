<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductGalery;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index() 
    {
        return view('product', [
            'items' => Product::with('category')->filter(request(['category', 'search']))->latest()->paginate(8)->withQueryString() , 
            'categories' => Category::all()
        ]);
    }

    public function details($id)
    {
        $item = Product::with('category')->findOrFail($id);
        $gallery = ProductGalery::latest()->where('products_id', $id)->get();
        $relatedProduct = Product::withCount('category')->take(4)->get();
        $comment = Comment::all();
        return view('product-details', [
            'item' => $item, 
            'galleries' => $gallery, 
            'products' => $relatedProduct, 
            'comments' => $comment 
        ]);
    }

    public function comment(Request $request ,$id)
    {
        $data = $request->validate([
            'description' => 'required'
        ]);
        $data['products_id'] = $id;
        $data['users_id'] = auth()->user()->id;
        $data['name'] = auth()->user()->name;

        Comment::create($data); 
        return redirect()->back();

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with(['user', 'product'])->where('users_id', auth()->user()->id)->get();
        return view('shopping-cart', [
            'carts' => $carts
        ]);
    }

    public function cart($id)
    {
        $data = [
            'products_id' => $id,
            'users_id' => auth()->user()->id
        ];

        Cart::create($data);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $data = Cart::findOrFail($id); 
        $data->delete();

        return redirect()->back();
    }
}

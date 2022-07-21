<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\ProductGalery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Product::where('user_id', auth()->user()->id)->with('category')->get();
        return view('dashboard.pages.product.index', [
            'items' => $item
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.product.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['user_id'] = auth()->user()->id;
        $data['photo'] = $request->file('photo')->store('img');

        Product::create($data);

        return redirect()->route('products.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Product::with('category')->findOrFail($id);
        return view('dashboard.pages.product.edit', [
            'item' => $item, 
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->except(['_method', '_token']); 
        $data['slug'] = Str::slug($request->name); 
        $data['user_id'] = auth()->user()->id;
        if( $request->file('photo') ){
            if ( $product->photo ) {
                Storage::delete($product->photo);
            }
            $data['photo'] = $request->file('photo')->store('img');
        }

        // $item = Product::findOrFail($id);
        // $item->update($data);
        Product::where('id', $product->id)
                  ->update($data);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if( $product->photo ){
            Storage::delete($product->photo);
        }
        Product::destroy($product->id);

        return redirect()->route('products.index');
    }

    public function gallery($id)
    {
        $product = Product::findOrFail($id);
        $items = ProductGalery::with('product')->where('products_id', $id)->get();
        return view('dashboard.pages.product.gallery', [
            'product' => $product, 
            'items' => $items
        ]);
    }
}

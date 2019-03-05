<?php

namespace App\Http\Controllers\Backend;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.product.index')
            ->withProducts(Product::latest()->paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'price'=> 'required|integer',
            'description' => 'required',
            'featured_image' => 'required|image|mimes:jpg,jpeg|max:2048',
        ]);

        $product = new Product();
        $product->fill($request->all());

        $product->addMedia($request->featured_image)
                ->toMediaCollection('featured image');

        $product->push();

        return redirect()->route('admin.products.index')
                ->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('backend.product.show')
            ->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend.product.edit')
            ->withProduct($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'price'=> 'required|integer',
            'description' => 'required',
            'featured_image' => 'image|mimes:jpg,jpeg|max:2048',
        ]);

        $product->fill($request->all());

        if (isset($request->featured_image)) {
            $product->addMedia($request->featured_image)
                    ->toMediaCollection('featured image');
        }

        $product->push();

        return redirect()->route('admin.products.index')
                ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'Product deleted successfully');
    }
}

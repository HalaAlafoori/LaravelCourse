<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products=Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        $brands=Brand::all();
        return view('products.create',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //return dd($request);
        $product = Product::findOrFail($request->id);
        $bath = "";
        if ($request->id > 0) {
            $bath = $product->image;
        }
        if ($request->hasFile('image'))
            $bath = $request->file('image')->store('products');


        $product = Product::updateOrCreate(
            [
                'id' => $request->id,

            ]
            , [
            'name' => $request->name,
            'desc' => $request->description,
            'image' => $bath,
            'brand_id' => $request->brand_id,
            'price' => $request->price,
            'status' => isset($request->status)
        ]);

        $product->categories()->sync($request->categories);
        if ($request->id > 0)
            toastr()->success('Added successfully');
        else
            toastr()->success('Updated successfully');
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        $brands=Brand::all();
        return view('products.create',compact('categories','brands','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image);

        $product->delete();
        toastr()->success("Deleted successfully");
        return redirect(route(('products.index')));
    }
}

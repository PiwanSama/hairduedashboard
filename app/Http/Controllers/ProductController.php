<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ServiceProvider;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::all();
      return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $providers = ServiceProvider::all();
      $categories = ServiceCategory::all();
       return view('products.create', compact('providers', 'categories'));
    }

    /**
     * Product a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //dd($request);
      $product = new Product;
      $product->product_name = $request->product_name;
      $product->product_price = $request->product_price;
      $product->p_service_category_id = $request->p_service_category_id;
      $product->p_service_provider_id = $request->p_service_provider_id;

      if ($request->hasFile('p_img_url')) {
          $p_img_url = $request->file('p_img_url');
          $filename = 'img_'.$p_img_url->getClientOriginalName();
          strtolower($filename);
          $p_img_url->move('images/productimages/', $filename);

          $product->p_img_url = $filename;
      }

      $product->save();
      toastr()->success('Product added successfully!');
      return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
        return Product::findOrFail($product_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
      $product = Product::find($product_id);
      $providers = ServiceProvider::all();
      $categories = ServiceCategory::all();
      return view('products.edit', compact('product','providers','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
      //Retrieve the product
      $product = Product::where('product_id', $product_id)->first();

      if ($product != null) {

          // Check if a product image has been uploaded
          if ($request->hasFile('p_img_url')) {
            $p_img_url = $request->file('p_img_url');
            $filename = 'img_'.$p_img_url->getClientOriginalName();
            strtolower($filename);
            $p_img_url->move('images/productimages/', $filename);
            $product->p_img_url = $filename;
        }

        if ($request->product_old_price) {
          $product->product_old_price = $request->product_old_price;
      }

      $product->product_name = $request->product_name;
      $product->product_price = $request->product_price;
      $product->p_service_category_id = $request->p_service_category_id;
      $product->p_service_provider_id = $request->p_service_provider_id;

        $product->save();
        toastr()->success('Product updated successfully!');
        return redirect('products');
    }

    toastr()->error('Product not found!');
    return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
      //Retrieve the product
        $product = Product::where('product_id', $product_id)->first();

        if ($product != null) {
            $product->delete();
            toastr()->success('Product deleted successfully!');
            return redirect()->route('products.index');
        }

        toastr()->error('Product not found!');
        return redirect()->route('products.index');
      }

}

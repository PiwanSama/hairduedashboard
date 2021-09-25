<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ServiceProvider;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
      $products = Product::all();
      return view('products.index', compact('products'));
    }

    public function create()
    {
      $categories = ProductCategory::all();
      $providers = ServiceProvider::all();
      return view('products.create', compact('categories','providers'));
    }

    public function store(Request $request)
    {
      $product = Product::create($request->all());
      if ($request->hasFile('p_img_url')) {
        $p_img_url = $request->file('p_img_url');
        $filename = 'img_'.$p_img_url->getClientOriginalName();
        strtolower($filename);
        $p_img_url->move('images/productimages/', $filename);
        $product->p_img_url = $filename;
        $product->save();
      }

      toastr()->success('Product added successfully!');
      return redirect('products');
    }

    public function show($product_id)
    {
        return Product::findOrFail($product_id);
    }

    public function edit($product_id)
    {
      $product = Product::find($product_id);
      $categories = ProductCategory::all();
      $providers = ServiceProvider::all();
      return view('products.edit', compact('product','categories','providers'));
    }

    public function update(Request $request, $product_id)
    {
      $product = Product::where('product_id', $product_id)->first();

      if ($product != null) {

          $product = Product::update($request->all());
          if ($request->hasFile('p_img_url')) {
            $p_img_url = $request->file('p_img_url');
            $filename = 'img_'.$p_img_url->getClientOriginalName();
            strtolower($filename);
            $p_img_url->move('images/productimages/', $filename);
            $product->p_img_url = $filename;

            $product->save();
        }

        if ($request->product_old_price) {
          $product->product_old_price = $request->product_old_price;
        }

      toastr()->success('Product updated successfully!');
      return redirect('products');
    }

    toastr()->error('Product not found!');
    return redirect()->route('products');
    }

    public function destroy($product_id)
    {
      
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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
    public function products()
    { 
      return ProductResource::collection(Product::paginate(),200);
    }

    public function product($product_id)
    {
      return new ProductResource(Product::find($product_id),200);
    }
}

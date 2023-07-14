<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        if (Product::where('status', 1)->exists()) {
            return response()->json(['product' => Product::where('status', 1)->with('photos')->get()], 200);
        } else {
            return response()->json(['product' => 'Product-is-empty'], 404);
        }
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->with('product')->first();
        if ($category->product()->exists()) {
            return response()->json([
                'category' => $category,
                'product' => $category->product()->get(),
            ], 200);
        } else {
            return response()->json(['message' => 'category-product-not-found'], 400);
        }
    }

    public function show($id)
    {
        if (Product::where('status', 1)->where('id', $id)->exists()) {
            return response()->json(['product' => Product::where('status', 1)->where('id', $id)->first()], 200);
        } else {
            return response()->json(['product' => 'product-is-not-founded'], 404);
        }
    }
}

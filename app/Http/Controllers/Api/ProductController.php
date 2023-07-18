<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{Category, Product};
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        if (Product::where('status', 1)->exists()) {
            return response()->json(['product' => Product::where('status', 1)->with('photos')->get()], 200);
        } else {
            return response()->json(['product' => 'product-is-empty'], 404);
        }
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->with('product')->first();
        if ($category->product()->exists()) {
            return response()->json([
                'product' => $category->product()->get(),
            ], 200);
        } else {
            return response()->json(['message' => 'category-product-not'], 400);
        }
    }


    public function products()
    {
        $categories = DB::table('categories')
            ->select('categories.id', DB::raw('COUNT(products.id) as product_count'))
            ->leftJoin('products', 'categories.id', '=', 'products.category_id')
            ->groupBy('categories.id')
            ->orderByDesc('product_count')
            ->limit(3)
            ->get();
        $allCategories = [];
        $trendProducts = [];
        foreach ($categories as $category) {
            $categoryArray = (array)$category;
            $newCategory = Category::find($categoryArray['id']);
            $allCategories[] = $newCategory;
        }
        foreach ($allCategories as $ac) {
            $newProduct = Product::where('category_id', $ac->id)->take(6)->get();
            $trendProducts[$ac->slug] = $newProduct;
        }
        return response()->json([
            'products' => $trendProducts,
        ]);
    }

    public function show($id)
    {
        if (Product::where('status', 1)->where('id', $id)->exists()) {
            return response()->json(['product' => Product::where('status', 1)->where('id', $id)->with('photos')->first()], 200);
        } else {
            return response()->json(['product' => 'product-is-not-founded'], 404);
        }
    }
}

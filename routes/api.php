<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return response()->json(['status' => '404']);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['name' => 'api'], function () {
    Route::get('/product', [App\Http\Controllers\Api\ProductController::class, 'index']);
    Route::get('/categories', function () {
        return response()->json([
            'categories' => \App\Models\Category::all(),
        ]);
    });
    Route::get('/product/{id}', [App\Http\Controllers\Api\ProductController::class, 'show']);
    Route::get('/category/{slug}/product', [App\Http\Controllers\Api\ProductController::class, 'category']);
    Route::get('/category/products', [App\Http\Controllers\Api\ProductController::class, 'products']);
    Route::get('/partner', [App\Http\Controllers\Api\PartnerController::class, 'index']);
    Route::get('/partner/{id}', [App\Http\Controllers\Api\PartnerController::class, 'show']);
    Route::get('/blog', [App\Http\Controllers\Api\BlogController::class, 'index']);
    Route::get('/blog/{id}', [App\Http\Controllers\Api\BlogController::class, 'show']);
    Route::get('/settings', function () {
        return App\Models\Setting::all();
    });
    Route::post('contact', [App\Http\Controllers\Api\ContactController::class, 'store']);
    Route::get('settings', [App\Http\Controllers\Api\SettingsController::class, 'index']);
    Route::get('settings/{name}', [App\Http\Controllers\Api\SettingsController::class, 'show']);
    Route::get('about', [App\Http\Controllers\Api\AboutController::class, 'index']);
    Route::get('about/{id}', [App\Http\Controllers\Api\AboutController::class, 'show']);
    Route::get('slider', [App\Http\Controllers\Api\SliderController::class, 'index']);
    Route::get('slider/{id}', [App\Http\Controllers\Api\SliderController::class, 'show']);
    Route::get('/search/{keyword}', [App\Http\Controllers\Api\SearchController::class, 'search']);
});

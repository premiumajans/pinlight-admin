<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:admin', 'as' => 'backend.'], function () {
    Route::get('/', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('index');
    Route::get('delete/photo/{model}/{id}', [App\Http\Controllers\Backend\HomeController::class, 'deletePhoto'])->name('deletePhoto');
    Route::group(['name' => 'status'], function () {
        Route::get('partner/{id}/change-status', [App\Http\Controllers\Backend\PartnerController::class, 'status'])->name('partnerStatus');
        Route::get('product/{id}/change-status', [App\Http\Controllers\Backend\ProductController::class, 'status'])->name('productStatus');
        Route::get('blog/{id}/change-status', [App\Http\Controllers\Backend\BlogController::class, 'status'])->name('blogStatus');
        Route::get('about/{id}/change-status', [App\Http\Controllers\Backend\AboutController::class, 'status'])->name('aboutStatus');
        Route::get('site-language/{id}/change-status', [App\Http\Controllers\Backend\System\SiteLanguageController::class, 'siteLanStatus'])->name('site-languagesStatus');
        Route::get('categories/{id}/change-status', [App\Http\Controllers\Backend\CategoryController::class, 'categoryStatus'])->name('categoryStatus');
        Route::get('slider/{id}/change-status', [App\Http\Controllers\Backend\SliderController::class, 'sliderStatus'])->name('sliderStatus');
        Route::get('permissions/{id}/change-status', function () {
            return redirect()->back();
        })->name('permissionsStatus');
    });
    Route::group(['name' => 'delete'], function () {
        Route::get('partner/{id}/delete', [App\Http\Controllers\Backend\PartnerController::class, 'delete'])->name('partnerDelete');
        Route::get('product/{id}/delete', [App\Http\Controllers\Backend\ProductController::class, 'delete'])->name('productDelete');
        Route::get('blog/{id}/delete', [App\Http\Controllers\Backend\BlogController::class, 'delete'])->name('blogDelete');
        Route::get('about/{id}/delete', [App\Http\Controllers\Backend\AboutController::class, 'delete'])->name('aboutDelete');
        Route::get('/site-languages/{id}/delete', [App\Http\Controllers\Backend\System\SiteLanguageController::class, 'delSiteLang'])->name('site-languagesDelete');
        Route::get('/categories/{id}/delete', [App\Http\Controllers\Backend\CategoryController::class, 'delCategory'])->name('delCategory');
        Route::get('/contact-us/{id}/delete', [App\Http\Controllers\Backend\ContactController::class, 'delContactUS'])->name('delContactUS');
        Route::get('/users/{id}/delete', [App\Http\Controllers\Backend\AdminController::class, 'delAdmin'])->name('delAdmin');
        Route::get('/slider/{id}/delete', [App\Http\Controllers\Backend\SliderController::class, 'delSlider'])->name('sliderDelete');
        Route::get('/report/{id}/delete', [App\Http\Controllers\Backend\System\ReportController::class, 'delReport'])->name('delReport');
        Route::get('/report/clean-all', [App\Http\Controllers\Backend\System\ReportController::class, 'cleanAllReport'])->name('cleanAllReport');
        Route::get('/permission/{id}/delete', [App\Http\Controllers\Backend\System\PermissionController::class, 'delPermission'])->name('permissionsDelete');
    });
    Route::group(['name' => 'resource'], function () {
        Route::resource('/partner', App\Http\Controllers\Backend\PartnerController::class);
        Route::resource('/product', App\Http\Controllers\Backend\ProductController::class);
        Route::resource('/blog', App\Http\Controllers\Backend\BlogController::class);
        Route::resource('/categories', App\Http\Controllers\Backend\CategoryController::class);
        Route::resource('/contact-us', App\Http\Controllers\Backend\ContactController::class);
        Route::resource('/about', App\Http\Controllers\Backend\AboutController::class);
        Route::resource('/slider', App\Http\Controllers\Backend\SliderController::class);
    });
});
Route::fallback(function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    } else {
        return view('backend.errors.404');
    }
});


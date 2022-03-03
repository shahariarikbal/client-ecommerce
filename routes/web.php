<?php

use Illuminate\Support\Facades\Route;

//=============== Basic Routes ====================//
Route::get('clear', function () {
    \Artisan::call('cache:forget spatie.permission.cache');
    \Artisan::call('view:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
    \Artisan::call('route:clear');
    dd("All clear!");
});



Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//=============== Admin Login ====================//
Route::group(['prefix' => 'admin'], function(){
    Route::get('/login', [App\Http\Controllers\Admin\AdminController::class, 'loginForm']);
    Route::post('/login', [App\Http\Controllers\Admin\AdminController::class, 'login']);
    Route::group(['middleware' => 'admin'], function(){
        Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard']);
        Route::post('/logout', [App\Http\Controllers\Admin\AdminController::class, 'logout']);

        //============ Category ================//
        Route::get('/category/manage', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
        Route::get('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
        Route::post('/category/store', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
        Route::get('/category/edit/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
        Route::post('/category/update/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
        Route::get('/category/delete/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

        //============ Brand ================//
        Route::get('/brand/manage', [App\Http\Controllers\Admin\BrandController::class, 'index']);
        Route::get('/brand/create', [App\Http\Controllers\Admin\BrandController::class, 'create']);
        Route::post('/brand/store', [App\Http\Controllers\Admin\BrandController::class, 'store']);
        Route::get('/brand/edit/{brand}', [App\Http\Controllers\Admin\BrandController::class, 'edit']);
        Route::post('/brand/update/{brand}', [App\Http\Controllers\Admin\BrandController::class, 'update']);
        Route::get('/brand/delete/{brand}', [App\Http\Controllers\Admin\BrandController::class, 'destroy']);

        //============ Product ================//
        Route::get('/product/manage', [App\Http\Controllers\Admin\ProductController::class, 'index']);
        Route::get('/product/create', [App\Http\Controllers\Admin\ProductController::class, 'create']);
        Route::post('/product/store', [App\Http\Controllers\Admin\ProductController::class, 'store']);
        Route::get('/product/edit/{product}', [App\Http\Controllers\Admin\ProductController::class, 'edit']);
        Route::post('/product/update/{product}', [App\Http\Controllers\Admin\ProductController::class, 'update']);
        Route::get('/product/delete/{product}', [App\Http\Controllers\Admin\ProductController::class, 'destroy']);
    });
});

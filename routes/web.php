<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
        Route::get('/category/add', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    });
});

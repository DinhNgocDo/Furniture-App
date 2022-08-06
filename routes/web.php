<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderDetailController;
use App\Http\Controllers\Admin\NewController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

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

Route::group([
    'prefix' => 'admin', 
], function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('handle-login');

    Route::group([
        'middleware' => [
            'auth',
            'check-admin'
        ],
    ], function() {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', [App\Http\Controllers\Admin\HomeController::class, 'dashboard'])->name('dashboard');

        Route::resources([
            'users' => UserController::class,
            'categories' => CategoryController::class,
            'sizes' => SizeController::class,
            'products' => ProductController::class,
            'orders' => OrderController::class,
            'order-details' => OrderDetailController::class,
            'news' => NewController::class,
        ]);
    
        Route::get('products/{product}/sizes', [ProductController::class, 'productFormSize'])->name('product-form-size');
        Route::post('products/{product}/sizes', [ProductController::class, 'productAddSize'])->name('product-add-size');
        Route::get('products/{product}/sizes/{product_size}', [ProductController::class, 'productEditFormSize'])->name('product-edit-form-size');
        Route::put('products/{product}/sizes/{product_size}', [ProductController::class, 'productUpdateSize'])->name('product-update-size');
        Route::delete('products/{product}/sizes/{product_size}', [ProductController::class, 'productDeleteSize'])->name('product-delete-size');
    });
});

Route::get('login-client', [HomeController::class, 'loginForm'])->name('login-client-form');
Route::post('login-client', [HomeController::class, 'login'])->name('login-client');
Route::get('register-client', [HomeController::class, 'registerForm'])->name('register-client-form');
Route::post('register-client', [HomeController::class, 'register'])->name('register-client');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('category/{category}/products', [HomeController::class, 'getProductsOfCategory'])->name('category-products');
Route::get('child-category/{category}/products', [HomeController::class, 'getProductsOfChildCategory'])->name('child-category-products');
Route::get('product/{product}', [HomeController::class, 'detailProduct'])->name('detail-product');
Route::get('search', [HomeController::class, 'searchProducts'])->name('search');
Route::get('contact-us', [HomeController::class, 'contactPage'])->name('contact-us');
Route::get('news', [HomeController::class, 'newsPage'])->name('news');
Route::get('news/{news}', [HomeController::class, 'newsDetailPage'])->name('news-details');

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('add-cart', [CartController::class, 'addCart'])->name('add-cart');
Route::get('remove-cart/{rowId}', [CartController::class, 'removeCart'])->name('remove-cart');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('update-cart');
Route::get('check-out', [CartController::class, 'getCheckOut'])->name('check-out-form');
Route::post('check-out', [CartController::class, 'checkOut'])->name('check-out');

Route::group([
    'middleware' => [
        'auth-client',
    ],
], function() {
    Route::post('logout', [HomeController::class, 'logout'])->name('logout-client');

    Route::get('order', [CartController::class, 'getOrder'])->name('user-order');
    Route::get('order-detail/{orderId}', [CartController::class, 'getOrderDetail'])->name('user-order-detail');

    Route::get('information', [HomeController::class, 'information'])->name('information');
    Route::post('change-information', [HomeController::class, 'changeInformation'])->name('change-information');
});
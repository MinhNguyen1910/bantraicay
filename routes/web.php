<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChekoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// home route
Route::group(['prefix' => ''], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/about', [HomeController::class, 'about'])->name('home.about');
    Route::get('/product', [HomeController::class, 'product'])->name('home.product');
    Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
    Route::get('/register', [HomeController::class, 'register'])->name('account.register');
    Route::post('/register', [AccountController::class, 'check_register']);

    Route::get('/category/{cat}', [HomeController::class, 'category'])->name('home.category');
    Route::get('/product-view/{product}', [HomeController::class, 'product_view'])->name('home.product_view');
});
// customer account
Route::group(['prefix' => 'account'] , function () {
    Route::get('/login', [AccountController::class, 'login'])->name('account.login');
    Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');
    Route::get('/verify-account/{email}', [AccountController::class, 'verify'])->name('account.verify');
    Route::post('/login', [AccountController::class, 'check_login']);

    Route::get('/register', [AccountController::class, 'register'])->name('account.register');
    Route::post('/register', [AccountController::class, 'check_register']);

    Route::group(['middleware' => 'customer'] ,function () {
        Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
        Route::post('/profile', [AccountController::class, 'check_profile']);

        Route::get('/change-password', [AccountController::class, 'change_password'])->name('account.change_password');
        Route::post('/change-password', [AccountController::class, 'check_change_password']);
    });
    

    Route::get('/forgot-password', [AccountController::class, 'forgot_password'])->name('account.forgot_password');
    Route::post('/forgot-password', [AccountController::class, 'check_forgot_password']);

    Route::get('/reset-password', [AccountController::class, 'reset_password'])->name('account.reset_password');
    Route::post('/reset-password', [AccountController::class, 'check_reset_password']);
    
});

// admin
Route::group(['prefix' => 'admin','middleware' =>'admin'], function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'check_login']);
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});
// manager
Route::get('/manager/login', [ManagerController::class, 'login'])->name('manager.login');
Route::post('/manager/login', [ManagerController::class, 'check_login']);

Route::get('/manager/register', [ManagerController::class, 'register'])->name('manager.register');
Route::post('/manager/register', [ManagerController::class, 'check_register']);

Route::group(['prefix' => 'manager', 'middleware' =>'auth'], function() {
    Route::get('/', [ManagerController::class, 'index'])->name('manager.index');
    Route::get('/logout', [ManagerController::class, 'logout'])->name('manager.logout');

    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/detail/{order}', [OrderController::class, 'show'])->name('order.show');
    Route::get('/order/update-status/{order}', [OrderController::class, 'update'])->name('order.update');

    Route::resources([
        'category'=> CategoryController::class,
        'product'=> ProductController::class,
    ]);
});
//cart
//  , 'middleware' => 'customer'
Route::group(['prefix' => 'cart'], function() {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::get('/add/{product}', [CartController::class, 'add'])->name('cart.add'); 
    Route::get('/delete/{product}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
});
//order
Route::group(['prefix' => 'order', 'middleware' => 'customer'], function() {
    Route::get('/checkout', [ChekoutController::class, 'checkout'])->name('order.checkout');
    Route::post('/checkout', [ChekoutController::class, 'post_checkout']);
    
    Route::get('/verify/{token}', [ChekoutController::class, 'verify'])->name('order.verify');

    Route::get('/history', [ChekoutController::class, 'history'])->name('order.history');
    Route::get('/detail/{order}', [ChekoutController::class, 'detail'])->name('order.detail');
});
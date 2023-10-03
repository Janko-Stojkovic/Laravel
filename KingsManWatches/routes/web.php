<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\DB;
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


Route::get("/login", [FrontendController::class, "loginForm"])->name("loginForm");
Route::post("/login", [LoginController::class, "login"])->name("performLogin");
Route::get("/register", [FrontendController::class, "registration"])->name("users.create");
Route::post("/registerUser", [RegisterController::class, "register"])->name("users.store");
Route::get("/", [FrontendController::class, "home"])->name("home");
Route::get("/home", [FrontendController::class, "home"])->name("home");
Route::get("/about", [FrontendController::class, "about"])->name("about");
Route::get("/shop", [ProductController::class, "index"])->name("shop");
Route::get("/contact", [ContactController::class, "index"])->name("contact");
Route::post("/contact-store", [ContactController::class, "contact"])->name("contact.store");

Route::middleware(['loggedIn'])->group(function(){

    Route::get("/logout", [LoginController::class, "logout"])->name("logout");
    Route::get("/cart", [FrontendController::class, "cart"])->name("cart");
    Route::post('/cart/add/{productid}', [CartController::class, "addToCart"]);
    Route::delete('/cart/{productid}', [CartController::class, "removeFromCart"]);
    Route::put('/cart', [CartController::class, "changeProductQuantity"]);
    Route::post('/orders-store', [CartController::class, "checkout"])->name('orders.store');
});
Route::prefix('/admin')->name('admin.')->middleware(['loggedIn', 'isAdmin'])->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', function() {
        return redirect()->route('pages.admin.dashboard');
    });
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create-store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{userID}', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/edit/{userID}-store', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/delete/{userID}', [UserController::class, 'destroy'])->name('users.delete');
    Route::get('/products', [AdminController::class, 'products'])->name('products.index');
    Route::get("/products/create", [ProductController::class, "create"])->name("products.create");
    Route::post("/products/create-store", [ProductController::class, "store"])->name("products.store");
    Route::delete("/products/delete/{productID}", [ProductController::class, "destroy"])->name("products.delete");
    Route::get('/products/edit/{productID}', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('/products/edit/{productID}-store', [ProductController::class, 'update'])->name('products.update');
    Route::get('/brands', [AdminController::class, 'brands'])->name('brands.index');
    Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
    Route::post('/brands/create-store', [BrandController::class, 'store'])->name('brands.store');
    Route::get('/brands/edit/{brandID}', [BrandController::class, 'edit'])->name('brands.edit');
    Route::patch('/brands/edit/{brandID}-store', [BrandController::class, 'update'])->name('brands.update');
    Route::delete('/brands/delete/{brandID}', [BrandController::class, 'destroy'])->name('brands.delete');
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
    Route::get('/orders/{id}', [OrderController::class, 'details'])->name('orders.details');
    Route::get('/actions', [AdminController::class, 'actions'])->name('actions');


});




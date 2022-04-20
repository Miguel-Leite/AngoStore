<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

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

Route::get('/',[HomeController::class,'index'])->name('website.index');
Route::get('/produtos',[HomeController::class,'products'])->name('website.products');
Route::get('/detalhes/produto/{productName}',[HomeController::class,'product'])->name('website.product');
Route::get('/categoria/{category}/produtos/{id}',[HomeController::class,'productsByCategory'])->name('website.products-category');
Route::get('/carrinho',[HomeController::class,'cart'])->name('website.cart');
Route::get('/conta',[HomeController::class,'login'])->name('website.login');

Route::get('/products',[ProductController::class,'getProducts'])->name('website.productsAll');

Route::get('/admin/login',[AuthController::class,'index'])->name('admin.login');
Route::post('/admin/login',[AuthController::class,'login'])->name('admin.login');

Route::prefix("admin")->middleware(["authAdmin"])->group(function() {

	/**
	 * USER
	 * */
	Route::get('/home',[UserController::class,'index'])->name('admin.users');
	Route::get('/user/profile',[UserController::class,'profile'])->name('admin.profile');
	Route::get('/user/create',[UserController::class,'create'])->name('admin.user-create');
	Route::post('/user/create',[UserController::class,'store'])->name('admin.user-create');
	Route::get('/user/{id}/edit',[UserController::class,'edit'])->name('admin.user-edit');
	Route::post('/user/{id}/update',[UserController::class,'update'])->name('admin.user-update');
	Route::get('/user/{id}/delete',[UserController::class,'delete'])->name('admin.user-delete');
	Route::get('/user/update/password',[UserController::class,'updatePassword'])->name('admin.user-updatePassword');

	
	/**
	 * CATEGORY
	 * */
	Route::get('/categories',[CategoryController::class,'index'])->name('admin.category');
	Route::get('/category/create',[CategoryController::class,'create'])->name('admin.category-create');
	Route::post('/category/create',[CategoryController::class,'store'])->name('admin.category-create');
	Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('admin.category-edit');
	Route::post('/category/{id}/update',[CategoryController::class,'update'])->name('admin.category-update');
	Route::get('/category/{id}/delete',[CategoryController::class,'delete'])->name('admin.category-delete');
	Route::get('/category/{id}/products',[CategoryController::class,'categoriesWithProducts'])->name('admin.category-produts');
	Route::get('/category/{idCategory}/products/{idProduct}/add',[CategoryController::class,'addCategoriesWithProducts'])->name('admin.category-produt-add');
	Route::get('/category/{idCategory}/products/{idProduct}/delete',[CategoryController::class,'removeCategoriesWithProducts'])->name('admin.category-produt-delete');

	/**
	 * PRODUCT
	 * */
	Route::get('/products',[ProductController::class,'index'])->name('admin.product');
	Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('admin.product-edit');
	Route::get('/product/create',[ProductController::class,'create'])->name('admin.product-create');
	Route::post('/product/create',[ProductController::class,'store'])->name('admin.product-create');
	Route::post('/product/{id}/update',[ProductController::class,'update'])->name('admin.product-update');
	Route::get('/product/{id}/delete',[ProductController::class,'delete'])->name('admin.product-delete');


	Route::get('/logout',[AuthController::class,'logout'])->name('admin.logout');
});
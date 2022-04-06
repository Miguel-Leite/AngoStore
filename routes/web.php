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
Route::get('/produto',[HomeController::class,'product'])->name('website.product');
Route::get('/carrinho',[HomeController::class,'cart'])->name('website.cart');
Route::get('/conta',[HomeController::class,'login'])->name('website.login');


Route::get('/admin/login',[AuthController::class,'index'])->name('admin.login');
Route::post('/admin/login',[AuthController::class,'login'])->name('admin.login');

Route::middleware("auth")->group(function() {

	/**
	 * USER
	 * */
	Route::get('/admin/home',[UserController::class,'index'])->name('admin.users');
	Route::get('/admin/user/profile',[UserController::class,'profile'])->name('admin.profile');
	Route::get('/admin/user/create',[UserController::class,'create'])->name('admin.user-create');
	Route::post('/admin/user/create',[UserController::class,'store'])->name('admin.user-create');
	Route::get('/admin/user/{id}/edit',[UserController::class,'edit'])->name('admin.user-edit');
	Route::post('/admin/user/{id}/update',[UserController::class,'update'])->name('admin.user-update');
	Route::get('/admin/user/{id}/delete',[UserController::class,'delete'])->name('admin.user-delete');
	Route::get('/admin/user/update/password',[UserController::class,'updatePassword'])->name('admin.user-updatePassword');

	
	/**
	 * CATEGORY
	 * */
	Route::get('/admin/categories',[CategoryController::class,'index'])->name('admin.category');
	Route::get('/admin/category/create',[CategoryController::class,'create'])->name('admin.category-create');
	Route::post('/admin/category/create',[CategoryController::class,'store'])->name('admin.category-create');
	Route::get('/admin/category/{id}/edit',[CategoryController::class,'edit'])->name('admin.category-edit');
	Route::post('/admin/category/{id}/update',[CategoryController::class,'update'])->name('admin.category-update');
	Route::get('/admin/category/{id}/delete',[CategoryController::class,'delete'])->name('admin.category-delete');

	/**
	 * PRODUCT
	 * */
	Route::get('/admin/products',[ProductController::class,'index'])->name('admin.product');
	Route::get('/admin/product/{id}/edit',[ProductController::class,'edit'])->name('admin.product-edit');
	Route::get('/admin/product/create',[ProductController::class,'create'])->name('admin.product-create');
	Route::post('/admin/product/create',[ProductController::class,'store'])->name('admin.product-create');
	Route::post('/admin/product/{id}/update',[ProductController::class,'update'])->name('admin.product-update');
	Route::get('/admin/product/{id}/delete',[ProductController::class,'delete'])->name('admin.product-delete');


	Route::get('/admin/logout',[AuthController::class,'logout'])->name('admin.logout');
});
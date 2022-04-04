<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index ()
    {
        return view('website.index');
    }

    public function products () {
        return view('website.products');
    }

    public function product() {
        return view('website.product');
    }

    public function cart () {
        return view('website.cart');
    }

    public function login(){
        return view('website.login');
    }
}

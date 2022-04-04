<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.categories');
    }

    public function create()
    {
        return view('admin.category.category-create');
    }

    public function edit()
    {
        return view('admin.category.category-update');
    }
}

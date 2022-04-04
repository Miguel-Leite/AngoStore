<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.categories',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.category-create');
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        if($category) 
            return json_encode(["success"=>true,"message"=>"Categoria adicionada com successo."]);
        return json_encode(["success"=>false,"message"=>"Não foi possível adicionar categoria."]);

    }

    public function edit($id)
    {
        $category = Category::find($id);
        // dd($category);
        return view('admin.category.category-update',compact('category'));
    }

    public function update (Request $request,$id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        if($category) 
            return json_encode(["success"=>true,"message"=>"Categoria atualizado com successo."]);
        return json_encode(["success"=>false,"message"=>"Não foi possível atualizar categoria."]);        
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        if($category) 
            return json_encode(["success"=>true,"message"=>"Categoria excluido com successo."]);
        return json_encode(["success"=>false,"message"=>"Não foi possível excluir categoria."]);
    }
}

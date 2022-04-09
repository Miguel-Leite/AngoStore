<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsCategories;
use App\Usecase\Category\CategoryUseCase;

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
            CategoryUseCase::updateFile();
            CategoryUseCase::updateFileFilter();
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
            CategoryUseCase::updateFile();
            CategoryUseCase::updateFileFilter();
            return json_encode(["success"=>true,"message"=>"Categoria atualizado com successo."]);
        return json_encode(["success"=>false,"message"=>"Não foi possível atualizar categoria."]);        
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        if($category) 
            CategoryUseCase::updateFile();
            CategoryUseCase::updateFileFilter();
            return json_encode(["success"=>true,"message"=>"Categoria excluido com successo."]);
        return json_encode(["success"=>false,"message"=>"Não foi possível excluir categoria."]);
    }

    public function categoriesWithProducts($id)
    {
        $categoryName = Category::find($id)->category;
        $productsRelated = Category::getProducts($id);
        $productsNotRelated = Category::getProducts($id,false);
        return view('admin.category.categories-products',compact('categoryName','productsRelated','productsNotRelated','id'));
    }

    public function addCategoriesWithProducts($idCategory,$idProduct)
    {
        $category = Category::find($idCategory);
        $product = Product::find($idProduct);

        if (!$category && !$product) {
            return json_encode(["success"=>false,"message"=>"Categoria e produto não encontrado!"]);
        }

        ProductsCategories::create(["products_id"=>$idProduct,"categories_id"=>$idCategory]);
        return json_encode(["success"=>true,"message"=>"Produto adicionado a categoria com sucesso!"]);
    }

    public function removeCategoriesWithProducts($idCategory,$idProduct)
    {
        $category = Category::find($idCategory);
        $product = Product::find($idProduct);

        if (!$category && !$product) {
            return json_encode(["success"=>false,"message"=>"Categoria e produto não encontrado!"]);
        }

        $productsCategories = ProductsCategories::where(["products_id"=>$idProduct,"categories_id"=>$idCategory]);
        $productsCategories->delete();
        return json_encode(["success"=>true,"message"=>"Produto removido da categoria com sucesso!"]);
    }
}
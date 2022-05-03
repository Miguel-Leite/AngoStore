<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsCategories;
use App\Usecase\BI\AddressUsecase;
use App\Usecase\Cart\CartUsecase;
use Illuminate\Http\Request;
use App\Usecase\Category\CategoryUseCase;

class HomeController extends Controller
{
    public function index ()
    {
        $categories = CategoryUseCase::getCategoriesOrderByDesc();
        $products = CategoryUseCase::getProductsWithCategories();
        return view('website.index',compact('categories','products'));
    }

    public function products () {

        $page = (isset($_GET["page"])) ? (int) $_GET["page"] : 1;

        $pagination = Product::getProductsPerPage($page);
        $pages = [];
        
        for ($i=1; $i <= $pagination["pages"]; $i++) { 
            array_push($pages,[
                "page" => $i,
                "link" => "/produtos/?page=$i"
            ]);    
        }

        return view('website.products',["products" => $pagination["data"],"pages" => $pages]);
    }

    public function product($productName) {
        $product = Product::getFromProduct($productName);
        return view('website.product',compact('product'));
    }

    public function productsByCategory($category,$id)
    {
        $page = (isset($_GET["page"])) ? (int) $_GET["page"] : 1;

        $pagination = Category::getProductsPerPage($id,$page);
        $pages = [];

        for ($i=1; $i <= $pagination["pages"]; $i++) { 
            array_push($pages,[
                "page" => $i,
                "link" => "/categoria/produtos/$id?page=$i"
            ]);    
        }

        return view('website.products-category',[
                "products" => $pagination["data"],
                "pages" => $pages
            ]);
    }

    public function cart () {
        // dd(session()->);
        CartUsecase::getFromSession();
        return view('website.cart');
    }

    public function orderFinished(Request $request)
    {
        $verify=false;
        $data = $request->all();
        // return $data;
        foreach ($data as $key => $value) {
            $data = [
                'products_id' => $value['id'],
                'quantity' => $value['inCart'],
                'carts_id' => session(CartUsecase::SESSION)->id
            ];
            // return $data;
            $verify = CartUsecase::addProduct($data);
        }
        if ($verify) {
            return json_encode(['success'=>true,'message'=>'Compra finalizada com sucesso!']);   
        }
        return json_encode(['success'=>false,'message'=>'Não foi possível finalizar a compra.']);
    }

    public function login(){
        return view('website.login');
    }

    public function profile() {
        return view('website.profile');
    }

    public function checkout()
    {
        $address = new AddressUsecase();
        if (isset($_GET['bi'])) {

        }
    }
}

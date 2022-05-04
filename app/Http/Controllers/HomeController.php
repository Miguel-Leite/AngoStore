<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductsCategories;
use App\Usecase\BI\AddressUsecase;
use App\Usecase\Boleto\BoletoUsecase;
use App\Usecase\Cart\CartUsecase;
use Illuminate\Http\Request;
use App\Usecase\Category\CategoryUseCase;
use App\Usecase\Ordersstatus\OrdersstatusUsecase;

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

    public function checkout()
    {
        return view('website.checkout');
    }

    public function saveCheckout (Request $request)
    {
        $data = $request->all();
        if (empty($data['address']) || empty('city')) {
            return json_encode(['success'=>false,'message'=>'Por favor preencha os campos obrigatorios(Endereço, Municipio)!']);
        }
        $data['persons_id'] = auth()->user()->persons_id;
        $address = Address::create($data);
        
        $addresses_id = Address::getByPerson(auth()->user()->persons_id);
        $data = [
            'carts_id'=>CartUsecase::get((int)session()->getId())->id,
            'users_id' => auth()->user()->id,
            'addresses_id'=> $addresses_id->id,
            'orderstatus_id'=> 1,
            'total' => (float)$data['vltotal']
        ];

        $order = Order::create($data);
        return
        $address ? json_encode(['success'=>true,'id'=>$order->id,'message'=>'Endereço adicionado com sucesso!'])
        :
        json_encode(['success'=>false,'message'=>'Não foi possível adicionar o endereço!']);
    }

    public function order($id) {

        $order = Order::get($id);
        // dd($order);
        return view('website.order',compact('order','id'));
    }


    public function boleto ($id)
    {
        return BoletoUsecase::getBoleto($id);
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
}

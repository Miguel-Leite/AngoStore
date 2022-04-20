<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.products',compact('products'));
    }

    public function create() 
    {
        return view('admin.products.products-create');
    }

    public function edit ($id)
    {
        $product = Product::find($id);
        return view('admin.products.products-update',compact('product'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();

            if ($request->image_default && $request->image_default->isValid()) {

                $nameFileDefault = Str::of($request->product)->slug('-'). '-default' . '.' . $request->image_default->getClientOriginalExtension();
                $imageDefault = $request->image_default->storeAs('website/img/products',$nameFileDefault);
                $data['image_default'] = $imageDefault;
            }

            if (isset($request->image_other) && $request->image_other->isValid()) {
                $nameFileOther = Str::of($request->product)->slug('-'). '-other' . '.' . $request->image_other->getClientOriginalExtension();
                $imageOther = $request->image_other->storeAs('website/img/products',$nameFileOther);
                $data['image_other'] = $imageOther;   
            }
            // dd($data);
            $product = Product::create($data);
            if ( $product ) 
                return json_encode(["success"=>true,"message"=>"Produto {$request->product} adicionada com successo."]);
            return json_encode(["success"=>false,"message"=>"Não foi possível adicionar produto {$request->product}. Tente novamente!"]);
        } catch (Exception $e) {
            return json_encode(["success"=>false,"message"=> "Erro no sistema, tente novamente mas tarde se o erro permanecer."]);   
        }
            
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if ( !$product )
        {
            return json_encode(["success"=>false,"message"=> 'Não foi possivel localizar o producto!']);
        }

        $data = $request->all();

        if ($request->image_default && $request->image_default->isValid()) {
            if (Storage::exists($product->image_default))
                Storage::delete($product->image_default);
            $nameFileDefault = Str::of($request->product)->slug('-'). '-default' . '.' . $request->image_default->getClientOriginalExtension();
            $imageDefault = $request->image_default->storeAs('website/img/products',$nameFileDefault);
            $data['image_default'] = $imageDefault;
        }

        if (isset($request->image_other) && $request->image_other->isValid()) {
            if (Storage::exists($product->image_other))
                Storage::delete($product->image_other);
            $nameFileOther = Str::of($request->product)->slug('-'). '-other' . '.' . $request->image_other->getClientOriginalExtension();
            $imageOther = $request->image_other->storeAs('website/img/products',$nameFileOther);
            $data['image_other'] = $imageOther;   
        }


        $product = $product->update($data);
        if ( $product ) 
                return json_encode(["success"=>true,"message"=>"Produto {$request->product} atualizado com successo."]);
            return json_encode(["success"=>false,"message"=>"Não foi possível atualizar produto {$request->product}. Tente novamente!"]);
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if ( !$product )
            return json_encode(["success"=>false,"message"=> 'Não foi possivel localizar o producto!']);
        
        if (Storage::exists($product->image_default))
            Storage::delete($product->image_default);
        
        if (Storage::exists($product->image_other))
            Storage::delete($product->image_other);

        $product->delete();

        return json_encode(["success"=>true,"message"=>'Producto removido com sucesso!']);
    }

    public function getProducts() {
        return response()->json(Product::all(), 200);;
    }
}

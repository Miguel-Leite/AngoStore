<?php

namespace App\Usecase\Cart;

use App\Models\Cart;
use App\Models\CartsProducts;
use Illuminate\Support\Facades\DB;

class CartUsecase 
{
    const SESSION = 'cart';

    public static function getFromSession()
    {
        
        if (session()->has(CartUsecase::SESSION) && CartUsecase::get((int)session()->getId())->id > 0)
        {
            return CartUsecase::get((int)session()->getId());
        } else {
            $results = CartUsecase::getFromSessionID();
            if(empty($results)) {
                CartUsecase::save();
            }else {
                CartUsecase::setToSession($results);
            }
        }
    }
    
    public static function setToSession ($data)
    {
        session([CartUsecase::SESSION=>$data]);
    }

    public static function getFromSessionID()
    {
        $session_id = session()->getId();
        $query = DB::select("SELECT * FROM carts WHERE session_id='$session_id'");
        return $query[0];
    }

    public static function get(int $session_id)
    {
        $results = DB::select("SELECT * FROM carts WHERE session_id=$session_id");
        return count($results) > 0? $results[0]:$results;
    }

    public static function save()
    {
        // dd(auth()->user()->id);
        $session_id=session()->getId();
        $users_id = auth()->user()->id;
        /*$query = DB::select("
        start transaction;
            INSERT INTO carts (session_id,users_id)
            VALUES
            ($session_id,$users_id,'009899308LA049');
            SELECT LAST_INSERT_ID() INTO @idcarts;
            SELECT * FROM carts WHERE id = @idcarts;
        commit;
        ");*/

        $save = Cart::create(['users_id'=>$users_id,'session_id'=>$session_id]);
        return $save;
    }

    public static function addProduct($data)
    {
        try {
            if ($data->inCart > 1) {
                for ($i=0; $i < $data->inCart; $i++) { 
                    CartsProducts::create($data);
                }
            } else {
                CartsProducts::create($data);
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CartsProducts extends Model
{
    use HasFactory;
    protected $table = 'cartsproducts';
    protected $fillable = ['carts_id','products_id','quantity','dtremoved'];

    public function removeProduct($id=[], $all=false)
    {
        if ($all) {
            $query = DB::select("UPDATE cartsproducts SET dtremoved=NOW() WHERE carts_id =".$id['id_carts']." AND products_id=".$id['id_products'])." AND dtremoved IS NULL";
            return $query;
        } else {
            $query = DB::select("UPDATE cartsproducts SET dtremoved=NOW() WHERE carts_id =".$id['id_carts']." AND products_id=".$id['id_products'])." AND dtremoved IS NULL LIMIT 1";
            return $query;
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['carts_id','users_id','orderstatus_id','addresses_id','total'];

    public static function get(int $id)
    {
        $query = DB::select("SELECT * FROM orders a 
        INNER JOIN ordersstatus b
        INNER JOIN carts c 
        INNER JOIN users d ON d.id = a.users_id
        INNER JOIN addresses e
        INNER JOIN persons f ON f.id = d.persons_id
        WHERE a.id = $id
        ");
        return count($query) > 0 ? $query[0] : $query;
    }

    public static function getOrders($id)
    {
        $query = DB::select("SELECT * FROM orders a 
        INNER JOIN ordersstatus b
        INNER JOIN carts c 
        INNER JOIN users d ON d.id = a.users_id
        INNER JOIN addresses e
        INNER JOIN persons f ON f.id = d.persons_id
        WHERE a.users_id = $id
        ");
        return count($query) > 0 ? $query[0] : $query;
    }
}

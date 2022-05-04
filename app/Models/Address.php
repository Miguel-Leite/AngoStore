<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $fillable = ['persons_id','address','complement','city'];

    public static function getByPerson($id)
    {
        $query = DB::select("SELECT * FROM addresses WHERE persons_id=$id");
        return count($query) > 0 ? $query[0] : $query;
    }
}

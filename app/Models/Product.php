<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        "product",
        "price",
        "width",
        "height",
        "length",
        "weight",
        "image_default",
        "image_other"
    ];

    public function cateories()
    {
        return $this->belongsToMany(Category::class);
    }

    public static function getFromProduct($product)
    {
        $query = DB::select("SELECT * FROM products WHERE product = '$product'");
        return $query[0];
    }

    public static function getProductsPerPage($page = 1, $itemsPerPage = 8)
    {
        $start = ($page - 1)*$itemsPerPage;
        $results = DB::select("
            SELECT SQL_CALC_FOUND_ROWS * FROM products LIMIT $start,$itemsPerPage;");
        $resultsTotal = DB::select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            "data" => $results,
            "total" => $resultsTotal[0]->nrtotal,
            "pages" => ceil($resultsTotal[0]->nrtotal / $itemsPerPage)
        ];
    }
}

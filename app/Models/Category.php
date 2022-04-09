<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';

    protected $fillable = [
        'category',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public static function getProducts(int $id,bool $retated=true)
    {
        if ( $retated ) {
            $query = DB::select("
                SELECT * FROM products WHERE id IN(
                SELECT a.id FROM products a INNER JOIN 
                productscategories b ON a.id = b.products_id
                WHERE b.categories_id=$id);
            ");
            return $query;
        }

        $query = DB::select("
            SELECT * FROM products WHERE id NOT IN(
            SELECT a.id FROM products a INNER JOIN 
            productscategories b ON a.id = b.products_id
            WHERE b.categories_id=$id
            )"
        );
        return $query;
    }


    public static function getProductsPerPage($id, $page = 1, $itemsPerPage = 8)
    {
        $start = ($page - 1)*$itemsPerPage;
        $results = DB::select("
            SELECT SQL_CALC_FOUND_ROWS * FROM products a INNER JOIN productscategories b ON a.id = b.products_id
            INNER JOIN categories c ON c.id = b.categories_id WHERE c.id = $id LIMIT $start,$itemsPerPage;");
        $resultsTotal = DB::select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            "data" => $results,
            "total" => $resultsTotal[0]->nrtotal,
            "pages" => ceil($resultsTotal[0]->nrtotal / $itemsPerPage)
        ];
    }
}

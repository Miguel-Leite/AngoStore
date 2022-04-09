<?php

namespace App\Usecase\Category;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryUseCase
{
	public static function updateFile()
	{
		$categories = Category::all();

		$html = [];

		foreach ($categories as $key => $value) {
			array_push($html,'<li><a href="{{"'. route('website.products-category',["category"=>strtolower($value['category']),"id"=>$value['id']]) . '"}}">'. $value['category'] .'</a></li>');
		}

		file_put_contents(".." . DIRECTORY_SEPARATOR ."resources". DIRECTORY_SEPARATOR ."views". DIRECTORY_SEPARATOR ."website". DIRECTORY_SEPARATOR ."layouts". DIRECTORY_SEPARATOR ."category-menu.blade.php",
		implode('',$html));
	}

	public static function getCategoriesOrderByDesc(){
		$query = DB::select("SELECT * FROM categories ORDER BY id DESC;");
		return $query;
	}

	public static function updateFileFilter()
	{
		$categories = static::getCategoriesOrderByDesc();

		$html = [];
		foreach ($categories as $key => $value) {
			$active = $key === 0 ? 'active' : '';
			array_push($html,'<li><a data-toggle="tab" href="{{ "#'. strtolower($value->category) .'" }}" class="{{"'.$active.'"}}">'. $value->category .'</a></li>');
		}

		file_put_contents(".." . DIRECTORY_SEPARATOR ."resources". DIRECTORY_SEPARATOR ."views". DIRECTORY_SEPARATOR ."website". DIRECTORY_SEPARATOR ."layouts". DIRECTORY_SEPARATOR ."category-menu-filter.blade.php",
		implode('',$html));
	}

	public static function getProductsWithCategories()
	{
		$query = DB::select("SELECT products.*, categories.category 
							FROM products INNER JOIN 
							productscategories
							INNER JOIN categories
							ON products.id=productscategories.products_id AND 
							productscategories.categories_id=categories.id ORDER BY id;");

		return $query;
	}
}

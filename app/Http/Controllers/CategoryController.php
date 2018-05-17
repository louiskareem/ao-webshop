<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		$categories = Category::all();

		return view('categories.index', compact('categories'));
	}
	
	/**
	 * [display description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function display($id)
	{
		$categories = Category::findOrFail($id);

		return view('categories.category_products', compact('categories'));
	}
}

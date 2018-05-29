<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;

class ProductController extends Controller
{
	/**
	 * [index. Method to get products view]
	 * @return [type] [description]
	 */
	public function index()
	{
		$products = Product::all();

		return view('products.index', compact('products'));
	}

	/**
	 * [display. Method to display product's details in separate view]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function display($id)
	{
		$product = Product::findOrFail($id);
		Session::flash('message', 'Product has been added to your shopping cart!');

		return view('products.product_details', compact('product'));
	}
}

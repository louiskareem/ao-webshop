<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;

class ProductController extends Controller
{
	public function index()
	{
		$products = Product::all();

		return view('products.index', compact('products'));
	}

	public function display($id)
	{
		$product = Product::findOrFail($id);

		return view('products.product_details', compact('product'));
	}

	public function displayProduct($value='')
	{
		# code...
	}

	public function create()
	{
		# code...
	}

	public function store()
	{
		# code...
	}

	public function show()
	{
		# code...
	}

	public function edit()
	{
		# code...
	}

	public function update()
	{
		# code...
	}

	public function delete()
	{
		# code...
	}
}

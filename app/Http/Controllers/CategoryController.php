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

	public function display($id)
	{
		$categories = Category::findOrFail($id);

		return view('categories.category_products', compact('categories'));
	}

	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create()
	{
		# code...
	}

	/**
	 * [store description]
	 * @return [type] [description]
	 */
	public function store()
	{
		# code...
	}

	/**
	 * [show description]
	 * @return [type] [description]
	 */
	public function show()
	{
		# code...
	}

	/**
	 * [edit description]
	 * @return [type] [description]
	 */
	public function edit()
	{
		# code...
	}

	/**
	 * [update description]
	 * @return [type] [description]
	 */
	public function update()
	{
		# code...
	}

	/**
	 * [delete description]
	 * @return [type] [description]
	 */
	public function delete()
	{
		# code...
	}
}

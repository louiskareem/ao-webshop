<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
	public function index()
	{
		$categories = Category::all();

		return view('categories.index', compact('categories'));
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

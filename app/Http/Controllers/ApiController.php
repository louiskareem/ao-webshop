<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Product;
use App\Category;
use App\Client;
use App\OrderDetail;
use App\Order;
use App\ShoppingCart;
use Session;
use Auth;
use Input;

class ApiController extends Controller
{
    
    public function index()
    {
    	$product = Product::all();
    	$apiProduct = json_encode($product);

    	return response($apiProduct);
    }

    public function create()
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\OrderDetail;
use App\Product;
use App\ShoppingCart;
use Session;

class OrderController extends Controller
{
    public function index()
    {
      	return view('shopping.order_details', compact('request'));
    }

    public function getProduct(Request $request, $id)
    {
		$product = Product::findOrFail($id);
		$oldCart = Session::has('products') ? Session::get('products') : null;
		$cart = new ShoppingCart($oldCart);
		$cart->addProduct($product, $product->id);

		// $shoppingCart = ShoppingCart::addProduct($product);
		$request->session()->put('products', $cart);
		$request->session()->get('products');
		dd($request->session()->get('products'));
		Session::flash('message', 'Product has been added to your shopping cart!');

		// return redirect('categories');
		return view('shopping.details', compact('request'));
    }
}

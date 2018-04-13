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
		// $shoppingCart = $request->session()->all();
		// $shoppingCart = ShoppingCart::addProduct($product);
		$shoppingCart = new ShoppingCart;

		dd($shoppingCart);


		// if ($request->session()->get('shopping_cart', 'id') === $product = Product::where('id', $id)->first()) {
		// 	//already exists

		// }elseif ($request->session()->get('shopping_cart', 'id') !== $product = Product::where('id', $id)->first()) {

		// 	$request->session()->push('shopping_cart' ,$product);

		// }

		// dd($request->session()->get('shopping_cart', 'id'));
		// $request->session()->push('shopping_cart' ,$product);
		// $request->session()->get('shopping_cart');
		 
		// $value = $request->session()->get('shopping_cart');

		Session::flash('message', 'Product has been added to your shopping cart!');

		return view('shopping.details', compact('value'));
    }

    public function deleteItem($id)
    {
    	$product = Product::findOrFail($id);


    }
}

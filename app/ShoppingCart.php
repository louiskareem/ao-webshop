<?php

namespace App;

use Illuminate\Http\Request;
use App\Product;
use Session;

class ShoppingCart
{
	const SHOPPING_CART = 'shopping_cart';
	// public $cart;
	public $products = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart)
	{
		if ($oldCart) {
			$this->products = $oldCart->products;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function addProduct($product, $id) 
	{
		$storedProduct = ['product' => $product, 'qty' => 0, 'price' => $product->price];

		if ($this->products) {
			if (array_key_exists($id, $this->products)) {
				$storedProduct = $this->products[$id];
			}
		}

		$storedProduct['qty']++;
		$storedProduct['price'] = $product->price * $storedProduct['qty'];
		$this->products[$id] = $storedProduct;
		$this->totalQty++;
		$this->totalPrice += $product->price;
		// $cart = Session::put('SHOPPING_CART', $product);

		// return $cart;

	} 

}


// $product = Product::findOrFail($id);
 
// if (empty($request->session()->get('shopping_cart'))) {
// 	$data = array();
// 	$request->session()->put('shopping_cart', $data = array($product));

// }elseif ($request->session()->get('shopping_cart', 'id') === $product = Product::where('id', $id)->first()) {
// 	$request->session()->get('shopping_cart');

// }elseif ($request->session()->get('shopping_cart', 'id') !== $product = Product::where('id', $id)->first()) {
// 	$request->session()->push('shopping_cart' ,$product);
// 	$request->session()->get('shopping_cart');
// }
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

	/**
	 * [__construct description]
	 * @param [type] $session [description]
	 */
	public function __construct($session)
	{
		$session = session()->get('products');
		// dd($session);
		if (!empty($session)) {
			$this->products = $session->products;
			$this->totalQty = $session->totalQty;
			$this->totalPrice = $session->totalPrice;
		}
	}

	public function storeInSession()
	{
		
	}

	/**
	 * [addProduct description]
	 * @param [type] $product [description]
	 * @param [type] $id      [description]
	 */
	public function addProduct($product, $id) 
	{
		$storedProduct = ['id' => $id, 'product' => $product, 'qty' => 0, 'price' => $product->price];

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
	}

/**
 * [deleteProduct description]
 * @param  [type] $product [description]
 * @param  [type] $id      [description]
 * @return [type]          [description]
 */
	public function deleteProduct($product, $id)
	{
        foreach ($this->products as $product)
        {	
            if ($product['id'] === $id) 
            {   
            	// dd(Session::get($this->products["products, $id"]));
            	// Session::forget($id, $this->products[$id]);
            	// dd(session()->pull('products', $product['product']->id));
            	// $session = session()->forget('products');
            	Session::forget('products'); //Session::forget('products', $product['product']->id); 
            }
        }
        
	} 

}
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
	 * @param [type] $oldCart [description]
	 */
	public function __construct($oldCart)
	{
		if (!empty($oldCart)) {
			$this->products = $oldCart->products;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	/**
	 * [addProduct description]
	 * @param [type] $product [description]
	 * @param [type] $id      [description]
	 */
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
            if ($product['product']->id === $id) 
            {     
            	// dd(Session::get('products', $product['product']->id));
            	Session::forget('products', $product['product']->id); 
            }
        }       
        
	 } 

}
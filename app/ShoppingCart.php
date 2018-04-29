<?php

namespace App;

use Illuminate\Http\Request;
use App\Product;
use Session;
use App\StoredItem;

class ShoppingCart
{
	const SHOPPING_CART = 'shopping_cart';
	// public $products = null;
	// public $totalQty = 0;
	// public $totalPrice = 0;
	public $session;
	public $storedItems = [];

	/**
	 * [__construct description]
	 * @param [type] $session [description]
	 */
	public function __construct($session)
	{
		$this->session = session();

		if (!empty($session)) {
/*			$this->products = $session->products;
			$this->totalQty = $session->totalQty;
			$this->totalPrice = $session->totalPrice;*/
			$this->storedItems = $this->session->get(self::SHOPPING_CART);
		}
	}

	public function add($productId) {
		$product = Product::findOrFail($productId);
		$qty = 0;
		$qty++;
		$totalQty = 0;
		$totalQty++;
		$totalPrice = 0;
		$totalPrice += $product->price;

		if ($product !== NULL) {
			$storedItem = new StoredItem($product, $qty);
			$this->storedItems = session()->push('shopping_cart', $storedItem);
			// return $this->storeInSession();
			// $this->session->put(self::SHOPPING_CART, $this->storedItems);
		}
		// dd($this->session);
	}

	public function getAll() {
		return $this->storeInSession();
		// return $this->session->put(self::SHOPPING_CART, $this->storedItems);
	}

	/**
	 * [deleteProduct description]
	 * @param  [type] $product [description]
	 * @param  [type] $id      [description]
	 * @return [type]          [description]
	 */
	public function deleteProduct($productId)
	{
		foreach ($this->storedItems as $key => $item) {
            if ($item->productId->id == $productId)
            {   
            	// dd($item->productId);
            	// $this->session->pull('SHOPPING_CART', $this->storedItems->id);
            	unset($this->storedItems[$key]);
            	// $this->storedItems = session()->push('shopping_cart', $storedItem);
            	return $this->storeInSession();
            }
        }
	}

	public function storeInSession()
	{
		$this->session->put(self::SHOPPING_CART, $this->storedItems);
	}
}
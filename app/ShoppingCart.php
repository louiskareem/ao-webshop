<?php

namespace App;

use Illuminate\Http\Request;
use App\Product;
use Session;
use App\StoredItem;

/**
 * 
 */
class ShoppingCart
{
	const SHOPPING_CART = 'shopping_cart';
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
			$this->storedItems = $this->session->get(self::SHOPPING_CART);
		}
	}

	/**
	 * [add description]
	 * @param [type] $productId [description]
	 */
	public function add($productId) {
		$product = Product::findOrFail($productId);
		$qty = 0;
		$qty++;

		if ($product !== NULL) {
			$storedItem = new StoredItem($product, $qty);
			$this->storedItems = session()->push('shopping_cart', $storedItem);
		}
	}

	/**
	 * [getAll description]
	 * @return [type] [description]
	 */
	public function getAll() {
		return $this->storeInSession();
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
            	unset($this->storedItems[$key]);
            	return $this->storeInSession();
            }
        }
	}

	/**
	 * [storeInSession description]
	 * @return [type] [description]
	 */
	public function storeInSession()
	{
		$this->session->put(self::SHOPPING_CART, $this->storedItems);
	}
}
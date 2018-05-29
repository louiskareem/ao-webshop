<?php

namespace App;

use Illuminate\Http\Request;
use App\Product;
use Session;
use App\StoredItem;

/**
 * Class for Shopping Cart
 */
class ShoppingCart
{
	// variables and constant
	const SHOPPING_CART = 'shopping_cart';
	public $session;
	public $storedItems = [];

	/**
	 * [__construct Shopping cart array in Session]
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
	 * [Add. The method to add product/items to shopping_cart in Session]
	 * @param [type] $productId [description]
	 */
	public function add($productId) {
		// variables
		$product = Product::findOrFail($productId);
		$qty = 0;
		$qty++;

		// If product id is not equal to null then store product in Object and push StoredItem to shopping_cart array
		if ($product != NULL) {
			$storedItem = new StoredItem($product, $qty);
			$this->storedItems = session()->push('shopping_cart', $storedItem);
		}
	}

	/**
	 * [getItems. Method to return all available products/items in shopping_cart array.]
	 * @return [type] [description]
	 */
	public function getItems() {
		// storedItems is an array
		return $this->storedItems;
	}

	/**
	 * [deleteProduct. Method to delete product/item in session from shopping_cart]
	 * @param  [type] $product [description]
	 * @param  [type] $id      [description]
	 * @return [type]          [description]
	 */
	public function deleteProduct($productId)
	{
		// Do an iteration of each product/item in shopping_cart as an "key". Check to see if the product ID is equal to the ID of the product in storedItems, if true, then delete.
		foreach ($this->storedItems as $key => $item) {
            if ($item->productId->id == $productId)
            {   
            	unset($this->storedItems[$key]);
            	return $this->storeInSession();
            }
        }
	}

	/**
	 * [storeInSession. Method to put products/items in the shopping_cart]
	 * @return [type] [description]
	 */
	public function storeInSession()
	{
		$this->session->put(self::SHOPPING_CART, $this->storedItems);
	}
}
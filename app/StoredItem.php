<?php

namespace App;

use Illuminate\Http\Request;

/** 
 * StoredItem is used to store the combination of product and quantity added to the shopping cart array.
 */
class StoredItem {
	// variables
	public $productId;
	public $qty = 0;

	/**
	 * [__construct product and quantity for shopping_cart]
	 * @param [type] $productId [description]
	 * @param [type] $qty       [description]
	 */
	public function __construct($productId, $qty) {
		$this->productId = $productId;
		$this->qty = $qty;
	}
}
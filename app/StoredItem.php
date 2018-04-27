<?php

namespace App;

use Illuminate\Http\Request;

/** 
 * StoredItem is used to store the combination of product and quantity added to the shopping cart.
 */
class StoredItem {

	public $productId;
	public $qty = 0;

	public function __construct($productId, $qty) {
		$this->productId = $productId;
		$this->qty = $qty;
	}
}
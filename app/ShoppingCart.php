<?php

namespace App;

use Illuminate\Http\Request;
use App\Product;
use Session;

class ShoppingCart
{
	const SHOPPING_CART = 'shopping_cart';
	public $cart = array();
	public $session;
	public $products;

	// public function __construct() {
	// 	$this->cart = $cart;
	// 	$this->products = $products;
	// 	// bestaat deze cart al in de sessie?
	// 	// haal hem op of anders maak hem aan
	// }

	function __construct()
	{
		// parent::__construct();
		// $this->cart = $cart;
		$this->products = $$productId = Product::where('id', '=', $id)->get();;
		 
		// $productId = Product::where('id', '=', $id)->get();

		if (Session::get('SHOPPING_CART') != NULL) {
			$value = Session::get('SHOPPING_CART');
		}else{
			$value = Session::push('SHOPPING_CART', $products);
		}

	}

	public static function addProduct($id)
	{
		// Need the item id:
		$productId = Product::where('id', '=', $id)->get();
	
		if (empty(Session::get('SHOPPING_CART'))) {
			$productId = Session::push('SHOPPING_CART', $productId);
		}

		return $productId;
	}

	// public function getProduct(Request $request, $id)
	// {
	// 	if (session()->get(DEFAULT_SHOPPING_CART) != NULL) {
	// 		$request->session()->get('shopping_cart');
	// 	}else{
	// 		$this->cart;
	// 		$request->session()->put('shopping_cart', $cart = array($product));
	// 	}
	// }

	// public function add($product) {
	// 	$cart->array_push();
	// }


	// function storeInSession() {

	// }

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

	// // dd($request->session()->get('shopping_cart', 'id'));
	// // $request->session()->push('shopping_cart' ,$product);
	// // $request->session()->get('shopping_cart');
	// // 
	// $value = $request->session()->get('shopping_cart');

	// Session::flash('message', 'Product has been added to your shopping cart!');

	// return view('shopping.details', compact('value'));
}


// class ShoppingCart implements Iterator, Countable {

// // Array stores the list of items in the cart:
// protected $items = array();

// // For tracking iterations:
// protected $position = 0;

// // For storing the IDs, as a convenience:
// protected $ids = array();

// // Constructor just sets the object up for usage:
// function __construct() {
//     $this->items = array();
//     $this->ids = array();
// }

// // Returns a Boolean indicating if the cart is empty:
// public function isEmpty() {
//     return (empty($this->items));
// }

// // Adds a new item to the cart:
// public function addItem(Item $item) {

//     // Need the item id:
//     $id = $item->getId();

//     // Throw an exception if there's no id:
//     if (!$id) throw new Exception('The cart requires items with unique ID
//     values.');

//     // Add or update:
//     if (isset($this->items[$id])) {
//         $this->updateItem($item, $this->items[$item]['qty'] + 1);
//     } else {
//         $this->items[$id] = array('item' => $item, 'qty' => 1);
//         $this->ids[] = $id; // Store the id, too!
//     }

//     } // End of addItem() method.

//     // Changes an item already in the cart:
//     public function updateItem(Item $item, $qty) {

//     // Need the unique item id:
//     $id = $item->getId();

//     // Delete or update accordingly:
//     if ($qty === 0) {
//         $this->deleteItem($item);
//     } elseif ( ($qty > 0) && ($qty != $this->items[$id]['qty'])) {
//         $this->items[$id]['qty'] = $qty;
//     }

//     } // End of updateItem() method.

//     // Removes an item from the cart:
//     public function deleteItem(Item $item) {

//     // Need the unique item id:
//     $id = $item->getId();

//     // Remove it:
//     if (isset($this->items[$id])) {
//         unset($this->items[$id]);

//         // Remove the stored id, too:
//         $index = array_search($id, $this->ids);
//         unset($this->ids[$index]);

//         // Recreate that array to prevent holes:
//         $this->ids = array_values($this->ids);

//     }

//     } // End of deleteItem() method.

//     // Required by Iterator; returns the current value:
//     public function current() {

//     // Get the index for the current position:
//     $index = $this->ids[$this->position];

//     // Return the item:
//     return $this->items[$index];

//     } // End of current() method.

//     // Required by Iterator; returns the current key:
//     public function key() {
//     return $this->position;
//     }

//     // Required by Iterator; increments the position:
//     public function next() {
//     $this->position++;
//     }

//     // Required by Iterator; returns the position to the first spot:
//     public function rewind() {
//     $this->position = 0;
//     }

//     public function valid() {
//     return (isset($this->ids[$this->position]));
//     }

//    // Required by Countable:
//    public function count() {
//     return count($this->items);
//    }

// } // End of ShoppingCart class.

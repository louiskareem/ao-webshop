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
    /**
     * [getProduct description]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function getProduct(Request $request, $id)
    {
		$product = Product::findOrFail($id);
		$oldCart = Session::has('products') ? Session::get('products') : null;
		$cart = new ShoppingCart($oldCart);
		$cart->addProduct($product, $product->id);
		// $shoppingCart = ShoppingCart::addProduct($product);
		$request->session()->put('products', $cart);
		$request->session()->get('products');
		Session::flash('message', 'Product has been added to your shopping cart!');

		return redirect('products');
    }

    /**
     * [getShoppingCart description]
     * @return [type] [description]
     */
    public function getShoppingCart()
    {
    	$oldCart = Session::get('products');
    	$cart = new ShoppingCart($oldCart);
    	// dd(Session::get('products'));
    	return view('shopping.cart', compact('cart'));       //['products' => $cart->products, 'total-price' => $cart->totalPrice]
    }

    /**
     * [deleteProductInCart description]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function deleteProductInCart(Request $request, $id)
    {
    	$product = Product::findOrFail($id);
    	$oldCart = Session::has('products') ? Session::get('products') : null;
    	$cart = new ShoppingCart($oldCart);
    	$cart->deleteProduct($oldCart, $product->id);
    	$request->session()->get('products');
    	return redirect('shopping_cart');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\OrderDetail;
use App\Product;
use App\ShoppingCart;
use Session;
use Auth;

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
		$session = session()->has('products') ? session()->get('products') : null;
		$cart = new ShoppingCart($session);
		$cart->addProduct($product, $product->id);
		session()->put('products', $cart);
		session()->get('products');
		Session::flash('message', 'Product has been added to your shopping cart!');

		return redirect('products');
    }

    /**
     * [getShoppingCart description]
     * @return [type] [description]
     */
    public function getShoppingCart()
    {
    	$session = session()->get('products');
    	$cart = new ShoppingCart($session);
    	// dd(Session::get('products'));
    	return view('shopping.cart', compact('cart'));
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
    	$session = session()->has('products') ? session()->get('products') : null;
    	$cart = new ShoppingCart($session);
    	$cart->deleteProduct($session, $product->id);
    	// $request->session()->put('products', $cart);
    	session()->get('products');
    	return redirect('shopping-cart');
    }

    /**
     * [addOrder description]
     * @param Request $request [description]
     * @param [type]  $id      [description]
     */
    public function addOrder(Request $request)
    {
        $guest = Auth::guest();

        if ($auth = Auth::user()) {
            return $auth;
        }

        dd($request->session()->get('products'), $request, $auth);
        
    }

    public function getOrder()
    {
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\OrderDetail;
use App\Order;
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
		$cart = new ShoppingCart($request->session());
		$cart->add($product->id);
		return redirect('products');
    }

    /**
     * [getShoppingCart description]
     * @return [type] [description]
     */
    public function getShoppingCart(Request $request)
    {
    	$cart = new ShoppingCart($request->session());
        foreach ($cart->storedItems as $key) {
            $p = $key->qty * $key->productId->price;
        }
    	return view('shopping.cart', compact('cart', 'p'));
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
    	$cart = new ShoppingCart($request->session());
    	$cart->deleteProduct($product->id);
    	return redirect('shopping-cart');
    }

    /**
     * [getOrder description]
     * @return [type] [description]
     */
    public function getOrder()
    {
        Session::flash('message', 'Product has been added to your shopping cart!');
        return view('orders.index');
    }

    /**
     * [addOrder description]
     * @param Request $request [description]
     * @param [type]  $id      [description]
     */
    public function addOrder(Request $request)
    {
        if ($auth = Auth::user()) {
            $auth;
        }

        $products = $request->session()->get('shopping_cart');
        $amount = $request->quantity;

        if ($products != NULL) {
            foreach ($products as $product) {
                $order = new Order;
                $order->client_id = $auth->id;
                    // if ($order->client_id != NULL) {

                    //     if ($auth->id == $order->client_id) { //$client = Client::where('id', $order->client_id)->first()

                    //         $order->client_id = $auth->id;

                    //     }else{

                    //         $order->client_id;

                    //     }

                    // }else{

                    //     $order->client_id = NULL;

                    // }

                $order->status = env('ORDER_STATUS');
                $order->save();

                $odetail = new OrderDetail;
                $odetail->order_id = $order->id;
                $odetail->product_id = $product->productId->id;
                $odetail->total_products = $product->qty;
                    foreach ($amount as $key => $value) {
                        if ($key == $product->productId->id) {
                            $odetail->total_products = $value;
                        }
                    }
                $odetail->save();
            }
        }
        return redirect('orders');
    }
}

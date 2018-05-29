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
use Input;

class OrderController extends Controller
{
    /**
     * [getProduct. Method to get product using request and ID variable.]
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
     * [getShoppingCart. Method to get shopping cart view using request and Shopping Cart class]
     * @return [type] [description]
     */
    public function getShoppingCart(Request $request)
    {
    	$cart = new ShoppingCart($request->session());
        $items = $cart->getItems();

    	return view('shopping.cart', compact('items')); //['items' => $items, 'totalPrice' => $totalPrice]
    }

    /**
     * [deleteProductInCart. Method to delete product/item from the shopping cart using request and Shopping Cart class]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function deleteProductInCart(Request $request)
    {
    	$cart = new ShoppingCart($request->session());
    	$cart->deleteProduct($request->input('title'));

    	return redirect('products');
    }

    /**
     * [getOrder. Method to get order view]
     * @return [type] [description]
     */
    public function getOrder()
    {
        Session::flash('message', 'Product has been added to your shopping cart!');
        $order_details = OrderDetail::all();

        return view('orders.index', compact('order_details'));
    }

    /**
     * [addOrder. Method to add a new order to database using request]
     * @param Request $request [description]
     * @param [type]  $id      [description]
     */
    public function addOrder(Request $request)
    {
        // If user is logged in then continue
        if ($auth = Auth::user()) {
            $auth;
        }

        //request variables
        $products = $request->session()->get('shopping_cart');
        $amount = $request->quantity;

        // If products is not equal to null then do an iteration of each product. Create new order and order_detail
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

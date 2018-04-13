<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetail;
use Session;

class OrderDetailController extends Controller
{
    public function index()
    {
    	// $orderDetails = OrderDetail::all();
    	// // dd($orderDetails);

    	// foreach ($orderDetails as $orderDetail) {
    	// 	// dd($orderDetail->order->client->user->name);
    	// 	dd($orderDetail->product->name);
    	// }

    	return view('shoppingCarts.details', compact('orderDetails'));
    }
}

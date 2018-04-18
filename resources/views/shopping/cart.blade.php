@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Da Vinci Webshop</div>

                <div class="card-body">
                    <h1>Shopping Cart</h1>
	                @if(Session::has('products'))
		                <form class="form-group">
		                    <table id="cart" class="table table-hover table-condensed">
			                        <thead>
			                            <tr>
			                                <th>Product</th>
			                                <th>Description</th>
			                                <th>Quantity (in products)</th>
			                                <th>Price</th>
			                                <th></th>
			                            </tr>
			                        </thead>
			                        <tbody>
			                        	@foreach($cart->products as $c)
				                        	<tr>
				                        		<td><a href="{{ action('ProductController@display', $c['product']->id) }}">{{ $c['product']->name }}</a></td>
				                        		<td>{{ $c['product']->description }}</td>
				                        		<td><input class="col" type="number" name="quantity" value="{{ $c['qty'] }}"></td>
				                        		<td>&euro; {{ $c['price'] }}</td>
				                        		<td>
					                        		<form action="{{ action('OrderController@deleteProductInCart', $c['product']->id) }}" method="POST">
					                        			{{ csrf_field() }}
					                        			<button type="submit" class="btn btn-danger">Delete</button>
					                        		</form>
				                        		</td>
				                        	</tr>
			                        	@endforeach
			                        </tbody>
			                        <tfoot>
			                            <tr>
			                                <td><a href="{{ action('ProductController@index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
			                                <td></td>
			                                <td><strong>Total: &euro;{{ $cart->totalPrice }}</strong></td>
			                                <td></td>
			                                <td><a href="#" class="btn btn-primary btn-block"><img src="../png/ic_shopping_basket_black_18dp_1x.png"> Checkout <i class="fa fa-angle-right"></i></a></td>
			                            </tr>
			                        </tfoot>
		                    </table>
		                </form>
	                @else
	                    <table id="cart" class="table table-hover table-condensed">
		                        <thead>
		                            <tr>
		                                <th>Product</th>
		                                <th>Description</th>
		                                <th>Quantity</th>
		                                <th>Price</th>
		                                <!-- <th style="width:22%" class="text-center">Subtotal</th> -->
		                                <th></th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	<tr>
		                        		<td>
		                        			Your shopping cart is empty. Please spend some money to make orders.
		                        		</td>
		                        	</tr>
		                        </tbody>
		                        <tfoot>
		                            <tr>
		                                <td><a href="{{ action('ProductController@index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
		                                <td></td>
		                                <td><strong>Total: &euro;</strong></td>
		                                <td><a href="#" class="btn btn-primary btn-block"><img src="../png/ic_shopping_basket_black_18dp_1x.png"> Checkout <i class="fa fa-angle-right"></i></a></td>
		                            </tr>
		                        </tfoot>
	                    </table>
	                @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
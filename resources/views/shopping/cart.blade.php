@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Da Vinci Webshop</div>

                <div class="card-body">
                    <h1>Shopping Cart</h1>
	                @if(Session::has('shopping_cart'))
		                <form class="form-group" action="{{ action('OrderController@addOrder') }}" method="POST">
		                	{{ csrf_field() }}
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
		                        @if(count($cart) > 0)
		                        	@foreach($cart->storedItems as $c)
			                        	<tr>
			                        		<td><a href="{{ action('ProductController@display', $c->productId->id) }}">{{ $c->productId->name }}</a></td>
			                        		<td>{{ $c->productId->description }}</td>
			                        		<td><input class="col" type="number" name="quantity[ {{$c->productId->id}} ]" value="{{ $c->qty }}"></td>
			                        		<td>&euro;{{ $c->productId->price }}</td>
			                        		<td>
				                        		<button id="delete" value="{{ $c->productId->id }}" class="btn btn-danger">Delete</button>
			                        		</td>
			                        	</tr>
		                        	@endforeach
		                        @endif
		                        </tbody>
		                        <tfoot>
		                            <tr>
		                                <td><a href="{{ action('ProductController@index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
		                                <td></td>	
		                                <td><strong>Total: &euro; {{ $p }}</strong></td>
		                                <td></td>
		                                <td>
	                                		<button class="btn btn-primary btn-block" type="submit"><img src="../png/ic_shopping_basket_black_18dp_1x.png"> Checkout</button><i class="fa fa-angle-right"></i>
		                                </td>
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
		                                <td>
		                                	<button class="btn btn-primary btn-block" type="submit"><img src="../png/ic_shopping_basket_black_18dp_1x.png"> Checkout</button><i class="fa fa-angle-right"></i>
		                                </td>
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

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<script>

'use strict';
var $ = jQuery;

$(document).ready(function(){
	$("#delete").click(function(event) {
		event.preventDefault();
		var TableURL = '{{ url('shopping-cart/remove-product') }}';
		var formData = {
			id: this.id
			value: this.value
		}

		$.ajax({
			url: TableURL,
			type: "POST",
			data: formData,

            success: function(data) {

                swal({
                    title: "Success",
                    text: "Meter ID is succesvol verwerkt.",
                    icon: "success"
                })

                setTimeout(function(){
                 location.reload();
                }, 500);

            },
            error: function (data) {

                swal({
                    title: "Error",
                    text: "Helaas is de data van Meter ID niet verwerkt. Probeer het opnieuw.",
                    icon: "warning"
                })

                setTimeout(function(){
                    location.reload();
                }, 500);

            }
		})
	});
}
</script>
@endsection
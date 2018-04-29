@extends('layouts.app')

@section('content')    
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script>
	$(document).ready(function() {
		$('.delete').click(function(event) {
			event.preventDefault();

            var tableUrl = '{{ action('OrderController@deleteProductInCart') }}';
            var formData = {
                 // id: this.id, //get the right id, i.e meter->id
                 title: this.title //the value of input fields, e.g meter_id
            };

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
				url: tableUrl,
				type: 'POST',
				data: formData,
			})
			.done(function(data) {
				alert('hey');
				console.log("success");
			})
			.fail(function(data) {
				console.log("error");
			})
			.always(function(data) {
				console.log("complete");
			});
		});
	});
</script>

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
				                        		<input value="Delete" title="{{ $c->productId->id }}" class="btn btn-danger delete">
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
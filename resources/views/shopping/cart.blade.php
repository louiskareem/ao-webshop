@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container-fluid">
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
		                        @if(count($items) > 0)
		                        	@foreach($items as $c)
			                        	<tr>
			                        		<td><a href="{{ action('ProductController@display', $c->productId->id) }}">{{ $c->productId->name }}</a></td>
			                        		<td>{{ $c->productId->description }}</td>
			                        		<td id="quantity"><input id="quanquan" class="col-sm-4" type="number" name="quantity[ {{$c->productId->id}} ]" value="{{ $c->qty }}"></td>
			                        		<td><span class="col">&euro;</span><input id="price" value="{{ $c->productId->price }}" disabled></td>
			                        		<td>
				                        		<input value="Delete" name="delete" title="{{ $c->productId->id }}" class="btn btn-danger delete">
			                        		</td>
			                        	</tr>
		                        	@endforeach
			                    @endif
		                        </tbody>
		                        <tfoot>
		                            <tr>
		                                <td><a href="{{ action('ProductController@index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
		                                <td></td>	
		                                
		                                <td class="col total"><strong></strong></td>
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

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script>
	$(document).ready(function() {
		var p = $('#price').val();
		$('.total').html('Total: &euro; ' + p);

		$('#quantity').change(function() {
			var q = $('#quanquan').val(); 
			var totalprice = q * p;
			
			$('.total').html('Total: &euro; ' + totalprice);
			// console.log(totalprice);
		});

		$('.delete').click(function(event) {
			event.preventDefault();

            var tableUrl = '{{ action('OrderController@deleteProductInCart') }}';
            var formData = {
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
		        success: function(data) {
		          	// alert("data sent!");
		          	console.log('yes');
                    setTimeout(function(){
                        location.reload();
                    }, 100);
		        },
		        error: function(data) {
		          	alert("There was an error. Try again please!");
		          	// console.log('no');
		        }
	    	});
		});
	});
</script>
@endsection
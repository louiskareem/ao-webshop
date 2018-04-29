@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Da Vinci Webshop</div>

                <div class="card-body">
                    <h1>Order Completed</h1>

					@if (Session::has('message'))
					    <div class="alert alert-success" role="alert">
					      <strong>Well done!</strong> {!! session('message') !!}
					    </div>
					@endif

                    <table class="table">
                        <tr>
                            <td>Client</td>
                            @foreach($order_details as $order_detail)
                                <td>{{ $order_detail->order->client->user->name }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Product</td>
                            @foreach($order_details as $order_detail)
                                <td>{{$order_detail->product->name}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Status</td>
                            @foreach($order_details as $order_detail)
                                <td>{{ $order_detail->order->status }}</td>
                            @endforeach
                        </tr>
                    </table>

                    <button class="btn btn-button-primary">Continue</button>
                    <button class="btn btn-button-info">Home</button>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
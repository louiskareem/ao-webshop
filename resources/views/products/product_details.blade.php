@extends('layouts.app')

@section('content')

<!-- @if (Session::has('message'))
    <div class="alert alert-success" role="alert">
      <strong>Well done!</strong> {!! session('message') !!}
    </div>
@endif -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Da Vinci Webshop</div>

                <div class="card-body">
                    <div>
                        <h4>{{ $product->name }}</h4>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr> 
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>&euro; {{ $product->price }}</td>
                                <td><a class="btn btn-dark" href="{{ action('OrderController@getProduct', $product->id) }}">Add to cart</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
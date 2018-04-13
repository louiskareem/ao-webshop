@extends('layouts.app')

@section('content')

@if (Session::has('message'))
    <div class="alert alert-success" role="alert">
      <strong>Well done!</strong> {!! session('message') !!}
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Da Vinci Webshop</div>

                <div class="card-body">
                    <h1>Shopping Cart</h1>
                    <form class="form-horizontal" method="POST" action="{{ action('OrderController@getProduct', $product->id) }}">

                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:50%">Product</th>
                                    <th style="width:50%">Description</th>
                                    <th style="width:10%">Price</th>
                                    <th style="width:8%">Quantity</th>
                                    <!-- <th style="width:22%" class="text-center">Subtotal</th> -->
                                    <th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <h4 class="nomargin"></h4>
                                                <p>{{ $product->name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Description">{{ $product->description }}</td>
                                    <td data-th="Price">{{ $product->price }}</td>
                                    <td data-th="Quantity">
                                        <input type="number" class="form-control text-center" value="">
                                    </td>
                                    <!-- <td data-th="Subtotal" class="text-center">1.99</td> -->
                                    <td class="actions" data-th="">
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o">Delete</i></button>               
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                                    <td colspan="2" class="hidden-xs"></td>
                                    <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                                    <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                                </tr>
                            </tfoot>
                        </table>
 
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
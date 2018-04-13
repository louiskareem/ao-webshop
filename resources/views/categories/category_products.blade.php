@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Da Vinci Webshop</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                    <th scope="col">Categories/Products</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories->products as $product)
                                <tr> 
                                    <td><a class="" href="{{ action('ProductController@display', $product->id) }}">{{ $product->name }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
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
                                <!-- <th scope="col">#</th> -->
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price (&euro;)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <!-- <th scope="row">1</th> -->
                                    <td><a href="{{ action('ProductController@display', $product->id) }}">{{ $product->name }}</a></td>
                                    <td>{{ $product->description }}</td>
                                    <td>&euro; {{ $product->price }}</td>
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
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

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
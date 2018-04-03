@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Da Vinci Webshop</div>

                <div class="card-body">
                        @foreach($categories as $category)
                            <div>
                                {{ $category->name }}
                            </div>
                        @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
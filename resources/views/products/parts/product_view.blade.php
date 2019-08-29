@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-4 shadow-sm">
            @if( Storage::has ($product->thumbnail))
                <img src="{{ Storage::url($product->thumbnail) }}" class="card-img-top" alt="...">
            @endif

            <div class="card-body">
                <h5 class="card-title">{{__($product->title) }}</h5>
                <p class="card-text">{{__($product->short_description) }}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
@endsection

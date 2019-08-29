@extends('layouts.app')

@section('content')
    @php
        if ($product->in_stock===0){
        $price=$product->price;
        } else {
        $price=$product->discount;
        }
      $thumbnail=str_replace("/", "\\",$product->thumbnail);
    @endphp
    <div class="container">
        <div class="card mb-4 shadow-sm">
            @if( Storage::has ($product->thumbnail))
                <img src="{{ Storage::url($product->thumbnail) }}" height="225" class="card-img-top"
                     style="max-width: 100%; margin: 0 auto; display: block;">
            @endif

            <div class="card-body">
                <h5 class="card-title">{{__($product->title) }}</h5>
                <hr>
                <p class="card-text">{{__($product->short_description) }}</p>
                <div class="d-flex flex-column justify-content-center align-items-start">
                    <small class="text-muted">Categories: </small>
                    <div class="btn-group align-self-end">
                        @if(!empty($product->categories))
                            @each('categories.parts.product_category', $product->categories, 'category')
                        @endif
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('product.show', $product->id) }}"
                               class="btn btn-sm btn-outline-dark">{{ __('Show') }}</a>
                        </div>
                        <span class="text-muted">{{ $price }}$</span>
                    </div>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
@endsection

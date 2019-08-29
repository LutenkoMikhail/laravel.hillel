@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center"> {{ __ ('Home Page') }} </h3>
                <div class="col-md-12">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-md-12">
                        <div class="album py-5 bg-light">
                            <div class="container">
                                <div class="row d-flex justify-content-between align-items-baseline">
                                    @each('products.parts.product_view',$products,'product')
{{--                                    @php--}}
{{--                                        dd($products);--}}
{{--                                    @endphp--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="album py-5 bg-light">
                            <div class="container">
                                <div class="row d-flex justify-content-between align-items-baseline">
                                    @each('categories.parts.category_view',$categories,'category')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
{{--            <div class="col-md-8">--}}
{{--                {{$products->links()}}--}}
{{--            </div>--}}
        </div>
    </div>
@endsection














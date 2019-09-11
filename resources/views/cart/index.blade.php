@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="text-center"> {{ __ ('Cart Page') }} </h1>
            </div>
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <div class="col-md-12">
                @if(Cart::count()>0)
                <table class="table table-light">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach(Cart::content() as $row)
                        <tr>
                            <td>
                                <p><strong> {{$row->name}}</strong></p>
                                <p>{{
                                ($row->options->has('size') ? $row->options->size : '')}}</p>
                            </td>
                            <td><input type="text" value="{{ $row->qty}}"></td>
                            <td>${{$row->price}}</td>
                            <td>${{$row->total}}</td>
                        </tr>
                    @endforeach

                    </tbody>

                    <table class="table table-dark" style="width: 50%;float: right;">
                        <tbody>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Subtotal</td>
                            <td>{{Cart::subtotal()}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Tax</td>
                            <td>{{Cart::tax()}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Total</td>
                            <td>{{Cart::total()}}</td>
                        </tr>
                        </tbody>

                    </table>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
                @else
              <h3 class="text-center">
                  There are no products in cart !
              </h3>


                @endif

        </div>
    </div>
@endsection














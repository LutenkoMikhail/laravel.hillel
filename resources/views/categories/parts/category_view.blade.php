@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-4 shadow-sm">

        <div class="card-body">
            <h5 class="card-title">{{__($category->title) }}</h5>
        </div>
    </div>
</div>
@endsection

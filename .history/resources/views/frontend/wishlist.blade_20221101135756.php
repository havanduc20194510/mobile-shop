@extends('layouts.front')

@section('title')
    My Cart
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/') }}">
                Home
            </a> /
            <a href="{{url('wishlist') }}">
                Wishlist
            </a>
          </h6>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow">
        <div class="card-body">
            @if ($wishlist)

            @else
                <h4>There are no product in your Wishlist</h4>
            @endif
        </div>
    </div>
</div>
@endsection

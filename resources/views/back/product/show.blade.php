@extends('layouts.master')

@section('content')
@if($product)

<div class="card col-lg-4 col-md-6">
    @if ($product->image)
    <img class="card-img-top" src="{{ asset('images/' . $product->image->link) }}" alt="{{ $product->image->title }}">
    @endif

    <div class="card-body">
        <h3 class="card-title">{{ $product->name }}</h3>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text">{{ $product->price }}</p>
        <p class="card-text">{{ $product->size }}</p>
        <p class="card-text">{{ $product->visibility }}</p>
        <p class="card-text">{{ $product->status }}</p>
        <p class="card-text">{{ $product->reference }}</p>
        <p class="card-text">{{ $product->category->gender }}</p>
    </div>
</div>
@endif
@endsection
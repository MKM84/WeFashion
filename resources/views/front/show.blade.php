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

        <p class="card-text">{{ $product->category->gender }}</p>
        <div class="input-radio">
            <h2>Taille</h2>
            <input type="radio" name="size" value="XL"> XL<br>
            <input type="radio" name="size" value="L"> L<br>
            <input type="radio" name="size" value="M" checked> M<br>
            <input type="radio" name="size" value="S"> S<br>
            <input type="radio" name="size" value="XS"> XS<br>

        </div>
        <a href="#" class="btn btn-primary">Acheter</a>
    </div>
</div>
@endif
@endsection
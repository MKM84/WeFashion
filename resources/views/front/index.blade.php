@extends('layouts.master')

@section('content')
@if(isset($productsCount))
<div>{{$productsCount}}</div>
@endif
@forelse($products as $product)
<div class="card col-lg-4 col-md-6">
    @if ($product->image)
    <img class="card-img-top" src="{{ asset('images/' . $product->image->link) }}" alt="{{ $product->image->title }}">
    @endif

    <div class="card-body">
        <h3 class="card-title">{{ $product->name }}</h3>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text">{{ $product->price }}</p>

        <p class="card-text">{{ $product->category->gender }}</p>
        <a href="{{ url('product', $product->id) }}" class="btn btn-primary">Details</a>
    </div>
</div>
@empty
<div>Désolée pour l'instant aucun livre n'est publié sur le site</div>
@endforelse
@endsection
@section('pagination')

    {{ $products->links() }}


@endsection
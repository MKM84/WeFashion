@extends('layouts.master')

@section('menu')
@include('front.partials.menu')
@endsection

@section('content')

<div class=" margin-btm-20 text-right">
    <h4>{{ $products->total() }} Résultats </h4>
</div>
<div class="row">
    @forelse($products as $product)

    <div class="card col-xs-12 col-sm-6 col-md-4">
        <a class="product-card-ctn" href="{{ url('product', $product->id) }}">

            @if ($product->image)
            <div class="cover-img">
                <img class="card-img-top img-responsive" src="{{ asset('images/' . $product->image->link) }}"
                    alt="Image produit">
            </div>
            @endif

            <div class="card-body">
                <h3 class="card-title">{{ $product->name }}</h3>

                @if($product->status == 'solde')
                <p class="card-text"> <span class="solded">{{ $product->price }} €</span> => {{floor( $product->price / 2)}} €</p>
                @else
                <p class="card-text"> <span>{{ $product->price }} €</span></p>
                @endif
            </div>
        </a>
    </div>
    @empty
    <div class="container-fluid">
        <h3>Désolée pour l'instant aucun produit n'est publié...</h3>
    </div>
    @endforelse
</div>

@section('pagination')
{{ $products->links() }}
@endsection

@endsection

@section('footer')
@include('front.partials.footer')
@endsection
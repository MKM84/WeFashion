@extends('layouts.master')

@section('menu')
@include('front.partials.menu')
@endsection
@section('content')
@if($product)

<div class="row">
    @if ($product->image)
    <div class="col-sm-4 col-sm-offset-2 cover-img">

        <img class="card-img-top" src="{{ asset('images/' . $product->image->link) }}" alt="Image produit">
    </div>
    @endif

    <div class="col-sm-4">
        <h2 class="card-title">{{ $product->name }}</h2>
        <p class="card-text">{{ $product->description }}</p>
        @if ($product->status == 'solde')
        <p class="card-text text-danger"> <strong> En soldes </strong></p>
        @endif
        <p class="card-text">Prix : <strong>{{ $product->price }} € </strong></p>
        @if(isset($product->category->gender))
        <p class="card-text"> Catégorie :
            @if (!is_null($product->category->gender)) {{$product->category->gender}}
            @else Non-renseignée @endif</p>
        @else
        <p class="card-text">Catégorie : non-définie</p>
        @endif
        <p class="card-text"> Référence : {{ $product->reference }}</p>


        <p class="card-text"> Choisissez votre taille </p>

        <div class="form-group ">
            <select class="form-control">
                @forelse($product->sizes as $size)
                <option>{{$size->name}}</option>
                @empty
                <option></option>
                @endforelse
            </select>
        </div>
        <div class="text-right">
            <a href="#" class="btn btn-primary">Acheter</a>
        </div>
    </div>
</div>
@endif
@endsection
@section('footer')
@include('front.partials.footer')
@endsection
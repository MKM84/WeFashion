@extends('layouts.master')

@section('content')
<p><a href="{{route('product.create')}}"><button type="button" class="btn btn-primary btn-lg">Ajouter un produit</button></a></p>
{{$products->links()}}
{{-- On inclut le fichier des messages retournés par les actions du contrôleurs BookController--}}
{{-- @include('back.book.partials.flash') --}}
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prix</th>
            <th>Tailles</th>
	         <th>Categorie</th>
            <th>État</th>
            <th>Réferece</th>
            <th>Visibilité</th>
            <th>Edition</th>
            <th>Show</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    @forelse($products as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->size}}</td>

            <td>{{(!is_null($product->category_id) ) ?  $product->category->gender  : 'Aucune catégorie'}} </td>
            <td>
                @if($product->status == 'sold')
                <button type="button" class="btn btn-success">en soldes</button>
                @else 
                <button type="button" class="btn btn-warning">standard</button>
                @endif
            </td>
            <td>{{$product->reference}}</td>

            <td>
                @if($product->visibility == 'published')
                <button type="button" class="btn btn-success">publié</button>
                @else 
                <button type="button" class="btn btn-warning">non-publié</button>
                @endif
            </td>
            <td>
                <a href="{{route('product.edit', $product->id)}}">Edit</a></td>
            <td>
                <a href="{{route('product.show', $product->id)}}"><img src="{{ asset('images/' .$product->image->link) }}" alt="" width="60"></a>
            </td>
            <td>
                <form class="delete" method="POST" action="{{route('product.destroy', $product->id)}}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input class="btn btn-danger" type="submit" value="delete" >
                </form>
            </td>
        </tr>
    @empty
        aucun titre ...
    @endforelse
    </tbody>
</table>
{{$products->links()}}
@endsection 
@section('scripts')
@parent
<script src="{{ asset('js/confirm.js') }}"></script>  
@endsection


@extends('layouts.master')

@section('menu')
@include('back.partials.menu')
@endsection
@section('content')
{{-- On inclut le fichier des messages retournés par les actions du contrôleurs BookController--}}
@include('back.partials.flash')
<div class=" margin-btm-20 text-right">
    <a href="{{route('product.create')}}"><button type="button" class="btn btn-primary btn-md">Nouveau</button></a>
</div>



<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Prix(€)</th>
                <th>État</th>
                <th>Visibilité</th>

                <th>Éditer</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{$product->name}}</td>

                <td>
                    @if(is_null($product->category_id)) aucune catégorie
                    @else
                    {{$product->category->gender}}
                    @endif

                </td>
                <td>{{$product->price}} </td>

                <td>
                    @if($product->status == 'solde')
                    <button type="button" class="btn btn-success btn-xs">en soldes</button>
                    @else
                    <button type="button" class="btn  btn-xs">standard</button>
                    @endif
                </td>
                <td>
                    @if($product->visibility == 'published')
                    <button type="button" class="btn btn-info btn-xs">publié</button>
                    @else
                    <button type="button" class="btn btn-primary btn-xs">non-publié</button>
                    @endif
                </td>

                <td>
                    <a href=" {{route('product.edit', $product->id)}}">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </a></td>

                <td>
                    <form class="delete" method="POST" action="{{route('product.destroy', $product->id)}}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}

                        <input class="btn btn-danger btn-sm" type="submit" value="Supprimer">
                    </form>
                </td>
            </tr>
            @empty
            <div class="container-fluid">
                <h3> Aucun produit...</h3>
                @endforelse
        </tbody>
    </table>
    @section('pagination')
    {{ $products->links() }}
    @endsection

    @endsection

    @section('scripts')
    @parent
    <script src="{{ asset('js/confirm.js') }}"></script>
    @endsection
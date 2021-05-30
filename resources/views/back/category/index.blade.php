@extends('layouts.master')

@section('menu')
@include('back.partials.menu')
@endsection

@section('content')

{{-- Message succes  --}}
@include('back.partials.flash')

<p><a href="{{route('category.create')}}">
        <div class=" margin-btm-20 text-right">
            <button type="button" class="btn btn-primary btn-md">Ajouter une catégorie</button>
    </a></p>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Genre</th>
            <th>Id</th>
            <th>Éditer</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        @forelse($gategories as $category)
        <tr>
            <td>{{$category->gender}}</td>
            <td>{{$category->id}}</td>
            <td>
                <a href="{{route('category.edit', $category->id)}}"> <span class="glyphicon glyphicon-edit"
                        aria-hidden="true"></span></a>
            </td>

            <td>
                <form class="delete" method="POST" action="{{route('category.destroy', $category->id)}}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input class="btn btn-danger" type="submit" value="Supprimer">
                </form>
            </td>
        </tr>
        @empty
        <div class="container-fluid">
        Aucune categorie ...
        </div>
        @endforelse
    </tbody>
</table>

@endsection
@section('scripts')
@parent
{{-- Confirm when delete  --}}
<script src="{{ asset('js/confirm.js') }}"></script>
@endsection
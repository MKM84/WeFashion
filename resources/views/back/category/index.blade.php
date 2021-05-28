@extends('layouts.master')

@section('content')
<p><a href="{{route('category.create')}}"><button type="button" class="btn btn-primary btn-lg">Ajouter un
            produit</button></a></p>

{{-- On inclut le fichier des messages retournés par les actions du contrôleurs BookController--}}
{{-- @include('back.book.partials.flash') --}}
<table class="table table-striped">
    <thead>
        <tr>
            <th>Gender</th>
            <th>Id</th>
            <th>Edition</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @forelse($gategories as $category)
        <tr>
            <td>{{$category->gender}}</td>
            <td>{{$category->id}}</td>
            <td>
                <a href="{{route('category.edit', $category->id)}}">Edit</a></td>

            <td>
                <form class="delete" method="POST" action="{{route('category.destroy', $category->id)}}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input class="btn btn-danger" type="submit" value="delete">
                </form>
            </td>
        </tr>
        @empty
        aucune categorie ...
        @endforelse
    </tbody>
</table>

@endsection
@section('scripts')
@parent
<script src="{{ asset('js/confirm.js') }}"></script>
@endsection
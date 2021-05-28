@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Edit</h1>
            <form action="{{ route('category.update', $category->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form">


                    <div class="form-group">
                        <label for="id">gender</label>
                        <input type="text" name="gender" value="{{ $category->gender }}" class="form-control"
                            id="gender" placeholder="gender de la catégorie">
                        @if ($errors->has('gender')) <span
                            class="error bg-warning text-warning">{{ $errors->first('gender') }}</span>@endif
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>



            </form>
        </div>
        @endsection
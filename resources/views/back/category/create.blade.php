@extends('layouts.master')
@section('menu')
@include('back.partials.menu')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Ajouter une catégorie </h3>
            <h1>@if ($errors->has('gender'))@endif</h1>
            <form action="{{ route('category.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form">

                    <div class="form-group">
                        <label for="id">Genre</label>
                        <input type="text" name="gender" value="{{ old('gender') }}" class="form-control" id="gender"
                            placeholder="Genre de la catégorie">
                        @if ($errors->has('gender')) <span
                            class="error bg-warning text-warning">{{ $errors->first('gender') }}</span>@endif
                    </div>
                    <div class="text-right margin-top-20 margin-btm-20">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>



            </form>
        </div>
        @endsection
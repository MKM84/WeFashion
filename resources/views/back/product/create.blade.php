@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Create Book : </h1>
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form">

                    <div class="form-group">
                        <label for="title">Nom :</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name"
                            placeholder="Nom du produit">
                        @if ($errors->has('name')) <span
                            class="error bg-warning text-warning">{{ $errors->first('name') }}</span>@endif
                    </div>

                    <div class="form-group">
                        <label for="price">Description :</label>
                        <textarea type="text" name="description" class="form-control"
                            placeholder="Description du produit">{{ old('description') }}</textarea>
                        @if ($errors->has('description')) <span
                            class="error bg-warning text-warning">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" value="{{ old('price') }}" class="form-control" id="price"
                            placeholder="Prix du produit">
                        @if ($errors->has('price')) <span
                            class="error bg-warning text-warning">{{ $errors->first('price') }}</span>@endif
                    </div>
                    <div class="form-group">
                        <label for="reference">Référence</label>
                        <input type="text" name="reference" value="{{ old('reference') }}" class="form-control"
                            id="reference" placeholder="Prix du produit">
                        @if ($errors->has('reference')) <span
                            class="error bg-warning text-warning">{{ $errors->first('reference') }}</span>@endif
                    </div>

                </div>
                <div class="form-select">
                    <label for="category">Catégorie :</label>
                    <select id="category" name="category_id">
                        {{-- <option value="0" {{ is_null(old('category_id')) ? 'selected' : '' }}>No category</option>
                        --}}
                        @foreach ($categories as $id => $gender)
                        <option {{ old('category_id') == $id ? 'selected' : '' }} value="{{ $id }}">
                            {{ $gender }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- <h1>Choisissez un/des auteurs</h1>
                <div class="form-inline">
                    <div class="form-group">
                        @forelse($authors as $id => $name)
                        <label class="control-label" for="author{{ $id }}">{{ $name }}</label>
                <input name="authors[]" value="{{ $id }}"
                    {{ (!empty(old('authors')) and in_array($id, old('authors'))) ? 'checked' : '' }} type="checkbox"
                    class="form-control" id="author{{ $id }}">
                @empty
                @endforelse
        </div>
    </div> --}}
</div><!-- #end col md 6 -->
<div class="col-md-6">
    <button type="submit" class="btn btn-primary">Ajouter un livre</button>
    <div class="input-radio">
        <h2>Status</h2>
        <input type="radio" @if (old('status')=='sold' ) checked @endif name="status" value="sold" checked> En
        soldes<br>
        <input type="radio" @if (old('status')=='satandard' ) checked @endif name="status" value="satandard">
        Satandard<br>
    </div>
    <div class="input-radio">
        <h2>Visibilité</h2>
        <input type="radio" @if (old('visibility')=='published' ) checked @endif name="visibility" value="published"
            checked> Publié<br>
        <input type="radio" @if (old('visibility')=='unpublished' ) checked @endif name="visibility"
            value="unpublished"> Non Publié<br>
    </div>
    {{-- <div class="input-radio">
        <h2>Taille</h2>
        <input type="radio" @if (old('size')=='XL' ) checked @endif name="size" value="XL" checked> XL<br>
        <input type="radio" @if (old('size')=='L' ) checked @endif name="size" value="L" checked> L<br>
        <input type="radio" @if (old('size')=='M' ) checked @endif name="size" value="M" checked> M<br>
        <input type="radio" @if (old('size')=='S' ) checked @endif name="size" value="S" checked> S<br>
        <input type="radio" @if (old('size')=='XS' ) checked @endif name="size" value="XS" checked> XS<br>

    </div> --}}
    <h2>Image</h2>

    <input class="file" type="file" name="image">
    @if ($errors->has('image')) <span class="error bg-warning text-warning">{{ $errors->first('image') }}</span> @endif
</div><!-- #end col md 6 -->
</form>
</div>
@endsection
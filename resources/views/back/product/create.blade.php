@extends('layouts.master')
@section('menu')
@include('back.partials.menu')
@endsection
@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <h3>Ajouter un prduit </h3>
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form">

                <div class="form-group">
                    <label for="name">Nom :</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name"
                        placeholder="Nom du produit">
                    @if ($errors->has('name')) <span
                        class="error bg-warning text-warning">{{ $errors->first('name') }}</span>@endif
                </div>

                <div class="form-group">
                    <label for="price">Déscription :</label>
                    <textarea name="description" class="form-control"
                        placeholder="Déscription du produit">{{ old('description') }}</textarea>
                    @if ($errors->has('description')) <span
                        class="error bg-warning text-warning">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="price">Prix</label>
                    <input type="text" name="price" value="{{ old('price') }}" class="form-control" id="price"
                        placeholder="Prix du produit">
                    @if ($errors->has('price')) <span
                        class="error bg-warning text-warning">{{ $errors->first('price') }}</span>@endif
                </div>
                <div class="form-group">
                    <label for="reference">Référence</label>
                    <input type="text" name="reference" value="{{ old('reference') }}" class="form-control"
                        id="reference" placeholder="Référence du produit">
                    @if ($errors->has('reference')) <span
                        class="error bg-warning text-warning">{{ $errors->first('reference') }}</span>@endif
                </div>

                <div class="form-select">
                    <label for="category">Catégorie :</label>
                    <select id="category" name="category_id">

                        <option {{ is_null(old('category_id')) ? 'selected' : '' }} value="0">Non-genre</option>

                        @foreach ($categories as $id => $gender)
                        <option {{ old('category_id') == $id ? 'selected' : '' }} value="{{ $id }}">
                            {{ $gender }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <h5><strong>Taille(s) :</strong></h5>

                    @forelse($sizes as $id => $name)
                    <label class="control-label" for="size{{ $id }}">
                        <input name="sizes[]" value="{{ $id }}"
                            {{ (!empty(old('sizes')) and in_array($id, old('sizes'))) ? 'checked' : '' }}
                            type="checkbox" class="" id="size{{ $id }}">
                        {{ $name }}</label>
                    @empty
                    @endforelse
                </div>

                <div class="input-radio">
                    <h2>Status</h2>
                    <input type="radio" @if (old('status')=='solde' ) checked @endif name="status" value="solde"
                        checked>
                    En
                    soldes<br>
                    <input type="radio" @if (old('status')=='standard' ) checked @endif name="status" value="standard">
                    Standard<br>
                </div>
                <div class="input-radio">
                    <h2>Visibilité</h2>
                    <input type="radio" @if (old('visibility')=='published' ) checked @endif name="visibility"
                        value="published" checked> Publié<br>
                    <input type="radio" @if (old('visibility')=='unpublished' ) checked @endif name="visibility"
                        value="unpublished"> Non Publié<br>
                </div>

                <div class="form-group">
                    <h5><strong>Image</strong></h5>

                    <input class="file" type="file" name="image">
                    @if ($errors->has('image')) <span
                        class="error bg-warning text-warning">{{ $errors->first('image') }}</span> @endif
                </div>
                <div class="text-right margin-top-20 margin-btm-20">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </div> {{-- form --}}
        </form>
    </div> {{-- container --}}
</div> {{-- col-md-8 col-md-offset-2--}}

@endsection
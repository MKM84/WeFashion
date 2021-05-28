@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Create Book : </h1>
            <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form">

                    <div class="form-group">
                        <label for="title">Nom :</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control" id="name">
                        @if ($errors->has('name')) <span
                            class="error bg-warning text-warning">{{ $errors->first('name') }}</span>@endif
                    </div>

                    <div class="form-group">
                        <label for="price">Description :</label>
                        <textarea type="text" name="description"
                            class="form-control">{{$product->description }}</textarea>
                        @if ($errors->has('description')) <span
                            class="error bg-warning text-warning">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" value="{{ $product->price }}" class="form-control" id="price">
                        @if ($errors->has('price')) <span
                            class="error bg-warning text-warning">{{ $errors->first('price') }}</span>@endif
                    </div>
                    <div class="form-group">
                        <label for="reference">Référence</label>
                        <input type="text" name="reference" value="{{ $product->reference }}" class="form-control"
                            id="reference">
                        @if ($errors->has('reference')) <span
                            class="error bg-warning text-warning">{{ $errors->first('reference') }}</span>@endif
                    </div>

                </div>
                <div class="form-select">
                    <label for="category">Catégorie :</label>
                    <select id="category" name="category_id">
                        {{-- <option value="0" {{ is_null(old('category_id')) ? 'selected' : '' }}>No category</option>
                        --}}
                        @foreach ($categories as $id => $category)
                        <option
                            {{ (!is_null($product->category_id) and $product->category_id == $category->id)? 'selected' : '' }}
                            value="{{ $category->id }}">
                            {{ $category->gender }}</option>
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
        <input type="radio" {{$product->status  == 'sold' ? "checked" : ""}} name="status" value="sold"> En soldes<br>
        <input type="radio" {{$product->status  == 'standard' ? "checked" : ""}} name="status" value="standard">
        standard<br>
    </div>
    <div class="input-radio">
        <h2>Visibilité</h2>
        <input type="radio" @if ($product->visibility == 'published') checked @endif name="visibility" value="published"
        > Publié<br>
        <input type="radio" @if ($product->visibility == 'unpublished') checked @endif name="visibility"
        value="unpublished"> Non Publié<br>
    </div>
    <div class="input-radio">
        <h2>Taille</h2>
        <input type="radio" @if ($product->size =='XL' ) checked @endif name="size" value="XL"
        > XL<br>
        <input type="radio" @if ($product->size =='L' ) checked @endif name="size" value="L"
        > L<br>
        <input type="radio" @if ($product->size =='M' ) checked @endif name="size" value="M"
        > M<br>
        <input type="radio" @if ($product->size =='S' ) checked @endif name="size" value="S"
        > S<br>
        <input type="radio" @if ($product->size =='XS' ) checked @endif name="size" value="XS"
        > XS<br>

    </div>
    <h2>Image</h2>

    <input class="file" type="file" name="image"><span>{{$product->image->link}}</span>
    <img src="{{ asset('images/' .$product->image->link) }}" alt="" width="60">
    @if ($errors->has('image')) <span class="error bg-warning text-warning">{{ $errors->first('image') }}</span> @endif
</div><!-- #end col md 6 -->
</form>
</div>
@endsection
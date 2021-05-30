@extends('layouts.master')

@section('menu')
@include('back.partials.menu')
@endsection

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Éditer le produit</h3>
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
                        <label for="price">Déscription :</label>
                        <textarea type="text" name="description"
                            class="form-control">{{$product->description }}</textarea>
                        @if ($errors->has('description')) <span
                            class="error bg-warning text-warning">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">Prix</label>
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
                        <option {{ is_null($product->category_id) ? 'selected' : ''}} value="0">
                            Non-genre</option>
                        @foreach ($categories as $id => $category)
                        <option
                            {{ (!is_null($product->category_id) and $product->category_id == $category->id)? 'selected' : '' }}
                            value="{{ $category->id }}">
                            {{ $category->gender }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <h5><strong>Taille(s) :</strong></h5>
                    @forelse($sizes as $id => $name)
                    <label class="control-label " for="size{{ $id }}">
                        <input name="sizes[]" value="{{ $id }}" @if (is_null($product->sizes) == false and
                        in_array($id, $product->sizes()->pluck('id')->all(),))
                        checked @endif
                        type="checkbox"
                        id="size{{ $id }}">
                        {{ $name }}
                    </label>
                    @empty
                    @endforelse
                </div>

                <div class="input-radio">
                    <h5><strong>Status :</strong></h5>
                    <input type="radio" {{$product->status  == 'solde' ? "checked" : ""}} name="status" value="solde">
                    En
                    soldes<br>
                    <input type="radio" {{$product->status  == 'standard' ? "checked" : ""}} name="status"
                        value="standard">
                    standard<br>
                </div>
                <div class="input-radio">
                    <h5><strong>Visibilité :</strong></h5>
                    <input type="radio" @if ($product->visibility == 'published') checked @endif name="visibility"
                    value="published"
                    > Publié<br>
                    <input type="radio" @if ($product->visibility == 'unpublished') checked @endif name="visibility"
                    value="unpublished"> Non Publié<br>
                </div>

                <div class="form-group">
                    <h5><strong>Image</strong></h5>
                    <input class="file" type="file" name="image">
                    @if ($errors->has('image')) <span
                        class="error bg-warning text-warning">{{ $errors->first('image') }}</span>
                    @endif
                    <div class="margin-top-20">
                        <img src="{{ asset('images/' .$product->image->link) }}" alt="" width="60">
                        <span>{{$product->image->link}}</span>
                    </div>
                </div>
                <div class="text-right margin-top-20 margin-btm-20">
                    <button type="submit" class="btn btn-primary">Éditer</button>
                </div>
            </form>
        </div><!-- #end col md 6 -->

    </div>
    @endsection
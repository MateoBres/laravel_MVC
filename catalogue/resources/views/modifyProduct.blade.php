@extends('layouts.layout')

@section('content')


    <h1>Modify product</h1>

    @if( $errors->any() )
        <div class="alert alert-danger col-8 mx-auto p-4">
            <ul>
                @foreach($errors ->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

        <form action="/modifyProduct" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            Name: <br>
            <input type="text" name="prdName"
                   value="{{old('prdName', $Product->prdName)}}"
                   class="form-control">
            <br>
            Price: <br>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">£</div>
                </div>
                <input type="number" name="prdPrice"
                       value="{{old('prdPrice', $Product->prdPrice)}}"
                       class="form-control">
            </div>
            <br>
            Brand: <br>
            <select name="idBrand" class="form-control" required>
                <option value="{{ $Product->idBrand }}">
                    {{ $Product->relBrand->brName }}
                </option>
                @foreach($brands as $brand)
                    <option value="{{$brand->idBrand}}">{{$brand->brName}}</option>
                @endforeach
            </select>
            <br>
            Category: <br>
            <select name="idCategory" class="form-control" required>
                <option value="{{ $Product->idCategory }}">
                    {{ $Product->relCategory->catName }}
                </option>
                @foreach($categories as $category)
                    <option value="{{$category->idCategory}}">{{$category->catName}}</option>
                @endforeach
            </select>
            <br>
            Presentation: <br>
            <textarea name="prdDetail" class="form-control"
            >{{old('prdDetail', $Product->prdDetail)}}</textarea>
            <br>
            Stock: <br>
            <input type="number" name="prdStock"
                   value="{{old('prdStock', $Product->prdStock)}}"
                   class="form-control">
            <br>
            Current image: <br>
            <img src="/products/{{ $Product->prdImage }}" class="img-thumbnail">
            <br>
            Modify Image:
            <div class="custom-file mt-1 mb-4">
                <input type="file" name="prdImage"  class="custom-file-input"
                       id="customFileLang" lang="es">
                <label class="custom-file-label" for="customFileLang"
                       data-browse="Seek in browser">Select image: </label>
            </div>

            <input type="hidden" name="idProduct"
                   value="{{ $Product->idProduct }}">
            <input type="hidden" name="currImage"
                   value="{{ $Product->prdImage }}">
            <br>
            <button class="btn btn-dark mb-3">Modify product</button>
            <a href="/adminProducts" class="btn btn-outline-secondary mb-3">Back to Panel</a>
        </form>

    </div>



@endsection


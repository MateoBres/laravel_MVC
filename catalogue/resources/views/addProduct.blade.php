@extends('layouts.layout')

@section('content')


        <h1>Registration of a new product</h1>

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

            <form action="/addProduct" method="post" enctype="multipart/form-data">

            @csrf
                Name: <br>
                <input type="text" name="prdName"
                       value="{{old('prdName')}}"
                       class="form-control">
                <br>
                Price: <br>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">£</div>
                    </div>
                    <input type="number" name="prdPrice"
                           value="{{old('prdPrice')}}"
                           class="form-control">
                </div>
                <br>
                Brand: <br>
                <select name="idBrand" class="form-control" required>
                    <option value="">Select a brand</option>
                @foreach($brands as $brand)
                    <option value="{{$brand->idBrand}}">{{$brand->brName}}</option>
                @endforeach
                </select>
                <br>
                Category: <br>
                <select name="idCategory" class="form-control" required>
                    <option value="">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{$category->idCategory}}">{{$category->catName}}</option>
                @endforeach
                </select>
                <br>
                Presentation: <br>
                <textarea name="prdDetail" class="form-control"
                        >{{old('prdDetail')}}</textarea>
                <br>
                Stock: <br>
                <input type="number" name="prdStock"
                       value="{{old('prdStock')}}"
                       class="form-control">
                <br>
                Image: <br>

                <div class="custom-file mt-1 mb-4">
                    <input type="file" name="prdImage"  class="custom-file-input"
                           id="customFileLang" lang="es">
                    <label class="custom-file-label" for="customFileLang"
                           data-browse="Seek in browser">Select file: </label>
                </div>

                <br>
                <button class="btn btn-dark mb-3">Add product</button>
                <a href="/adminProducts" class="btn btn-outline-secondary mb-3">Back to Panel</a>
            </form>

        </div>



   @endsection


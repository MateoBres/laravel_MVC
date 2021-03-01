@extends('layouts.layout')

    @section('content')

        <h1>Modifying a category</h1>

        <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

            <form action="/modifyCategory" method="post">
            @csrf
                @method('put')
                <div class="form-group">
                    <label for="catName">Category name</label>
                    <input type="text" name="catName"
                           value="{{ old('catName', $Category->catName ) }}"
                           class="form-control" id="catName">
                    <input type="hidden" name="idCategory"
                           value="{{ $Category->idCategory }}">
                </div>
                <button class="btn btn-dark mr-3">Modify category</button>
                <a href="/adminCategories" class="btn btn-outline-secondary">
                    Back to panel
                </a>
            </form>
        </div>

        @if( $errors->any() )
            <div class="alert alert-danger col-8 mx-auto p-2">
                <ul>
                @foreach( $errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif



    @endsection


@extends('layouts.layout')

    @section('content')

        <h1>Registration of a new category</h1>

        <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

            <form action="/addCategory" method="post">
            @csrf
                <div class="form-group">
                    <label for="catName">Category's name</label>
                    <input type="text" name="catName"
                           value="{{ old('catName') }}"
                           class="form-control" id="catName">
                </div>
                <button class="btn btn-dark mr-3">Add category</button>
                <a href="/adminCategories" class="btn btn-outline-secondary">
                    Back to panel
                </a>
            </form>
        </div>

        @if( $errors->any() )
            <div class="alert alert-danger col-8 mx-auto p-4">
                <ul>
                    @foreach($errors ->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    @endsection


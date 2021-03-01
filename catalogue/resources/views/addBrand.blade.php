@extends('layouts.layout')

    @section('content')

        <h1>New brand registration</h1>

        <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

            <form action="/addBrand" method="post">
            @csrf
                <div class="form-group">
                    <label for="brName">Brand name</label>
                    <input type="text" name="brName"
                           value="{{ old('brName') }}"
                           class="form-control" id="brName">
                </div>
                <button class="btn btn-dark mr-3">Add brand</button>
                <a href="/adminBrands" class="btn btn-outline-secondary">
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


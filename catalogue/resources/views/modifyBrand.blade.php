@extends('layouts.layout')

    @section('content')

        <h1>Modification of a brand</h1>

        <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

            <form action="/modifyBrand" method="post">
            @csrf
                @method('put')
                <div class="form-group">
                    <label for="brName">Brand name</label>
                    <input type="text" name="brName"
                           value="{{ old('brName', $Brand->brName ) }}"
                           class="form-control" id="brName">
                    <input type="hidden" name="idBrand"
                           value="{{ $Brand->idBrand }}">
                </div>
                <button class="btn btn-dark mr-3">Modify brand</button>
                <a href="/adminBrands" class="btn btn-outline-secondary">
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


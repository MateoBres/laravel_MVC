@extends('layouts.layout')

    @section('content')

        <h1>Brand administration panel</h1>

        @if ( session('message') )
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <table class="table table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Brand</th>
                    <th colspan="2">
                        <a href="/addBrand" class="btn btn-outline-secondary">
                            Add new
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach( $brands as $brand )
                <tr>
                    <td>{{ $brand->idBrand }}</td>
                    <td>{{ $brand->brName }}</td>
                    <td>
                        <a href="/modifyBrand/{{$brand->idBrand}}" class="btn btn-outline-secondary">
                            Modify
                        </a>
                    </td>
                    <td>
                        <a href="/deleteBrand/{{$brand->idBrand}}" class="btn btn-outline-secondary">
                            Delete
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{$brands->links()}}

    @endsection

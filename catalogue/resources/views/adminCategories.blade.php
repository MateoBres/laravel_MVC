@extends('layouts.layout')

    @section('content')

        <h1>Categories administration panel</h1>

        @if ( session('message') )
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <table class="table table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th colspan="2">
                        <a href="/addCategory" class="btn btn-outline-secondary">
                            Add new
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach( $categories as $category )
                <tr>
                    <td>{{ $category->idCategory }}</td>
                    <td>{{ $category->catName }}</td>
                    <td>
                        <a href="/modifyCategory/{{$category->idCategory}}" class="btn btn-outline-secondary">
                            Modify
                        </a>
                    </td>
                    <td>
                        <a href="/deleteCategory/{{$category->idCategory}}" class="btn btn-outline-secondary">
                            Delete
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{$categories->links()}}

    @endsection





@extends('layouts.layout')

    @section('content')

        <h1>Product administration panel</h1>

        @if ( session('message') )
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <table class="table table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Detail</th>
                    <th>Image</th>
                    <th colspan="2">
                        <a href="/addProduct" class="btn btn-outline-secondary">
                            Add new
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->prdName }}</td>
                    <td>{{ $product->relBrand->brName }}</td>
                    <td>{{ $product->relCategory->catName }}</td>
                    <td>£{{ $product->prdPrice }}</td>
                    <td>{{ $product->prdDetail }}</td>
                    <td>
                        <img src="/products/{{ $product->prdImage }}" class="img-thumbnail">
                    </td>
                    <td>
                        <a href="/modifyProduct/{{ $product->idProduct }}" class="btn btn-outline-secondary">
                            Modify
                        </a>
                    </td>
                    <td>
                        <a href="/deleteProduct/{{ $product->idProduct }}" class="btn btn-outline-secondary">
                            Delete
                        </a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>

        {{$products->links()}}

    @endsection

@extends('layouts.layout')

    @section('content')

        <h1>Delete a product</h1>

        <div class="row alert bg-light border-danger col-8 mx-auto p-2">
            <div class="col">
                <img src="/products/{{$Product->prdImage}}" class="img-thumbnail">
            </div>
        </div>
            <div class="col text-danger align-self-center">
            <form action="/deleteProduct" method="post">
            @csrf
            @method('delete')
                <h2>{{$Product->prdName}}</h2>
                Category: {{$Product->relCategory->catName}}  <br>
                Brand:  {{$Product->relBrand->brName}} <br>
                Detail: {{$Product->prdDetail}} <br>
                Price: £ {{$Product->prdPrice}}

                <input type="hidden" name="idProduct"
                       value="{{$Product->idProduct}}">
                <input type="hidden" name="prdName"
                       value="{{$Product->prdName}}">
                <button class="btn btn-danger btn-block my-3">Confirm</button>
                <a href="/adminProducts" class="btn btn-outline-secondary btn-block">
                    Back to panel
                </a>

            </form>
            </div>
        </form>

            <script>

                Swal.fire({
                    title: 'Do you want to remove the product?',
                    text: "This action can not be undone!",
                    type: 'error',
                    showCancelButton: true,
                    cancelButtonColor: '#8fc87a',
                    cancelButtonText: 'No, I don\'t want to delete it',
                    confirmButtonColor: '#d00',
                    confirmButtonText: 'Yes, I want to delete it'
                }).then((result) => {
                    if (!result.value) {
                        //redirect to adminProducts
                        window.location = '/adminProducts'
                    }
                })
            </script>


    @endsection

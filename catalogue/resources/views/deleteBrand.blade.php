@extends('layouts.layout')

    @section('content')

        <h1>Delete a brand</h1>

            <div class="col text-danger align-self-center">
                <form action="/deleteBrand" method="post">
                @csrf
                @method('delete')
                    <h2>{{$Brand->brName}}</h2>

                    <input type="hidden" name="idBrand"
                           value="{{$Brand->idBrand}}">
                    <input type="hidden" name="brName"
                           value="{{$Brand->brName}}">
                    <button class="btn btn-danger btn-block my-3">Confirm</button>
                    <a href="/adminBrands" class="btn btn-outline-secondary btn-block">
                        Back to panel
                    </a>

                </form>
            </div>
        </form>

            <script>
                Swal.fire({
                    title: 'Do you want to remove the brand?',
                    text: "This action can not be undone!",
                    type: 'error',
                    showCancelButton: true,
                    cancelButtonColor: '#8fc87a',
                    cancelButtonText: 'No, I don\'t want to delete it',
                    confirmButtonColor: '#d00',
                    confirmButtonText: 'Yes, I want to delete it'
                }).then((result) => {
                    if (!result.value) {
                        //redirect to adminBrands
                        window.location = '/adminBrands'
                    }
                })
            </script>


    @endsection

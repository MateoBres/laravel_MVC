@extends('layouts.layout')

    @section('content')

        <h1>Delete a category</h1>

            <div class="col text-danger align-self-center">
                <form action="/deleteCategory" method="post">
                @csrf
                @method('delete')
                    <h2>{{$Category->catName}}</h2>

                    <input type="hidden" name="idCategory"
                           value="{{$Category->idCategory}}">
                    <input type="hidden" name="catName"
                           value="{{$Category->catName}}">
                    <button class="btn btn-danger btn-block my-3">Confirm</button>
                    <a href="/adminCategories" class="btn btn-outline-secondary btn-block">
                        Back to panel
                    </a>

                </form>
            </div>
        </form>

            <script>
                Swal.fire({
                    title: 'Do you want to remove the category?',
                    text: "This action can not be undone!",
                    type: 'error',
                    showCancelButton: true,
                    cancelButtonColor: '#8fc87a',
                    cancelButtonText: 'No, I don\'t want to delete it',
                    confirmButtonColor: '#d00',
                    confirmButtonText: 'Yes, I want to delete it'
                }).then((result) => {
                    if (!result.value) {
                        //redirect to adminCategories
                        window.location = '/adminCategories'
                    }
                })
            </script>


    @endsection

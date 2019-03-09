@extends('layouts.global')

@section('title') Edit book @endsection

@section('content')
    <div class='row'>
        <div class='col-md-8'>
            
            @if(session('status'))
                <div class='alert alert-success'>
                    {{ session('status') }}
                </div>
            @endif
            
            <form enctype="multipart/form-data" method="POST" action='{{ route("books.update", ["id" => $book->id]) }}' class='p-3 shadow-sm bg-white'>
                @csrf
                <input type='hidden' name='_method' value='POST'/>

                <label for='title'>Title</label><br>
                <input type='text' class='form-control' name='title' value="{{ $book->title }}" placeholder='Book title'/>
                <br>

                <label for='cover'>Cover</label><br>
                <small class='text-muted'>Current cover</small><br>
                @if($book->cover)
                    <img src='{{ asset("storage/". $book->cover) }}' width='96px'/>
                @endif
                <br><br>
                <input type='file' name='cover' class='form-control'/>
                <small class='text-muted'>Kosongkan jika tidak ingin mengubah cover</small>
                <br><br>

                <label for='slug'>Slug</label>
                <input type='text' class='form-control' name='slug' value='{{ $book->slug }}' placeholder="enter-a-slug"/>
                <br>

                <label for='description'>Description</label><br>
                <textarea name='description' id='description' class='form-control'>{{ $book->description }}</textarea>
                <br>

                <label for='categories'>Categories</label>
                <select multiple class='form-control' name='categories[]' id='categories'></select>
                <br>

                <label for='stock'>Stock</label><br>
                <input type='text' class='form-control' placeholder='stock' id='stock' name='stock' value='{{ $book->stock }}'/>
                <br>

                <label for='author'>Author</label><br>
                <input type='text' name='author' id='author' class='form-control' value='{{ $book->author }}' placeholder='author'/>
                <br>

                <label for='publisher'>Publisher</label><br>
                <input type='text' class='form-control' name='publisher' id='publisher' placeholder='publisher' value='{{ $book->publisher }}'/>
                <br>

                <label for='price'>Price</label><br>
                <input type='text' class='form-control' name='price' id='price' value='{{ $book->price }}' placeholder='price'/>

                <select for='status'>Status</label>
                <select name='status' id='status' class='form-control'>
                    <option value='PUBLISH' {{ $book->status == 'PUBLISH' ? 'selected' : ''}}>PUBLISH</option>
                    <option value='DRAFT' {{ $book->status == 'DRAFT' ? 'selected' : ''}}>DRAFT</option>
                </select>
                <br>

                <button class='btn btn-primary' value='PUBLISH'>Update</button>
            </form>
        </div>
    </div>
@endsection

@section('footer-scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-
    rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-
    rc.0/js/select2.min.js"></script>

    <script>
        $('#categories').select2({
            ajax: {
                url: 'http://larashop.test/ajax/categories/search',
                processResults: function(data) {
                    return {
                        results: data.map(function(item) return{
                            id: item.id,
                            text: item.name
                        })
                    }
                }
            }
        });

        let categories = {!! $book->categories !!}
        
        categories.forEach(function(category) {
            let option = new Option(category.name, category.id, true, true);
            $('#categories').append(option).trigger('change');
        })
    </script>

@endsection

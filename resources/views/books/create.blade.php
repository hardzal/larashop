@extends('layouts.global')

@section('title') Create book @endsection

@section('content')
    <div class='row'>
        <div class='col-md-8'>
            @if (session('status'))
                <div class='alert alert-success'>
                    {{ session('status') }}
                </div>
            @endif
            <form 
                action="{{ route('books.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="shadow-sm p-3 bg-white">
                @csrf

                <label for="title">Title</label><br>
                <input value="{{ old('title') }}" type='text' class='form-control{{ $errors->first('title') ? " is-invalid" : "" }}' name='title' placeholder='book title'/>
                <div class="invalid-feedback">
                    {{ $errors->first('title') }}
                </div>
                <br>

                <label for="categories">Categories</label><br>
                <select multiple name="categories[]" id="categories" class="form-control{{ $errors->first('categories') ? " is-invalid" : "" }}"></select>
                <br>
                <div class="invalid-feedback">
                    {{ $errors->first('title') }}
                </div>
                <br/>

                <label for="cover">Cover</label>
                <input type='file' class='form-control{{ $errors->first('cover') ? " is-invalid" : "" }}' name='cover'/>
                <div class="invalid-feedback">
                    {{ $errors->first('cover') }}
                </div>
                <br>

                <label for='description'>Description</label><br>
                <textarea name='description' id='description' class='form-control{{ $errors->first('description') ? " is-invalid" : "" }}' placeholder='Give a description about this book'>{{ old('description') }}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('cover') }}
                </div>
                <br>

                <label for="stock">Stock</label><br>
                <input type='number' class='form-control{{ $errors->first('stock') ? " is-invalid" : ""}}' id='stock' name='stock' min=0 value={{ old('stock') ? old('stock') : 0 }}/>
                <div class="invalid-feedback">
                    {{ $errors->first('stock') }}
                </div>
                <br>

                <label for="author">Author</label><br>
                <input type='text' class='form-control{{ $errors->first('author') ? " is-invalid" : ""}}' name='author' id='author' placeholder='Book author' value="{{ old('author') }}"/>
                <div class="invalid-feedback">
                    {{ $errors->first('author') }}
                </div>
                <br>

                <label for='publisher'>Publisher</label><br>
                <input type='text' class='form-control{{ $errors->first('publisher') ? " is-invalid" : "" }} id='publisher' name='publisher' placeholder='Book publisher' value="{{ old('publisher') }}"/>
                <div class="invalid-feedback">
                    {{ $errors->first('publisher') }}
                </div>
                <br>

                <label for='price'>Price</label><br>
                <input type='number' class='form-control' name='price' id='price' placeholder='book price' value={{ old('price') ? old('price') : 0 }}/>
                <div class="invalid-feedback">
                    {{ $errors->first('price') }}
                </div>
                <br>

                <button class='btn btn-primary' name='save_action' value='PUBLISH'>Publish</button>

                <button class='btn btn-second' name='save_action' value='DRAFT'>Save as draft</button>
                
            </form>
        </div>
    </div>
@endsection

@section('footer-scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script type='text/javascript'>
        $('#categories').select2({
            ajax: {
                url: 'http://toko-online.test/ajax/categories/search',
                processResults: function(data) {
                    return {
                        results: data.map(function(item) {return{ id: item.id, text: item.name}
                        })
                    }
                }
            }
        });
    </script>
@endsection
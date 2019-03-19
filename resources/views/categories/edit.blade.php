@extends('layouts.global')

@section('title') Edit Category @endsection

@section('content')
    @if(session('status'))
        <div class='alert alert-success'>
            {{ session('status') }}
        </div>        
    @endif
    <div class='col-md-8'>
        <form action="{{ route('categories.update', ['id' => $category->id]) }}" enctype="multipart/form-data" method="POST" class="bg-white shadow-sm p-3">
            
            @csrf

            <input type='hidden' value='PUT' name='_method'/>
            
            <label for="name">Category Name</label><br>
            <input type="text" value="{{ old('name') ? old('name') : $category->name }}" name="name" class="form-control{{ $errors->first('name') ? " is-invalid" : ""}}"/>
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
            <br><br>

            <label for="slug">Category slug</label>
            <input type="text" name="slug" value="{{ old('slug') ? old('slug') : $category->slug }}" class="form-control{{ $errors->first('slug') ? " is-invalid" : "" }}"/>
            <div class="invalid-feedback">
                {{ $errors->first('slug') }}
            </div>
            <br><br>

            @if($category->image)
                <span>Current image</span><br>
                <img src="{{ asset('storage/'. $category->image) }}" width="120px"/><br><br>
            @endif

            <input type="file" name="image" class="form-control{{ $errors->first('image') ? " is-invalid" : "" }}"/><small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
            <div class="invalid-feedback">
                {{ $errors->first('image') }}
            </div>
            <br><br>

            <input type='submit' name='submit' value='Update' class='btn btn-primary'/>
        </form>
    </div>
@endsection
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
            <input type="text" value="{{ $category->name }}" name="name" class="form-control"/>
            <br><br>

            <label for="slug">Category slug</label>
            <input type="text" name="slug" value="{{ $category->slug }}" class="form-control"/>
            <br><br>

            @if($category->image)
                <span>Current image</span><br>
                <img src="{{ asset('storage/'. $category->image) }}" width="120px"/><br><br>
            @endif

            <input type="file" name="image" class="form-control"/><small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
            <br><br>

            <input type='submit' name='submit' value='Update' class='btn btn-primary'/>
        </form>
    </div>
@endsection
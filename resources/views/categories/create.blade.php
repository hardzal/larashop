@extends('layouts.global')

@section('title') Create Category @endsection

@section('content')
    @if(session('status'))
        <div class='alert alert-status'>
            {{ session('status') }}
        </div>
    @endif
    <form enctype="multipart/form-data" action="{{ route('categories.store') }}" method="POST">
        @csrf

        <label for="name">Category</label>
        <input type='text' name='name' class='form-control'/>
        <br>

        <label for="image">Category Image</label>
        <input type='file' name='image' class='form-control'/>
        <br>

        <input type='submit' class='btn btn-primary' value='Save'/>
    </form>
@endsection
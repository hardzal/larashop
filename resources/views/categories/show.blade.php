@extends('layouts.global')

@section('title') Detail category {{ $category->name }} @endsection

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
        
                <label><b>Category name</b></label><br>
                <span>{{ $category->name }}</span>
                <br><br>

                <label><b>Category image</b></label><br>
                <span>{{ $category->slug }}</span>
                
                @if($category->image) 
                    <img src="{{ asset('storage/'. $category->image) }}" width="120px" alt="{{ $category->image }}"/>
                @else
                    No image
                @endif
        
            </div>
        </div>
    </div>
@endsection
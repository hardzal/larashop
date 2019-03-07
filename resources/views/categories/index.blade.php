@extends('layouts.global')

@section('title') Categories list @endsection

@section('content')
    <div class='row'>
        <div class='col-md-6'>
            <form action="{{ route('categories.index') }}">
                <div class='input-group'>
                    <input type='text' class='form-control' placeholder='Filter by category name' name='name'/>
                    <div class='input-group-append'>
                        <input type='submit' value='filter' class='btn btn-primary'/>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr class='my-3'>

    <div class='row'>
        <div class='col-md-12'>
            <table class='table table-bordered table-stripped'>
                <thead>
                    <tr>
                        <th><strong>Name</strong></th>
                        <th><strong>Slug</strong></th>
                        <th><strong>Image</strong></th>
                        <th><strong>Actions</strong></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                @if($category->name)
                                    <img src='{{ asset('storage/'. $category->image) }}' width="48px"/>
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-info btn-sm"/> Edit</a> || 
                               <a href='{{ route("categories.show", ['id' => $category->id]) }}' class="btn btn-success btn-sm">Detail</a> || 
                                <form class='d-inline' action="{{ route('categories.destroy', ['id' => $category->id])}}" method="POST" onSubmit="return confirm('Move category to trash?')">

                                    @csrf

                                    <input type='hidden' name='_method' value='DELETE'/>

                                    <input type='submit' name='submit' class='btn btn-danger btn-sm' value='Trash'/>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan='10'>
                            {{ $categories->appends(Request::all())->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
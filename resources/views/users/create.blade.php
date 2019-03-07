@extends('layouts.global')

@section('title') Create User @endsection

@section('content')
<div class="col-md-8">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-sm p-3">
        @crsf <!-- Menggenerate token csrf -->
        <label for="name">Name</label>
        <input type="text" name="username" id="username" placeholder="username" class="form-control"/> <br>

        <label for="roles">Roles</label>
        <br>
        <input type="checkbox" name="roles[]" id="ADMIN" value="ADMIN">
        <label for="ADMIN">Administrator</label>

        <input type="checkbox" name="roles[]" id="STAFF" value="STAFF">
        <label for="STAFF">Staff</label>

        <input type="checkbox" name="roles[]" id="CUSTOMER" value="CUSTOMER">
        <label for="CUSTOMER">Customer</label>
        <br>

        <label for="phone">Phone Number</label><br>
        <input type="text" name="phone" class="form-control"/>
        <br>

        <label for="Address">Address</label>
        <textarea name="address" id="address" class="form-control"></textarea>
        <br>

        <label for="avatar">Avatar Image</label><br>
        <input type="file" id="avatar" name="avatar" class="form-control"/>

        <hr class="my-3">

        <label for="email">Email</label>
        <input class="form-control" placeholder="email here" type="email" name="email" id="email"/><br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="password" class="form-control"/><br>

        <label for="password_confirmation">Password Confirmation</label>
        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="password confirmation" id="password_confirmation"/><br>

        <input class="btn btn-primary" type="submit" value="Save"/>
    </form>
</div>
@endsection
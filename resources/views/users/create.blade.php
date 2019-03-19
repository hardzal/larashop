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
        @csrf <!-- Menggenerate token csrf -->

        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="name" class="form-control{{ $errors->first('name') ? " is-invalid" : ""}}" value="{{ old('name') }}"/>
        <div class="invalid-feedback">
            {{ $errors->first('name') }}
        </div>
        <br>

        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="username" class="form-control{{ $errors->first('username') ? " is-invalid" : ""}}" value="{{ old('username') }}"/>
        <div class="invalid-feedback">
            {{ $errors->first('username') }}
        </div>
        <br>

        <label for="email">Email</label>
        <input class="form-control {{ $errors->first('email') ? " is-invalid" : "" }}" placeholder="email here" type="email" name="email" id="email" value="{{ old('email') }}"/>
        <div class="invalid-feedback">
            {{ $errors->first('email') }}
        </div>
        <br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="password" class="form-control{{ $errors->first('password') ? " is-invalid" : ""}}"/>
        <div class="invalid-feedback">
            {{ $errors->first('password') }}
        </div>
        <br>

        <label for="password_confirmation">Password Confirmation</label>
        <input class="form-control{{ $errors->first('password_confirmation') ? " is-invalid" : "" }}" type="password" name="password_confirmation" id="password_confirmation" placeholder="password confirmation" id="password_confirmation"/>
        <div class="invalid-feedback">
            {{ $errors->first('password_confirmation') }}
        </div>
        <br>

        <label for="roles">Roles</label>
        <br>
        <input type="checkbox" class="form-control{{ $errors->first('roles') ? " is-invalid" : ""}}" name="roles[]" id="ADMIN" value="ADMIN">
        <label for="ADMIN">Administrator</label>

        <input type="checkbox" class="form-control{{ $errors->first('roles') ? " is-invalid" : ""}}" name="roles[]" id="STAFF" value="STAFF">
        <label for="STAFF">Staff</label>

        <input type="checkbox" class="form-control{{ $errors->first('roles') ? " is-invalid" : ""}}" name="roles[]" id="CUSTOMER" value="CUSTOMER">
        <label for="CUSTOMER">Customer</label>
        <div class="invalid-feedback">
            {{ $errors->first('roles') }}
        </div>    
        <br>

        <label for="phone">Phone Number</label><br>
        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control {{ $errors->first('phone') ? " is-invalid" : ""}}"/>
        <div class="invalid-feedback">
            {{ $errors->first('phone') }}
        </div>
        <br>

        <label for="Address">Address</label>
        <textarea name="address" id="address" class="form-control {{ $errors->first('address') ? " is-invalid" : ""}}">{{ old('address') }}</textarea>
        <div class="invalid-feedback">
            {{ $errors->first('address') }}
        </div>
        <br>

        <label for="avatar">Avatar Image</label><br>
        <input type="file" id="avatar" name="avatar" class="form-control {{ $errors->first('avatar') ? " is-invalid" : ""}}"/>
        <div class="invalid-feedback">
            {{ $errors->first('avatar') }}
        </div><br><br>
    
        <input class="btn btn-primary" type="submit" value="Save"/>
    </form>
</div>
@endsection
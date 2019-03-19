@extends('layouts.global')

@section('title') Edit data user @endsection

@section('content')
    <div class="col-md-8">
        @if(session('status')) 
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <form enctype="multipart/form-data" class="bg-white shadow p-3" action="{{ route('users.update', ['id' => $user->id])}}" method="POST">
        @csrf
        <input type="hidden" value="PUT"    name="_method"/>

        <label for="name">Name</label>
        <input value="{{ old('name') ? old('name') : $user->name }}" class="form-control{{ $errors->first('name') ? " is-invalid" : "" }}" placeholder="Full Name" type="text" name="name" id="name"/>
        <div class="invalid-feedback">
            {{ $errors->first('name') }}
        </div>
        <br>

        <label for="username">Username</label>
        <input value="{{ $user->username }}" class="form-control" placeholder="username" type="text" name="username" id="username" readonly/>
        <br>

        <label for="">Status</label>
        <br>
        <input value="ACTIVE" type="radio" class="form-control" id="active" name="status" {{ $user->status == 'ACTIVE' ? "checked" : "" }}/>
        <label for="active">Active</label>

        <input value="INACTIVE" type="radio" class="form-control" id="inactive" name="status" {{ $user->status == 'INACTIVE' ? "checked" : "" }}/>
        <label for="inactive">In Active</label>
        <br><br>

        <label for="">Roles</label>
        <br>
        <input type="checkbox" {{ in_array("ADMIN", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="admin" value="ADMIN" class="form-control{{ $errors->first('roles') ? " is-invalid" : ""}}"/>
         <label for="admin">Administrator</label>

         <input type="checkbox" {{ in_array("STAFF", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="STAFF" value="STAFF" class="form-control{{ $errors->first('roles') ? " is-invalid" : ""}}"/>
         <label for="STAFF">Staff</label>

         <input type="checkbox" {{ in_array("CUSTOMER", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="CUSTOMER" value="CUSTOMER" class="form-control{{ $errors->first('roles') ? " is-invalid" : ""}}"/>
         <label for="CUSTOMER">Customer</label>
         <div class="invalid-feedback">
            {{ $errors->first('roles') }}
         </div>
         <br>

         <br>
         <label for="phone">Phone Number</label>
         <br>
         <input type="text" name="phone" class="form-control{{ $errors->first('phone') ? " is-invalid" : ""}}" value="{{ $user->phone }}"/>
         <div class="invalid-feedback">
            {{ $errors->first('phone')}}
         </div>
         <br/>

         <label for="address">Address</label>
         <textarea name="address" id="address" class="form-control{{ $errors->first('address') ? " is-invalid" : ""}}">{{ old('address') ? old('address') : $user->address }}</textarea>
         <div class="invalid-feedback">
            {{ $errors->first('address') }}
         </div>
         <br>

         <label for="avatar">Avatar Image</label><br>
         Current avatar : <br>
         @if($user->avatar)
            <img src='{{ asset("storage/". $user->avatar) }}' width="120px"/>
            <br>
        @else
            No Avatar
        @endif
        <div class="invalid-feedback">
            {{ $errors->first('address') }}
        </div>
        <br>
        <input type="file" name="avatar" id="avatar" class="form-control{{ $errors->first('avatar') ? " is-invalid" : ""}}/>
        <small class="text-muted">Kosongkan jika tidak ingin megubah avatar</small>
        <hr class="my-3">

        <label for="email">Email</label>
        <input value="{{ $user->email }}" class="form-control{{ $errors->first('email') ? " is-invalid" : "" }}" placeholder="Email here" type="email" name="email" id="email" readonly/>
        <br>

        <input type="submit" class="btn btn-primary" value="Save"/>

   </form>

@endsection
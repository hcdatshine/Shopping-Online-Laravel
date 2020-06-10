@extends('layout.app')
 @section('content')
<section class="content">
    <div class="col-lg-7">
        @if(count($errors) > 0)
        <div class="alert alert-danger">
           @foreach ($errors->all() as $error)
           {{$error}}<br>
           @endforeach
        </div>
        @endif
        @if(session('message'))
        <div class="alert alert-success">
           {{session('message')}}
        </div>
        @endif
        <form method="POST" action="{{route('user.edit',$editUser->id)}}"  enctype='multipart/form-data'>
                {{ csrf_field() }} 
                <div class="form-group">
                    <h1>Edit User</h1>
                    <label>User Name</label>
                    <br>
                    <input class="form-control" name="name" value="{{ $editUser->name }}">
                    <br>
                    <label>Phone Number</label>
                    <br>
                    <input class="form-control" name="phone" value="{{ $editUser->phone }}">
                    <br>
                    <label>Address</label>
                    <br>
                    <input class="form-control" name="address" value="{{ $editUser->address }}">
                    <br>
                    <label>Email</label>
                    <br>
                    <input class="form-control" name="email" value="{{ $editUser->email }}" disabled>
                    <br>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</section>
@stop
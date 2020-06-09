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
        <form method="POST" action="{{route('category.edit',$editCategory->id)}}" enctype="multipart/form-data">
                {{ csrf_field() }} 
                <div class="form-group">
                    <h1>Edit Category</h1>
                    <input class="form-control" name="name" value="{{ $editCategory->name}}">
                    <br>
                    <label>Image Edit</label>
                    <br>
                    <input type="file" name="image-product" id="image-product" value="{{$editCategory->image}}">
                    <br>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</section>
@stop
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
        <form method="POST" action="{{route('flashsale.edit',$editFlashsale->id)}}" enctype="multipart/form-data">
                {{ csrf_field() }} 
                <div class="form-group">
                    <h1>Sửa Flash Sale</h1>
                    <label>Tên Flash Sale</label>
                    <br>
                    <input type="text"class="form-control" name="name" value="{{$editFlashsale->name}}">
                    <br>
                    <label>Mô Tả</label>
                    <br>
                    <input type="text"class="form-control" name="description" value="{{$editFlashsale->description}}">
                    <br>
                    <label for="start"> Thay đổi Start (date and time):</label>
                    <br>
                    <input type="text" value="{{$editFlashsale->start}}" disabled>
                    <br>
                    <label for="end">Thành</label>
                    <br>
                    <input type="datetime-local" id="start" name="start" value="{{$editFlashsale->start}}">
                    <br>
                    <label for="start">Thay đổi End (date and time):</label>
                    <br>
                    <input type="text" value="{{$editFlashsale->end}}" disabled>
                    <br>
                    <label for="end">Thành</label>
                    <br>
                    <input type="datetime-local" id="end" name="end">
                    <br>
                </div>
                <button type="submit" class="btn btn-primary">Sửa Flash Sale</button>
        </form>
    </div>
</section>
@stop
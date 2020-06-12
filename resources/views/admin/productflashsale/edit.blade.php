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
        <form method="POST" action="{{route('productflashsale.edit',$editProductFlashsale->id)}}" enctype="multipart/form-data">
                {{ csrf_field() }} 
                <div class="form-group">
                    <h1>Thêm Flash Sale</h1>
                    <label>ID Sản Phẩm</label>
                    <br>
                    <input type="text"class="form-control" name="product_id" value="{{$editProductFlashsale->product_id}}">
                    <br>
                    <input type="text"class="form-control" name="flash_sale_id" value="{{$editProductFlashsale->flash_sale_id}}">
                    <br>
                    <input type="text"class="form-control" name="discount_percent" value="{{$editProductFlashsale->discount_percent}}">
                    <br>
                </div>
                <button type="submit" class="btn btn-primary">Sửa Product Flash Sale</button>
        </form>
    </div>
</section>
@stop
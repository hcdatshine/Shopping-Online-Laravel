@extends('layout.app')
 @section('content')
<section class="content">
    <div class="col-lg-7">
        @if( count($errors) >0 )
            <div class="alert alert-danger">
                @foreach( $errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </div>
        @endif
        <form method="POST" action="{{route('product.edit',$editProduct->id)}}"  enctype='multipart/form-data'>
                {{ csrf_field() }} 
                <div class="form-group">
                    <h1>Edit Product</h1>
                    <label>Product Name</label>
                    <br>
                    <input class="form-control" name="name" value="{{ $editProduct->name }}">
                    <label>Image Edit</label>
                    <br>
                    <input type="file" name="image-product" id="image-product" value="{{$editProduct->image}}">
                    <br>
                    <label>Product Price</label>
                    <br>
                    <input type="text" name="unit_price" value="{{$editProduct->unit_price}}" style="width:100%; height:40px">
                    <br>
                    <label>Product Sale</label>
                    <br>
                    <input type="text" name="promotion_price" value="{{$editProduct->promotion_price}}" style="width:100%; height:40px">
                    <br>
                    <label>Product Type</label>
                    <br>
                    <select name="id_type">
                        <option value="{{ $editProduct->product_type->id }}" selected>{{ $editProduct->product_type->name }}</option>
                        @foreach ($product_type as $item)
                            <option value="{{ $item->id }}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <br>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</section>
@stop
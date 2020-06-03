{{-- @extends('layout.app')
 @section('content')
<section class="content">
    <div class="col-lg-7">
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
                <input type="text" name="price" value="{{$editProduct->price}}" style="width:100%; height:40px">
                    <br>
                    <label>Product Sale</label>
                    <br>
                    <input type="text" name="sale" value="{{$editProduct->sale}}" style="width:100%; height:40px">
                    <br>
                    <label>Category_id</label>
                    <select name="category_id">
                        <option value="{{ $editProduct->Category->id }}" selected>{{ $editProduct->Category->name }}</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <br>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</section>
@stop --}}
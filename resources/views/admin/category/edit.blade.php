{{-- @extends('layout.app')
@section('content')
<section class="content">
    <div class="col-lg-7">
        <form method="POST" action="{{route('category.edit',$editCategory->id)}}">
                {{ csrf_field() }} 
                <div class="form-group">
                    <h1>Edit Category</h1>
                    <input class="form-control" name="name" value="{{ $editCategory->name}}">
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</section>
@stop --}}
@extends('layout.app')
@section('content')
    <form method="POST"  enctype='multipart/form-data'>
        {{ csrf_field() }}
        <input type="file" name="image-product" id='image-product'>
        <button type="submit">Upload</button>
    </form>
    </section>
@stop
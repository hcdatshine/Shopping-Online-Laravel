@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Thông Tin người dùng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('trangchu')}}">Home</a> / <span><a href="{{route('thongtinnguoidung')}}">thong-tin-nguoi-dung</a></span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Page Content -->
<div class="container">
    <!-- slider -->
    <div class="row carousel-holder">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{route('nguoidung',$user->id)}}" method="POST" enctype='multipart/form-data'>
                        {{ csrf_field() }} 
                        <div>
                            <label>Họ tên</label>
                        <input type="text" class="form-control" placeholder="Username" name="name" value="{{$user->name}}" aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <div>
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{$user->email}}" aria-describedby="basic-addon1"
                            readonly
                            >
                        </div>
                        <br>
                        <div>
                            <label>Số Điện Thoại</label>
                        <input type="text" class="form-control" placeholder="Số điện thoại" name="phone" value="{{$user->phone}}" aria-describedby="basic-addon1">
                        </div>
                        <br>	
                        <div>
                            <label>Địa chỉ</label>
                        <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address" value="{{$user->address}}" aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <div>
                            <input type="checkbox" id="changePassword" name="checkPassword" style="display: inline-block">
                            <label style="display: inline; padding-left: 3px">Đổi mật khẩu</label>
                            <br><br>
                            <input type="password" class="form-control password" laceholder="Nhập mật khẩu" name="password" aria-describedby="basic-addon1" disabled>
                        </div>
                        <br>
                        <div>
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" class="form-control password" laceholder="Nhập lại mật khẩu" name="reset_password" aria-describedby="basic-addon1" disabled>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-default">Cập nhật
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <!-- end slide -->
</div>
<!-- end Page Content -->
@endsection

@section('script')
    <script>
        $(function($){
            $("#changePassword").on('change', function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else{
                    $(".password").attr('disabled','');
                }
            })
        })
    </script>
@endsection
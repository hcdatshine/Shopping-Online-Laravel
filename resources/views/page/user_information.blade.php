@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Thông Tin người dùng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Home</a> / <span>thong-tin-nguoi-dung</span>
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
                    <form action="{{route('thongtinnguoidung')}}" method="post" class="">
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
                        <input type="text" class="form-control" placeholder="Username" name="phone" value="{{$user->phone}}" aria-describedby="basic-addon1">
                        </div>
                        <br>	
                        <div>
                            <input type="checkbox" id="changePassword" name="checkpassword" style="display: block">
                            <label>Đổi mật khẩu</label>
                            <input type="password" class="form-control password" name="password" aria-describedby="basic-addon1" disabled>
                        </div>
                        <br>
                        <div>
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" class="form-control password" name="passwordAgain" aria-describedby="basic-addon1" disabled>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-default">Thay đổi 
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
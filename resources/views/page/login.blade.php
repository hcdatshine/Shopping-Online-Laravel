@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng nhập</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('trangchu')}}">Home</a> / <span>Đăng nhập</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
        <form action="{{route('login')}}" method="post" class="beta-form-checkout">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-3"></div>

                <div class="col-sm-6">
                    <h4>Đăng nhập</h4>
                    <div class="space20">&nbsp;</div>
                
                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <br><br>
                        <input type="email" name="email" required style="height: 35px;
                        border-color: #333; ">
                    </div>
                    <div class="form-block">
                        <label for="password">Password*</label>
                        <br><br>
                        <input type="password" name="password" required style="height: 35px ">
                    </div>
                    <div>
                        <input type="checkbox" name="remember" style="display: inline-block">
                        {{-- <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <label for="vehicle1"> Ghi nhớ người dùng</label><br> --}}
                        <label for="remember" style="display: inline ;padding-left: 1px;">Ghi nhớ người dùng</label>
                        <br><br>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
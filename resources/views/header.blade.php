<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> 40 Tô Vĩnh Diện, Khương Trung, Thanh Xuân, Hà Nội</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 0949686103</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(Auth::check())
                        <li><a href="{{route('thongtinnguoidung')}}">{{Auth::user()->name}}</a></li>
                        <li><a href="{{route('logout')}}">Đăng Xuất</a></li>
                    @else
                        <li><a href="{{route('signup')}}">Đăng kí</a></li>
                        <li><a href="{{route('login')}}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    @if(count($errors) > 0)
    <div class="alert alert-danger">
       @foreach ($errors->all() as $error)
       {{$error}}<br>
       @endforeach
    </div>
    @endif
    @if(session('thongbao'))
    <div class="alert alert-success">
       {{session('thongbao')}}
    </div>
    @endif
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{route('trangchu')}}" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('search')}}">
                        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    <div class="cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}} @else Trống @endif)<i class="fa fa-chevron-down"></i></div>
                        @if(Session::has('cart'))
                        <div class="beta-dropdown cart-body">
                            @foreach($product_cart as $item)
                            <div class="cart-item">
                                <a class="cart-item-delete" href="{{ route('xoagiohang',$item['item']['id']) }}"><i class="fa fa-times"></i></a>
                                <div class="media">
                                <a class="pull-left" href="#"><img src="source/image/product/{{$item['item']['image']}}" alt=""></a>
                                    <div class="media-body">
                                        <span class="cart-item-title">{{$item['item']['name']}}</span>
                                        @if($item['item']['sale']!=0)
                                        <span class="cart-item-amount">{{ $item['qty'] }}*<span>{{ number_format($item['item']['sale']) }}</span></span>
                                        @elseif($item['item']['promotion_price']!=0)
                                        <span class="cart-item-amount">{{ $item['qty'] }}*<span>{{ number_format($item['item']['promotion_price']) }}</span></span>
                                        @else 
                                        <span class="cart-item-amount">{{ $item['qty'] }}*<span>{{ number_format($item['item']['unit_price']) }}</span></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="cart-caption"></div>
                            <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}} đồng</span></div>
                                <div class="clearfix"></div>
                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="{{ route('dathang') }}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div> <!-- .cart -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{route('trangchu')}}">Trang chủ</a></li>
                    <li><a href="{{route('loaisanpham',0)}}">Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach($product_type as $item)
                                <li><a href="{{route('loaisanpham',$item->id)}}">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('gioithieu') }}">Giới thiệu</a></li>
                    <li><a href=" {{ route('lienhe') }}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->

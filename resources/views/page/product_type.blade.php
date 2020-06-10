@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trangchu')}}">Home</a> / <span>Sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach($product_type as $item)
                            <li><a href="{{route('loaisanpham',$item->id)}}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>Sản phẩm {{$product_type_name['name']}} </h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Có {{ $products->count() }} sản phẩm mới </p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach ($products as $item)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if($item->promotion_price!=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('sanpham',$item->id)}}"><img src="source/image/product/{{$item->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$item->name}}</p>
                                        <p class="single-item-price">
                                            @if($item->promotion_price!=0)
                                            <span class="flash-del">{{ number_format($item->unit_price) }}</span>
                                            <span class="flash-sale">{{ number_format($item->promotion_price) }} đồng</span>
                                            @else
                                            <span class="flash-sale">{{ number_format($item->unit_price) }} đồng</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$item->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('sanpham',$item->id)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- {{-- <div class="row">{{ $products -> links() }}</div> --}} -->
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm bán chạy</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Sản phẩm gợi ý</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach ($product_best_selling as $item)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if($item->promotion_price!=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('sanpham',$item->id)}}"><img src="source/image/product/{{$item->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$item->name}}</p>
                                        <p class="single-item-title">Đã bán: {{$item->solded}}</p>
                                        <p class="single-item-price">
                                            @if($item->promotion_price!=0)
                                            <span class="flash-del">{{ number_format($item->unit_price) }}</span>
                                            <span class="flash-sale">{{ number_format($item->promotion_price) }} đồng</span>
                                            @else
                                            <span class="flash-sale">{{ number_format($item->unit_price) }} đồng</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$item->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('sanpham',$item->id)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>   
                            @endforeach
                        </div>
                        {{-- <div class="row">{{ $product_best_selling -> links() }}</div> --}}
                        <div class="space40">&nbsp;</div>
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
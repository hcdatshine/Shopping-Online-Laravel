@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản Phẩm</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
            <a href="{{route('trangchu')}}">Trang Chủ</a> / <span>Chi Tiết Sản Phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-4">
                        @if($product_detail->promotion_price!=0)
                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                        @endif
                        <div class="single-item-header">
                        <img src="source/image/product/{{$product_detail->image}}" alt="" height="250px">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title"><h2>{{$product_detail->name}}</h2></p>
                            <p class="single-item-price">
                                @if($product_detail->discount_percent != 0)
                                <span class="flash-del">{{ number_format($product_detail->unit_price) }}</span>
                                    <span class="flash-sale">{{ number_format($product_detail->unit_price*(100-$product_detail->discount_percent)/100) }} đồng</span>
                                @else
                                    @if($product_detail->promotion_price!=0)
                                    <span class="flash-del">{{ number_format($product_detail->unit_price) }}</span>
                                    <span class="flash-sale">{{ number_format($product_detail->promotion_price) }} đồng</span>
                                    @else
                                    <span class="flash-sale">{{ number_format($product_detail->unit_price) }} đồng</span>
                                    @endif
                                @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{$product_detail->description}}</p>
                            <p>This is description . Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <p>lượng:</p>
                        <div class="single-item-options">
                            <form action="{{route('themgiohang',$product_detail->id)}}" method="GET">
                                <input type="number" id="item-quantity" name="qty" value="1" style="width: 50px; text-align: center" min="1">
                                <button type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i></button>        
                            </form>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Description</a></li>
                        <li><a href="#tab-reviews">Reviews (0)</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
                        <p>Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequaturuis autem vel eum iure reprehenderit qui in ea voluptate velit es quam nihil molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? </p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>No Reviews</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Sản Phẩm Tương Tự</h4>

                    <div class="row">
                        @foreach ($product_related as $item)
                            <div class="col-sm-4">
                                <div class="single-item" style="margin-top:20px">
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
                                        <a class="beta-btn primary" href="{{route('sanpham',$item->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                    <br>
                                </div>
                            </div> 
                        @endforeach
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Best Sellers</h3>
                    <div class="widget-body">
                        @foreach ($product_best_selling as $item)
                        <div class="beta-sales beta-lists">
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('sanpham',$item->id)}}"><img src="source/image/product/{{$item->image}}" alt=""></a>
                                <div class="media-body">
                                    {{$item->name}}
                                    @if($item->promotion_price!=0)
                                    <span class="beta-sales-price">{{ number_format($item->promotion_price) }} đ</span>
                                    @else
                                    <span class="beta-sales-price">{{ number_format($item->unit_price) }}đ</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">New Products</h3>
                    <div class="widget-body">
                        @foreach ($new_product as $item)
                        <div class="beta-sales beta-lists">
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('sanpham',$item->id)}}"><img src="source/image/product/{{$item->image}}" alt=""></a>
                                <div class="media-body">
                                    {{$item->name}}
                                    @if($item->promotion_price!=0)
                                    <span class="beta-sales-price">{{ number_format($item->promotion_price) }} đ</span>
                                    @else
                                    <span class="beta-sales-price">{{ number_format($item->unit_price) }}đ</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->  
@endsection
@extends('master')
@section('content')
<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer" >
        <div class="banner" >
                <ul>
                    @foreach ($slide as $slide)
                    <!-- THE FIRST SLIDE -->
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                    <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$slide->image}}" data-src="source/image/slide/{{$slide->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$slide->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                    </div>
                                </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="tp-bannertimer"></div>
    </div>
</div>
<!--slider-->
</div>

<div id="content" class="space-top-none">
    <div class="container">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                @if($end_flash_sale)
                <div class="col-sm-12">
                    <div class="flash-sale-products-list">
                        <div><img src="/source/image/flashsale.png" style="float: left"> <p id="countdown" style="float: left; margin-left: 20px; margin-top: 5px; font-size: 18px;"></p></div>
                        {{-- <div id="countdown"></div> --}}
                        <div class="beta-products-details" style="clear: both">
                            <p class="pull-left">Có {{count($new_product)}} sản phẩm mới</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach ($product_flash_sales as $item)
                            <?php
                            $product = $item->product;
                            ?>
                            <div class="col-sm-3">
                                <div class="single-item" style="margin-top:20px">
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    <div class="single-item-header">
                                    <a href="{{route('sanpham',$product->id)}}"><img src="source/image/product/{{$product->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$product->name}}</p>
                                        <p class="single-item-price">
                                            <span class="flash-del">{{ number_format($product->unit_price)}}</span>
                                            <span class="flash-sale">{{ number_format($product->unit_price*(100-$item->discount_percent)/100) }} đ</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$product->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('sanpham',$product->id)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{{ $product_flash_sales -> links() }}</div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>
                </div>
                @endif
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Sản Phẩm Mới</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Có {{count($new_product)}} sản phẩm mới</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach ($new_product as $product)
                            <div class="col-sm-3">
                                <div class="single-item" style="margin-top:20px">
                                    @if($product->promotion_price!=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                    <div class="single-item-header">
                                    <a href="{{route('sanpham',$product->id)}}"><img src="source/image/product/{{$product->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$product->name}}</p>
                                        <p class="single-item-price">
                                            @if($product->promotion_price!=0)
                                            <span class="flash-del">{{ number_format($product->unit_price) }}</span>
                                            <span class="flash-sale">{{ number_format($product->promotion_price) }} đ</span>
                                            @else
                                            <span class="flash-sale">{{ number_format($product->unit_price) }} đ</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$product->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('sanpham',$product->id)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{{ $new_product -> links() }}</div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khuyến mại</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Có {{count($sale_product)}} sản phẩm khuyến mại</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($sale_product as $item)
                            <div class="col-sm-3">
                                <div class="single-item" style="margin-top:20px">
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    <div class="single-item-header">
                                    <a href="{{route('sanpham',$item->id)}}"><img src="source/image/product/{{ $item->image }}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                    <p class="single-item-title">{{$item->name}}</p>
                                        <p class="single-item-price">
                                            <span class="flash-del">{{ number_format($item->unit_price) }}</span>
                                            <span class="flash-sale">{{ number_format($item->promotion_price) }} đ</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$item->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('sanpham',$item->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    {{-- <div class="row">{{ $sale_product -> links() }}</div> --}}
                    </div> <!-- .beta-pđồngcts-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->
        </div> <!-- .main-content -->
    </div>
</div> <!-- #content -->

@endsection
@section('script')
    <script>
        $(function($){
            let date = "<?= $end_flash_sale ?>";
            console.log(date);
            $('#countdown').countdown(date, function(event) {
                $(this).html(event.strftime('%D days %H:%M:%S'));
            });
        })
    </script>
@endsection
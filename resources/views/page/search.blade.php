@extends('master')
@section('content')
<div class="container">
    <div id="content" class="space-top-none">
    <div class="main-content">
    <div class="space60">&nbsp;</div>
<div class="row">
    <div class="col-sm-12">
        <div class="beta-products-list">
            <h4>Tìm Kiếm</h4>
            <div class="beta-products-details">
                <p class="pull-left">Tìm thấy {{count($product)}} sản phẩm </p>
                <div class="clearfix"></div>
            </div>

            <div class="row">
                @foreach ($product as $item)
                <div class="col-sm-3">
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
                            <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                            <a class="beta-btn primary" href="{{route('sanpham',$item->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                            <div class="clearfix"></div>
                        </div>
                        <br>
                    </div>
                </div>
                @endforeach
            </div>
            {{-- <div class="row">{{ $new_product -> links() }}</div> --}}
        </div> <!-- .beta-products-list -->
        <div class="space50">&nbsp;</div>
    </div>
</div> <!-- end section with sidebar and main content -->
</div> <!-- .main-content -->
</div> <!-- #content -->

@endsection
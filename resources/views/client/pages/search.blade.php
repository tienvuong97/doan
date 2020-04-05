@extends('client.layouts.master')
@section('title')
    Tìm kiếm sản phẩm
@endsection
@section('content')
<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
    <span>T</span>ìm
    <span>K</span>iếm</h3>
<!-- //tittle heading -->
<div class="row">
    <!-- product left -->
    <div class="agileinfo-ads-display col-lg-9">
        <div class="wrapper">
            <!-- first section -->
            <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
            <h3 class="heading-tittle text-center font-italic">Tìm thấy {{count($product)}} sản phẩm</h3>
                <div class="row">
                    @foreach ($product as $pr)
                    <div class="col-md-4 product-men mt-5">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item text-center">
                            <img class="img-fluid" src="img/upload/product/{{$pr->image}}" alt="{{$pr->name}}">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                    <a href="{{$pr->slug}}.html" class="link-product-add-cart">Chi tiết</a>
                                    </div>
                                </div>
                            </div>
                            @if($pr->promotional>0)
                            <span class="product-sale-top">Sale</span>
                            @endif
                            <div class="item-info-product text-center border-top mt-4">
                                <h4 class="pt-1">
                                    <a class="d-inline-block text-truncate" style="max-width: 200px" href="{{$pr->slug}}.html">{{$pr->name}}</a>
                                </h4>
                                <div class="info-product-price my-2">
                                    @if ($pr->promotional>0)
                                    <span class="item_price">{{number_format($pr->promotional)}}</span>
                                    <del>{{number_format($pr->price)}}</del>
                                    @else
                                    <span class="item_price">{{number_format($pr->price)}}</span>
                                    @endif 
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                <a href="{{asset('cart/add/'.$pr->id)}}"><input type="button" name="button" value="Thêm vào giỏ hàng" class="button btn" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                   @endforeach
                </div>
            </div>
        </div>
        <!-- //product right -->
    </div>
</div>
@endsection
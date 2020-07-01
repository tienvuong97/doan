@extends('client.layouts.master')
@section('title')
    Tìm kiếm sản phẩm
@endsection
@section('content')
<h1 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
   Tìm kiếm </h1>
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
                                    <span class="left-product" >(Còn {{$pr->quantity}} sản phẩm)</span>
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
                                    @if ($pr->quantity >0)
                                    <input type="button" name="button" value="Thêm vào giỏ hàng" class="btn btn-success add_cart" data-id ="{{$pr->id}}"/>
                                @else
                                        <input type="button" name="button" value="Sản Phẩm Hết Hàng" class="btn btn-danger" disabled />
                                @endif
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
    <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
        <div class="side-bar p-sm-4 p-3">
            <!-- price -->
            <div class="range border-bottom py-2">
                <h3 class="agileits-sear-head mb-3">Lọc theo giá</h3>
                <div class="w3l-range">
                    <div id="slider-handles" class="noUi-target noUi-ltr noUi-horizontal noUi-txt-dir-ltr">
                    </div>
                </div>
            </div>
            <!-- //price -->
            <!-- electronics -->
            <div class="left-side border-bottom py-2">
                <h3 class="agileits-sear-head mb-3">Loại sản phẩm</h3>
                <ul>
                    @foreach ($producttype as $index => $cate)
                        <li class="@if($index > 4)none cate-none @endif">
                            <input 
                                type="checkbox"
                                class="checked cate-type"
                                id="cate-{{ $cate->id }}"
                                value="{{ $cate->id }}"
                            >
                            <label class="span" for="cate-{{ $cate->id }}" style="cursor:pointer">{{ $cate->name }}</label>
                        </li>
                    @endforeach
                    <div class="text-center">
                        @if($producttype->count() > 4) 
                            <a href="javascript:void(0)" class="badge bagde-primary view-more" id="view-more">Xem thêm</a>
                        @endif
                    </div>
                </ul>
                <button class="btn btn-sm btn-primary pull-right" id="btn-search">Lọc</button>
            </div>
</div>
@endsection
@section('script')
    <script>
        var handlesSlider = document.getElementById('slider-handles');
        noUiSlider.create(handlesSlider, {
            start: [0, 30000000],
            tooltips: [true, true],
            step: 500000,
            range: {
                'min': [0],
                'max': [30000000]
            }   
        }).on('end', (val, handle) => {
            let types = getChecked();
            window.location.replace(`/search?from=${val[0]}&to=${val[1]}&cate-types=${types}`)
        });

        function getChecked() {
            let types = [];
                $('.cate-type').each( (index, item) => {
                    if ($(item).is(':checked')) {
                        types.push($(item).val())
                    }
                });
            return types;
        }

        $('#btn-search').click(function() {
            let val = handlesSlider.noUiSlider.get();
            let types = getChecked();
            window.location.replace(`/search?from=${val[0]}&to=${val[1]}&cate-types=${types}`)
        });

        $('#view-more').click( function() {
            $('.cate-none').each( (index, item) => {
                if ($(item).hasClass('none')) {
                    $(item).removeClass('none');
                } else {
                    $(item).addClass('none');
                }
            });
        });
    </script>
    @endsection
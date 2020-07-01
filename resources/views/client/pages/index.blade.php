@extends('client.layouts.master')
@section('title')
    Trang chủ
@endsection
@section('slide')
    @include('client.layouts.slide')
@endsection
@section('content')
	<!-- tittle heading -->
    <h1 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
       Sản Phẩm</h1>
    <!-- //tittle heading -->
    <div class="row">
        <!-- product left -->
        <div class="agileinfo-ads-display col-lg-9">
            <div class="wrapper">
                <!-- first section -->
                <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                <h3 class="heading-tittle text-center font-italic">{{$productdtip[0]->productType->name}}</h3>
                    <div class="row">
                        @foreach ($productdtip as $iphone)
                        <div class="col-md-4 product-men mt-5">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item text-center">
                                <img class="img-fluid" src="img/upload/product/{{$iphone->image}}" alt="{{$iphone->name}}">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                        <a href="{{$iphone->slug}}.html" class="link-product-add-cart">Chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                                @if($iphone->promotional>0)
                                <span class="product-sale-top">Sale</span>
                                @endif
                                <div class="item-info-product text-center border-top mt-4">
                                    <h4 class="pt-1">
                                    <span class="left-product" >(Còn {{$iphone->quantity}} sản phẩm)</span>
                                        <a class="d-inline-block text-truncate" style="max-width: 200px" href="{{$iphone->slug}}.html">{{$iphone->name}}</a>
                                    </h4>
                                    <div class="info-product-price my-2">
                                        @if ($iphone->promotional>0)
                                        <span class="item_price">{{number_format($iphone->promotional)}}</span>
                                        <del>{{number_format($iphone->price)}}</del>
                                        @else
                                        <span class="item_price">{{number_format($iphone->price)}}</span>
                                        @endif 
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                    {{-- <a href="{{asset('cart/add/'.$iphone->id)}}"><input type="button" name="button" value="Thêm vào giỏ hàng" class="button btn" /></a> --}}
                                        @if ($iphone->quantity >0)
                                            <input type="button" name="button" value="Thêm vào giỏ hàng" class="btn btn-success add_cart" data-id ="{{$iphone->id}}"/>
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
                <!-- //first section -->
                <!-- second section -->
                <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                    <h3 class="heading-tittle text-center font-italic">{{$productml[0]->productType->name}}</h3>
                        <div class="row">
                            @foreach ($productml as $ml)
                            <div class="col-md-4 product-men mt-5">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item text-center">
                                    <img class="img-fluid" src="img/upload/product/{{$ml->image}}" alt="{{$ml->name}}">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="{{$ml->slug}}.html" class="link-product-add-cart">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                    @if($ml->promotional>0)
                                    <span class="product-sale-top">Sale</span>
                                    @endif
                                    <div class="item-info-product text-center border-top mt-4">
                                        <h4 class="pt-1">
                                            <span class="left-product" >(Còn {{$ml->quantity}} sản phẩm)</span>
                                            <a href="{{$ml->slug}}.html" class="d-inline-block text-truncate" style="max-width: 200px">{{$ml->name}}</a>
                                        </h4>
                                        <div class="info-product-price my-2">
                                            @if ($ml->promotional>0)
                                            <span class="item_price">{{number_format($ml->promotional)}}</span>
                                            <del>{{number_format($ml->price)}}</del>
                                            @else
                                            <span class="item_price">{{number_format($ml->price)}}</span>
                                            @endif
                                           
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        {{-- <a href="{{asset('cart/add/'.$ml->id)}}"><input type="button" name="button" value="Thêm vào giỏ hàng" class="button btn" /></a> --}}
                                        @if ($ml->quantity > 0)
                                        <input type="button" name="button" value="Thêm vào giỏ hàng" class="btn btn-success add_cart" data-id ="{{$ml->id}}"/>

                                        @else
                                        <input type="button" name="button" value="Sản Phẩm Hết Hàng" disabled class="btn btn-danger" />
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                           @endforeach
                        </div>
                    </div>
                <!-- //second section -->
                <!-- fourth section -->
                <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                    <h3 class="heading-tittle text-center font-italic">{{$producttl[0]->productType->name}}</h3>
                        <div class="row">
                            @foreach ($producttl as $tl)
                            <div class="col-md-4 product-men mt-5">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item text-center">
                                    <img class="img-fluid" src="img/upload/product/{{$tl->image}}" alt="{{$tl->name}}">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="{{$tl->slug}}.html" class="link-product-add-cart">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                    @if($tl->promotional>0)
                                    <span class="product-sale-top">Sale</span>
                                    @endif
                                    <div class="item-info-product text-center border-top mt-4">
                                        <h4 class="pt-1">
                                            <span class="left-product" >(Còn {{$tl->quantity}} sản phẩm)</span>
                                            <a href="{{$tl->slug}}.html" class="d-inline-block text-truncate" style="max-width: 200px">{{$tl->name}}</a>
                                        </h4>
                                        <div class="info-product-price my-2">
                                            @if ($tl->promotional>0)
                                            <span class="item_price">{{number_format($tl->promotional)}}</span>
                                            <del>{{number_format($tl->price)}}</del>
                                            @else
                                            <span class="item_price">{{number_format($tl->price)}}</span>
                                            @endif
                                           
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                            @if ($tl->quantity > 0)
                                            <input type="button" name="button" value="Thêm vào giỏ hàng" class="btn btn-success add_cart" data-id ="{{$tl->id}}"/>
                                            @else
                                            <input type="button" name="button" value="Sản Phẩm Hết Hàng" disabled class="btn btn-danger" />
                                            @endif
                                            {{-- <input type="button" name="button" value="Thêm vào giỏ hàng" class="button btn add_cart" data-id ="{{$tl->id}}"/> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                           @endforeach
                        </div>
                    </div>
                <!-- //fourth section -->
            </div>
        </div>
        <!-- //product left -->

        <!-- product right -->
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
                <!-- //electronics -->
                <!-- best seller -->
                <div class="f-grid py-2">
                    <h3 class="agileits-sear-head mb-3">Sản phẩm giảm giá</h3>
                    <div class="box-scroll">
                        <div class="scroll">
                            <div class="row">
                                @foreach ($productall as $pall)
                                    @if ($pall->promotional>0)
                                        <div class="col-lg-3 col-sm-2 col-3 left-mar">
                                            <a href="{{$pall->slug}}.html"><img src="{{asset('img/upload/product/'.$pall->image)}}" alt="" class="img-fluid" style="width:100%; height:100%"></a>
                                        </div>
                                        <div class="col-lg-9 col-sm-10 col-9 w3_mvd">
                                            <a href="{{$pall->slug}}.html">{{$pall->name}}</a>
                                            <a href="{{$pall->slug}}.html" class="price-mar mt-2">{{number_format($pall->promotional)}}</a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //best seller -->
            </div>
            <!-- //product right -->
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
@extends('client.layouts.master')
@section('title')
    Chi tiết sản phẩm -
@endsection
@section('content')
    
	<!-- banner-2 -->

	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="/">Trang chủ</a>
						<i>|</i>
					</li>
                <li>{{$product_detail->name}}</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>S</span>ản
				<span>P</span>hẩm</h3>
			<!-- //tittle heading -->
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="{{asset('img/upload/product/'.$product_detail->image)}}">
									<div class="thumb-image">
										<img src="{{asset('img/upload/product/'.$product_detail->image)}}" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
								<li data-thumb="{{asset('img/upload/product/'.$product_detail->image)}}">
									<div class="thumb-image">
										<img src="{{asset('img/upload/product/'.$product_detail->image)}}" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
								<li data-thumb="{{asset('img/upload/product/'.$product_detail->image)}}">
									<div class="thumb-image">
										<img src="{{asset('img/upload/product/'.$product_detail->image)}}" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
                    <h3 class="mb-3">{{$product_detail->name}}</h3>
					<p class="mb-3">
                        @if($product_detail->promotional>0)
						<span class="item_price">{{number_format($product_detail->promotional)}}</span>
						<del class="mx-2 font-weight-light">{{number_format($product_detail->price)}} VND</del>
                        @else
                        <span class="item_price">{{number_format($product_detail->price)}} VND</span>
                        @endif
					</p>
					<div class="single-infoagile">
						<ul>
                            <li class="mb-3">
								Giao hàng miễn phí.
							</li>
							<li class="mb-3">
								Thanh toán sau khi giao hàng.
							</li>
							<li class="mb-3">
								Thời gian giao hàng nhanh.
							</li>
							<li class="mb-3">
								Khuyến mãi từ 500.000/tháng.
							</li>
							<li class="mb-3">
								Ưu đãi giảm 5% khi thanh toán bằng thẻ tín dụng
							</li>
						</ul>
					</div>
					<div class="product-single-w3l">
						<p class="my-3">
							<i class="far fa-hand-point-right mr-2"></i>
                            {{$product_detail->warranty}}
                        </p>
						{!!$product_detail->detail!!}
						<p class="my-sm-4 my-3">
							<i class="fas fa-retweet mr-3"></i>Net banking & Credit/ Debit/ ATM card
						</p>
					</div>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                            <a href="{{asset('cart/add/'.$product_detail->id)}}"><input type="button" name="button" value="Thêm vào giỏ hàng" class="button btn" /></a>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
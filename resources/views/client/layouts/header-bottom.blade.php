<div class="header-bot">
    <div class="container">
        <div class="row header-bot_inner_wthreeinfo_header_mid">
            <!-- logo -->
            <div class="col-md-3 logo_agile">
                <h1 class="text-center">
                    <a href="/" class="font-weight-bold font-italic">
                        Electro Store
                    </a>
                </h1>
            </div>
            <!-- //logo -->
            <!-- header-bot -->
            <div class="col-md-9 header mt-4 mb-md-0 mb-4">
                <div class="row">
                    <!-- search -->
                    <div class="col-10 agileits_search">
                        <form class="form-inline" action="{{asset('search')}}" method="get">
                            @csrf
                            <input class="form-control mr-sm-2" type="search" name="key" placeholder="Nhập tên sản phẩm ..." aria-label="Search" required>
                            <button class="btn my-2 my-sm-0" type="submit">Tìm kiếm</button>
                        </form>
                    </div>
                    <!-- //search -->
                    <!-- cart details -->
                    <div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
                        <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                            <a @if (Auth::check())
                            href="{{asset('cart/list')}}"
                            @else href="#" data-toggle="modal" data-target="#modal-login"
                            @endif  class="btn w3view-cart">
                                <i class="fas fa-cart-arrow-down" title="{{Cart::getTotalQuantity()}}"></i>
                                <span class="badge badge-light">{{Cart::getTotalQuantity()}}</span>
                            </a>
                        </div>
                    </div>
                    <!-- //cart details -->
                </div>
            </div>
        </div>
    </div>
</div>
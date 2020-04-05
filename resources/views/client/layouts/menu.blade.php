<div class="navbar-inner">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            {{-- <div class="agileits-navi_search">
                <form action="#" method="post">
                    <select id="agileinfo-nav_search" name="agileinfo_search" class="border">
                        <option value="">Tất cả danh mục sản phẩm</option>
                        @foreach ($category as $cate)
                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                        @endforeach
                    </select>
                </form>
            </div> --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto text-center mr-xl-5">
                    <li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
                        <a class="nav-link" href="/">Trang chủ
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    @foreach ($category as $cate)
                        <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$cate->name}}
                            </a>
                            @if (count($cate->productTypes) > 0)
                                <div class="dropdown-menu">
                                    @foreach ($cate->productTypes as $prdt)
                                <a class="dropdown-item" href="{{asset('producttype/'.$prdt->id)}}">{{$prdt->name}}</a>
                                    @endforeach
                                    <div class="dropdown-divider"></div>
                                </div>
                                @endif
                        </li>
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
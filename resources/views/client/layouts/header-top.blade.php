<div class="agile-main-top">
    <div class="container-fluid">
        <div class="row main-top-w3l py-2">
            <div class="col-lg-4 header-most-top">
                <p class="text-white text-lg-left text-center">
                    <i class=""></i>
                </p>
            </div>
            <div class="col-lg-8 header-right mt-lg-0 mt-2">
                <!-- header lists -->
                <ul>
                    <li class="text-center border-right text-white">
                        <a class="play-icon popup-with-zoom-anim text-white" href="#small-dialog1">
                            <i class=""></i></a>
                    </li>
                    <li class="text-center border-right text-white">
                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
                            <i class=""></i></a>
                    </li>
                    <li class="text-center border-right text-white">
                        <i class=""></i>
                    </li>
                   @if (Auth::check())
                            <li class="text-center border-right text-white">
                            <a href="{{asset('profile')}}" class="text-white">
                                <i class="fas fa-user"></i> {{Auth::user()->name}} </a>
                            @if(Auth::user()->role == 1)
                            <a href="{{asset('admin/index')}}" style="margin-left: 1px" class="text-white">
                                <i class="fas fa-cog" class="text-white"></i></a>
                            @endif
                            </li>
                            
                            <li class="text-center border-right text-white">
                                <i class="fas fa-sign-out-alt"></i><a href="{{route('logout')}}" class="text-white"> Đăng xuất</a>
                            </li>
                    @else
                        <li class="text-center border-right text-white">
                            <a href="#" data-toggle="modal" data-target="#modal-login" class="text-white">
                            <i class="fas fa-sign-in-alt mr-2"></i> Đăng nhập </a>
                        </li>
                        <li class="text-center text-white">
                            <a href="#" data-toggle="modal" data-target="#modal-register" class="text-white">
                            <i class="fas fa-sign-out-alt mr-2"></i>Đăng kí </a>
                        </li>
                   @endif
                </ul>
                <!-- //header lists -->
            </div>
        </div>
    </div>
</div>

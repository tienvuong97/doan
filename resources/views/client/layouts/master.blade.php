
<!DOCTYPE html>
<html lang="vi">

<head>
	<title>Electro Store - @yield('title')</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Electro Store "/>
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
<link href="{{ asset('assets/client/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="{{asset('assets/client/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="{{asset('assets/client/css/fontawesome-all.css')}}">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="{{asset('assets/client/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="{{asset('assets/client/css/menu.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- menu style -->
	<!-- //Custom-Files -->
	<link rel="stylesheet" href="{{asset('assets/client/css/easy-responsive-tabs.css')}}">
	<!-- web fonts -->
	<link href="{{asset('assets/client/css/lato.css')}}" rel="stylesheet">
	<link href="{{asset('assets/client/css/opensans.css')}}" rel="stylesheet">
	<!-- //web fonts -->

</head>

<body>
	<!-- top-header -->
	@include('client.layouts.header-top')

	<!-- Button trigger modal(select-location) -->
	<div id="small-dialog1" class="mfp-hide">
		<div class="select-city">
			<h3>
				<i class="fas fa-map-marker"></i> Please Select Your Location</h3>
			<select class="list_of_cities">
				<optgroup label="Popular Cities">
					<option selected style="display:none;color:#eee;">Select City</option>
					<option>Birmingham</option>
					<option>Anchorage</option>
					<option>Phoenix</option>
					<option>Little Rock</option>
					<option>Los Angeles</option>
					<option>Denver</option>
					<option>Bridgeport</option>
					<option>Wilmington</option>
					<option>Jacksonville</option>
					<option>Atlanta</option>
					<option>Honolulu</option>
					<option>Boise</option>
					<option>Chicago</option>
					<option>Indianapolis</option>
				</optgroup>
			</select>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //shop locator (popup) -->

	<!-- modals -->
	<!-- log in -->
	<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Đăng nhập</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					@if (session('errorLogin'))
					<div class="alert alert-danger">
						{{ session('errorLogin') }}
					</div>
					@endif
				<form action="{{route('login')}}" method="post">
						@csrf
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder="Vui lòng nhập email" name="email" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder="Vui lòng nhập password" name="password" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" value="Log in">
						</div>
						<div class="right-w3l">
						<a href="{{asset('login/facebook')}}" class="btn btn-primary">Đăng nhập bằng Facebook</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- register -->
	<div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Đăng kí</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<form action="{{route('register')}}" method="post">
					@csrf
						<div class="form-group">
							<label class="col-form-label">Họ và Tên</label>
						<input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid': '' }}" placeholder="Nhập tên của bạn" name="name" required="">
							@if ($errors->has('name'))
							<div class="invalid-feedback">
								{{$errors->first('name')}}
							</div>
							@endif
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid': '' }}" placeholder="Nhập email" name="email" required="">
							@if ($errors->has('email'))
							<div class="invalid-feedback">
								{{$errors->first('email')}}
							</div>
							@endif
						</div>
						<div class="form-group">
							<label class="col-form-label">Mật khẩu</label>
							<input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" placeholder="Nhập mật khẩu" name="password" id="password1" required="">
							@if ($errors->has('password'))
							<div class="invalid-feedback">
								{{$errors->first('password')}}
							</div>
							@endif
						</div>
						<div class="form-group">
							<label class="col-form-label">Nhập lại mật khẩu</label>
							<input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="password_confirmation" id="password2" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" value="Register">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //modal -->
	<!-- //top-header -->

	<!-- header-bottom-->
	@include('client.layouts.header-bottom')
	<!-- shop locator (popup) -->
	<!-- //header-bottom -->
	<!-- navigation -->
	@include('client.layouts.menu')
	<!-- //navigation -->

	<!-- banner -->
	@yield('slide')
	<!-- //banner -->

	<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
		@yield('content')
		</div>
	</div>
	<!-- //top products -->

	<!-- footer -->
	@include('client.layouts.footer')

	@if(session('errorLogin'))
		<script>
			$('#modal-login').modal('show')
		</script>				
	@endif
	@if(count($errors)>0)
		<script>
			$('#modal-register').modal('show')
		</script>				
	@endif
	@yield('script')
</body>

</html>
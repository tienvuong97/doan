@extends('admin.layouts.master')
@section('title')
    Thêm tài khoản
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User</h6>
        </div>
            @if (session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
        <div class="row" style="margin: 5px">
            <div class="col-lg-12">
                
                <form role="form" action="admin/user/add" method="post">
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
                    <div class="form-group">
                        <label class="col-form-label">Địa chỉ</label>
                        <input class="form-control" placeholder="Nhập địa chỉ" name="address" >
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Phone</label>
                        <input type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid': '' }}" placeholder="Nhập số điện thoại" name="phone" >
                        @if ($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{$errors->first('phone')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Quyền</label>
                        <select class="form-control" name="role">
                            <option value="0">Người dùng</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-primary">Làm mới</button>
                </form>
            </div>
        </div>
    </div> 
</div>
@endsection

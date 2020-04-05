@extends('admin.layouts.master')
@section('title')
    Sửa tài khoản
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
                
            <form role="form" action="admin/user/edit/{{$user->id}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="col-form-label">Họ và Tên</label>
                    <input type="text" value="{{$user->name}}" class="form-control{{ $errors->has('name') ? ' is-invalid': '' }}"  name="name" required="">
                        @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{$errors->first('name')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Email</label>
                        <input type="email" value="{{$user->email}}"  class="form-control"  name="email" readonly>
                        @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="changePassword" name="changePassword">
                        <label class="col-form-label">Mật khẩu</label>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" placeholder="Nhập mật khẩu" name="password" id="password1" required="" disabled>
                        @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{$errors->first('password')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="password_confirmation" id="password2" required="" disabled>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Địa chỉ</label>
                        <input class="form-control" value="{{$user->address}}"  name="address" >
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Phone</label>
                        <input type="number" value="{{$user->phone}}" class="form-control{{ $errors->has('phone') ? ' is-invalid': '' }}"  name="phone" >
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
                    <button type="submit" class="btn btn-success">Sửa</button>
                    <button type="reset" class="btn btn-primary">Làm mới</button>
                </form>
            </div>
        </div>
    </div> 
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if($(this).is(":checked")){
                    $("#password1").removeAttr('disabled');
                    $("#password2").removeAttr('disabled');
                }
                else {
                    $("#password1").attr('disabled','');
                    $("#password2").attr('disabled','');
                }
            });
        });
    </script>
@endsection

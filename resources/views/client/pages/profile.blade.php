@extends('client.layouts.master')
@section('title')
    Trang cá nhân
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin cá nhân</h6>
        </div>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
                </div>
                @endif
            @if (session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
        <div class="row" style="margin: 5px">
            <div class="col-lg-12">
                
            <form role="form" action="update" method="post">
                    @csrf
                    <fieldset class="form-group">
                        <label>Họ và Tên</label>
                    <input class="form-control" name="name" value="{{Auth::user()->name}}">
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Email</label>
                    <input class="form-control" name="email" value="{{Auth::user()->email}}" readonly>
                    </fieldset>
                    <fieldset class="form-group">
                        <input type="checkbox" id="changePassword" name="changePassword">
                        <label>Mật khẩu</label>
                    <input  name="password" id="password11" class="form-control password" disabled>
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Nhập lại mật khẩu</label>
                    <input  name="password" id="password12" class="form-control password" disabled>
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Địa chỉ</label>
                    <input class="form-control" name="address" value="{{Auth::user()->address}}" placeholder="Nhập địa chỉ">
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Số điện thoại</label>
                    <input class="form-control" name="phone" value="{{Auth::user()->phone}}" placeholder="Nhập số điện thoại">
                    </fieldset>
                    </div>
                    <button type="submit" class="btn btn-success">Lưu</button>
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
                    $("#password11").removeAttr('disabled');
                    $("#password12").removeAttr('disabled');
                }
                else {
                    $("#password11").attr('disabled','');
                    $("#password12").attr('disabled','');
                }
            });
        });
    </script>
@endsection
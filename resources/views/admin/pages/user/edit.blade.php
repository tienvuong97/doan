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
                        <label class="col-form-label">Name</label>
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
                        <label class="col-form-label">Password</label>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" placeholder="Enter the pasword" name="password" id="password1" required="" disabled>
                        @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{$errors->first('password')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Re-Password</label>
                        <input type="password" class="form-control" placeholder="Re-enter the password" name="password_confirmation" id="password2" required="" disabled>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Address</label>
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
                        <label>Role</label>
                        <select class="form-control" name="role">
                            <option @if($user->role == 0) {{"selected"}} @endif value="0">User</option>
                            <option @if($user->role == 1) {{"selected"}} @endif value="1">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Edit</button>
                    <button type="reset" class="btn btn-primary">Refresh</button>
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

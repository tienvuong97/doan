@extends('admin.layouts.master')
@section('title')
    Sửa đơn hàng
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Order</h6>
        </div>
            @if (session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
        <div class="row" style="margin: 5px">
            <div class="col-lg-12">
                
                <form role="form" action="admin/order/edit/{{$order->id}}" method="post">
                    @csrf
                    <fieldset class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" value="{{$order->name}}" readonly>
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Address</label>
                        <input class="form-control" name="address" value="{{$order->address}}" readonly>
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" value="{{$order->email}}" readonly>
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Phone</label>
                        <input class="form-control" name="phone" value="{{$order->phone}}" readonly>
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Monney</label>
                        <input class="form-control" name="monney" value="{{$order->monney}}" readonly>
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Message</label>
                        <input class="form-control" name="message" value="{{$order->message}}" readonly>
                    </fieldset>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1" @if($order->status == 1) {{'selected'}} @endif>Đã giao hàng</option>
                            <option value="0" @if($order->status == 0) {{'selected'}} @endif>Chưa giao hàng</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Sửa</button>
                </form>
            </div>
        </div>
    </div> 
</div>
@endsection

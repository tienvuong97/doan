@extends('admin.layouts.master')
@section('title')
    Danh sách order chi tiết
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Order</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>IdOrde</th>
                        <th>IdProduct</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Ngày mua</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>IdOrde</th>
                        <th>IdProduct</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Ngày mua</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($order_detail as $key => $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->idOrder}}</td>
                        <td>{{$value->idProduct}}</td>
                        <td>{{$value->quantity}}</td>
                        <td>{{$value->price}}</td>
                        <td>{{$value->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>

@endsection




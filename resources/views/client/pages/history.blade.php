@extends('client.layouts.master')
@section('title')
    Giỏ hàng
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
                        <th>SDT đặt hàng</th>
                        <th>Địa chỉ đặt hàng</th>
                        <th>Ngày mua</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Xem chi tiết</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>SDT đặt hàng</th>
                        <th>Địa chỉ đặt hàng</th>
                        <th>Ngày mua</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Xem chi tiết</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($order as $key => $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->phone}}</td>
                        <td>{{$value->address}}</td>
                        <td>{{$value->created_at}}</td>
                        <td>{{$value->monney}}</td>
                        <td>
                            @if ($value->status == 1)
                                {{"Đã giao hàng"}}
                            @else
                                {{"Chưa giao hàng"}}
                            @endif
                        </td>
                        <td>
                        <a href="order_detail/{{$value->id}}"><button class="btn btn-danger detail" type="button"><i class="fas fa-info-circle"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


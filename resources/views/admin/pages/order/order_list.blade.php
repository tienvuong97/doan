@extends('admin.layouts.master')
@section('title')
    Danh sách order
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
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Money</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Money</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($order as $key => $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->address}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->phone}}</td>
                        <td>{{$value->monney}}</td>
                        <td>{{$value->message}}</td>
                        <td>
                            <select name="gh" class="order-status" data-id={{$value->id}}>
                                
                                <option value="0" @if ($value->status==0) {{'selected'}}
                                    
                                @endif>Not delivery</option>
                                <option value="1" @if ($value->status==1) {{'selected'}}
                                    @endif>Delivered</option>
                            </select>
                        </td>
                        <td>
                        {{-- <a href="admin/order/edit/{{$value->id}}"><button class="btn btn-primary edit" type="button"><i class="fas fa-edit"></i></button></a> --}}
                        <a href="admin/order/order_detail/{{$value->id}}"><button class="btn btn-danger detail" type="button"><i class="fas fa-info-circle"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div style="margin: auto; width: 400px">{{$order->links()}}</div>
</div>

@endsection




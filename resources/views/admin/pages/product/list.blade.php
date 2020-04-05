@extends('admin.layouts.master')
@section('title')
    Danh sách sản phẩm
@endsection
@section('content')
<div class="card shadow mb-4">
    @if (session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Category</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Mô tả</th>
                        <th>Thông tin</th>
                        <th>Category</th>
                        <th>Product Type</th>
                        <th>Status</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Mô tả</th>
                        <th>Thông tin</th>
                        <th>Category</th>
                        <th>Product Type</th>
                        <th>Status</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($product as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->name}}</td>
                        <td>{!! $value->description !!}</td>
                        <td>
                            <b>Số lượng</b>: {{$value->quantity}}
                            <br/>
                            <b>Đơn giá</b>: {{$value->price}}
                            <br/>
                            <b>Khuyến mãi</b>: {{$value->promotional}}
                            <br/>
                            <b>Hình ảnh</b>: 
                            <img src="img/upload/product/{{$value->image}}" width="100" height="100"> 
                        </td>
                        <td>{{$value->productType->category->name}}</td>
                        <td>{{$value->productType->name}}</td>
                        <td>
                            @if ($value->status == 1)
                                {{"Hiển thị"}}
                            @else
                                {{"Không hiển thị"}}
                            @endif
                        </td>
                        <td>
                        <a href="admin/product/edit/{{$value->id}}"><button class="btn btn-primary edit" type="button"><i class="fas fa-edit"></i></button></a>
                        <a href="admin/product/delete/{{$value->id}}"><button class="btn btn-danger delete" type="button"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div style="margin: auto; width: 400px">{{$product->links()}}</div>
</div>

@endsection




@extends('admin.layouts.master')
@section('title')
    Danh mục sản phẩm
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Product Type</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($producttype as $key => $values)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$values->name}}</td>
                        <td>{{$values->slug}}</td>
                        <td>{{$values->category->name}}</td>
                        <td>
                            @if ($values->status == 1)
                                {{"Hiển thị"}}
                            @else
                                {{"Không hiển thị"}}
                            @endif
                        </td>
                        <td>
                            <a href="admin/producttype/edit/{{$values->id}}"><button class="btn btn-primary edit" type="button"><i class="fas fa-edit"></i></button></a>
                            <a href="admin/producttype/delete/{{$values->id}}"><button class="btn btn-danger delete" type="button"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div style="margin: auto; width: 400px">{{$producttype->links()}}</div>
</div>
@endsection




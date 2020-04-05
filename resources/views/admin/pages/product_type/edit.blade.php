@extends('admin.layouts.master')
@section('title')
    Sửa loại sản phẩm
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sửa {{$producttype->name}}</h6>
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
                
            <form role="form" action="admin/producttype/edit/{{$producttype->id}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="ct">
                           @foreach ($category as $ct)
                            <option @if ($producttype->idCategory==$ct->id)
                                {{"selected"}}
                                @endif 
                                value="{{$ct->id}}">{{$ct->name}}</option>
                                @endforeach
                            </select>
                           
                    </div>
                    <fieldset class="form-group">
                        <label>Name</label>
                    <input class="form-control" name="name" value="{{$producttype->name}}" placeholder="Nhập tên loại sản phẩm">
                    </fieldset>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value ="1" @if($producttype->status == 1) {{'selected'}} @endif>Hiển thị</option>
                            <option value ="0" @if($producttype->status == 0) {{'selected'}} @endif>Không hiển thị</option>
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

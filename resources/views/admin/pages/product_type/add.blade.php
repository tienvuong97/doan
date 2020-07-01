@extends('admin.layouts.master')
@section('title')
    Thêm loại sản phẩm
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Product Type</h6>
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
                
                <form role="form" action="admin/producttype/add" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="ct">
                            @foreach ($category as $ct)
                            <option value="{{$ct->id}}">{{$ct->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <fieldset class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Enter the product type name">
                    </fieldset>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1">Display</option>
                            <option value="0">Not Display</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Add</button>
                    <button type="reset" class="btn btn-primary">Refresh</button>
                </form>
            </div>
        </div>
    </div> 
</div>
@endsection

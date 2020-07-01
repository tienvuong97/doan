@extends('admin.layouts.master')
@section('title')
    Thêm sản phẩm
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Product</h6>
        </div>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
                </div>
                @endif
                @if (session('loi'))
                <div class="alert alert-danger">
                    {{session('loi')}}
                </div>
                @endif
            @if (session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
        <div class="row" style="margin: 5px">
            <div class="col-lg-12">
                
                <form role="form" action="admin/product/add" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control idCategory" name="idCategory">
                            <option selected disabled>Select Category</option>
                            @foreach ($category as $ct)
                            <option value="{{$ct->id}}">{{$ct->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Type</label>
                        <select class="form-control idProductType" name="idProductType">
                            <option selected disabled>Select Product Type</option>
                        </select>
                    </div>
                    <fieldset class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Enter the product name">
                    </fieldset>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" min="1" value="1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" placeholder="Enter the unit price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Promotional</label>
                        <input type="text" name="promotional" value="0" placeholder="Enter the promotional price if applicable" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="demo" class="form-control" cols="5" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <textarea name="detail" id="demo" class="form-control" cols="5" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Warranty</label>
                        <input type="text" name="warranty" placeholder="Enter the warranty period" class="form-control">
                    </div>
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
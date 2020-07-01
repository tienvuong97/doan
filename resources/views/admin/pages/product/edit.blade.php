@extends('admin.layouts.master')
@section('title')
    Sửa sản phẩm
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sửa sản phẩm: {{$product->name}}</h6>
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
                
            <form role="form" action="admin/product/edit/{{$product->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control idCategory" name="idCategory">
                            @foreach ($category as $ct)
                            <option @if($product->productType->category->id == $ct->id)
                                {{'selected'}}
                                @endif
                             value="{{$ct->id}}">{{$ct->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Type</label>
                        <select class="form-control idProductType" name="idProductType">
                            @foreach ($producttype as $pt)
                            <option @if($product->productType->id == $pt->id)
                                {{'selected'}}
                                @endif
                             value="{{$pt->id}}">{{$pt->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <fieldset class="form-group">
                        <label>Name</label>
                    <input class="form-control" name="name" value="{{$product->name}}" placeholder="Nhập tên sản phẩm">
                    </fieldset>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" min="1" value="{{$product->quantity}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" value="{{$product->price}}" placeholder="Nhập đơn giá" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Promotional</label>
                        <input type="text" name="promotional" value="{{$product->promotional}}" placeholder="Nhập giá khuyến mãi nếu có" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <p>
                        <img src="img/upload/product/{{$product->image}}" alt="">
                        <p>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="demo" class="form-control" cols="5" rows="5">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <textarea name="detail" id="demo" class="form-control" cols="5" rows="5">{{$product->detail}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Warranty</label>
                        <input type="text" name="warranty" value="{{$product->warranty}}" placeholder="Nhập bảo hành" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value ="1" @if($product->status == 1) {{'selected'}} @endif>Dispaly</option>
                            <option value ="0" @if($product->status == 0) {{'selected'}} @endif>Not Display</option>
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
@extends('admin.layouts.master')
@section('title')
    Thêm danh mục
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Category</h6>
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
                
                <form role="form" action="admin/category/add" method="post">
                    @csrf
                    <fieldset class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Enter the category name">
                    </fieldset>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1">Display</option>
                            <option value="0">Not display</option>
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

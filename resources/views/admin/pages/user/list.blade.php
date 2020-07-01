@extends('admin.layouts.master')
@section('title')
    Danh sách user
@endsection
@section('content')
<div class="card shadow mb-4">
    @if (session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">User</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Active</th>
                        <th>Edit</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($user as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->phone}}</td>
                        <td>{{$value->address}}</td>
                        <td>
                            @if ($value->role == 1)
                                {{"Admin"}}
                            @else
                                {{"User"}}
                            @endif
                        </td>
                        <td>
                        <a href="admin/user/edit/{{$value->id}}"><button class="btn btn-primary edit" type="button"><i class="fas fa-edit"></i></button></a>
                        <a href="admin/user/delete/{{$value->id}}"><button class="btn btn-danger delete" type="button"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div style="margin: auto; width: 400px">{{$user->links()}}</div>
</div>

@endsection




@extends('admin.layout.layout')


@section('content')

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Experts</a></li>
                        </ol>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-lg-12">
                    @if(Session::has('users_message'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('users_message')}}
                        </div>
                    @endif
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Experts</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-dark student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>Email</th>
                                                <th>Name</th>
                                                <th>User type</th>
                                                <th>status</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($experts as $expert )
                                            <tr>
                                                <td>{{ $expert['email']}} </br>
                                                </td>
                                                <td>{{ $expert['name']}}</td>
                                                <td>{{ $expert['user_type']}}</td>
                                                <td>
                                                @if ($expert['status'] == 1)
                                                    <div class="badge badge-success">Active</div>
                                                    <a class="updateAdminStatus" id="user-{{$expert['id']}}" user_id="{{$expert['id']}}" href="javascript:void(0)" >
                                                        <i style="font-size:large;" class="mdi mdi-bookmark-plus" status="active"></i>
                                                    </a>
                                                @else
                                                    <div class="badge badge-danger">Inactive</div>
                                                    <a class="updateAdminStatus" id="expert-{{$expert['id']}}" user_id="{{$expert['id']}}" href="javascript:void(0)" >
                                                        <i style="font-size:large;" class="mdi mdi-bookmark-remove" status="inactive"></i>
                                                    </a>
                                                @endif
                                                </td>
                                                <td>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ url('admin/viewexpert') }}/{{ $expert['id'] }}">View user</a>
                                                        <form style="float:left; margin-left:10px;" action="{{ url('admin/experts') }}" method="POST">
                                                            @csrf
                                                            @method('POST')
                                                            <input type="hidden" name="userid" value="{{ $expert['id'] }}">
                                                            <input type="hidden" name="action" value="delete">
                                                            <button type="submit" class="dropdown-item text-danger">Delete</button>
                                                        </form>
                                                        @if ($expert['status'] == 1)
                                                            <form style="float:left; margin-left:10px;" action="{{ url('admin/experts') }}" method="POST">
                                                                @csrf
                                                                @method('POST')
                                                                <input type="hidden" name="userid" value="{{ $expert['id'] }}">
                                                                <input type="hidden" name="action" value="deactivate">
                                                                <button type="submit" class="dropdown-item text-danger">Deactivate</button>
                                                            </form>
                                                        @else
                                                            <form style="float:left; margin-left:10px;" action="{{ url('admin/experts') }}" method="POST">
                                                                @csrf
                                                                @method('POST')
                                                                <input type="hidden" name="userid" value="{{ $expert['id'] }}">
                                                                <input type="hidden" name="action" value="activate">
                                                                <button type="submit" class="dropdown-item text-success">Activate</button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->



    



@endsection


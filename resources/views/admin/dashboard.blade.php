@extends('admin.layout.layout')


@section('content')


@if(Session::has('login_success'))
    <script>
    Swal.fire(
    'Login Successfull',
    'Welcome back',
    'success'
        )
    </script>
@endif

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <h6 class="mb-0">Admin</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-user text-success border-success"></i>
                                </div>
                                <div class="stat-content d-inline-block ml-2">
                                    <div class="stat-text">Accounts</div>
                                    <div class="h5">All Users: 54</div>
                                    <div class="h5">All Experts: 55</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-bag text-primary border-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block ml-2">
                                    <div class="stat-text">Projects</div>
                                    <div class="h5 mb-1">Auction: 54</div>
                                    <div class="h5 mb-1">In Progress: 55</div>
                                    <div class="h5 mb-1">Completed: 55</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-layout-grid2 text-pink border-pink"></i>
                                </div>
                                <div class="stat-content d-inline-block ml-2">
                                    <div class="stat-text">Categories</div>
                                    <div class="h5 mb-1">Field of Study: 54</div>
                                    <div class="h5 mb-1">Project Type: 55</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Projects</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-dark  student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Project title</th>
                                                <th>project type</th>
                                                <th>Price</th>
                                                <th>deadline</th>
                                                <th>progress</th>
                                                <th>Action</th>
                                                <th>Created</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($projects as $project )
                                            <tr>
                                                <td>{{ $project->name}}</td>
                                                <td>{{ $project->project_title}}</td>
                                                <td>{{ $project->project_type}}</td>
                                                <td>@money($project->price)</td>

                                                <td>{{ $project->deadline}}</td>
                                                <td> 
                                                    @if ($project->progress == 1)
                                                        <span class='badge badge-success'>Auction</span>
                                                    @elseif ($project->progress == 2)
                                                        <span class='badge badge-danger'>In Progress</span>
                                                    
                                                    @elseif ($project->progress == 3)
                                                        <span class='badge badge-danger'>Completed</span>
                                                    @else
                                                        <span class='badge badge-secondary'>Unknown</span>
                                                    @endif
                                                    
                                                </td>
                                                <td>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action</button>
                                                    <div class="dropdown-menu">
                                                        <form style="float:left; margin-left:10px;" action="{{ url('admin/dashboard') }}" method="POST">
                                                            @csrf
                                                            @method('POST')
                                                            <input type="hidden" name="projectid" value="{{ $project->id }}">
                                                            
                                                            <input type="hidden" name="action" value="stoprobot">
                                                            <button type="submit" class="dropdown-item text-danger">VIEW PROJECT</button>
                                                            
                                                        </form>
                                                        

                                                    </div>
                                                </div>
                                                </td>
                                                

                                                <td>{{ $project->created_at}}</td>
                                               
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


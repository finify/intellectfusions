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
                                    <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                        <span class="flex text-body">All Users:</span>
                                        <span class="mx-3">{{ $user_details['user'] }}</span>
                                    </small>
                                    <small class="d-flex align-items-center font-weight-bold text-muted">
                                        <span class="flex text-body">All Experts:</span>
                                        <span class="mx-3">{{ $user_details['expert'] }}</span>
                                    </small>
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
                                    <small class="d-flex align-items-center font-weight-bold text-muted">
                                        <span class="flex text-body">Auction:</span>
                                        <span class="mx-3">{{ $project_details['auctions'] }}</span>
                                    </small>
                                    <small class="d-flex align-items-center font-weight-bold text-muted">
                                        <span class="flex text-body">In Progress:</span>
                                        <span class="mx-3">{{ $project_details['inprogress'] }}</span>
                                    </small>
                                    <small class="d-flex align-items-center font-weight-bold text-muted">
                                        <span class="flex text-body">Completed:</span>
                                        <span class="mx-3">{{ $project_details['completed'] }}</span>
                                    </small>
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
                                                <th>Field & Type</th>
                                                <th>User Price</th>
                                                <th>Expert Price</th>
                                                <th>Created</th>
                                                <th>deadline</th>
                                                <th>progress</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($projects as $project )
                                            <tr>
                                                <td>{{ $project->name}}</td>
                                                <td>{{ $project->project_title}}</td>
                                                <td>{{ $project->project_type}} , {{ $project->subject_area}}</td>
                                                <td>@money($project->price)</td>
                                                <td>@money($project->expert_price)</td>

                                                <td> @dateformat($project->created_at)</td>
                                                <td> @dateformat($project->deadline)</td>
                                                <td> 
                                                    @if ($project->progress == 1)
                                                        <span class='badge badge-danger'>Auction</span>
                                                    @elseif ($project->progress == 2)
                                                        <span class='badge badge-primary'>In Progress</span>
                                                    
                                                    @elseif ($project->progress == 3)
                                                        <span class='badge badge-success'>Completed</span>
                                                    @else
                                                        <span class='badge badge-secondary'>Unknown</span>
                                                    @endif
                                                    
                                                </td>
                                                <td>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ url('admin/viewproject') }}/{{ $project->id }}">View Project</a>
                                                        
                                                        

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


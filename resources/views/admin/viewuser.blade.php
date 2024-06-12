@extends('admin.layout.layout')


@section('content')


<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $user['email']}}</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Details</a></li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                        </div>
                    @endif
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-statistics">
                                    <div class="text-left mt-4 border-bottom-1 pb-3">
                                        <div class="row mb-4">
                                            <div class="col-6">
                                                <h5 class="m-b-0">Email : {{ $user['email'] }}</h5>
                                                <!-- <span class="text-dark">Active project</span> -->
                                            </div>
                                            <div class="col-6">
                                                <h5 class="m-b-0">Name : {{ $user['name'] }}</h5>
                                                <!-- <span class="text-dark">Active project</span> -->
                                            </div>
                                            
                                            <div class="col-12">
                                                <h4 class="m-b-0">@dateformat($user['created_at'])</h4><span class="text-dark">Registered</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#email" data-toggle="tab" class="nav-link active show">Email</a>
                                            </li>
                                            <li class="nav-item"><a href="#projects" data-toggle="tab" class="nav-link">Projects</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="email" class="tab-pane fade active show">
                                                <div class="about-me-content pt-3">
                                                    <form method="post" action="">@CSrf
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Subject</label>
                                                            <input type="subject" class="form-control"  name="subject">
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">message</label>
                                                            <textarea class="form-control" style="height:150px" name="message" placeholder="content"></textarea>
                                                        </div>
                                                        <input type="hidden" name="action" value="email">
                                                        <button type="submit" class="btn btn-dark btn-block">Email</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div id="projects" class="tab-pane fade">
                                                <div class="about-me-content pt-3">
                                                    <div class="table-responsive">
                                                        <table class="table text-dark student-data-table m-t-20">
                                                            <thead>
                                                                <tr>
                                                                    <th>Project Title</th>
                                                                    <th>User Price</th>
                                                                    <th>Status</th>
                                                                    <th>Created at</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @forelse ($projects as $project)
                                                                <tr>
                                                                    <td> <a href="{{ url('admin/viewproject') }}/{{ $project['id'] }}"> {{ $project['project_title'] }} </a>   </td>
                                                                    <td>@money($project['price']) </td>
                                                                    <td> 
                                                                        @if ($project['progress'] == 1)
                                                                            <span class='badge badge-danger'>Auction</span>
                                                                        @elseif ($project['progress'] == 2)
                                                                            <span class='badge badge-primary'>In Progress</span>
                                                                        
                                                                        @elseif ($project['progress'] == 3)
                                                                            <span class='badge badge-success'>Completed</span>
                                                                        @else
                                                                            <span class='badge badge-secondary'>Unknown</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>@dateformat($project['created_at'])</td>
                                                                </tr>      
                                                                @empty
                                                                <div class="alert alert-danger" role="alert"> No data found</div>
                                                                @endforelse
                                                                
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
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
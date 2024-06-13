@extends('admin.layout.layout')

@section('header')
    <style>
        /* Custom styling for Select2 dropdown text */
        .select2-container .select2-results__option {
            color: #007bff; /* Replace with your desired color */
        }

        /* Custom styling for selected items */
        .select2-container .select2-selection__choice {
            background-color: #007bff; /* Replace with your desired color */
            color: #fff; /* Text color for selected items */
        }
    </style>
@endsection

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
                            <li class="breadcrumb-item"><a href="/admin/experts">Expert</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $user['email'] }}</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Details</a></li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                    @if(Session::has('success_message'))
                        <div class="alert alert-success" role="alert">
                        {{Session::get('success_message')}}
                        </div>
                    @endif
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="profile-statistics">
                                    <div class="text-left border-bottom-1 pb-3">
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
                                            <li class="nav-item"><a href="#project" data-toggle="tab" class="nav-link">Projects Assigned</a>
                                            </li>
                                            <li class="nav-item"><a href="#auction" data-toggle="tab" class="nav-link">Projects Auctions</a>
                                            </li>
                                            <li class="nav-item"><a href="#about" data-toggle="tab" class="nav-link">About</a>
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
                                            <div id="project" class="tab-pane fade">
                                                <div class="about-me-content pt-3">
                                                    <div class="table-responsive">
                                                        <table class="table text-dark student-data-table m-t-20">
                                                            <thead>
                                                                <tr>
                                                                    <th>Project Title</th>
                                                                    <th>Expert Price</th>
                                                                    <th>User Price</th>
                                                                    <th>Status</th>
                                                                    <th>Created at</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @forelse ($projects as $project)
                                                                <tr>
                                                                    <td> <a href="{{ url('admin/viewproject') }}/{{ $project['id'] }}"> {{ $project['project_title'] }} </a>   </td>
                                                                    <td>@money($project['expert_price']) </td>
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

                                            <div id="auction" class="tab-pane fade">
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
                                                            @forelse ($auctions as $auction)
                                                                <tr>
                                                                    <td> <a href="{{ url('admin/viewproject') }}/{{ $auction->id }}"> {{ $auction->project_title }} </a>   </td>
                                                                    <td>@money($auction->price) </td>
                                                                    <td> 
                                                                        @if ($auction->status == 1)
                                                                            <span class='badge badge-success'>Assigned</span>
                                                                        @elseif ($auction->status == 0)
                                                                            <span class='badge badge-primary'>Not Assigned</span>
                                                                        @else
                                                                            <span class='badge badge-secondary'>Unknown</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>@dateformat($auction->created_at)</td>
                                                                </tr>      
                                                                @empty
                                                                <div class="alert alert-danger" role="alert"> No data found</div>
                                                                @endforelse
                                                                
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="about" class="tab-pane fade">
                                                <div class="about-me-content pt-3">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5>Profile Image</h5>
                                                           

                                                            <h5>About</h5>
                                                            <p>{{ $expert['about'] }}</p>

                                                            <h5>Phone Number</h5>
                                                            <p>{{ $expert['phone_number'] }}</p>

                                                            <h5>Field of Study</h5>
                                                            <p>{{ $expert['field_of_study'] }}</p>

                                                            <h5>Project Type</h5>
                                                            <p>{{ $expert['project_type'] }}</p>

                                                            <h5>Country</h5>
                                                            <p>{{ $expert['country'] }}</p>

                                                            <h5>City</h5>
                                                            <p>{{ $expert['city'] }}</p>

                                                            <h5>Degree_obtained</h5>
                                                            <p>{{ $expert['degree_obtained'] }}</p>

                                                            <h5>Other degree obtained</h5>
                                                            <p>{{ $expert['degree_obtained_others'] }}</p>

                                                            <h5>Availability</h5>
                                                            <p>{{ $expert['availability'] }}</p>

                                                            <h5>Deliverability</h5>
                                                            <p>{{ $expert['deliver'] }}</p>

                                                            <h5>Plagiarism</h5>
                                                            <p>{{ $expert['plagiarism'] }}</p>

                                                            <h5>Plagiarism Check</h5>
                                                            <p>{{ $expert['plagiarismcheck'] }}</p>
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
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
   
@endsection

@section('footer')

    <script>
        $(document).ready(function() {
            $('.auction_expert').select2({
                placeholder: "Select An Expert to Auction",
                allowClear: true
            });
        });
    </script>
@endsection
@extends('admin.layout.layout')

@section('header')
    <style>
        /* Custom styling for Select2 dropdown text */
        .select2-container .select2-results__option {
            color: black; /* Replace with your desired color */
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Project</a></li>
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

                    @if(Session::has('Error'))
                        <div class="alert alert-danger" role="alert">
                        {{Session::get('Error')}}
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
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>Project Title</h6>
                                                <p class="text-dark">{{ $project['project_title']}}</p>
                                            </div>
                                            <div class="col-12">
                                                <h6>Project Description</h6>
                                                <p class="text-dark">{{ $project['description']}}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col">
                                                <h4 class="m-b-0">@money( $project['price'])</h4><span class="text-dark">User Price</span>
                                            </div>
                                            <div class="col">
                                                <h4 class="m-b-0">@money( $project['expert_price'])</h4><span class="text-dark">Expert Price</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>Status @if ($project['progress'] == 1)
                                                <span class='badge badge-secondary'>Auction</span>
                                                @elseif ($project['progress'] == 2)
                                                    <span class='badge badge-danger'>In Progress</span>
                                                @elseif ($project['progress'] == 3)
                                                    <span class='badge badge-success'>Completed</span>
                                                @else
                                                
                                                @endif </h6>
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>Field of study - <span class='badge badge-default'>{{ $project['subject_area'] }} </span> </h6>
                                                <h6>Project type  - <span class='badge badge-default'>{{ $project['project_type'] }} </span> </h6>
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h6>Expert assigned ->  </h6>
                                            @forelse ($auctions as $auction)
                                                @if ($auction->status == 1)

                                                    <span class='badge badge-default text-white'>{{ $auction->name }} </span> 
                                                @endif
                                            @empty

                                            @endforelse
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
                                            <li class="nav-item"><a href="#auction" data-toggle="tab" class="nav-link active show">Auction</a>
                                            </li>
                                            <li class="nav-item"><a href="#assign" data-toggle="tab" class="nav-link">Assign</a>
                                            </li>
                                            <li class="nav-item"><a href="#price" data-toggle="tab" class="nav-link">Price</a>
                                            </li>
                                            <li class="nav-item"><a href="#action" data-toggle="tab" class="nav-link">Action</a>
                                            </li>
                                            <li class="nav-item"><a href="#userfile" data-toggle="tab" class="nav-link">User Files</a>
                                            </li>
                                            <li class="nav-item"><a href="#expertfile" data-toggle="tab" class="nav-link">Expert Files</a>
                                            </li>
                                            
                                        </ul>
                                        <div class="tab-content">
                                            <div id="auction" class="tab-pane fade active show">
                                                <div class="my-post-content pt-3">
                                                    <form method="post" action="">@CSrf
                                                        <select class="form-control auction_expert selectoption" name="expert">
                                                            <option></option>
                                                            @foreach($experts as $expert)
                                                                <option value="{{ $expert['id'] }}">{{ $expert['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                        <input type="hidden" name="action" value="auction">
                                                        <button type="submit" class="btn btn-dark btn-block mt-2">Auction</button>
                                                    </form>

                                                    <div class="row">
                                                        <div class="col-12 mt-4">
                                                            <h5>Experts Auctioned</h5>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="table-responsive">
                                                                <table class="table text-dark student-data-table m-t-20">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Expert</th>
                                                                            <th>status</th>
                                                                            <th>created</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @forelse ($auctions as $auction)
                                                                        <tr>
                                                                            <td>{{ $auction->name }}</td>
                                                                            <td> 
                                                                                @if ($auction->status == 1)
                                                                                    <span class='badge badge-success'>Assigned</span>
                                                                                @elseif ($auction->status == 0)
                                                                                    <span class='badge badge-danger'>Not Assigned</span>
                                                                                @else
                                                                                    <span class='badge badge-secondary'>Nothing</span>
                                                                                @endif
                                                                                
                                                                            </td>
                                                                            <td>{{ $auction->created_at }}</td>
                                                                        </tr>      
                                                                        @empty
                                                                        <div class="alert alert-danger" role="alert"> No Expert Assigned</div>
                                                                        @endforelse
                                                                        
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="assign" class="tab-pane fade">
                                                <div class="about-me-content pt-3">
                                                <div class="row">
                                                        <div class="col-12">
                                                            <h5>Assign Expert</h5>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="table-responsive">
                                                                <table class="table text-dark student-data-table m-t-20">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Expert</th>
                                                                            <th>status</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @forelse ($auctions as $auction)
                                                                        <tr>
                                                                            <td>{{ $auction->name }}</td>
                                                                            <td> 
                                                                                @if ($auction->status == 1)
                                                                                    <span class='badge badge-success'>Assigned</span>
                                                                                @elseif ($auction->status == 0)
                                                                                    <span class='badge badge-danger'>Not Assigned</span>
                                                                                @else
                                                                                    <span class='badge badge-secondary'>Nothing</span>
                                                                                @endif
                                                                                
                                                                            </td>
                                                                            <td>
                                                                                <form style="float:left; margin-left:10px;" action="" method="POST">
                                                                                    @csrf
                                                                                    @method('POST')
                                                                                    <input type="hidden" name="auctionid" value="{{ $auction->id }}">
                                                                                    <input type="hidden" name="projectid" value="{{ $auction->project_id }}">
                                                                                    <input type="hidden" name="expertid" value="{{ $auction->expert_id }}">
                                                                                    <input type="hidden" name="action" value="assign">
                                                                                    <button type="submit" class="dropdown-item text-white bg-primary">Assign</button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>      
                                                                        @empty
                                                                        <div class="alert alert-danger" role="alert"> No Expert Assigned Yet</div>
                                                                        @endforelse
                                                                        
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="price" class="tab-pane fade">
                                                <div class="about-me-content pt-3">
                                                    <form method="post" action="">@CSrf
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">User Price</label>
                                                            <input type="number" class="form-control"  name="price" value="{{ $project['price'] }}">
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Expert Price</label>
                                                            <input type="number" class="form-control"  name="expert_price" value="{{ $project['expert_price'] }}">
                                                            
                                                        </div>
                                                       
                                                        <input type="hidden" name="action" value="updateprice">
                                                        <button type="submit" class="btn btn-dark btn-block">Update Price</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div id="action" class="tab-pane fade">
                                                <div class="about-me-content pt-3">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h6>Status @if ($project['progress'] == 1)
                                                            <span class='badge badge-secondary'>Auction</span>
                                                            @elseif ($project['progress'] == 2)
                                                                <span class='badge badge-danger'>In Progress</span>
                                                            @elseif ($project['progress'] == 3)
                                                                <span class='badge badge-success'>Completed</span>
                                                            @else
                                                            
                                                            @endif </h6>
                                                        
                                                        </div>
                                                    </div>

                                                    <form method="post" action="">@CSrf
                                                        <div class="form-group">
                                                            <select class="form-control" name="projectstatus">
                                                                <option value="1" @if($project['progress'] == "1") selected @else @endif >Auction</option>
                                                                <option value="2" @if($project['progress'] == "2") selected @else @endif>InProgress</option>
                                                                <option value="3" @if($project['progress'] == "3") selected @else @endif>Completed</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <input type="hidden" name="expert" value="{{ $expert['id'] }}">
                                                        <input type="hidden" name="expert_price" value="{{ $project['expert_price'] }}">
                                                       
                                                        <input type="hidden" name="action" value="updatestatus">
                                                        <button type="submit" class="btn btn-dark btn-block">Update Price</button>
                                                    </form>

                                                    <form method="post" action="">@CSrf
                                                        
                                                        <input type="hidden" name="expert" value="{{ $expert['id'] }}">
                                                        <input type="hidden" name="expert_price" value="{{ $project['expert_price'] }}">
                                                       
                                                        <input type="hidden" name="action" value="completenotify">
                                                        <button type="submit" class="btn btn-dark btn-block">Notify Comletion</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div id="userfile" class="tab-pane fade">
                                                <div class="about-me-content pt-3">
                                                    <div class="row">
                                                        <div class="col-12 mt-4">
                                                            <h5>User Files</h5>
                                                        </div>
                                                        @forelse ($attachments as $attachment)
                                                            <div class="card">
                                                                <div class="d-flex align-items-center flex-wrap">
                                                                    <div class="m-2">
                                                                        <a href="#"
                                                                            class="d-flex align-items-center text-muted">
                                                                            <!-- LOGO -->
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="48"
                                                                                    height="48">
                                                                                <g stroke="currentColor"
                                                                                    fill="none"
                                                                                    stroke-width="1.5"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                    <path d="M26.09 37.272l-7.424 1.06 1.06-7.424 19.092-19.092c1.758-1.758 4.606-1.758 6.364 0s1.758 4.606 0 6.364L26.09 37.272zM12 1.498h12c.828 0 1.5.672 1.5 1.5v3c0 .828-.672 1.5-1.5 1.5H12c-.828 0-1.5-.672-1.5-1.5v-3c0-.828.672-1.5 1.5-1.5zM25.5 4.498h6c1.656 0 3 1.344 3 3"
                                                                                            stroke-width="3"></path>
                                                                                    <path d="M34.5 37.498v6c0 1.656-1.344 3-3 3h-27c-1.656 0-3-1.344-3-3v-36c0-1.656 1.344-3 3-3h6M10.5 16.498h15M10.5 25.498h6"
                                                                                            stroke-width="3"></path>
                                                                                </g>
                                                                            </svg>

                                                                        </a>
                                                                    </div>
                                                                    @php
                                                                        $modifiedValue = str_replace(' ', '-', $attachment['original_filename']);
                                                                        // Split the string by the hyphen
                                                                        $parts = explode('_', $modifiedValue);
                                                                        // Get the second element
                                                                        $filerealname = $parts[1] ?? null;
                                                                    @endphp
                                                                    <div class="stories-card__title flex">
                                                                        <h6 class="card-title m-0"><a href="{{ asset('storage/tmp/uploads/' . $attachment['original_filename']) }}"
                                                                                class="text-body">{{  $filerealname }}</a></h6>
                                                                        <!-- <small class="text-muted"><a href="#"><strong>PDF</strong></a> 22.2kb</small> -->
                                                                    </div>
                                                                    <div class="ml-auto d-flex align-items-center">
                                                                        <div class="avatar-group mr-3">

                                                                        
                                                                        </div>
                                                                        <div class="badge badge-soft-angular badge-pill mr-3">
                                                                        
                                                                            <a href="{{ asset('storage/tmp/uploads/' . $attachment['original_filename']) }}"
                                                                                    class="btn btn-primary">Download File</a>
                                                                            <!-- <button type="button" class="btn btn-danger">Delete</button> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @empty
                                                        <div class="alert alert-danger" role="alert"> No Files Uploaded</div>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="expertfile" class="tab-pane fade">
                                                <div class="about-me-content pt-3">
                                                    <div class="row">
                                                        <div class="col-12 mt-4">
                                                            <h5>Expert Files</h5>
                                                        </div>
                                                        @forelse ($expertattachments as $expertattachment)
                                                        <div class="card" style="width:100%">
                                                            <div class="d-flex align-items-center flex-wrap">
                                                                <div class="m-2">
                                                                    <a href="#"
                                                                        class="d-flex align-items-center text-muted">
                                                                        <!-- LOGO -->
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="48"
                                                                                height="48">
                                                                            <g stroke="currentColor"
                                                                                fill="none"
                                                                                stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round">
                                                                                <path d="M26.09 37.272l-7.424 1.06 1.06-7.424 19.092-19.092c1.758-1.758 4.606-1.758 6.364 0s1.758 4.606 0 6.364L26.09 37.272zM12 1.498h12c.828 0 1.5.672 1.5 1.5v3c0 .828-.672 1.5-1.5 1.5H12c-.828 0-1.5-.672-1.5-1.5v-3c0-.828.672-1.5 1.5-1.5zM25.5 4.498h6c1.656 0 3 1.344 3 3"
                                                                                        stroke-width="3"></path>
                                                                                <path d="M34.5 37.498v6c0 1.656-1.344 3-3 3h-27c-1.656 0-3-1.344-3-3v-36c0-1.656 1.344-3 3-3h6M10.5 16.498h15M10.5 25.498h6"
                                                                                        stroke-width="3"></path>
                                                                            </g>
                                                                        </svg>

                                                                    </a>
                                                                </div>
                                                                @php
                                                                        $modifiedValue = str_replace(' ', '-', $expertattachment['original_filename']);
                                                                        // Split the string by the hyphen
                                                                        $parts = explode('_', $modifiedValue);
                                                                        // Get the second element
                                                                        $filerealname = $parts[1] ?? null;
                                                                    @endphp
                                                                <div class="stories-card__title flex text-dark">
                                                                        <h5 class="card-title m-1"><a href="{{ asset('storage/expertfiles/' . $expertattachment['original_filename']) }}"
                                                                            class="text-body ">{{ $filerealname }}</a></br>
                                                                            
                                                                                
                                                                        </h5>
                                                                        @if ($expertattachment['status'] == 1)
                                                                            <small class="text-muted"><span class='badge badge-success badge-pill'>Approved</span></small>
                                                                        @elseif ($expertattachment['status'] == 0)
                                                                            <small class="text-muted"><span class='badge badge-danger badge-pill'>Not Approved</span></small>
                                                                        @else
                                                                            
                                                                        @endif
                                                                       
                                                                </div>
                                                                <div class="ml-auto d-flex align-items-center">
                                                                    <div class="avatar-group mr-3">

                                                                    
                                                                    </div>
                                                                    <div class="badge badge-soft-angular badge-pill mr-3">
                                                                        <!-- <form style="float:left; margin-left:10px;" action="" method="POST">
                                                                            @csrf
                                                                            @method('POST')
                                                                            <input type="hidden" name="attachmentid" value="{{ $expertattachment['id'] }}">
                                                                            <input type="hidden" name="filename" value="{{ $expertattachment['original_filename'] }}">
                                                                            <input type="hidden" name="action" value="deletefile">
                                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                                        </form> -->
                                                                        <!-- <form style="float:left; margin-left:10px;" action="" method="POST">
                                                                            @csrf
                                                                            @method('POST')
                                                                            <input type="hidden" name="attachmentid" value="{{ $expertattachment['id'] }}">
                                                                            <input type="hidden" name="filename" value="{{ $expertattachment['original_filename'] }}">
                                                                            <input type="hidden" name="action" value="approvalfile">
                                                                            <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                                                        </form> -->
                                                                        <div class="btn-group" role="group" style="font-size:13px; color:white;">
                                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action</button>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item bg-dark text-white" href="{{ asset('storage/expertfiles/' . $expertattachment['original_filename']) }}">Download</a>
                                                                                <form action="" method="POST">
                                                                                    @csrf
                                                                                    @method('POST')
                                                                                    <input type="hidden" name="attachmentid" value="{{ $expertattachment['id'] }}">
                                                                                    <input type="hidden" name="filename" value="{{ $expertattachment['original_filename'] }}">
                                                                                    <input type="hidden" name="action" value="deleteexpertfile">
                                                                                    <button type="submit" class="dropdown-item bg-danger text-white">Delete</button>
                                                                                </form>
                                                                                @if ($expertattachment['status'] == 1)
                                                                                    <form action="" method="POST">
                                                                                        @csrf
                                                                                        @method('POST')
                                                                                        <input type="hidden" name="attachmentid" value="{{ $expertattachment['id'] }}">
                                                                                        <input type="hidden" name="status" value="0">
                                                                                        <input type="hidden" name="action" value="statusexpertfile">
                                                                                        <button type="submit" class="dropdown-item bg-danger ">Deactivate</button>
                                                                                    </form>
                                                                                @else
                                                                                    <form action="" method="POST">
                                                                                        @csrf
                                                                                        @method('POST')
                                                                                        <input type="hidden" name="attachmentid" value="{{ $expertattachment['id'] }}">
                                                                                        <input type="hidden" name="status" value="1">
                                                                                        <input type="hidden" name="action" value="statusexpertfile">
                                                                                        <button type="submit" class="dropdown-item bg-success text-white">Approve</button>
                                                                                    </form>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @empty
                                                        <div class="alert alert-danger" role="alert"> No Files Uploaded By Expert</div>
                                                        @endforelse
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
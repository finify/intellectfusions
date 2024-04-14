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
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Project Types</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-xxl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create New Project Types</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    @if(session('status'))
                                    <div class="alert alert-success mb-1 mt-1">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                    <form action="{{ route('projecttypes.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Project Type Name</label>
                                            <input class="form-control" type="text" name="type_name" />
                                            @error('type_name')
                                            <span class="text-danger text-left">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-dark btn-block">Add new Project Types</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Project Types</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>Type Name</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($projecttypes as $projecttype)
                                            <tr>
                                                <td>{{ $projecttype->type_name }}</td>
                                                <td>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action</button>
                                                    <div class="dropdown-menu">
                                                    <form action="{{ route('projecttypes.destroy',$projecttype->id) }}" method="Post">
                                                        <a class="dropdown-item" href="{{ route('projecttypes.edit',$projecttype->id) }}">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger">Delete</button>
                                                    </form>
                                                    </div>
                                                </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <div class="alert alert-danger" role="alert">
                                            No data found
                                            </div>
                                        @endforelse
                                        
                                            
                                        </tbody>
                                    </table>
                                    {!! $projecttypes->links() !!}
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


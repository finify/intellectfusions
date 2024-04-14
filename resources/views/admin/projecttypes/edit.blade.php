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
                            <li class="breadcrumb-item"><a href="/admin/coins">Project types</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Project types</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-xxl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Project type</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    @if(session('status'))
                                    <div class="alert alert-success mb-1 mt-1">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                    <form action="{{ route('projecttypes.update',$projecttype->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>projecttype name</label>
                                            <input class="form-control" type="text" name="type_name" value="{{ $projecttype->type_name }}"/>
                                            @error('type_name')
                                            <span class="text-danger text-left">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-dark btn-block">Update Project Type</button>
                                        </div>
                                    </form>
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


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
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Fields</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-xxl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create New Field</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    @if(session('status'))
                                    <div class="alert alert-success mb-1 mt-1">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                    <form action="{{ route('fields.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>field name</label>
                                            <input class="form-control" type="text" name="field_name" />
                                            @error('field_name')
                                            <span class="text-danger text-left">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-dark btn-block">Add new Field</button>
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
                                <h4 class="card-title">All fields</h4>
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
                                                <th>field Name</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($fields as $field)
                                            <tr>
                                                <td>{{ $field->field_name }}</td>
                                                <td>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action</button>
                                                    <div class="dropdown-menu">
                                                    <form action="{{ route('fields.destroy',$field->id) }}" method="Post">
                                                        <a class="dropdown-item" href="{{ route('fields.edit',$field->id) }}">Edit</a>
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
                                    {!! $fields->links() !!}
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


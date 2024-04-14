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
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit field</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-xxl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Fields</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    @if(session('status'))
                                    <div class="alert alert-success mb-1 mt-1">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                    <form >
                                        <div class="form-group">
                                            <label>field name</label>
                                            <input class="form-control" type="text" name="field_name" value="{{ $field->field_name }}"/>
                                          
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


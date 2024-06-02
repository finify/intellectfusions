@section('header')
 <!-- Select2 -->
 <link type="text/css"
              href="/dashassets/css/vendor-dropzone.css"
              rel="stylesheet">
        <link type="text/css"
              href="/dashassets/css/vendor-dropzone.rtl.css"
              rel="stylesheet">              
              
@endsection
@extends('user.layout.layout')


@section('content')

<div style="padding-bottom: calc(5.125rem / 2); position: relative; margin-bottom: 1.5rem;">
    <div class="bg-primary"
            style="min-height: 150px;">
        <div class="d-flex align-items-end container-fluid page__container"
                style="position: absolute; left: 0; right: 0; bottom: 0;">
            <div class="avatar avatar-xl">
                <img src="/dashassets/images/avatar/demi.png"
                        alt="avatar"
                        class="avatar-img rounded"
                        style="border: 2px solid white;">
            </div>
            <div class="card-header card-header-tabs-basic nav flex"
                    role="tablist">
                <a href="#activity"
                    class="active show"
                    data-toggle="tab"
                    role="tab"
                    aria-selected="true">Settings</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="row">
        <div class="col-lg-3">
            <h1 class="h4 mb-1">{{ $user['name'] }}</h1>
            <p class="text-muted">{{ $user['email'] }}</p>
            <form>
                <div class="form-group"> 
                    <label for="dropzone">Choose Profile image</label>
                    <div class="dropzone dropzone-multiple w-100"
                            data-toggle="dropzone"
                            data-dropzone-multiple
                            data-dropzone-url="http://"
                            accept="image/*,application/pdf"
                            data-dropzone-files=''>

                        <div class="fallback">
                            <div class="custom-file">
                                <input type="file"
                                        class="custom-file-input"
                                        id="customFileUploadMultiple"
                                        multiple>
                                <label class="custom-file-label"
                                        for="customFileUploadMultiple">Choose file</label>
                            </div>
                        </div>

                        <ul class="dz-preview dz-preview-multiple list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="form-row align-items-center">

                                    <div class="col">
                                        <div class="font-weight-bold"
                                                data-dz-name>...</div>
                                        <p class="small text-muted mb-0"
                                            data-dz-size>...</p>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#"
                                            class="text-red"
                                            data-dz-remove>
                                            <i class="material-icons">close</i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
               
                
                <button type="submit"
                        class="btn btn-primary">Change Profile image</button>
            </form>
        </div>
        <div class="col-lg-9">
            <div class="tab-content">
                <div class="tab-pane active"
                        id="activity">

                    <div class="card">
                        <div class="px-4 py-3">
                            <div class="d-flex mb-1">
                                <form class="w-100">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1 text-dark">Email</label>
                                        <input type="text"
                                                class="form-control"
                                                id="exampleInputEmail1"
                                                placeholder="Enter your project title ..">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1 text-dark">New Password</label>
                                        <input type="text"
                                                class="form-control"
                                                id="exampleInputEmail1"
                                                placeholder="Enter your project title ..">
                                    </div>
                                    
                                    
                                
                                    <button type="submit"
                                            class="btn btn-primary">Update Details</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')
    <script src="/dashassets/vendor/dropzone.min.js"></script>
        <script src="/dashassets/js/dropzone.js"></script>

    <script>
@endsection
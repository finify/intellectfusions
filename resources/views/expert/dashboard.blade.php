@section('header')
 <!-- Select2 -->
 <link type="text/css"
              href="/dashassets/css/vendor-select2.css"
              rel="stylesheet">
        <link type="text/css"
              href="/dashassets/css/vendor-select2.rtl.css"
              rel="stylesheet">
        <link type="text/css"
              href="/dashassets/vendor/select2/select2.min.css"
              rel="stylesheet">

 <!-- Dropzone -->
 <link type="text/css"
              href="/dashassets/css/vendor-dropzone.css"
              rel="stylesheet">
        <link type="text/css"
              href="/dashassets/css/vendor-dropzone.rtl.css"
              rel="stylesheet">              
              
@endsection
@extends('expert.layout.layout')


@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home11</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
            <h1 class="m-0">Dashboard</h1>
        </div>
        
    </div>
</div>

<div class="container-fluid page__container">

    <div class="row card-group-row">
        <div class="col-lg-6 col-md-6 card-group-row__col">
            <div class="card w-100">
                <div class="card-header card-header-large bg-white d-flex align-items-center">
                    <div class="d-flex flex-column">
                        <h5>ifeanyiizuegbu@yahoo.com</h5>
                        <div class="avatar avatar-xxl avatar-online">
                            <img src="/dashassets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                        </div>
                    </div>
                </div>
                <div class="card-body py-0">
                    <h4>My Projects</h4>
                    <div class="list-group list-group-small list-group-flush">
                        <div class="list-group-item d-flex align-items-center px-0">
                            <div class="mr-3 flex">All</div>
                            <div class="mr-3 text-dark">3</div>
                        </div>
                        <div class="list-group-item d-flex align-items-center px-0">
                            <div class="mr-3 flex">Auction</div>
                            <div class="mr-3 text-dark">0</div>
                        </div>
                        <div class="list-group-item d-flex align-items-center px-0">
                            <div class="mr-3 flex">In Progress</div>
                            <div class="mr-3 text-dark">0</div>
                        </div>
                        <div class="list-group-item d-flex align-items-center px-0">
                            <div class="mr-3 flex">Completed</div>
                            <div class="mr-3 text-dark">0</div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="col-lg-6 col-md-6 card-group-row__col">
            <div class="card card-tasks w-100">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col-md-6 text-md-left align-self-center">
                            <h4 class="card-header__title m-0">Notifications</h4>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">

                    <li class="list-group-item list-group-item-action py-2">
                        <div class="row align-items-center">
                            <div class="col-lg-auto">
                                <i class="material-icons md-18 text-muted align-middle mr-1">check_circle</i>
                                <span>Add content on lessons</span>
                            </div>
                            <div class="col-lg d-flex align-items-center text-md-right">
                                <span class="ml-auto badge badge-outline-info">Request</span> 
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item list-group-item-action py-2">
                        <div class="row align-items-center">
                            <div class="col-lg-auto">
                                <i class="material-icons md-18 text-muted align-middle mr-1">check_circle</i>
                                <span>Fix dropdowns in navbars</span>
                            </div>
                            <div class="col-lg d-flex align-items-center text-md-right">
                                <span class="ml-auto badge badge-outline-danger">Bug</span>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item list-group-item-action py-2">
                        <div class="row align-items-center">
                            <div class="col-lg-auto">
                                <i class="material-icons md-18 text-muted align-middle mr-1">check_circle</i>
                                <span>Add new sidebar to the right</span>
                            </div>
                            <div class="col-lg d-flex align-items-center text-md-right">
                                <span class="ml-auto badge badge-outline-info">Request</span>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item list-group-item-action py-2">
                        <div class="row align-items-center">
                            <div class="col-lg-auto">
                                <i class="material-icons md-18 text-muted align-middle mr-1">check_circle</i>
                                <span>Create Dashboard for administrative tasks</span>
                            </div>
                            <div class="col-lg d-flex align-items-center text-md-right">
                                <span class="ml-auto badge badge-outline-primary">feature</span>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
       
    </div>

    <div class="row">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-header bg-white">
                    <h4 class="card-header__title m-0">Active Project</h4>
                </div>
                <div class="card-body py-1 px-2">
                    <div class="card">
                        <div class="card-body py-2">
                            <div class="row">
                                <div class="col-lg-9 d-flex flex-column w-">
                                    <p><i class="material-icons icon-16pt mr-1">business</i> Deadline March 28,2024 </p>
                                    <h5><a href="#">Projecct report for electric vehichlee</a></h5>
                                    <h6>Engineering, Thesis</h6>
                                </div>
                                <div class="col-lg-3 d-flex flex-column">
                                    <h4>$30</h4>
                                    <span class="badge badge-success text-center">Completed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body py-2">
                            <div class="row">
                                <div class="col-lg-9 d-flex flex-column w-">
                                    <p><i class="material-icons icon-16pt mr-1">business</i> Deadline March 28,2024 </p>
                                    <h5><a href="#">Projecct report for electric vehichlee</a></h5>
                                    <h6>Engineering, Thesis</h6>
                                </div>
                                <div class="col-lg-3 d-flex flex-column">
                                    <h4>$30</h4>
                                    <h3 class="badge badge-success text-center ">Completed</h3>
                                </div>
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
   <!-- Select2 -->
   <script src="/dashassets/vendor/select2/select2.min.js"></script>
    <script src="/dashassets/js/select2.js"></script>

    <script src="/dashassets/vendor/dropzone.min.js"></script>
        <script src="/dashassets/js/dropzone.js"></script>

    <script>
        $("#flatpickrSample04").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
        Dropzone.options.dropzone = {
            acceptedFiles: 'image/*'
        }
    <script>
@endsection
@extends('user.layout.layout')


@section('content')
<div class="container-fluid page__container mt-4">
    <div class="row">
        <div class="col-lg-9">
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
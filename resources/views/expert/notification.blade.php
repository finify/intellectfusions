@extends('expert.layout.layout')


@section('content')
<div class="container-fluid page__container mt-4">
    <div class="row">
        <div class="col-lg-9">
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
</div>
@endsection
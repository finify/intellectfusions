@extends('user.layout.layout')


@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Notifications</li>
                </ol>
            </nav>
            <h1 class="m-0">Notifications</h1>
        </div>
        
    </div>
</div>
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

                    @forelse ($notifications as $notification)
                        <li class="list-group-item list-group-item-action py-2">
                            <div class="row align-items-center">
                                <div class="col-lg-auto">
                                    <i class="material-icons md-18 text-muted align-middle mr-1">check_circle</i>
                                    <span>{{ $notification['text']}}</span>
                                </div>
                                <div class="col-lg d-flex align-items-center text-md-right">
                                    <span class="ml-auto badge badge-outline-info">{{ $notification['type']}}</span> 
                                </div>
                            </div>
                        </li>
                    @empty
                    <div class="alert alert-danger" role="alert"> No notifications yet</div>
                    @endforelse

                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
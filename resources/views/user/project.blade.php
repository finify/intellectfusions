@extends('user.layout.layout')


@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Projects</li>
                </ol>
            </nav>
            <h1 class="m-0">Projects</h1>
        </div>
        
    </div>
</div>
<div class="container-fluid page__container mt-4">
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header bg-white">
                    <h4 class="card-header__title m-0">Active Project</h4>
                </div>
                <div class="card-body py-1 px-2">
                    @forelse ($projects as $project)
                        <div class="card mb-2">
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="col-lg-9 d-flex flex-column w-">
                                        <p><i class="material-icons icon-16pt mr-1">business</i> Deadline {{ $project['deadline']}} </p>
                                        <h5><a href="/user/projects/{{ $project['id']}}">{{ $project['project_title']}}</a></h5>
                                        <h6>{{ $project['subject_area']}}</h6>
                                    </div>
                                    <div class="col-lg-3 d-flex flex-column">
                                        <h4>@money($project['price'])</h4>
                                            @if ($project['progress'] == 1)
                                                <span class='badge badge-secondary'>Auction</span>
                                            @elseif ($project['progress'] == 2)
                                                <span class='badge badge-danger'>In Progress</span>
                                            @elseif ($project['progress'] == 3)
                                                <span class='badge badge-success'>Completed</span>
                                            @else
                                               
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="alert alert-danger" role="alert"> No Projects yet</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
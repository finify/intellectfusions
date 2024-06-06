@extends('expert.layout.layout')


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

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header card-header-large bg-white d-flex align-items-center">
                    <h4 class="card-header__title flex m-0">Projects</h4>
                    
                </div>
                <div class="card-header card-header-tabs-basic nav"
                        role="tablist">
                    <a href="#activity_all"
                        class="active"
                        data-toggle="tab"
                        role="tab"
                        aria-controls="activity_all"
                        aria-selected="true">All</a>
                    <a href="#auction"
                        data-toggle="tab"
                        role="tab"
                        aria-controls="auction"
                        aria-selected="false">Auctions</a>
                    <a href="#inprogress"
                        data-toggle="tab"
                        role="tab"
                        aria-controls="inprogress"
                        aria-selected="false">In Progress</a>
                    <a href="#completed"
                        data-toggle="tab"
                        role="tab"
                        aria-controls="completed"
                        aria-selected="false">Completed</a>
                    
                </div>
                <div class="card-body tab-content">
                    <div class="tab-pane active show fade" id="activity_all">
                        @forelse ($projects as $project)
                            
                            <div class="card p-3 mb-3">
                                <div class="d-flex">
                                    <div class="flex-fill d-flex">

                                        

                                        <div class="flex-fill">
                                            <div class="d-flex mb-2">
                                                <i class="material-icons icon-16pt mr-1">business</i>
                                                <strong>Deadline</strong>
                                                <div class="text-muted">{{ $project['deadline']}} </div>
                                                <!-- <span class="text-muted ml-1"><i class="material-icons icon-16pt">email</i> contact@frontted.com</span> -->
                                            </div>

                                            <div class="mb-2">
                                                <a href="/expert/projects/{{ $project['id']}}"
                                                    class="text-body mr-1"><strong>{{ $project['project_title']}}</strong></a>
                                            </div>
                                            <div class="">
                                                @if ($project['progress'] == 1)
                                                    <span class='badge badge-soft-warning badge-pill mr-1'>AUCTION</span>
                                                @elseif ($project['progress'] == 2)
                                                    <span class='badge badge-soft-danger badge-pill mr-1'>In Progress</span>
                                                @elseif ($project['progress'] == 3)
                                                    <span class='badge badge-soft-purple badge-pill mr-1'>Completed</span>
                                                @else
                                                
                                                @endif
                                                
                                            </div>

                                        </div>
                                    </div>
                                    <div class="text-muted">
                                        <h5>Price</h5>
                                        @money($project['expert_price'])
                                    </div>
                                </div>
                            </div>
                        @empty
                        <div class="alert alert-danger" role="alert"> No Projects yet</div>
                        @endforelse
                    </div>
                    <div class="tab-pane show fade stories-cards" id="auction">
                        @forelse ($auctions as $auction)
                            <div class="card">
                                <div class="card-body py-2">
                                    <div class="row">
                                        <div class="col-lg-9 d-flex flex-column w-">
                                            <p><i class="material-icons icon-16pt mr-1">business</i> Deadline {{ $auction['deadline']}} </p>
                                            <h5><a href="/expert/projects/{{ $auction['id']}}">{{ $auction['project_title']}}</a></h5>
                                            <h6>{{ $auction['subject_area']}}</h6>
                                        </div>
                                        <div class="col-lg-3 d-flex flex-column">
                                            <h4>@money($auction['price'])</h4>
                                                @if ($auction['progress'] == 1)
                                                    <span class='badge badge-secondary'>Auction</span>
                                                @elseif ($auction['progress'] == 2)
                                                    <span class='badge badge-danger'>In Progress</span>
                                                @elseif ($auction['progress'] == 3)
                                                    <span class='badge badge-success'>Completed</span>
                                                @else
                                                
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        <div class="alert alert-danger" role="alert"> No Projects In Auction yet</div>
                        @endforelse
                        
                       
                    </div>
                    <div class="tab-pane show fade stories-cards" id="inprogress">
                       
                        @forelse ($inprogress as $inprogres)
                            <div class="card">
                                <div class="card-body py-2">
                                    <div class="row">
                                        <div class="col-lg-9 d-flex flex-column w-">
                                            <p><i class="material-icons icon-16pt mr-1">business</i> Deadline {{ $inprogres['deadline']}} </p>
                                            <h5><a href="/expert/projects/{{ $inprogres['id']}}">{{ $inprogres['project_title']}}</a></h5>
                                            <h6>{{ $inprogres['subject_area']}}</h6>
                                        </div>
                                        <div class="col-lg-3 d-flex flex-column">
                                            <h4>@money($inprogres['price'])</h4>
                                                @if ($inprogres['progress'] == 1)
                                                    <span class='badge badge-secondary'>Auction</span>
                                                @elseif ($inprogres['progress'] == 2)
                                                    <span class='badge badge-danger'>In Progress</span>
                                                @elseif ($inprogres['progress'] == 3)
                                                    <span class='badge badge-success'>Completed</span>
                                                @else
                                                
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        <div class="alert alert-danger" role="alert"> No Projects In Progress Yet</div>
                        @endforelse
                       
                    </div>
                    <div class="tab-pane show fade" id="completed">
                        @forelse ($completeds as $completed)
                            <div class="card">
                                <div class="card-body py-2">
                                    <div class="row">
                                        <div class="col-lg-9 d-flex flex-column w-">
                                            <p><i class="material-icons icon-16pt mr-1">business</i> Deadline {{ $completed['deadline']}} </p>
                                            <h5><a href="/expert/projects/{{ $project['id']}}">{{ $completed['project_title']}}</a></h5>
                                            <h6>{{ $completed['subject_area']}}</h6>
                                        </div>
                                        <div class="col-lg-3 d-flex flex-column">
                                            <h4>@money($completed['price'])</h4>
                                                @if ($project['progress'] == 1)
                                                    <span class='badge badge-secondary'>Auction</span>
                                                @elseif ($completed['progress'] == 2)
                                                    <span class='badge badge-danger'>In Progress</span>
                                                @elseif ($completed['progress'] == 3)
                                                    <span class='badge badge-success'>Completed</span>
                                                @else
                                                
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        <div class="alert alert-danger" role="alert"> No Projects /c yet</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('user.layout.layout')


@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
            <h1 class="m-0">Dashboard</h1>
            @if(Session::has('upload_success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('upload_success')}}
                </div>
            @endif
        </div>
        
    </div>
</div>

<div class="container-fluid page__container">

    <div class="row card-group-row">
        <div class="col-lg-6 col-md-6 card-group-row__col">
            <div class="card w-100">
                <div class="card-header card-header-large bg-white d-flex align-items-center">
                    <div class="d-flex flex-column">
                        <h5>{{ $user['email'] }}</h5>
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
                            <div class="mr-3 text-dark">{{ $project_details['all'] }}</div>
                        </div>
                        <div class="list-group-item d-flex align-items-center px-0">
                            <div class="mr-3 flex">Auction</div>
                            <div class="mr-3 text-dark">{{ $project_details['auctions'] }}</div>
                        </div>
                        <div class="list-group-item d-flex align-items-center px-0">
                            <div class="mr-3 flex">In Progress</div>
                            <div class="mr-3 text-dark">{{ $project_details['inprogress'] }}</div>
                        </div>
                        <div class="list-group-item d-flex align-items-center px-0">
                            <div class="mr-3 flex">Completed</div>
                            <div class="mr-3 text-dark">{{ $project_details['completed'] }}</div>
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

    <div class="row">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-header bg-white d-flex align-items-center">
                    <h4 class="card-header__title flex m-0">Create A New Project</h4>
                    
                </div>
                <div class="card-body text-dark">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1 text-dark">Project Title:</label>
                            <input type="text"
                                    name="project_title"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    placeholder="Enter your project title .."  value="{{ old('project_title') }}" required/>
                            @error('project_title')
                            <span class="text-danger text-left">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputBrief1">Brief Description:</label>
                            <textarea class="form-control" id="exampleInputBrief1" name="description" id="" cols="30" rows="10" required></textarea>
                            @error('description')
                            <span class="text-danger text-left">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="select05">Project Type</label>
                                    <select id="select05"
                                            name="project_type"
                                            data-toggle="select"
                                            class="form-control form-control-sm" required>
                                            @forelse ($projecttypes as $projecttype)
                                                <option value="{{ $projecttype['type_name'] }}">{{ $projecttype['type_name'] }}</option>
                                            @empty
                                                <option>No Project Type</option>
                                            @endforelse
                                        
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="select05">Subject Area</label>
                                    <select id="select02"
                                            name="subject_area"
                                            data-toggle="select"
                                            class="form-control form-control-sm" required >
                                            @forelse ($fields as $field)
                                                <option value="{{ $field['field_name'] }}">{{ $field['field_name'] }}</option>
                                            @empty
                                                <option>No Project Type</option>
                                            @endforelse
                                    </select>
                                </div>      
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <label for="document">Documents</label>
                            <div class="needsclick dropzone" id="document-dropzone">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-label" for="flatpickrSample04">Deadline</label>
                            <input id="flatpickrSample04"
                                    name="deadline"
                                    type="text"
                                    class="form-control"
                                    placeholder="Pick a Date"
                                    data-toggle="flatpickr"
                                    data-flatpickr-enable-time="true"
                                    data-flatpickr-alt-format="F j, Y"
                                    value="">
                        </div>

                        <input type="hidden" value="formsubmit" name="formsubmit">
                        
                       
                        <button type="submit"
                                class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-lg-6">

            <div class="card">
                <div class="card-header bg-white">
                    <h4 class="card-header__title m-0">Active Project</h4>
                </div>
                <div class="card-body py-1 px-2">
                    @forelse ($projects as $project)
                        <div class="card p-3 mb-3">
                            <div class="d-flex">
                                <div class="flex-fill d-flex">
                                    <div class="flex-fill">
                                        <div class="d-flex mb-2">
                                            <i class="material-icons icon-16pt mr-1">business</i>
                                            <strong>Deadline </strong>
                                            <div class="text-muted"> @dateformat($project['deadline']) </div>
                                            <!-- <span class="text-muted ml-1"><i class="material-icons icon-16pt">email</i> contact@frontted.com</span> -->
                                        </div>

                                        <div class="mb-2">
                                            <a href="/user/projects/{{ $project['id']}}"
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
                                    @money($project['price'])
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

@section('footer')
<script>
  var uploadedDocumentMap = {}
  Dropzone.options.documentDropzone = {
    url: '{{ route('dashboard.storemedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
      uploadedDocumentMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentMap[file.name]
      }
      $('form').find('input[name="document[]"][value="' + name + '"]').remove();

      // Send AJAX request to delete file from server
        $.ajax({
            type: 'POST',
            url: '{{ route('dashboard.deleteMedia') }}',
            data: { filename: name, _token: '{{ csrf_token() }}' },
            success: function(data){
                console.log('File deleted successfully');
            },
            error: function(xhr, status, error) {
                console.error('Error deleting file:', error);
            }
        });


    },
    init: function () {
     
    }
  }
</script>

@endsection
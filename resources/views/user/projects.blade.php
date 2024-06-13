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
        </div>
        
    </div>
</div>
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
    {{Session::get('success')}}
    </div>
@endif
<div class="container-fluid page__container mt-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header card-header-large bg-white d-flex align-items-center">
                    <h4 class="card-header__title flex m-0">Project Details</h4>
                    
                </div>
                <div class="card-header card-header-tabs-basic nav"
                        role="tablist">
                    <a href="#activity_all"
                        class="active"
                        data-toggle="tab"
                        role="tab"
                        aria-controls="activity_all"
                        aria-selected="true">Details</a>
                    <a href="#my_attachment"
                        data-toggle="tab"
                        role="tab"
                        aria-controls="my_attachment"
                        aria-selected="false">My Files</a>
                    <a href="#expert_attachment"
                        data-toggle="tab"
                        role="tab"
                        aria-controls="expert_attachment"
                        aria-selected="false">Expert files</a>
                    
                </div>
                <div class="card-body tab-content">
                    <div class="tab-pane active show fade"
                            id="activity_all">
                            <h5>Project Title:</h5>
                            <p>{{ $project['project_title'] }}</p>
                            <h4>description:</h4>
                            <p>{{ $project['description'] }}</p>
                            <h4>Price</h4>
                            <p> @money($project['price'])</p>

                            <button type="button"
                                    class="btn btn-primary"
                                    data-toggle="modal"
                                    data-target="#modal-signup">Edit Details</button>
                            

                    </div>
                    <div class="tab-pane show fade stories-cards" id="my_attachment">
                        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#modal-addfile">Add File</button>
                        @forelse ($attachments as $attachment)
                            <div class="card">
                                <div class="d-flex align-items-center flex-wrap">
                                    <div class="m-4">
                                        <a href="#"
                                            class="d-flex align-items-center text-muted">
                                            <!-- LOGO -->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                    width="48"
                                                    height="48">
                                                <g stroke="currentColor"
                                                    fill="none"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M26.09 37.272l-7.424 1.06 1.06-7.424 19.092-19.092c1.758-1.758 4.606-1.758 6.364 0s1.758 4.606 0 6.364L26.09 37.272zM12 1.498h12c.828 0 1.5.672 1.5 1.5v3c0 .828-.672 1.5-1.5 1.5H12c-.828 0-1.5-.672-1.5-1.5v-3c0-.828.672-1.5 1.5-1.5zM25.5 4.498h6c1.656 0 3 1.344 3 3"
                                                            stroke-width="3"></path>
                                                    <path d="M34.5 37.498v6c0 1.656-1.344 3-3 3h-27c-1.656 0-3-1.344-3-3v-36c0-1.656 1.344-3 3-3h6M10.5 16.498h15M10.5 25.498h6"
                                                            stroke-width="3"></path>
                                                </g>
                                            </svg>

                                        </a>
                                    </div>
                                    @php
                                        $modifiedValue = str_replace(' ', '-', $attachment['original_filename']);
                                        // Split the string by the hyphen
                                        $parts = explode('_', $modifiedValue);
                                        // Get the second element
                                        $filerealname = $parts[1] ?? null;
                                    @endphp
                                    <div class="stories-card__title flex">
                                        <h5 class="card-title m-0"><a href="{{ asset('storage/tmp/uploads/' . $attachment['original_filename']) }}"
                                                class="text-body">{{  $filerealname }}</a></h5>
                                        <!-- <small class="text-muted"><a href="#"><strong>PDF</strong></a> 22.2kb</small> -->
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <div class="avatar-group mr-3">

                                        
                                        </div>
                                        <div class="badge badge-soft-angular badge-pill mr-3">
                                            <form style="float:left; margin-left:10px;" action="" method="POST">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="attachmentid" value="{{ $attachment['id'] }}">
                                                <input type="hidden" name="filename" value="{{ $attachment['original_filename'] }}">
                                                <input type="hidden" name="action" value="deletefile">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            <!-- <button type="button" class="btn btn-danger">Delete</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        <div class="alert alert-danger" role="alert"> No Files Uploaded</div>
                        @endforelse
                       
                    </div>
                    <div class="tab-pane show fade" id="expert_attachment">
                        @forelse ($expertattachments as $expertattachment)
                            @if ($expertattachment['status'] == 1)
                                <div class="card">
                                    <div class="d-flex align-items-center flex-wrap">
                                        <div class="m-4">
                                            <a href="#"
                                                class="d-flex align-items-center text-muted">
                                                <!-- LOGO -->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                        width="48"
                                                        height="48">
                                                    <g stroke="currentColor"
                                                        fill="none"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M26.09 37.272l-7.424 1.06 1.06-7.424 19.092-19.092c1.758-1.758 4.606-1.758 6.364 0s1.758 4.606 0 6.364L26.09 37.272zM12 1.498h12c.828 0 1.5.672 1.5 1.5v3c0 .828-.672 1.5-1.5 1.5H12c-.828 0-1.5-.672-1.5-1.5v-3c0-.828.672-1.5 1.5-1.5zM25.5 4.498h6c1.656 0 3 1.344 3 3"
                                                                stroke-width="3"></path>
                                                        <path d="M34.5 37.498v6c0 1.656-1.344 3-3 3h-27c-1.656 0-3-1.344-3-3v-36c0-1.656 1.344-3 3-3h6M10.5 16.498h15M10.5 25.498h6"
                                                                stroke-width="3"></path>
                                                    </g>
                                                </svg>

                                            </a>
                                        </div>
                                        @php
                                                $modifiedValue = str_replace(' ', '-', $expertattachment['original_filename']);
                                                // Split the string by the hyphen
                                                $parts = explode('_', $modifiedValue);
                                                // Get the second element
                                                $filerealname = $parts[1] ?? null;
                                            @endphp
                                        <div class="stories-card__title flex">
                                            <h5 class="card-title m-0"><a href="{{ asset('storage/tmp/uploads/' . $expertattachment['original_filename']) }}"
                                                    class="text-body">{{ $filerealname }}</a></h5>
                                            <!-- <small class="text-muted"><a href="#"><strong>PDF</strong></a> 22.2kb</small> -->
                                        </div>
                                        <div class="ml-auto d-flex align-items-center">
                                            <div class="avatar-group mr-3">

                                            
                                            </div>
                                            <div class="badge badge-soft-angular badge-pill mr-3">
                                                <button type="button" class="btn btn-success">Download</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-danger" role="alert"> No Files Uploaded By Expert</div>
                            @endif
                        
                        @empty
                        <div class="alert alert-danger" role="alert"> No Files Uploaded By Expert</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('footer')
 <!-- Sign Up Modal -->
 <div id="modal-signup"
    class="modal fade"
    tabindex="-1"
    role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="px-3">
                    <form action="" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1 text-dark">Project Title:</label>
                            <input type="text"
                                    name="project_title"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    placeholder="Enter your project title .."  value="{{ $project['project_title'] }}" required/>
                            @error('project_title')
                            <span class="text-danger text-left">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputBrief1">Brief Description:</label>
                            <textarea class="form-control" id="exampleInputBrief1" name="description" id="" cols="30" rows="10" required>{{ $project['description'] }}</textarea>
                            @error('description')
                            <span class="text-danger text-left">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="hidden" name="project_id" value="{{ $project['id'] }}">
                        <input type="hidden" name="action" value="updatedetail">
                        <div class="form-group text-center">
                            <button class="btn btn-primary"
                                    type="submit">Update Detail</button>
                        </div>
                    </form>
                </div>
            </div> <!-- // END .modal-body -->
        </div> <!-- // END .modal-content -->
    </div> <!-- // END .modal-dialog -->
</div> <!-- // END .modal -->

<!-- Sign Up Modal -->
<div id="modal-addfile"
    class="modal fade"
    tabindex="-1"
    role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="px-3">
                    <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="document">Documents</label>
                            <div class="needsclick dropzone" id="document-dropzone">

                            </div>
                        </div>
                        <input type="hidden" name="action" value="uploaddoc">
                        <div class="form-group text-center">
                            <button class="btn btn-primary"
                                    type="submit">Upload File</button>
                        </div>
                    </form>
                </div>
            </div> <!-- // END .modal-body -->
        </div> <!-- // END .modal-content -->
    </div> <!-- // END .modal-dialog -->
</div> <!-- // END .modal -->

<script>
    var previewTemplate = `
            <div class="dz-preview dz-file-preview">
                <div class="dz-details">
                    <div class="dz-filename">
                        <span data-dz-name></span>
                        <span class="dz-remove" data-dz-remove>&times;</span>
                    </div>
                    <div class="dz-size" data-dz-size></div>
                </div>
            </div>
        `;

  var uploadedDocumentMap = {}
  Dropzone.options.documentDropzone = {
    previewTemplate: previewTemplate,
    url: '{{ route('project.storemedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
        console.log(response);
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
            url: '{{ route('project.deletemedia') }}',
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
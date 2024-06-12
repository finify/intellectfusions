@extends('expert.layout.layout')
@section('header')
 <!-- Select2 -->
 <link type="text/css" href="/dashassets/vendor/select2/select2.min.css" rel="stylesheet"> 
      
<style>
    .dropzone{
        width:40%;
        padding:0px;
    }
    /* CSS to reduce the size of the default image preview */
    .dropzone .dz-preview .dz-image-preview {
    width: 100px; /* Adjust width as needed */
    height: 100px; /* Adjust height as needed */
    }
    /* Optionally, you can also adjust the size of the image within the preview */
    .dropzone .dz-preview .dz-image-preview img {
    width: 100px; /* Adjust width as needed */
    height: 100px; /* Adjust height as needed */
    }
</style>
@endsection

@section('content')

<div style="padding-bottom: calc(5.125rem / 2); position: relative; margin-bottom: 1.5rem;">
    <div class="bg-primary"
            style="min-height: 150px;">
        <div class="d-flex align-items-end container-fluid page__container"
                style="position: absolute; left: 0; right: 0; bottom: 0;">
            <div class="avatar avatar-xl">
                <img src=" @if($expertdetail['profileimage'] == '') /dashassets/images/avatar/profileavatar.jpeg @else {{ asset('storage/profilepicture/' . $expertdetail['profileimage']) }} @endif"
                        alt="avatar"
                        class="avatar-img rounded"
                        style="border: 2px solid white;">
            </div>
            <div class="card-header card-header-tabs-basic nav flex"
                    role="tablist">
                
                <a href="#details"
                    class="active  show"
                    data-toggle="tab"
                    role="tab"
                    aria-selected="true">Details</a>
                <a href="#profile"
                    class=""
                    data-toggle="tab"
                    role="tab"
                    aria-selected="true">Settings</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-9">
            <div class="tab-content">
                <div class="tab-pane active" id="details">
                <h1 class="h4 mb-1">{{ $user['name'] }}</h1>
                    <p class="text-muted">{{ $user['email'] }}</p>
                    <form method="POST" enctype="multipart/form-data"> @csrf
                        <div class="form-group" >
                            <label for="document">Update Profile Image</label>
                            <div class="needsclick dropzone" id="document-dropzone">

                            </div>
                        </div>
                        <input type="hidden" name="action" value="updateprofilepicture">
                        <button type="submit"
                                class="btn btn-primary">Update Image</button>
                    </form>
                    <div class="card mt-3">
                        <div class="px-4 py-3">
                            <div class="d-flex mb-1">
                                <form id="detailform" class="w-100" action="" method="post">@CSrf
                                    <div class="form-group">
                                        <label for="select07">Field of Study</label>
                                        <select id="fieldselect" data-toggle="select" class="form-control" name="field_of_study[]" multiple="multiple" style="width: 100%;">
                                                <option></option>
                                                @forelse ($fields as $field)
                                                    <option value="{{ $field['field_name']}}" >{{ $field['field_name']}}</option>
                                                @empty
                                                    <div class="alert alert-danger" role="alert">No project type</div>
                                                @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="select08">Protect Types</label>
                                        <select id="projecttype" data-toggle="select" class="form-control" name="project_type[]" multiple="multiple" style="width: 100%;">
                                                <option></option>
                                                @forelse ($projecttypes as $projecttype)
                                                    <option value="{{ $projecttype['type_name']}}" >{{ $projecttype['type_name']}}</option>
                                                @empty
                                                    <div class="alert alert-danger" role="alert">No project type</div>
                                                @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1 text-dark">Phone number</label>
                                        <input type="number"
                                                name="phone_number"
                                                value="{{ $expertdetail['phone_number'] }}"
                                                class="form-control"
                                                id="exampleInputEmail1"
                                                placeholder="Enter Phone number">
                                    @error('phone_number')
                                        <span class="text-danger text-left">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1 text-dark">Country</label>
                                        <input type="text"
                                                name="country"
                                                value="{{ $expertdetail['country'] }}"
                                                class="form-control"
                                                id="exampleInputEmail1"
                                                placeholder="Enter Country">
                                     @error('country')
                                        <span class="text-danger text-left">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1 text-dark">City</label>
                                        <input type="text"
                                                name="city"
                                                value="{{ $expertdetail['city'] }}"
                                                class="form-control"
                                                id="exampleInputEmail1"
                                                placeholder="Enter city">
                                    @error('city')
                                        <span class="text-danger text-left">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="select05">Highest Degree Obtained</label>
                                        <select id="select05"
                                                name="degree_obtained"
                                                data-toggle="select"
                                                class="form-control" >
                                                <option value=""></option>
                                                <option value="Bachelor" @if($expertdetail['degree_obtained'] == "Bachelor") selected @else @endif >Bachelor's</option>
                                                <option value="Master" @if($expertdetail['degree_obtained'] == "Master") selected @else @endif>Master's</option>
                                                <option value="phd" @if($expertdetail['degree_obtained'] == "phd") selected @else @endif>Ph.D.</option>
                                                <option value="others" @if($expertdetail['degree_obtained'] == "others") selected @else @endif>Others</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1 text-dark">Specify Other if any</label>
                                        <input type="text"
                                                name="degree_obtained_others"
                                                value="{{ $expertdetail['degree_obtained_others'] }}"
                                                class="form-control"
                                                id="exampleInputEmail1"
                                                placeholder="">
                                        @error('degree_obtained_others')
                                        <span class="text-danger text-left">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="select06">What Is Your Current Availability?</label>
                                        <select id="select06"
                                                name="availability"
                                                data-toggle="select"
                                                class="form-control">
                                                <option value=""></option>
                                                <option value="fulltime" @if($expertdetail['availability'] == "fulltime") selected @else @endif>Full-time</option>
                                                <option value="parttime" @if($expertdetail['availability'] == "parttime") selected @else @endif>Part-time</option>
                                                <option value="projectbased" @if($expertdetail['availability'] == "projectbased") selected @else @endif>Project-based</option>
                                        </select>
                                        @error('availability')
                                        <span class="text-danger text-left">{{ $message }}</span>
                                        @enderror
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="select06">Are you committed to delivering a project before deadline</label>
                                        <select id="select06"
                                                name="deliver"
                                                data-toggle="select"
                                                class="form-control" >
                                                <option value=""></option>
                                                <option value="Yes" @if($expertdetail['deliver'] == "Yes") selected @else @endif>Yes</option>
                                                <option value="No" @if($expertdetail['deliver'] == "No") selected @else @endif>No</option>
                                        </select>
                                        @error('deliver')
                                        <span class="text-danger text-left">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBrief1">About Yourself (Not more than 100 words )</label>
                                        <textarea class="form-control" id="exampleInputBrief1" name="about" id="" cols="30" rows="10" >{{ $expertdetail['about'] }}</textarea>
                                        @error('about')
                                        <span class="text-danger text-left">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBrief1">What Is Your Understanding of Plagiarism?</label>
                                        <textarea class="form-control" id="exampleInputBrief1" name="plagiarism" id="" cols="30" rows="10" >{{ $expertdetail['plagiarism'] }}</textarea>
                                        @error('plagiarism')
                                        <span class="text-danger text-left">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBrief1">What steps do you take to avoid plagiarism in your work</label>
                                        <textarea class="form-control" id="exampleInputBrief1" name="plagiarismcheck" id="" cols="30" rows="10" >{{ $expertdetail['plagiarismcheck'] }}</textarea>
                                        @error('plagiarismcheck')
                                        <span class="text-danger text-left">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <!-- <input type="hidden" name="field_of_study" value="">
                                    <input type="hidden" name="project_type" value=""> -->
                                    <input type="hidden" name="action" value="updatedetail">
                                
                                    <button type="submit"
                                            class="btn btn-primary">Update Details</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane" id="profile">
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

<div class="modal fade" id="Notice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered text-white">
    <div class="modal-content bg-custom">
      <div class="modal-header border-bottom-0">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <center>
                <i class="bi bi-info-circle fs-1"></i>
                <h1 class="modal-title fs-1" id="staticBackdropLabel"><b>How it works?</b> </h1>
            </center>

           <br>

                <h6>Below are steps on how you can use the ranefy robot and make profits.</h6>

                <h2><b>How to start the robot?</b></h4>
                <p>
                Step 1: Input a trade amount.</br>
                Step 2: Select a strategy, strategy depends on your trade amount, select the strategy that matches your trade amount.</br>
                Step 3: You’re set! Click on start robot, the robot trades for you and accumulates profits every 5 minutes.

                </p>

                <h2><b>Important things to take note!</b></h2>

                <p>
                1.⁠ ⁠Your capital is always returned after every trade.</br>
                2.⁠ ⁠You can choose to stop the robot anytime.</br>
                3.⁠ ⁠The robot accumulates profits every 5 minutes.</br>
                4.⁠ ⁠You don’t have to do anything after starting the robot,the robot automatically trades and generates profits for you every 5 minutes until it reach its profit limit.</br>
                5.⁠ ⁠There is Live and Demo accounts, if you are ready to make real profits you can make deposits to your live account and use the robot.</br>
                </br>
                You can always contact us if you need further assistance using the ranefy bot.

                </p>
           
        
      </div>
      
    </div>
  </div>
</div>
@endsection




@section('footer')
        <script src="/dashassets/vendor/select2/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#fieldselect').select2({
                    placeholder: "Select a state",
                    allowClear: true
                });

               //select fieldofstudy from the expert details table
                var fieldArray = JSON.parse(@json($expertdetail['field_of_study']));

                if(fieldArray != "" ){
                    if(Array.isArray(fieldArray)){
                        if(fieldArray.length != 0){
                            $('#fieldselect').val(fieldArray);
                            $('#fieldselect').trigger('change');
                        }
                    }
                }
               

               
                

                if ($('#fieldselect').val().length === 0) {
                        $('<input />').attr('type', 'hidden')
                                    .attr('name', 'field_of_study')
                                    .attr('value', '')
                                    .appendTo('#detailform');
                    }
                $('#fieldselect').change(function() {
                    if ($('#fieldselect').val().length === 0) {
                            $('<input />').attr('type', 'hidden')
                                        .attr('name', 'field_of_study')
                                        .attr('value', '')
                                        .appendTo('#detailform');
                        }else{
                            $('input[name="field_of_study"]:hidden').remove();
                        }
                });


                //projecttype
                $('#projecttype').select2({
                    placeholder: "Select a state",
                    allowClear: true
                });

                 
               
                

                    //select options from the expert details table
                 var projecttypeArray = JSON.parse(@json($expertdetail['project_type']));

                 if(projecttypeArray != "" ){
                    if(Array.isArray(projecttypeArray)){
                        if(projecttypeArray.length != 0){
                            $('#projecttype').val(projecttypeArray);
                            $('#projecttype').trigger('change');

                        }
                    }
                 }

                 if ($('#projecttype').val().length === 0) {
                        $('<input />').attr('type', 'hidden')
                                    .attr('name', 'project_type')
                                    .attr('value', '')
                                    .appendTo('#detailform');
                    }
                    
                $('#projecttype').change(function() {
                    if ($('#projecttype').val().length === 0) {
                            $('<input />').attr('type', 'hidden')
                                        .attr('name', 'project_type')
                                        .attr('value', '')
                                        .appendTo('#detailform');
                        }else{
                            $('input[name="project_type"]:hidden').remove();
                        }
                });
            });
        </script>

        <script>
            var uploadedDocumentMap = {}
            Dropzone.options.documentDropzone = {
                dictDefaultMessage: "Upload profile image",
                acceptedFiles: 'image/*', // Accept only image files
                maxFiles: 1, // Limit to only one file
                url: '{{ route('picupload.storemedia') }}',
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
                        url: '{{ route('picdelete.deletemedia') }}',
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
                    this.on("addedfile", function(file) {
                    // Check if the added file is the first file
                    if (this.files.length > 1) {
                        // If there's more than one file, remove the previous file's preview
                        var firstFile = this.files[0];
                        this.removeFile(firstFile);
                    }
                    });
                
                }
            }
        </script>

    @if(Session::has('signup_success'))

    <script>
        const myModal = new bootstrap.Modal('#Notice', {
    keyboard: false
    })
    myModal.show();
    </script>

    @endif
@endsection
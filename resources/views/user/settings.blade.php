@section('header')
 <!-- Select2 -->
 <link type="text/css"
              href="/dashassets/css/vendor-dropzone.css"
              rel="stylesheet">
        <link type="text/css"
              href="/dashassets/css/vendor-dropzone.rtl.css"
              rel="stylesheet">              
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
@extends('user.layout.layout')


@section('content')

<div style="padding-bottom: calc(5.125rem / 2); position: relative; margin-bottom: 1.5rem;">
    <div class="bg-primary"
            style="min-height: 150px;">
        <div class="d-flex align-items-end container-fluid page__container"
                style="position: absolute; left: 0; right: 0; bottom: 0;">
            <div class="avatar avatar-xl">
                <img src="/dashassets/images/avatar/profileavatar.jpeg "
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
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
        </div>
    @endif
    <div class="row">
        <!-- <div class="col-lg-3">
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
        </div> -->
        <div class="col-lg-9">
            <div class="tab-content">
                <div class="tab-pane active"
                        id="activity">

                    <div class="card">
                        <div class="px-4 py-3">
                            <div class="d-flex mb-1">
                                <form class="w-100" action="" method="post">@CSrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1 text-dark">Email</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $user['email'] }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1 text-dark">New Password</label>
                                        <input type="password" class="form-control" id="exampleInputEmail1" name="passowrd" placeholder="Enter your project title ..">
                                    </div>
                                    
                                    <input type="hidden" name="action" value="updateuser">
                                
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
        <script src="/dashassets/vendor/select2/select2.min.js"></script>


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
@endsection


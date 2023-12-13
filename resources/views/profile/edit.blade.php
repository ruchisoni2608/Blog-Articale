@extends('layout.main')
@section('styles')
 <style type="text/css">
   /* .dz-preview .dz-image img{
       width: 100% !important;
       height: 100% !important;
       object-fit: cover;
    } */
    /* .dz-preview .dz-image {
    float: left;
    margin-right: 10px; /* Adjust this margin as needed */
    } */
    </style>
@endsection
@section('content')
    <!-- Your dashboard content goes here -->
    <div class="row">
        <div class="edit-profile">
            <div class="row">

                <div class="col-xl-10 content">
                   
                 <form action="{{ route('profile.update', $user->id) }}"
                        method="post" enctype="multipart/form-data" class='dropzone' id="profilePhotoDropzone">
                        @csrf
                        @method('PUT')
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">Edit Profile</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#"
                                    data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                    class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                        class="fe fe-x"></i></a></div>
                        </div>
                        <!-- Hidden input for user ID -->
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                          
                     

                        <div class="card-body">
                              <!-- Display existing profile photo if it exists -->
                        @if ($user->profile_photo)
                        <div class="mb-3">
                              <label class="form-label">Profile Photo</label><br>
                            <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" style="max-width: 200px;" class="mt-2">
                        </div>
                        @endif

                       
                      <div id="dropzonePreview" class="dz-message needsclick md-3">
                            <!-- Dropzone previews will be displayed here -->
                            <span class="note needsclick">Drop files here or click to upload.</span>
                        </div>

                        
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">First Name</label>
                                        <input class="form-control" type="text" name="name"
                                            value="{{ old('name', $user->name) }}">
                                           
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email address</label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{ old('email', $user->email) }}">
                                    </div>
                                </div>


                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Designation</label>
                                        <input class="form-control" type="text"
                                            value="{{ old('designation', $user->designation) }}" name="designation">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Bio</label>

                                        <textarea class="form-control" name="bio" rows="5">{{ old('bio', $user->bio) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Website links</label>
                                        <input class="form-control" type="text" name="website" id="website"
                                            class="form-control" value="{{ old('website', $user->website) }}">
                                    </div>
                                </div>
                                   {{-- <!-- Display existing profile photo if it exists -->
                               @if ($user->profile_photo)
                                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" style="max-width: 200px;" class="mt-2">
                                @endif  --}}
                                {{-- <input type="hidden" name="profile_photo" id="profilePhoto" value="{{ asset('storage/images/' . $user->profile_photo) }}"> <!-- Hidden input for profile photo --> --}}

                     
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" id="submitBtn" type="submit">Update profile</button>
                        </div>
                        
                    </form>
                    <!-- Container-fluid Ends-->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<!-- CSS -->
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
// Define your CSRF token
var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("#profilePhotoDropzone", {
        maxFilesize: 2, // 2 MB
        acceptedFiles: ".jpeg,.jpg,.png,.pdf",
        addRemoveLinks: true,
        clickable: true,
        enqueueForUpload: true,
        previewsContainer: "#dropzonePreview", // Specify the container for previews
        previewTemplate: `
        <div class="dz-preview dz-file-preview" style="float: left; margin-right: 10px;">
        <div class="dz-heading">Profile Photo</div>
        <img data-dz-thumbnail />
        </div>
        `,
    
   // paramName: "profile_photo",
    init: function () {
       
        $.ajax({
            url: '{{ route("profile.update", $user->id) }}', // Modify this route to match your update route
            type: 'get',
            dataType: 'json',
            success: function (response) {
                $.each(response, function (key, value) {
                    var mockFile = { name: value.name, size: value.size };

                    myDropzone.emit("addedfile", mockFile);
                    myDropzone.emit("thumbnail", mockFile, value.path);
                    myDropzone.emit("complete", mockFile);
                });
            }
        });
        
    }
});

myDropzone.on("sending", function (file, xhr, formData) {
    formData.append("_token", CSRF_TOKEN);
});

myDropzone.on("success", function (file, response) {
    if (response.success === 1) {
        // Assuming the response object contains the uploaded file's name
        var uploadedFileName = response.file_name;

        // Store the uploaded file name in the hidden input field
        document.querySelector("#profilePhoto").value = uploadedFileName;
    }
});

</script>

@endsection

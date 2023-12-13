@extends('layout.main')
@section('styles')


<style>

    /* for switch button */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
         .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }
        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
        .form-group{
            margin-bottom: 15px;
        }
    </style>
@endsection
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2 class="text-center">Add Blog Article</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('blogarticles.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif


<form action="{{ route('blogarticles.store') }}" method="POST" enctype="multipart/form-data" id="singleFileUpload">
   @csrf

         <div class="dz-message needsclick"><i class="icon-cloud-up"></i>
                        <h6>Drop files here or click to upload.</h6>
                      </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label> Title:</label>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Status:</strong><br>
                    <label class="switch">
                        <input type="checkbox" name="status" value="1">
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <div class="col-form-label">
                    <label>Blog Category:</label>
                    <div class="custom-select">
                        <select class="form-select" id="exampleFormControlSelect9" name="category_id">
                            <option value="" disabled selected>Select</option>
                            @foreach ($blogcategories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Images:</strong>
                   <input type="file" name="image"  />
                </div>
            </div>


            <!-- {{-- <form class="dropzone" id="singleFileUpload" action="/upload.php">
                <div class="dz-message needsclick"><i class="icon-cloud-up"></i>
                <h6>Drop files here or click to upload.</h6><span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                </div>
            </form> --}} -->


            <button type="submit" id="submitBtn" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    CKEDITOR.replace("editor1");
</script>

<script>
       Dropzone.autoDiscover = false;

    // Check if Dropzone has not already been attached to the element
    if (typeof Dropzone !== "undefined" && !$("#singleFileUpload").hasClass("dz-clickable")) {
        $(document).ready(function () {
            //Dropzone.autoDiscover = false;

            var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get the CSRF token

            var myDropzone = new Dropzone("#singleFileUpload", {
                url: "{{ route('blogarticles.store') }}",
                paramName: "image",
                maxFilesize: 2,
                acceptedFiles: ".jpg, .jpeg, .png, .gif",
                addRemoveLinks: true,
                dictDefaultMessage: "Drop your images here or click to select.",
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Set the CSRF token as a header
                },
              autoProcessQueue: false,
                init: function () {
                    var myDropzone = this;

                    // Handle successful file uploads
                    this.on('success', function (file, response) {
                        // Handle success here if needed
                        console.log('Image uploaded successfully:', response);
                    });

                    // Handle errors during file uploads
                    this.on('error', function (file, errorMessage) {
                        // Handle errors here if needed
                        console.error('Error while uploading:', errorMessage);
                    });
                }
            });

            $("#submitBtn").click(function (e) {
                e.preventDefault();
                myDropzone.processQueue();
            });
        });
    } else {
        console.error('Dropzone is already attached to the element.');
    }
</script>



@endsection

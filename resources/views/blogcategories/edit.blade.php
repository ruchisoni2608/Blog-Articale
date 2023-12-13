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

        .form-group {
            margin-bottom: 15px;
        }
    </style>
@endsection
@section('content')
    <div class="container mt-2">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2 class="text-center">Add Blog Category</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('blogcategories.index') }}"> Back</a>
                </div>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif


        <form action="{{ route('blogcategories.update', $blogcategory->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Name:</strong>
                        <input type="text" name="name" class="form-control" value="{{ $blogcategory->name }}">

                    </div>
                </div>



                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Description:</strong>
                        <textarea id="editor1" name="description" cols="30" rows="10">{{ strip_tags($blogcategory->description) }}</textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">
                        <strong> Status:</strong><br>
                        <label class="switch">

                            <input type="checkbox" name="status" value="1"
                                {{ $blogcategory->status ? 'checked' : '' }}>

                            <span class="slider round"></span>
                        </label>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>

        </form>


    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            CKEDITOR.replace('editor1', {
                on: {
                    change: function() {
                        updateTextarea();
                    }
                }
            });
        });
        // Function to update the original textarea with CKEditor content
        function updateTextarea() {
            console.log("Updating textarea...");
            var editor = CKEDITOR.instances.editor1;
            console.log("Editor instance:", editor);
            if (editor) {
                var content = editor.getData();
                // Set the content in the original textarea
                document.getElementById('editor1').value = content;
                console.log('Content in textarea:', content);
            }
        }
    </script>
@endsection

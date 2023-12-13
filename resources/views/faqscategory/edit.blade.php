@extends('layout.main')
@section('styles')
    <style>
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
                    <h2 class="text-center">Add FAQS</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('faqs.index') }}"> Back</a>
                </div>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('faqs.update', $faq->id) }}" method="POST">
            {{ csrf_field() }}
            @method('PUT')


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Question Title:</strong>
                        <input type="text" name="title" class="form-control" value="{{ $faq->title }}">

                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Question Answer:</strong>
                        <textarea id="editor1" name="answer" cols="30" rows="10">{!! $faq->answer !!}</textarea>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">
                        <strong> FAQ Category:</strong>
                        <input type="text" name="category" class="form-control" value="{{ $faq->category }}">

                    </div>
                </div>


                {{-- <button type="submit" id="submitBtn" class="btn btn-primary ml-3">Submit</button> --}}


                <button type="submit" id="submitBtn" class="btn btn-primary ml-3">Submit</button>
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

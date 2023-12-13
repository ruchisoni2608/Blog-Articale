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
                    <h2 class="text-center">Add FAQ Category</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('faqscategory.index') }}"> Back</a>
                </div>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif


        <form action="{{ route('faqscategory.store') }}" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Name:</strong>
                        <input type="text" name="category" class="form-control" placeholder="FAQ category">

                    </div>
                </div>




                {{-- <button type="submit" id="submitBtn" class="btn btn-primary ml-3">Submit</button> --}}


                <button type="submit" id="submitBtn" class="btn btn-primary ml-3">Submit</button>
            </div>

        </form>


    </div>
@endsection
@section('scripts')
@endsection

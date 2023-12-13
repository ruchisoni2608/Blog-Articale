@extends('layout.main')
@section('styles')
    <style>
        .table td {

            width: 97px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Blog Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('blogcategories.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            {{-- <th>No</th> --}}
            <th>Name</th>
            {{-- <th>Short Description</th> --}}
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($blogcategories as $item)
            <tr>
                {{-- <td>{{ ++$i }}</td> --}}
                <td>{{ $item->name }}</td>
                {{-- <td>{{ strip_tags($item->description) }}</td> --}}
                <td>
                    @if ($item->status == 1)
                        Active
                    @else
                        Inactive
                    @endif
                </td>
                <td>
                    <form action="{{ route('blogcategories.destroy', $item->id) }}" method="POST">

                        {{-- <a class="btn btn-info" href="{{ route('blogcategories.show',$item->id) }}">Show</a> --}}

                        <a class="btn btn-primary" href="{{ route('blogcategories.edit', $item->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

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
                <h2>Blog Article</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('blogarticles.create') }}"> Create New Article</a>
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
            <th>Image</th>
            <th>Name</th>
            {{-- <th>Short Description</th> --}}
            <th>Status</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        @foreach ($blogarticles as $item)
            <tr>
                <td>
                    <div class="product-images">

                        <img src="{{ asset('images/' . $item->image) }}" alt="Image" width="100px" height="100px">

                    </div>
                </td>

                <td>{{ $item->title }}</td>
                {{-- <td>{{ strip_tags($item->description) }}</td> --}}
                <td>
                    @if ($item->status == 1)
                        Active
                    @else
                        Inactive
                    @endif
                </td>
                <td>
                    @foreach ($blogcategories as $category)
                        @if ($category->id == $item->category_id)
                            {{ $category->name }}
                        @endif
                    @endforeach
                </td>
                <td>
                    <form action="{{ route('blogarticles.destroy', $item->id) }}" method="POST">

                        {{-- <a class="btn btn-info" href="{{ route('blogcategories.show',$item->id) }}">Show</a> --}}

                        <a class="btn btn-primary" href="{{ route('blogarticles.edit', $item->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

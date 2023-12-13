@extends('layout.main')
@section('styles')
    <style>

    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="faq-wrap">

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="text-center">
                        <h2>FAQ Category</h2>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">

                        {{-- <div class="card-header pb-0">
                            <h5 class="mb-3 text-center">FAQ</h5>
                        </div> --}}
                        <div class="card-body">
                            <div class="dt-ext table-responsive">
                                <table class="display" id="responsive">

                                    <thead>
                                        <div class="pull-left">
                                            <a class="btn btn-primary" href="{{ route('faqscategory.create') }}"> Create
                                                Category
                                            </a>
                                        </div>
                                        <div class="pull-right">
                                            <a class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Create/Edit
                                                Category
                                            </a>
                                        </div>

                                        <tr>
                                            <th>id</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach ($faqcategory as $item)
                                            <tr>
                                                {{-- <td>{{ $item->id }}</td> --}}
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item->category }}</td>


                                                <td>

                                                    <form action="{{ route('faqscategory.destroy', ['id' => $item->id]) }}"
                                                        method="POST">

                                                        {{-- <a class="btn btn-info" href="{{ route('blogcategories.show',$item->id) }}">Show</a> --}}

                                                        <a class="btn btn-primary"
                                                            href="{{ route('faqscategory.edit', $item->id) }}"> Edit</a>

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot> --}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('faqscategory.create')
@endsection
@section('scripts')
    <script>
        var faqsCreateRoute = "{{ route('faqscategory.create') }}";
    </script>
@endsection

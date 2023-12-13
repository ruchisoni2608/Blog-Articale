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
                        <h2>FAQ</h2>
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
                                <div class="pull-right">
                                    <a class="btn btn-success" data-bs-toggle="modal" data-target="#faqModal"
                                        data-action="create">

                                        Create/Edit
                                        FAQ
                                    </a>


                                </div>
                                <table class="display" id="custom-button">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($faqs as $item)
                                            <tr>
                                                {{-- <td>{{ ++$i }}</td> --}}
                                                <td>{{ $item->title }}</td>

                                                <td>
                                                    {{ $item->category }}
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary" data-target="#productModal"
                                                        data-action="edit" data-product-id="{{ $item->id }}"
                                                        data-route="{{ route('faqs.edit', $item->id) }}">
                                                        Edit model {{ $item->id }}
                                                    </button>

                                                    <form action="{{ route('faqs.destroy', ['id' => $item->id]) }}"
                                                        method="POST">
                                                        <a class="btn btn-primary"
                                                            href="{{ route('faqs.edit', $item->id) }}"> Edit</a>

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

    {{-- @include('faqs.create') --}}
    <!-- Create Button -->


    <!-- Rest of your FAQs list -->



    <!-- Modal -->
    <div class="modal fade" id="faqModal" tabindex="-1" role="dialog" aria-labelledby="faqModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal content will be loaded here -->
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var faqsCreateRoute = "{{ route('faqs.create') }}";
    </script>
    <script>
        $(document).ready(function() {
            var faqModal = $('#faqModal');
            var createEditFaqForm = $('#createEditFaqForm');

            // Handle the Edit button click event
            $('[data-action="edit"]').on('click', function() {

                var button = $(this);
                var modal = $('#productModal');
                var action = button.data('action');
                var route = button.data('route');

                // Load the form via AJAX
                $.ajax({
                    url: route,
                    type: 'GET',
                    success: function(response) {
                        modal.find('.modal-content').html(response);
                        faqModal.modal('show'); // Show the modal
                    },
                    error: function(xhr) {
                        // Handle errors
                    }
                });
            });

            // Handle form submission via AJAX
            createEditFaqForm.submit(function(e) {
                alert("333");
                e.preventDefault();
                var form = $(this);

                // Handle form submission via AJAX
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: form.serialize(),
                    success: function(response) {
                        faqModal.modal('hide');
                        // Handle success, e.g., refresh FAQs list
                    },
                    error: function(xhr) {
                        // Handle errors, display validation errors, etc.
                    }
                });
            });
        });
    </script>
@endsection

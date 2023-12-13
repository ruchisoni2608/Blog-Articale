@extends('layout.main')
@section('styles')
    <style>
        .faq-icons {
            margin: 14px;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="faq-wrap">

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>FAQ</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('faqs.create') }}"> Create FAQ</a>
                    </div>
                </div>
            </div>
            <div class="row">

                {{-- <div class="col-xl-4 xl-100 box-col-12">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <div class="media faq-widgets">
                                <div class="media-body">
                                    <h4>Articles</h4>
                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                        dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                        nascetur ridiculus mus.</p>
                                </div><i data-feather="file-text"></i>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-xl-4 xl-50 col-md-6 box-col-6">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <div class="media faq-widgets">
                                <div class="media-body">
                                    <h4>Knowledgebase</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                        dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                        nascetur ridiculus mus.</p>
                                </div><i data-feather="book-open"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 xl-50 col-md-6 box-col-6">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <div class="media faq-widgets">
                                <div class="media-body">
                                    <h4>Support</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                        dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                        nascetur ridiculus mus.</p>
                                </div><i data-feather="aperture"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="header-faq">
                        <h3 class="mb-0">Quick Questions are answered</h3>
                    </div>
                    <div class="row default-according style-1 faq-accordion" id="accordionoc">
                        <div class="col-xl-8 xl-60 col-lg-6 col-md-7 box-col-7">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapseicon" aria-expanded="false"
                                            aria-controls="collapseicon"><i data-feather="help-circle"></i> Integrating
                                            WordPress with Your Website?</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseicon" aria-labelledby="collapseicon"
                                    data-parent="#accordionoc">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula
                                            eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient
                                            montes, nascetur ridiculus mus.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapseicon2" aria-expanded="false"
                                            aria-controls="collapseicon2"><i data-feather="help-circle"></i> WordPress Site
                                            Maintenance ?</button>
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseicon2" data-parent="#accordionoc">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula
                                            eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient
                                            montes, nascetur ridiculus mus.</p>
                                    </div>
                                </div>
                            </div>

                            @foreach ($faqs as $item)
                                <div class="faq-title">
                                    <h6>{{ $item->category }}</h6>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapseicon5" aria-expanded="false"><i
                                                    data-feather="help-circle"></i> {{ $item->title }}</button>
                                            <div class="faq-icons">
                                                <a href="{{ route('faqs.edit', $item->id) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="javascript:void(0);" onclick="deleteFAQ({{ $item->id }})">
                                                    <i class="fa fa-trash "></i>
                                                </a>
                                            </div>
                                        </h5>

                                    </div>
                                    <div class="collapse" id="collapseicon5" aria-labelledby="collapseicon5"
                                        data-parent="#accordionoc">
                                        <div class="card-body">
                                            <p>{!! $item->answer !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function deleteFAQ(id) {
            if (confirm('Are you sure you want to delete this FAQ?')) {
                $.ajax({
                    type: 'DELETE',
                    url: "{{ route('faqs.destroy', ':id') }}".replace(':id', id),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            // Reload the page or update the UI as needed
                            window.location.reload(); // Reload the page
                        } else {
                            alert('Failed to delete the FAQ. Error: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('An error occurred while deleting the FAQ. Error: ');
                    }
                });
            }
        }
    </script>
@endsection

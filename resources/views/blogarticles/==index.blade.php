@extends('layout.main')
@section('styles')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="blog-single">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left mb-2">
                            <h2 class="text-center">Blog Article</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('blogarticles.create') }}"> Add Article</a>
                        </div>
                    </div>
                </div>

                @foreach ($blogarticles as $item)
                    <div class="blog-box blog-details">
                        <!-- <div class="card banner-wrraper"><img class="img-fluid w-100 bg-img-cover" src="../assets/images/blog/blog-single.jpg" alt="blog-main"></div> -->
                        <div class="card banner-wrraper">
                            <img class="img-fluid w-100 bg-img-cover" src="{{ asset('images/' . $item->image) }}"
                                alt="blog-main">
                        </div>
                        <div class="card">

                            <div class="card-body">
                                <div class="blog-details">
                                    <ul class="blog-social">
                                        <li>25 July 2018</li>

                                        <li><i class="icofont icofont-ui-chat"></i>
                                            @if ($item->status == 1)
                                                Active
                                            @else
                                                Inactive
                                            @endif
                                        </li>
                                    </ul>
                                    <h4>
                                        {{ $item->title }}
                                    </h4>
                                    <div class="single-blog-content-top">

                                        <p><strong>{!! $item->content !!}</strong></p>
                                    </div>



                                    <h3>
                                        <p>Blog Category:
                                            @foreach ($blogcategories as $category)
                                                @if ($category->id == $item->category_id)
                                                    {{ $category->name }}
                                                @endif
                                            @endforeach
                                        </p>
                                    </h3><br>



                                    <div class="btn-group" role="group" aria-label="Edit and Delete Buttons">

                                        <form action="{{ route('blogarticles.destroy', $item->id) }}" method="POST">
                                            {{-- <a href="{{ route('blogcategories.show', $item->id) }}" class="btn btn-info">Show</a> --}}
                                            <a href="{{ route('blogarticles.edit', $item->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                @endforeach
            </div>
        </div>

    </div>
    </div>
    </div>
@endsection

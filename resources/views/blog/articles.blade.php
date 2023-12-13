@extends('layout.main')
@section('styles')
    <style>
        .home-demo .item {
            background: #6362e7;
        }

        .home-demo h2 {
            color: #FFF;
            text-align: center;
            padding: 3rem 0;
            margin: 0;
            font-style: italic;
            font-weight: 300;
        }

        .home-demo h4 {
            color: #FFF;
            text-align: center;
            padding-bottom: 39px;
            font-style: italic;
            font-weight: 100;
        }

        .image-container {
            width: 460px;
            height: 322px;
            overflow: hidden;
            /* Hide any overflow if the image dimensions exceed the container */
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* This ensures the image covers the container while maintaining aspect ratio */
        }
    </style>
@endsection
@section('content')
    <div class="row">
        @foreach ($articles as $article)
            <div class="col-sm-6 col-xl-3 box-col-6 dash-xl-50">
                <div class="card">

                    <div class="blog-box blog-grid">
                        <div class="blog-wrraper">
                            <a href="{{ route('blogarticles.show', $article->id) }}">
                                <div class="image-container">
                                    <img class="img-fluid top-radius-blog" src="{{ asset('images/' . $article->image) }}"
                                        alt="{{ $article->title }}">
                                </div>
                            </a>
                        </div>
                        <div class="blog-details-second">
                            <div class="blog-post-date"><span class="blg-month">apr</span><span class="blg-date">10</span>
                            </div>
                            <a href="{{ route('blogarticles.show', $article->id) }}">
                                <h6 class="blog-bottom-details">{{ $article->title }}</h6>
                            </a>
                            <p>{!! $article->content !!}</p>
                            <div class="detail-footer">
                                <ul class="sociyal-list">
                                    <li><i class="fa fa-user-o"></i>admin</li>
                                    <li><i class="fa fa-comments-o"></i>5</li>
                                    <li><i class="fa fa-thumbs-o-up"></i>2 like</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach

    </div>
@endsection

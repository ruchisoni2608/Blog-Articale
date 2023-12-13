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
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="text-center">Blog Category</h5>
                </div>

                {{-- <a href="{{ route('category.articles', $category->id) }}" class="category-link"> --}}

                <div class="home-demo">
                    <h3></h3>
                    <div class="owl-carousel owl-theme">

                        @foreach ($blogcategories as $category)
                            <div class="item "> <!-- Add the "category-box" class here -->
                                <h2>{{ $category->name }}</h2>
                                <a href="{{ route('articlesByCategory', ['categoryId' => $category->id]) }}">
                                    <h4>Articles</h4>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            // Owl Carousel
            var owl = $(".owl-carousel");
            owl.owlCarousel({
                items: 3,
                margin: 10,
                loop: true,
                nav: true
            });
        });
    </script>
@endsection

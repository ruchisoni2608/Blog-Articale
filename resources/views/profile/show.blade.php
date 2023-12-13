@extends('layout.main')

@section('content')
    <div class="user-profile">
        <div class="row">
            <!-- user profile header start-->
            <div class="col-sm-12">

                <div class="card profile-header"><img class="img-fluid bg-img-cover"
                        src="{{ asset('images/' . $user->profile_photo) }}" alt="111">
                    <div class="profile-img-wrrap">
                        @if ($user->profile_photo)
                            <img src="{{ asset('images/' . $user->profile_photo) }}" alt="1222Profile Photo"
                                class="img-fluid">
                        @endif

                    </div>
                    <div class="userpro-box">
                        <div class="img-wrraper">
                            <div class="avatar">
                                @if ($user->profile_photo)
                                    <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="12333Profile Photo"
                                        class="img-fluid">
                                @endif
                                 @php  
                                    $user = Auth::user();
                                @endphp
                            </div><a class="icon-wrapper" href="{{ route('profile.edit',$user->id) }}"><i class="icofont icofont-pencil-alt-5"></i></a>
                        </div>
                        <div class="user-designation">
                            <div class="title"><a target="_blank" href="">
                                    <h4><strong>{{ $user->name }}</strong></h4>
                                    <h6><strong>{{ $user->designation }}</strong></h6>
                                </a></div>
                            <div class="social-media">
                                <ul class="user-list-social">
                                    <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://accounts.google.com/"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="https://dashboard.rss.com/auth/sign-in/"><i class="fa fa-rss"></i></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- user profile header end-->
            <div class="col-xl-4 col-lg-12 col-md-5 xl-35">
                <div class="default-according style-1 faq-accordion job-accordion">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="p-0">
                                        <button class="btn btn-link ps-0" data-bs-toggle="collapse"
                                            data-bs-target="#collapseicon2" aria-expanded="true"
                                            aria-controls="collapseicon2">About Me</button>
                                    </h5>
                                </div>
                                <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2"
                                    data-parent="#accordion">
                                    <div class="card-body post-about">
                                        <ul>
                                            <li>
                                                <div class="icon"><i data-feather="briefcase"></i></div>
                                                <div>
                                                    <h5>Full Name </h5>
                                                    <p> {{ $user->name }}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon"><i data-feather="book"></i></div>
                                                <div>
                                                    <h5>Emil Address</h5>
                                                    <p> {{ $user->email }}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon"><i data-feather="heart"></i></div>
                                                <div>
                                                    <h5>Role Status</h5>
                                                    <p>
                                                        @if ($user->role == 1)
                                                            Admin
                                                        @else
                                                            User
                                                        @endif
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon"><i data-feather="map-pin"></i></div>
                                                <div>
                                                    <h5>Bio</h5>
                                                    <p> {{ $user->bio }}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon"><i class="fa fa-dribbble m-r-5"></i></div>
                                                <div>
                                                    <h5>Website link</h5>
                                                    <p> {{ $user->website }}</p>
                                                </div>
                                            </li>

                                        </ul>
                                        <div class="social-network theme-form"><span class="f-w-600">Social Networks</span>
                                            <button class="btn social-btn btn-fb mb-2 text-center"><i
                                                    class="fa fa-facebook m-r-5"></i>Facebook</button>
                                            <button class="btn social-btn btn-twitter mb-2 text-center"><i
                                                    class="fa fa-twitter m-r-5"></i>Twitter</button>
                                            <button class="btn social-btn btn-google text-center"><i
                                                    class="fa fa-dribbble m-r-5"></i>Dribbble</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <!-- user profile fifth-style end-->
            <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="pswp__bg"></div>
                <div class="pswp__scroll-wrap">
                    <div class="pswp__container">
                        <div class="pswp__item"></div>
                        <div class="pswp__item"></div>
                        <div class="pswp__item"></div>
                    </div>
                    <div class="pswp__ui pswp__ui--hidden">
                        <div class="pswp__top-bar">
                            <div class="pswp__counter"></div>
                            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                            <button class="pswp__button pswp__button--share" title="Share"></button>
                            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                            <div class="pswp__preloader">
                                <div class="pswp__preloader__icn">
                                    <div class="pswp__preloader__cut">
                                        <div class="pswp__preloader__donut"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                            <div class="pswp__share-tooltip"></div>
                        </div>
                        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                        <div class="pswp__caption">
                            <div class="pswp__caption__center"></div>
                        </div>
                    </div>
                    <!-- Container-fluid Ends-->
                </div>
            </div>
        </div>
    </div>
@endsection

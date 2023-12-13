<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Registration</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }} ">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }} ">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }} ">

    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }} ">
</head>

<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="loader">
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-ball"></div>
        </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <section>
        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="login-card">
                        <form class="theme-form login-form" action="{{ route('register.custom') }}" method="POST">
                            @csrf
                            @method('POST')
                            <h4>Create your account</h4>
                            <h6>Enter your personal details to create account</h6>
                            <div class="form-group">
                                <label>Your Name</label>
                                <div class="small-group">
                                    <div class="input-group"><span class="input-group-text"><i
                                                class="icon-user"></i></span>
                                        <input class="form-control" type="text" required=""
                                            placeholder="Fist Name" name="name">
                                    </div>
                                    <!-- {{-- <div class="input-group"><span class="input-group-text"><i
                                                class="icon-user"></i></span>
                                        <input class="form-control" type="email" required=""
                                            placeholder="Last Name">
                                    </div> --}} -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                    <select id="role" name="role" class="form-control">
                                        <option value="1">Admin</option>
                                        <option value="2">User</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="input-group"><span class="input-group-text"><i
                                            class="icon-email"></i></span>
                                    <input class="form-control" type="email" name="email" required=""
                                        placeholder="Test@gmail.com">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control" type="password" name="password" required=""
                                        placeholder="*********">
                                    <div class="show-hide"><span class="show"> </span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="checkbox1" name="remember" type="checkbox">
                                    <label class="text-muted" for="checkbox1">Agree with <span>Privacy Policy
                                        </span></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                            </div>
                            <div class="login-social-title">
                                <h5>signup with</h5>
                            </div>
                            <div class="form-group">
                                <ul class="login-social">
                                    <li><a href="https://www.linkedin.com/login" target="_blank"><i
                                                data-feather="linkedin"></i></a></li>
                                    <li><a href="https://twitter.com" target="_blank"><i data-feather="twitter"></i></a>
                                    </li>
                                    <li><a href="https://www.facebook.com" target="_blank"><i
                                                data-feather="facebook"></i></a></li>
                                    <li><a href="https://www.instagram.com/login" target="_blank"><i
                                                data-feather="instagram"> </i></a></li>
                                </ul>
                            </div>
                            <p>Already have an account?<a class="ms-2" href="{{ route('login.custom') }}">Sign in</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-wrapper end-->
    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }} "></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }} "></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }} "></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }} "></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/config.js') }} "></script>

    <!-- Theme js-->
    <script src="{{ asset('assets/js/script.js') }} "></script>
    <!-- login js-->
    <!-- Plugin used-->
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from modinatheme.com/listico/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Sep 2019 03:56:17 GMT -->

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ======== Page title ============ -->
    <title>Listico - Listing & Directory HTML Template</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{ asset('client/assets/img/favicon.png') }}">

    <!-- ===========  All Stylesheet ================= -->
    <!--  fontawesome css plugins -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/fontawesome.min.css') }}">
    <!--  slick css plugins -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/slick.css') }}">
    <!--  rangeSlider css plugins -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/ion.rangeSlider.min.css') }}">
    <!--  slick theme css plugins -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/slick-theme.css') }}">
    <!--  magnific-popup css plugins -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/magnific-popup.css') }}">
    <!--  owl carosuel css plugins -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/owl.carousel.min.css') }}">
    <!--  owl theme css plugins -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/owl.theme.css') }}">
    <!--  meanmenu css plugins -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/meanmenu.min.css') }}">
    <!--  Bootstrap css plugins -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/bootstrap.min.css') }}">
    <!-- template main style css file -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/style.css') }}">
    <!-- template responsive css stylesheet -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/responsive.css') }}">
    <link href="{{ asset('client/assets/css/material-kit.css?v=2.0.5') }}" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="theme_body">

    <!-- preloader element started -->
    <div class="loader-wrap">
        <div class="pin"></div>
        <div class="pulse"></div>
    </div>
    <!-- preloader element end -->
    <!-- header section start -->
    <header class="header-section">
        <!-- top bar -->
        <div class="top-bar-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-8 col-12">
                        <div class="top-bar-left">
                            <span>He Thong Tim Kiem Vi Tri Theo Dinh Vi GPS</span>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-4 col-12 text-md-right">
                        <div class="top-bar-right">
                            <div class="user-setting">
                                <ul>
                                    @if(Auth::user())
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                                            href="javascript:void(0)">{{ Auth::user()->user_name }}</a>
                                        <ul class="dropdown-menu dropdown-menu-right dropdown-danger">
                                            <a class="dropdown-item" href=""><i class="nc-icon nc-single-02"></i>&nbsp;
                                                Profile</a>
                                            <!-- <a class="dropdown-item" href="blog-posts.html"><i
                                        class="nc-icon nc-bullet-list-67"></i>&nbsp; My posts</a> -->
                                            <a class="dropdown-item" href="/logout"><i
                                                    class="nc-icon nc-bookmark-2"></i>&nbsp;
                                                Logout</a>
                                        </ul>
                                    </li>
                                    @else
                                    <li><a href="/login"><i class="fas fa-sign-out-alt"></i>Dang Nhap</a></li>
                                    <li><a href="/register"><i class="fas fa-user"></i>Dang ky</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main menu -->
        <div class="main-header">
            <div class="container">
                <div class="row">



                    <div class="col-12">
                        <div class="responsive-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header section end -->


    @yield('content')
    <!-- footer section wrapper start -->
    <!-- footer section wrapper end -->



    <!--  ALl JS Plugins
    ====================================== -->
    <script src="{{ asset('client/assets/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('client/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/scrollUp.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/rater.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/meanmenu.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/main.js') }}"></script>
    <script>
        $('#located').click(function(e){
            e.preventDefault();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                $('#gps').val("Geolocation is not supported by this browser.");
            }

            function showPosition(position) {
                $('#gps').val(position.coords.latitude +"," + position.coords.longitude);
            }
        });
    </script>
</body>

<!-- Mirrored from modinatheme.com/listico/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Sep 2019 03:56:17 GMT -->

</html>

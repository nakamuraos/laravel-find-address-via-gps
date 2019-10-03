<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from modinatheme.com/listico/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Sep 2019 03:56:17 GMT -->

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ======== Page title ============ -->
    <title>@lang('header.title')</title>

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

<body class="">

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
                            <h3 class="text-white"><b>@lang('header.title')</b></h3>
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
                                    <li><a href="/login"><i class="fas fa-sign-out-alt"></i>@lang('login.login')</a></li>
                                    <li><a href="/register"><i class="fas fa-user"></i>@lang('register.register')</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header section end -->

    @yield('content')

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
        });

        function showPosition(position) {
            $('#gps').val(position.coords.latitude +"," + position.coords.longitude);
            placeMarker({lat: position.coords.latitude,lng: position.coords.longitude}, map, false);
        }

        $('#gps').keyup(delay(function(e){
            var val = this.value;
            if(val == '') {
                $('#listPlaces').css('display','none');
            } else {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(e){
                        var location = e.coords.latitude +"," + e.coords.longitude;
                        //var data = findplacefromtext(location, val);
                        $.get("/api/address/types?type="+val, function(d, status){
                            var data = d.data;
                            var list = '<div class="list-group" style="padding:0;"><a class="list-group-item list-group-item-action"><b>'+(data.length<=0?'@lang('home.noresults')':'@lang('home.resultsin'):')+'</b></a>';
                            Object.keys(data).forEach(function(key) {
                                list+='<a class="list-group-item list-group-item-action" onclick="choosePlace(this);" data-addresstype="'+key+'">'+data[key]+'</a>';
                            });
                            list+='</div>';
                            $('#listPlaces').css('display','block');
                            $('#listPlaces').css('margin-top', '-10px');
                            $('#listPlaces').css('width', $('#gps').width()+22);
                            $('#listPlaces').html(list);
                            });
                        
                    }, function(error) {
                        if (error.code == error.PERMISSION_DENIED) {
                            $('#myModal').modal();
                        }
                    });
                }
            }
        }, 200));
        function delay(callback, ms) {
            var timer = 0;
            return function() {
                var context = this, args = arguments;
                clearTimeout(timer);
                timer = setTimeout(function () {
                callback.apply(context, args);
                }, ms || 0);
            };
        }
        async function findplacefromtext(location, input) {
            var data = '';
            await $.get("/api/google/findplacefromtext?location="+location+"&input="+input, function(d, status){
                data = JSON.parse(d);
            });
            return data;
        }
        function getLocation() {
            var location = '';
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(e){
                    location = e.coords.latitude +"," + e.coords.longitude;
                }, function(error) {
                    if (error.code == error.PERMISSION_DENIED) {
                        $('#myModal').modal();
                    }
                });
            }
            return location;
        }
        function choosePlace(e) {
            $('#gps').val(e.textContent);
            var location = e.getAttribute('data-location');
            $('#gps').attr('data-location', location);
            $('#listPlaces').css('display','none');
            placeMarker({lat: parseFloat(location.split(',')[0]), lng: parseFloat(location.split(',')[1])}, map, false);
        }
    </script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initMap&language={{ Config::get('app.locale') }}" async defer></script> -->
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <h4 class="modal-title">@lang('error.gps_permission_denied')</h4>
                </div>
                <div class="modal-body">
                @lang('error.gps_permission_denied_desp')
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('error.close')</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <style>
        .list-group a {
            border: 1px solid #eee;
            border-top: 0;
        }
    </style>
</body>
</html>
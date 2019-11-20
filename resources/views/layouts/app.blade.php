<!DOCTYPE html>
<html lang="{{Config::get('app.locale')}}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('header.title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        var map, myloc, register, marker, popup, Popup, infowindow, myCircle;
        var mode_direction = 'DRIVING';
    </script>
</head>

<body>
    <div class="loader-wrap">
        <div class="pin"></div>
        <div class="pulse"></div>
    </div>
@if (isset($maps) && $maps === true)
@else
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="/">@lang('header.title')</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"
            style="outline: 0">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/maps">@lang('header.link_maps')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/explore">@lang('header.link_explore')</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
            @if(Auth::user())
                <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fa fa-bell"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-danger fade">
                        <li><a class="dropdown-item">No notification</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                        href="javascript:void(0)">{{Auth::user()->full_name}}</a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-danger fade">
                        <a class="dropdown-item" href="/account/profile"><i class="fa fa-address-card"></i> @lang('header.link_profile')</a>
                    @switch(Auth::user()->role->name)
                        @case('admin')
                        <a class="dropdown-item" href="/admin/user"><i class="fa fa-user"></i> @lang('header.link_manage_user')</a>
                            @break
                        @case('addressmanager')
                        <a class="dropdown-item" href="/admin/address"><i class="fa fa-list"></i> @lang('header.link_manage_address')</a>
                            @break
                        @default
                        <a class="dropdown-item" href="/manager/address/register"><i class="fas fa-plus"></i> @lang('header.link_register_address')</a>
                        <a class="dropdown-item" href="/manager/address"><i class="fa fa-list"></i> @lang('header.link_list_address')</a>
                    @endswitch
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> @lang('auth.logout')</a>
                    </ul>
                </li>
            @else
                <li class="nav-item"><a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> @lang('auth.login')</a></li>
                <li class="nav-item"><a class="nav-link" href="/register"><i class="fas fa-user"></i> @lang('auth.register')</a></li>
                <li class="nav-item"><a class="nav-link" onclick="loginRequired();"><i class="fas fa-plus"></i> @lang('header.link_register_address')</a></li>
            @endif
                <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fa fa-cog"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-danger fade">
                            <li><a class="dropdown-item" href="/welcome/en"><img src="/assets/fonts/US.svg" style="height:20px;width:20px"/> English</a></li>
                            <li><a class="dropdown-item" href="/welcome/vi"><img src="/assets/fonts/VN.svg" style="height:20px;width:20px"/> Vietnamese</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
@endif
@yield('content')
<footer class="footer-section @if (isset($maps)) d-none @else d-block @endif">
        <div class="footer-bottom-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-sm-12">
                        <span>©2019 rights reserved - Designed and Developed by Group26 - Hoang Van Thinh, Pham Thi Hien, Nguyen Van Nam</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        var lang = {!!json_encode(array_merge(app('translator')->getFromJson('home'), app('translator')->getFromJson('error'), app('translator')->getFromJson('auth')))!!};
        var uriPhoto = '{{config('files.uri.photo_encrypted')}}';
    </script>
    <script src="{{ asset('assets/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrollUp.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('assets/js/rater.min.js') }}"></script>
    <script src="{{ asset('assets/js/meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
@if (isset($maps))
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{config('googlemaps.key_maps')}}&callback=initMap&language={{Config::get('app.locale')}}"></script>
@endif
    <div id="modal"></div>
</body>
</html>
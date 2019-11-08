<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/admin/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/admin/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Manage Area
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('assets/admin/css/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/material-kit.css?v=2.0.5') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('assets/admin/demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="landing-page sidebar-collapse">
@if(session()->has("success"))
<div class="alert alert-secondary alert-dismissible fade show " style="position: fixed; z-index: 999; right: 40%; top: -40%;">
    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" role="img"
        style="width:30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
        class="svg-inline--fa fa-check-circle fa-w-16 fa-3x">
        <path fill="currentColor"
            d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"
            class=""></path>
    </svg>
    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
        <!-- <i class="nc-icon nc-simple-remove"></i> -->
        <i class="material-icons">close</i>
    </button>
    <span> {{ session("success") }}</span>
</div>
@endif
    <div class="fixed-top">
        <div class="navbar  navbar-expand-lg navbar-transparent navbar-color-on-scroll d-flex flex-column"
            color-on-scroll="100" id="sectionsNav">
            <div class="container-fluid">
                <div class="navbar-translate">
                    <h3 class="text-white"><b>Hệ thống tìm kiếm địa chỉ theo định vị</b></h3>
                </div>
                <div class="collapse navbar-collapse pr-5">
                    <ul class="navbar-nav ml-auto">
                    <!-- <li>
                        <form action="" method="GET" class="form-group form-inline bmd-form-group" id="search">
                            @csrf
                            <input type="search" value="{{ request()->search }}" name="search" class="form-control"
                                placeholder="Search">
                            <button class="btn btn-round btn-fab btn-raised btn-white">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </li> -->
                        <li class="nav-item dropdown ml-3">
                        @if(Auth::user())
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                                href="javascript:void(0)">{{ Auth::user()->user_name }}</a>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-danger">
                                <a class="dropdown-item" href=""><i class="nc-icon nc-single-02"></i>&nbsp; Profile</a>
                                <!-- <a class="dropdown-item" href="blog-posts.html"><i
                                        class="nc-icon nc-bullet-list-67"></i>&nbsp; My posts</a> -->
                                <a class="dropdown-item" href="/logout"><i class="nc-icon nc-bookmark-2"></i>&nbsp;
                                    Logout</a>
                            </ul>
                        @endif
                        </li>
                    </ul>
                </div>
            </div>
           
        </div>
    </div>
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('assets/img/breadcrumb_bg.jpg') }}')">
    </div>
    @yield('content')
    <footer class="footer footer-default " id="contact" style="padding-bottom:100px">
        <div class="container">
            <div class="row">
               
            </div>
        </div>
    </footer>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/admin/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/plugins/moment.min.js') }}"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="{{ asset('assets/admin/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('assets/admin/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/admin/js/material-kit.js?v=2.0.5x') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
        @stack("scripts")
</body>
</html>

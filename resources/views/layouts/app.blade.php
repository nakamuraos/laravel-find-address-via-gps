<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">

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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- preloader element started -->
    <div class="loader-wrap">
        <div class="pin"></div>
        <div class="pulse"></div>
    </div>
    <!-- preloader element end -->
    <!-- header section start -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <a class="navbar-brand" href="/">@lang('header.title')</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="outline: 0">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                @if(Auth::user())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                        href="javascript:void(0)">{{Auth::user()->full_name}}</a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-danger">
                        <a class="dropdown-item" href=""><i class="nc-icon nc-single-02"></i>&nbsp;
                            Profile</a>
                        <a class="dropdown-item" href="/logout"><i
                                class="nc-icon nc-bookmark-2"></i>&nbsp;
                            Logout</a>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="/registeraddress"><i class="fas fa-sign-out-alt"></i> Register Address</a></li>
                @else
                <li class="nav-item"><a class="nav-link" href="/login"><i class="fas fa-sign-out-alt"></i> @lang('login.title')</a></li>
                <li class="nav-item"><a class="nav-link" href="/register"><i class="fas fa-user"></i> @lang('register.title')</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#ModalLogin"><i class="fas fa-sign-out-alt"></i> Register Address</a></li>
                @endif
            </ul>
        </div>  
    </nav>
    <!-- header section end -->

    @yield('content')
        <!-- modal login-->

<div class="modal" id="ModalLogin" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Please log in Or register <a href="/register" class="text-danger">here</a></h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="/login" class="btn btn-success">Login now</a>
            </div>

        </div>

    </div>
</div>

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
        $('#gps').keyup(delay(function(e){
            var val = this.value;
            if(val == '') {
                $('#listTypes').css('display','none');
            } else {
                getLocation().then(() => {
                    $.get("/api/address/types?type="+encodeURI(val), function(d, status){
                        var list = display_types(d);
                        $('#listTypes').css('display','block');
                        $('#listTypes').css('margin-top', '-10px');
                        $('#listTypes').css('width', $('#gps').width()+29);
                        $('#listTypes').html(list);
                    });
                })
                .catch(e => {
                    if(e) console.log(e);
                })
            }
        }, 300));
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
        function display_types(d) {
            var data = d.success == false ? [] : d.data;
            var list = '<div class="list-group" style="padding:0;"><a class="list-group-item list-group-item-action"><b>'+(data.length<=0?'@lang('home.noresults')':'@lang('home.resultsin'):')+'</b></a>';
            Object.keys(data).forEach(function(key) {
                list+='<a class="list-group-item list-group-item-action" onclick="chooseType(this);" data-address="'+key+'">'+data[key]+'</a>';
            });
            list+='</div>';
            return list;
        }
        function display_addresses(d) {
            var data = d.success === false ? [] : d.data;
            var list = '<div class="list-group" style="padding:0;"><a class="list-group-item list-group-item-action"><b>'+(data.length<=0?'@lang('home.noresults')':'@lang('home.result'):')+'</b></a>';
            Object.keys(data).forEach(function(key) {
                list+='<a class="list-group-item list-group-item-action" data-id="'+data[key].id+'" data-location="'+data[key].location+'">'+data[key].name+'</a>';
            });
            list+='</div>';
            return list;
        }
        function getLocation(allowed = false) {
            return new Promise(function(resolve, reject){
                if (navigator.geolocation) {
                    var location = '';
                    navigator.permissions.query({name: 'geolocation'}).then(function(PermissionStatus) {
                        if(allowed === false && 'prompt' === PermissionStatus.state) {
                            $('#prompt_permission').modal();
                            return reject();
                        } else {
                            navigator.geolocation.getCurrentPosition(function(e){
                                return resolve([e.coords.latitude, e.coords.longitude]);
                            }, function(error) {
                                if (error.code == error.PERMISSION_DENIED) {
                                    $('#denied_permission').modal();
                                    return reject();
                                }
                            });
                        }
                    });
                } else {
                    return reject('Geolocation is not supported by this browser.');
                }

            });
        }
        function chooseType(e) {
            var val = e.textContent;
            $.get("/api/address/list?keyword="+val, function(d, status) {
                $('#gps').val(e.textContent);
                $('#gps').attr('data-addresstype', e.getAttribute('data-addresstype'));
                $('#listTypes').css('display','none');
                $('#listPlaces').html(display_addresses(d));
                $('#listPlaces').css('display','block');
            });
        }
    </script>
    <!-- permission denied -->
    <div class="modal fade" id="denied_permission" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('error.gps_permission_denied')</h4>
                </div>
                <div class="modal-body">
                    @lang('error.gps_permission_denied_desp')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('error.close')</button>
                </div>
            </div>
        </div>
    </div>
    <!-- permission prompt -->
    <div class="modal fade" id="prompt_permission" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('error.gps_permission_prompt')</h4>
                </div>
                <div class="modal-body">
                    @lang('error.gps_permission_prompt_desp')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('error.close')</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" onclick="getLocation(true);">@lang('error.grant')</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <style>
        .list-group .list-group-item {
            border: 1px solid #eee;
            border-top: 0;
        }
    </style>
</body>
</html>
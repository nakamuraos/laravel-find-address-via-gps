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
        var map, myloc, register, marker;
        var mode_direction = 'DRIVING';
    </script>
</head>

<body>
    <div class="loader-wrap">
        <div class="pin"></div>
        <div class="pulse"></div>
    </div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark @if (isset($maps) && $maps === true) fixed-top @else sticky-top @endif">
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
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                        href="javascript:void(0)">{{Auth::user()->full_name}}</a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-danger">
                    @switch(Auth::user()->role->name)
                        @case('admin')
                        <a class="dropdown-item" href="/admin/user"><i class="nc-icon nc-single-02"></i>&nbsp;
                            User manager</a>
                            @break
                        @case('addressmanager')
                        <a class="dropdown-item" href="/admin/address"><i class="nc-icon nc-single-02"></i>&nbsp;
                            Address manager</a>
                            @break
                        @default
                        <a class="dropdown-item" href="/manager/address"><i class="nc-icon nc-single-02"></i>&nbsp;
                            Your address</a>
                            <a class="dropdown-item" href="/user/profile"><i class="nc-icon nc-single-02"></i>&nbsp;
                            Your profile</a>
                    @endswitch
                        
                        <a class="dropdown-item" href="/logout"><i class="nc-icon nc-bookmark-2"></i>&nbsp;
                            @lang('auth.logout')</a>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="/manager/address/register"><i class="fas fa-sign-out-alt"></i> Register Address</a></li>
                @else
                <li class="nav-item"><a class="nav-link" href="/login"><i class="fas fa-sign-out-alt"></i> @lang('auth.login')</a></li>
                <li class="nav-item"><a class="nav-link" href="/register"><i class="fas fa-user"></i> @lang('auth.register')</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#ModalLogin"><i class="fas fa-sign-out-alt"></i> Register Address</a></li>
                @endif
            </ul>
        </div>
    </nav>
    @yield('content')
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
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script>
        function display_types(d) {
            var data = d.success == false ? [] : d.data;
            var list =
                '<div class="list-group" style="padding:0;"><span class="list-group-item list-group-item-action"><b>' + (
                    data.length <= 0 ? '@lang('home.noresults')' : '@lang('home.resultsin'):') + '</b></span>';
            Object.keys(data).forEach(function (key) {
                list +=
                    '<a class="list-group-item list-group-item-action" onclick="chooseType(this);" data-address="' +
                    key + '">' + data[key] + '</a>';
            });
            list += '</div>';
            return list;
        }

        function display_addresses(d, depth = false) {
            var data = d.success === false ? [] : d.data;
            var list = [];
            list.push(
                '<div class="list-group" style="padding:0;">',
            );
            if(data.length <= 0) {
                list.push(
                    '<span class="list-group-item list-group-item-action"><b>',
                    '@lang('home.noresults_address')',
                    '</b>'
                );
                if(!depth) {
                    list.push(
                        ' <button type="button" onclick="chooseType(this, true);" class="btn btn-secondary btn-sm btn-depth-search">Try Depth search</button>'
                    );
                }
                list.push(
                    '</span>'
                );
            }
            Object.keys(data).forEach(function (key) {
                var d = data[key];
                var photo = d.photos.length > 0 ? '{{config('files.uri.photo_encrypted')}}'+d.photos[0] : '/assets/img/default_geocode-2x.png';
                list.push(
                    '<a class="list-group-item list-group-item-action" data-id="',
                    d.id,
                    '" data-location="',
                    d.location,
                    '" href="/maps?destination=',
                    d.location,
                    '" target="_blank">',
                    '<div class="row">', //start row
                    '<div class="col-md-4"><div class="photo-result" style="background:url(', //photo
                    photo,
                    ');"></div></div>',
                    '<div class="col-md-8"><div class="content-result"><b>', //name
                    d.name,
                    '</b><div class="rating-result">',
                );
                if(d.rate) {
                    var rate = 0;
                    for(i=1;i<=Math.floor(d.rate);i++) {
                        rate = i;
                        list.push(
                            '<span class="fas fa-star star-rated"></span>',
                        );
                    }
                    if(d.rate != rate && d.rate - rate >= 0.5) {
                        list.push(
                            '<span class="fas fa-star-half-alt star-rated"></span>',
                        );
                        rate++;
                    }
                    for(i=5;i>rate;i--) {
                        list.push(
                            '<span class="far fa-star star-rated"></span>',
                        );
                    }
                    list.push(
                        ' ' + d.rate + '/5',
                    );
                }
                list.push(
                    '</div><div class="about-result">@lang('home.about') ', //about
                    display_distance(d.distance),
                    '</div></div></div>',
                    '</div>', //end row
                    '</a>'
                );
            });
            list.push('</div>');
            return list.join('');
        }
    </script>
    @if (isset($maps))
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{config('googlemaps.key_maps')}}&callback=initMap&language={{Config::get('app.locale')}}"></script>
    @endif
    <!-- permission denied -->
    <div class="modal fade" id="denied_permission" role="dialog" style="overflow-y: hidden">
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
                    <button type="button" class="btn btn-success" data-dismiss="modal"
                        onclick="getLocation(true);">@lang('error.grant')</button>
                </div>
            </div>
        </div>
    </div>
    <!-- no mode -->
    <div class="modal fade" id="no_mode_directions" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('error.no_mode_directions')</h4>
                </div>
                <div class="modal-body">
                    @lang('error.no_mode_directions_desp')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('error.close')</button>
                </div>
            </div>
        </div>
    </div>
     <!-- modal login-->
    <div class="modal fade" id="ModalLogin" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Login is required</h4>
                </div>
                <div class="modal-body">
                    Please login or register at <a href="/register" class="text-danger">here</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="/login" class="btn btn-success">Login now</a>
                </div>

            </div>

        </div>
    </div>
    </div>
</body>

</html>

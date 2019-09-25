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
                            <h3 class="text-white"><b>Hệ thống tìm kiếm địa chỉ theo định vị</b></h3>
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
                                    <li><a href="/login"><i class="fas fa-sign-out-alt"></i>Đăng nhập</a></li>
                                    <li><a href="/register"><i class="fas fa-user"></i>Đăng ký</a></li>
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
        var map;
        var marker;
                            
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 21.0537405,
                    lng: 105.7336058
                },
                zoom: 15,
                disableDefaultUI: true,
                // styles: [
                //     {
                //         "featureType": "administrative.land_parcel",
                //         "elementType": "labels",
                //         "stylers": [
                //         {
                //             "visibility": "off"
                //         }
                //         ]
                //     },
                //     {
                //         "featureType": "poi",
                //         "elementType": "labels.text",
                //         "stylers": [
                //         {
                //             "visibility": "off"
                //         }
                //         ]
                //     },
                //     {
                //         "featureType": "road.local",
                //         "elementType": "labels",
                //         "stylers": [
                //         {
                //             "visibility": "off"
                //         }
                //         ]
                //     }
                // ]
            });
            map.addListener('click', function(e) {
                placeMarker(e.latLng, map);
            });

        }
        function placeMarker(position, map, clickOnMap = true) {
            if(marker) {
                marker.setMap(null);
            }
            //$('#gps').val(clickOnMap===true?position.lat()+','+position.lng():position.lat +"," + position.lng);
            //console.log(position.lat +"," + position.lng);
            marker = new google.maps.Marker({
                position: position,
                map: map,
                title: clickOnMap===true?'':'You are here'
            });
            
            marker.addListener('click', toggleBounce);
            map.panTo(position);
        }
        $('#located').click(function(e){
            e.preventDefault();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, function(error) {
                    if (error.code == error.PERMISSION_DENIED) {
                        $('#myModal').modal();
                    }
                });
            } else {
                $('#gps').val("Geolocation is not supported by this browser.");
            }
        });

        function showPosition(position) {
            $('#gps').val(position.coords.latitude +"," + position.coords.longitude);
            placeMarker({lat: position.coords.latitude,lng: position.coords.longitude}, map, false);
        }
        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
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
                        $.get("/api/google/findplacefromtext?location="+location+"&input="+val, function(d, status){
                            var data = JSON.parse(d);
                            var list = '<div class="list-group" style="padding:0;">';
                            data.candidates.forEach(function(element, i){
                                list+='<a class="list-group-item list-group-item-action" onclick="choosePlace(this);" data-location="'+element.geometry.location.lat+','+element.geometry.location.lng+'">'+element.name+'</a>';
                            });
                            list+='</div>';
                            $('#listPlaces').css('display','block');
                            $('#listPlaces').css('margin-top', '-11px');
                            $('#listPlaces').html(list);
                            });
                        
                    }, function(error) {
                        if (error.code == error.PERMISSION_DENIED) {
                            $('#myModal').modal();
                        }
                    });
                }
            }
        }, 500));
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
    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initMap" async defer></script>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <h4 class="modal-title">Lỗi cấp quyền</h4>
                </div>
                <div class="modal-body">
                <p>Để sử dụng được tính năng này, VNN cần quyền truy nhập vào vị trí của bạn.</p>
                <p>Vui lòng bao gồm quyền truy cập vị trí trong cài đặt.</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

<!-- Mirrored from modinatheme.com/listico/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Sep 2019 03:56:17 GMT -->

</html>

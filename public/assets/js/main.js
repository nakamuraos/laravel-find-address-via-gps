/* ===================================================================
    Author          : ModinaTheme
    Template Name   : Listico - Listing & Directory HTML Template
    Version         : 2.0
* ================================================================= */

(function ($) {
    "use strict";

    $(document).on('ready', function () {


        // Preloading
        $(window).on('load', function () {
            // Animate loader off screen
            $(".loader-wrap").delay(300).fadeOut();
        });

        //# Smooth Scroll
        $('.details-nav a').on('click', function (event) {
            var $anchor = $(this);
            var headerH = '30';
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - headerH + "px"
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });

        /*==========================
             map slider init
          ============================*/
        $('.listico-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav',
            initialSlide: 2
        });
        $('.slider-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.listico-slider',
            dots: false,
            centerMode: true,
            focusOnSelect: true,
            initialSlide: 2,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        /*==========================
             Gallery init
          ============================*/
        $('.photo-gallery').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.gallery_nav',
            initialSlide: 2
        });
        $('.gallery_nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.photo-gallery',
            dots: false,
            centerMode: true,
            focusOnSelect: true,
            initialSlide: 2,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });


        /*==================================
         # Listico Item Carousel 
         ==================================*/
        $('.listico-item-carousel, .top-locations-carousel').owlCarousel({
            autoplay: true,
            loop: true,
            margin: 30,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                700: {
                    items: 2
                },
                1000: {
                    items: 2
                },
                1300: {
                    items: 3
                }
            }
        });

        /*==================================
         # Listico testimonials Carousel 
         ==================================*/
        $('.testimonial-carousel').owlCarousel({
            autoplay: true,
            loop: true,
            margin: 30,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                700: {
                    items: 2
                },
                1000: {
                    items: 2
                },
                1300: {
                    items: 3
                }
            }
        });

        /*==================================
         # meanmenu active - mobile menu 
         ==================================*/
        $('#responsive-menu').meanmenu({
            meanMenuContainer: '.responsive-menu',
            meanScreenWidth: "992"
        });


        /* =============================================
            # Magnific popup init
         ===============================================*/
        $(".popup-link").magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            },
            // other options
        });

        $(".popup-gallery").magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            },
            // other options
        });

        $(".popup-video, .popup-vimeo, .popup-gmaps").magnificPopup({
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

        var wow = new WOW({
            mobile: false,
        })
        wow.init();

        $(".range-slider").ionRangeSlider();


        $(".rating").rate();
        var options = {
            max_value: 5,
            step_size: 1,
        }
        $(".rating").rate(options);


        /*==========================
            Scroll To Up init
         ============================*/
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            topDistance: '1110', // Distance from top before showing element (px)
            topSpeed: 2000, // Speed back to top (ms)
            animation: 'slide', // Fade, slide, none
            animationInSpeed: 300, // Animation in speed (ms)
            animationOutSpeed: 300, // Animation out speed (ms)
            scrollText: '<i class="fas fa-angle-up"></i>', // Text for element
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });


    }); // end document ready function
})(jQuery); // End jQuery

//------------------------------------------

function display_distance(distance) {
    var temp = distance;
    if(distance >= 1000) {
        temp = distance / 1000;
    }
    return Number.parseFloat(temp).toFixed(1) + (temp == distance ? 'm':'Km');
}

$('#gps').keyup(delay(function (e) {
    var val = this.value;
    if (val == '') {
        $('#listTypes').css('display', 'none');
        $('#listPlaces').css('display', 'none');
    } else {
        $('#loading_results').removeClass('hide');
        getLocation().then(() => {
                $('#listPlaces').css('display', 'none');
                $.get("/api/address/types?type=" + encodeURI(val), function (d, status) {
                    var list = display_types(d);
                    $('#listTypes').css('display', 'block');
                    $('#listTypes').css('width', $('#gps').width() + 29);
                    $('#loading_results').addClass('hide');
                    $('#listTypes').html(list);
                });
            })
            .catch(e => {
                $('#loading_results').addClass('hide');
                if (e) console.log(e);
            })
    }
}, 300));

function delay(callback, ms) {
    var timer = 0;
    return function () {
        var context = this,
            args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            callback.apply(context, args);
        }, ms || 0);
    };
}

function getLocation(allowed = false) {
    return new Promise(function (resolve, reject) {
        if (navigator.geolocation) {
            var location = '';
            navigator.permissions.query({
                name: 'geolocation'
            }).then(function (PermissionStatus) {
                if (allowed === false && 'prompt' === PermissionStatus.state) {
                    $('#prompt_permission').modal();
                    return reject();
                } else {
                    navigator.geolocation.getCurrentPosition(function (e) {
                        if(allowed) window.location.reload(true);
                        return resolve([e.coords.latitude, e.coords.longitude]);
                    }, function (error) {
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

function chooseType(e, depth = false, scroll = false) {
    if(!scroll) {
        if(depth) {
            var val = $('#gps').val();
            $('#listTypes').css('display', 'none');
            $('#listPlaces').css('display', 'none');
        } else {
            var val = e.textContent;
            $('#gps').attr('data-addresstype', e.getAttribute('data-addresstype'));
            $('#listTypes').css('display', 'none');
            $('#gps').val(e.textContent);
        }
    } else {
        var val = $('#gps').val();
    }
    $('#loading_results').removeClass('hide');
    getLocation().then((data) => {
            $.get("/api/address/nearby?keyword=" + val + '&location=' + data.join() + (depth?'&depth=1':''), function (d, status) {
                $('#listPlaces').html(display_addresses(d, depth));
                $('#listPlaces').css('width', $('#gps').width() + 29);
                $('#loading_results').addClass('hide');
                $('#listPlaces').css('display', 'block');
            });
        })
        .catch(e => {
            if (e) console.log(e);
        });
}
var map;
var myloc;
var mode_direction = 'DRIVING';

function initMap() {
    var directionsRenderer = new google.maps.DirectionsRenderer({
        //preserveViewport: true
    });
    var directionsService = new google.maps.DirectionsService;
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        disableDefaultUI: true,
        styles: [
            {
              "featureType": "poi",
              "elementType": "labels.text",
              "stylers": [
                {
                  "visibility": "on"
                }
              ]
            },
            {
              "featureType": "poi.business",
              "stylers": [
                {
                  "visibility": "off"
                }
              ]
            },
            {
              "featureType": "road",
              "elementType": "labels.icon",
              "stylers": [
                {
                  "visibility": "on"
                }
              ]
            },
            {
              "featureType": "transit",
              "stylers": [
                {
                  "visibility": "off"
                }
              ]
            },
            {
              "featureType": "transit.line",
              "elementType": "geometry.fill",
              "stylers": [
                {
                  "color": "#ffeb3b"
                }
              ]
            }
          ],
        center: {lat: 21.0529562, lng: 105.7334937} //HaUI
    });
    myloc = new google.maps.Marker({
        clickable: false,
        icon: new google.maps.MarkerImage('//maps.gstatic.com/mapfiles/mobile/mobileimgs2.png',
            new google.maps.Size(22, 22),
            new google.maps.Point(0, 18),
            new google.maps.Point(11, 11)),
        shadow: null,
        zIndex: 999,
        map: map // your google.maps.Map object
    });

    if(getUrlParameter('destination')) {
        directionsRenderer.setMap(map);
        directionsRenderer.setPanel(document.getElementById('directions'));
        calculateAndDisplayRoute(directionsService, directionsRenderer);
    }
    $('.mode-selector').on('click', function () {
        calculateAndDisplayRoute(directionsService, directionsRenderer);
    });
}

function calculateAndDisplayRoute(directionsService, directionsRenderer) {
    getLocation().then(data => {
        var selectedMode = $('.mode-selector.active input').data('mode');
        var destination = getUrlParameter('destination').split(',');
        destination = destination ? destination : '21.0500858,105.7312245';
        //if(myloc) myloc.setMap(null);
        myloc.setPosition(new google.maps.LatLng(data[0] * 1, data[1] * 1));
        directionsService.route({
            origin: {
                lat: data[0],
                lng: data[1]
            }, // Haight.
            destination: {
                lat: destination[0] * 1,
                lng: destination[1] * 1
            }, // Ocean Beach.
            // Note that Javascript allows us to access the constant
            // using square brackets and a string value as its
            // "property."
            travelMode: google.maps.TravelMode[selectedMode]
        }, function (response, status) {
            if (status == 'OK') {
                directionsRenderer.setDirections(response);
            } else {
                $('#no_mode_directions').modal();
            }
        });
    });
}
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};

jQuery(function($) {
    $('#listPlaces').on('scroll', delay(function() {
        if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
            chooseType(this, true, true);
        }
    }, 5000))
});

function openCloseToolbar() {
    var w = document.getElementById("sideBav");
    var btn = document.getElementById("btn-toolbar-custom");
    if(w.style.width && w.style.width=='0px') {
        w.style.width = '400px';
        btn.innerHTML = '&lang;';
    } else {
        w.style.width = '0px';
        btn.innerHTML = '&rang;';
    }
}
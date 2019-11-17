/* ===================================================================
    Author          : Thinh Hoang
    Version         : 1.0
* ================================================================= */
var id_position;
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
         # Item Carousel 
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
         # testimonials Carousel 
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
                    if($('#listTypes').data('width')==true) $('#listTypes').css('width', $('#gps').width() + 29);
                    $('#loading_results').addClass('hide');
                    $('#listTypes').html(list);
                });
            })
            .catch(e => {
                $('#loading_results').addClass('hide');
                if (e) console.log(e);
            })
    }
}, 500));

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

function getLocation(allowed = false, direction = false) {
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
                    if(direction) {
                        id_position = navigator.geolocation.watchPosition(function (e) {
                            if(allowed) window.location.reload(true);
                            return resolve([e.coords.latitude, e.coords.longitude]);
                        }, function (error) {
                            if (error.code == error.PERMISSION_DENIED) {
                                $('#denied_permission').modal();
                                return reject();
                            }
                        });
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

function getLocationForm(e) {
  getLocation().then(data => {
    $('#location').val(data.join(','));
    e.submit();
  });
}

//--------------------------------------------------------------
//-------------------MAPS-SETTING-------------------------------
//--------------------------------------------------------------

var styles_silver = [
    {
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#f5f5f5"
        }
      ]
    },
    {
      "elementType": "labels.icon",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#616161"
        }
      ]
    },
    {
      "elementType": "labels.text.stroke",
      "stylers": [
        {
          "color": "#f5f5f5"
        }
      ]
    },
    {
      "featureType": "administrative.land_parcel",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#bdbdbd"
        }
      ]
    },
    {
      "featureType": "poi",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#dddddd"
        }
      ]
    },
    {
      "featureType": "poi",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#757575"
        }
      ]
    },
    {
      "featureType": "poi.park",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#e5e5e5"
        }
      ]
    },
    {
      "featureType": "poi.park",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#9e9e9e"
        }
      ]
    },
    {
      "featureType": "road",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#ffffff"
        }
      ]
    },
    {
      "featureType": "road.arterial",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#757575"
        }
      ]
    },
    {
      "featureType": "road.highway",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#dadada"
        }
      ]
    },
    {
      "featureType": "road.highway",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#616161"
        }
      ]
    },
    {
      "featureType": "road.local",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#9e9e9e"
        }
      ]
    },
    {
      "featureType": "transit.line",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#e5e5e5"
        }
      ]
    },
    {
      "featureType": "transit.station",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#dddddd"
        }
      ]
    },
    {
      "featureType": "water",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#c9c9c9"
        }
      ]
    },
    {
      "featureType": "water",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#9e9e9e"
        }
      ]
    }
];
var styles_standard = [
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
          "visibility": register!==true ? "off" : "on"
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
];

var icons;

function initMap() {
    var directionsRenderer = new google.maps.DirectionsRenderer({
        preserveViewport: true,
        suppressMarkers: true,
        polylineOptions: {
            strokeColor: '#55af50',
            strokeOpacity: 1.0,
            strokeWeight: 5
        }
    });
    var directionsService = new google.maps.DirectionsService;
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        disableDefaultUI: register!==true,
        //mapTypeId: google.maps.MapTypeId.TERRAIN,
        styles: register===true ? styles_standard : styles_silver,
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
    myCircle = new google.maps.Circle({
        map: map,
        radius: 100,
        strokeColor: "#4db3ff",
        strokeOpacity: .8,
        strokeWeight: 1,
        fillColor: "#54b5fd",
        fillOpacity: 0.4,
    });
    icons = {
        start: {
            url: "/assets/fonts/pin.svg",
            anchor: new google.maps.Point(25,50),
            scaledSize: new google.maps.Size(50,50)
        },
        end: {
            url: "/assets/fonts/placeholder.svg",
            anchor: new google.maps.Point(25,50),
            scaledSize: new google.maps.Size(50,50)
        },
    };

    if(register) {
        map.addListener('click', function(e) {
            placeMarker(e.latLng, map);
            console.log(e.latLng.lat()+','+e.latLng.lng());
        });
    }

    getLocation().then(data => {
        var mylocation = new google.maps.LatLng(data[0] * 1, data[1] * 1);
        myloc.setPosition(mylocation);
        myCircle.setCenter(mylocation);
        map.setCenter(mylocation);
    });

    if(getUrlParameter('destination')) {
        directionsRenderer.setMap(map);
        directionsRenderer.setPanel(document.getElementById('directions'));
        calculateAndDisplayRoute(directionsService, directionsRenderer);
    }
    $('.mode-selector').on('click', function () {
        calculateAndDisplayRoute(directionsService, directionsRenderer);
    });
    infowindow = new google.maps.InfoWindow({
        content: stringInfo,
    });
}

function makeMarker(position, icon, title) {
    return new google.maps.Marker({
        position: position,
        map: map,
        icon: icon,
        title: title
    });
}

function placeMarker(position, map, clickOnMap = true) {
    if(marker) {
        marker.setMap(null);
    }
    marker = new google.maps.Marker({
        position: position,
        map: map,
        title: clickOnMap===true?'':'You are here'
    });
    $('#selectLocation').data('location', position.lat()+','+position.lng());
    marker.addListener('click', toggleBounce);
    map.panTo(position);
}

function toggleBounce() {
    if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
    } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
    }
}

function calculateAndDisplayRoute(directionsService, directionsRenderer) {
    if(id_position) navigator.geolocation.clearWatch(id_position);
    getLocation(false, true).then(data => {
        var selectedMode = $('.mode-selector.active input').data('mode');
        var destination = getUrlParameter('destination').split(',');
        destination = destination ? destination : '21.0500858,105.7312245';
        var mylocation = new google.maps.LatLng(data[0] * 1, data[1] * 1);
        myloc.setPosition(mylocation);
        map.setCenter(mylocation);
        myCircle.setCenter(mylocation);
        //direction
        directionsService.route({
            origin: {
                lat: data[0],
                lng: data[1]
            },
            destination: {
                lat: destination[0] * 1,
                lng: destination[1] * 1
            },
            travelMode: google.maps.TravelMode[selectedMode],
            provideRouteAlternatives: true,
        }, function (response, status) {
            if (status == 'OK') {
                directionsRenderer.setDirections(response);
                response.routes[0].legs[0].end_address = data_address[0].name + ' (' + response.routes[0].legs[0].end_address + ')';
                var leg = response.routes[0].legs[0];
                console.log(leg);
                makeMarker(leg.start_location, icons.start, leg.start_address);
                var dest_marker = makeMarker(leg.end_location, icons.end, data_address.name);
                infowindow.setPosition(new google.maps.LatLng(destination[0] * 1, destination[1] * 1));
                infowindow.open(map, dest_marker);
                dest_marker.addListener('click', function() {
                    infowindow.setPosition(new google.maps.LatLng(destination[0] * 1, destination[1] * 1));
                    infowindow.open(map);
                });
                // $('.adp-marker2')[0].attr('src', icons.start.url);
                // $('.adp-marker2')[1].attr('src', icons.end.url);
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

var widthNavBar = $('#sideBav').width() + 80;

function openCloseToolbar() {
    var btn = document.getElementById("btn-toolbar-custom");
    if($('#sideBav').width() == 0) {
        $('#sideBav').width(widthNavBar);
        btn.innerHTML = '&lang;';
    } else {
        $('#sideBav').width(0);
        btn.innerHTML = '&rang;';
    }
}

function resetFormModal(action){
    console.log(action);
    $('.invalid-feedback').remove();
    $('form').each(function(index, form){
        form.reset();
        form.action = action;
    });
    $('.message-error').hide();
}

// Click edit button
$('.btn-edit').click(function (e) {
    e.preventDefault();
    resetFormModal($(this).data('href'));

    $('#editModal').modal({
        backdrop: 'static',
        show: true
    });
});
$('#selectLocation').on('click', function() {
    var location = $(this).data('location');
    if(location!="") {
        $('#returnLocation').val(location);
        $('#location').modal('hide');
    }
});
function checkFormRegisterAddress() {
    if($('#returnLocation').val() != "") {
        return true;
    }
    $('#location').modal('show');
    return false;
}

/**
 * Returns the Popup class.
 *
 * Unfortunately, the Popup class can only be defined after
 * google.maps.OverlayView is defined, when the Maps API is loaded.
 * This function should be called by initMap.
 */
function createPopupClass() {
    /**
     * A customized popup on the map.
     * @param {!google.maps.LatLng} position
     * @param {!Element} content The bubble div.
     * @constructor
     * @extends {google.maps.OverlayView}
     */
    function Popup(position, content) {
      this.position = position;
  
      content.classList.add('popup-bubble');
  
      // This zero-height div is positioned at the bottom of the bubble.
      var bubbleAnchor = document.createElement('div');
      bubbleAnchor.classList.add('popup-bubble-anchor');
      bubbleAnchor.appendChild(content);
  
      // This zero-height div is positioned at the bottom of the tip.
      this.containerDiv = document.createElement('div');
      this.containerDiv.classList.add('popup-container');
      this.containerDiv.appendChild(bubbleAnchor);
  
      // Optionally stop clicks, etc., from bubbling up to the map.
      google.maps.OverlayView.preventMapHitsAndGesturesFrom(this.containerDiv);
    }
    // ES5 magic to extend google.maps.OverlayView.
    Popup.prototype = Object.create(google.maps.OverlayView.prototype);
  
    /** Called when the popup is added to the map. */
    Popup.prototype.onAdd = function() {
      this.getPanes().floatPane.appendChild(this.containerDiv);
    };
  
    /** Called when the popup is removed from the map. */
    Popup.prototype.onRemove = function() {
      if (this.containerDiv.parentElement) {
        this.containerDiv.parentElement.removeChild(this.containerDiv);
      }
    };
  
    /** Called each frame when the popup needs to draw itself. */
    Popup.prototype.draw = function() {
      var divPosition = this.getProjection().fromLatLngToDivPixel(this.position);
  
      // Hide the popup when it is far out of view.
      var display =
          Math.abs(divPosition.x) < 4000 && Math.abs(divPosition.y) < 4000 ?
          'block' :
          'none';
  
      if (display === 'block') {
        this.containerDiv.style.left = divPosition.x + 'px';
        this.containerDiv.style.top = divPosition.y + 'px';
      }
      if (this.containerDiv.style.display !== display) {
        this.containerDiv.style.display = display;
      }
    };
  
    return Popup;
}
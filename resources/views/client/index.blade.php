 @extends('client.app') @section('content')
<!-- hero section start -->
<section class="hero-section welcome-section hero-index-2">
    <div class="container-fluid m-lg-0 p-lg-0">
        <div class="row">
            <div class="slider-section col-lg-12 col-sm-12 p-0">
                <div class="booking-form-home">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="collapse" href="#place" data-target="#searchTab" style="background-color:rgba(0, 0, 0, 0.1)">GPS</a>
                        </li>
                    </ul>
                    <div class="collapse show" id="searchTab">
                        <div class="search-tab-wrap">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="container" id="place">
                                    <div class="search-form-box">
                                        <h3>Nhập địa chỉ cần tới</h3>
                                        <form action="#" class="search-form">
                                            <input type="text" placeholder="Nhập địa chỉ cần tới" name="location" id="gps"> <button id="located">GPS</button>
                                            <!--<select>
                                               <option value="Categroy">Categroy</option>
                                               <option value="1">Hotel</option>
                                               <option value="2">Restaurant</option>
                                               <option value="3">Property</option>
                                               <option value="4">Shopping</option>
                                           </select>-->
                                            <button type="submit">Tim kiem</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- <div class="tab-pane container" id="event">
                                    <div class="search-form-box">
                                       <h3>Discover Great Event.</h3>
                                       
                                       <form action="#" class="search-form">
                                           <input type="text" placeholder="Where to go?" name="place">
                                           <input type="text" placeholder="Location" name="location">
                                           <select>
                                               <option value="Categroy">Categroy</option>
                                               <option value="1">Hotel</option>
                                               <option value="2">Restaurant</option>
                                               <option value="3">Property</option>
                                               <option value="4">Shopping</option>
                                           </select>
                                           <button type="submit">Search request</button>
                                       </form>
                                   </div>
                               </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slides listico-slider">
                    <div class="single-slide">
                        <div id="map"></div>
                        <script>
                            var map;

                            function initMap() {
                                map = new google.maps.Map(document.getElementById('map'), {
                                    center: {
                                        lat: 21.0537405,
                                        lng: 105.7336058
                                    },
                                    zoom: 15,
                                    disableDefaultUI: true,
                                    styles: [
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  }
]
                                });
                            }
                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initMap" async defer></script>
                    </div>
                    <!-- end single slide -->
                </div>

            </div>
        </div>
    </div>
</section>
<!-- hero section end -->
@endsection
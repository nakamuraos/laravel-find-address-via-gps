 @extends('client.app')
 @section('content')
 <!-- hero section start -->
 <section class="hero-section welcome-section hero-index-2">
     <div class="container-fluid m-lg-0 p-lg-0">
         <div class="row">
             <div class="slider-section col-lg-12 col-sm-12 p-0">
                 <div class="booking-form-home">
                     <!-- Nav tabs -->
                     <ul class="nav nav-tabs">
                         <li class="nav-item">
                             <a class="nav-link active" data-toggle="collapse" href="#place" data-target="#searchTab"
                                 style="background-color:rgba(0, 0, 0, 0.1)">GPS</a>
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
                                             <input type="text" placeholder="Nhập địa chỉ cần tới" name="location"
                                                 id="gps" style="width:80%;display: inline;" data-location=""
                                                 autocomplete="off">
                                             <button id="located" style="width: 18%">GPS</button>
                                             <div class="result hide" id="listPlaces"
                                                 style="position: absolute;width:62.7%;background-color:white;"></div>
                                             <select class="d-none">
                                                 <option value="Categroy">Categroy</option>
                                                 <option value="1">Hotel</option>
                                                 <option value="2">Restaurant</option>
                                                 <option value="3">Property</option>
                                                 <option value="4">Shopping</option>
                                             </select>
                                             <button type="submit">Chỉ đường</button>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div id="map"></div>
                 <!-- <div class="slides listico-slider"> -->
                 <!-- <div class="single-slide"> -->

                 <!-- </div> -->
                 <!-- end single slide -->
                 <!-- </div> -->

             </div>
         </div>
     </div>
 </section>
 <!-- hero section end -->
 @endsection

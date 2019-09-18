  @extends('client.app')

  @section('content')
    <!-- hero section start -->
    <section class="hero-section welcome-section hero-index-2">
        <div class="container-fluid m-lg-0 p-lg-0">
            <div class="row">
                <div class="slider-section col-lg-12 col-sm-12 p-0">
                    <div class="booking-form-home">
                         <div class="search-tab-wrap">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                               <li class="nav-item">
                                  <a class="nav-link active" data-toggle="tab" href="#place">GPS</a>
                               </li>
                               
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                               <div class="tab-pane active container" id="place">
                                   <div class="search-form-box">
                                       <h3>Ban muon di dau</h3>
                                       <form action="#" class="search-form">
                                           <input type="text" placeholder="Vi tri cua ban" name="place">
                                           <input type="text" placeholder="Vi tri can toi???" name="location">
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
                               <div class="tab-pane container" id="event">
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
                               </div>
                            </div>
                        </div>
                    </div>
                    <div class="slides listico-slider">
                        <div class="single-slide">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d58400.47931449054!2d90.40927917566997!3d23.817533751206252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sBars!5e0!3m2!1sen!2sbd!4v1562019287484!5m2!1sen!2sbd"  style="border:0" allowfullscreen></iframe>
                        </div><!-- end single slide -->
                        <div class="single-slide">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d116765.49789143789!2d90.28748999112247!3d23.85691014031508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sHotels!5e0!3m2!1sen!2sbd!4v1562018865814!5m2!1sen!2sbd"  style="border:0" allowfullscreen></iframe>
                        </div><!-- end single slide -->
                        <div class="single-slide">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d5161.9500897305015!2d90.3667025947699!3d23.816824102524652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sRestaurants!5e0!3m2!1sen!2sbd!4v1562019214497!5m2!1sen!2sbd"  style="border:0" allowfullscreen></iframe>
                        </div><!-- end single slide -->
                        <div class="single-slide">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d58400.47931449054!2d90.40927917566997!3d23.817533751206252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sBars!5e0!3m2!1sen!2sbd!4v1562019287484!5m2!1sen!2sbd"  style="border:0" allowfullscreen></iframe>
                        </div><!-- end single slide -->
                        <div class="single-slide">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d116765.49789143789!2d90.28748999112247!3d23.85691014031508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sHotels!5e0!3m2!1sen!2sbd!4v1562018865814!5m2!1sen!2sbd"  style="border:0" allowfullscreen></iframe>
                        </div><!-- end single slide -->
                        <div class="single-slide">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d5161.9500897305015!2d90.3667025947699!3d23.816824102524652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sRestaurants!5e0!3m2!1sen!2sbd!4v1562019214497!5m2!1sen!2sbd"  style="border:0" allowfullscreen></iframe>
                        </div><!-- end single slide -->
                    </div>

                </div>
            </div>
       </div>
    </section>
    <!-- hero section end -->   
  @endsection
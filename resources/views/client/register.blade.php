@extends('client.app')
@section('content')
 <!-- breadcrumb section start -->
 <section class="breadcrumb-banner bg-cover bg-overlay parallax-2" style="background-image: url('{{asset('client/assets/img/breadcrumb_bg.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-sm-12">
                    <div class="breadcrumb-inner text-center">
                        <h2>Register</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb section end -->

    <!-- register section start -->
    <div class="registar-area section-padding">
        <div class="container">
            <div class="row ">
                <div class="col-xl-12 col-md-12">
                    <div class="registar-form ">
                        <form action="#" class="row">
                            <input type="text" name="user_name" class="ml-5 col-md-5 mr-3 col-12 " placeholder="Usename*">
                            <input type="text" name="full_name" class=" col-md-5 mr-3 col-12" placeholder="Your Full Name*">
                            <input type="email" name="email" class="ml-5 col-md-5 mr-3 col-12" placeholder="Your Email*">
                            <input type="text"  name="phone" class=" col-md-5 mr-3 col-12" placeholder="Your Phone*">                           
                            <input type="password" name="password" class="ml-5 col-md-5 mr-3 col-12" placeholder="Password*">
                            <input type="password" name="password_confirmation" class="col-md-5 mr-3 col-12" placeholder="Confirm password*">
                            <button type="submit" class="btn-submit col-md-5 col-12 m-auto">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- register section end -->
@endsection
@extends('client.app')
@section('content')
 <!-- breadcrumb section start -->
 <section class="breadcrumb-banner bg-cover bg-overlay parallax-2" style="background-image: url('{{asset('client/assets/img/breadcrumb_bg.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-sm-12">
                    <div class="breadcrumb-inner text-center">
                        <h2>@lang('register.title')</h2>
                        <!-- register section start -->
                        <div class="registar-area section-padding">
                            <div class="container">
                                <div class="row ">
                                    <div class="col-xl-4 col-sm-12 col-md-8 offset-lg-4 offset-md-2">
                                        <div class="registar-form ">
                                            <form action="#" class="row">
                                                <input type="text" name="user_name" placeholder="Usename*"> <br/>
                                                <input type="email" name="email" placeholder="Your Email*"> <br/>
                                                <input type="text"  name="phone" placeholder="Your Phone*"> <br/>                    
                                                <input type="text" name="full_name" placeholder="Your Full Name*"> <br/>
                                                <input type="password" name="password" placeholder="Password*"> <br/>
                                                <input type="password" name="password_confirmation" placeholder="Confirm password*"> <br/>
                                                <button type="submit" class="btn-submit">@lang('register.title')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- register section end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb section end -->
@endsection
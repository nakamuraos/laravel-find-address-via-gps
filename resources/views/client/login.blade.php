@extends('client.app')
@section('content')
<section class="breadcrumb-banner bg-cover bg-overlay parallax-2" style="background-image: url({{asset('client/assets/img/breadcrumb_bg.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-sm-12">
                    <div class="breadcrumb-inner text-center">
                        <h2>@lang('login.title')</h2>
                         <!-- login section start -->
                        <div class="login-area section-padding">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-4 col-sm-12 col-md-8 offset-lg-4 offset-md-2">
                                        <div class="login-form">
                                            <form action="/login" method="POST">
                                            @csrf
                                                <input type="text" name="user_name" placeholder="Username*">
                                                <input type="password" name="password" placeholder="Password*">
                                                <button type="submit" class="btn-submit">@lang('login.title')</button>
                                                <a href="#" style="color:white;">@lang('login.forgot_password')</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- login section end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb section end -->

   
@endsection

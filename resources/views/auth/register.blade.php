@extends('layouts.app')
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
                                            <form action="#" class="row" method='post'>
                                                <input type="text" name="user_name" placeholder="@lang('register.user_name')*"> <br/>
                                                <input type="email" name="email" placeholder="@lang('register.email')*"> <br/>
                                                <input type="text"  name="phone" placeholder="@lang('register.phone_number')*"> <br/>                    
                                                <input type="text" name="full_name" placeholder="@lang('register.full_name')*"> <br/>
                                                <input type="password" name="password" placeholder="@lang('register.password')*"> <br/>
                                                <input type="password" name="password_confirmation" placeholder="@lang('register.repeat_password')*"> <br/>
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
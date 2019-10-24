@extends('layouts.app')
@section('content')
 <!-- breadcrumb section start -->
 <section class="breadcrumb-banner bg-cover bg-overlay parallax-2" style="background-image: url('{{asset(config('files.uri.background'))}}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-sm-12">
                    <div class="breadcrumb-inner text-center">
                        <h2>@lang('auth.register')</h2>
                        <!-- register section start -->
                        <div class="registar-area section-padding">
                            <div class="container">
                                <div class="row ">
                                    <div class="col-xl-4 col-sm-12 col-md-8 offset-lg-4 offset-md-2">
                                        <div class="registar-form ">
                                            @include('common.errors')
                                            <form action="/register" class="row" method='post'>
                                                @csrf
                                                <input type="text" name="user_name" placeholder="@lang('auth.user_name')*"> <br/>
                                                <input type="email" name="email" placeholder="@lang('auth.email')*"> <br/>
                                                <input type="text"  name="phone" placeholder="@lang('auth.phone_number')*"> <br/>                    
                                                <input type="text" name="full_name" placeholder="@lang('auth.full_name')*"> <br/>
                                                <input type="password" name="password" placeholder="@lang('auth.password')*"> <br/>
                                                <input type="password" name="password_confirmation" placeholder="@lang('auth.confirm_password')*"> <br/>
                                                <button type="submit" class="btn-submit">@lang('auth.register')</button>
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
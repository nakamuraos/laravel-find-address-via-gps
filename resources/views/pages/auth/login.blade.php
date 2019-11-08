@extends('layouts.app')
@section('content')
<section class="breadcrumb-banner bg-cover bg-overlay parallax-2" style="background-image: url({{asset(config('files.uri.background'))}})">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-sm-12">
                    <div class="breadcrumb-inner text-center">
                        <h2>@lang('auth.login')</h2>
                         <!-- login section start -->
                        <div class="login-area section-padding">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-4 col-sm-12 col-md-8 offset-lg-2 offset-xl-4 offset-md-2">
                                        <div class="login-form">
                                            <form action="/login" method="POST">
                                                @csrf
                                                @if (session('success'))
                                                <div class="alert alert-success">
                                                    {!! session('success') !!}
                                                </div>
                                                @endif
                                                @if(session('verified_successfully'))
                                                <div class="alert alert-success">
                                                    {{ session('verified_successfully') }}
                                                </div>
                                                @endif
                                                @error('errorlogin')
                                                <div class="alert alert-danger">{!! $message !!}</div>
                                                @enderror
                                                <input type="text" name="user_name" placeholder="@lang('auth.user_name')*" required>
                                                <input type="password" name="password" placeholder="@lang('auth.password')*" required>
                                                <button type="submit" class="btn-submit">@lang('auth.login')</button>
                                                <a href="#" style="color:white;">@lang('auth.forgot_password')</a>
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

@extends('layouts.app')

@section('content')
<section class="breadcrumb-banner bg-cover bg-overlay parallax-2" style="background-image: url({{asset(config('files.uri.background'))}})">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-sm-12">
                <div class="breadcrumb-inner text-center">
                    <h2>@lang('auth.resend_mail_title')</h2>
                      <!-- resend section start -->
                    <div class="login-area section-padding">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-4 col-sm-12 col-md-8 offset-lg-2 offset-xl-4 offset-md-2">
                                    <div class="login-form">
                                        <form action="" method="POST">
                                            @csrf
                                            @if (session('resent'))
                                                <div class="alert alert-success" role="alert">
                                                    {{session('resent')}}
                                                </div>
                                            @endif
                                            @if (session('email_invalid'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{session('email_invalid')}}
                                                </div>
                                            @endif
                                            @if (session('resend_waiting'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{session('resend_waiting')}}
                                                </div>
                                            @endif
                                            <input type="email" name="email" placeholder="@lang('auth.email')*" required>
                                            <button type="submit" class="btn-submit">@lang('auth.resend_mail_title')</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- resend section end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb section end -->
@endsection
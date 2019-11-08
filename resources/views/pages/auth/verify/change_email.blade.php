@extends('layouts.app')

@section('content')
<section class="breadcrumb-banner bg-cover bg-overlay parallax-2" style="background-image: url({{asset(config('files.uri.background'))}})">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-sm-12">
                <div class="breadcrumb-inner text-center">
                    <h2>@lang('auth.change_email_title')</h2>
                      <!-- change email section start -->
                    <div class="login-area section-padding">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-4 col-sm-12 col-md-8 offset-lg-2 offset-xl-4 offset-md-2">
                                    <div class="login-form">
                                        <form action="" method="POST">
                                            @csrf
                                            @if (session('changed'))
                                                <div class="alert alert-success" role="alert">
                                                    {{session('changed')}}
                                                </div>
                                            @endif
                                            @if (session('change_email_data_invalid'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{session('change_email_data_invalid')}}
                                                </div>
                                            @endif
                                            @if (session('change_email_waiting'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{session('change_email_waiting')}}
                                                </div>
                                            @endif
                                            <input type="text" name="user_name" placeholder="@lang('auth.user_name')*" required>
                                            <input type="email" name="email" placeholder="@lang('auth.old_email')*" required>
                                            <input type="email" name="new_email" placeholder="@lang('auth.new_email')*" required>
                                            <button type="submit" class="btn-submit">@lang('auth.change_email_title')</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- change email section end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb section end -->
@endsection
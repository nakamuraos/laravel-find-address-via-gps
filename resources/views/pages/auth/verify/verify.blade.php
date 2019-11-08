@extends('layouts.app')

@section('content')
<section class="breadcrumb-banner bg-cover bg-overlay parallax-2" style="background-image: url({{asset(config('files.uri.background'))}})">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('auth.verify_email_title')</div>

                    <div class="card-body">
                    @if(session('verified_successfully'))
                        <div class="text-success">
                            {{ session('verified_successfully') }}
                        </div>
                    @else
                        @if(session('token_invalid'))
                            <div class="text-danger">
                                {{session('token_invalid')}}
                            </div>
                        @else
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }}, <a href="{{ route('verify.resend') }}" class="text-info">{{ __('click here to request another') }}</a> or you can change your email address <a href="{{ route('verify.change_email') }}" class="text-info">at here</a>.
                        @endif
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
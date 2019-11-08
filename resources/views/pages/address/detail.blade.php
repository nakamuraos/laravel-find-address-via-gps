@extends('layouts.app')
@section('content')
<section class="breadcrumb-banner bg-cover parallax-2 page-header header-filter" style="background-image: url({{asset(config('files.uri.background'))}})">
<div class="main main-raised">
    <div class="profile-content pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                    <div class="profile">

                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12 m-auto  position-relative ">
                    <div class="card card-stats addresslist pl-5" style="background: #55af50" >
                    <div class="row">
                    <div class="card-header-icon">
                            <div class="card-image card-icon">
                                <img src="{{uriPhoto($address->photos)}}" alt="">
                            </div>
                        </div>
                        <div class="card-body text-left text-white mt-4">
                        <h2 class="card-title">{{$address->name}}</h2>
                            <p>@lang('address.address_type'): {{$address->type_str}} </p>
                            <p>@lang('address.address_detail'): {{$address->detail}}</p>
                            <p>@lang('address.status'):
                                @if($address->verfied == 0)
                                @lang('address.notyet_verified')
                                @else @lang('address.verified')
                                @endif
                            </p>
                            <p>@lang('address.register_date'): 
                                {{$address->created_at}}
                            </p>
                        </div></div>
                       
                        @if($address->verified == 2)
                        <div class="row">
                            <div class="col-md-2 card-btn">
                                <button type="button" class="btn btn-success my-3 btn-edit"
                                    data-href="/manager/address/{{$address->id}}">@lang('address.update')</button>
                            </div>
                        </div>
                        @endif
                        <div class="card-footer position-absolute">
                            <div class="stats">
                                @lang('address.last_change')
                                @if($address->updated_at == NULL)
                                    {{$address->created_at}}
                                @else
                                    {{$address->updated_at}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
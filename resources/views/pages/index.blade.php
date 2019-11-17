@extends('layouts.app')
@section('content')
@if(!app('request')->search)
<!-- hero section start -->
<section class="breadcrumb-banner bg-cover parallax-2 page-header header-filter" style="background-image: url({{asset(config('files.uri.background'))}})">
<div class="container">
    <div class="row">
        <div class="search-tab-wrap">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="container" id="place">
                    <div class="search-form-box">
                        <h3>@lang('home.typetosearch')</h3>
                        <form action="" class="search-form" method="get" onSubmit="getLocationForm(this);return false;">
                            <input type="text" placeholder="@lang('home.typetosearch_example')" name="search" id="gps" data-addresstype="" autocomplete="off" data-width="true">
                            <input type="hidden" name="location" value="" id="location">
                            <div class="spinner-border float-right hide" role="status" id="loading_results" aria-hidden="true" style="margin-top: -50px;margin-right: 10px;"></div>
                            <div class="result hide" id="listTypes"></div>
                            <div class="result hide" id="listPlaces"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hero section end -->
@else
<!-- hero section start -->
<section class="bg-cover parallax-2 page-header header-filter">
    <div class="row" style="margin:0;">
        <div class="col-md-3" style="background:#eee;padding:5px;height:100%;">
                <form action="" class="" method="get" onSubmit="getLocationForm(this);return false;">
                    <input type="hidden" name="location" value="" id="location">
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="@lang('home.typetosearch_example')" name="search" data-addresstype="" autocomplete="off" value="{{app('request')->search}}" style="outline:none;" data-width="false">
                        <div class="spinner-border float-right hide" role="status" id="loading_results" aria-hidden="true" style="margin-right: 10px;"></div>
                    </div>
                </form>
                <div id="listTypes" style="overflow-x:auto;height:calc(100% - 44px);">
                    <ul class="list-group">
                        @if(!empty($types))
                        @foreach ($types as $type)
                    <a class="list-group-item list-group-item-action" href="?location={{app('request')->location}}&search={{$type}}">{{$type}}</a>
                        @endforeach
                        @endif
                    </ul>
                </div>
        </div>
        <div class="col-md-9 address-listing" style="height:100%;padding:5px;right:0;overflow-x:hidden">
            @if(empty($addresses))
            <div class="flex-center position-ref full-height">
                    <div class="message" style="padding: 10px;">
                        The address is not available         
                    </div>
                </div>
            @else
            <div class="row">
            @foreach($addresses as $key => $address)
            @if(($key)%3==0)
            </div>
            <div class="row">
            @endif
                <div class="col-md-4 col-sm-12">
                    <div class="card mb-4 shadow-sm">
                    <a href="/maps?destination={{$address->location}}" target="_blank"><img class="bd-placeholder-img card-img-top" src="{{uriPhoto($address->photos)}}"/></a>
                        <div class="card-body">
                            <p class="card-text"><b>{{$address->name}}</b></p>
                            <div class="">
                                <div class="">
                                    <span class="align-middle"><i class="fa fa-map-marker-alt" aria-hidden="true"></i></span> <span class="align-middle">{{$address->detail}}</span>
                                </div>
                                <div class="">
                                    <span class="align-middle"><i class="fas fa-clock"></i></span> <small class="">About {{ceil($address->distance/500)}} minutes driving</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            @endif
        </div>
    </div>
</section>
<!-- hero section end -->
<style>
#listTypes::-webkit-scrollbar {
    width: 0;
}
.card-img-top {
    height: 200px;
}
.address-listing .row {
    padding: 0 15px 0 10px;
}
.address-listing .row > div {
    padding:0;
    padding-left: 5px;
}

.full-height {
    height: 80vh;
}

.flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
}

.position-ref {
    position: relative;
}

*:focus {
    outline: none;
}
</style>
@endif
@endsection
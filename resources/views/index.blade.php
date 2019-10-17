@extends('layouts.app')
@section('content')
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
                        <form action="#" class="search-form">
                            <input type="text" placeholder="@lang('home.typetosearch_example')" name="location" id="gps" data-addresstype="" autocomplete="off">
                            <div class="float-right hide" role="status" id="loading_results" aria-hidden="true" style="margin-top: -50px;margin-right: 10px;"></div>
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
@endsection
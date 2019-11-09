@extends('layouts.app')
@section('content')
<div class="toolBar">
    <div id="sideBav" class="sidenav">
        <div class="container">
            <div class="row">
                <div class="form-group" style="margin: 0;">
                    <a href="/"><h3 style="color:white;display:inline-block;">{{config('app.name')}}</h3></a>
                </div>
                <div class="form-group">
                    <div class="mode-travel btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-success active mode-selector" title="test">
                            <input type="radio" name="options" data-mode="DRIVING" autocomplete="off" checked> <div class="directions-icon mode-driving-icon"></div>
                        </label>
                        <label class="btn btn-success mode-selector">
                            <input type="radio" name="options" data-mode="TRANSIT" autocomplete="off"> <div class="directions-icon mode-transit-icon"></div>
                        </label>
                        <label class="btn btn-success mode-selector">
                            <input type="radio" name="options" data-mode="WALKING" autocomplete="off"> <div class="directions-icon mode-walking-icon"></div>
                        </label>
                        <label class="btn btn-success mode-selector">
                            <input type="radio" name="options" data-mode="BICYCLING" autocomplete="off"> <div class="directions-icon mode-bicycling-icon"></div>
                        </label>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <div class="directions-icon waypoint-location-icon"></div>
                            <div class="directions-icon waypoint-dots-icon"></div>
                            <div class="directions-icon waypoint-destination-icon"></div>
                        </div>
                        <div class="col-10">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Your location" readonly name="location" data-addresstype="" autocomplete="off">
                            </div>
                            <div class="form-group" style="color:#666">
                                <input type="text" class="form-control form-control-sm" placeholder="@lang('home.typetosearch_example')" name="location" id="gps" value="@if(!empty($address)){{$address->name}}@endif" data-addresstype="" autocomplete="off">
                                <div class="spinner-grow float-right text-primary hide" role="status" id="loading_results" aria-hidden="true" style="margin-top:-28px;margin-right:5px;width:1.5em;height:1.5em"></div>
                                <div class="result hide" id="listTypes" style="margin-top:0;"></div>
                                <div class="result hide" id="listPlaces" style="margin-top:0;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="overflow: auto;height: 66vh;">
            <div id="directions"></div>
        </div>
    </div>
    <span class="btn-toolbar-custom" onclick="openCloseToolbar()" id="btn-toolbar-custom">&lang;</span>
</div>
<div id="map"></div>
<style>
.list-group-item {
    padding: .3rem .8rem;
}
</style>
@endsection
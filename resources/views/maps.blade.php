@extends('layouts.app')
@section('content')
    <div id="floating-panel">
        <b>Mode of Travel: </b>
        <select id="mode">
            <option value="DRIVING">Driving</option>
            <option value="WALKING">Walking</option>
            <option value="BICYCLING">Bicycling</option>
            <option value="TRANSIT">Transit</option>
        </select>
    </div>
    <div id="map"></div>
@endsection
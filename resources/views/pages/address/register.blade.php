@extends('layouts.app')
@section('content')
 <!-- breadcrumb section start -->
 <section class="breadcrumb-banner bg-cover bg-overlay parallax-2" style="height: calc(100vh - 44px - .4em);margin-top:50px;background-image: url('{{asset(config('files.uri.background'))}}')">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-sm-12">
                <div class="breadcrumb-inner text-center">
                <h2>@lang('address.register_title')</h2>
                <!-- register section start -->
                <div class="register-area section-padding">
                    <div class="container">
                        <div class="row ">
                            <div class="col-xl-8 col-sm-12 col-md-8 offset-lg-2 offset-md-2">
                                <div class="register-form">
                                    @if(session()->has("success"))
                                    <div class="alert alert-success alert-dismissible fade show">
                                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <i class="material-icons">close</i>
                                        </button>
                                        <span> {{ session("success") }}</span>
                                    </div>
                                    @endif
                                    @include('common.errors')
                                    <form action="/manager/address/register" class="row" method='post' enctype="multipart/form-data" onSubmit="return checkFormRegisterAddress();">
                                        @csrf
                                        
                                        <div class="card-body px-0">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        @lang('address.address_name')
                                                    </span>
                                                </div>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="@lang('address.enter_name')" required>
                                            </div>
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend ">
                                                    <span class="input-group-text">
                                                        @lang('address.address_type')
                                                    </span>
                                                </div>
                                                <select name="addresstype_id" class="form-control">
                                                @foreach($addresstypes as $addresstype)
                                                <option value="{{$addresstype->id}}">
                                                    {{$addresstype->name}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend ">
                                                    <span class="input-group-text">
                                                        @lang('address.image')
                                                    </span>
                                                </div>
                                                <input style="opacity: 1; position: initial;line-height:29px;" type="file" name="photos[]" class="form-control"  multiple="multiple" accept="image/*">
                                            </div>
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend ">
                                                    <span class="input-group-text">
                                                         @lang('address.address_detail')
                                                    </span>
                                                </div>
                                                <input type="text" name="detail" class="form-control"
                                                    placeholder="@lang('address.address_detail')" required> 
                                                <button class="btn btn-success ml-1" type="button" data-toggle="modal" data-target="#location" data-backdrop="static" data-keyboard="false" style="margin-left:0!important;border-radius:0 5px 5px 0;"><i class="fa fa-map-marker-alt" aria-hidden="true"></i> @lang('address.pin_address')</button>
                                            </div>
                                            <input type="hidden" name="location" class="form-control rounded-right" placeholder="Chọn vị trí trên bản đồ" readonly id="returnLocation">
                                        </div>
                                        <button type="submit" class="btn-submit rounded">@lang('address.register_title')</button> 
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
<!-- location -->
<div class="modal fade" id="location" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">@lang('address.pin_location')</h4>
            </div>
            <div class="modal-body" style="height:55vh;">
                <div id="map"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary mr-auto" onclick="getLocation().then(data=>{$('#returnLocation').val(data[0]+','+data[1])});$('#location').modal('hide');">@lang('address.current_location')</button>
                <button type="button" class="btn btn-primary" data-location="" id="selectLocation" onclick="$('#returnLocation')">@lang('address.choose')</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('error.close')</button>
            </div>
        </div>
    </div>
</div>
<script>
    register = true;
</script>
<style>
    body {
        height: auto;
    }
    .footer-section{
        display:block !important;
    }
    .breadcrumb-banner{
        margin-top:0 !important;
        
    }
</style>
@endsection

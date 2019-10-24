@extends('layouts.app')
@section('content')
<!-- breadcrumb section start -->
<section class="breadcrumb-banner bg-cover bg-overlay parallax-2" style="background-image: url('{{asset('assets/img/breadcrumb_bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-sm-12">
                <div class="breadcrumb-inner text-center">
                    <h2>@lang('address.register_title')</h2>
                    <!-- register section start -->
                    <div class="registar-area section-padding">
                        <div class="container">
                            <div class="row ">
                                <div class="col-xl-8 col-sm-12 col-md-8 offset-lg-2 offset-md-2">
                                    <div class="registar-form ">
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
                                        <form action="/manager/address/register" class="row" method='post' enctype="multipart/form-data">
                                            @csrf
                                           
                                            <div class="card-body" style="height:400px">
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            Tên địa chỉ
                                                        </span>
                                                    </div>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="*Nhập địa chỉ của bạn">
                                                </div>
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text">
                                                            Loại địa chỉ
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
                                                            Ảnh
                                                        </span>
                                                    </div>
                                                    <input style="opacity: 1; position: initial;" type="file"
                                                        name="file" class="form-control">
                                                </div>
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text">
                                                            Địa chỉ chi tiết
                                                        </span>
                                                    </div>
                                                    <input type="text" name="detail" class="form-control"
                                                        placeholder="Địa chỉ chi tiết"> 
                                                </div>
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <!-- <i class="material-icons">face</i> -->
                                                            Vị trí của bạn
                                                        </span>
                                                    </div>
                                                    <input type="text" name="location" class="form-control rounded-right"
                                                        placeholder="Location">
                                                    <button class="btn col-3 btn-success ml-1">Chọn trên bản đồ</button>
                                                    <button class="btn col-3 btn-success ml-1">Vị trí hiện tại</button>
                                                </div>
                                            </div>
                   
                             
                                    <button type="submit" class="btn-submit rounded">@lang('address.register')</button> 
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
@endsection

@extends('layouts.app')
@section('content')
<section class="breadcrumb-banner bg-cover parallax-2 page-header header-filter"
    style="background-image: url({{asset(config('files.uri.background'))}})">
<div class="main main-raised">
    <div class="profile-content pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                    <div class="profile">

                    </div>
                </div>
            </div>
            <div class="row mt-5 ">
                <div class="col-md-12 m-auto  position-relative ">
                    <div class="card card-stats addresslist pl-5" style="background: #343a40; opacity:0.6" >
                    <div class="row">
                    <div class=" card-header-icon">
                            <div class="card-image card-icon">
                                <img src="{{config('files.uri.photo_encrypted')}}{{$address->photos[0]}}" alt="">
                            </div>
                            
                        </div>

                        
                        <div class="card-body text-left text-white mt-4">
                        <h2 class="card-title text-white">{{$address->name}}</h2>
                            <p>Loại địa chỉ : {{$address->type_str}} </p>
                            <p>Địa chỉ chi tiết : {{$address->detail}}</p>
                            <p>Trạng thái :
                                @if($address->verfied == 0)
                                chưa xác minh
                                @else đã xác minh
                                @endif
                            </p>
                            <p>Ngày đăng ký : 
                                {{$address->created_at}}
                            </p>
                        </div></div>
                       
                        @if($address->verified == 2)
                        <div class="row">
                            <div class="col-md-2 card-btn">
                                <button type="button" class="btn btn-success my-3 btn-edit"
                                    data-href="/manager/address/{{$address->id}}">Update now</button>
                            </div>
                        </div>
                        @endif
                        <div class="card-footer position-absolute">
                            <div class="stats text-white">
                                @if($address->updated_at == NULL)
                                Last Change at {{$address->created_at}}
                                @else
                                Last Change at {{$address->updated_at}}
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
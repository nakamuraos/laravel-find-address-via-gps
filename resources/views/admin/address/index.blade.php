@extends('admin.app')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="lnr-apartment icon-gradient bg-sunny-morning">
                </i>
            </div>
            <div>@lang('address.address_manager')
                <div class="page-title-subheading">@lang('address.desp_manager').
                </div>
            </div>
        </div>
        <div class="page-title-actions">
        </div>
    </div>
</div>            
<div class="main-card mb-3 card list-address-area">
    <div class="card-body">
        <div class="features" style="position:relative">
            <div class="row">
                @foreach($addresses as $address)
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="card-shadow-primary card-border mb-3 card">
                        <a href="address/{{$address->id}}">
                        <div class="dropdown-menu-header">
                            <div class="dropdown-menu-header-inner bg-focus" style="min-height:150px;">
                                <div class="menu-header-image opacity-5" style="filter:none;background-image: url({{uriPhoto($address->photos)}});"></div>
                                <div class="menu-header-content">
                                    <div><h5 class="menu-header-title">{{$address->name}} <i class="fa fa-fw" aria-hidden="true" title="Verified">@if($address->verified == 1)  @else  @endif</i></h5></div>
                                </div>
                            </div>
                        </div>
                        </a>
                        <div class="">
                            <div class="ps ps--active-y">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left center-elem mr-2"><i class="lnr-map-marker"></i></div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">{{$address->detail}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left center-elem mr-2"><i class="lnr-user"></i></div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">@lang('address.owned_by') {{$address->user->full_name}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left center-elem mr-2"><i class="lnr-clock"></i></div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">{{$address->created_at}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 200px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 123px;"></div></div></div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-3">
                    <div class="info">
                        <div class="image" style="background:url({{uriPhoto($address->photos)}});height: 200px;background-size: cover;">
                        </div>
                        <h4 class="info-title">{{$address->name}}</h4>
                        <p class="text-center p-0">
                            <a href="address/{{$address->id}}" class="btn border-pink">Detail</a>
                        </p>
                    </div>
                </div> -->
                @endforeach
            </div>
        </div>
        {{$addresses->links()}}
    </div>
</div>
@endsection
@push('scripts')
<script>
    // Click edit button
    $('.btn-edit').click(function (e) {
        e.preventDefault();
        resetFormModal($(this).data('href'));

        $('#editModal').modal({
            backdrop: 'static',
            show: true
        });
    });
</script>
@endpush

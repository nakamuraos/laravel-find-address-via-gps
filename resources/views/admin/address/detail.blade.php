@extends('admin.app')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="lnr-magic-wand icon-gradient bg-mixed-hopes"></i>
            </div>
            <div>
                Address details
                <div class="page-title-subheading">
                    View details of address: verify, delete or send a request update to user.
                </div>
            </div>
        </div>
        <div class="page-title-actions"></div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Details and Actions</h5>
                <div class="row">
                    <div class="col">
                        <div class="vertical-time-icons vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                            <div class="vertical-timeline-item vertical-timeline-element">
                                <div>
                                    <div class="vertical-timeline-element-icon bounce-in">
                                        <div class="timeline-icon border-success bg-success">
                                            <i class="fa fa-map-signs text-white"></i>
                                        </div>
                                    </div>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <h4 class="timeline-title text-success">{{$address->name}}</h4>
                                        <p>The name of address</p>

                                    </div>
                                </div>
                            </div>
                            <div class="vertical-timeline-item vertical-timeline-element">
                                <div>
                                    <div class="vertical-timeline-element-icon bounce-in">
                                        <div class="timeline-icon border-secondary bg-secondary">
                                            <i class="fa fa-fw text-white" aria-hidden="true" title=""></i>
                                        </div>
                                    </div>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <h4 class="timeline-title">{{$address->detail}}</h4>
                                        <p>Detail of address</p>

                                    </div>
                                </div>
                            </div>
                            <div class="vertical-timeline-item vertical-timeline-element">
                                <div>
                                    <div class="vertical-timeline-element-icon bounce-in">
                                        <div class="timeline-icon border-secondary bg-secondary">
                                            <i class="fa fa-fw text-white" aria-hidden="true" title=""></i>
                                        </div>
                                    </div>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <h4 class="timeline-title">{{$address->created_at}}</h4>
                                        <p>Date of address creation</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="vertical-time-icons vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                            <div class="vertical-timeline-item vertical-timeline-element">
                                <div>
                                    <div class="vertical-timeline-element-icon bounce-in">
                                        <div class="timeline-icon border-secondary bg-secondary">
                                        <i class="fa fa-fw text-white" aria-hidden="true" title=""></i>
                                        </div>
                                    </div>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <h4 class="timeline-title">{{$address->user->full_name}}</h4>
                                        <p>The person who owns this address</p>

                                    </div>
                                </div>
                            </div>
                            <div class="vertical-timeline-item vertical-timeline-element">
                                <div>
                                    <div class="vertical-timeline-element-icon bounce-in">
                                        <div class="timeline-icon @if($address->verified == 1) border-success bg-success @else border-warning bg-warning @endif">
                                            <i class="fa fa-fw text-white" aria-hidden="true" title=""></i>
                                        </div>
                                    </div>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <h4 class="timeline-title @if($address->verified == 1) text-success @else text-warning @endif">
                                            @switch($address->verified)
                                            @case(0)
                                            <b>@lang('address.notyet_verified')</b>
                                            @break
                                            @case(1)
                                            <b>@lang('address.verified')</b>  
                                            @break
                                            @default
                                            <b>@lang('address.waiting_update')</b><br />
                                            @endswitch
                                        </h4>
                                        <p>Status verify of address</p>

                                    </div>
                                </div>
                            </div>
                            <div class="vertical-timeline-item vertical-timeline-element">
                                <div>
                                    <div class="vertical-timeline-element-icon bounce-in">
                                        <div class="timeline-icon border-secondary bg-secondary">
                                            <i class="fa fa-location-arrow text-white"></i>
                                        </div>
                                    </div>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <a href="/maps?destination={{$address->location}}" class="text-secondary" target="_blank"><h4 class="timeline-title">{{$address->location}}</h4></a>
                                        <p>Location of address</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="text-center">
                @if(!$address->verified)
                    <button type="button" class="btn btn-primary btn-request-update" data-href="{{$address->id}}/verify/2">@lang('address.request_update')</button>
                    <button type="button" class="btn btn-success btn-verify" data-toggle="modal" data-target="#modalVerify" data-href="{{$address->id}}/verify/1">
                        @lang('address.verify')
                    </button>
                @else
                    No need to do anything here
                @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">   
    <div class="col-md-12">     
        <div class="main-card mb-3 card">
            <div class="card-body">
            <h5 class="card-title">Gallery photos</h5>
                <div class="slick-slider-variable">
                    @foreach(arrUriPhotos($address->photos) as $photo)
                    <div style="display:none">
                        <div class="slider-item">
                            <p><img src="{{$photo}}" style="height:300px;"/></p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.slick-track {
    height: 300px;
}
</style>
@endsection
@push('scripts')
<script>
    // Click request button
    $('.btn-request-update').click(function (e) {
        e.preventDefault();
        resetFormModal($(this).data('href'));

        $('#requestUpdateModal').modal({
            backdrop: 'static',
            show: true
        });
    });
    
    // Click verified button
    $('.btn-verify').click(function (e) {
        e.preventDefault();
        resetFormModal($(this).data('href'));

        $('#modalVerify').modal({
            backdrop: 'static',
            show: true
        });
    });
</script>
@endpush

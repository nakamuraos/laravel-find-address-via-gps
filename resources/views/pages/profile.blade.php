@extends('layouts.app')
@section('content')
<section class="breadcrumb-banner bg-cover parallax-2 page-header header-filter" style="background-image: url({{asset(config('files.uri.background'))}})">
    <div class="main main-raised">
        <div class="profile-content pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <div class="profile">
                            <h3 class="text-white">Profile</h3>
                        </div>
                    </div>
                </div>
                <div class="row mt-4 ">
                    <div class="col-md-12  position-relative " >
                        <div class="card card-stats"
                            style="background: #343a40; opacity:0.8; width:60%;margin:0 auto;padding-left:10%">
                            <div class="row">
                                <div class="card-body text-left text-white" style="margin-top:15%">
                                    <p>Username : {{$user->user_name}}</p>
                                    <p>Fullname : {{$user->full_name}}</p>
                                    <p>Phone : {{$user->phone}}</p>
                                    <p>Email : {{$user->email}}</p>
                                </div>
                            </div>
                            <div class="card-footer position-absolute" style="width:70%">
                                <div class="stats text-white">
                                    <button type="button" class="btn my-3 btn-success" data-toggle="modal" data-target="#editModal">Update now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal edit -->
<div class="modal fade" id="editModal" role="dialog" aria-labelledby="editModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <form id="editForm" action="profile" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Update Profile</h5>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    Fullname
                                </span>
                            </div>
                            <input type="text" name="full_name" class="form-control" placeholder="@lang('auth.full_name')*">
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    Phone
                                </span>
                            </div>
                            <input type="text" name="phone" class="form-control" placeholder="@lang('auth.phone_number')*">
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding:1rem 0.5rem">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
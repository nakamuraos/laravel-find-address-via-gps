@extends('layouts.app')
@section('content')
<section class="breadcrumb-banner bg-cover parallax-2 page-header header-filter"
    style="background-image: url({{asset(config('files.uri.background'))}})">
    <div class="main main-raised">
        <div class="profile-content pt-5">
            <div class="container">
            
                <div class="row ">
                    <div class="col-7 m-auto">
                    @include('common.errors')
                    </div>
                
                </div>
                <div class="row mt-4 ">
                    <div class="col-md-12  position-relative ">

                        <div class="card card-stats"
                            style="background:none; width:60%;margin:0 auto;padding-left:10%; box-shadow:1px 1px 6px 10px #969494">
                            <div class="profile mt-3" style="margin-left:-10%;">
                                <h3 class="text-white" style="font-size:28px;"> @lang('auth.profile')</h3>
                            </div>
                            
                            <div class="row">
                                <div class="card-body text-left text-white" style="margin-top:10%">
                                    <p>
                                        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="user"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="svg-inline--fa fa-user fa-w-14 fa-3x normal-icon">
                                            <path fill="currentColor"
                                                d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z"
                                                class=""></path>
                                        </svg>
                                        @lang('auth.username') : {{$user->user_name}}
                                    </p>
                                    <p>
                                        <svg aria-hidden="true" focusable="false" data-prefix="fal"
                                            data-icon="file-signature" role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 576 512"
                                            class="svg-inline--fa fa-file-signature fa-w-18 fa-3x normal-icon">
                                            <path fill="currentColor"
                                                d="M560.83 135.96l-24.79-24.79c-20.23-20.24-53-20.26-73.26 0L384 189.72v-57.75c0-12.7-5.1-25-14.1-33.99L286.02 14.1c-9-9-21.2-14.1-33.89-14.1H47.99C21.5.1 0 21.6 0 48.09v415.92C0 490.5 21.5 512 47.99 512h288.02c26.49 0 47.99-21.5 47.99-47.99v-80.54c6.29-4.68 12.62-9.35 18.18-14.95l158.64-159.3c9.79-9.78 15.17-22.79 15.17-36.63s-5.38-26.84-15.16-36.63zM256.03 32.59c2.8.7 5.3 2.1 7.4 4.2l83.88 83.88c2.1 2.1 3.5 4.6 4.2 7.4h-95.48V32.59zm95.98 431.42c0 8.8-7.2 16-16 16H47.99c-8.8 0-16-7.2-16-16V48.09c0-8.8 7.2-16.09 16-16.09h176.04v104.07c0 13.3 10.7 23.93 24 23.93h103.98v61.53l-48.51 48.24c-30.14 29.96-47.42 71.51-47.47 114-3.93-.29-7.47-2.42-9.36-6.27-11.97-23.86-46.25-30.34-66-14.17l-13.88-41.62c-3.28-9.81-12.44-16.41-22.78-16.41s-19.5 6.59-22.78 16.41L103 376.36c-1.5 4.58-5.78 7.64-10.59 7.64H80c-8.84 0-16 7.16-16 16s7.16 16 16 16h12.41c18.62 0 35.09-11.88 40.97-29.53L144 354.58l16.81 50.48c4.54 13.51 23.14 14.83 29.5 2.08l7.66-15.33c4.01-8.07 15.8-8.59 20.22.34C225.44 406.61 239.9 415.7 256 416h32c22.05-.01 43.95-4.9 64.01-13.6v61.61zm27.48-118.05A129.012 129.012 0 0 1 288 384v-.03c0-34.35 13.7-67.29 38.06-91.51l120.55-119.87 52.8 52.8-119.92 120.57zM538.2 186.6l-21.19 21.19-52.8-52.8 21.2-21.19c7.73-7.73 20.27-7.74 28.01 0l24.79 24.79c7.72 7.73 7.72 20.27-.01 28.01z"
                                                class=""></path>
                                        </svg>
                                        @lang('auth.fullname') : {{$user->full_name}}
                                    </p>
                                    <p>
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="phone-alt" role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512"
                                            class="svg-inline--fa fa-phone-alt fa-w-16 fa-2x normal-icon">
                                            <path fill="currentColor"
                                                d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"
                                                class=""></path>
                                        </svg>
                                        @lang('auth.phone') : {{$user->phone}}
                                    </p>
                                    <p>
                                        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="envelope"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="svg-inline--fa fa-envelope fa-w-16 fa-3x normal-icon">
                                            <path fill="currentColor"
                                                d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"
                                                class=""></path>
                                        </svg>
                                        Email : {{$user->email}}
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer position-absolute" style="width:70%">
                                <div class="stats text-white">
                                    <button type="button" class="btn my-3 text-white"
                                        style="background-color:#343a40; border: 1px solid #484848;" data-toggle="modal"
                                        data-target="#editModal">@lang('auth.update_now')</button>
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
                    <h5 class="modal-title" id="editModalLabel">@lang('auth.update_profile')</h5>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    @lang('auth.fullname')
                                </span>
                            </div>
                            <input type="text" name="full_name" class="form-control"
                                placeholder="@lang('auth.full_name')*" required>
                              
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    @lang('auth.phone')
                                </span>
                                
                            </div>
                            <input type="text" name="phone" class="form-control"
                                placeholder="@lang('auth.phone_number')*" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding:1rem 0.5rem">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('auth.cancel')</button>
                    <button type="submit" class="btn btn-success">@lang('auth.update')</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

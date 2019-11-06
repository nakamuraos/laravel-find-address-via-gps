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
                <div class="row mt-4 ">
                    <div class="col-md-12  position-relative " >
                        <div class="card card-stats"
                            style="background: #343a40; opacity:0.8; width:60%;margin:0 auto;padding-left:10%">
                            <div class="row">
                                <div class="card-header-icon mt-3" style="margin-left: -10%; ">
                                    <h3 class="text-white">Profile</h3>
                                </div>
                                    <div class="card-body text-left text-white" style="margin-top:15%">
                                        <p>Username : {{$user->user_name}}</p>
                                        <p>Fullname : {{$user->full_name}}</p>
                                        <p>Phone : {{$user->phone}}</p>
                                        <p>Email : {{$user->email}}</p>
                                    </div>
                                </div>
                                <div class="card-footer position-absolute" style="width:70%">
                                    <div class="stats text-white">
                                    <button type="button" class="btn my-3 btn-edit" 
                                    data-href="/user/profile/update">Update now</button>
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
        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Update Product</h5>
                </div>
                <div class="modal-body">
                    <form id="editForm" class="row" method="post" enctype="multipart/form-data"
                        onSubmit="return checkFormRegisterAddress();">
                        @csrf
                        <div class="card-body" style="height:400px">
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Username
                                    </span>
                                </div>
                                <input type="text" name="user_name" class="form-control" placeholder="*Enter your username">
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Fullname
                                    </span>
                                </div>
                                <input type="text" name="full_name" class="form-control" placeholder="*Enter your fullname">
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Phone
                                    </span>
                                </div>
                                <input type="text" name="phone" class="form-control" placeholder="*Enter your phone">
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Email
                                    </span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="*Enter your email">
                            </div>
                           
                    </form>
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
@push('scripts')
<script>
    // Click edit button
    $('.btn-edit').click(function (e) {
        e.preventDefault();
        resetFormModal($(this).data('href'));

        // Fill default value
        // var row = $(this).parent().parent().parent();
        // var col = row.find('td');
        // console.log(row);
        // console.log(col);
        // $('#editForm input[name="user_name"]').val(col[1].innerText.trim());
        // $('#editForm input[name="full_name"]').val(col[2].innerText.trim());
        // $('#editForm input[name="phone"]').val(col[3].innerText);
        // $('#editForm input[name="email"]').val(col[4].innerText);

        $('#editModal').modal({
            backdrop: 'static',
            show: true
        });
    });

</script>
@endpush


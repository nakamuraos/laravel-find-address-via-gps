@extends('layouts.app')
@section('content')
    <div class="page-header header-filter" data-parallax="true"
        style="background-image: url('{{asset('assets/img/breadcrumb_bg.jpg') }}')">
    </div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <div class="profile">
                            <div class="avatar text-center">
                                <img src="/assets/img/1570964090.jpg" alt="Circle Image"
                                    class="img-raised rounded-circle img-fluid ">
                            </div>
                            <div class="name">
                                <h3 class="title">Hi Hien</h3>
                                <h6>This is the list of your address</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    @foreach($addresses as $address)
                    <div class="col-md-6">
                        <div class="card card-stats addresslist" style="background: #646262;">
                            <div class=" card-header-icon">
                                <div class="card-image card-icon">
                                    <img src="{{config('files.uri.photo_encrypted')}}{{$address->photos[0]}}" alt="">
                                </div>
                                <h3 class="card-title">{{$address->name}}</h3>
                            </div>
                            <div class="card-body text-left text-white">
                                <p>Loại địa chỉ : {{$address->type_str}} </p>
                                <p>Địa chỉ chi tiết : {{$address->detail}}</p>
                                <p>Trạng thái :
                                    @if($address->verfied == 0)
                                    chưa xác minh
                                    @else đã xác minh
                                    @endif
                                </p>
                            </div>
                            @if($address->verified == 2)
                            <div class="row">
                                <div class="col-md-2 card-btn">
                                    <button type="button" class="btn btn-success my-3 btn-edit"
                                        data-href="/manager/address/{{$address->id}}">Update now</button>
                                </div>
                            </div>
                            @endif
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i> Last 24 Hours
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="ModalNotification" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Notification</h4>
                </div>
                @foreach($addresses as $address)
                @if($address -> verified == 2)
                <b class="ml-4 mt-3">You must update {{$address->name}}</b>
                @endif
                @endforeach
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
    </div>
    <footer class="footer footer-default " id="contact" style="padding-bottom:100px">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </footer>
    <div class="modal" id="editModal" role="dialog" aria-labelledby="editModalLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Update Product</h5>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" class="row" method='post' enctype="multipart/form-data">
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
                                    <input style="opacity: 1; position: initial;" type="file" name="file"
                                        class="form-control">
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
                                    <button class="btn col-4 btn-success ml-1">Chọn trên bản đồ</button>
                                    <button class="btn col-4 btn-success ml-1 ">Vị trí hiện tại</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer" style="padding:1rem 0.5rem">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
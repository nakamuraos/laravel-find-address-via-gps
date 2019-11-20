@extends('layouts.app')
@section('content')
<section class="breadcrumb-banner bg-cover parallax-2 page-header header-filter"
    style="margin-top: 50px;background-image: url({{asset(config('files.uri.background'))}});">
    <div class="col-lg-10 col-md-12 m-auto">
        <div class="card mt-5" style="height:500px; background:none">
            <div class="card-header card-header-tabs card-header-primary ">
                <div class="nav-tabs-wrapper row mx-1 py-3">
                    <div class="text-white col-10 text-left pl-4">
                        <h4 class="nav-tabs-title text-white">Hi {{Auth::user()->full_name}}</h4>
                        <span>This is your list address</span>
                    </div>

                    <span class="float-right mt-0 col-2 dropdown">
                        <span class="dropdown-toggle" id="noti" data-toggle="dropdown">
                        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="bell" role="img"
                            style="width: 24px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                            class="svg-inline--fa fa-bell fa-w-14 fa-3x " >
                            <path fill="currentColor"
                                d="M439.39 362.29c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71zM67.53 368c21.22-27.97 44.42-74.33 44.53-159.42 0-.2-.06-.38-.06-.58 0-61.86 50.14-112 112-112s112 50.14 112 112c0 .2-.06.38-.06.58.11 85.1 23.31 131.46 44.53 159.42H67.53zM224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64z"
                                class=""></path>
                        </svg>
                        </span>
                        
                        <span class="badge badge-notify">{{@count($notifications)}}</span>
                        <div class="dropdown-menu noti-dropdown px-3">
                            <b>Notification</b>
                            @foreach($notifications as $n)
                            <p class="dropdown-item border-bottom">You must update{{$n->name}}</p>
                            @endforeach
                        </div>
                    </span>
                </div>
            </div>
            <div class="card-body">
                <table class="table" >
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Name</td>
                            <td class="text-center">Options</td>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($addresses as $key=>$address)
                        <tr>
                            <td>
                                {{ (($addresses->currentPage() - 1 ) * $addresses->perPage()) + ($key+1) }}
                            </td>
                            <td>{{$address->name}}</td>
                            <td class="td-actions text-center">
                                <a style="color:#4caf50" href="address/{{$address->id}}">Detail</a>
                                <button type="button" rel="tooltip" data-href="address/{{$address->id}}"
                                    class="btn btn-edit btn-sm btn-edit " data-original-title="Edit Task">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn btn-remove  btn-sm px-2" data-toggle="modal"
                                    data-target="#modalDelete" data-href="address/{{$address->id}}"><i class="material-icons">delete</i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            {{$addresses->links()}}
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
                                        Tên địa chỉ
                                    </span>
                                </div>
                                <input type="text" name="name" class="form-control" placeholder="*Nhập địa chỉ của bạn" required>
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
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Ảnh
                                    </span>
                                </div>
                                <input style="opacity: 1; position: initial;" type="file" name="file"
                                    class="form-control">
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Địa chỉ chi tiết
                                    </span>
                                </div>
                                <input type="text" name="detail" class="form-control" placeholder="Địa chỉ chi tiết"
                                    required>
                                <button class="btn col-4 btn-success ml-1" type="button" data-toggle="modal"
                                    data-target="#location" data-backdrop="static" data-keyboard="false"
                                    style="margin-left:0!important;border-radius:0 5px 5px 0;">Chọn trên bản đồ</button>
                            </div>
                            <input type="hidden" name="location" class="form-control rounded-right"
                                placeholder="Chọn vị trí trên bản đồ" readonly id="returnLocation">
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
<!-- location -->
<div class="modal fade" id="location" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ghim một vị trí trên bản đồ</h4>
            </div>
            <div class="modal-body" style="height:55vh;">
                <div id="map"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary mr-auto"
                    onclick="getLocation().then(data=>{$('#returnLocation').val(data[0]+','+data[1])});$('#location').modal('hide');">Vị
                    trí hiện tại</button>
                <button type="button" class="btn btn-primary" data-location="" id="selectLocation"
                    onclick="$('#returnLocation')">Chọn</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('error.close')</button>
            </div>
        </div>
    </div>
</div>

<script>
    register = true;
    
</script>
<!-- Modal delete-->
<div id="modalDelete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="display: block;">
                <button type="button" class="close" data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title">Xác nhận xóa</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có thực sự muốn xóa?</p>
            </div>
            <div class="modal-footer">
                <form id="delete" method="post" action="">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát
                    </button>
                    <button type="submit" class="btn btn-danger">Xóa
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
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
    .table{
        color: #fff !important;
    }
    .btn.btn-edit{
        color:#fff;
        background:none;
    }
    .btn.btn-remove{
        color:#ea6161;
    }
    .pagination{
        bottom: -25px !important;
        right:0;
    }
    .page-link{
        background:none !important;
        border:none !important;
        border-radius:30px !important;
        width:38px !important;
        text-align:center;
        
    }
</style>
@endsection

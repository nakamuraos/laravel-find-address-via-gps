@extends('layouts.app')
@section('content')
<section class="breadcrumb-banner bg-cover parallax-2 page-header header-filter" style="margin-top: 50px;background-image: url({{asset(config('files.uri.background'))}})">
    <div class="col-lg-10 col-md-12 m-auto">
        <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
                <div class="nav-tabs-wrapper" style="color: #fff">
                    <span class="nav-tabs-title">Hi Hiền</span>
                    <p>This is your list address</p>

                </div>
            </div>
            <div class="card-body">
                <table class="table">
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
                                <a  style="color:#4caf50" href="address/{{$address->id}}">Detail</a>
                                </div>
                                <button type="button" rel="tooltip" data-href="address/update/{{$address->id}}"
                                    class="btn btn-edit btn-sm btn-edit " data-original-title="Edit Task">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" rel="tooltip" title="" class="btn btn-remove btn-sm"
                                    data-original-title="Remove" aria-describedby="tooltip102821">
                                    <i class="material-icons">close</i>
                                </button>
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
                    <form id="editForm" class="row" method="post" enctype="multipart/form-data" onSubmit="return checkFormRegisterAddress();">
                        @csrf
                        <div class="card-body" style="height:400px">
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Tên địa chỉ
                                    </span>
                                </div>
                                <input type="text" name="name" class="form-control" placeholder="*Nhập địa chỉ của bạn">
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
                                <input type="text" name="detail" class="form-control"
                                    placeholder="Địa chỉ chi tiết" required> 
                                <button class="btn col-4 btn-success ml-1" type="button" data-toggle="modal" data-target="#location" data-backdrop="static" data-keyboard="false" style="margin-left:0!important;border-radius:0 5px 5px 0;">Chọn trên bản đồ</button>
                            </div>
                            <input type="hidden" name="location" class="form-control rounded-right" placeholder="Chọn vị trí trên bản đồ" readonly id="returnLocation">
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
                <button type="button" class="btn btn-primary mr-auto" onclick="getLocation().then(data=>{$('#returnLocation').val(data[0]+','+data[1])});$('#location').modal('hide');">Vị trí hiện tại</button>
                <button type="button" class="btn btn-primary" data-location="" id="selectLocation" onclick="$('#returnLocation')">Chọn</button>
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
</style>
@endsection

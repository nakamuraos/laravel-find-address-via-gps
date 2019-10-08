@extends('admin.app')
@section('content')
<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2>Address detail</h2>
            @if(session()->has("success"))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
                <span> {{ session("success") }}</span>
            </div>
            @endif
            @include("common.errors")
            <div class="container">
                <!-- column left -->
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pb-5">

                    <div class="row">
                        <div class=" image col-12 col-sm-12 col-md-4 col-lg-4 col-sl-4">
                            <img src="{{$address->image}}" alt="">
                        </div>
                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-sl-8">
                            <div class="pro-item">
                                <p class="pro-item-title">
                                    Tên địa chỉ : <b>{{$address->name}}</b>
                                </p>
                            </div>
                            <div class="pro-item-price">
                                Chi tiết địa chỉ : <b>{{$address->detail}}</b>
                            </div>

                            <div class="pro-item-option">
                                <button type="button" class="btn btn-primary btn-edit"
                                    data-href="/address/update/{{$address->id}}">Sửa</button>
                                <button type="button" class="btn btn-primary  my-4 " data-toggle="modal"
                                    data-target="#modalDelete{{$address->id}}">
                                    Xóa
                                </button>
                                <!-- Modal -->
                                <div id="modalDelete{{$address->id}}" class="modal fade" role="dialog">
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
                                                <form action="/address/destroy/{{$address->id}}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Thoát
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">Xóa
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shield-check"
                                style="width: 24px" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="svg-inline--fa fa-shield-check fa-w-16 fa-3x">
                                <path fill="currentColor"
                                    d="M466.5 83.7l-192-80a48.15 48.15 0 0 0-36.9 0l-192 80C27.7 91.1 16 108.6 16 128c0 198.5 114.5 335.7 221.5 380.3 11.8 4.9 25.1 4.9 36.9 0C360.1 472.6 496 349.3 496 128c0-19.4-11.7-36.9-29.5-44.3zm-47.2 114.2l-184 184c-6.2 6.2-16.4 6.2-22.6 0l-104-104c-6.2-6.2-6.2-16.4 0-22.6l22.6-22.6c6.2-6.2 16.4-6.2 22.6 0l70.1 70.1 150.1-150.1c6.2-6.2 16.4-6.2 22.6 0l22.6 22.6c6.3 6.3 6.3 16.4 0 22.6z"
                                    class=""></path>
                            </svg>
                            Status :
                            @if($address->status)
                            <b>verified</b>
                            @else <b>not verifed</b>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <!-- column right -->
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3"></div>
        </div>
    </div>
</div>
</div>
<!-- Modal edit -->
<div class="modal" id="editModal" role="dialog" aria-labelledby="editModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Cập nhật</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="margin-top:0; margin-bottom:0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 pr-1">
                                            <div class="form-group">
                                                <!-- <label>Tên địa chỉ </label> -->
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Tên địa chỉ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 pr-1">
                                            <div class="form-group">
                                                <label >Loại địa chỉ</label>
                                                <select name="addresstype_id" class="form-control">
                                                    @foreach($addresstypes as $addresstype)
                                                    <option value="{{$addresstype->id}}">
                                                        {{$addresstype->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 pr-1">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Ảnh</label>
                                                <input style="opacity: 1; position: initial;" type="file" name="file"
                                                    class="form-control">
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 pr-1">
                                                    <div class="form-group">
                                                        <!-- <label>Chi tiết địa chỉ</label> -->
                                                        <input type="text" name="detail" class="form-control"
                                                            placeholder="Chi tiết địa chỉ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 pr-1">
                                                    <div class="form-group">
                                                        <!-- <label>Vị trí</label> -->
                                                        <input type="text" name="location" class="form-control"
                                                            placeholder="Vị trí">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 pr-1">
                                                    <div class="form-group">
                                                        <!-- <label class="bmd-label-floating">Mã người dùng</label> -->
                                                        <input type="text" name="user_id" class="form-control" placeholder="Mã người dùng">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
@push('scripts')
<script>
    // Click edit button
    $('.btn-edit').click(function (e) {
        e.preventDefault();
        resetFormModal($(this).data('href'));

        // Fill default value
        var row = $(this).parent().parent().parent();
        var col = row.find('td');
        console.log(row);
        console.log(col);
        // $('#editForm input[name="name"]').val(col[1].innerText);
        // $('#editForm input[name="addresstype_id"]').val(col[2].innerText);
        // $('#editForm input[name="detail"]').val(col[4].innerText);
        // $('#editForm input[name="loacation"]').val(col[5].innerText);
        // $('#editForm input[name="user_id"]').val(col[7].innerText);

        $('#editModal').modal({
            backdrop: 'static',
            show: true
        });
    });

</script>
@endpush
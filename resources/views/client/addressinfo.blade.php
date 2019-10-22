<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('admin/assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Material Kit by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('admin/assets/css/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/material-kit.css?v=2.0.5') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('admin/assets/demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="landing-page sidebar-collapse">
    @if(session()->has("success"))
    <div class="alert alert-secondary alert-dismissible fade show "
        style="position: fixed; z-index: 999; right: 40%; top: -40%;">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" role="img"
            style="width:30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
            class="svg-inline--fa fa-check-circle fa-w-16 fa-3x">
            <path fill="currentColor"
                d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"
                class=""></path>
        </svg>
        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
            <!-- <i class="nc-icon nc-simple-remove"></i> -->
            <i class="material-icons">close</i>
        </button>
        <span> {{ session("success") }}</span>
    </div>
    @endif
    <div class="fixed-top">
        <div class="navbar  navbar-expand-lg navbar-transparent navbar-color-on-scroll d-flex flex-column"
            color-on-scroll="100" id="sectionsNav">
            <div class="container-fluid">
                <div class="navbar-translate">
                    <h3 class="text-white"><b>Hệ thống tìm kiếm địa chỉ theo định vị</b></h3>
                </div>
                <div class="collapse navbar-collapse pr-5">
                    <ul class="navbar-nav ml-auto">
                        <li>
                            <form action="" method="GET" class="form-group form-inline bmd-form-group" id="search">
                                @csrf
                                <input type="search" value="{{ request()->search }}" name="search" class="form-control"
                                    placeholder="Search">
                                <button class="btn btn-round btn-fab btn-raised btn-whiteo">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </li>
                        <li class="nav-item dropdown ml-3">
                            @if(Auth::user())
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                                href="javascript:void(0)">{{ Auth::user()->user_name }}</a>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-danger">
                                <a class="dropdown-item" href=""><i class="nc-icon nc-single-02"></i>&nbsp; Profile</a>
                                <!-- <a class="dropdown-item" href="blog-posts.html"><i
                                        class="nc-icon nc-bullet-list-67"></i>&nbsp; My posts</a> -->
                                <a class="dropdown-item" href="/logout"><i class="nc-icon nc-bookmark-2"></i>&nbsp;
                                    Logout</a>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#ModalNotification"><i class="nc-icon nc-bookmark-2"></i>&nbsp;
                                    Notification <span class="badge badge-notify">{{count($notification)}}</span></a>
                                
                            </ul>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="page-header header-filter" data-parallax="true"
        style="background-image: url('{{asset('admin/assets/image/breadcrumb_bg.jpg') }}')">
    </div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <div class="profile">
                            <div class="avatar text-center">
                                <img src="../client/assets/img/1570964090.jpg" alt="Circle Image"
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
                                    <img src="{{$address->photos[0]}}" alt="">
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
                                        data-href="updateinfo/{{ $address->id }}">Update now</button>
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
    <!--   Core JS Files   -->
    <script src="{{ asset('admin/assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/plugins/moment.min.js') }}"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="{{ asset('admin/assets/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('admin/assets/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('admin/assets/js/material-kit.js?v=2.0.5x') }}" type="text/javascript"></script>
    <script src="{{ asset('js/script.js') }}"></script>
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
            // $('#editForm input[name="name"]').val(col[1].innerText.trim());
            // $('#editForm input[name="category_id"]').val(col[2].innerText);
            // $('#editForm input[name="provider_id"]').val(col[3].innerText);
            // $('#editForm input[name="promotion_price"]').val(col[4].innerText);
            // $('#editForm input[name="unit_price"]').val(col[5].innerText);
            // $('#editForm input[name="quantity"]').val(col[6].innerText);
            // $('#editForm input[name="image"]').val(col[7].innerText);
            // $('#editForm input[name="description"]').val(col[8].innerText);

            $('#editModal').modal({
                backdrop: 'static',
                show: true
            });
        });

    </script>
</body>

</html>

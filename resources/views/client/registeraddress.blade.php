@extends('client.app')
@section('content')
<div class="page-header header-filter"
    style="background-image: url('../client/assets/img/breadcrumb_bg.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 ml-auto mr-auto" id="register">
                <div class="card card-login">
                    <form class="form" method="POST" action="/register">
                        @csrf
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">Đăng ký</h4>
                            <div class="social-line">
                            </div>
                        </div>

                        <div class="card-body mt-5" style="height:450px">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="user"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="svg-inline--fa fa-user fa-w-14 fa-3x">
                                            <path fill="currentColor"
                                                d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z"
                                                class=""></path>
                                        </svg>
                                    </span>
                                </div>
                                <input type="text" name="name" class="form-control" placeholder="*Nhập địa chỉ của bạn">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="image"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="svg-inline--fa fa-image fa-w-16 fa-3x">
                                            <path fill="currentColor"
                                                d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm-6 336H54a6 6 0 0 1-6-6V118a6 6 0 0 1 6-6h404a6 6 0 0 1 6 6v276a6 6 0 0 1-6 6zM128 152c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zM96 352h320v-80l-87.515-87.515c-4.686-4.686-12.284-4.686-16.971 0L192 304l-39.515-39.515c-4.686-4.686-12.284-4.686-16.971 0L96 304v48z"
                                                class=""></path>
                                        </svg>
                                    </span>
                                </div>
                                <input type="file" name="image" class=" bg-white form-control" placeholder="Chọn file">
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg aria-hidden="true" focusable="false" data-prefix="far"
                                            data-icon="info-square" role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512" class="svg-inline--fa fa-info-square fa-w-14 fa-3x">
                                            <path fill="currentColor"
                                                d="M448 80v352c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V80c0-26.51 21.49-48 48-48h352c26.51 0 48 21.49 48 48zm-48 346V86a6 6 0 0 0-6-6H54a6 6 0 0 0-6 6v340a6 6 0 0 0 6 6h340a6 6 0 0 0 6-6zM224 118c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"
                                                class=""></path>
                                        </svg>
                                    </span>
                                </div>
                                <input type="text" name="detail" class="form-control" placeholder="Mô tả">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="location-circle" role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 496 512"
                                            class="svg-inline--fa fa-location-circle fa-w-16 fa-3x">
                                            <path fill="currentColor"
                                                d="M248 8C111.03 8 0 119.03 0 256s111.03 248 248 248 248-111.03 248-248S384.97 8 248 8zm110.24 169.74l-95.95 207.89c-11.2 23.99-46.38 15.99-46.38-9.59v-87.96h-87.96c-25.59 0-33.58-35.18-9.59-46.38l207.89-95.95c19.2-7.99 39.99 12.8 31.99 31.99z"
                                                class=""></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="col-md-10 col-10">
                                    <select name="" id="" class="col-md-3">
                                        <option value="">Ha Noi</option>
                                        <option value="">Ha Noi</option>
                                        <option value="">Ha Noi</option>
                                    </select>
                                    <select name="" id="" class="col-md-4">
                                        <option value="">Bắc Từ Liêm</option>
                                        <option value="">Ha Noi</option>
                                        <option value="">Ha Noi</option>
                                    </select>
                                    <select name="" id="" class="col-md-4">
                                        <option value="">Minh Khai</option>
                                        <option value="">Ha Noi</option>
                                        <option value="">Ha Noi</option>
                                    </select>
                                </div>
                              
                            </div>



                        </div>
                </div>
                <div class="footer text-center">
                    <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Đăng ký</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>


@endsection

@extends('client.app')
@section('content')
<!-- breadcrumb section start -->
<section class="breadcrumb-banner bg-cover bg-overlay parallax-2"
    style="background-image: url('{{asset('client/assets/img/breadcrumb_bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-sm-12">
                <div class="breadcrumb-inner text-center">
                    <h2>Register Address</h2>
                    <!-- register section start -->
                    <div class="registar-area section-padding">
                        <div class="container">
                            <div class="row ">
                                <div class="col-xl-12 col-md-12">
                                    <div class="registar-form ">
                                        <form action="#" >
                                            <input type="text" name="name" class=" col-md-6  col-12"
                                                placeholder="*Nhập địa chỉ của bạn">
                                            <input type="text" name="image" class=" col-md-6   col-12"
                                                placeholder="Chọn file">
                                            <input type="email" name="detail" class="col-md-6 col-12"
                                                placeholder="Mô tả">
                                            <div class="col-md-6 col-12">
                                                <select name="" id="" class="col-md-3">
                                                    <option value="">Ha Noi</option>
                                                    <option value="">Ha Noi</option>
                                                    <option value="">Ha Noi</option>
                                                </select>
                                                <select name="" id="" class="col-md-3">
                                                    <option value="">Ha Noi</option>
                                                    <option value="">Ha Noi</option>
                                                    <option value="">Ha Noi</option>
                                                </select>
                                                <select name="" id="" class="col-md-3">
                                                    <option value="">Ha Noi</option>
                                                    <option value="">Ha Noi</option>
                                                    <option value="">Ha Noi</option>
                                                </select>
                                            </div>
                                            <button type="submit"
                                                class="btn-submit col-md-6 col-12 m-auto">Register</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- register section end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb section end -->


@endsection

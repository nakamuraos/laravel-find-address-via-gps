@extends('admin.app')
@section('content')
<div class="main main-raised">
    <div class="container">
        <div class="section ">
            <!-- <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <h2 class="title">Let&apos;s talk product</h2>
                <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn&apos;t scroll to get here. Add a button if you want the user to see more.</h5>
            </div>
            </div> -->
            <h2 style="color:#3C4858; font-weight: 700" class="text-center">
                Quản lý địa chỉ
            </h2>
            <div class="features" style="position:relative">

                <div class="row">
                    @foreach($addresses as $address)
                    <div class="col-md-3">
                        <div class="info">
                            <div class="image">
                                <!-- <div id="overlay"> -->
                                    <img src="{{config('files.uri.photo_encrypted')}}{{empty($address->photos)?'/files/photos/quananvat.jpg':$address->photos[0]}}" alt="{{$address->name}}">
                                <!-- </div> -->
                            </div>
                            <h4 class="info-title">{{$address->name}}</h4>
                            <p class="text-center p-0">
                                <a href="address/{{$address->id}}" class="btn border-pink">Detail</a>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection
@push('script')

@endpush

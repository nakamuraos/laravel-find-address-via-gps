@extends('admin.app')
@section('content')
<div class="main main-raised " style="padding-bottom:50px">
    <div class="container">
        <div class="section ">
            <!-- <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <h2 class="title">Let&apos;s talk product</h2>
                <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn&apos;t scroll to get here. Add a button if you want the user to see more.</h5>
            </div>
            </div> -->
            <h2 style="color:#3C4858; font-weight: 700" class="text-center">
               Manage Address
            </h2>
            <div class="features" style="position:relative">

                <div class="row">
                    @foreach($addresses as $address)
                    <div class="col-md-3">
                        <div class="info">
                            <div class="image" style="background:url({{config('files.uri.photo_encrypted')}}{{empty($address->photos)?'/files/photos/quananvat.jpg':$address->photos[0]}});height: 200px;background-size: cover;">
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
    {{$addresses->links()}}
</div>

</div>
@endsection
@push('scripts')
<script>
    // Click edit button
    $('.btn-edit').click(function (e) {
        e.preventDefault();
        resetFormModal($(this).data('href'));

        $('#editModal').modal({
            backdrop: 'static',
            show: true
        });
    });
</script>
@endpush

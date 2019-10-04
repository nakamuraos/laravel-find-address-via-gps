 @extends('client.app') @section('content')
<!-- hero section start -->
<div class="page-header header-filter" style="background-image: url('../client/assets/img/breadcrumb_bg.jpg'); background-size: cover; background-position: top center; position: fixed; width: 100%; height: -webkit-fill-available;"></div>
<div class="container">
    <div class="row">
        <div class="search-tab-wrap" style="margin-top: 135px;">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="container" id="place">
                    <div class="search-form-box">
                        <h3>@lang('home.typetosearch')</h3>
                        <form action="#" class="search-form">
                            <input type="text" placeholder="@lang('home.typetosearch_example')" name="location" id="gps" data-addresstype="" autocomplete="off">
                            <div class="result hide" id="listTypes" style="position: absolute;width:62.7%;background-color:white;overflow:auto;max-height:250px;z-index: 10;"></div>
                            <div class="result hide" id="listPlaces" style="margin-top: -10px;"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- hero section end -->
@endsection
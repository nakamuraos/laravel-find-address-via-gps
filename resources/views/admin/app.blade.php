<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Find address via GPS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="Choose between regular React Bootstrap tables or advanced dynamic ones.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="/assets/admin/css/main.87c0748b313a1dda75f5.css" rel="stylesheet">
    <link href="/assets/admin/css/style.css" rel="stylesheet">
</head>
<body>
    @if(session()->has("success"))
    <div id="toast-container" class="toast-top-right autoHide">
        <div class="toast toast-success alert-dismissible" aria-live="polite" style="">
            <div class="toast-progress" style="width: 100%;"></div>
            <div class="toast-message">{{session("success")}}</div>
        </div>
    </div>
    @endif
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <a href="/"><div class="logo-src"></div></a>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    <div class="app-header__content">
                <div class="app-header-right">
                    <div class="header-dots">
                        <div class="dropdown">
                            <!-- <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                                <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                    <span class="icon-wrapper-bg bg-danger"></span>
                                    <i class="icon text-danger icon-anim-pulse ion-android-notifications"></i>
                                    <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
                                </span>
                            </button> -->
                            <!-- <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                               
                                <div class="dropdown-menu-header mb-0">
                                    <div class="dropdown-menu-header-inner bg-deep-blue">
                                        <div class="menu-header-image opacity-1" style="background-image: url('/assets/images/dropdown-header/city3.jpg');"></div>
                                        <div class="menu-header-content text-dark">
                                            <h5 class="menu-header-title">Notifications</h5>
                                            <h6 class="menu-header-subtitle">You have <b>21</b> unread messages</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-events-header" role="tabpanel">
                                        <div class="scroll-area-sm">
                                            <div class="scrollbar-container">
                                                <div class="p-3">
                                                    <div class="vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-success"> </i></span>
                                                                <div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title">All Hands Meeting</h4>
                                                                    <p>Lorem ipsum dolor sic amet, today at <a href="javascript:void(0);">12:00 PM</a></p><span class="vertical-timeline-element-date"></span></div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-warning"> </i></span>
                                                                <div class="vertical-timeline-element-content bounce-in"><p>Another meeting today, at <b class="text-danger">12:00 PM</b></p>
                                                                    <p>Yet another one, at <span class="text-success">15:00 PM</span></p><span class="vertical-timeline-element-date"></span></div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-danger"> </i></span>
                                                                <div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title">Build the production release</h4>
                                                                    <p>Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut labore et dolore magna elit enim at minim veniam quis nostrud</p><span
                                                                            class="vertical-timeline-element-date"></span></div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-primary"> </i></span>
                                                                <div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title text-success">Something not important</h4>
                                                                    <p>Lorem ipsum dolor sit amit,consectetur elit enim at minim veniam quis nostrud</p><span class="vertical-timeline-element-date"></span></div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-success"> </i></span>
                                                                <div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title">All Hands Meeting</h4>
                                                                    <p>Lorem ipsum dolor sic amet, today at <a href="javascript:void(0);">12:00 PM</a></p><span class="vertical-timeline-element-date"></span></div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-warning"> </i></span>
                                                                <div class="vertical-timeline-element-content bounce-in"><p>Another meeting today, at <b class="text-danger">12:00 PM</b></p>
                                                                    <p>Yet another one, at <span class="text-success">15:00 PM</span></p><span class="vertical-timeline-element-date"></span></div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-danger"> </i></span>
                                                                <div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title">Build the production release</h4>
                                                                    <p>Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut labore et dolore magna elit enim at minim veniam quis nostrud</p><span
                                                                            class="vertical-timeline-element-date"></span></div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div><span class="vertical-timeline-element-icon bounce-in"><i class="badge badge-dot badge-dot-xl badge-primary"> </i></span>
                                                                <div class="vertical-timeline-element-content bounce-in"><h4 class="timeline-title text-success">Something not important</h4>
                                                                    <p>Lorem ipsum dolor sit amit,consectetur elit enim at minim veniam quis nostrud</p><span class="vertical-timeline-element-date"></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav flex-column">
                                    <li class="nav-item-divider nav-item"></li>
                                    <li class="nav-item-btn text-center nav-item">
                                        <button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">Load More</button>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                        <div class="dropdown">
                            <button type="button" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                                <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                    <span class="icon-wrapper-bg bg-focus"></span>
                                    <span class="language-icon opacity-8 flag large @if(Config::get('app.locale')=='vi') VN @else US @endif"></span>
                                </span>
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu dropdown-menu-right">
                                <div class="dropdown-menu-header">
                                    <div class="dropdown-menu-header-inner pt-4 pb-4 bg-focus">
                                        <div class="menu-header-image opacity-05" style="background-image: url('/assets/images/dropdown-header/city2.jpg');"></div>
                                        <div class="menu-header-content text-center text-white">
                                            <h6 class="menu-header-subtitle mt-0">
                                                @lang('header.choose_language')
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <h6 tabindex="-1" class="dropdown-header">
                                   @lang('header.all_languages')
                                </h6>
                                <button onclick="location.href='/welcome/en';" type="button" tabindex="0" class="dropdown-item">
                                    <span class="mr-3 opacity-8 flag large US"></span>
                                    @lang('header.English')
                                </button>
                                <button onclick="location.href='/welcome/vi';" type="button" tabindex="0" class="dropdown-item">
                                    <span class="mr-3 opacity-8 flag large VN"></span>
                                    @lang('header.Vietnamese')
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="/assets/images/avatars/2.jpg" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                            <div class="dropdown-menu-header">
                                                <div class="dropdown-menu-header-inner bg-info">
                                                    <div class="menu-header-image opacity-2" style="background-image: url('/assets/images/dropdown-header/city3.jpg');"></div>
                                                    <div class="menu-header-content text-left">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="42" class="rounded-circle"
                                                                        src="/assets/images/avatars/2.jpg"
                                                                        alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">{{Auth::user()->full_name}}
                                                                    </div>
                                                                    <div class="widget-subheading opacity-8">{{Auth::user()->email}}
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right mr-2">
                                                                    <a href="/logout" class="btn-pill btn-shadow btn-shine btn btn-focus">@lang('auth.logout')
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="scroll-area-xs" style="height: 150px;">
                                                <div class="scrollbar-container ps">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item-header nav-item">@lang('header.my_account')
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="/account/profile" class="nav-link"><i class="fa fa-fw" aria-hidden="true" title=""></i> @lang('header.link_profile')
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link"><i class="fa fa-fw" aria-hidden="true" title=""></i> @lang('header.setting')
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @if(Auth::user()->hasRole('Supporter'))
                                            <ul class="nav flex-column">
                                                <li class="nav-item-divider mb-0 nav-item"></li>
                                            </ul>
                                            <div class="grid-menu grid-menu-2col">
                                                <div class="no-gutters row">
                                                    <div class="col-sm-6">
                                                        <button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-warning">
                                                            <i class="pe-7s-chat icon-gradient bg-amy-crisp btn-icon-wrapper mb-2"></i>
                                                            Message Inbox
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger">
                                                            <i class="pe-7s-ticket icon-gradient bg-love-kiss btn-icon-wrapper mb-2"></i>
                                                            <b>Support Tickets</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="nav flex-column">
                                                <li class="nav-item-divider nav-item">
                                                </li>
                                                <li class="nav-item-btn text-center nav-item">
                                                    <button class="btn-wide btn btn-primary btn-sm">
                                                        Open Messages
                                                    </button>
                                                </li>
                                            </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        {{Auth::user()->full_name}}
                                    </div>
                                    <div class="widget-subheading">
                                        {{Auth::user()->role->name}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="app-main" style="overflow:auto;">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Menu</li>
                                @if(Auth::user()->role_id == 1)
                                <li>
                                    <a href="#">
                                    <i class="metismenu-icon pe-7s-id"></i>
                                        @lang('auth.manage_user')
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="./user">
                                                <i class="metismenu-icon"></i> @lang('auth.all_user')
                                            </a>
                                        </li>
                                        <li>
                                            <a href="?status=1">
                                                <i class="metismenu-icon"></i> @lang('auth.active_user')
                                            </a>
                                        </li>
                                        <li>
                                            <a href="?status=0">
                                                <i class="metismenu-icon"></i> @lang('auth.blocked_user')
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @else
                                <li>
                                    <a href="#">
                                    <i class="metismenu-icon pe-7s-way"></i>
                                        @lang('address.manage_address')
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/admin/address">
                                                <i class="metismenu-icon"></i>@lang('address.all_address')
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/admin/address?verified=0">
                                                <i class="metismenu-icon"></i>@lang('address.not_verified')
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/admin/address?verified=1">
                                                <i class="metismenu-icon"></i>@lang('address.verified')
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/admin/address?verified=2">
                                                <i class="metismenu-icon"></i>@lang('address.waiting_update')
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="app-main__outer" style="overflow:hidden;word-break: break-word;">
                    <div class="app-main__inner">
                        @yield('content')
                    </div>
                </div>
        </div>
    </div>
    <!-- Modal edit -->
    <div class="modal fade" id="editModal" role="dialog" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">@lang('auth.update_user')</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row ">
                            <div class="col-md-12 pr-1">
                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">@lang('auth.status')</label>
                                    <select name="status" class="form-control">
                                        <option value="0">@lang('auth.active')</option>
                                        <option value="1">@lang('auth.blocked')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 pr-1">
                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">@lang('auth.type')</label>
                                    <select name="role_id" class="form-control">
                                        <option value="1">@lang('auth.admin')</option>
                                        <option value="2">@lang('auth.address_manager')</option>
                                        <option value="3">@lang('auth.user')</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('auth.cancel')</button>
                        <button type="submit" class="btn btn-primary">@lang('auth.update')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal edit -->
    <div class="modal fade" id="requestUpdateModal" role="dialog" aria-labelledby="requestUpdateModalLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reuqestUpdateModalLabel">@lang('address.request_update')</h5>
                    </div>
                    <div class="modal-body">
                        @lang('address.request_update_desp')
                    </div>
                    <div class="modal-footer" style="padding:1rem 0.5rem">
                        <button type="button" class="btn btn-default mr-1" data-dismiss="modal">@lang('error.close')</button>
                        <button type="submit" class="btn btn-primary">@lang('address.send_request_update')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal -->
    <div id="modalDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="display: block;">
                    <button type="button" class="close" data-dismiss="modal">&times;
                    </button>
                    <h4 class="modal-title">@lang('address.delete_prompt')</h4>
                </div>
                <div class="modal-body">
                    @lang('address.delete_prompt_desp')
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" action="" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('error.close')
                        </button>
                        <button type="submit" class="btn btn-danger">@lang('address.delete')
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal verify -->
    <div id="modalVerify" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="display: block;">
                    <button type="button" class="close" data-dismiss="modal">&times;
                    </button>
                    <h4 class="modal-title">@lang('address.verify_address')</h4>
                </div>
                <div class="modal-body">
                    @lang('address.verify_address_desp')
                </div>
                <div class="modal-footer">
                    <form id="verifyForm" action="" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('error.close')
                        </button>
                        <button type="submit" class="btn btn-danger">@lang('address.verify')
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <style>
    .autoHide {
        -moz-animation: cssAnimation 5s forwards;
        /* Firefox */
        -webkit-animation: cssAnimation 5s forwards;
        /* Safari and Chrome */
        -o-animation: cssAnimation 5s forwards;
        /* Opera */
        animation: cssAnimation 5s forwards;
        -webkit-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
    }
    .toast-progress {
        -webkit-animation: mymove 5s;  /* Safari 4.0 - 8.0 */
        -webkit-animation-iteration-count: 1; /* Safari 4.0 - 8.0 */
        animation: mymove 5s;
        animation-iteration-count: 1;
    }
    .list-address-area .dropdown-menu-header .menu-header-content {
        text-align: center;
        position: absolute;
        z-index: 10;
        padding: 10px;
        bottom: 10px;
    }
    @keyframes cssAnimation {
        0%   {opacity: 1;}
        90%  {opacity: 1;}
        100% {opacity: 0;}
    }
    @-webkit-keyframes cssAnimation {
        0%   {opacity: 1;}
        90%  {opacity: 1;}
        100% {opacity: 0;}
    }
    @-webkit-keyframes mymove {
        from {width: 100%;}
        to {width: 0%;}
    }
    @keyframes mymove {
        from {width: 100%;}
        to {width: 0%;}
    }
    </style>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/admin/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script type="text/javascript" src="/assets/scripts/main.87c0748b313a1dda75f5.js"></script>
    <script src="{{ asset('assets/admin/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
    @stack("scripts")
</body>
</html>

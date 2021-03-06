<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PCB Admin</title>
    <!-- plugins:css -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700,300"> -->
    <link rel="stylesheet" href="{{asset('custom/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('custom/base/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{asset('custom/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" />


    <!-- Date picker plugins css -->
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="{{ asset('css/bootstrap-timepicker.min.css') }}" rel="stylesheet">

</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex justify-content-center">
            <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                <a class="navbar-brand brand-logo" href=""><img src="{{asset('images/logo.png')}}" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href=""><img src="{{asset('images/klogo.png')}}" alt="logo"/></a>
               {{-- <a class="navbar-brand brand-small-logo" href=""><img src="{{asset('images/minilogo.png')}}" height="36px;" width="auto" alt="logo"/></a>--}}
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-sort-variant"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
                <!-- <li class="nav-item dropdown mr-1">
                    <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-message-text mx-0"></i>
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <img src="{{asset('images/faces/face4.jpg')}}" alt="image" class="profile-pic">
                            </div>
                            <div class="item-content flex-grow">
                                <h6 class="ellipsis font-weight-normal">David Grey
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    The meeting is cancelled
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <img src="{{asset('images/faces/face2.jpg')}}" alt="image" class="profile-pic">
                            </div>
                            <div class="item-content flex-grow">
                                <h6 class="ellipsis font-weight-normal">Tim Cook
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    New product launch
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <img src="{{asset('images/faces/face3.jpg')}}" alt="image" class="profile-pic">
                            </div>
                            <div class="item-content flex-grow">
                                <h6 class="ellipsis font-weight-normal"> Johnson
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    Upcoming board meeting
                                </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown mr-4">
                    <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell mx-0"></i>
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <div class="item-icon bg-success">
                                    <i class="mdi mdi-information mx-0"></i>
                                </div>
                            </div>
                            <div class="item-content">
                                <h6 class="font-weight-normal">Application Error</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    Just now
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <div class="item-icon bg-warning">
                                    <i class="mdi mdi-settings mx-0"></i>
                                </div>
                            </div>
                            <div class="item-content">
                                <h6 class="font-weight-normal">Settings</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    Private message
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <div class="item-icon bg-info">
                                    <i class="mdi mdi-account-box mx-0"></i>
                                </div>
                            </div>
                            <div class="item-content">
                                <h6 class="font-weight-normal">New user registration</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    2 days ago
                                </p>
                            </div>
                        </a>
                    </div>
                </li> -->
                <li class="nav-item nav-profile dropdown">
                    <select id="convertor" style="margin-top: 7px" onchange="location =this.value;">
                        <option value="">select language</option>
                        <option value="{{ url('locale/ka') }}" @if(session('locale') =='ka') selected="selected" @endif>Kannada</option>
                        <option value="{{ url('locale/en') }}" @if(session('locale') =='en') selected="selected" @endif>English</option>
                    </select>
                </li>
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <img  class="img-circle" src="{{asset('images/admin.png')}}" alt="profile"/>
                        <span class="nav-profile-name">Admin</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{ url('/admin/settings') }}">
                            <i class="mdi mdi-settings text-primary"></i>
                            {{ __('messages.Settings') }}

                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout text-primary"></i>
                            {{ __('messages.Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">{{ __('messages.Dashboard') }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-organizations" aria-expanded="false" aria-controls="ui-organizations">
                        <i class="mdi mdi-clipboard-text menu-icon"></i>
                        <span class="menu-title">{{ __('Organizations') }}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-organizations">
                        <ul class="nav flex-column sub-menu">
                            <!-- <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/WasteGenerators') }}">{{ __('Waste Generators') }}</a></li> -->
                            <li class="nav-item"> <a class="nav-link" href="{{ url('wastegenerator') }}">{{ __('Waste Generators') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/WasteDisposals') }}">{{ __('Waste Disposals (Plants)') }}</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-routes" aria-expanded="false" aria-controls="ui-routes">
                        <i class="mdi mdi-clipboard-text menu-icon"></i>
                        <span class="menu-title">{{ __('Routes') }}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-routes">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{ url('routes') }}">{{ __('Routes') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('routelocation/create') }}">{{ __('Add Route Locations') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('driverroutes') }}">{{ __('Assign Route Regular') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/driverroute') }}">{{ __('Assign Route Oncall') }}</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-employee" aria-expanded="false" aria-controls="ui-employee">
                        <i class="mdi mdi-clipboard-text menu-icon"></i>
                        <span class="menu-title">{{ __('Employees') }}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-employee">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{ url('roles') }}">{{ __('Roles') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('rolefeatures') }}">{{ __('Role Features') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="#">{{ __('Employee') }}</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-masters" aria-expanded="false" aria-controls="ui-masters">
                        <i class="mdi mdi-clipboard-text menu-icon"></i>
                        <span class="menu-title">{{ __(' Masters') }}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-masters">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{ url('wastecolors') }}">{{ __('Waste Types') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('wastetypes') }}">{{ __('Waste Colors') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('vehicletypes') }}">{{ __('Vehicle Types') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('industrytypes') }}">{{ __('Industry Types') }}</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-locationmaster" aria-expanded="false" aria-controls="ui-locationmaster">
                        <i class="mdi mdi-clipboard-text menu-icon"></i>
                        <span class="menu-title">{{ __('Locations') }}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-locationmaster">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/Country') }}">{{ __('messages.Country') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('states') }}">{{ __('messages.State') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('districts') }}">{{ __('messages.District') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('taluka') }}">{{ __('messages.Taluk') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('panchayatee') }}">{{ __('messages.Panchayat') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('village') }}">{{ __('messages.Village') }}</a></li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-transporterservice" aria-expanded="false" aria-controls="ui-transporterservice">
                        <i class="mdi mdi-clipboard-text menu-icon"></i>
                        <span class="menu-title">{{ __('Transporter Service') }}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-transporterservice">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="">{{ __('Generate QR Code') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="">{{ __('Waste Collection') }}</a></li>
                        </ul>
                    </div>
                </li>
                              


                

                {{--<li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/WasteGenerators') }}">
                        <i class="mdi mdi-upload menu-icon"></i>
                        <span class="menu-title">{{ __('messages.WasteGenerators') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/WasteDisposalFacilities') }}">
                        <i class="mdi mdi-worker menu-icon"></i>
                        <span class="menu-title">{{ __('messages.WasteDisposalFacilities') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/VehicleTypes') }}">
                        <i class="mdi mdi-truck menu-icon"></i>
                        <span class="menu-title">{{ __('messages.VehicleTypes') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/Employees') }}">
                        <i class="mdi mdi-account-multiple menu-icon"></i>
                        <span class="menu-title">{{ __('messages.Employees') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/Roles') }}">
                        <i class="mdi mdi-account-star menu-icon"></i>
                        <span class="menu-title">{{ __('messages.Roles') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/IndustryTypes') }}">
                        <i class="mdi mdi-factory menu-icon"></i>
                        <span class="menu-title">{{ __('messages.IndustryTypes') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/WasteTypes') }}">
                        <i class="mdi mdi-recycle menu-icon"></i>
                        <span class="menu-title">{{ __('messages.WasteTypes') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/WasteColors') }}">
                        <i class="mdi mdi-format-color-fill menu-icon"></i>
                        <span class="menu-title">{{ __('messages.WasteColors') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/RouteManagement') }}">
                        <i class="mdi mdi-road-variant menu-icon"></i>
                        <span class="menu-title">{{ __('messages.RouteManagement') }}</span>
                    </a>
                </li>


                {{--<li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="mdi mdi-account menu-icon"></i>
                        <span class="menu-title">User Pages</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
                        </ul>
                    </div>
                </li>--}}
                {{--<li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="mdi mdi-clipboard-text menu-icon"></i>
                        <span class="menu-title">{{ __('messages.SetUp') }}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/Country') }}">{{ __('messages.Country') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/State') }}">{{ __('messages.State') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/District') }}">{{ __('messages.District') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/Taluk') }}">{{ __('messages.Taluk') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/Panchayat') }}">{{ __('messages.Panchayat') }}</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/Village') }}">{{ __('messages.Village') }}</a></li>

                        </ul>
                    </div>
                </li>
            </ul> --}}
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer" style="z-index: 1030;position: fixed;">
                <div class="d-sm-flex justify-content-center justify-content-sm-between text-center">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                        <?php echo Date('Y');?> MV INFRA SERVICES PVT. LTD. ©  <a href="" target="_blank"></a> All rights reserved.</span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{asset('custom/base/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{asset('custom/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('custom/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{asset('custom/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('js/off-canvas.js')}}"></script>
<script src="{{asset('js/hoverable-collapse.js')}}"></script>
<script src="{{asset('js/template.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('js/dashboard.js')}}"></script>
<script src="{{asset('js/data-table.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.js')}}"></script>
<!-- End custom js for this page-->


    <!-- Date Picker Plugin JavaScript -->
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="{{ asset('js/bootstrap-timepicker.min.js') }}"></script>
    <script type="text/javascript">
        var dateToday = new Date();
        $('#DriverRouteFromDate').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            startDate: dateToday,
        });
        $('#DriverRouteToDate').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            startDate: dateToday,
        });
        $('#DriverRouteFromTime').timepicker({
            use24hours: true,
            interval: 60,
            showInputs: false,
            showMeridian: false,
            timeFormat: 'hh:mm:ss',
            disableFocus: true,
            placement: 'bottom',
            autoclose: true,
            default: 'now'
        });
        $('#DriverRouteToTime').timepicker({
            use24hours: true,
            interval: 60,
            showInputs: false,
            showMeridian: false,
            timeFormat: 'hh:mm:ss',
            disableFocus: true,
            placement: 'bottom',
            autoclose: true,
            default: 'now'
        });
    </script>
</body>

</html>
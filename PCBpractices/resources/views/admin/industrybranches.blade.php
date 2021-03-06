{{--
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Admin Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        This is Admin Dashboard. You must be privileged to be here !
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection--}}

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PCB Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="public/custom/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="public/custom/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="public/custom/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="public/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="public/images/favicon.png" />
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex justify-content-center">
            <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                <a class="navbar-brand brand-logo" href="public/index.html"><img src="public/images/logo.png" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="public/index.html"><img src="public/images/logo-mini.svg" alt="logo"/></a>
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-sort-variant"></span>
                </button>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav mr-lg-4 w-100">
                <li class="nav-item nav-search d-none d-lg-block w-100">
                    <div class="input-group">
                        <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown mr-1">
                    <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="public/#" data-toggle="dropdown">
                        <i class="mdi mdi-message-text mx-0"></i>
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                        <a class="dropdown-item">
                            <div class="item-thumbnail">
                                <img src="public/images/faces/face4.jpg" alt="image" class="profile-pic">
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
                                <img src="public/images/faces/face2.jpg" alt="image" class="profile-pic">
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
                                <img src="public/images/faces/face3.jpg" alt="image" class="profile-pic">
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
                    <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="public/#" data-toggle="dropdown">
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
                </li>
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="public/#" data-toggle="dropdown" id="profileDropdown">
                        <img src="public/images/faces/face5.jpg" alt="profile"/>
                        <span class="nav-profile-name">Louis Barnett</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item">
                            <i class="mdi mdi-settings text-primary"></i>
                            Settings
                        </a>
                        <a class="dropdown-item">
                            <i class="mdi mdi-logout text-primary"></i>
                            Logout
                        </a>
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
                    <a class="nav-link" href="public/index.html">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="public/pages/forms/basic_elements.html">
                        <i class="mdi mdi-view-headline menu-icon"></i>
                        <span class="menu-title">Waste Generators</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="public/pages/charts/chartjs.html">
                        <i class="mdi mdi-chart-pie menu-icon"></i>
                        <span class="menu-title">Waste Disposal Facilities</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="public/pages/tables/basic-table.html">
                        <i class="mdi mdi-truck menu-icon"></i>
                        <span class="menu-title">vehicle types</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="public/pages/tables/basic-table.html">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Employees</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="public/pages/icons/mdi.html">
                        <i class="mdi mdi-emoticon menu-icon"></i>
                        <span class="menu-title">Roles</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('industrytypes') }}">
                        <i class="mdi mdi-emoticon menu-icon"></i>
                        <span class="menu-title">Industry Types</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('industries') }}">
                        <i class="mdi mdi-emoticon menu-icon"></i>
                        <span class="menu-title">Industries</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('industrybranches') }}">
                        <i class="mdi mdi-emoticon menu-icon"></i>
                        <span class="menu-title">Industry Branches</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('wastetypes') }}">
                        <i class="mdi mdi-emoticon menu-icon"></i>
                        <span class="menu-title">Waste Types</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('wastecolors') }}">
                        <i class="mdi mdi-emoticon menu-icon"></i>
                        <span class="menu-title">Waste Colors</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('recycleplants') }}">
                        <i class="mdi mdi-emoticon menu-icon"></i>
                        <span class="menu-title">Recycle Plants</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('recycleplantbranches') }}">
                        <i class="mdi mdi-emoticon menu-icon"></i>
                        <span class="menu-title">Recycle Plant Branches</span>
                    </a>
                </li>
                {{--<li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="public/#auth" aria-expanded="false" aria-controls="auth">
                        <i class="mdi mdi-account menu-icon"></i>
                        <span class="menu-title">User Pages</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="public/pages/samples/login.html"> Login </a></li>
                            <li class="nav-item"> <a class="nav-link" href="public/pages/samples/login-2.html"> Login 2 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="public/pages/samples/register.html"> Register </a></li>
                            <li class="nav-item"> <a class="nav-link" href="public/pages/samples/register-2.html"> Register 2 </a></li>
                            <li class="nav-item"> <a class="nav-link" href="public/pages/samples/lock-screen.html"> Lockscreen </a></li>
                        </ul>
                    </div>
                </li>--}}
                <li class="nav-item">
                    <a class="nav-link" href="public/documentation/documentation.html">
                        <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                        <span class="menu-title">Documentation</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="public/#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="mdi mdi-circle-outline menu-icon"></i>
                        <span class="menu-title">SetUp</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="public/pages/ui-features/buttons.html">Country</a></li>
                            <li class="nav-item"> <a class="nav-link" href="public/pages/ui-features/typography.html">State</a></li>
                            <li class="nav-item"> <a class="nav-link" href="public/pages/ui-features/typography.html">District</a></li>
                            <li class="nav-item"> <a class="nav-link" href="public/pages/ui-features/typography.html">Taluk</a></li>
                            <li class="nav-item"> <a class="nav-link" href="public/pages/ui-features/typography.html">Panchayat</a></li>
                            <li class="nav-item"> <a class="nav-link" href="public/pages/ui-features/typography.html">Village</a></li>

                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="d-flex justify-content-between flex-wrap">
                            <div class="d-flex align-items-end flex-wrap">
                                <div class="mr-md-3 mr-xl-5">
                                    <h3>Industry Branches</h3>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-end flex-wrap">
                                <a href="{{ url('addindustrybranch') }}">
                                    <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                                        <i class="mdi mdi-plus text-muted"></i>
                                    </button>
                                </a>
                                <a href="{{ url('addindustrybranch') }}">
                                    <button class="btn btn-primary mt-2 mt-xl-0">Add Industry Branch</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Industry Branches</p>
                                <div class="table-responsive">
                                    <table id="recent-purchases-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Industry Name</th>
                                                <th>Industry Type</th>
                                                <th>Branch Name</th>
                                                <th>Phone Number</th>
                                                <th>Email Id</th>
                                                <th>Address</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Place</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Xyz</td>
                                                <td>abc</td>
                                                <td>pqr branch</td>
                                                <td>1234567890</td>
                                                <td>example@gmail.com</td>
                                                <td>Begumpet, Punjagutta, Hyderabad, 500049</td>
                                                <td>72.123</td>
                                                <td>73.456</td>
                                                <td>Begumpet</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm" title="VIEW">
                                                        <span class="mdi mdi-eye"></span>
                                                    </a>
                                                    <a href="#" class="btn btn-warning btn-sm" title="EDIT">
                                                        <span class="mdi mdi-tooltip-edit"></span>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-sm" title="DELETE">
                                                        <span class="mdi mdi-delete"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>test</td>
                                                <td>test one</td>
                                                <td>test two branch</td>
                                                <td>9876543210</td>
                                                <td>test@gmail.com</td>
                                                <td>miyapur, Hyderabad, 500049</td>
                                                <td>72.456</td>
                                                <td>73.123</td>
                                                <td>Miyapur</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm" title="VIEW">
                                                        <span class="mdi mdi-eye"></span>
                                                    </a>
                                                    <a href="#" class="btn btn-warning btn-sm" title="EDIT">
                                                        <span class="mdi mdi-tooltip-edit"></span>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-sm" title="DELETE">
                                                        <span class="mdi mdi-delete"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="public/https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
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
<script src="public/custom/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="public/custom/chart.js/Chart.min.js"></script>
<script src="public/custom/datatables.net/jquery.dataTables.js"></script>
<script src="public/custom/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="public/js/off-canvas.js"></script>
<script src="public/js/hoverable-collapse.js"></script>
<script src="public/js/template.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="public/js/dashboard.js"></script>
<script src="public/js/data-table.js"></script>
<script src="public/js/jquery.dataTables.js"></script>
<script src="public/js/dataTables.bootstrap4.js"></script>
<!-- End custom js for this page-->
</body>

</html>



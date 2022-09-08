
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('./../public/backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('./../public/backend/assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('./../public/backend/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('./../public/backend/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('./../public/backend/assets/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('./../public/backend/assets/vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" href="{{asset('./../public/backend/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('./../public/backend/assets/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{asset('./../public/backend/assets/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    <title>Admin</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">Welcome</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <!-- <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li> -->
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Jeremy Rakestraw</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-3.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">John Abraham </span>is now following you
                                                        <div class="notification-date">2 days ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-4.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Monaan Pechi</span> is watching your main repository
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-5.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Jessica Caruso</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="#">View all notifications</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                                <li class="connection-list">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/github.png" alt="" > <span>Github</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/dribbble.png" alt="" > <span>Dribbble</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/dropbox.png" alt="" > <span>Dropbox</span></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/bitbucket.png" alt=""> <span>Bitbucket</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/mail_chimp.png" alt="" ><span>Mail chimp</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/slack.png" alt="" > <span>Slack</span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="conntection-footer"><a href="#">More</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('./../public/backend/assets/images/icon.png')}}" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">John Abraham </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="{{URL::to('/logout')}}"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Quản lí cửa hàng
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-align-justify"></i>Danh mục sản phẩm <span class="badge badge-success"></span></a>
                                <div id="submenu-1" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/add-category')}}">Thêm danh mục sản phẩm</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/all-category')}}">Liệt kê danh mục sản phẩm</a>
                                        </li>
                                    </ul>
                                </div>
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-building"></i>Nhà cung cấp <span class="badge badge-success"></span></a>
                                <div id="submenu-2" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/add-producer')}}">Thêm nhà cung cấp</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/all-producer')}}">Liệt kê nhà cung cấp</a>
                                        </li>
                                    </ul>
                                </div>

                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fa fa-fw fa-edit"></i>Tác giả <span class="badge badge-success"></span></a>
                                <div id="submenu-3" class="collapse submenu" >
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/add-author')}}">Thêm tác giả</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/all-author')}}">Liệt kê tác giả</a>
                                        </li>
                                    </ul>
                                </div>
                                <a class="nav-link active" href="{{URL::to('/all-user')}}" data-toggle="collapse" aria-expanded="false" data-target="#submenu-0" aria-controls="submenu-0"><i class="fa fa-fw fa-user"></i>Nhân viên<span class="badge badge-success"></span></a>
                                <div id="submenu-0" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/add-user')}}">Thêm nhân viên</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/all-user')}}">Liệt kê nhân viên</a>
                                        </li>
                                    </ul>
                                </div>
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fa fa-fw fa-address-book"></i>Sản phẩm<span class="badge badge-success"></span></a>
                                <div id="submenu-4" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/add-book')}}">Thêm sản phẩm</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/all-book')}}">Liệt kê sản phẩm</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-divider">
                                Quản lí bán hàng
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fa fa-fw fa-user-circle"></i>Khách hàng<span class="badge badge-success"></span></a>
                                <div id="submenu-5" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/add-slider')}}">Thêm slider</a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/all-customer')}}">Liệt kê khách hàng</a>
                                        </li>
                                    </ul>
                                </div>
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fa fa-fw fa-file-pdf"></i>Đơn hàng<span class="badge badge-success"></span></a>
                                <div id="submenu-6" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/add-slider')}}">Thêm slider</a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/all-order')}}">Liệt kê đơn hàng</a>
                                        </li>
                                    </ul>
                                </div>
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fa fa-fw fa-sliders-h"></i>Slider<span class="badge badge-success"></span></a>
                                <div id="submenu-7" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/add-slider')}}">Thêm slider</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/all-slider')}}">Liệt kê slider</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/showactive-slider')}}">Active slider</a>
                                        </li>
                                    </ul>
                                </div>
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fa fa-fw fa-newspaper"></i>Tin tức<span class="badge badge-success"></span></a>
                                <div id="submenu-8" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/add-news')}}">Thêm tin tức</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/all-news')}}">Liệt kê tin tức</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- <a class="nav-link active" href="#"><i class="fa fa-fw fa-address-card"></i>Liên hệ <span class="badge badge-success"></span></a> -->
                            </li>
                            <li class="nav-divider">
                                Cài đặt
                            </li>
                            <li class="nav-item ">
                            <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fa fa-fw fa-cog"></i>Hệ thống<span class="badge badge-success"></span></a>
                                <div id="submenu-9" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/add-mail')}}">Mail</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        
                    </div>

                            
                            
                </nav>
            </div>
        </div>
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    @yield('content')    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jquery 3.3.1 -->
    <script src="{{asset('./../public/backend/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <!-- bootstap bundle js -->
    <script src="{{asset('./../public/backend/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <!-- slimscroll js -->
    <script src="{{asset('./../public/backend/assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('./../public/backend/assets/libs/js/main-js.js')}}"></script>
    <!-- chart chartist js -->
    <script src="{{asset('./../public/backend/assets/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
    <!-- sparkline js -->
    <script src="{{asset('./../public/backend/assets/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
    <!-- morris js -->
    <script src="{{asset('./../public/backend/assets/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
    <script src="{{asset('./../public/backend/assets/vendor/charts/morris-bundle/morris.js')}}"></script>
    <!-- chart c3 js -->
    <script src="{{asset('./../public/backend/assets/vendor/charts/c3charts/c3.min.js')}}"></script>
    <script src="{{asset('./../public/backend/assets/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
    <script src="{{asset('./../public/backend/assets/vendor/charts/c3charts/C3chartjs.js')}}"></script>
    <script src="{{asset('./../public/backend/assets/libs/js/dashboard-ecommerce.js')}}"></script>
</body>
</html>
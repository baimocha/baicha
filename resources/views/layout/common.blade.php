<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="./static/vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./static/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="./static/css/styles.css">
    <link href="{{asset('css/page2.css')}}" rel="stylesheet" type="text/css">
</head>
<body class="sidebar-fixed header-fixed">
<div class="page-wrapper">
    <nav class="navbar page-header">
        <a href="#" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
            <i class="fa fa-bars"></i>
        </a>

        <a class="navbar-brand" href="#">
            <img src="./static/imgs/logo.png" alt="logo">
        </a>

        <a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
            <i class="fa fa-bars"></i>
        </a>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-md-down-none">
                <a href="#">
                    <i class="fa fa-bell"></i>
                    <span class="badge badge-pill badge-danger">5</span>
                </a>
            </li>

            <li class="nav-item d-md-down-none">
                <a href="#">
                    <i class="fa fa-envelope-open"></i>
                    <span class="badge badge-pill badge-danger">5</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="./static/imgs/avatar-1.png" class="avatar avatar-sm" alt="logo">
                    <span class="small ml-1 d-md-down-none">John Smith</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header">Account</div>

                    <a href="#" class="dropdown-item">
                        <i class="fa fa-user"></i> Profile
                    </a>

                    <a href="#" class="dropdown-item">
                        <i class="fa fa-envelope"></i> Messages
                    </a>

                    <div class="dropdown-header">Settings</div>

                    <a href="#" class="dropdown-item">
                        <i class="fa fa-bell"></i> Notifications
                    </a>

                    <a href="#" class="dropdown-item">
                        <i class="fa fa-wrench"></i> Settings
                    </a>

                    <a href="#" class="dropdown-item">
                        <i class="fa fa-lock"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="main-container">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="index.html" class="nav-link active">
                            <i class="icon icon-speedometer"></i> 表盘
                        </a>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-target"></i> 账号添加 <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{ url('add_admin') }}" class="nav-link">
                                    <i class="icon icon-target"></i> 账号添加
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('list_admin') }}" class="nav-link">
                                    <i class="icon icon-target"></i> 账号展示
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-target"></i> 商品添加 <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{ url('shang_add_admin') }}" class="nav-link">
                                    <i class="icon icon-target"></i> 商品添加
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('shang_list_admin') }}" class="nav-link">
                                    <i class="icon icon-target"></i> 商品展示
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('update_admin') }}" class="nav-link">
                                    <i class="icon icon-target"></i> 商品修改
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-target"></i> 学生添加 <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{ url('tian_admin') }}" class="nav-link">
                                    <i class="icon icon-target"></i> 学生添加
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('xue_admin') }}" class="nav-link">
                                    <i class="icon icon-target"></i> 学生列表
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="content">
        @section('body')
        @show
        </div>
    </div>
</div>
<script src="./static/vendor/jquery/jquery.min.js"></script>
<script src="./static/vendor/popper.js/popper.min.js"></script>
<script src="./static/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="./static/vendor/chart.js/chart.min.js"></script>
<script src="./static/js/carbon.js"></script>
<script src="./static/js/demo.js"></script>
</body>
</html>

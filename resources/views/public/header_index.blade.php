<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<title>Mstore - Online Shop Mobile Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1 user-scalable=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="HandheldFriendly" content="True">

	<link rel="stylesheet" href="./index/css/materialize.css">
	<link rel="stylesheet" href="./index/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="./index/css/normalize.css">
	<link rel="stylesheet" href="./index/css/owl.carousel.css">
	<link rel="stylesheet" href="./index/css/owl.theme.css">
	<link rel="stylesheet" href="./index/css/owl.transitions.css">
	<link rel="stylesheet" href="./index/css/fakeLoader.css">
	<link rel="stylesheet" href="./index/css/animate.css">
	<link rel="stylesheet" href="./index/css/style.css">
	
	<link rel="shortcut icon" href="./index/img/favicon.png">

</head>
<body>

	<!-- navbar top -->
	<div class="navbar-top">
		<!-- site brand	 -->
		<div class="site-brand">
			<a href="index.html"><h1>Mstore</h1></a>
		</div>
		<!-- end site brand	 -->
		<div class="side-nav-panel-right">
			<a href="#" data-activates="slide-out-right" class="side-nav-left"><i class="fa fa-user"></i></a>
		</div>
	</div>
	<!-- end navbar top -->

	<!-- side nav right-->
	<div class="side-nav-panel-right">
		<ul id="slide-out-right" class="side-nav side-nav-panel collapsible">
			<li class="profil">
			@if(session('name'))
				<img src="./index/img/profile.jpg" alt="">
				<h2>{{Session::get('name')}}</h2>
			@else
				<img src="./index/img/profile.jpg" alt="">
				<h2></h2>
			@endif
			</li>
			<li><a href="setting.html"><i class="fa fa-cog"></i>设置</a></li>
			<li><a href="about-us.html"><i class="fa fa-user"></i>关于我们</a></li>
			<li><a href="contact.html"><i class="fa fa-envelope-o"></i>联系我们</a></li>
			<li><a href="login.html"><i class="fa fa-sign-in"></i>登录</a></li>
			<li><a href="register.html"><i class="fa fa-user-plus"></i>寄存器</a></li>
		</ul>
	</div>
	<!-- end side nav right-->
@yield('datas')
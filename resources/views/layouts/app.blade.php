<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mebel Lilis</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
	<link href="{{elixir('css/app.css')}} " rel="stylesheet">
	
    
   
    <link href="{{asset('css/frontend_css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('css/frontend_css/main.css')}}" rel="stylesheet">
	<link href="{{asset('css/frontend_css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('css/frontend_css/jquery.dataTables.min.css')}}" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <div class="nav navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <div class="navbar-brand">
                        <img src="{{asset('img/mebellilislogo.png')}}" width="250px" height="30px"><h4 color:black>Toko Mebel Lilis Semarang</h4>
                </div>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if(Auth::check())
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        @can('admin-access')
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Manage <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('categories.index') }}"><i class="fa fa-btn fa-tags"></i>Categories</a></li>
                                    <li><a href="{{ route('products.index') }}"><i class="fa fa-btn fa-gift"></i>Products</a></li>
                                    <li><a href="{{ route('orders.index') }}"><i class="fa fa-btn fa fa-shopping-cart"></i>Orders</a></li>
                                    <li><a href="{{ route('contacts.index') }}"><i class="fa fa-btn fa fa-shopping-cart"></i>Contacts</a></li>
                                    <li><a href="{{ route('company.index') }}"><i class="fa fa-btn fa fa-shopping-cart"></i>Company</a></li>
                                    <li><a href="{{ route('user.index') }}"><i class="fa fa-btn fa-shopping-cart"></i>User</a></li>
                                </ul>
                            </li>
                        @endcan
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
					<li><a href="{{url('/')}}">Home</a></li>
					<li><a href="/profile">Profile</a></li>
					<li><a href="/catalogs">Product</a></li>

                   @include('layouts._customer-feature', ['partial_view'=>'layouts._cart-menu-bar'])
                    
                   @include('layouts._customer-feature', 
					['partial_view'=>'layouts._check-order-menu-bar', 'data'=>[]])
					<li><a href="{{ url('/contactus') }}">Contact</a></li>
					<li><a href="{{ url('/carapemesanan') }}">How To Buy.?</a></li>

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Masuk <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        </ul>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                               <!-- <li><a href="{{url('user')}}"><i class="fa fa-btn fa-sign-out"></i>AKUN</a></li>-->
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    

    @if (session()->has('flash_notification.message'))
        <div class="container">
            <div class="alert alert-{{ session()->get('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ session()->get('flash_notification.message') }}
            </div>
        </div>
    @endif

    @yield('content')
	<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2018 Toko Mebel Lilis Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.mahendra.com">Mahendra</a></span></p>
				</div>
			</div>
		</div>
    <!-- JavaScripts -->
 <script src="{{elixir('js/all.js')}}"></script>
    @if (Session::has('flash_product_name'))
        @include('catalogs._product-added', ['product_name' => Session::get('flash_product_name')])
	@endif
	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
	<script src="{{asset('js/frontend_js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('js/frontend_js/price-range.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('js/frontend_js/main.js')}}"></script>
   
    <script src="{{asset('js/frontend_js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/dataTables.bootstrap.min.js')}}"></script>
</body>
</html>

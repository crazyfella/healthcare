<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}">
    <title>{{ config('app.name', 'F4E HealthCare Force Inc') }}</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/light-gallery/css/lightgallery.min.css')}}">
     <!-- SweetAlert2 -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->

 
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="index-2.html" class="logo">
					<img src="{{asset('images/common/logo_icon.png')}}" width="45" height="45" alt=""> 
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
               
             
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="{{asset('assets/img/user.jpg')}}" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
						<span>{{ Auth::user()->name }}</span>
                    </a>
                </li>
            </ul>
            
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="{{ (request()->is('dashboard*')) ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>

                        
                        <li class="{{ (request()->is('pages*')) ? 'active' : '' }}">  
                        <a href="{{ url('pages') }}"><i class="fa fa-columns"></i> <span>Pages</span> </a>
                        </li>
					
                      
                        <li class="{{ (request()->is('inbox*')) ? 'active' : '' }}"> 
                        <a href="{{ url('inbox') }}"><i class="fa fa-user"></i> <span> Inbox </span> </a>
                        </li>
                        
                        <li class="{{ (request()->is('employees*')) ? 'active' : '' }}"> 
                        <a href="{{ url('employees') }}"><i class="fa fa-user"></i> <span> Employees </span> </a>
                        </li>
					
                        <li class="{{ (request()->is('gallery*')) ? 'active' : '' }}"> 
                        <a href="{{ url('gallery') }}"><i class="fa fa-user"></i> <span> Gallery </span> </a>
                        </li>
						
                        <li class="{{ (request()->is('setting*')) ? 'active' : '' }}">
                            <a href="{{ url('setting') }}"><i class="fa fa-user"></i> <span>Settings</span></a>
                        </li>

                        <li class="{{ (request()->is('myprofile*')) ? 'active' : '' }}">
                            <a href="{{ url('myprofile') }}"><i class="fa fa-user"></i> <span>My Profile</span></a>
                        </li>
                        <li><br>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <li class="fa fa-sign-out"></li> <span> &nbsp;&nbsp;&nbsp;&nbsp;{{ __('Logout') }}</span>
                                </a>
                            </form>

                        </li>
                      
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
        <div class="content">
        @yield('content')
        </div>
        </div>
        
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{asset('assets/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{asset('assets/js/popper.min.js') }}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{asset('assets/js/Chart.bundle.js') }}"></script>
    <script src="{{asset('assets/js/chart.js') }}"></script>
    <script src="{{asset('assets/js/app.js') }}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js') }}"></script> 
    <script src="{{asset('assets/js/moment.min.js') }}"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{asset('assets/plugins/light-gallery/js/lightgallery-all.min.js') }}"></script>
    <script src="{{asset('assets/js/select2.min.js') }}"></script>
   <script src="https://cdn.tiny.cloud/1/nnv9z98kg8wnwf0r7i89kwqbzf903ausfhv2u4n5puy0z53k/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
   @yield('scripts')
    <script>
    tinymce.init({
      selector: '#textarea'
   });

  </script>

</body>



</html>
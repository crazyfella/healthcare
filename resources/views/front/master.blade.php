<!DOCTYPE html>
<html lang="en">
<head>
<title>{{$setting->company}}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />

	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="icon" href="images/favicon.png" type="image/x-icon">
	<!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
	<link href="styles/style.css" rel="stylesheet">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
	<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/light-gallery/css/lightgallery.min.css')}}">
	
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
	@yield('css')
</head>

<body >

<header>
	<div id="header">
		<div class="top">
			<div class="row">
				<div class="info">
					<div class="item">
<!--						<img src="images/common/phone.png" alt="phone">-->
						<a class="phone" href="tel:"></a>
					</div>
					<div class="item">
						<img src="images/common/email.png" alt="phone">
						<a href="mailto:">{{$setting->email}}</a>
					</div>
				</div>
				<div class="social">
					<a href="" target="_blank"><img src="images/common/fb.png" alt="facebook"></a>
					<a href="" target="_blank"><img src="images/common/ig.png" alt="instagram"></a>
					<a href="" target="_blank"><img src="images/common/li.png" alt="linkedin"></a>
					<a href="" target="_blank"><img src="images/common/tt.png" alt="twitter"></a>
					<a href="" target="_blank"><img src="images/common/yt.png" alt="youtube"></a>
				</div>
			</div>
		</div>
		<div class="bot">
			<div class="row">
				
				<nav>
					<a href="#" id="pull">MENU</a>
					<ul>
				    	<li ><a href="home">Home</a></li>
				    	<li ><a href="services#content">What We Do</a></li>
				    	<li ><a href="about#content">About Us</a></li>
				    	<li ><a href="contact#content">Contact Us</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</header>

<div id="banner">
	<img class="bg" src="images/common/banner.jpg" alt="banner">
	<div class="row">
		<div class="content">
			<p>The Easiest Way to Get Your New Job</p>
			<h2>Healthcare Staffing & Recruitment Agency</h2>
			<p>Find Jobs, Employment & Career Opportunities</p>
			<div class="btns">
				<a href="about#content" class="btn opaque alt">READ MORE</a>
				<a href="contact#content" class="btn opaque">CONTACT US</a>
			</div>
		</div>
	</div>
</div>

<!-- CONTENT -->

@yield('content')



<!-- footer -->
<footer>
	<div id="footer">
		<div class="top">
			<div class="row">
				<div class="item">
					<a href="home"><img class="logo" src="images/common/logo2.png" alt="logo"></a>
					<div class="info">
						<a href=""></a>
					</div>
					<div class="info">
						<img src="images/common/email.png" alt="phone">
						<a href="">{{$setting->email}}</a>
					</div>
					<div class="info">
						<img src="images/common/address.png" alt="phone">
						<p>{{$setting->address}}</p>
					</div>
				</div>
				<div class="item">
					<h4>Useful Links</h4>
				    <ul>
				    	<li ><a href="#">How It Works</a></li>
				    	<li ><a href="about#content">About Us</a></li>
				    	<li ><a href="services#content">What We Do</a></li>
				    </ul>
				</div>
				<div class="item">
					<h4>Quick Links</h4>
				    <ul>
				    	<li><a href="#">FAQ</a></li>
				    	<li><a href="about#content">Terms of Service</a></li>
				    	<li ><a href="privacy-policy#content">Privacy Policy</a></li>
				    	<li><a href="#">Support</a></li>
				    	<li><a href="contact#content">Contact Us</a></li>
				    </ul>
				</div>
				<div class="item">
					<h4>Signup for Our Newsletter</h4>
				    <form action="sendContactForm" method="post"  class="sends-email ctc-form">
			    		<input type="text" name="email" placeholder="Email Address">
				    	<button type="submit">SEND</button>
				    </form>
				</div>
			</div>
		</div>
		<div class="bot">
			<div class="row">
				<p>&copy; {{$setting->company}} All Rights Reserved {{ now()->year }}. <a href="privacy-policy#content" target="_blank">Privacy Policy</a>.</p>
			</div>
		</div>
	</div>
</footer>

<!-- <textarea id="g-recaptcha-response" class="destroy-on-load"></textarea> -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- <script src="scripts/sendform.js" data-view="" id="sendform"></script> -->
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  -->
<script src="scripts/responsive-menu.js"></script>
<script src="https://unpkg.com/sweetalert2@7.20.10/dist/sweetalert2.all.js"></script>

@yield('script')
</body>
</html>
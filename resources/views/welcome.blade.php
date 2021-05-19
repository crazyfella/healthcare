@extends('front.master')
@section('content')
<div id="welcome">
	<div class="row">
		<div class="content">
			<h1><small>Welcome to</small>F4E Healthcare Force <span>Inc.</span></h1>
			<p>
				F4E HealthcareForce, Inc. is a recruitment agency that aims to provide medical specialists to other parts of the world with a  strong focus on Germany. It is an independent recruitment and placement organization which seeks to evaluate and carefully select experienced medical professionals that are highly skilled, trained, and certified. The aim is to provide German hospitals and other healthcare institutions with perfectly matching employees.
			</p>
			<p>
				F4E HealthcareForce Inc. is located in Buyagan, La Trinidad, Benguet. A competent, knowledgeable, supportive, and dedicated team with more than 20 years of experience in the healthcare industry. They assist medical professionals in fulfilling their dream to get employed at one of the highest quality healthcare institutions in Germany and other premium markets.
			</p>
			<p>
				The jobs in Germany are secured through our healthcare-focused sister company in Germany, F4E HealthcareForce, managed by Mr. Martin Schneider. Mr. Schneider is a Swiss Senior Executive; he is the Chairman and CEO of Brainforce AG, a leading management services agency in Europe, and Chairman of Kohlberg & Partner, a top ten Swiss Executive Search company. Mr. Schneider is also the Senior Advisor of F4E HealthcareForce Inc. in the Philippines.
			</p>
			<a href="about#content" class="btn">READ MORE</a>
		</div>
		<div class="img">
			<img src="images/common/welcome.png" alt="welcome">
		</div>
	</div>
</div>

<div id="stats">
	<div class="row">
		<div class="item">
			<h2>Dozens of</h2>
			<h6>CLIENT-BASED HOSPITALS REGISTERED IN OUR SITE</h6>
		</div>
<!--
		<div class="item">
			<h2>10k+</h2>
			<h6>EMPLOYED THROUGH OUR AGENCY</h6>
		</div>
-->
		<div class="item">
			<h2>10/10</h2>
			<h6>SATISFACTORY RATING</h6>
		</div>
		<div class="item">
			<h2>Hundreds of</h2>
			<h6>JOBS AVAILABLE</h6>
		</div>
	</div>
</div>

<div id="services">
	<div class="row">
		<h2><small>What We Do</small> Our <span>Services</span></h2>
		<div class="content">
			<a href="services#health">
				<div class="item">
					<img src="images/common/serv1.png" alt="services">
					<h5>Healthcare Staffing</h5>
				</div>
			</a>
			<a href="services#language">
				<div class="item">
					<img src="images/common/serv2.png" alt="services">
					<h5>Language Training</h5>
				</div>
			</a>
			<!-- <div class="item">
				<img src="images/common/serv3.png" alt="services">
				<h5>Medical Training</h5>
			</div> -->
		</div>
		<a href="services#content" class="btn">READ MORE</a>
	</div>
</div>

<div id="look">
	<div class="item">
		<div class="content">
			<h3>Looking for a Healthcare Related Job?</h3>
			<p>
				Are you passionate and willing to help others in their most private and vulnerable moments? Do you like to discover your personal strength to have an impact on people around you to make their lives better?....
			</p>
			<a href="services#content" class="btn opaque">READ MORE</a>
		</div>
	</div>
	<div class="item">
		<div class="content">
			<h3>Looking for Medical Professionals?</h3>
			<p>
				We are selecting medical professionals who value not just the title and the good pay, but value ethical behaviour, passion and dedication to treat people in need, conquering ailments, and help in keeping society healthy in every possible way.
			</p>
			<a href="services#content" class="btn opaque">READ MORE</a>
		</div>
	</div>
</div>

<div id="map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.3122962645307!2d120.57949449846964!3d16.45971704776152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3391a3ae2471a6a7%3A0x2dcff6c6170157e4!2sBuyagan%20Rd%2C%20La%20Trinidad%2C%20Benguet!5e0!3m2!1sen!2sph!4v1609783835267!5m2!1sen!2sph" width="600" height="360" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>

<div id="gallery">
	<div class="row">
		<h2>Gallery</h2>
		<div class="content">
		@foreach($images as $image)
			<div class="item">
				<img src="{{asset('images/gallery/'. $image->image)}}" alt="gallery">
			</div>
		@endforeach
		</div>
		<a href="{{url('galleries')}}" class="btn">VIEW MORE</a>
	</div>
</div>



@endsection
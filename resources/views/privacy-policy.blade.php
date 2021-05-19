@extends('front.master')
@section('content')
<div id="content">
	<div class="row">
		<h1>{{$page->title}}</h1>
		<br>
		<div class="inPrivacyBox">
			{!!$page->content!!}
		</div>
	</div>
</div>


@endsection
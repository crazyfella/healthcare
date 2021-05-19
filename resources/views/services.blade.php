@extends('front.master')
@section('content')
<div class="inner">
	<div id="content">
		<div class="row">
			<h1>{{$page->title}}</h1>
			<div class="entry-content tl">
				<div id="health">
					{!!$page->content!!}
			</div>
		</div>
	</div>
</div>

@endsection
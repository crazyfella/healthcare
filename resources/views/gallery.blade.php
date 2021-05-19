@extends('front.master')
@section('css')
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
@stop
@section('content')
<div class="inner">
	<div id="content">
		<div class="row">
			<h1>Gallery</h1>
			<div class="entry-content tl">
			@if($images->count())
                <div id="lightgallery" class="row">
                @foreach($images as $image)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 m-b-20" style="padding-bottom: 10px;">
                        <a href="/images/gallery/{{ $image->image }}">
                            <img class="img-thumbnail" src="/images/gallery/{{ $image->image }}" alt="">
                            <div class='text-center'>
                                    <small class='text-muted'>{{ $image->title }}</small>
                                </div>
                        </a>
                    </div>
                @endforeach
                </div>
            @endif

            
					
			</div>
		</div>
	</div>
</div>

@endsection

@section('script')
<script src="{{asset('assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{asset('assets/js/app.js') }}"></script>
<script src="{{asset('assets/js/moment.min.js') }}"></script>
<script src="{{asset('assets/plugins/light-gallery/js/lightgallery-all.min.js') }}"></script>
@endsection
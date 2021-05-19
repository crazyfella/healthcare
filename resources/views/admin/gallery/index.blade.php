
@extends('admin.template.admin-master')

@section('content')


<div class="content">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Gallery</h4>
        </div>
    </div>

    <form action="{{ route('gallery.store') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @if (count($errors) > 0)

            <div class="alert alert-danger">

                <strong>Whoops!</strong> There were some problems with your input.<br><br>

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif



        <div class="row">

            <div class="col-md-5">

                <strong>Title: *</strong>

                <input type="text" name="title" class="form-control" placeholder="Title" required>

            </div>

            <div class="col-md-5">

                <strong>Image:</strong>

                <input type="file" name="image[]" accept="image/*" multiple="multiple" class="form-control">

            </div>

            <div class="col-md-2">

                <br/>

                <button type="submit" class="btn btn-success">Upload</button>

            </div>

        </div>



    </form> 
    <br>
    @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

        </div>

    @endif

    @if($images->count())
        <div id="lightgallery" class="row">
        @foreach($images as $image)

        
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 m-b-20">
                <a href="/images/gallery/{{ $image->image }}">
                    <img class="img-thumbnail" src="/images/gallery/{{ $image->image }}" alt="">
                    
                    <div class='text-center'>

                            <small class='text-muted'>{{ $image->title }}</small>

                        </div>
                </a>
                <!-- <form action="{{ route('gallery.destroy',$image->id) }}" method="POST">
                    <input type="hidden" name="_method" value="delete">
                    {!! csrf_field() !!}
                    <button type="submit" class="close-icon btn-small btn-danger"><i class="fa fa-remove"></i></button>
                </form> -->

                <button data-toggle="modal" href="" id="smallButton" data-target="#smallModal" data-attr="{{ route('delete-image', $image->id) }}" class="close-icon btn-small btn-danger"><i class="fa fa-remove"></i></button>
            </div>
        @endforeach
        </div>
    @endif
                
</div>

<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body text-center" id="smallBody">
				<div>
                    <!-- the result to be displayed apply here -->
                </div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
    // display a modal (small modal)
    $(document).on('click', '#smallButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href
            , beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            }
            , complete: function() {
                $('#loader').hide();
            }
            , error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            }
            , timeout: 8000
        })
    });

</script>
@stop


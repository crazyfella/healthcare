
@extends('admin.template.admin-master')

@section('content')


	<div class="content">
		<div class="row">
			<div class="col-sm-4 col-3">
				<h4 class="page-title">Pages</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
   				 @endif
			</div>
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-border table-striped custom-table datatable mb-0">
						<thead>
							<tr>
								<th>Page</th>
								<th>Action</th>
								<th>Date Updated</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($pages as $page)
							<tr>
								<td>{{$page->title}}</td>
								<td><a class="dropdown-item" href="{{ route('pages.show',$page->id) }} "><i class="fa fa-pencil m-r-5"></i> Edit</a></td>
								<td>{{date('F d, Y',strtotime($page->updated_at))}}</td>
							</tr>

							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>



@endsection
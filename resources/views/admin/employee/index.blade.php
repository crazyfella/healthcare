
@extends('admin.template.admin-master')

@section('content')


	<div class="content">
		<div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Employee</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="{{ route('employees.create') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Employee</a>
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
								
								<th>Last Name</th>
								<th>First Name</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Role</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($employees as $employee)
							<tr>
							
								<td>{{$employee->lastname}}</td>
								<td>{{$employee->firstname}}</td>
								<td>{{$employee->email}}</td>
								<td>{{$employee->phone}}</td>
								<td>{{$employee->role}}</td>
								<td class="text-right">
									
										<div class="dropdown dropdown-action">
											<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
											<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="{{ route('employees.show',$employee->id) }} " title="View Employee"><i class="fa fa-eye m-r-5 text-info "></i> View</a>
												<a class="dropdown-item" href="{{ route('employees.edit',$employee->id) }} " title="Edit Employee"><i class="fa fa-pencil m-r-5 text-warning "></i> Edit</a>
												
												<a class="dropdown-item"  data-toggle="modal" href="" id="smallButton" data-target="#smallModal" data-attr="{{ route('delete', $employee->id) }}" title="Delete Employee"><i class="fa fa-trash text-danger  fa-lg"></i> Delete</a>
											</div>
										</div>
                                </td>
							</tr>

							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
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

<script>
$('#submit').click(function(){
     /* when the submit button in the modal is clicked, submit the form */
    $('#formfield').submit();
});
</script>
@stop
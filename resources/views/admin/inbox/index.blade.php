
@extends('admin.template.admin-master')

@section('content')


<div class="content">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Inbox</h4>
           
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
            <div class="card-box">
                <div class="email-header">
                    <div class="row">
                        <div class="col-sm-10 col-md-8 col-8 top-action-left">
                            <div class="float-left">
                                <button style="margin-bottom: 10px btn-small" class="btn btn-primary delete_all" data-url="{{ url('inboxDeleteAll') }}">Delete All Selected</button>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                <div class="email-content">
                    <div class="table-responsive">
                        <table class="table table-inbox table-hover">
                            <thead>
                                <tr>
                                    <th colspan="6">
                                        <input type="checkbox" id="check_all">&nbsp;&nbsp;&nbsp;Select All
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($inbox->count())
                            @foreach ($inbox as $inboxs)
                                @if($inboxs->status=="0")
                                    <tr class="unread clickable-row" data-href="mail-view.html" id="tr_{{$inboxs->id}}">
                                @else
                                    <tr class="clickable-row" data-href="mail-view.html" id="tr_{{$inboxs->id}}">
                                @endif
                                    <td>
                                        <input type="checkbox" class="checkmail sub_chk" data-id="{{$inboxs->id}}">
                                    </td>
                                    <td class="name">{{$inboxs->name}}</td>
                                    <td class="subject">{{$inboxs->message}}</td>
                                    
                                    <td class="mail-date">{{$inboxs->created_at}}</td>

                                    <td>
                                    <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="{{ route('inbox.show',$inboxs->id) }} " title="View Message"><i class="fa fa-eye m-r-5 text-info "></i> View</a>
												
                                            <a class="dropdown-item"  data-toggle="modal" href="" id="smallButton" data-target="#smallModal" data-attr="{{ route('delete_message', $inboxs->id) }}" title="Delete Message"><i class="fa fa-trash text-danger  fa-lg"></i> Delete</a>
										</div>
                                    </div>
                                    </td>
                                </tr>
                            @endforeach  
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
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


<script type="text/javascript">
    $(document).ready(function () {

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });


        $('.delete_all').on('click', function(e) {


            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  


            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  else {  


                var check = confirm("Are you sure you want to delete all the messages?");  
                if(check == true){  
                    var join_selected_values = allVals.join(","); 


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });


                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });


        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });
</script>


@stop
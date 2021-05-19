@extends('admin.template.admin-master')

@section('content')
<div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">View Message</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="mailview-content">
                                <div class="mailview-header">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="text-ellipsis m-b-10">
                                                <span class="mail-view-title">{{$inbox->title}}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                          
                                        </div>
                                    </div>
                                    <div class="sender-info">
                                        <div class="sender-img">
                                            <img width="40" alt="" src="assets/img/user.jpg" class="rounded-circle">
                                        </div>
                                        <div class="receiver-details float-left">
                                            <span class="sender-name">{{$inbox->name}} ({{$inbox->email}})</span>
                                            
                                        </div>
                                        <div class="mail-sent-time">
                                            <span class="mail-time">{{$inbox->created_at}}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="mailview-inner">
                                    
                                    <p>{{$inbox->message}}</p>
                                    
                                </div>
                            </div>
                            
                            <div class="mailview-footer">
                                <div class="row">
                                    <div class="col-sm-6 left-action">
                                        
                                    </div>
                                    <div class="col-sm-6 right-action">
                                    <a class="button btn btn-white"  data-toggle="modal" href="" id="smallButton" data-target="#smallModal" data-attr="{{ route('delete_message', $inbox->id) }}" title="Delete"><i class="fa fa-trash-o"></i> Delete</a>
                                    </div>
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

@endsection
@extends('admin.template.admin-master')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{ route('setting.update', 1) }}" method="POST">
                @csrf
                @method('PUT')
                <h3 class="page-title">Company Settings</h3>
                @if ($errors->any())
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
                    <div class="col-md-12">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Company Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" value="{{$setting->company}}" name="company">
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control " name="address" value="{{$setting->address}}" type="text">
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Contact Person</label>
                            <input class="form-control " value="{{$setting->contact}}" type="text" name="contact">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" value="{{$setting->email}}" type="email" name="email">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input class="form-control" value="{{$setting->phone}}" type="text" name="phone">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input class="form-control" value="{{$setting->mobile}}" type="text" name="mobile">
                        </div>
                    </div>
                </div>
                <h3 class="page-title">Social Media Settings</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Facebook</label>
                            <input class="form-control " value="{{$setting->facebook}}" type="text" name="facebook">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Instagram</label>
                            <input class="form-control" value="{{$setting->instagram}}" type="text" name="instagram">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Linkedin</label>
                            <input class="form-control" value="{{$setting->linkedin}}" type="text" name="linkedin">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Twitter</label>
                            <input class="form-control" value="{{$setting->twitter}}" type="text" name="twitter">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>You Tube</label>
                            <input class="form-control" value="{{$setting->youtube}}" type="text" name="youtube">
                        </div>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-sm-12 text-center m-t-20">
                        <button type="submit" class="btn btn-primary submit-btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
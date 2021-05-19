@extends('admin.template.admin-master')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            

            <div class="card">
				<div class="card-body">
                   
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <h3 class="page-title">Profile Information</h3>
                    <p>Update your account's profile information and email address.</p>
                    <form action="{{ route('profile.update',Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" value="{{ Auth::user()->name, old('name') }}" class="form-control" name="name">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" value="{{ Auth::user()->email }}" class="form-control" name="email">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right m-t-20">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                
            <div class="card">
				<div class="card-body">
               
                @if ($message = Session::get('success_user'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <h3 class="page-title">Update Password</h3>
                <p>Ensure your account is using a long, random password to stay secure</p>
                <form action="{{ route('user.update',Auth::user()->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Current password</label>
                        <input type="password" class="form-control" name="current_password">
                        @if ($errors->has('current_password'))
                            <span class="text-danger">{{ $errors->first('current_password') }}</span>
                        @endif
                    </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>New password</label>
                            <input type="password" class="form-control" name="new_password">
                            @if ($errors->has('new_password'))
                            <span class="text-danger">{{ $errors->first('new_password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Confirm password</label>
                            <input type="password" class="form-control" name="password" autocomplete="current-password">
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    </div>
                        <div class="row">
                            <div class="col-sm-12 m-t-20">
                                <button type="submit" class="btn btn-primary">Update Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                
        </div>
    </div>
</div>

@endsection
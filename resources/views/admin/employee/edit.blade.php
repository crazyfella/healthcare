@extends('admin.template.admin-master')

@section('content')
<div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Edit Employee</h4>
                </div>
            </div>

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
            
            <form action="{{ route('employees.update',$employee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="card-box">
                <h3 class="card-title">Basic Informations</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-img-wrap">
                            <img class="inline-block" id="output" src="{{asset('images/employee/'. $employee->photo)}}" alt="user">
                            <div class="fileupload btn">
                                <span class="btn-text">upload</span>
                                <input class="upload" type="file" name="photo" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">First Name</label>
                                        <input type="text" class="form-control floating" name="firstname" value="{{old('firstname', $employee->firstname)}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Last Name</label>
                                        <input type="text" class="form-control floating"  name="lastname" value="{{old('lastname', $employee->lastname)}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Birth Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control floating datetimepicker" name="birthdate" type="text" value="{{ old('birthdate', date('d/m/Y', strtotime($employee->birthdate))) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus select-focus">
                                        <label class="focus-label">Gender</label>
                                        <select class="select form-control floating" name="gender">
                                            <option value="Male" @if (old('gender') == 'Male') @endif {{ ($employee->gender) == 'Male' ? 'selected' : '' }} >Male</option>
                                            <option value="Female" @if (old('gender') == 'Female') @endif {{ ($employee->gender) == 'Female' ? 'selected' : '' }} >Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box">
                <h3 class="card-title">Contact Informations</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-focus">
                            <label class="focus-label">Address</label>
                            <textarea class="form-control floating" name="address">{{old('address', $employee->email)}}</textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Phone Number</label>
                            <input type="text" class="form-control floating" value="{{old('phone', $employee->phone)}}" name="phone">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Email Address</label>
                            <input type="email" class="form-control floating" value="{{old('email', $employee->email)}}" name="email">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-box">
                <h3 class="card-title">Company Informations</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Employee ID</label>
                            <input type="text" class="form-control floating" value="{{old('employeeid', $employee->employeeid)}}" name="employeeid">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Role</label>
                            <input type="text" class="form-control floating" value="{{old('role' , $employee->role)}}" name="role">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Starting Date</label>
                            <div class="cal-icon">
                                <input type="text" class="form-control floating datetimepicker" value="{{old('joindate', date('d/m/Y', strtotime($employee->joindate)))}}" name="joindate">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus select-focus">
                            <label class="focus-label">Status</label>
                            <select class="select form-control floating" name="status">
                                <option value="Corporate" @if (old('status') == 'Corporate') @endif {{ ($employee->status) == 'Corporate' ? 'selected' : '' }} >Corporate</option>
                                <option value="Member" @if (old('status') == 'Member') @endif {{ ($employee->status) == 'Member' ? 'selected' : '' }} >Member</option>
                            </select>
                        </div>
                    </div>
                    
            </div>
            <div class="text-center m-t-20">
                <button class="btn btn-primary submit-btn" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection


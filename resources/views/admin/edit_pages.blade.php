@extends('admin.template.admin-master')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Edit Patient</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">

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
            <form action="{{ route('pages.update',$page->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Page Title <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="title" value="{{$page->title}}">
                        </div>
                    </div>
                   
                   
                </div>
                <div class="form-group">
                    <label>Content</label>
                        <textarea cols="30" rows="6" class="form-control" name="content" id="textarea">{{$page->content}}</textarea>
                    </div>
                
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Save</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

@endsection
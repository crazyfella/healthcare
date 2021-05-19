@extends('front.master')
@section('content')
<div class="inner">
    <div id="content">
        <div class="row">
            <h1>{{$page->title}}</h1>
            {!!$page->content!!}

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

            @if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
   				 @endif
           
            <form  class="ctc-form"  action="{{ route('inbox.store') }}" method="POST">
                @csrf
                <label>
                    <input type="text" name="name" placeholder="Name:" id="name" value="{{old('name')}}">
                    <span class="text-danger" id="name-error"></span>
                </label>
                <label>
                    <input type="text" name="address" placeholder="Address:" id="address" value="{{old('address')}}">
                    <span class="text-danger" id="address-error"></span>
                </label>
                <label>
                    <input type="text" name="email" placeholder="Email:" id="email" value="{{old('email')}}">
                    <span class="text-danger" id="email-error"></span>
                </label>
                <label>
                    <input type="text" name="phone" placeholder="Phone:" id="phone" value="{{old('phone')}}">
                    <span class="text-danger" id="phone-error"></span>
                </label>

                <label>
                    <input type="text" name="title" placeholder="Subject:" id="title" value="{{old('title')}}">
                    <span class="text-danger" id="title-error"></span>
                </label>
                <label>
                    <textarea name="message" cols="30" rows="10" placeholder="Message:" id="message">{{old('message')}}</textarea>
                    <span class="text-danger" id="message-error"></span>
                
                </label>
                <label>

                <label for="captcha"></label>
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
                    
                    <span class="text-danger" id="captcha-error"></span>
                </label>
                <label>
                    <input type="checkbox" name="consent" class="consentBox">I hereby consent to having this website store my submitted information so that they can respond to my inquiry.
                </label><br>
            
                <label>
                    <input type="checkbox" name="termsConditions" class="termsBox"/> I hereby confirm that I have read and understood this website's <a href="" target="_blank">Privacy Policy.</a>
                </label><br>
                
                <button type="submit" class="btn">SUBMIT FORM</button>

                <label>
                <b><span class="text-success" id="success-message"> </span><b>
                </label>
            </form>
        </div>
    </div>
</div>


@endsection


@section('script')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#contact-form').on('submit', function(event){
        event.preventDefault();
        $('#name-error').text('');
        $('#email-error').text('');
        $('#phone-error').text('');
        $('#address-error').text('');
        $('#message-error').text('');

        name = $('#name').val();
        email = $('#email').val();
        phone = $('#phone').val();
        address = $('#address').val();
        message = $('#message').val();

        $.ajax({
          url: "/contact-form",
          type: "POST",
          data:{
              name:name,
              email:email,
              phone:phone,
              address:address,
              message:message,
          },
          success:function(response){
            console.log(response);
            if (response) {
              $('#success-message').text(response.success);
              $("#contact-form")[0].reset();
            }
          },
          error: function(response) {
              $('#name-error').text(response.responseJSON.errors.name);
              $('#email-error').text(response.responseJSON.errors.email);
              $('#phone-error').text(response.responseJSON.errors.phone);
              $('#address-error').text(response.responseJSON.errors.address);
              $('#message-error').text(response.responseJSON.errors.message);
              $('#captcha-error').text(response.responseJSON.errors.captcha);
          }
         });
        });
      </script>
@endsection

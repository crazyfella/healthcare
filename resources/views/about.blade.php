@extends('front.master')
@section('content')
<div class="about-page">
<div class="inner">
    <div id="content">
        <div class="row">
            <h1>{{$page->title}}</h1>
            <div class="entry-content">
                {!!$page->content!!}
            </div>

            <div class="team">
                @foreach($employee as $data)
                    @if($data->status=="Corporate")
                        <div class="member">
                            <h3>{{$data->role}}</h3>
                            <div class="wrap">
                                <img src="images/employee/{{$data->photo}}" alt="Member Image">
                                <h5>{{$data->firstname}} {{$data->lastname}}</h5>
        
                            </div>
                        </div>
                    @endif
                    
                @endforeach
            </div>

            <div class="team bot">
                @foreach($employee as $data)
                    @if($data->status=="Member")
                        <div class="member">
                        <h3>{{$data->role}}</h3>
                        <div class="wrap">
                            <img src="images/employee/{{$data->photo}}" alt="Member Image">
                            <h5>{{$data->firstname}} {{$data->lastname}}</h5>
                        </div>
                        </div>
                    @endif
                @endforeach  
            </div>


            <!-- <div class="team">
                <div class="member">
                    <h3>CEO/ Corporate President</h3>
                    <div class="wrap">
                        <img src="images/content/jacky.jpg" alt="Member Image">
                        <h5>Jacqueline A. Martes</h5>
  
                    </div>
                </div>
                <div class="member">
                    <h3>Corporate Vice PRESIDENT/ Director II</h3>
                    <div class="wrap">
                        <img src="images/content/Nancy.jpg" alt="Member Image">
                        <h5>NANCY M. NUÑEZ</h5>

                    </div>
                </div>

            </div>
            <div class="team bot">
                    <div class="member">
                        <h3>TREASURER/ACCOUNTANT</h3>
                        <div class="wrap">
                            <img src="images/content/Rhieca.jpg" alt="Member Image">
                            <h5>RHIECA T. DE VERA</h5>
                        </div>
                    </div>
                    <div class="member">
                        <h3>CORPORATE SECRETARY/Director I</h3>
                        <div class="wrap">
                            <img src="images/content/Jonalyn.jpg" alt="Member Image">
                            <h5>JONALYN M. NUÑEZ</h5>
                        </div>
                    </div>
                    <div class="member">
                        <h3>LIAISON OFFICER I</h3>
                        <div class="wrap">
                            <img src="images/content/user.jpg" alt="Member Image">
                            <h5>RENNIE A. HONJERAS</h5>
                        </div>
                    </div>

            </div>

            <div class="team bot">
                <div class="member">
                    <h3>LIAISON OFFICER II</h3>
                    <div class="wrap">
                        <img src="images/content/user.jpg" alt="Member Image">
                        <h5>ARMEN B. MENOR</h5>
                    </div>
                </div>
            </div> -->

            
    </div>
</div>
</div>
@endsection

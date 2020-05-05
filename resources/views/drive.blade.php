@extends('user.layout.app')

@section('content')
<div class="banner row no-margin" style="background-image: url('{{ asset('asset/img/banner-bg.jpg') }}');">
    <div class="banner-overlay"></div>
    <div class="container pad-60">
        <div class="col-md-8">
            <h2 class = "banner-head"> <span class = "strong"> Work or extra income? </span> <br> Be a driver and increase your earnings </h2></div>
        <div class="col-md-4">
            <div class="banner-form">
                <div class="row no-margin fields">
                    <div class="left">
                    	<img src="{{asset('asset/img/taxi-app.png')}}">
                    </div>
                    <div class="right">
                        <a href="{{url('provider/login')}}">
                            <h3> I want to be a Driver </h3>
                             <h5> SIGN UP <i class = "fa fa-chevron-right"> </i> </h5>
                        </a>
                    </div>
                </div>
                
                <div class="row no-margin fields">
                    <div class="left">
                    	<img src="{{asset('asset/img/taxi-app.png')}}">
                    </div>
                    <div class="right">
                        <a href="{{url('login')}}">
                            <h3> I'm a passenger </h3>
                            <h5> SIGN UP <i class = "fa fa-chevron-right"> </i> </h5>
                        </a>
                    </div>
                </div>
                <!-- <p class="note-or">Or <a href="{{ url('login') }}">sign in</a> with your rider account.</p> -->
            </div>
        </div>
    </div>
</div>

<div class="row white-section pad-60 no-margin">
    <div class="container">
        
        <div class = "col-md-4 content-block small">
                         <div class = "box-shadow">
                            <div class = "icon"> <img src = "{{asset ('asset / img / driving-license.png')}}"> </div>
                        <h2> You own your time </h2>
                        <div class = "title-divider"> </div>
                        <p> You can drive with {{config ('constants.site_title', 'Thinkin Cab')}} anytime, day or night, 365 days a year. Travel does not interfere with your routine, you make your schedules, go offline at any time. </p>
                    </div>
                </div>
            
                    <div class = "col-md-4 content-block small">
                         <div class = "box-shadow">
                            <div class = "icon"> <img src = "{{asset ('asset / img / destination.png')}}"> </div>
                        <h2> Do more each shift </h2>
                        <div class = "title-divider"> </div>
                        <p> Travel fares start at a base value and increase over time and distance. And when demand is higher than normal, drivers earn more. </p>
                    </div>
                </div>

    <div class = "col-md-4 content-block small">
                      <div class = "box-shadow">
                         <div class = "icon"> <img src = "{{asset ('asset / img / taxi-app.png')}}"> </div>
                     <h2> Download the app and enjoy </h2>
                     <div class = "title-divider"> </div>
                     <p> You'll get step-by-step instructions, tools to help you earn more, and 24/7 support, all available right in the app. </p>
                 </div>
    </div>

    </div>
</div>

<div class="row gray-section no-margin full-section">
    <div class="container">                
        <div class="col-md-6 content-block">
            <div class = "icon"> <img src = "{{asset ('asset / img / taxi-car.png')}}"> </div>
             <h3> About the app </h3>
             <h2> Designed for drivers </h2>
             <div class = "title-divider"> </div>
             <p> When you want to make money, just open the app, go online and start receiving travel requests. You will receive passenger information and directions to their location and destination. When the trip is over, you may receive another request nearby. When you want to rest, you can log out at any time. </p>
             <a class="content-more more-btn" href="{{url('login')}}"> DOWNLOAD THE APP AND START NOW <i class = "fa fa-chevron-right"> </i> </a>
        </div>
        <div class="col-md-6 full-img text-center" style="background-image: url({{ asset('asset/img/driver-car.jpg') }});"> 
            <!-- <img src="img/anywhere.png"> -->
        </div>
    </div>
</div>

<div class="row white-section pad-60 no-margin">
    <div class="container">
        
        <div class="col-md-4 content-block small">
            <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/budget.png')}}"></div>
            <h2>Recompensas</h2>
            <div class="title-divider"></div>
            <p>You are in the driver's seat. So reward yourself with discounts on fuel, vehicle maintenance, cell phone bills and more. Reduce your daily expenses and bring more money home.</p>
        </div></div>

        <div class="col-md-4 content-block small">
            <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/driving-license.png')}}"></div>
            <h2>Requisitos</h2>
            <div class="title-divider"></div>
            <p>Know that you are ready to drive. Whether you are driving your own vehicle or a commercially licensed vehicle, you must meet the minimum requirements and conduct an online safety screening.</p>
        </div></div>

        <div class="col-md-4 content-block small">
            <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/seat-belt.png')}}"></div>
            <h2>Segurança</h2>
            <div class="title-divider"></div>
            <p>When you drive with {{config ('constants.site_title', 'Thinkin Cab')}}, you get 24/7 support. All runners are verified with their personal information and phone number. That way you will know who is traveling and so will we. </p>
        </div></div>

    </div>
</div>
            
<!--<div class="row find-city no-margin">
    <div class="container">
        <div class="col-md-12 center content-block">
            <div class="box-shadow">
                <div class="pad-60 ">
        <h2>Começe a ganhar dinheiro</h2>
        <p>Pronto para ganhar dinheiro? O primeiro passo é se cadastrar.</p>
<a class="content-more more-btn" href="{{url('login')}}">COMEÇE A DIRIGIR AGORA <i class="fa fa-chevron-right"></i></a>
         <button type="submit" class="full-primary-btn drive-btn">START DRIVE NOW</button> 
    </div>
</div>
</div>
    </div>
</div>-->

<!-- <div class="footer-city row no-margin" style="background-image: url({{ asset('asset/img/footer-city.png') }});"></div> -->
@endsection
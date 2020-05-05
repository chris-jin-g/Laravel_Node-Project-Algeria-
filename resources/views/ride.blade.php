@extends('user.layout.app')

@section('content')
    <div class="banner row no-margin" style="background-image: url('{{ asset('asset/img/banner-bg.jpg') }}');">
        <div class="banner-overlay"></div>
        <div class="container pad-60">
            <div class="col-md-8">
                <h2 class="banner-head"><span class="strong">A melhor maneira de chegar</span><br>Onde quer que você vá</h2>
            </div>
            <div class="col-md-4">
                <div class="banner-form">
                    <div class="row no-margin fields">
                        <div class="left">
                           <img src="{{asset('asset/img/taxi-app.png')}}">
                        </div>
                        <div class="right">
                            <a href="{{url('login')}}">
                                <h3>Vá de {{config('constants.site_title','Moob')}}</h3>
                                <h5>CADASTRE-SE <i class="fa fa-chevron-right"></i></h5>
                            </a>
                        </div>
                    </div>
                    <div class="row no-margin fields">
                        <div class="left">
                        <img src="{{asset('asset/img/taxi-app.png')}}">
                        </div>
                        <div class="right">
                            <a href="{{url('provider/login')}}">
                                <h3>Quer ser Motorista?</h3>
                                <h5>CADASTRE-SE <i class="fa fa-chevron-right"></i></h5>
                            </a>
                        </div>
                    </div>

                   <!--  <p class="note-or">Or <a href="{{url('provider/login')}}">sign in</a> with your driver account.</p> -->
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row white-section pad-60 no-margin">
        <div class="container ">
            
            <div class="col-md-4 content-block small">
                <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/taxi-app.png')}}"></div>
                <h2>Solicite uma viagem</h2>
                <div class="title-divider"></div>
                <p>{{ config('constants.site_title', 'Moob')  }} é a maneira mais inteligente de se locomover. Um toque e um carro ou moto vai até você. Seu motorista sabe exatamente para onde ir. E você pode pagar com dinheiro ou cartão.</p>
            </div>
        </div>

            <div class="col-md-4 content-block small">
                 <div class="box-shadow">
                 <div class="icon"><img src="{{asset('asset/img/destination.png')}}"></div>
                <h2>Escolha como pagar</h2>
                <div class="title-divider"></div>
                <p>Quando chegar ao seu destino, pague com dinheiro ou solicite sua viagem com cartão ou saldo da carteira. Com o {{ config('constants.site_title', 'Moob') }}, a escolha é sua.</p>
            </div>
        </div>

            <div class="col-md-4 content-block small">
                 <div class="box-shadow">
                 <div class="icon"><img src="{{asset('asset/img/budget.png')}}"></div>
                <h2>Você avalia, nós escutamos</h2>
                <div class="title-divider"></div>
                <p>Avalie seu motorista e forneça comentários anônimos sobre sua viagem. Sua entrada nos ajuda a tornar cada passeio uma experiência de 5 estrelas.</p>
            </div>
        </div>


        </div>
    </div>

    <div class="row gray-section pad-60">
        <div class="container content-block"> 
         <div class="icon"><img src="{{ asset('asset/img/destination.png') }}"></div>               
            <h2>Há uma carona para cada preço<br>E qualquer ocasião</h2>
            <div class="car-tab">
                <ul class="nav nav-tabs">
                    @foreach($services as $index => $service)
                        @if($index == 0) 
                            <li class="active" style="text-transform: uppercase;"><a data-toggle="tab" href="#service-{{$index}}">{{ $service->name }}</a></li>
                        @else
                            <li style="text-transform: uppercase;"><a data-toggle="tab" href="#service-{{$index}}">{{ $service->name }}</a></li>
                        @endif

                    @endforeach
                </ul>

                <div class="tab-content">
                    @foreach($services as $index => $service)
                        @if($index == 0) 
                            <div id="service-{{$index}}" class="tab-pane fade in active">
                                <div class="car-slide">
                                    @if($service->image) 
                                        <img src="{{$service->image}}" style="height: 300px" >
                                    @else
                                        <img src="{{asset('/asset/img/car-slide1.png')}}">
                                    @endif
                                </div>
                            </div>
                        @else
                            <div id="service-{{$index}}" class="tab-pane fade">
                                <div class="car-slide">
                                    @if($service->image) 
                                        <img src="{{$service->image}}" style="height: 300px" >
                                    @else
                                        <img src="{{asset('/asset/img/car-slide1.png')}}">
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="row white-section pad-60">
        <div class="container">
            
            <div class="col-md-6 content-block">
                 <div class="icon"><img src="{{ asset('asset/img/budget.png') }}"></div>    
                <h4>Preço</h4>
                <h2>Estimativa de tarifa</h2>
                <div class="title-divider"></div>
                <form method="post" id="idForm" onsubmit="return">

                    {{ csrf_field() }}
                <div class="input-group fare-form">
                    <input type="text" class="form-control"  placehold="Local de partida" id="origin-input" name="s_address">                               
                </div>

                <div class="input-group fare-form no-border-right">
                    <input type="text" class="form-control"  placehold="Local de chegada" id="destination-input" name="d_address">
                   
                </div>
                

                <div class="input-group fare-form no-border-right">
                <select id="service_type" name="service_type" required  class="form-control">
                @foreach($services as $list_service)
                <option value="{{$list_service->id}}">{{$list_service->name}}</option>
                @endforeach
                </select>
                </div>

                 <input type="hidden" name="s_latitude" id="origin_latitude">
                    <input type="hidden" name="s_longitude" id="origin_longitude">
                    <input type="hidden" name="d_latitude" id="destination_latitude">
                    <input type="hidden" name="d_longitude" id="destination_longitude">
                    <input type="hidden" name="current_longitude" id="long">
                    <input type="hidden" name="current_latitude" id="lat">
                    
                 <button type="submit" id="btnSubmit" class="full-primary-btn fare-btn">SIMULAR</button>

                <div id="div1" class="full-primary-btn fare-btn"  style="text-align: center; display: none"></div>
                        
                <div id="div2" class="full-primary-btn fare-btn" style="text-align: center; display: none"></div>

                </form>
            </div>

            <div class="col-md-6 map-right">
                <div class="map-responsive" style="padding-bottom: 73.25%;">
                    <div id="map" style="width: 100%; height: 450px;"></div>
                </div>                                
            </div>
            
        </div>
    </div>          

    <!-- <div class="row gray-section no-margin">
        <div class="container">                
            <div class="col-md-6 content-block">
                <h2>Safety Putting people first</h2>
                <div class="title-divider"></div>
                <p>Whether riding in the backseat or driving up front, every part of the {{ config('constants.site_title', 'Thinkin Cab') }} experience has been designed around your safety and security.</p>
                <a class="content-more" href="#">HOW WE KEEP YOU SAFE <i class="fa fa-chevron-right"></i></a>
            </div>
            <div class="col-md-6 img-block text-center"> 
                <img src="{{asset('asset/img/seat-belt.jpg')}}">
            </div>
        </div>
    </div> -->
    <div class="row gray-section pad-60 full-section">
    <div class="container">
        <div class="col-md-6 content-block">
              <div class="icon"><img src="{{ asset('asset/img/seat-belt.png') }}"></div>
            <h2>Segurança em primeiro lugar</h2>
            <div class="title-divider"></div>
            <p>Seja andando no banco de trás ou dirigindo na frente, todo o sistema do {{ config('constants.site_title', 'Moob') }} foi desenvovido para dar a melhor experiencia de viagem com total qualidade e segurança.</p>
            <a class="content-more more-btn" href="{{url('login')}}">VÁ COM SEGURANÇA, CADASTRE-SE <i class="fa fa-chevron-right"></i></a>
        </div>
        <!-- <div class="col-md-6 img-box text-center"> 
            <img src="{{ asset('asset/img/seat-belt.jpg') }}">
        </div> -->
        <div class="col-md-6 full-img text-center" style="background-image: url({{ asset('asset/img/safty-bg.jpg') }});"> 
            <!-- <img src="img/anywhere.png"> -->
        </div>
    </div>
</div>

<!--<div class="row find-city">
    <div class="container pad-60 content-block center">
        <h2>{{ config('constants.site_title','Moob') }} na sua cidade</h2>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
        <form>
            <div class="input-group find-form">                
                <input type="text" class="form-control"  placehold="Buscar cidade" id="mode-selector" name="s_address1">  
                <span class="input-group-addon">
                    <button type="button" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-2x fa-arrow-right"></i>
                    </button>  
                </span>
            </div>
        </form>
    </div>
</div>
    </div>
</div>-->
    <!-- <div class="row find-city no-margin">
        <div class="container">
            <h2>{{config('constants.site_title','Thinkin Cab')}} is in your city</h2>
            <form>
                <div class="input-group find-form">
                    <input type="text" class="form-control"  placehold="Search" >
                    <span class="input-group-addon">
                        <button type="submit">
                            <i class="fa fa-arrow-right"></i>
                        </button>  
                    </span>
                </div>
            </form>
        </div>
    </div> -->
    <?php $footer = asset('asset/img/footer-city.png'); ?>
    <!-- <div class="footer-city row no-margin" style="background-image: url({{$footer}});"></div> -->
@endsection


@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function () {

    $("#btnSubmit").click(function (event) {

    event.preventDefault();

    $.ajax({
       type: "POST",
       url: "{{url('/fare')}}",
       data: $("#idForm").serialize(),

       success: function(data)
       { 
           $("#div1").show();
           $("#div2").show();
           $("#div1").html("Preço estimado - R$"+data.estimated_fare+",00");
           $("#div2").html("Distância - "+data.distance+" Km(s)");
       }
     });


 

   });

});

</script>


@endsection




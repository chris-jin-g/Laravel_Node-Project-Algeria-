@extends('user.layout.app')

@section('content')
<div class="banner row no-margin" style="background-image: url('{{ asset('asset/img/banner-bg.jpg') }}');">
    <div class="banner-overlay"></div>
    <div class="container pad-60">
        <div class="col-md-8">
            <h2 class="banner-head"><span class="strong">Trabalho ou renda extra?</span><br>Seja um motorista e aumente seus ganhos</h2>
        </div>
        <div class="col-md-4">
            <div class="banner-form">
                <div class="row no-margin fields">
                    <div class="left">
                    	<img src="{{asset('asset/img/taxi-app.png')}}">
                    </div>
                    <div class="right">
                        <a href="{{url('provider/login')}}">
                            <h3>Quero ser Motorista</h3>
                            <h5>CADASTRE-SE <i class="fa fa-chevron-right"></i></h5>
                        </a>
                    </div>
                </div>
                
                <div class="row no-margin fields">
                    <div class="left">
                    	<img src="{{asset('asset/img/taxi-app.png')}}">
                    </div>
                    <div class="right">
                        <a href="{{url('login')}}">
                            <h3>Sou Passageiro</h3>
                            <h5>CADASTRE-SE <i class="fa fa-chevron-right"></i></h5>
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
        
        <div class="col-md-4 content-block small">
             <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/driving-license.png')}}"></div>
            <h2>Você dono é seu tempo</h2>
            <div class="title-divider"></div>
            <p>Você pode dirigir com o {{ config('constants.site_title', 'Moob Urban') }} a qualquer hora, dia ou noite, 365 dias por ano. As viagens não interferem na sua rotina, você faz seus horários, fique offline a qualquer momento.</p>
        </div>
    </div>

        <div class="col-md-4 content-block small">
             <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/destination.png')}}"></div>
            <h2>Faça mais em cada turno</h2>
            <div class="title-divider"></div>
            <p>As tarifas de viagem começam com um valor base e aumentam com o tempo e a distância. E quando a demanda é maior que o normal, os motoristas ganham mais.</p>
        </div>
    </div>

        <div class="col-md-4 content-block small">
             <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/taxi-app.png')}}"></div>
            <h2>Baixe o app e desfrute</h2>
            <div class="title-divider"></div>
            <p>Você receberá instruções passo-a-passo, ferramentas para ajudar você a ganhar mais e suporte 24 horas por dia, 7 dias por semana, tudo disponível diretamente no aplicativo.</p>
        </div>
    </div>

    </div>
</div>

<div class="row gray-section no-margin full-section">
    <div class="container">                
        <div class="col-md-6 content-block">
            <div class="icon"><img src="{{asset('asset/img/taxi-car.png')}}"></div>
            <h3>Sobre o aplicativo</h3>
            <h2>Projetado para motoristas</h2>
            <div class="title-divider"></div>
            <p>Quando você quiser ganhar dinheiro, basta abrir o aplicativo, fica online e começará a receber solicitações de viagem. Você receberá informações sobre o passageiro e as rotas para a localização e o destino deles. Quando a viagem terminar, você pode receber uma outra solicitação próxima. Quando querer descansar, você pode se desconectar a qualquer momento.</p>
            <a class="content-more more-btn" href="{{url('login')}}">BAIXE O APP E COMECE AGORA <i class="fa fa-chevron-right"></i></a>
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
            <p>Você está no banco do motorista. Então, recompense-se com descontos em combustível, manutenção de veículos, contas de telefone celular e muito mais. Reduza suas despesas diárias e leve mais dinheiro para casa.</p>
        </div></div>

        <div class="col-md-4 content-block small">
            <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/driving-license.png')}}"></div>
            <h2>Requisitos</h2>
            <div class="title-divider"></div>
            <p>Saiba que você está pronto para dirigir. Não importa se você está dirigindo seu próprio veículo ou um licenciado comercialmente, é necessário atender aos requisitos mínimos e realizar uma triagem de segurança on-line.</p>
        </div></div>

        <div class="col-md-4 content-block small">
            <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/seat-belt.png')}}"></div>
            <h2>Segurança</h2>
            <div class="title-divider"></div>
            <p>Quando você dirige com {{ config('constants.site_title', 'Moob Urban') }}, você obtém suporte 24/7. Todos os corredores são verificados com suas informações pessoais e número de telefone. Assim, você saberá quem está viajando e nós também.</p>
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
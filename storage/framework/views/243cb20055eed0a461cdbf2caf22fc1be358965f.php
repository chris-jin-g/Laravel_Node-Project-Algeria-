<?php $__env->startSection('content'); ?>
<!-- <div class="banner row no-margin" style="background-image: url('<?php echo e(asset('asset/img/banner-bg.jpg')); ?>');">
    <div class="banner-overlay"></div>
    <div class="container">
        <div class="col-md-8">
            <h2 class="banner-head"><span class="strong">Get there</span><br>Your day belongs to you</h2>
        </div>
        <div class="col-md-4">
            <div class="banner-form">
                <div class="row no-margin fields">
                    <div class="left">
                        <img src="<?php echo e(asset('asset/img/ride-form-icon.png')); ?>">
                    </div>
                    <div class="right">
                        <a href="<?php echo e(url('login')); ?>">
                            <h3>Sign up to Ride</h3>
                            <h5>SIGN UP <i class="fa fa-chevron-right"></i></h5>
                        </a>
                    </div>
                </div>
                <div class="row no-margin fields">
                    <div class="left">
                        <img src="<?php echo e(asset('asset/img/ride-form-icon.png')); ?>">
                    </div>
                    <div class="right">
                        <a href="<?php echo e(url('/provider/register')); ?>">
                            <h3>Sign up to Drive</h3>
                            <h5>SIGN UP <i class="fa fa-chevron-right"></i></h5>
                        </a>
                    </div>
                </div>
                <p class="note-or">Or <a href="<?php echo e(url('/provider/login')); ?>">sign in</a> with your rider account.</p>
            </div>
        </div>
    </div>
</div> -->
<div class="banner row no-margin" style="background-position: center; background-image: url('<?php echo e(asset('asset/img/login-bg.jpg')); ?>');">
    <div class="banner-overlay"></div>
    <div class="container slider pad-60">
        <div class="row">
        <div class="col-md-12 center ">

            <h2 class="banner-head">Viagem ou entrega?<br>A escolha é sua</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-md-offset-3">
             <div class="row no-margin fields banner-ride-drive">
                    <div class="btn-icon">
                        <img src="<?php echo e(asset('asset/img/destination.png')); ?>">
                    </div>
                    <div class="btn-txt">
                        <a href="<?php echo e(url('login')); ?>">
                            <h3 class="btn-title">Passageiro</h3>
                            <!-- <h5>SIGN UP <i class="fa fa-chevron-right"></i></h5> -->
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
             <div class="row no-margin fields banner-ride-drive">
                    <div class="left">
                        <img src="<?php echo e(asset('asset/img/taxi-car.png')); ?>">
                    </div>
                    <div class="right">
                        <a href="<?php echo e(url('/provider/login')); ?>">
                            <h3 class="btn-title">Motorista</h3>
                            <!-- <h5>SIGN UP <i class="fa fa-chevron-right"></i></h5> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="banner-form">
                <div class="row no-margin fields">
                    <div class="left">
                        <img src="<?php echo e(asset('asset/img/ride-form-icon.png')); ?>">
                    </div>
                    <div class="right">
                        <a href="<?php echo e(url('login')); ?>">
                            <h3>Sign up to Ride</h3>
                            <h5>SIGN UP <i class="fa fa-chevron-right"></i></h5>
                        </a>
                    </div>
                </div>
                <div class="row no-margin fields">
                    <div class="left">
                        <img src="<?php echo e(asset('asset/img/ride-form-icon.png')); ?>">
                    </div>
                    <div class="right">
                        <a href="<?php echo e(url('/provider/register')); ?>">
                            <h3>Sign up to Drive</h3>
                            <h5>SIGN UP <i class="fa fa-chevron-right"></i></h5>
                        </a>
                    </div>
                </div>
                <p class="note-or">Or <a href="<?php echo e(url('/provider/login')); ?>">sign in</a> with your rider account.</p>
            </div>
        </div> -->
    </div>
</div>
<div class="row white-section pad-60">
    <div class="container">
        <div class="col-md-6 img-box text-center"> 
            <img src="<?php echo e(asset('asset/img/screen-bg.png')); ?>">
        </div>
        <div class="col-md-6">
             <div class="content-block">
              <div class="icon"><img src="<?php echo e(asset('asset/img/taxi-app.png')); ?>"></div>
            <h2>Agilidade, praticidade e segurança na palma da mão</h2>
            <div class="title-divider"></div>
            <p><?php echo e(config('constants.site_title', 'Moob Urban')); ?> é a maneira mais inteligente de se locomover. Um toque e um carro ou moto vai até você. Seu motorista sabe exatamente para onde ir. E você pode pagar com dinheiro ou cartão.</p>
            <a class="content-more more-btn" href="<?php echo e(url('/ride')); ?>">SAIBA MAIS <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
    </div>
</div>

<div class="row gray-section pad-60">
    <div class="container">                
        <div class="col-md-6">
            <div class="content-block">
            <div class="icon"><img src="<?php echo e(asset('asset/img/destination.png')); ?>"></div>
            <h2>A qualquer hora, em qualquer lugar</h2>
            <div class="title-divider"></div>
            <p>Viagem para o trabalho, entregas, passeios pela cidade, ir para a faculdade, aquela balada noturna, aonde quer que você vá, conte com o <?php echo e(config('constants.site_title', 'Moob Urban')); ?> para uma viagem segura.</p>
            <a class="content-more more-btn" href="<?php echo e(url('/ride')); ?>">SAIBA MAIS <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
        <div class="col-md-6 img-box text-center"> 
            <img src="<?php echo e(asset('asset/img/screen-bg-3.png')); ?>">
        </div>
    </div>
</div>

<div class="row white-section pad-60">
    <div class="container">
        <div class="col-md-6 img-box text-center"> 
            <img src="<?php echo e(asset('asset/img/screen-bg-4.png')); ?>">
        </div>
        <div class="col-md-6 content-block">
              <div class="icon"><img src="<?php echo e(asset('asset/img/budget.png')); ?>"></div>
            <h2>Transporte executivo de baixo custo</h2>
            <div class="title-divider"></div>
            <p>Vai de carro ou de moto? com o <?php echo e(config('constants.site_title', 'Moob Urban')); ?> você anda de tarnsporte executivo com baixo custo.</p>
            <a class="content-more more-btn" href="<?php echo e(url('/ride')); ?>">SAIBA MAIS <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
</div>

<div class="row gray-section pad-60 full-section">
    <div class="container">                
        <div class="col-md-6 content-block">
              <div class="icon"><img src="<?php echo e(asset('asset/img/car-wheel.png')); ?>"></div>
            <h5>Atrás do votante</h5>
            <h2>São pessoas como você, seguindo seu caminho</h2>
            <div class="title-divider"></div>
            <p>O <?php echo e(config('constants.site_title', 'Moob Urban')); ?> conta com os mais responsáveis motoristas, são pessoas com grande experiência e apaixonadas pelo que fazem. Eles são mães e pais, alunos e professores, veteranos vizinhos, amigos, nossos parceiros do dia-a-dia.</p>
            <a class="content-more more-btn" href="<?php echo e(url('/drive')); ?>">QUERO SER MOTORISTA <i class="fa fa-chevron-right"></i></a>
        </div>
        <div class="col-md-6 full-img text-center" style="background-image: url(<?php echo e(asset('asset/img/behind-the-wheel.jpg')); ?>);"> 
            <!-- <img src="img/anywhere.png"> -->
        </div>
    </div>
</div>

<div class="row white-section pad-60 ">
    <div class="container">
        <div class="col-md-6 img-box text-center"> 
            <img src="<?php echo e(asset('asset/img/cost-cities.png')); ?>">
        </div>
        <div class="col-md-6 content-block">
              <div class="icon"><img src="<?php echo e(asset('asset/img/taxi-location.png')); ?>"></div>
            <h2>Contribuindo para o transporte pelo bem de todos</h2>
            <div class="title-divider"></div>
            <p>Uma cidade com o <?php echo e(config('constants.site_title', 'Moob Urban')); ?> tem mais oportunidades econômicas para os residentes e melhor acesso ao transporte para aqueles que não o possuem.</p>
            <a class="content-more more-btn" href="<?php echo e(url('/login')); ?>">SOLICITE SEU TRANSPORTE <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
</div>

<div class="row gray-section pad-60 full-section">
    <div class="container">
        <div class="col-md-6 content-block">
              <div class="icon"><img src="<?php echo e(asset('asset/img/seat-belt.png')); ?>"></div>
            <h2>Segurança com as pessoas em primeiro lugar</h2>
            <div class="title-divider"></div>
            <p>Seja andando no banco de trás ou dirigindo na frente, todo o sistema do <?php echo e(config('constants.site_title', 'Moob Urban')); ?> foi desenvovido para dar a melhor experiencia de viagem com total qualidade e segurança.</p>
            <a class="content-more more-btn" href="<?php echo e(url('/login')); ?>">VÁ COM SEGURANÇA, CADASTRE-SE <i class="fa fa-chevron-right"></i></a>
        </div>
        <!-- <div class="col-md-6 img-box text-center"> 
            <img src="<?php echo e(asset('asset/img/seat-belt.jpg')); ?>">
        </div> -->
        <div class="col-md-6 full-img text-center" style="background-image: url(<?php echo e(asset('asset/img/safty-bg.jpg')); ?>);"> 
            <!-- <img src="img/anywhere.png"> -->
        </div>
    </div>
</div>
<!--<div class="row find-city">
    <div class="container pad-60 content-block center">
        <h2><?php echo e(config('constants.site_title','Moob Urban')); ?> na sua cidade</h2>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
        <form>
            <div class="input-group find-form">
                <input type="text" class="form-control" placeholder="Buscar cidade" id="origin-input">
                <div id="map" style="display: none;"></div>
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
<!-- <div class="row app-dwon pad-60">
    <div class="container pad-60"">
        <div class="row center">
            <h2>Get App on</h2>
            <div class="col-md-3 col-md-offset-3">
                 
             <a href="<?php echo e(config('constants.store_link_ios','#')); ?>">
            <img src="<?php echo e(asset('asset/img/appstore.png')); ?>">
                                        </a>
            </div>
            <div class="col-md-3">
             <a href="<?php echo e(config('constants.store_link_android','#')); ?>">
                                            <img src="<?php echo e(asset('asset/img/playstore.png')); ?>">
                                        </a>
                                    </div>
        </div>
    </div>
</div>

    <div class="container footer-social content-block pad-60"">
        <div class="row center">
            <h2>Get Connect with Scoical Media</h2>
            <div class="col-md-6 col-md-offset-3">
                 <div class="socil-media">
                   <ul>
                                    <li><a href="#"><i class="fa fa-2x fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-2x fa-twitter"></i></a></li>
                                </ul>
                 </div>
             </div>
    </div>
</div> -->



<!-- <div class="footer-city row no-margin" style="background-image: url(<?php echo e(asset('asset/img/footer-city.png')); ?>);"></div> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
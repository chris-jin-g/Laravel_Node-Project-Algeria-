@extends('user.layout.base')

@section('title', 'Payment')

@section('content')

<div class="col-md-9">
    <div class="dash-content">
        <div class="row no-margin">
            <div class="col-md-12">
                <h4 class="page-title">@lang('user.referral')</h4>
            </div>
        </div>
        @include('common.notify')
        <div class="row no-margin payment">
            <div class="col-md-12">
                <div class="wallet">
                    <div class="refer-box">
                        <h4>
                            Compartilhe seu código de referência: 
                            <span class="txt">
                                @if(!empty(Auth::user()->referral_unique_id)){{Auth::user()->referral_unique_id}}@else - @endif
                            </span>
                        </h4>
                        <h4>
                            Contagem de Referências : 
                            <span class="txt">
                                @if(!empty($referrals[0]->total_count)){{$referrals[0]->total_count}}@else 0 @endif
                            </span>
                        </h4>
                        <h4>
                            Valor de Referências : 
                            <span class="txt">
                                @if(!empty($referrals[0]->total_amount)){{$referrals[0]->total_amount}}@else 0 @endif
                            </span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">


                <div class="refer-box">
                    <h3>Indique seus amigos e ganhe até 20%</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                    <form>
                        <div class="clearfix form-row">
                            <div class="form-group col-md-10">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input type="email" class="form-control" id="inviteEmail" aria-describedby="emailHelp" placehold="Infome seu E-mail">
                            </div>
                        </div>
                        <div class="form-row clearfix">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1"></label>
                                <a id="invite" href="mailto:testmail?subject=Convido você se juntar ao {{config('constants.site_title','Thinkin Cab')}}&body=Hi,%0A%0A Eu participo deste site e achei que você poderia gostar. Use meu código de referência({{\Auth::user()->referral_unique_id}}) e faça seu cadastro.%0A%0A Site: {{url('/')}}/provider/login %0A Código Referência: {{\Auth::user()->referral_unique_id}}" class="btn btn-invite">Convidar</a> 
                            </div>
                        </div>
                    </form>

                </div>
                <div class="refer-box">
                    <h3>Indique seus amigos das redes sociais</h3>
                    <div class="refer-social">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="refersocial-icon">
                                    <li><a class="" target="_blank" href="https://www.facebook.com/share?url"><i class="fa fa-2x fa-facebook-official" aria-hidden="true"></i>
                                        </a></li>
                                    <li><a class="" target="_blank" href="https://twitter.com/share?url"><i class="fa fa-2x fa-twitter-square" aria-hidden="true"></i>
                                        </a></li>

                                </ul>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
    $('#invite').on('click', function (e) {
        e.preventDefault();
        var href = $('#invite').attr('href');
        var start = href.indexOf(":");
        var end = href.indexOf("?");
        var email = $('#inviteEmail').val();
        href.substr(start + 1, (end - start) - 1);
        var url = href.replace(href.substr(start + 1, (end - start) - 1), email);
        window.location = url;
    });
</script>
@endsection
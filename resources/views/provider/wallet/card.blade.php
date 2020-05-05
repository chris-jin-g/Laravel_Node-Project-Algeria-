<?php
if(config('constants.card', 0) == 0){
    header('Location:/provider/profile');
    exit;
}   
?>
@extends('provider.layout.app')

@section('content')
<div class="pro-dashboard-head">
    <div class="container">
        <a href="{{ route('provider.profile.index') }}" class="pro-head-link">@lang('provider.profile.profile')</a>
        <a href="{{ route('provider.documents.index') }}" class="pro-head-link">@lang('provider.profile.manage_documents')</a>
        <a href="{{ route('provider.location.index') }}" class="pro-head-link">@lang('provider.profile.update_location')</a>
        <a href="{{route('provider.wallet.transation')}}" class="pro-head-link">@lang('provider.profile.wallet_transaction')</a>
        <a href="#" class="pro-head-link active">@lang('provider.card.list')</a>
        <a href="{{ route('provider.transfer') }}" class="pro-head-link">@lang('provider.profile.transfer')</a>
        @if(config('constants.referral')==1)
            <a href="{{ route('provider.referral') }}" class="pro-head-link">@lang('provider.profile.refer_friend')</a>
        @endif
    </div>
</div>

<div class="pro-dashboard-content gray-bg">
    <div class="container">
        <div class="manage-docs pad30">
            <div class="manage-doc-content">
                <div class="manage-doc-section pad50">
                    <div class="manage-doc-section-head row no-margin">
                        <h3 class="manage-doc-tit">
                           
                        </h3>
                    </div>
                    @include('common.notify')                         
                   
                     <div class="manage-doc-section-content border-top">
                     <div class="tab-content list-content">
                        <div class="list-view pad30 ">
                            @if(Setting::get('demo_mode', 0) == 1)
                                 <div class="col-md-12" style="height:50px;color:red;">
                                    ** Demo Mode : Use this card - CardNo:4000056655665556, MM:12, YY:20, CVV:123.
                                </div>
                            @endif
                            <a href="#" class="sub-right pull-right" data-toggle="modal" data-target="#add-card-modal" style="margin-right: 10px;margin-bottom: 10px;">@lang('provider.card.add_debit_card')</a>
                            <table class="earning-table table table-responsive">
                                <thead>
                                    <tr>
                                        <th>@lang('provider.card.type')</th>
                                        <th>@lang('provider.card.four')</th>    
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($cards)!='0')    
                                    @foreach($cards as $each)
                                        <tr>
                                            <td>{{ $each->brand }}</td>
                                            <td>{{ $each->last_four }}</td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2">@lang('provider.card.notfound')</td>
                                       </tr>
                                    @endif
                                </tbody>

                            </table>
                        </div>
                     </div>
                     </div>
               
                </div>
            </div>
        </div>
    </div>
    <!-- Add Card Modal -->
    <div id="add-card-modal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" >
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">@lang('provider.card.add_debit_card')</h4>
          </div>
            <form id="payment-form" action="{{ url('provider/card/store') }}" method="POST" >
                {{ csrf_field() }}

          <input type="hidden" data-stripe="currency" value="brl">
          <div class="modal-body">
            <div class="row no-margin" id="card-payment">
                <div class="payment-errors" style="display: none">
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <span id="errortxt"></span>
                    </div>
                </div>    
                <div class="form-group col-md-12 col-sm-12">
                    <label>@lang('provider.card.fullname')</label>
                    <input data-stripe="name" autocomplete="off" required type="text" class="form-control" placehold="@lang('provider.card.fullname')">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label>@lang('provider.card.card_no')</label>
                    <input data-stripe="number" type="text" onkeypress="return isNumberKey(event);" required autocomplete="off" maxlength="16" class="form-control" placehold="@lang('provider.card.card_no')">
                </div>
                <div class="form-group col-md-4 col-sm-12">
                    <label>@lang('provider.card.month')</label>
                    <input type="text" onkeypress="return isNumberKey(event);" maxlength="2" required autocomplete="off" class="form-control" data-stripe="exp-month" placehold="MM">
                </div>
                <div class="form-group col-md-4 col-sm-12">
                    <label>@lang('provider.card.year')</label>
                    <input type="text" onkeypress="return isNumberKey(event);" maxlength="2" required autocomplete="off" data-stripe="exp-year" class="form-control" placehold="YY">
                </div>
                <div class="form-group col-md-4 col-sm-12">
                    <label>@lang('provider.card.cvv')</label>
                    <input type="text" data-stripe="cvc" onkeypress="return isNumberKey(event);" required autocomplete="off" maxlength="4" class="form-control" placehold="@lang('provider.card.cvv')">
                </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-default" >@lang('provider.card.add_card')</button>
          </div>
        </form>

        </div>

      </div>
    </div> 
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    Stripe.setPublishableKey("{{ config('constants.stripe_publishable_key', '')}}");

     var stripeResponseHandler = function (status, response) {
        var $form = $('#payment-form');

        if (response.error) {
            // Show the errors on the form
            $form.find('.payment-errors').text(response.error.message);
            $form.find('button').prop('disabled', false);
            alert(response.error.message);

        } else {
            // token contains id, last4, and card type
            var token = response.id;

            // Insert the token into the form so it gets submitted to the server
            $form.append($('<input type="hidden" id="stripeToken" name="stripe_token" />').val(token));

            jQuery($form.get(0)).submit();
            $("#add-card-modal").modal('toggle');
        }


    };
            
    $('#payment-form').submit(function (e) {            
        if ($('#stripeToken').length == 0)
        {
            
            var $form = $(this);
            $form.find('button').prop('disabled', true);                
            Stripe.card.createToken($form, stripeResponseHandler);
            return false;
        }
    });

    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }

    function set_default(id)
    {
        $.ajax({
            method : 'POST',
            url : '{{ url('provider/card/set') }}',
            data : '_token={{csrf_token()}}&id='+id,
            success:function(html)
            {
                if(html=='success')
                {
                    alert('Successfully made changes');
                }
                else{
                    alert('Something Went wrong'); 
                }
            }

        })
    }
</script>    
@endsection


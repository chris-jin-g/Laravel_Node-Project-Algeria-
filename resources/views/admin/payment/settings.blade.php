@extends('admin.layout.base')

@section('title', 'Payment Settings')

@section('content')

    <div class="container-fluid">
        
        <div class="card card-nav-tabs">
            <div class="card-header card-header-primary">
                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" id="paymentMode-tab" data-toggle="tab" href="#paymentMode"
                                    role="tab" aria-controls="paymentMode" aria-expanded="true">Payment Mode</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="paymentSetting-tab" data-toggle="tab" href="#paymentSetting"
                                    role="tab" aria-controls="paymentSetting" aria-expanded="false">Payment Setting</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane active in" id="paymentMode">
                                <div class="row">
                                    <div class="col">

                                        <form action="{{route('admin.settings.payment.store')}}" method="POST"
                                            enctype="multipart/form-data">
                                            {{csrf_field()}}

                                            
                                                <blockquote class="card-blockquote">
                                                    <i class="fa fa-3x fa-money pull-right"></i>
                                                    <div class="form-group">
                                                        <div class="col-xs-4 arabic_right">
                                                            <label for="cash-payments" class="col-form-label">
                                                                @lang('admin.payment.cash_payments')
                                                            </label>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <input @if(config('constants.cash')==1) checked @endif
                                                                autocomplete="off" name="cash" id="cash-payments"
                                                                type="checkbox" class="js-switch" data-color="#43b968">
                                                        </div>
                                                    </div>
                                                </blockquote>
                                            

                                            
                                                <blockquote class="card-blockquote">
                                                    <i class="fa fa-3x fa-cc-stripe pull-right"></i>
                                                    <div class="form-group">
                                                        <div class="col-xs-4 arabic_right">
                                                            <label for="stripe_secret_key" class="col-form-label">
                                                                @lang('admin.payment.card_payments')
                                                            </label>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <input @if(config('constants.card')==1) checked @endif
                                                                autocomplete="off" name="card" id="stripe_check"
                                                                type="checkbox" class="js-switch" data-color="#43b968">
                                                        </div>
                                                    </div>
                                                    <div class="payment_settings" @if(config('constants.card')==0)
                                                        style="display: none;" @endif>
                                                        <div class="form-group">
                                                            <label for="stripe_secret_key"
                                                                class="col-xs-4 col-form-label">@lang('admin.payment.stripe_secret_key')</label>
                                                            <div class="col-xs-8">
                                                                <input class="form-control" type="text"
                                                                    value="{{ config('constants.stripe_secret_key') }}"
                                                                    name="stripe_secret_key" id="stripe_secret_key"
                                                                    placehold="@lang('admin.payment.stripe_secret_key')">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="stripe_publishable_key"
                                                                class="col-xs-4 col-form-label">@lang('admin.payment.stripe_publishable_key')</label>
                                                            <div class="col-xs-8">
                                                                <input class="form-control" type="text"
                                                                    value="{{ config('constants.stripe_publishable_key') }}"
                                                                    name="stripe_publishable_key"
                                                                    id="stripe_publishable_key"
                                                                    placehold="@lang('admin.payment.stripe_publishable_key')">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="stripe_currency"
                                                                class="col-xs-4 col-form-label">@lang('admin.payment.currency')</label>
                                                            <div class="col-xs-8">
                                                                <select name="stripe_currency" class="form-control"
                                                                    required>
                                                                    <option
                                                                        @if(config('constants.stripe_currency')=="BRL" )
                                                                        selected @endif value="BRL">BRL</option>
                                                                    <option
                                                                        @if(config('constants.stripe_currency')=="INR" )
                                                                        selected @endif value="BRL">INR</option>
                                                                    <option
                                                                        @if(config('constants.stripe_currency')=="USD" )
                                                                        selected @endif value="USD">USD</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </blockquote>
                                            

                                            <!-- //TODO ALLAN - Alterações débito na máquina e voucher -->
                                            
                                                <blockquote class="card-blockquote">
                                                    <i class="fa fa-3x fa-credit-card pull-right"></i>
                                                    <div class="form-group">
                                                        <div class="col-xs-4 arabic_right">
                                                            <label for="debit-machine-payments" class="col-form-label">
                                                                @lang('admin.payment.debit_machine_payments')
                                                            </label>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <input @if(config('constants.debit_machine')==1) checked
                                                                @endif autocomplete="off" name="debit_machine"
                                                                id="debit-machine-payments" type="checkbox"
                                                                class="js-switch" data-color="#43b968">
                                                        </div>
                                                    </div>
                                                </blockquote>
                                            

                                            <!-- //TODO ALLAN - Alterações débito na máquina e voucher -->
                                            
                                                <blockquote class="card-blockquote">
                                                    <i class="fa fa-3x fa-sticky-note pull-right"></i>
                                                    <div class="form-group">
                                                        <div class="col-xs-4 arabic_right">
                                                            <label for="voucher-payments" class="col-form-label">
                                                                @lang('admin.payment.voucher_payments')
                                                            </label>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <input @if(config('constants.voucher')==1) checked @endif
                                                                autocomplete="off" name="voucher" id="voucher-payments"
                                                                type="checkbox" class="js-switch" data-color="#43b968">
                                                        </div>
                                                    </div>
                                                </blockquote>
                                            

                                            <!--                
                    <blockquote class="card-blockquote">
                         <i class="fa fa-3x fa-cc-stripe pull-right"></i> 
                        <div class="form-group">
                            <div class="col-xs-4 arabic_right">
                                <label for="card_payments" class="col-form-label">
                                    @lang('admin.payment.payumoney')
                                </label>
                            </div>
                            <div class="col-xs-6">
                                <input @if(config('constants.payumoney') == 1) checked  @endif autocomplete="off"  name="payumoney" type="checkbox" class="js-switch" data-color="#43b968">
                            </div>
                            <div class="col-xs-2 payumoney_icon">
                                <img src="{{asset('asset/img/payu.png')}}">
                            </div>
                        </div>
                        <div class="payment_settings" @if(config('constants.payumoney') == 0) style="display: none;" @endif>
                            <div class="form-group">
                                <label for="payumoney_environment" class="col-xs-4 col-form-label">@lang('admin.payment.payumoney_environment')</label>
                                <div class="col-xs-8">
                                    <select name="payumoney_environment" class="form-control" required>
                                    <option @if(config('constants.payumoney_environment') == "test") selected @endif value="test">Development</option>
                                    <option @if(config('constants.payumoney_environment') == "secure") selected @endif value="secure">Production</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="payumoney_merchant_id" class="col-xs-4 col-form-label">@lang('admin.payment.payumoney_merchant_id')</label>
                                <div class="col-xs-8">
                                    <input class="form-control" type="text" value="{{ config('constants.payumoney_merchant_id') }}" name="payumoney_merchant_id" id="payumoney_merchant_id"  placehold="@lang('admin.payment.payumoney_merchant_id')">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="payumoney_key" class="col-xs-4 col-form-label">@lang('admin.payment.payumoney_key')</label>
                                <div class="col-xs-8">
                                    <input class="form-control" type="text" value="{{ config('constants.payumoney_key') }}" name="payumoney_key" id="payumoney_key"  placehold="@lang('admin.payment.payumoney_key')">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="payumoney_salt" class="col-xs-4 col-form-label">@lang('admin.payment.payumoney_salt')</label>
                                <div class="col-xs-8">
                                    <input class="form-control" type="text" value="{{ config('constants.payumoney_salt')  }}" name="payumoney_salt" id="payumoney_salt"  placehold="@lang('admin.payment.payumoney_salt')">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="payumoney_auth" class="col-xs-4 col-form-label">@lang('admin.payment.payumoney_auth')</label>
                                <div class="col-xs-8">
                                    <input class="form-control" type="text" value="{{ config('constants.payumoney_auth') }}" name="payumoney_auth" id="payumoney_auth"  placehold="@lang('admin.payment.payumoney_auth')">
                                </div>
                            </div>
                        </div>
                    </blockquote>
                </div>

                
                    <blockquote class="card-blockquote">
                        <i class="fa fa-3x fa-paypal pull-right"></i>
                        <div class="form-group">
                            <div class="col-xs-4 arabic_right">
                                <label for="card_payments" class="col-form-label">
                                    @lang('admin.payment.paypal')
                                </label>
                            </div>
                            <div class="col-xs-6">
                                <input @if(config('constants.paypal') == 1) checked  @endif  autocomplete="off" name="paypal" type="checkbox" class="js-switch" data-color="#43b968">
                            </div>
                        </div>
                        <div class="payment_settings" @if(config('constants.paypal') == 0) style="display: none;" @endif>
                            <div class="form-group">
                                <label for="paypal_environment" class="col-xs-4 col-form-label">@lang('admin.payment.paypal_environment')</label>
                                <div class="col-xs-8">
                                    <select name="paypal_environment" class="form-control" required>
                                    <option @if(config('constants.paypal_environment') == "sandbox") selected @endif value="sandbox">Development</option>
                                    <option @if(config('constants.paypal_environment') == "live") selected @endif value="live">Production</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paypal_client_id" class="col-xs-4 col-form-label">@lang('admin.payment.paypal_client_id')</label>
                                <div class="col-xs-8">
                                    <input class="form-control" type="text" value="{{ config('constants.paypal_client_id') }}" name="paypal_client_id" id="paypal_client_id"  placehold="@lang('admin.payment.paypal_client_id')">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paypal_client_secret" class="col-xs-4 col-form-label">@lang('admin.payment.paypal_client_secret')</label>
                                <div class="col-xs-8">
                                    <input class="form-control" type="text" value="{{ config('constants.paypal_client_secret')  }}" name="paypal_client_secret" id="paypal_client_secret"  placehold="@lang('admin.payment.paypal_client_secret')">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paypal_currency" class="col-xs-4 col-form-label">@lang('admin.payment.currency')</label>
                                <div class="col-xs-8">
                                    <select name="paypal_currency" class="form-control" required>
                                    <option @if(config('constants.paypal_currency') == "BRL") selected @endif value="BRL">BRL</option>
                                    <option @if(config('constants.paypal_currency') == "USD") selected @endif value="USD">USD</option>
                                </select>
                                </div>
                            </div>
                        </div>
                    </blockquote>
                </div>

                
                    <blockquote class="card-blockquote">
                        <i class="fa fa-3x fa-paypal pull-right"></i>
                        <div class="form-group">
                            <div class="col-xs-4 arabic_right">
                                <label for="card_payments" class="col-form-label">
                                    @lang('admin.payment.paypal_adaptive')
                                </label>
                            </div>
                            <div class="col-xs-6">
                                <input @if(config('constants.paypal_adaptive') == 1) checked  @endif  autocomplete="off" name="paypal_adaptive" type="checkbox" class="js-switch" data-color="#43b968">
                            </div>
                            <div class="col-xs-2 paypal_adaptive_icon">
                                <img src="{{asset('asset/img/adaptation.png')}}">
                            </div>
                        </div>
                        <div class="payment_settings" @if(config('constants.paypal_adaptive') == 0) style="display: none;" @endif>
                            <div class="form-group">
                                <label for="paypal_adaptive_environment" class="col-xs-4 col-form-label">@lang('admin.payment.paypal_adaptive_environment')</label>
                                <div class="col-xs-8">
                                    <select name="paypal_adaptive_environment" class="form-control" required>
                                    <option @if(config('constants.payumoney_environment') == "sandbox") selected @endif value="sandbox">Development</option>
                                    <option @if(config('constants.payumoney_environment') == "live") selected @endif value="live">Production</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paypal_username" class="col-xs-4 col-form-label">@lang('admin.payment.paypal_username')</label>
                                <div class="col-xs-8">
                                    <input class="form-control" type="text" value="{{ config('constants.paypal_username') }}" name="paypal_username" id="paypal_username"  placehold="@lang('admin.payment.paypal_username')">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paypal_password" class="col-xs-4 col-form-label">@lang('admin.payment.paypal_password')</label>
                                <div class="col-xs-8">
                                    <input class="form-control" type="text" value="{{ config('constants.paypal_password')  }}" name="paypal_password" id="paypal_password"  placehold="@lang('admin.payment.paypal_password')">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paypal_secret" class="col-xs-4 col-form-label">@lang('admin.payment.paypal_secret')</label>
                                <div class="col-xs-8">
                                    <input class="form-control" type="text" value="{{ config('constants.paypal_secret') }}" name="paypal_secret" id="paypal_secret"  placehold="@lang('admin.payment.paypal_secret')">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paypal_certificate" class="col-xs-4 col-form-label">@lang('admin.payment.paypal_certificate')</label>
                                <div class="col-xs-8">
                                    <input class="form-control" type="file" name="paypal_certificate" id="paypal_certificate" placehold="@lang('admin.payment.paypal_certificate')">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paypal_app_id" class="col-xs-4 col-form-label">@lang('admin.payment.paypal_app_id')</label>
                                <div class="col-xs-8">
                                    <input class="form-control" type="text" value="{{ config('constants.paypal_app_id') }}" name="paypal_app_id" id="paypal_app_id"  placehold="@lang('admin.payment.paypal_app_id')">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paypal_adaptive_currency" class="col-xs-4 col-form-label">@lang('admin.payment.currency')</label>
                                <div class="col-xs-8">
                                    <select name="paypal_adaptive_currency" class="form-control" required>
                                    <option @if(config('constants.paypal_adaptive_currency') == "BRL") selected @endif value="BRL">BRL</option>
                                    <option @if(config('constants.paypal_adaptive_currency') == "USD") selected @endif value="USD">USD</option>
                                </select>
                                </div>
                            </div>
                        </div>
                    </blockquote>
                </div>

                
                    <blockquote class="card-blockquote">
                         <i class="fa fa-3x fa-credit-card pull-right"></i> 
                        <div class="form-group">
                            <div class="col-xs-4 arabic_right">
                                <label for="card_payments" class="col-form-label">
                                    @lang('admin.payment.braintree')
                                </label>
                            </div>
                            <div class="col-xs-6">
                                <input @if(config('constants.braintree') == 1) checked  @endif  autocomplete="off" name="braintree" type="checkbox" class="js-switch" data-color="#43b968">
                            </div>
                            <div class="col-xs-2 braintree_icon">
                                <img src="{{asset('asset/img/tree-brain.png')}}">
                            </div>
                        </div>
                        <div class="payment_settings" @if(config('constants.braintree') == 0) style="display: none;" @endif>
                            <div class="form-group">
                                <label for="braintree_environment" class="col-xs-4 col-form-label">@lang('admin.payment.braintree_environment')</label>
                                <div class="col-xs-8">
                                    <select name="braintree_environment" class="form-control" required>
                                          <option @if(config('constants.braintree_environment') == "sandbox") selected @endif value="sandbox">Development</option>
                                          <option @if(config('constants.braintree_environment') == "live") selected @endif value="live">Production</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="braintree_merchant_id" class="col-xs-4 col-form-label">@lang('admin.payment.braintree_merchant_id')</label>
                                <div class="col-xs-8">
                                    <input class="form-control" type="text" value="{{ config('constants.braintree_merchant_id')  }}" name="braintree_merchant_id" id="braintree_merchant_id"  placehold="@lang('admin.payment.braintree_merchant_id')">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="braintree_public_key" class="col-xs-4 col-form-label">@lang('admin.payment.braintree_public_key')</label>
                                <div class="col-xs-8">
                                    <input class="form-control" type="text" value="{{ config('constants.braintree_public_key') }}" name="braintree_public_key" id="braintree_public_key"  placehold="@lang('admin.payment.braintree_public_key')">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="braintree_private_key" class="col-xs-4 col-form-label">@lang('admin.payment.braintree_private_key')</label>
                                <div class="col-xs-8">
                                    <input class="form-control" type="text" value="{{ config('constants.braintree_private_key') }}" name="braintree_private_key" id="braintree_private_key"  placehold="@lang('admin.payment.braintree_private_key')">
                                </div>
                            </div>
                        </div>
                    </blockquote>
                </div>
              
                
                    <blockquote class="card-blockquote">
                         <i class="fa fa-3x fa-credit-card pull-right"></i> 
                        <div class="form-group">
                            <div class="col-xs-4 arabic_right">
                                <label for="card_payments" class="col-form-label">
                                    @lang('admin.payment.paytm')
                                </label>
                            </div>
                            <div class="col-xs-6">
                                <input @if(config('constants.paytm') == 1) checked  @endif  autocomplete="off" name="paytm" type="checkbox" class="js-switch" data-color="#43b968">
                            </div>
                            <div class="col-xs-2 braintree_icon">
                                <img width="110" src="{{asset('asset/img/paytm-logo.png')}}">
                            </div>
                        </div>
                        <div class="payment_settings" @if(config('constants.paytm') == 0) style="display: none;" @endif>
                            <div class="form-group">
                                <label for="paytm_environment" class="col-xs-4 col-form-label">@lang('admin.payment.paytm_environment')</label>
                                <div class="col-xs-8">
                                    <select name="paytm_environment" class="form-control" required>
                                          <option @if(config('constants.paytm_environment') == "local") selected @endif value="local">Development</option>
                                          <option @if(config('constants.paytm_environment') == "production") selected @endif value="production">Production</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paytm_merchant_id" class="col-xs-4 col-form-label">@lang('admin.payment.paytm_merchant_id')</label>
                                <div class="col-xs-8">
                                    <input class="form-control" type="text" value="{{ config('constants.paytm_merchant_id')  }}" name="paytm_merchant_id" id="paytm_merchant_id"  placehold="@lang('admin.payment.paytm_merchant_id')">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paytm_merchant_key" class="col-xs-4 col-form-label">@lang('admin.payment.paytm_merchant_key')</label>
                                <div class="col-xs-8">
                                    <input class="form-control" type="text" value="{{ config('constants.paytm_merchant_key') }}" name="paytm_merchant_key" id="paytm_merchant_key"  placehold="@lang('admin.payment.paytm_merchant_key')">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paytm_website" class="col-xs-4 col-form-label">@lang('admin.payment.paytm_website')</label>
                                <div class="col-xs-8">
                                    <select name="paytm_website" class="form-control" required>
                                          <option @if(config('constants.paytm_website') == "WEBSTAGING") selected @endif value="WEBSTAGING">Staging</option>
                                          <option @if(config('constants.paytm_website') == "WEBPROD") selected @endif value="WEBPROD">Production</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </blockquote>
                </div>-->

                                            <div class="form-group">
                                                <div class="col-xs-4">
                                                    <a href="{{ URL::previous() }}"
                                                        class="btn btn-warning btn-block">@lang('admin.back')</a>
                                                </div>
                                                <div class="offset-xs-4 col-xs-4">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-block">@lang('admin.payment.update_site_settings')</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="paymentSetting">
                                <div class="row">
                                    <div class="col">
                                        <form action="{{route('admin.settings.payment.store')}}" method="POST"
                                            enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            
                                                    <div class="form-group">
                                                        <label for="daily_target"
                                                            class="col-xs-4 col-form-label">@lang('admin.payment.daily_target')</label>
                                                        <div class="col-xs-8">
                                                            <input class="form-control" type="number"
                                                                value="{{ config('constants.daily_target', '0')  }}"
                                                                id="daily_target" name="daily_target" min="0" required
                                                                placehold="Daily Target">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tax_percentage"
                                                            class="col-xs-4 col-form-label">@lang('admin.payment.tax_percentage')</label>
                                                        <div class="col-xs-8">
                                                            <input class="form-control" type="number"
                                                                value="{{ config('constants.tax_percentage', '0')  }}"
                                                                id="tax_percentage" name="tax_percentage" min="0"
                                                                max="100" placehold="Tax Percentage">
                                                        </div>
                                                    </div>

                                                    <!--                         <div class="form-group">
                            <label for="surge_trigger" class="col-xs-4 col-form-label">@lang('admin.payment.surge_trigger_point')</label>
                            <div class="col-xs-8">
                                <input class="form-control"
                                    type="number"
                                    value="{{ config('constants.surge_trigger', '')  }}"
                                    id="surge_trigger"
                                    name="surge_trigger"
                                    min="0"
                                    required
                                    placehold="Surge Trigger Point">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="surge_percentage" class="col-xs-4 col-form-label">@lang('admin.payment.surge_percentage')</label>
                            <div class="col-xs-8">
                                <input class="form-control"
                                    type="number"
                                    value="{{ config('constants.surge_percentage', '0')  }}"
                                    id="surge_percentage"
                                    name="surge_percentage"
                                    min="0"
                                    max="100"
                                    placehold="Surge percentage">
                            </div>
                        </div> -->

                                                    <div class="form-group">
                                                        <label for="commission_percentage"
                                                            class="col-xs-4 col-form-label">@lang('admin.payment.commission_percentage')</label>
                                                        <div class="col-xs-8">
                                                            <input class="form-control" type="number"
                                                                value="{{ config('constants.commission_percentage', '0') }}"
                                                                id="commission_percentage" name="commission_percentage"
                                                                min="0" max="100"
                                                                placehold="@lang('admin.payment.commission_percentage')">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="peak_percentage"
                                                            class="col-xs-4 col-form-label">@lang('admin.payment.peak_percentage')</label>
                                                        <div class="col-xs-8">
                                                            <input class="form-control" type="number"
                                                                value="{{ config('constants.peak_percentage', '0') }}"
                                                                id="peak_percentage" name="peak_percentage" min="0"
                                                                max="100"
                                                                placehold="@lang('admin.payment.peak_percentage')">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="waiting_percentage"
                                                            class="col-xs-4 col-form-label">@lang('admin.payment.waiting_percentage')</label>
                                                        <div class="col-xs-8">
                                                            <input class="form-control" type="number"
                                                                value="{{ config('constants.waiting_percentage', '0') }}"
                                                                id="waiting_percentage" name="waiting_percentage"
                                                                min="0" max="100"
                                                                placehold="@lang('admin.payment.waiting_percentage')">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="minimum_negative_balance"
                                                            class="col-xs-4 col-form-label">@lang('admin.payment.minimum_negative_balance')</label>
                                                        <div class="col-xs-8">
                                                            <input class="form-control" type="number"
                                                                value="{{ config('constants.minimum_negative_balance') }}"
                                                                id="minimum_negative_balance"
                                                                name="minimum_negative_balance" max='0'
                                                                placehold="@lang('admin.payment.minimum_negative_balance')">
                                                        </div>
                                                    </div>

                                            <div class="form-group">
                                                <div class="col-xs-4">
                                                    <a href="{{ URL::previous() }}"
                                                        class="btn btn-warning btn-block">@lang('admin.back')</a>
                                                </div>
                                                <div class="offset-xs-4 col-xs-4">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-block">@lang('admin.payment.update_site_settings')</button>
                                                </div>
                                            </div>
                                        </form>
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
            $('.js-switch').on('change', function () {
                if ($(this).is(':checked')) {
                    // console.log($(this).closest('blockquote').find('.payment_settings'));
                    $(this).closest('blockquote').find('.payment_settings').fadeIn(700);
                } else {
                    $(this).closest('blockquote').find('.payment_settings').fadeOut(700);
                }

            });
        </script>
        @endsection
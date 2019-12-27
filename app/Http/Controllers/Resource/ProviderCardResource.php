<?php

namespace App\Http\Controllers\Resource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProviderCard;
use App\Provider;
use Exception;
use Auth;
use Setting;
use Session;

class ProviderCardResource extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        try {

            $cards = ProviderCard::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
            return $cards;
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'stripe_token' => 'required'
        ]);

        try {

            $customer_id = $this->customer_id();
            $this->set_stripe();
            $customer = \Stripe\Customer::retrieve($customer_id);
            $card = $customer->sources->create(["source" => $request->stripe_token]);

            $exist = ProviderCard::where('user_id', Auth::user()->id)
                    ->where('last_four', $card['last4'])
                    ->where('brand', $card['brand'])
                    ->count();

            if ($exist == 0) {

                //delete previous card
                $Providercard = ProviderCard::where('user_id', Auth::user()->id)->first();

                if (!empty($Providercard)) {
                    //DELETA CARTÃO DO USUÁRIO NO
//                    $customer->sources->retrieve($request->card_id)->delete();
                    ProviderCard::where('card_id', $Providercard->card_id)->delete();
                }

                //add new card
                $create_card = new ProviderCard;
                $create_card->user_id = Auth::user()->id;
                $create_card->card_id = $card['id'];
                $create_card->last_four = $card['last4'];
                $create_card->brand = $card['brand'];
                $create_card->is_default = '1';
                $create_card->save();

                //ATUALIZA STATUS DO USUÁRIO AO ADICIONAR CARTÃO
//                if (Setting::get('demo_mode', 0) == 1) {
//                    Provider::where('id', Auth::user()->id)->where('status', 'card')->update(['status' => 'approved']);
//                } else {
//                    Provider::where('id', Auth::user()->id)->where('status', 'card')->update(['status' => 'onboarding']);
//                }
            } else {
                if ($request->ajax()) {
                    return response()->json(['message' => trans('api.card_already')]);
                } else {
                    return back()->with('flash_success', trans('api.card_already'));
                }
            }

            if ($request->ajax()) {
                return response()->json(['message' => trans('api.card_added')]);
            } else {
                return back()->with('flash_success', trans('api.card_added'));
            }
        } catch (Exception $e) {
            if ($request->ajax()) {
                return response()->json(['error' => $e->getMessage()], 520);
            } else {
                return back()->with('flash_error', $e->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'card_id' => 'required|exists:provider_cards,card_id,user_id,' . Auth::user()->id,
        ]);
        try {
            ProviderCard::where('user_id', Auth::user()->id)->update(['is_default' => '0']);
            ProviderCard::where('card_id', $request->card_id)->update(['is_default' => '1']);
            return 'success';
        } catch (Exception $e) {
            return 'failure';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {

        $this->validate($request, [
            'card_id' => 'required|exists:provider_cards,card_id,user_id,' . Auth::user()->id,
        ]);

        try {

            $this->set_stripe();

            $customer = \Stripe\Customer::retrieve(Auth::user()->stripe_cust_id);
            $customer->sources->retrieve($request->card_id)->delete();

            ProviderCard::where('card_id', $request->card_id)->delete();

            if ($request->ajax()) {
                return response()->json(['message' => trans('api.card_deleted')]);
            } else {
                return back()->with('flash_success', trans('api.card_deleted'));
            }
        } catch (Stripe_CardError $e) {
            if ($request->ajax()) {
                return response()->json(['error' => $e->getMessage()], 500);
            } else {
                return back()->with('flash_error', $e->getMessage());
            }
        }
    }

    /**
     * setting stripe.
     *
     * @return \Illuminate\Http\Response
     */
    public function set_stripe() {
        return \Stripe\Stripe::setApiKey(config('constants.stripe_secret_key', ''));
    }

    /**
     * Get a stripe customer id.
     *
     * @return \Illuminate\Http\Response
     */
    public function customer_id() {
        if (Auth::user()->stripe_cust_id != null) {

            return Auth::user()->stripe_cust_id;
        } else {

            try {

                $stripe = $this->set_stripe();

                $customer = \Stripe\Customer::create([
                            'email' => Auth::user()->email,
                ]);

                Provider::where('id', Auth::user()->id)->update(['stripe_cust_id' => $customer['id']]);
                return $customer['id'];
            } catch (Exception $e) {
                return $e;
            }
        }
    }

    public function set_default(Request $request) {
        try {
            ProviderCard::where('user_id', Auth::user()->id)->update(['is_default' => '0']);
            ProviderCard::where('id', $request->id)->update(['is_default' => '1']);
            return 'success';
        } catch (Exception $e) {
            return 'failure';
        }
    }

}
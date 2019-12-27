<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper;

use Auth;
use Setting;
use Exception;
use \Carbon\Carbon;

use App\User;
use App\Fleet;
use App\Provider;
use App\UserPayment;
use App\ServiceType;
use App\UserRequests;
use App\ProviderService;
use App\UserRequestRating;
use App\UserRequestPayment;

use App\FleetWallet;
use App\WalletRequests;

use App\Http\Controllers\ProviderResources\TripController;

class FleetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('fleet');
        $this->middleware('demo', ['only' => ['profile_update', 'password_update', 'destory_provider_service']]);
        $this->perpage = config('constants.per_page', '10');
    }

    /**
     * Dashboard.
     *
     * @param  \App\Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        try {

            $getting_ride = UserRequests::has('user')
                    ->whereHas('provider', function($query) {
                            $query->where('fleet', Auth::user()->id );
                        })
                    ->orderBy('id','desc');
                        
            $total_rides = $getting_ride->get()->count();

            $rides = $getting_ride->get();
            $all_rides = $getting_ride->get()->pluck('id');
            $cancel_rides = UserRequests::where('status','CANCELLED') 
                            ->whereHas('provider', function($query) {
                                $query->where('fleet', Auth::user()->id );
                            })->count();

            $service = ServiceType::where('fleet_id', auth()->user()->id)->get()->count();

            $revenue = UserRequestPayment::whereIn('request_id', $all_rides)->sum('total');

            $wallet = Provider::where('fleet', auth()->user()->id)->sum('wallet_balance');

            $providers = Provider::where('fleet', Auth::user()->id)
                ->orWhere('city_id', auth()->user()->city_id)->get()->count();

            $passengers = User::where('city_id', auth()->user()->city_id)->get()->count();

            return view('fleet.dashboard', compact('providers','total_rides', 'service', 'rides', 'cancel_rides', 'revenue', 'passengers', 'wallet'));
        } catch (Exception $e) {
            return redirect()->route('fleet.user.index')->with('flash_error', trans('admin.something_wrong_dashboard'));
        }
    }

    /**
     * account statements.
     *
     * @param  \App\Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function statement($type = '', $request = null)
    {
        //  print_r($request->all());exit;
        try {
            if ((isset($request->provider_id) && $request->provider_id != null) ||
                (isset($request->user_id) && $request->user_id != null) ||
                (isset($request->fleet_id) && $request->fleet_id != null)) {
                $pages = trans('admin.include.overall_ride_statments');
                $listname = trans('admin.include.overall_ride_earnings');
                if ($type == 'individual') {
                    $pages = trans('admin.include.provider_statement');
                    $listname = trans('admin.include.provider_earnings');
                } elseif ($type == 'today') {
                    $pages = trans('admin.include.today_statement') . ' - ' . date('d M Y');
                    $listname = trans('admin.include.today_earnings');
                } elseif ($type == 'monthly') {
                    $pages = trans('admin.include.monthly_statement') . ' - ' . date('F');
                    $listname = trans('admin.include.monthly_earnings');
                } elseif ($type == 'yearly') {
                    $pages = trans('admin.include.yearly_statement') . ' - ' . date('Y');
                    $listname = trans('admin.include.yearly_earnings');
                } elseif ($type == 'range') {
                    $pages = trans('admin.include.statement_from') . ' ' . Carbon::createFromFormat('Y-m-d', $request->from_date)->format('d M Y') . '  ' . trans('admin.include.statement_to') . ' ' . Carbon::createFromFormat('Y-m-d', $request->to_date)->format('d M Y');
                }

                if (isset($request->provider_id) && $request->provider_id != null) {
                    $id = $request->provider_id;
                    $statement_for = "provider";
                    $rides = UserRequests::where('provider_id', $id)
                        ->whereHas('provider', function ($query) {
                            $query->where('fleet', Auth::user()->id);
                        })
                        ->with('payment')
                        ->orderBy('id', 'desc');
                    $cancel_rides = UserRequests::where('status', 'CANCELLED')
                        ->whereHas('provider', function ($query) {
                            $query->where('fleet', Auth::user()->id);
                        })
                        ->where('provider_id', $id);
                    $Provider = Provider::find($id);
                    $revenue = UserRequestPayment::whereHas('request', function ($query) use ($id) {
                        $query->where('provider_id', $id);
                    })->select(\DB::raw(
                        'SUM(ROUND(provider_pay)) as overall, SUM(ROUND(provider_commission)) as commission'
                    ));
                    $page = $Provider->first_name . "'s " . $pages;
                } elseif (isset($request->user_id) && $request->user_id != null) {
                    $id = $request->user_id;
                    $statement_for = "user";
                    $rides = UserRequests::where('user_id', $id)->with('payment')->orderBy('id', 'desc');
                    $cancel_rides = UserRequests::where('status', 'CANCELLED')->where('user_id', $id);
                    $user = User::find($id);
                    $revenue = UserRequestPayment::whereHas('request', function ($query) use ($id) {
                        $query->where('user_id', $id);
                    })->select(\DB::raw(
                        'SUM(ROUND(total)) as overall'
                    ));
                    $page = $user->first_name . "'s " . $pages;
                } else {
                    $id = $request->fleet_id;
                    $statement_for = "fleet";
                    $rides = UserRequestPayment::where('fleet_id', $id)->whereHas('request', function ($query) use ($id) {
                        $query->with('payment')->orderBy('id', 'desc');
                    });
                    $cancel_rides = UserRequestPayment::where('fleet_id', $id)->whereHas('request', function ($query) use ($id) {
                        $query->where('status', 'CANCELLED');
                    });
                    $fleet = Fleet::find($id);
                    $revenue = UserRequestPayment::where('fleet_id', $id)
                        ->select(\DB::raw(
                            'SUM(ROUND(fleet)) as overall'
                        ));
                    $page = $fleet->name . "'s " . $pages;
                }
            } else {
                $id = '';
                $statement_for = "";
                $page = trans('admin.include.overall_ride_statments');
                $listname = trans('admin.include.overall_ride_earnings');
                if ($type == 'individual') {
                    $page = trans('admin.include.provider_statement');
                    $listname = trans('admin.include.provider_earnings');
                } elseif ($type == 'today') {
                    $page = trans('admin.include.today_statement') . ' - ' . date('d M Y');
                    $listname = trans('admin.include.today_earnings');
                } elseif ($type == 'monthly') {
                    $page = trans('admin.include.monthly_statement') . ' - ' . date('F');
                    $listname = trans('admin.include.monthly_earnings');
                } elseif ($type == 'yearly') {
                    $page = trans('admin.include.yearly_statement') . ' - ' . date('Y');
                    $listname = trans('admin.include.yearly_earnings');
                } elseif ($type == 'range') {
                    $page = trans('admin.include.statement_from') . ' ' . Carbon::createFromFormat('Y-m-d', $request->from_date)->format('d M Y') . '  ' . trans('admin.include.statement_to') . ' ' . Carbon::createFromFormat('Y-m-d', $request->to_date)->format('d M Y');
                }

                $rides = UserRequests::with('payment')
                    ->whereHas('provider', function ($query) {
                        $query->where('fleet', Auth::user()->id);
                    })
                    ->orderBy('id', 'desc');

                $cancel_rides = UserRequests::where('status', 'CANCELLED')
                    ->whereHas('provider', function ($query) {
                        $query->where('fleet', Auth::user()->id);
                    });
                $revenue = UserRequestPayment::whereHas('provider', function ($query) {
                    $query->where('fleet', Auth::user()->id);
                })->select(\DB::raw(
                    'SUM(ROUND(fixed) + ROUND(distance)) as overall, SUM(ROUND(commision)) as commission'
                ));
            }


            if ($type == 'today') {

                $rides->where('created_at', '>=', Carbon::today());
                $cancel_rides->where('created_at', '>=', Carbon::today());
                $revenue->where('created_at', '>=', Carbon::today());
            } elseif ($type == 'monthly') {

                $rides->where('created_at', '>=', Carbon::now()->month);
                $cancel_rides->where('created_at', '>=', Carbon::now()->month);
                $revenue->where('created_at', '>=', Carbon::now()->month);
            } elseif ($type == 'yearly') {

                $rides->where('created_at', '>=', Carbon::now()->year);
                $cancel_rides->where('created_at', '>=', Carbon::now()->year);
                $revenue->where('created_at', '>=', Carbon::now()->year);
            } elseif ($type == 'range') {
                if ($request->from_date == $request->to_date) {
                    $rides->whereDate('created_at', date('Y-m-d', strtotime($request->from_date)));
                    $cancel_rides->whereDate('created_at', date('Y-m-d', strtotime($request->from_date)));
                    $revenue->whereDate('created_at', date('Y-m-d', strtotime($request->from_date)));
                } else {
                    $rides->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->from_date), Carbon::createFromFormat('Y-m-d', $request->to_date)]);
                    $cancel_rides->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->from_date), Carbon::createFromFormat('Y-m-d', $request->to_date)]);
                    $revenue->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d', $request->from_date), Carbon::createFromFormat('Y-m-d', $request->to_date)]);
                }
            }

            $rides = $rides->paginate($this->perpage);
            if ($type == 'range') {
                $path = 'range?from_date=' . $request->from_date . '&to_date=' . $request->to_date;
                $rides->setPath($path);
            }
            $pagination = (new Helper)->formatPagination($rides);
            $cancel_rides = $cancel_rides->count();
            $revenue = $revenue->get();

            $dates['yesterday'] = Carbon::yesterday()->format('Y-m-d');
            $dates['today'] = Carbon::today()->format('Y-m-d');
            $dates['pre_week_start'] = date("Y-m-d", strtotime("last week monday"));
            $dates['pre_week_end'] = date("Y-m-d", strtotime("last week sunday"));
            $dates['cur_week_start'] = Carbon::today()->startOfWeek()->format('Y-m-d');
            $dates['cur_week_end'] = Carbon::today()->endOfWeek()->format('Y-m-d');
            $dates['pre_month_start'] = Carbon::parse('first day of last month')->format('Y-m-d');
            $dates['pre_month_end'] = Carbon::parse('last day of last month')->format('Y-m-d');
            $dates['cur_month_start'] = Carbon::parse('first day of this month')->format('Y-m-d');
            $dates['cur_month_end'] = Carbon::parse('last day of this month')->format('Y-m-d');
            $dates['pre_year_start'] = date("Y-m-d", strtotime("last year January 1st"));
            $dates['pre_year_end'] = date("Y-m-d", strtotime("last year December 31st"));
            $dates['cur_year_start'] = Carbon::parse('first day of January')->format('Y-m-d');
            $dates['cur_year_end'] = Carbon::parse('last day of December')->format('Y-m-d');
            $dates['nextWeek'] = Carbon::today()->addWeek()->format('Y-m-d');
            return view('fleet.providers.statement', compact('rides', 'cancel_rides', 'revenue', 'pagination', 'dates', 'id', 'statement_for'))
                ->with('page', $page)->with('listname', $listname);
        } catch (Exception $e) {
            return back()->with('flash_error', 'Algo deu errado!');
        }
    }

    /**
     * account statements.
     *
     * @param  \App\Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function statement_provider()
    {

        try {

            $Providers = Provider::where('fleet', Auth::user()->id)->paginate($this->perpage);

            $pagination = (new Helper)->formatPagination($Providers);

            foreach ($Providers as $index => $Provider) {

                $Rides = UserRequests::where('provider_id', $Provider->id)
                    ->where('status', '<>', 'CANCELLED')
                    ->whereHas('provider', function ($query) {
                        $query->where('fleet', Auth::user()->id);
                    })
                    ->get()->pluck('id');

                $Providers[$index]->rides_count = $Rides->count();

                $Providers[$index]->payment = UserRequestPayment::whereHas('provider', function ($query) {
                    $query->where('fleet', Auth::user()->id);
                })->whereIn('request_id', $Rides)
                    ->select(\DB::raw(
                        'SUM(ROUND(provider_pay)) as overall, SUM(ROUND(provider_commission)) as commission'
                    ))->get();
            }

            return view('fleet.providers.provider-statement', compact('Providers', 'pagination'))->with('page', 'Providers Statement');
        } catch (Exception $e) {
            return back()->with('flash_error', 'Algo deu errado!');
        }
    }

    /**
     * Map of all Users and Drivers.
     *
     * @return \Illuminate\Http\Response
     */
    public function map_index()
    {
        return view('fleet.map.index');
    }

    /**
     * Map of all Users and Drivers.
     *
     * @return \Illuminate\Http\Response
     */
    public function map_ajax()
    {
        try {

            $Providers = Provider::where('latitude', '!=', 0)
                ->where('longitude', '!=', 0)
                ->where('fleet', Auth::user()->id)
                ->with('service')
                ->get();

            $Users = User::where('latitude', '!=', 0)
                ->where('longitude', '!=', 0)
                ->get();

            for ($i = 0; $i < sizeof($Users); $i++) {
                $Users[$i]->status = 'user';
            }

            $All = $Users->merge($Providers);

            return $All;

        } catch (Exception $e) {
            return [];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('fleet.account.profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function profile_update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'company' => 'required|max:255',
            'mobile' => 'required|digits_between:6,13',
            'logo' => 'mimes:jpeg,jpg,bmp,png|max:5242880',
        ]);

        try {
            $fleet = Auth::guard('fleet')->user();
            $fleet->name = $request->name;
            $fleet->mobile = $request->mobile;
            $fleet->company = $request->company;
            $fleet->language = $request->language;
            if ($request->hasFile('logo')) {
                $fleet->logo = $request->logo->store('fleet/profile');
            }
            $fleet->save();

            return redirect()->back()->with('flash_success', trans('admin.profile_update'));
        } catch (Exception $e) {
            return back()->with('flash_error', trans('admin.something_wrong'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function password()
    {
        return view('fleet.account.change-password');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function password_update(Request $request)
    {

        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        try {

            $Fleet = Fleet::find(Auth::guard('fleet')->user()->id);

            if (password_verify($request->old_password, $Fleet->password)) {
                $Fleet->password = bcrypt($request->password);
                $Fleet->save();

                return redirect()->back()->with('flash_success', trans('admin.password_update'));
            } else {
                return back()->with('flash_error', trans('admin.password_not_match'));
            }
        } catch (Exception $e) {
            return back()->with('flash_error', trans('admin.something_wrong'));
        }
    }

    /**
     * Provider Rating.
     *
     * @return \Illuminate\Http\Response
     */
    public function provider_review()
    {
        try {

            $rides = UserRequests::whereHas('provider', function ($query) {
                $query->where('fleet', Auth::user()->id);
            })->get()->pluck('id');

            $Reviews = UserRequestRating::whereIn('request_id', $rides)
                ->where('provider_id', '!=', 0)
                ->with('user', 'provider')
                ->get();

            return view('fleet.review.provider_review', compact('Reviews'));

        } catch (Exception $e) {
            return back()->with('flash_error', trans('admin.something_wrong'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProviderService
     * @return \Illuminate\Http\Response
     */
    public function destory_provider_service($id)
    {
        try {
            ProviderService::find($id)->delete();
            return back()->with('message', trans('admin.provider_msgs.provider_service_delete'));
        } catch (Exception $e) {
            return back()->with('flash_error', trans('admin.something_wrong'));
        }
    }

    public function wallet(Request $request)
    {

        try {
            $wallet_transation = FleetWallet::where('fleet_id', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->paginate(config('constants.per_page', '10'));

            $pagination = (new Helper)->formatPagination($wallet_transation);

            $wallet_balance = Auth::user()->wallet_balance;

            return view('fleet.wallet.wallet_transation', compact('wallet_transation', 'pagination', 'wallet_balance'));

        } catch (Exception $e) {
            return back()->with(['flash_error' => trans('admin.something_wrong')]);
        }

    }

    public function transfer(Request $request)
    {

        $pendinglist = WalletRequests::where('from_id', Auth::user()->id)->where('request_from', 'fleet')->where('status', 0)->get();
        $wallet_balance = Auth::user()->wallet_balance;
        return view('fleet.wallet.transfer', compact('pendinglist', 'wallet_balance'));
    }

    public function requestamount(Request $request)
    {


        $send = (new TripController())->requestamount($request);
        $response = json_decode($send->getContent(), true);

        if (!empty($response['error']))
            $result['flash_error'] = $response['error'];
        if (!empty($response['success']))
            $result['flash_success'] = $response['success'];

        return redirect()->back()->with($result);
    }

    public function cancel(Request $request)
    {

        $cancel = (new TripController())->requestcancel($request);
        $response = json_decode($cancel->getContent(), true);

        if (!empty($response['error']))
            $result['flash_error'] = $response['error'];
        if (!empty($response['success']))
            $result['flash_success'] = $response['success'];

        return redirect()->back()->with($result);
    }

    public function cards()
    {
        $cards = (new Resource\FleetCardResource)->index();
        return view('fleet.wallet.cards', compact('cards'));
    }
}

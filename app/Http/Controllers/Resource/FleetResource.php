<?php

namespace App\Http\Controllers\Resource;

use App\Fleet;
use App\City;
use App\State;
use App\FleetCities;
use Log;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use Exception;
use Setting;
use App\WalletRequests;

class FleetResource extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('demo', ['only' => [ 'store', 'update', 'destroy']]);
        $this->middleware('permission:fleet-list', ['only' => ['index']]);
        $this->middleware('permission:fleet-create', ['only' => ['create','store']]);
        $this->middleware('permission:fleet-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:fleet-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fleets = Fleet::with('city')->orderBy('created_at' , 'desc')->get();

        return view('admin.fleet.index', compact('fleets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::with('cities')->get();
        return view('admin.fleet.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'company' => 'required|max:255',
            'email' => 'required|unique:fleets,email|email|max:255',
            'mobile' => 'digits_between:6,13',
            'logo' => 'mimes:jpeg,jpg,bmp,png|max:5242880',
            'password' => 'required|min:6|confirmed'
        ]);

        try{

            $fleet = $request->all();
            $fleet['password'] = bcrypt($request->password);
            if($request->hasFile('logo')) {
                $fleet['logo'] = $request->logo->store('fleet');
            }

            $fleet = Fleet::create($fleet);
            
            //CADASTRA CIDADE NA TABELA FLEET_CITIES
            $city = City::where('id', $fleet->city_id)->first();
            $estate = State::where('id', $city->state_id)->first();
            $FleetCitiesArr = ["fleet_id" => $fleet->id, "city_id" => $fleet->city_id, "city_name" => $city->title , "estate_name" => $estate->letter];
            $FleetCities = FleetCities::where('city_id', $fleet->city_id)->get()->count();
            if($FleetCities == 0){
                FleetCities::Create($FleetCitiesArr);
            }
            
            return back()->with('flash_success', trans('admin.fleet_msgs.fleet_saved'));

        }

        catch (Exception $e) {
            return back()->with('flash_error', trans('admin.fleet_msgs.fleet_not_found'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fleet  $fleet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fleet  $fleet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $states = State::with('cities')->get();
            $fleet = Fleet::findOrFail($id);
            $stateId = State::whereHas('cities', function ($query) use ($fleet) {
                $query->where('id', $fleet->city_id);
            })->get()->first();

            return view('admin.fleet.edit',compact('fleet','states','stateId'));
        } catch (ModelNotFoundException $e) {
            return $e;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fleet  $fleet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'city_id' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'company' => 'required|max:255',
            'mobile' => 'digits_between:6,13',
            'logo' => 'mimes:jpeg,jpg,bmp,png|max:5242880',
        ]);

        try {

            $fleet = Fleet::findOrFail($id);

            if($request->hasFile('logo')) {
                \Storage::delete($fleet->logo);
                $fleet->logo = $request->logo->store('fleet');
            }

            $fleet->city_id = $request->city_id;
            $fleet->name = $request->name;
            $fleet->company = $request->company;
            $fleet->email = $request->email;
            $fleet->mobile = $request->mobile;
            $fleet->commission = $request->commission;
            if($request->password && !$request->password_confirm){
                return back()->with('flash_error', 'Por favor, informe a senha de confirmação!');
            }elseif($request->password && $request->password_confirm){
                if($request->password == $request->password_confirm){
                    $fleet->password = bcrypt($request->password);
                }else{
                    return back()->with('flash_error', 'As senhas não conferem!');
                }
            }
            $fleet->save();
            
            //CADASTRA CIDADE NA TABELA FLEET_CITIES
            $city = City::where('id', $fleet->city_id)->first();
            $estate = State::where('id', $city->state_id)->first();
            $FleetCitiesArr = ["fleet_id" => $fleet->id, "city_id" => $fleet->city_id, "city_name" => $city->title , "estate_name" => $estate->letter];
            $FleetCities = FleetCities::where('city_id', $fleet->city_id)->get()->count();
            if($FleetCities == 0){
                FleetCities::Create($FleetCitiesArr);
            }

            return back()->with('flash_success', trans('admin.fleet_msgs.fleet_update'));
        }

        catch (ModelNotFoundException $e) {
            return back()->with('flash_error', trans('admin.fleet_msgs.fleet_not_found'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fleet  $Fleet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $fleet_request=WalletRequests::where('request_from','fleet')->where('from_id',$id)->count();

            if($fleet_request>0){
                return back()->with('flash_error', trans('admin.fleet_msgs.fleet_settlement'));
            }

            Fleet::find($id)->delete();
            return back()->with('message', trans('admin.fleet_msgs.fleet_delete'));
        }
        catch (Exception $e) {
            return back()->with('flash_error', trans('admin.fleet_msgs.fleet_not_found'));
        }
    }

}

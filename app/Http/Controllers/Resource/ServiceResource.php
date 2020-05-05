<?php

namespace App\Http\Controllers\Resource;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Setting;
use Exception;
use App\Helpers\Helper;

use App\ServiceType;
use App\ProviderService;
use App\PeakHour;
use App\ServicePeakHour;

class ServiceResource extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('demo', ['only' => [ 'store', 'update', 'destroy']]);
        $this->middleware('permission:service-types-list', ['only' => ['index']]);
        $this->middleware('permission:service-types-create', ['only' => ['create','store']]);
        $this->middleware('permission:service-types-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:service-types-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $services = ServiceType::all();
        
        if($request->ajax()) {
            return $services;
        } else {
            return view('admin.service.index', compact('services'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Peakhour =  PeakHour::get();
        return view('admin.service.create', compact('Peakhour'));
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
            'capacity' => 'required|numeric',
            'fixed' => 'required',
            'price' => 'sometimes|nullable',
            'min_price' => 'sometimes|nullable',
            'minute' => 'sometimes|nullable',
            'hour' => 'sometimes|nullable|numeric',
            'distance' => 'sometimes|nullable|numeric',
            'calculator' => 'required|in:MIN,HOUR,DISTANCE,DISTANCEMIN,DISTANCEHOUR',
            'image' => 'mimes:ico,png',
            'marker' => 'mimes:ico,png',
        ]);

        try {
            $service = new ServiceType;
            $service->name = $request->name;
            $service->fixed = str_replace(",", ".", $request->fixed);
            $service->price = str_replace(",", ".", $request->price);
            $service->min_price = str_replace(",", ".", $request->min_price);
            $service->description = $request->description;
            $service->calculator = $request->calculator;
            $service->capacity = $request->capacity;
            $service->status = 1;


            if($request->hasFile('image')) {
                $service->image = Helper::upload_picture($request->image);
            }
            if($request->hasFile('marker')) {
                $service->marker = Helper::upload_picture($request->marker);
            }

            if(!empty($request->price))
                $service->price = str_replace(",", ".", $request->price);
            else
                $service->price=0;
            
            if(!empty($request->min_price))
                $service->min_price = str_replace(",", ".", $request->min_price);
            else
                $service->min_price=0;

            if(!empty($request->minute))
                $service->minute = str_replace(",", ".", $request->minute);
            else
                $service->minute = 0;

            if(!empty($request->hour))
                $service->hour = $request->hour;
            else
                $service->hour = 0;

            if(!empty($request->distance))
                $service->distance = $request->distance;
            else
                $service->distance = 0;

            $service->save();

            if($request->peak_price){

                foreach ($request->peak_price as $key => $value) {

                    if($request->peak_price[$key]>0){
                        $service_map = ServicePeakHour::create(['service_type_id'=>$service->id,'peak_hours_id'=>$key,'min_price'=>$request->peak_price[$key]]);
                    }

                }

            }

            return back()->with('flash_success', trans('admin.service_type_msgs.service_type_saved'));
        } catch (Exception $e) {
            dd("Exception", $e);
            return back()->with('flash_error', trans('admin.service_type_msgs.service_type_not_found'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return ServiceType::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return back()->with('flash_error', trans('admin.service_type_msgs.service_type_not_found'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        try {

            $service = ServiceType::findOrFail($id);

            $Peakhour=PeakHour::with(['servicetimes' => function ($query) use ($id) {
                        $query->where('service_type_id', $id);
                        }])->get();

        /*  echo "<pre>";
            print_r($Peakhour->toArray());exit;*/

            return view('admin.service.edit',compact('service','Peakhour'));
        } catch (ModelNotFoundException $e) {
            return back()->with('flash_error', trans('admin.service_type_msgs.service_type_not_found'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'fixed' => 'required',
            'price' => 'sometimes|nullable',
            'min_price' => 'sometimes|nullable',
            'minute' => 'sometimes|nullable',
            'hour' => 'sometimes|nullable|numeric',
            'distance' => 'sometimes|nullable|numeric',
            'image' => 'mimes:ico,png',
            'marker' => 'mimes:ico,png'
        ]);

        try {

            $imgservice=ServiceType::find($id);

            if($request->hasFile('image')) {
                if($imgservice->image) {
                    Helper::delete_picture($imgservice->image);
                }
                $service['image'] = Helper::upload_picture($request->image);
            }
            if($request->hasFile('marker')) {
                if($imgservice->marker) {
                    Helper::delete_picture($imgservice->marker);
                }
                $service['marker'] = Helper::upload_picture($request->marker);
            }
            $service['name'] = $request->name;
            $service['fixed'] = str_replace(",", ".", $request->fixed);
            $service['min_price'] = str_replace(",", ".", $request->min_price);

            if(!empty($request->price))
                $service['price'] = str_replace(",", ".", $request->price);
            else
                $service['price']=0;
            
            if(!empty($request->min_price))
                $service['min_price'] = str_replace(",", ".", $request->min_price);
            else
                $service['min_price']=0;

            if(!empty($request->minute))
                $service['minute'] = str_replace(",", ".", $request->minute);
            else
                $service['minute'] = 0;

            if(!empty($request->hour))
                $service['hour'] = $request->hour;
            else
                $service['hour'] = 0;

            if(!empty($request->distance))
                $service['distance'] = $request->distance;
            else
                $service['distance'] = 0;

            $service['calculator'] = $request->calculator;

            $service['capacity'] = $request->capacity;

            if(!empty($request->waiting_free_mins))
                $service['waiting_free_mins'] = $request->waiting_free_mins;
            else
                $service['waiting_min_charge'] = 0;

            if(!empty($request->waiting_min_charge))
                $service['waiting_min_charge'] = $request->waiting_min_charge;
            else
                $service['waiting_min_charge'] = 0;

            ServiceType::where('id', $id)->update($service);

            //update peakhours
            if($request->peak_price){

                foreach ($request->peak_price as $key => $value) {

                    if($value['status']==1){
                        //update price
                         if($value['id']){
                            $service_map = ServicePeakHour::where('service_type_id',$id)->where('peak_hours_id',$key)->update(['min_price'=>$value['id'] ]);
                         }
                         else{
                            //delete peakhours
                            ServicePeakHour::where('service_type_id',$id)->where('peak_hours_id',$key)->delete();
                         }
                    }
                    else{
                        if($value['id']){
                            //insert price
                            $service_map = ServicePeakHour::create(['service_type_id'=>$id,'peak_hours_id'=>$key,'min_price'=>$value['id']]);
                        }
                    }
                }

            }

            return redirect()->route('admin.service.index')->with('flash_success', trans('admin.service_type_msgs.service_type_update'));
        }

        catch (ModelNotFoundException $e) {
            return back()->with('flash_error', trans('admin.service_type_msgs.service_type_not_found'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $provider_service=ProviderService::where('service_type_id',$id)->count();
            if($provider_service>0){
                return back()->with('flash_error', trans('admin.service_type_msgs.service_type_using'));
            }

            ServiceType::find($id)->delete();
            ServicePeakHour::where('service_type_id',$id)->delete();

            return back()->with('flash_success', trans('admin.service_type_msgs.service_type_delete'));
        } catch (ModelNotFoundException $e) {
            return back()->with('flash_error', trans('admin.service_type_msgs.service_type_not_found'));
        } catch (Exception $e) {
            return back()->with('flash_error', trans('admin.service_type_msgs.service_type_not_found'));
        }
    }
}

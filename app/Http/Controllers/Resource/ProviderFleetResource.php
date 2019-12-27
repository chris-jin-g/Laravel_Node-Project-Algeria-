<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use DB;
use Exception;
use Auth;

use App\Provider;
use App\UserRequests;
use App\Helpers\Helper;
use App\Document;

class ProviderFleetResource extends Controller
{

    private $perpage;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('account');
        $this->middleware('demo', ['only' => ['store', 'update', 'destroy']]);
        $this->perpage = config('constants.per_page', '10');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $fraquia_loc = substr(auth()->user()->mobile,0,2);


        if (!empty($request->page) && $request->page == 'all') {
            $AllProviders = Provider::with('service', 'accepted', 'cancelled')
                ->whereRaw('LEFT(mobile,2) = ?', [$fraquia_loc])
                ->orderBy('id', 'asc');
            $providers = $AllProviders->get();

            return response()->json(array('success' => true, 'data' => $providers));
        } else {

            if ($request->has('name') || $request->has('status')) {
                $AllProviders = Provider::with('service', 'accepted', 'cancelled', 'documents')
                    ->where('fleet', '=',auth()->user()->id);

                if (!empty($request->get('name'))) {
                    $AllProviders->where('first_name', 'like', '%' . $request->get('name') . '%')
                        ->orWhere('last_name', 'like', '%' . $request->get('name') . '%')
                        ->orWhere('email', 'like', '%' . $request->get('name') . '%');
                }

                if (!empty($request->get('status'))) {
                    $status = $request->get('status');
                    if ($status == "A"){
                        $AllProviders->where('status','=','approved');
                    }else if($status == "P"){
                        $AllProviders->whereHas('documents', function ($query){
                            $query->where('status','=','ASSESSING');
                        })->orderBy('id','desc');
                    }else{
                        $AllProviders->where('status','document')->orderBy('id','desc');
                    }
                }
                $AllProviders->orderBy('id','desc');

                if($request->has('name') || $request->has('status')){

                    $providers = $AllProviders->paginate(10)->appends(['name' => $request->get('name'), 'status' => $request->get('status')]);
                }else{
                    $providers = $AllProviders->paginate(10);
                }

                $total_documents = Document::count();

                $pagination = (new Helper)->formatPagination($providers);

                $url = $providers->url($providers->currentPage());

                $request->session()->put('providerpage', $url);

                return view('fleet.providers.index', compact('providers', 'pagination', 'total_documents'));

            }else{
                $AllProviders = Provider::with('service', 'accepted', 'cancelled')
                    ->where('fleet', '=',auth()->user()->id)
                    ->orderBy('id', 'DESC');

                $providers = $AllProviders->paginate(10);

                $total_documents = Document::count();

                $pagination = (new Helper)->formatPagination($providers);

                $url = $providers->url($providers->currentPage());

                $request->session()->put('providerpage', $url);

                return view('fleet.providers.index', compact('providers', 'pagination', 'total_documents'));
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fleet.providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|unique:providers,email|email|max:255',
            'mobile' => 'digits_between:6,13',
            'avatar' => 'mimes:jpeg,jpg,bmp,png|max:5242880',
            'password' => 'required|min:6|confirmed',
        ]);

        try {

            $provider = $request->all();

            $provider['password'] = bcrypt($request->password);
            $provider['fleet'] = Auth::user()->id;
            if ($request->hasFile('avatar')) {
                $provider['avatar'] = $request->avatar->store('provider/profile');
            }

            $provider = Provider::create($provider);

            return back()->with('flash_success', trans('admin.provider_msgs.provider_saved'));

        } catch (Exception $e) {
            return back()->with('flash_error', trans('admin.provider_msgs.provider_not_found'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $provider = Provider::findOrFail($id);
            return view('fleet.providers.provider-details', compact('provider'));
        } catch (ModelNotFoundException $e) {
            return $e;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $provider = Provider::findOrFail($id);
            return view('fleet.providers.edit', compact('provider'));
        } catch (ModelNotFoundException $e) {
            return $e;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'mobile' => 'digits_between:6,13',
            'avatar' => 'mimes:jpeg,jpg,bmp,png|max:5242880',
        ]);

        try {

            $provider = Provider::findOrFail($id);

            if ($request->hasFile('avatar')) {
                if ($provider->avatar) {
                    Storage::delete($provider->avatar);
                }
                $provider->avatar = $request->avatar->store('provider/profile');
            }

            $provider->first_name = $request->first_name;
            $provider->last_name = $request->last_name;
            $provider->mobile = $request->mobile;
            $provider->save();

            return redirect()->route('fleet.provider.index')->with('flash_success', trans('admin.provider_msgs.provider_update'));
        } catch (ModelNotFoundException $e) {
            return back()->with('flash_error', trans('admin.provider_msgs.provider_not_found'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Provider::find($id)->delete();
            return back()->with('message', trans('admin.provider_msgs.provider_delete'));
        } catch (Exception $e) {
            return back()->with('flash_error', trans('admin.provider_msgs.provider_not_found'));
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        try {
            $Provider = Provider::findOrFail($id);
            $total_documents = Document::count();
            if ($Provider->active_documents() == $total_documents && $Provider->service) {
                $Provider->update(['status' => 'approved']);
                return back()->with('flash_success', trans('admin.provider_msgs.provider_approve'));
            } else {
                if ($Provider->active_documents() != $total_documents) {
                    $msg = trans('admin.provider_msgs.document_pending');
                }
                if (!$Provider->service) {
                    $msg = trans('admin.provider_msgs.service_type_pending');
                }

                if (!$Provider->service && $Provider->active_documents() != $total_documents) {
                    $msg = trans('admin.provider_msgs.provider_pending');
                }
                return redirect()->route('fleet.provider.document.index', $id)->with('flash_error', $msg);
            }
        } catch (ModelNotFoundException $e) {
            return back()->with('flash_error', trans('admin.provider_msgs.provider_not_found'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function disapprove($id)
    {
        Provider::where('id', $id)->update(['status' => 'banned']);
        return back()->with('flash_success', trans('admin.provider_msgs.provider_disapprove'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function request($id)
    {

        try {

            $requests = UserRequests::where('user_requests.provider_id', $id)
                ->RequestHistory()
                ->orderBy('id', 'asc')
                ->paginate(10);

            $pagination = (new Helper)->formatPagination($requests);

            return view('fleet.request.index', compact('requests', 'pagination'));
        } catch (Exception $e) {
            return back()->with('flash_error', trans('admin.something_wrong'));
        }
    }
}

<?php

namespace App\Http\Controllers\Resource;

use App\State;
use App\User;
use App\UserRequests;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use Exception;
use Storage;
use Setting;
use QrCode;

class UserResource extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('demo', ['only' => ['store', 'update','destroy']]);

        $this->middleware('permission:user-list', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);

        $this->perpage = config('constants.per_page', '10');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if(!empty($request->page) && $request->page=='all'){
            $users = User::orderBy('id' , 'asc')->get();
            return response()->json(array('success' => true, 'data'=>$users));
        }
        else{
            if($request->has('name')){
                $users = User::orderBy('created_at' , 'desc')
                    ->where('first_name','like','%'.$request->get('name').'%')
                    ->orWhere('last_name','like','%'.$request->get('name').'%')
                    ->orWhere('email','like','%'.$request->get('name').'%')
                    ->paginate($this->perpage);
                $pagination=(new Helper)->formatPagination($users);
                return view('admin.users.index', compact('users','pagination'));
            }else{
                $users = User::orderBy('created_at' , 'desc')->paginate($this->perpage);
                $pagination=(new Helper)->formatPagination($users);
                return view('admin.users.index', compact('users','pagination'));
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
        

        return view('admin.users.create');
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|unique:users,email|email|max:255',
            'country_code' => 'required|max:25',
            'mobile' => 'digits_between:6,13',
            'picture' => 'mimes:jpeg,jpg,bmp,png|max:5242880',
            'password' => 'required|min:6|confirmed',
        ]);

        try{

            $user = $request->all();

            $user['payment_mode'] = 'CASH';
            $user['password'] = bcrypt($request->password);
            if($request->hasFile('picture')) {
                $user['picture'] = $request->picture->store('user/profile');
            }
            // QrCode generator
            $file=QrCode::format('png')->size(500)->margin(10)->generate('{
                "country_code":'.'"'.$request->country_code.'"'.',
                "phone_number":'.'"'.$request->mobile.'"'.'
                }');
            // $file=QrCode::format('png')->size(200)->margin(20)->phoneNumber($request->country_code.$request->mobile);
            $user['qrcode_url'] = Helper::upload_qrCode($request->mobile,$file);

            $user = User::create($user);

            return back()->with('flash_success', trans('admin.user_msgs.user_saved'));

        }

        catch (Exception $e) {
            return back()->with('flash_error', trans('admin.user_msgs.user_not_found'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('admin.users.user-details', compact('user'));
        } catch (ModelNotFoundException $e) {
            return $e;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            
            $user = User::findOrFail($id);

            return view('admin.users.edit',compact('user'));
        } catch (ModelNotFoundException $e) {
            return $e;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            //'city_id' => 'required',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'country_code' => 'required|max:25',
            'mobile' => 'digits_between:6,13',
            'picture' => 'mimes:jpeg,jpg,bmp,png|max:5242880',
        ]);

        try {

            $user = User::findOrFail($id);

            if($request->hasFile('picture')) {
                Storage::delete($user->picture);
                $user->picture = $request->picture->store('user/profile');
            }
            // QrCode generator
            $file=QrCode::format('png')->size(500)->margin(10)->generate('{
                "country_code":'.'"'.$request->country_code.'"'.',
                "phone_number":'.'"'.$request->mobile.'"'.'
                }');
            // $file=QrCode::format('png')->size(200)->margin(20)->phoneNumber($request->country_code.$request->mobile);
            $user->qrcode_url = Helper::upload_qrCode($request->mobile,$file);
            //$user->city_id = $request->city_id;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->country_code = $request->country_code;
            $user->mobile = $request->mobile;
            if($request->password && !$request->password_confirm){
                return back()->with('flash_error', 'Please enter the confirmation password!');
            }elseif($request->password && $request->password_confirm){
                if($request->password == $request->password_confirm){
                    $user->password = bcrypt($request->password);
                }else{
                    return back()->with('flash_error', 'Passwords do not match!');
                }
            }
            $user->save();

            return back()->with('flash_success', trans('admin.user_msgs.user_update'));
        }

        catch (ModelNotFoundException $e) {
            return back()->with('flash_error', trans('admin.user_msgs.user_not_found'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {

            User::find($id)->delete();
            return back()->with('message', trans('admin.user_msgs.user_delete'));
        }
        catch (Exception $e) {
            return back()->with('flash_error', trans('admin.user_msgs.user_not_found'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function request($id){

        try{

            $requests = UserRequests::where('user_requests.user_id',$id)
                    ->RequestHistory()
                    ->paginate($this->perpage);

            $pagination=(new Helper)->formatPagination($requests);

            return view('admin.request.index', compact('requests','pagination'));
        }

        catch (Exception $e) {
             return back()->with('flash_error', trans('admin.something_wrong'));
        }

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\shopmanager;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class ShopmanagerController extends Controller
{
    //


    public function index(Request $request){
    	$query = $request->get('q');
       
        if ($query!='')
        {
            $shopmanager_data = User::with('shopmanager')->where('name', 'LIKE', "%$query%")->where('userrole','=','shopmanager')->paginate(2);
        }
        else
        {
            $shopmanager_data = User::with('shopmanager')->where('userrole','=','shopmanager')->orderBy('id', 'DESC')->paginate(2);
        }
       
       //return $shopmanager_data;
        return view('shopmanager/home')->with('shopmanager_data',$shopmanager_data);
    }

    protected function singleDelete(Request $request){
        $singleid=$request->get('id');
        $finddeleteid = User::find($singleid);
        if($finddeleteid->delete()){
            return 'deleted';
        }else{
            return 'notdeleted';
        }
        

    }

    protected function bulkDelete(Request $request){
        
        $bulkids_csv=$request->get('bulkids');
        if($bulkids_csv!=''){
            $bulkids_csv=urldecode($bulkids_csv);
            $bulkids_arr=explode(',',$bulkids_csv);
        }
        //$bulkids_arr=json_decode($bulkids, TRUE);
        $bulkids_arr_data = User::find($bulkids_arr);

        foreach($bulkids_arr_data as $bulks){

            $bulks->delete();

        }

        /*$finddeleteid = User::find($singleid);
        if($finddeleteid->delete()){
            return 'deleted';
        }else{
            return 'notdeleted';
        }*/

        return 'deleted';
        

    }

    protected function create(){

    	return view('shopmanager/add');
    }

	/**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required',
            'account_type' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function store(Request $request)
    {
        $Shopmanager= User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'userrole' => $request['role'],
            'password' => bcrypt($request['password']),
            'userrole' => 'shopmanager'
        ]);

        $ShopmanagerInsertedId = $Shopmanager->id;

        if(isset($ShopmanagerInsertedId)){
            $Shopmanager_attr=shopmanager::create([
            'user_id' => $ShopmanagerInsertedId,
            'account_type' => 'shopmanager',
            'phone' => $request['phone'],
            'address' => $request['address'],
            'bankname' => $request['bankname'],
            'bankaccount' => $request['bankaccount'],
            'cod' => 0,

            ]);

        }
            
        if(isset($Shopmanager_attr)){
            return redirect('shopmanager');
        }else{
            return back()->withInput();
        }
        
      // return $ShopmanagerInsertedId;
    }


    protected function mobileLogin(Request $request){

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            // Authentication passed...
           return 'true';
        }else{
            return 'false';
        }
//return 'Done'.$request['email'].'  '.bcrypt($request['password']);
return $userprofile;
        //return count($userprofile);
        /*foreach($userprofile as $userp){
            $pass=$userp->password;
        }
        if(Hash::check($pass, bcrypt($request['password']))){
        return 'Done'.$request['email'].'  '.bcrypt($request['password']);
        }else{
        return 'Notdone'.$request['email'].'  '.bcrypt($request['password']);    
        }*/
        
    }


}

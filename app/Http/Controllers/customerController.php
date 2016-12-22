<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\customer;
use Illuminate\Support\Facades\Validator;

class customerController extends Controller
{
    //

	public function index(Request $request){
    	$query = $request->get('q');
       
        if ($query!='')
        {
            $customer_data = User::with('customer')->where('name', 'LIKE', "%$query%")->where('userrole','=','customer')->paginate(2);
        }
        else
        {
            $customer_data = User::with('customer')->where('userrole','=','customer')->orderBy('id', 'DESC')->paginate(2);
        }
       
       //return $customer_data;
        return view('customer/home')->with('customer_data',$customer_data);
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

    	return view('customer/add');
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
        $Customer= User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'userrole' => $request['role'],
            'password' => bcrypt($request['password']),
            'userrole' => 'customer'
            
        ]);

        $CustomerInsertedId = $Customer->id;

        if(isset($CustomerInsertedId)){
            if(!isset($request['cod'])){
                $cod=0;
            }else{
                $cod=1;
            }
            $Customer_attr=customer::create([
            'user_id' => $CustomerInsertedId,
            'account_type' => $request['account_type'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'bankname' => $request['bankname'],
            'bankaccount' => $request['bankaccount'],
            'cod' => $cod

            ]);

        }
            
        if(isset($Customer_attr)){
            return redirect('customer');
        }else{
            return back()->withInput();
        }
        
      // return $ShopmanagerInsertedId;
    }

}

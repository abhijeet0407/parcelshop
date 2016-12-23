<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\parcel;
use App\customer;
use App\shopmanager;
use App\parceldata;
use Illuminate\Support\Facades\Validator;



class parcelController extends Controller
{
    //

	 public function index(Request $request){
    	$query = $request->get('q');
       
        if ($query!='')
        {
            
             $parcel_data = parcel::with('customer','shopmanager')->where('parceltoken','like',"%$query%")->orderBy('id','DESC')->paginate(20);
           
        }
        else
        {
            $parcel_data = parcel::with('customer','shopmanager')->where('cartnumber','!=','')->orderBy('id','DESC')->paginate(20);
           
        }
       
       
        return view('parcel/home')->with('parcel_data',$parcel_data);
        
    }

    public function parcelCart(Request $request){
        $query = $request->get('q');
        if ($query!='')
        {
            
             $parcel_data = parcel::selectRaw('customer_id,shopmanager_id,dtrs.id,dtrs.cartnumber,dtrs.parceltokencount')->rightJoin(DB::raw("(Select cartnumber,max(id) as id,count(parceltoken) as parceltokencount  from parcels where cartnumber='%".$query."%' group by cartnumber) as dtrs"),'parcels.id','=','dtrs.id')->with('customer','shopmanager')->orderBy('dtrs.id','DESC')->paginate(20);
           
        }
        else
        {
            //select cartnumber,max(id) from parcels group by cartnumber order by max(id) desc
           //$parcel_data = parcel::selectRaw('id,customer_id')->with('customer','shopmanager')->paginate(20); 
            $parcel_data = parcel::selectRaw('customer_id,shopmanager_id,dtrs.id,dtrs.cartnumber,dtrs.parceltokencount')->rightJoin(DB::raw("(Select cartnumber,max(id) as id,count(parceltoken) as parceltokencount  from parcels group by cartnumber) as dtrs"),'parcels.id','=','dtrs.id')->with('customer','shopmanager')->orderBy('dtrs.id','DESC')->paginate(20);
            //$parcel_data = parcel::selectRaw('cartnumber,max(id),customer_id')->with('customer','shopmanager')->groupBy('cartnumber')->orderByRaw('max(id) desc')->paginate(20);
           
        }
        //return $parcel_data;
        return view('parcel/cart')->with('parcel_data',$parcel_data);

    }

    protected function parcelCartData(Request $request){
        $query = $request->get('cartnumber');
       // $query='5858a75404b7d';
        $parcel_data = parcel::with('customer','shopmanager','parceldata')->where('cartnumber','=',$query)->paginate(20);
        //return $parcel_data;
        return view('parcel/cartparcel')->with('parcel_data',$parcel_data);
    }

    public function searchCustomer(Request $request){
        $query = $request->get('term');
        $customer_data = User::where('name', 'ILIKE', "%$query%")->where('userrole','=','customer')->get();
       //print_r($customer_data);
       
        $a_json = array();
        $a_json_row = array();
        foreach($customer_data as $cust_data){
          //print_r($cust_data['name']);
        $a_json_row["id"] = $cust_data['id'];
        $a_json_row["value"] = $cust_data['name'];
        $a_json_row["label"] = $cust_data['name'];
        array_push($a_json, $a_json_row);
        }
        
        return json_encode ($a_json);
        
    }


    public function searchShopmanager(Request $request){
        $query = $request->get('term');
        $customer_data = User::where('userrole','=','shopmanager')->where('name', 'ILIKE', "%$query%")->get();
       //print_r($customer_data);
       
        $a_json = array();
        $a_json_row = array();
        foreach($customer_data as $cust_data){
          //print_r($cust_data['name']);
        $a_json_row["id"] = $cust_data['id'];
        $a_json_row["value"] = $cust_data['name'];
        $a_json_row["label"] = $cust_data['name'];
        array_push($a_json, $a_json_row);
        }
        
        return json_encode ($a_json);
        
    }


    public function addNewParcel(Request $request){ ?>
    
    <div class="col-sm-12">
         <div class="form-group fg-float">

            <div class="fg-line">
                 <input type="text" name="parcel_label[]" value="<?php echo old('parcel_label') ?>" class="input-sm form-control fg-input" required>
                 <label class="fg-label">Parcel ID* </label>
                 <a href="javascript:void(0)" class="btn btn-xs palette-Red-500 delete_parcel bg waves-effect pull-right"><i class="zmdi zmdi-minus-circle zmdi-hc-fw"></i></a>
             </div>

         </div>

    </div>

    <?php }

    protected function singleDelete(Request $request){
          $singleid=$request->get('id');
        $finddeleteid = Parcel::select('id')->where('cartnumber','=',$singleid)->get();
        foreach($finddeleteid as $deleteid){
            //echo $deleteid->id;
            //$deleteid->delete();
            Parcel::find($deleteid->id)->delete();
        }
        
        return 'deleted';

    }

    protected function bulkDelete(Request $request){
        
        $bulkids_csv=$request->get('bulkids');
        if($bulkids_csv!=''){
            $bulkids_csv=urldecode($bulkids_csv);
            $bulkids_arr=explode(',',$bulkids_csv);
        }
        //$bulkids_arr=json_decode($bulkids, TRUE);
        //echo $bulkids_arr_data = Parcel::find($bulkids_arr);

        foreach($bulkids_arr as $bulks){
            $finddeleteid = Parcel::select('id')->where('cartnumber','=',$bulks)->get();
            foreach($finddeleteid as $deleteid){
                //echo $deleteid->id;
                //$deleteid->delete();
                Parcel::find($deleteid->id)->delete();
            }
           // $bulks->delete();

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

    	return view('parcel/add');
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
            'customer_id' => 'required|max:255',
            'shopmanager_id' => 'required|max:255',
            'parcel_label.*' =>'required'
            
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
        $cartnumber=uniqid();
        foreach($request['parcel_label'] as $ptoken){

            $parcel_inserted_data=parcel::create([
            'parceltoken'=>$ptoken,
            'customer_id'=>$request['customer_id'],
            'shopmanager_id'=>$request['shopmanager_id'],
            'cartnumber'=> $cartnumber
            ]);

            $parcel_inserted_id[] = $parcel_inserted_data->id;

        }
        $request->session()->put('parcel_inserted_id',$parcel_inserted_id);
        //session()->flash('parcel_inserted_id', $parcel_inserted_id); 
       // return view('parcel/parceldata')->with('parcel_inserted_data',$parcel_inserted_data);
        return redirect('parcel/parceldata');
        
    } 

    protected function parcelData(Request $request)
    {

        $parcel_inserted_id = $request->session()->pull('parcel_inserted_id', 'default');
        if($parcel_inserted_id==''){
            return view('parcel/home');
            die();
        }

        $parcel_data = parcel::whereIn('id',$parcel_inserted_id)->get();
        return view('parcel/parceldataform')->with('parcel_data',$parcel_data);

    } 

    protected function parcelDataStore(Request $request)
    {
        //foreach($request['parcel_label'] as $ptoken){
        $loop_count=count($request['parcel_id']);

        for($i=0;$i<=$loop_count-1;$i++)
        {
            $parceldata = new parceldata;
            $parceldata->parcel_id = $request['parcel_id'][$i];
            $parceldata->producttype = $request['producttype'][$i];
            $parceldata->destination = $request['destination'][$i];
            $parceldata->price = $request['price'][$i];
            $parceldata->recipient_name = $request['recipient_name'][$i];
            $parceldata->zipcode = $request['zipcode'][$i];
            $parceldata->address = $request['address'][$i];
            $parceldata->phone = $request['phone'][$i];
            $parceldata->save();

        }
       return redirect('parcel'); 

    } 


}

<?php

namespace App\Http\Controllers;
use DB;
use App\Models\vendorprojects;
use App\Models\vendorclients;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VendorclientsController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
	public function clientlist()
    {
		// return redirect('/home/vendor_equipmentdetails');
		 $id = Auth::user()->id; 
		$clientlist = DB::table('vendorclients')
					->join('states', 'states.state_id', '=', 'vendorclients.state')
					->select('vendorclients.*', 'states.*')
					->where('vendorclients.vendoradmin_id', $id)
					->get(); 
					//dd($clientlist);
					
		$clientcontactdetailsq = "Select * From `vendorequipmendetails` Inner Join `Vendorequipments` On `Vendorequipments`.`Id` = `vendorequipmendetails`.`Ve_id` Inner Join `vendorclients` On `vendorclients`.`Id` = `vendorequipments`.`clinet_id` Where Vendorequipments.ve_vendor_id=$id AND `vendorequipmendetails`.`ve_rental_end_date` <= NOW()";
				$clientcontactdetails = DB::select(DB::raw($clientcontactdetailsq));

	foreach($clientcontactdetails as $key=>$val){
			
		$category = \DB::table('subcategories')->where(['id'=>$val->ve_equipment_type])
					->select("sub_category_name")
						->first();
		
		
		$clientcontactdetails[$key]->category_name = $category->sub_category_name;
		//dd($clientcontactdetails);
	}	
        return view('vendoradmin/clientlist', compact('clientlist','clientcontactdetails'));
		
       // return view('vendors/dashboard');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$states = DB::table('states')->get();
       return view('vendoradmin/createclient', compact('states'));
    }
	public function profiledetails($id)
    {	 
	$numberofequipment=0;
		$count = 0;
		$profiledetails = DB::table('vendorclients')
					->join('states', 'states.state_id', '=', 'vendorclients.state')
					->join('users', 'users.id', '=', 'vendorclients.vendoradmin_id')
					->select('vendorclients.*', 'states.*','users.name as admin_name')
					->where('vendorclients.id', $id)
					->get();
					$profiledetails = $profiledetails[0];
		$vendorprojects = \DB::table('vendorprojects')->where('client_id', $id)
						->get();
		 	//dd($vendorprojects);	
		foreach($vendorprojects as $key => $projectsdata){
			$client_id = $projectsdata->client_id;
			$project_id = $projectsdata->project_id;
			 $equipmentsquery= DB::table('vendorequipments')
					->join('vendorequipmendetails', 'vendorequipmendetails.ve_id', '=', 'vendorequipments.id','left')
					->where('vendorequipments.clinet_id',$client_id)
					->where('vendorequipments.project_id',$project_id)
					->select('vendorequipments.*', 'vendorequipmendetails.*')
					->get();
					
					 if(count($equipmentsquery)){
					foreach($equipmentsquery as $k=>$equipmentsquerydata){ 
					 
						if($k == 0){
						 $count = 0;
						}
						$count += $equipmentsquerydata->ve_rental_cost;
						$vendorprojects[$key]->v_rental_cost = $count;
						$vendorprojects[$key]->ve_billing_cycle =$equipmentsquerydata->ve_billing_cycle;
						 
					}
					 }else{
						$vendorprojects[$key]->v_rental_cost = 0;
						$vendorprojects[$key]->ve_billing_cycle =0; 
					 }
					
			
			$vendorprojects[$key]->counta = $equipmentsquery->count();
			$numberofequipment += $equipmentsquery->count();
			 $vendorprojects->equipmentcount = $numberofequipment;
			
		}
	$listofinvoice = \DB::table('invoices')->where(['client_id'=>$id])
						->get();		
// dd($vendorprojects);	
DB::enableQueryLog();
$clientcontactdetailsq = "Select * From `vendorequipmendetails` Inner Join `Vendorequipments` On `Vendorequipments`.`Id` = `vendorequipmendetails`.`Ve_id` Where `Vendorequipments`.`Clinet_id` = $id and `vendorequipmendetails`.`ve_rental_end_date` <= NOW()";
				$clientcontactdetails = DB::select(DB::raw($clientcontactdetailsq));

	foreach($clientcontactdetails as $key=>$val){
			
		$category = \DB::table('subcategories')->where(['id'=>$val->ve_equipment_type])
					->select("sub_category_name")
						->first();
		
		
		$clientcontactdetails[$key]->category_name = $category->sub_category_name;
	}													
	//print_r(DB::getQueryLog());											
//dd($clientcontactdetails);													
       return view('vendoradmin/profiledetails', compact('profiledetails','vendorprojects','listofinvoice','clientcontactdetails'));
    }
	public function profileedit($id)
    {
		$states = DB::table('states')->get();
		$vendorprojects = \DB::table('vendorprojects')->where('client_id', $id)
						->get();
		$clientcontacts = \DB::table('clientcontacts')->where('client_id', $id)
						->get();
		$profiledetails = DB::table('vendorclients')
					->join('states', 'states.state_id', '=', 'vendorclients.state')
					->select('vendorclients.*', 'states.*')
					->where('vendorclients.id', $id)
					->get();
					$profiledetails = $profiledetails[0];
		//dd($clientcontacts);			
       return view('vendoradmin/profileedit', compact('profiledetails','states','vendorprojects','clientcontacts'));
    }
	public function clientdetails(Request $request){
				$id = $request->input('id');
				
				//DB::enableQueryLog();
				$clientdetails = DB::table('vendorclients')
					->join('states', 'states.state_id', '=', 'vendorclients.state')
					->select('vendorclients.*', 'states.*')
					->where('vendorclients.id', $id)
					->get(); 
		 //dd($clientdetails);
			/*  $query = DB::getQueryLog();
				 dd($query);  */	
			
				return response()->json(array('clientdetails'=>$clientdetails), 200);
	}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		if ( vendorclients::where('name', '=', $request->client_name)->exists()) {

               return Redirect()->back()->withInput()->with('error', 'This client name exist !');
			}	
		if ( vendorclients::where('mobile', '=', $request->client_phone)->exists()) {

               return Redirect()->back()->withInput()->with('error', 'This client Mobile exist !');
			}	
		if ( vendorclients::where('email', '=', $request->client_email)->exists()) {

               return Redirect()->back()->withInput()->with('error', 'This client email exist !');
			}	
		
   $contact_name = $_POST["contact_name"];

	   $prof=array();
if(!empty($_POST["contact_name"]) && isset($_POST["contact_name"])){
for($i=0;$i<count($_POST['contact_name']);$i++){
$prof[$i]['company_name']=$_POST["contact_name"][$i];
$prof[$i]['contact_mobile']=$_POST["contact_mobile"][$i];
$prof[$i]['contact_secondaryno']=$_POST['contact_secondaryno'][$i];
$prof[$i]['contact_email']=$_POST['contact_email'][$i];
$prof[$i]['contact_designation']=$_POST['contact_designation'][$i];
}

}
	   $project=array();
if(!empty($_POST["project_name"]) && isset($_POST["project_name"])){
for($i=0;$i<count($_POST['project_name']);$i++){
$project[$i]['project_name']=$_POST["project_name"][$i];
$project[$i]['project_state']=$_POST["project_state"][$i];
$project[$i]['project_address']=$_POST["project_address"][$i];
$project[$i]['vendor_admin_id']=$request->input('vendoradmin_id');
$project[$i]['project_city']=$_POST['project_city'][$i];
}

}
		$file_tmpname1 = $_FILES['client_logo']['tmp_name'];
        $file_name1 = $_FILES['client_logo']['name'];
		 $filepath1 = "C:/xampp/htdocs/tatainfra/public/images/".time().$file_name1;
		 $file_name2 = time().$file_name1;
		 move_uploaded_file($file_tmpname1, $filepath1);

$contact_details =json_encode($prof); 



// vendorprojects::create($project);
 


$project_details=json_encode($project);

$values_details = array(
		"name"=>$request->input('client_name'),
		"mobile"=>$request->input('client_phone'),
		"email"=>$request->input('client_email'),
		"state"=>$request->input('client_state'),
		"state"=>$request->input('client_state'),
		"city"=>$request->input('client_city'),
		"address"=>$request->input('client_address'),
		"pan_number"=>$request->input('pan_number'),
		"gst_number"=>$request->input('gst_number'),
		"logo"=>$file_name2,
		"status"=>1,
		"vendoradmin_id"=>$request->input('vendoradmin_id'),
		"contact_details"=>$contact_details,
		"project_details"=>$project_details,
		);
       $id=  vendorclients::create($values_details)->id;

	   $project=array();
if(!empty($_POST["project_name"]) && isset($_POST["project_name"])){
for($i=0;$i<count($_POST['project_name']);$i++){
$project[$i]['project_name']=$_POST["project_name"][$i];
$project[$i]['project_state']=$_POST["project_state"][$i];
$project[$i]['project_address']=$_POST["project_address"][$i];
$project[$i]['vendor_admin_id']=$request->input('vendoradmin_id');
$project[$i]['client_id']=$id;
$project[$i]['project_city']=$_POST['project_city'][$i];
}

}

 DB::table('vendorprojects')->insert($project);
 
 	   $prof=array();
if(!empty($_POST["contact_name"]) && isset($_POST["contact_name"])){
for($i=0;$i<count($_POST['contact_name']);$i++){
$prof[$i]['contacts_name']=$_POST["contact_name"][$i];
$prof[$i]['contacts_mobile']=$_POST["contact_mobile"][$i];
$prof[$i]['contacts_secondarymobile']=$_POST['contact_secondaryno'][$i];
$prof[$i]['contacts_email']=$_POST['contact_email'][$i];
$prof[$i]['contacts_designation']=$_POST['contact_designation'][$i];
$prof[$i]['vendor_admin_id']=$request->input('vendoradmin_id');
$prof[$i]['client_id']=$id;
}

}

  DB::table('clientcontacts')->insert($prof);
 
 return redirect('/vendor/clientlist')->with('error', "You don't have clients, Please add the at least one client and project");;
	   
	   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vendorclients  $vendorclients
     * @return \Illuminate\Http\Response
     */
    public function show(vendorclients $vendorclients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vendorclients  $vendorclients
     * @return \Illuminate\Http\Response
     */
    public function edit(vendorclients $vendorclients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vendorclients  $vendorclients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vendorclients $vendorclients)
    {
      
 $id = $request->input('id');

	   $prof=array();
if(!empty($_POST["contact_name"]) && isset($_POST["contact_name"])){
for($i=0;$i<count($_POST['contact_name']);$i++){
$prof[$i]['contacts_name']=$_POST["contact_name"][$i];
$prof[$i]['contacts_mobile']=$_POST["contact_mobile"][$i];
$prof[$i]['contacts_secondarymobile']=$_POST['contact_secondaryno'][$i];
$prof[$i]['contacts_email']=$_POST['contact_email'][$i];
$prof[$i]['contacts_designation']=$_POST['contact_designation'][$i];
$prof[$i]['vendor_admin_id']=$_POST['vendor_admin_id'][$i];

DB::table('clientcontacts')
						->where('clientcontacts_id', $_POST["clientcontacts_id"][$i])
						->update($prof[$i]); 

}

}
	   $project=array();
if(!empty($_POST["project_name"]) && isset($_POST["project_name"])){
for($i=0;$i<count($_POST['project_name']);$i++){
$project[$i]['project_id']=$_POST["project_id"][$i];
$project[$i]['project_name']=$_POST["project_name"][$i];
$project[$i]['project_state']=$_POST["project_state"][$i];
$project[$i]['project_address']=$_POST["project_address"][$i];
$project[$i]['project_city']=$_POST['project_city'][$i];
DB::table('vendorprojects')
						->where('project_id', $_POST["project_id"][$i])
						->update($project[$i]); 
}

}
/* echo  "<pre>";
print_r($project);
die(); */
// DB::table('vendorprojects')->insert($project);
 
		if($_FILES['client_logo']['tmp_name']){
		$file_tmpname1 = $_FILES['client_logo']['tmp_name'];
        $file_name1 = $_FILES['client_logo']['name'];
		 $filepath1 = "C:/xampp/htdocs/tatainfra/public/images/".time().$file_name1;
		 $file_name2 = time().$file_name1;
		 move_uploaded_file($file_tmpname1, $filepath1);
		}else{
			$file_name2=$request->input('logo');
		}

$contact_details =json_encode($prof); 
$project_details=json_encode($project);

$values_details = array(
		"name"=>$request->input('client_name'),
		"mobile"=>$request->input('client_phone'),
		"email"=>$request->input('client_email'),
		"state"=>$request->input('client_state'),
		"state"=>$request->input('client_state'),
		"city"=>$request->input('client_city'),
		"address"=>$request->input('client_address'),
		"pan_number"=>$request->input('pan_number'),
		"gst_number"=>$request->input('gst_number'),
		"logo"=>$file_name2,
		"status"=>1,
		"vendoradmin_id"=>$request->input('vendoradmin_id'),
		"contact_details"=>$contact_details,
		"project_details"=>$project_details,
		);
		//dd($values_details);
		DB::table('vendorclients')
						->where('id', $id)
						->update($values_details); 
      //  vendorclients::create($values_details);

 return redirect('/vendor/clientlist');
	 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vendorclients  $vendorclients
     * @return \Illuminate\Http\Response
     */
    public function destroy(vendorclients $vendorclients)
    {
        //
    }
	public function readyforinvoice()
    {	 
	 $id = Auth::user()->id; 
	$numberofequipment=0;
		$count = 0;
		$profiledetails = DB::table('vendorclients')
					->join('states', 'states.state_id', '=', 'vendorclients.state')
					->join('users', 'users.id', '=', 'vendorclients.vendoradmin_id')
					->select('vendorclients.*', 'states.*','users.name as admin_name')
					->where('vendorclients.id', $id)
					->get();
			if(count($profiledetails)==0){
				$profiledetails =array();
			}else{
				$profiledetails = $profiledetails[0];
			}
					
		$vendorprojects = \DB::table('vendorprojects')->where('vendor_admin_id', $id)
						->get();
		 		
		foreach($vendorprojects as $key => $projectsdata){
			$client_id = $projectsdata->client_id;
			$project_id = $projectsdata->project_id;
			 $equipmentsquery= DB::table('vendorequipments')
					->join('vendorequipmendetails', 'vendorequipmendetails.ve_id', '=', 'vendorequipments.id','left')
					->where('vendorequipments.clinet_id',$client_id)
					->where('vendorequipments.project_id',$project_id)
					->select('vendorequipments.*', 'vendorequipmendetails.*')
					->get();
					
					 if(count($equipmentsquery)){
					foreach($equipmentsquery as $k=>$equipmentsquerydata){ 
					 
						if($k == 0){
						 $count = 0;
						}
						$count += $equipmentsquerydata->ve_rental_cost;
						$vendorprojects[$key]->v_rental_cost = $count;
						$vendorprojects[$key]->ve_billing_cycle =$equipmentsquerydata->ve_billing_cycle;
						 
					}
					 }else{
						$vendorprojects[$key]->v_rental_cost = 0;
						$vendorprojects[$key]->ve_billing_cycle =0; 
					 }
					
			
			$vendorprojects[$key]->counta = $equipmentsquery->count();
			$numberofequipment += $equipmentsquery->count();
			 $vendorprojects->equipmentcount = $numberofequipment;
			
		} 
//dd($vendorprojects);						
       return view('vendoradmin/readyforinvoice', compact('profiledetails','vendorprojects'));
    }
	public function listofinvoice($id)
    {	 
	
	 $listofinvoice = \DB::table('invoices')->where('project_id', $id)->orderBy('id', 'DESC')
						->get();
		if(!$listofinvoice->isEmpty()){
			$listofinvoice = $listofinvoice;
		}else{
			$listofinvoice =0;
		}
		
//dd($listofinvoice);					
       return view('vendoradmin/listofinvoice', compact('listofinvoice'));
    }
	public function invoicestatus(Request $request){
		
					$id =  $request->input('id');  
		$updateDetails = ['amount_status' => 1];  
			 
			DB::table('invoices')
						->where('id', $request->get('id'))
						->update($updateDetails); 
			$clientdetails ="success";
				return response()->json(array('clientdetails'=>$clientdetails), 200);
	}
	public function uplaod_receipt(Request $request){
		ini_set('memory_limit','256M');
			$project_id = $request->get('equipment_id');
			/****log sheet morning image****/
		 $file_tmpname1 = $_FILES['payment_receipt_img']['tmp_name'];
       $file_name1 = $_FILES['payment_receipt_img']['name'];
	  
		 //$filepath1 = "/home/ubuntu/infraweb/public/images/".time().$file_name1;
		 $filepath1 = "C:/xampp/htdocs/tatainfra/public/images/".time().$file_name1;
		 $payment_receipt_img = time().$file_name1;
		 move_uploaded_file($file_tmpname1, $filepath1); 
		
		
		 /**********/
		 $updateDetails = ['payment_receipt' => $payment_receipt_img];  
		DB::table('invoices')
						->where('id', $request->get('id'))
						->update($updateDetails); 
						return redirect('/vendor/listofinvoice/'.$project_id)->with('status', 'Payment status Updated!');;
	}
}

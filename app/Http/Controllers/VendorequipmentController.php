<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\vendorequipment;
use App\Models\vendorequipmendetails;
use App\Models\vendorequipment_loan;
use App\Models\clientcontactdetails;
use App\Models\equipment_operator;
use Illuminate\Http\Request;
use App\Models\User;

class VendorequipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		 $id = auth()->user()->id;
        $correctedComparisons = "avaliable";
		$avaliable_equipment = \DB::table('vendorequipments')->where('ve_vendor_id', $id)->where('ve_product_type', $correctedComparisons)->whereNull('vendorequipments.deleted_at')
						->get();
		$avaliable_equipment_count = $avaliable_equipment->count();


		$correctedComparisons = "rentout";
		$rentout_equipment = \DB::table('vendorequipments')->where('ve_product_type', $correctedComparisons)->where('ve_vendor_id', $id)->whereNull('vendorequipments.deleted_at')
						->get();
		$rentout_equipment_count = $rentout_equipment->count();


		$equipment = DB::table('equipments')
					->select('e_equipment_type')
					->groupBy('e_equipment_type')
					->get();
		$project_type = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->select('projects.project_type')
					->groupBy('projects.project_type')
					->get();
					/******get the equipment data start******/
					if ($request->has('var')) {
							   $querystring = $request->input('var');
							  
						}else{
							$querystring = 0;
						}

					$equipments[]= array() ;
		$equipments1 = DB::table('vendorequipments');
					$equipments1->join('subcategories', 'subcategories.id', '=', 'vendorequipments.ve_equipment_type','left');
					$equipments1->join('vendorequipmendetails', 'vendorequipmendetails.ve_id', '=', 'vendorequipments.id','left');
					$equipments1->join('vendorequipment_loans', 'vendorequipment_loans.ve_id', '=', 'vendorequipments.id','left');
					if($querystring){
					if($querystring=='expiry'){
							$currentdate = date('Y-m-d');
							$llastdays = date('Y-m-d', strtotime('today - 60 days'));
							$equipments1->whereBetween('vendorequipmendetails.ve_rental_end_date', [$llastdays, $currentdate]);						
					}else if($querystring=='dexpiry'){
										$currentdate = date('Y-m-d');
										$llastdays = date('Y-m-d', strtotime('today - 60 days'));
										$equipments1->orWhereBetween('vendorequipmendetails.rc_end_date', [$llastdays, $currentdate]);
										$equipments1->orWhereBetween('vendorequipmendetails.ins_end_date', [$llastdays, $currentdate]);
										$equipments1->orWhereBetween('vendorequipmendetails.tax_end_date', [$llastdays, $currentdate]);
										$equipments1->orWhereBetween('vendorequipmendetails.permit_end_date', [$llastdays, $currentdate]);
										$equipments1->orWhereBetween('vendorequipmendetails.fitness_end_date', [$llastdays, $currentdate]);
						
					}else if($querystring=='payment'){
						
					}else if($querystring=='idle'){
						$dayscount = date('t'); 
										$equipments1->where('vendorequipments.working_count','!=' , $dayscount)	;
					}else if($querystring=='breakdown'){
						//$equipments1->where('vendorequipments.ve_product_type', 'rentedout');
						$equipments1->where('vendorequipments.ve_status', '2');
					}
					}
					 $equipments1->where('vendorequipments.ve_vendor_id', $id);
					 $equipments1->whereNull('vendorequipments.deleted_at');
					 $equipments1->orderBy('vendorequipments.id','DESC');
					$equipments1->select('vendorequipments.*', 'vendorequipmendetails.*', 'vendorequipment_loans.*','vendorequipments.id as main_id','subcategories.sub_category_name');
					$equipments = $equipments1->get();
			//	dd($equipments);
				$equipments=   json_decode(json_encode($equipments), true);				
				foreach($equipments as $key=>$val){
					
					$equipment_operators = DB::table('operatorplanners')
												->join('users', 'users.id', '=', 'operatorplanners.operator_users_id','left')
														->where(array('equipment_id'=> $val["ve_id"]))->get();
					$equipment_operators =   json_decode(json_encode($equipment_operators), true);	
					 $equipments[$key]["operator"] = $equipment_operators;
					
				}
				
				/******* get the equipment data end. ********/
				//dd($equipments); 
			
					 $lastdays = date('Y-m-d', strtotime('today - 60 days'));
		
			$currentdate = date('Y-m-d');
			
			$dexpiryquery = "select * from `vendorequipments` inner join `vendorequipmendetails` on `vendorequipmendetails`.`ve_id` = `vendorequipments`.`id` where vendorequipments.ve_product_type='unengaged' and(`vendorequipmendetails`.`rc_end_date` between '$lastdays' AND '$currentdate' OR `vendorequipmendetails`.`ins_end_date` between '$lastdays' AND '$currentdate' OR `vendorequipmendetails`.`tax_end_date` between '$lastdays' AND '$currentdate' OR `vendorequipmendetails`.`permit_end_date` between '$lastdays' AND '$currentdate' OR `vendorequipmendetails`.`fitness_end_date` between '$lastdays' AND '$currentdate')";
				$dexpiry_count = DB::select(DB::raw($dexpiryquery));	
			
				 $daequipmentscount = (count($dexpiry_count)); 
				$drexpiryquery = "select * from `vendorequipments` inner join `vendorequipmendetails` on `vendorequipmendetails`.`ve_id` = `vendorequipments`.`id` where vendorequipments.ve_product_type='rentedout' and(`vendorequipmendetails`.`rc_end_date` between '$lastdays' AND '$currentdate' OR `vendorequipmendetails`.`ins_end_date` between '$lastdays' AND '$currentdate' OR `vendorequipmendetails`.`tax_end_date` between '$lastdays' AND '$currentdate' OR `vendorequipmendetails`.`permit_end_date` between '$lastdays' AND '$currentdate' OR `vendorequipmendetails`.`fitness_end_date` between '$lastdays' AND '$currentdate')";
				$drexpiry = DB::select(DB::raw($drexpiryquery));	
			
				 $drequipmentscount = (count($drexpiry)); 
			$dayscount = date('t');		
					
		$avaliablebrakdown = DB::table('vendorequipments')->where(array('ve_product_type'=> 'unengaged',"ve_status"=>2))->get();
		$rentedoutbrakdown = DB::table('vendorequipments')->where(array('ve_product_type'=> 'rentedout',"ve_status"=>2))->get();
		$avaliableidle = DB::table('vendorequipments')->where(array('ve_product_type'=> 'unengaged'))->get();
	$rentedoutidle = DB::table('vendorequipments')->where('vendorequipments.working_count','!=' , $dayscount)->where(array('ve_product_type'=> 'rentedout',))->get();
		
			
			$states = DB::table('states')->get();
			
			//dd($rentout_equipment_count);
        return view('vendoradmin.equipmentlist', compact('rentout_equipment_count','avaliable_equipment_count','equipment','equipments','project_type','states','daequipmentscount','drequipmentscount','avaliablebrakdown','rentedoutbrakdown','avaliableidle','rentedoutidle'));
    }
 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createuser()
     {
		 $admin_user_id = auth()->user()->id;
		
		$vendoradmin_users = \DB::table('users')->where('id', $admin_user_id)
						->get();
         return view('vendoradmin.createuser',compact('vendoradmin_users'));
    } 
	
	 public function userlist()
     {
		 $admin_user_id = auth()->user()->id;
		
		$vendoradmin_users = \DB::table('users')->where('admin_user_id', $admin_user_id)
						->get();
					//	dd($vendoradmin_users);
         return view('vendoradmin.userlist',compact('vendoradmin_users'));
    } 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function assignproject()
     {
		
		$admin_user_id = auth()->user()->id;
		 
		 $clientcount = DB::table('vendorclients')
												->where("vendoradmin_id",$admin_user_id)
												->get()
												->count();
		if($clientcount){
			 $vendorclients = \DB::table('vendorclients')->where('vendoradmin_id', $admin_user_id)
						->get();
		//dd($vendorclients);
		$vendors = DB::table('vendors')->get();
		$projects = DB::table('vendorprojects')->get();
		$subcategories = DB::table('subcategories')->get();
		$eq_brands = DB::table('eq_brands')->get();
		$banks = DB::table('banks')->get();
		
         return view('vendoradmin.assignproject', compact('vendors','projects','vendorclients','subcategories','eq_brands','banks'));
		 
		}else{
			
			
			return redirect("/vendor/clientlist")->with('error', "You don't have clients, Please add at least one client and project");
		}	
    } /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
     {
		 
		$vendors = DB::table('vendors')->get();
		$projects = DB::table('projects')->get();
		$subcategories = DB::table('subcategories')->where("status",1)->OrderBy("sub_category_name",'ASC')->get();
		$eq_brands = DB::table('eq_brands')->get();
		$banks = DB::table('banks')->get();
		//dd($subcategories);
         return view('vendoradmin.create', compact('vendors','projects','subcategories','eq_brands','banks'));
    } 
	public function rentalcreate()
     {
		 $admin_user_id = auth()->user()->id;
		 
		 $clientcount = DB::table('vendorclients')
												->where("vendoradmin_id",$admin_user_id)
												->get()
												->count();
		if($clientcount){
			 $vendorclients = \DB::table('vendorclients')->where('vendoradmin_id', $admin_user_id)
						->get();
		//dd($vendorclients);
		$vendors = DB::table('vendors')->get();
		$projects = DB::table('vendorprojects')->get();
		$subcategories = DB::table('subcategories')->where("status",1)->OrderBy("sub_category_name",'ASC')->get();
		$eq_brands = DB::table('eq_brands')->get();
		$banks = DB::table('banks')->get();
		
         return view('vendoradmin.rentalcreate', compact('vendors','projects','vendorclients','subcategories','eq_brands','banks'));
		 
		}else{
			
			
			return redirect("/vendor/clientlist")->with('error', "You don't have clients, Please add at least one client and project");
		}	
														
														
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
		    ini_set('memory_limit','256M');
			
		if ( vendorequipment::where('ve_vehicle_number', '=', $request->ve_vehicle_number)->exists()) {

               return Redirect()->back()->withInput()->with('error', 'This Vehicle No exist !');
			}	
			
         $validatedData = $request->validate([  
            've_product_type' => 'required', 
            've_equipment_type' => 'required',
            've_brand' => 'required',
            've_year' => 'required',
            've_model' => 'required',
            've_vehicle_number' => 'required',
         
        ],[], 
		[
			've_product_type' => 'product type', 
			've_equipment_type' => 'Equipment type', 
			've_brand' => 'Brand', 
			've_year' => 'Year', 
			've_model' => 'Model', 
			've_vehicle_number' => 'vehicle number', 
		 
		]
			);
		//$values = $request->except('url');
		$values = array(
		
		"ve_product_type"=> $request->input('ve_product_type'),
		"ve_equipment_type"=> $request->input('ve_equipment_type'),
		"ve_brand"=> $request->input('ve_brand'),
		"ve_year"=> $request->input('ve_year'),
		"ve_model"=> $request->input('ve_model'),
		"ve_capacity"=> $request->input('ve_capacity'),
		"ve_type_of_work"=> $request->input('ve_type_of_work'),
		"ve_vehicle_number"=> $request->input('ve_vehicle_number'),
		"ve_expected_mileage"=> $request->input('ve_expected_mileage'),
		"ve_expected_mileage_type"=> $request->input('ve_expected_mileage_type'),
		"ve_vehicle_code"=> $request->input('ve_vehicle_code'),
		"service_details_at"=> $request->input('service_details_at'),
		"service_details_at_type"=> $request->input('service_details_at_type'),
		"service_details_days"=> $request->input('service_details_days'),
		"last_serviced_at"=> $request->input('last_serviced_at'),
		"last_serviced_at_type"=> $request->input('last_serviced_at_type'),
		"last_serviced_at_date"=> $request->input('last_serviced_at_date'),
		"loan_taken"=> $request->input('loan_taken'),
		"ve_vendor_id"=> $request->input('ve_vendor_id'),
		
		);
        $id = vendorequipment::create($values)->id;
		
			foreach ($_FILES['image']['tmp_name'] as $key => $value) {
              
            $file_tmpname = $_FILES['image']['tmp_name'][$key];
            $file_name = $_FILES['image']['name'][$key];
   
           // $filepath = "/home/ubuntu/infraweb/public/images/".time().$file_name;
            $filepath = "C:/xampp/htdocs/tatainfra/public/images/".time().$file_name;
  
                  move_uploaded_file($file_tmpname, $filepath);
				  
                       $imagename[] = time().$file_name;
                    
                }
		/* $file_tmpname1 = $_FILES['upload']['tmp_name'];
        $file_name1 = $_FILES['upload']['name'];
		 //$filepath1 = "/home/ubuntu/infraweb/public/images/".time().$file_name1;
		 $filepath1 = "C:/xampp/htdocs/tatainfra/public/images/".time().$file_name1;
		 $file_name2 = time().$file_name1;
		 move_uploaded_file($file_tmpname1, $filepath1); */
		 /****RC **/
		 $d_vechile_rc_tmpname1 = $_FILES['d_vechile_rc']['tmp_name'];
        $d_vechile_rc_name = $_FILES['d_vechile_rc']['name'];
		 //$d_vechile_rc_path = "/home/ubuntu/infraweb/public/images/".time().$d_vechile_rc_name;
		 $d_vechile_rc_path = "C:/xampp/htdocs/tatainfra/public/images/".time().$d_vechile_rc_name;
		 $d_vechile_rc = time().$d_vechile_rc_name;
		 move_uploaded_file($d_vechile_rc_tmpname1, $d_vechile_rc_path);
		 /**insurance*/
		$d_insurance_tmpname1 = $_FILES['d_insurance']['tmp_name'];
        $d_insurance_name = $_FILES['d_insurance']['name'];
		// $d_insurance_path = "/home/ubuntu/infraweb/public/images/".time().$d_insurance_name;
		 $d_insurance_path = "C:/xampp/htdocs/tatainfra/public/images/".time().$d_insurance_name;
		 $d_insurance = time().$d_insurance_name;
		 move_uploaded_file($d_insurance_tmpname1, $d_insurance_path);
		 /**road tax*/
		 $d_road_tax_tmpname1 = $_FILES['d_road_tax']['tmp_name'];
        $d_road_tax_name = $_FILES['d_road_tax']['name'];
		// $d_road_tax_path = "/home/ubuntu/infraweb/public/images/".time().$d_road_tax_name;
		 $d_road_tax_path = "C:/xampp/htdocs/tatainfra/public/images/".time().$d_road_tax_name;
		 $d_road_tax = time().$d_road_tax_name;
		 move_uploaded_file($d_road_tax_tmpname1, $d_road_tax_path);
		 /***road permit**/
		 $d_road_permit_tmpname1 = $_FILES['d_road_permit']['tmp_name'];
         $d_road_permit_name = $_FILES['d_road_permit']['name'];
		// $d_road_permit_name_path = "/home/ubuntu/infraweb/public/images/".time().$d_road_permit_name;
		 $d_road_permit_name_path = "C:/xampp/htdocs/tatainfra/public/images/".time().$d_road_permit_name;
		 $d_road_permit = time().$d_road_permit_name;
		 move_uploaded_file($d_road_permit_tmpname1, $d_road_permit_name_path);
		 /*****fitness******/
		  $d_fitness_tmpname1 = $_FILES['d_fitness']['tmp_name'];
         $d_fitness_name = $_FILES['d_fitness']['name'];
		// $d_fitness_name_path = "/home/ubuntu/infraweb/public/images/".time().$d_fitness_name;
		 $d_fitness_name_path = "C:/xampp/htdocs/tatainfra/public/images/".time().$d_fitness_name;
		 $d_fitness = time().$d_fitness_name;
		 move_uploaded_file($d_fitness_tmpname1, $d_fitness_name_path);
		 /**********/
		$values_details = array(
		"ve_id"=>$id,
		"rc_no"=>$request->input('rc_no'),
		"rc_end_date"=>$request->input('rc_end_date'),
		"ins_no"=>$request->input('ins_no'),
		"ins_end_date"=>$request->input('ins_end_date'),
		"tax_no"=>$request->input('tax_no'),
		"tax_end_date"=>$request->input('tax_end_date'),
		"permit_end_date"=>$request->input('permit_end_date'),
		"permit_no"=>$request->input('permit_no'),
		"fitness_end_date"=>$request->input('fitness_end_date'),
		"fitness_no"=>$request->input('fitness_no'),
		"ve_images"=>json_encode($imagename),
		"ve_vehicle_rc"=>$d_vechile_rc,
		"ve_insurance"=>$d_insurance,
		"ve_road_tax"=>$d_road_tax,
		"ve_road_permit"=>$d_road_permit,
		"ve_fitness"=>$d_fitness,
		);
		
	
		
        vendorequipmendetails::create($values_details);
		
		
		$bankname = $request->input('bank_name');
		$bank_location = $request->input('bank_location');
		if($bankname){
		$loan_details = array(
								"ve_id"=>$id,
								"bank_name"=>$bankname,
								"bank_location"=>$bank_location,
								"total_loan_amount"=>$request->input('total_loan_amount'),
								"total_loan_amount_type"=>$request->input('total_loan_amount_type'),
								"loan_period"=>$request->input('loan_period'),
								"loan_start_date"=>$request->input('loan_start_date'),
								"loan_end_date"=>$request->input('loan_end_date'),
								"emi_amount"=>$request->input('emi_amount'),
								"emi_amount_type"=>$request->input('emi_amount_type'),
								"emi_last_date"=>$request->input('emi_last_date'),
				);
	
	 vendorequipment_loan::create($loan_details);
		}

        return redirect('/vendorequipment')->with('status', 'You have successfully added!');;
    }
     public function rentstore(Request $request)
    {
		
		if ( vendorequipment::where('ve_vehicle_number', '=', $request->ve_vehicle_number)->exists()) {

               return Redirect()->back()->withInput()->with('error', 'This Vehicle No exist !');
			}	
		    ini_set('memory_limit','256M');
         $validatedData = $request->validate([  
            've_product_type' => 'required', 
            've_equipment_type' => 'required',
            've_brand' => 'required',
            've_year' => 'required',
            've_model' => 'required',
            've_type_of_work' => 'required',
         
        ],[], 
		[
			've_product_type' => 'product type', 
			've_equipment_type' => 'Equipment type', 
			've_brand' => 'Brand', 
			've_year' => 'Year', 
			've_model' => 'Model', 
			've_type_of_work' => 'Type of work', 
		 
		]
			);
		//$values = $request->except('url');
		$values = array(
		
		"ve_product_type"=> $request->input('ve_product_type'),
		"ve_equipment_type"=> $request->input('ve_equipment_type'),
		"ve_brand"=> $request->input('ve_brand'),
		"ve_year"=> $request->input('ve_year'),
		"ve_model"=> $request->input('ve_model'),
		"ve_capacity"=> $request->input('ve_capacity'),
		"ve_type_of_work"=> $request->input('ve_type_of_work'),
		"ve_vehicle_number"=> $request->input('ve_vehicle_number'),
		"ve_expected_mileage"=> $request->input('ve_expected_mileage'),
		"ve_vehicle_code"=> $request->input('ve_vehicle_code'),
		"serivce_to_be_done_for_every"=> $request->input('serivce_to_be_done_for_every'),
		"service_metric_km_hours"=> $request->input('service_metric_km_hours'),
		"service_to_be_done_for_every_xDays"=> $request->input('service_to_be_done_for_every_xDays'),
		"last_serviced_at"=> $request->input('last_serviced_at'),
		"serviced_at_km_hours"=> $request->input('serviced_at_km_hours'),
		"last_serviced_at_date"=> $request->input('last_serviced_at_date'),
		"loan_taken"=> $request->input('loan_taken'),
		"ve_vendor_id"=> $request->input('ve_vendor_id'),
		"project_id"=>$request->input('project_id'),
		"clinet_id"=>$request->input('client_id'),
		
		);
        $id = vendorequipment::create($values)->id;
		
			foreach ($_FILES['image']['tmp_name'] as $key => $value) {
              
            $file_tmpname = $_FILES['image']['tmp_name'][$key];
            $file_name = $_FILES['image']['name'][$key];
   
           // $filepath = "/home/ubuntu/infraweb/public/images/".time().$file_name;
            $filepath = "C:/xampp/htdocs/tatainfra/public/images/".time().$file_name;
  
                  move_uploaded_file($file_tmpname, $filepath);
				  
                       $imagename[] = time().$file_name;
                    
                }
		 $file_tmpname1 = $_FILES['upload']['tmp_name'];
        $file_name1 = $_FILES['upload']['name'];
		 //$filepath1 = "/home/ubuntu/infraweb/public/images/".time().$file_name1;
		 $filepath1 = "C:/xampp/htdocs/tatainfra/public/images/".time().$file_name1;
		 $file_name2 = time().$file_name1;
		 move_uploaded_file($file_tmpname1, $filepath1); 
		 /****RC **/
		 $d_vechile_rc_tmpname1 = $_FILES['d_vechile_rc']['tmp_name'];
        $d_vechile_rc_name = $_FILES['d_vechile_rc']['name'];
		 //$d_vechile_rc_path = "/home/ubuntu/infraweb/public/images/".time().$d_vechile_rc_name;
		 $d_vechile_rc_path = "C:/xampp/htdocs/tatainfra/public/images/".time().$d_vechile_rc_name;
		 $d_vechile_rc = time().$d_vechile_rc_name;
		 move_uploaded_file($d_vechile_rc_tmpname1, $d_vechile_rc_path);
		 /**insurance*/
		$d_insurance_tmpname1 = $_FILES['d_insurance']['tmp_name'];
        $d_insurance_name = $_FILES['d_insurance']['name'];
		// $d_insurance_path = "/home/ubuntu/infraweb/public/images/".time().$d_insurance_name;
		 $d_insurance_path = "C:/xampp/htdocs/tatainfra/public/images/".time().$d_insurance_name;
		 $d_insurance = time().$d_insurance_name;
		 move_uploaded_file($d_insurance_tmpname1, $d_insurance_path);
		 /**road tax*/
		 $d_road_tax_tmpname1 = $_FILES['d_road_tax']['tmp_name'];
        $d_road_tax_name = $_FILES['d_road_tax']['name'];
		// $d_road_tax_path = "/home/ubuntu/infraweb/public/images/".time().$d_road_tax_name;
		 $d_road_tax_path = "C:/xampp/htdocs/tatainfra/public/images/".time().$d_road_tax_name;
		 $d_road_tax = time().$d_road_tax_name;
		 move_uploaded_file($d_road_tax_tmpname1, $d_road_tax_path);
		 /***road permit**/
		 $d_road_permit_tmpname1 = $_FILES['d_road_permit']['tmp_name'];
         $d_road_permit_name = $_FILES['d_road_permit']['name'];
		// $d_road_permit_name_path = "/home/ubuntu/infraweb/public/images/".time().$d_road_permit_name;
		 $d_road_permit_name_path = "C:/xampp/htdocs/tatainfra/public/images/".time().$d_road_permit_name;
		 $d_road_permit = time().$d_road_permit_name;
		 move_uploaded_file($d_road_permit_tmpname1, $d_road_permit_name_path);
		 /*****fitness******/
		  $d_fitness_tmpname1 = $_FILES['d_fitness']['tmp_name'];
         $d_fitness_name = $_FILES['d_fitness']['name'];
		// $d_fitness_name_path = "/home/ubuntu/infraweb/public/images/".time().$d_fitness_name;
		 $d_fitness_name_path = "C:/xampp/htdocs/tatainfra/public/images/".time().$d_fitness_name;
		 $d_fitness = time().$d_fitness_name;
		 move_uploaded_file($d_fitness_tmpname1, $d_fitness_name_path);
		 /**********/
		 /*
			remove things:
					"client_state"=>$request->input('client_state'),
					"client_city"=>$request->input('client_city'),
		 */
		$values_details = array(
		"ve_id"=>$id,
		"ve_rental_start_date"=>$request->input('ve_rental_start_date'),
		"ve_rental_end_date"=>$request->input('ve_rental_end_date'),
		"ve_noofdays"=>$request->input('ve_noofdays'),
		"e_wom"=>$request->input('e_wom'),
		"ve_rental_cost"=>$request->input('ve_rental_cost'),
		"gst"=>$request->input('gst'),
		"gstpercentage"=>$request->input('gstpercentage'),
		"ve_billing_cycle"=>$request->input('ve_billing_cycle'),
		"mobilization"=>$request->input('mobilization'),
		"mobilization_price"=>$request->input('mobilization_price'),
		"rc_no"=>$request->input('rc_no'),
		"rc_end_date"=>$request->input('rc_end_date'),
		"ins_no"=>$request->input('ins_no'),
		"ins_end_date"=>$request->input('ins_end_date'),
		"tax_no"=>$request->input('tax_no'),
		"tax_end_date"=>$request->input('tax_end_date'),
		"permit_end_date"=>$request->input('permit_end_date'),
		"permit_no"=>$request->input('permit_no'),
		"fitness_end_date"=>$request->input('fitness_end_date'),
		"fitness_no"=>$request->input('fitness_no'),
		"project_id"=>$request->input('project_id'),
		"project_name"=>$request->input('project_name'),
		"project_state"=>$request->input('project_state'),
		"project_city"=>$request->input('project_city'),
		"project_address"=>$request->input('project_address'),
		"client_name"=>$request->input('client_name'),
		"client_designation"=>$request->input('client_designation'),
		"client_phoneno"=>$request->input('client_phoneno'),
		"client_emailid"=>$request->input('client_emailid'),
		"ve_images"=>json_encode($imagename),
		"ve_vehicle_rc"=>$d_vechile_rc,
		"ve_insurance"=>$d_insurance,
		"ve_road_tax"=>$d_road_tax,
		"ve_road_permit"=>$d_road_permit,
		"ve_fitness"=>$d_fitness,
		"upload_rental_contract"=>$file_name2,
		);
		
	//dd($values_details);
		
        vendorequipmendetails::create($values_details);
		
		$clientcontactdetails = array(
		"ve_id"=>$id,
		"ve_rental_start_date"=>$request->input('ve_rental_start_date'),
		"ve_rental_end_date"=>$request->input('ve_rental_end_date'),
		"ve_noofdays"=>$request->input('ve_noofdays'),
		"e_wom"=>$request->input('e_wom'),
		"ve_rental_cost"=>$request->input('ve_rental_cost'),
		"gst"=>$request->input('gst'),
		"gstpercentage"=>$request->input('gstpercentage'),
		"ve_billing_cycle"=>$request->input('ve_billing_cycle'),
		"mobilization"=>$request->input('mobilization'),
		"mobilization_price"=>$request->input('mobilization_price'),
		"project_id"=>$request->input('project_id'),
		"project_name"=>$request->input('project_name'),
		"project_state"=>$request->input('project_state'),
		"project_city"=>$request->input('project_city'),
		"project_address"=>$request->input('project_address'),
		"client_name"=>$request->input('client_name'),
		"client_designation"=>$request->input('client_designation'),
		"client_phoneno"=>$request->input('client_phoneno'),
		"client_emailid"=>$request->input('client_emailid'),
		"upload_rental_contract"=>$file_name2,
		);
		
		clientcontactdetails::create($clientcontactdetails);
		
		$bank_name = $request->input('bank_name');
		if($bank_name){
		
		$loan_details = array(
								"ve_id"=>$id,
								"bank_name"=>$request->input('bank_name'),
								"bank_location"=>$request->input('bank_location'),
								"total_loan_amount"=>$request->input('total_loan_amount'),
								"total_loan_amount_type"=>$request->input('total_loan_amount_type'),
								"loan_period"=>$request->input('loan_period'),
								"loan_start_date"=>$request->input('loan_start_date'),
								"loan_end_date"=>$request->input('loan_end_date'),
								"emi_amount"=>$request->input('emi_amount'),
								"emi_amount_type"=>$request->input('emi_amount_type'),
								"emi_last_date"=>$request->input('emi_last_date'),
				);
	
	 vendorequipment_loan::create($loan_details);
		}

        return redirect('/vendorequipment');
    }
	public function arentstore(Request $request){
			
			
					$file_tmpname1 = $_FILES['upload']['tmp_name'];
					$file_name1 = $_FILES['upload']['name'];
					//$filepath1 = "/home/ubuntu/infraweb/public/images/".time().$file_name1;
					$filepath1 = "C:/xampp/htdocs/tatainfra/public/images/".time().$file_name1;
					$file_name2 = time().$file_name1;
		 move_uploaded_file($file_tmpname1, $filepath1); 
					$clientcontactdetails = array(
													"ve_id"=>$request->input('ve_id'),
													"ve_rental_start_date"=>$request->input('ve_rental_start_date'),
													"ve_rental_end_date"=>$request->input('ve_rental_end_date'),
													"ve_noofdays"=>$request->input('ve_noofdays'),
													"e_wom"=>$request->input('e_wom'),
													"ve_rental_cost"=>$request->input('ve_rental_cost'),
													"gst"=>$request->input('gst'),
													"gstpercentage"=>$request->input('gstpercentage'),
													"ve_billing_cycle"=>$request->input('ve_billing_cycle'),
													"mobilization"=>$request->input('mobilization'),
													"mobilization_price"=>$request->input('mobilization_price'),
													"project_id"=>$request->input('project_id'),
													"project_name"=>$request->input('project_name'),
													"project_state"=>$request->input('project_state'),
													"project_city"=>$request->input('project_city'),
													"project_address"=>$request->input('project_address'),
													"client_name"=>$request->input('client_name'),
													"client_designation"=>$request->input('client_designation'),
													"client_phoneno"=>$request->input('client_phoneno'),
													"client_emailid"=>$request->input('client_emailid'),
													"upload_rental_contract"=>$file_name2,
												);
		
					clientcontactdetails::create($clientcontactdetails);
					
					
					$id = $request->input('ve_id');
       
		$data = array(
						"ve_product_type"=>'rentout',
		);
		
		DB::table('vendorequipments')
			->where('id', $id)
			->update($data);
			
	$updatedata = array(
													"ve_id"=>$request->input('ve_id'),
													"ve_rental_start_date"=>$request->input('ve_rental_start_date'),
													"ve_rental_end_date"=>$request->input('ve_rental_end_date'),
													"ve_noofdays"=>$request->input('ve_noofdays'),
													"e_wom"=>$request->input('e_wom'),
													"ve_rental_cost"=>$request->input('ve_rental_cost'),
													"gst"=>$request->input('gst'),
													"gstpercentage"=>$request->input('gstpercentage'),
													"gstpercentage"=>$request->input('gstpercentage'),
													"ve_billing_cycle"=>$request->input('ve_billing_cycle'),
													"mobilization"=>$request->input('mobilization'),
													"mobilization_price"=>$request->input('mobilization_price'),
													"project_id"=>$request->input('project_id'),
													"project_name"=>$request->input('project_name'),
													"project_state"=>$request->input('project_state'),
													"project_city"=>$request->input('project_city'),
													"project_address"=>$request->input('project_address'),
													"client_name"=>$request->input('client_name'),
													"client_designation"=>$request->input('client_designation'),
													"client_phoneno"=>$request->input('client_phoneno'),
													"client_emailid"=>$request->input('client_emailid'),
													"upload_rental_contract"=>$file_name2,
												);
				DB::table('vendorequipmendetails')
			->where('ve_id', $id)
			->update($updatedata);	
			
			$equipemnetdata = array(
								"project_id"=>$request->input('project_id'),
								"clinet_id"=>$request->input('client_id'),
			);
				DB::table('vendorequipments')
			->where('id', $id)
			->update($equipemnetdata);	
					
					 return redirect('/vendorequipment')->with('status', "You have successfully add the project and clinet.");
	}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vendorequipment  $vendorequipment
     * @return \Illuminate\Http\Response
     */
    public function show(vendorequipment $vendorequipment)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vendorequipment  $vendorequipment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$projects = DB::table('projects')->get();
		$brands_equipment = DB::table('brands_equipment')->get();
		$project_sites = DB::table('project_sites')->get();
      $equipments = DB::table('vendorequipments')
					->join('vendorequipmendetails', 'vendorequipmendetails.ve_id', '=', 'vendorequipments.id','left')
					->join('vendorequipment_loans', 'vendorequipment_loans.ve_id', '=', 'vendorequipments.id','left')
					->where('vendorequipments.id',$id)
					->select('vendorequipments.*', 'vendorequipmendetails.*', 'vendorequipment_loans.*','vendorequipments.id as main_id')
					->get();
					$equipment = $equipments[0];
				//dd($equipment); 
			$states = DB::table('states')->get();
        return view('vendoradmin.edit', compact('project_sites','brands_equipment','projects','equipment','equipments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vendorequipment  $vendorequipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vendorequipment $vendorequipment)
    {
		$main_id = $request->input('main_id');
		$equipments = DB::table('vendorequipments')
					->join('vendorequipmendetails', 'vendorequipmendetails.ve_id', '=', 'vendorequipments.ve_id','left')
					->join('vendorequipment_loans', 'vendorequipment_loans.ve_id', '=', 'vendorequipments.ve_id','left')
					->where('vendorequipments.ve_id',$main_id)
					->select('vendorequipments.*', 'vendorequipmendetails.*', 'vendorequipment_loans.*','vendorequipments.ve_id as main_id')
					->get();
					$equipment = $equipments[0];
		
		//dd($equipment);
        ini_set('memory_limit','256M');
         $validatedData = $request->validate([  
            've_product_type' => 'required', 
            've_equipment_type' => 'required',
            've_brand' => 'required',
            've_year' => 'required',
            've_model' => 'required',
            've_capacity' => 'required',
            've_type_of_work' => 'required',
            've_vehicle_number' => 'required',
            've_expected_mileage' => 'required',
         
        ],[], 
		[
			've_product_type' => 'product type', 
			've_equipment_type' => 'Equipment type', 
			've_brand' => 'Brand', 
			've_year' => 'Year', 
			've_model' => 'Model', 
			've_capacity' => 'Capacity', 
			've_type_of_work' => 'Type of work', 
			've_vehicle_number' => 'vehicle number', 
			've_expected_mileage' => 'expected mileage', 
		 
		]
			);
		//$values = $request->except('url');
		$values = array(
		
		"ve_product_type"=> $request->input('ve_product_type'),
		"ve_equipment_type"=> $request->input('ve_equipment_type'),
		"ve_brand"=> $request->input('ve_brand'),
		"ve_year"=> $request->input('ve_year'),
		"ve_model"=> $request->input('ve_model'),
		"ve_capacity"=> $request->input('ve_capacity'),
		"ve_type_of_work"=> $request->input('ve_type_of_work'),
		"ve_vehicle_number"=> $request->input('ve_vehicle_number'),
		"ve_expected_mileage"=> $request->input('ve_expected_mileage'),
		"ve_vehicle_code"=> $request->input('ve_vehicle_code'),
		"service_details_at"=> $request->input('service_details_at'),
		"service_details_at_type"=> $request->input('service_details_at_type'),
		"service_details_days"=> $request->input('service_details_days'),
		"last_serviced_at"=> $request->input('last_serviced_at'),
		"last_serviced_at_type"=> $request->input('last_serviced_at_type'),
		"last_serviced_at_date"=> $request->input('last_serviced_at_date'),
		"loan_taken"=> $request->input('loan_taken'),
		"ve_vendor_id"=> $request->input('ve_vendor_id'),
		
		);
        //$id = vendorequipment::create($values)->id;
		
		
		DB::table('vendorequipments')
			->where('ve_id', $main_id)
			->update($values);
		
			/* foreach ($_FILES['image']['tmp_name'] as $key => $value) {
              
            $file_tmpname = $_FILES['image']['tmp_name'][$key];
            $file_name = $_FILES['image']['name'][$key];
   
           // $filepath = "/home/ubuntu/infraweb/public/images/".time().$file_name;
            $filepath = "C:/xampp/htdocs/tatainfra/public/images/".time().$file_name;
  
                  move_uploaded_file($file_tmpname, $filepath);
				  
                       $imagename[] = time().$file_name;
                    
                } */
		if($_FILES['upload']['tmp_name']){
		 $file_tmpname1 = $_FILES['upload']['tmp_name'];
        $file_name1 = $_FILES['upload']['name'];
		 //$filepath1 = "/home/ubuntu/infraweb/public/images/".time().$file_name1;
		 $filepath1 = "C:/xampp/htdocs/tatainfra/public/images/".time().$file_name1;
		 $file_name2 = time().$file_name1;
		 move_uploaded_file($file_tmpname1, $filepath1); 
		}else{
		$file_name2 =	$equipment->upload_rental_contract;
		}
		 /****RC **/
		 if($_FILES['d_vechile_rc']['tmp_name']){
		 $d_vechile_rc_tmpname1 = $_FILES['d_vechile_rc']['tmp_name'];
        $d_vechile_rc_name = $_FILES['d_vechile_rc']['name'];
		 //$d_vechile_rc_path = "/home/ubuntu/infraweb/public/images/".time().$d_vechile_rc_name;
		 $d_vechile_rc_path = "C:/xampp/htdocs/tatainfra/public/images/".time().$d_vechile_rc_name;
		 $d_vechile_rc = time().$d_vechile_rc_name;
		 move_uploaded_file($d_vechile_rc_tmpname1, $d_vechile_rc_path);
		 }else{
			$d_vechile_rc =	$equipment->ve_vehicle_rc; 
		 }
		 /**insurance*/
		 if($_FILES['d_insurance']['tmp_name']){
		$d_insurance_tmpname1 = $_FILES['d_insurance']['tmp_name'];
        $d_insurance_name = $_FILES['d_insurance']['name'];
		// $d_insurance_path = "/home/ubuntu/infraweb/public/images/".time().$d_insurance_name;
		 $d_insurance_path = "C:/xampp/htdocs/tatainfra/public/images/".time().$d_insurance_name;
		 $d_insurance = time().$d_insurance_name;
		 move_uploaded_file($d_insurance_tmpname1, $d_insurance_path);
		 }else{
			 $d_insurance =	$equipment->ve_insurance; 
		 }
		 /**road tax*/
		 if($_FILES['d_road_tax']['tmp_name']){
		 $d_road_tax_tmpname1 = $_FILES['d_road_tax']['tmp_name'];
        $d_road_tax_name = $_FILES['d_road_tax']['name'];
		// $d_road_tax_path = "/home/ubuntu/infraweb/public/images/".time().$d_road_tax_name;
		 $d_road_tax_path = "C:/xampp/htdocs/tatainfra/public/images/".time().$d_road_tax_name;
		 $d_road_tax = time().$d_road_tax_name;
		 move_uploaded_file($d_road_tax_tmpname1, $d_road_tax_path);
		 }else{
			  $d_road_tax =	$equipment->ve_road_tax;
		 }
		 /***road permit**/
		 if($_FILES['d_road_permit']['tmp_name']){
		 $d_road_permit_tmpname1 = $_FILES['d_road_permit']['tmp_name'];
         $d_road_permit_name = $_FILES['d_road_permit']['name'];
		// $d_road_permit_name_path = "/home/ubuntu/infraweb/public/images/".time().$d_road_permit_name;
		 $d_road_permit_name_path = "C:/xampp/htdocs/tatainfra/public/images/".time().$d_road_permit_name;
		 $d_road_permit = time().$d_road_permit_name;
		 move_uploaded_file($d_road_permit_tmpname1, $d_road_permit_name_path);
		 }else{
			 $d_road_permit =	$equipment->ve_road_permit; 
		 }
		 /*****fitness******/
		 if($_FILES['d_fitness']['tmp_name']){
		  $d_fitness_tmpname1 = $_FILES['d_fitness']['tmp_name'];
         $d_fitness_name = $_FILES['d_fitness']['name'];
		// $d_fitness_name_path = "/home/ubuntu/infraweb/public/images/".time().$d_fitness_name;
		 $d_fitness_name_path = "C:/xampp/htdocs/tatainfra/public/images/".time().$d_fitness_name;
		 $d_fitness = time().$d_fitness_name;
		 move_uploaded_file($d_fitness_tmpname1, $d_fitness_name_path);
		 }else{
			 $d_fitness =	$equipment->ve_fitness;
		 }
		 /**********/
		$values_details = array(
		"ve_rental_start_date"=>$request->input('ve_rental_start_date'),
		"ve_rental_end_date"=>$request->input('ve_rental_end_date'),
		"ve_noofdays"=>$request->input('ve_noofdays'),
		"ve_rental_cost"=>$request->input('ve_rental_cost'),
		"ve_billing_cycle"=>$request->input('ve_billing_cycle'),
		"rc_start_date"=>$request->input('rc_start_date'),
		"rc_end_date"=>$request->input('rc_end_date'),
		"ins_start_date"=>$request->input('ins_start_date'),
		"ins_end_date"=>$request->input('ins_end_date'),
		"tax_start_date"=>$request->input('tax_start_date'),
		"tax_end_date"=>$request->input('tax_end_date'),
		"permit_end_date"=>$request->input('permit_end_date'),
		"permit_start_date"=>$request->input('permit_start_date'),
		"fitness_end_date"=>$request->input('fitness_end_date'),
		"fitness_start_date"=>$request->input('fitness_start_date'),
		"project_name"=>$request->input('project_name'),
		"project_state"=>$request->input('project_state'),
		"project_city"=>$request->input('project_city'),
		"project_address"=>$request->input('project_address'),
		"client_name"=>$request->input('client_name'),
		"client_designation"=>$request->input('client_designation'),
		"client_phoneno"=>$request->input('client_phoneno'),
		"client_emailid"=>$request->input('client_emailid'),
		"client_state"=>$request->input('client_state'),
		"client_city"=>$request->input('client_city'),
		//"ve_images"=>json_encode($imagename),
		"ve_vehicle_rc"=>$d_vechile_rc,
		"ve_insurance"=>$d_insurance,
		"ve_road_tax"=>$d_road_tax,
		"ve_road_permit"=>$d_road_permit,
		"ve_fitness"=>$d_fitness,
		"upload_rental_contract"=>$file_name2,
		);
		
	
		
       // vendorequipmendetails::create($values_details);
			DB::table('vendorequipmendetails')
			->where('ve_id', $main_id)
			->update($values_details);
		
		
		
		$loan_details = array(
								"bank_name"=>$request->input('bank_name'),
								"bank_location"=>$request->input('bank_location'),
								"total_loan_amount"=>$request->input('total_loan_amount'),
								"total_loan_amount_type"=>$request->input('total_loan_amount_type'),
								"loan_period"=>$request->input('loan_period'),
								"loan_start_date"=>$request->input('loan_start_date'),
								"loan_end_date"=>$request->input('loan_end_date'),
								"emi_amount"=>$request->input('emi_amount'),
								"emi_amount_type"=>$request->input('emi_amount_type'),
								"emi_last_date"=>$request->input('emi_last_date'),
				);
	DB::table('vendorequipment_loans')
			->where('ve_id', $main_id)
			->update($loan_details);

        return redirect('/vendorequipment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vendorequipment  $vendorequipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(vendorequipment $vendorequipment)
    {
        //
    }
	public function equipment_vendor_detailview($id){
	 	

		//$equipments = DB::table('equipments')->get();
		$month = date('m');
		$date = date('d');
		
		
	 	$equipments_details = DB::table('vendorequipments')->where('id', $id)->get();
		
		
	 	$equipment_operators = DB::table('equipment_operators')->where(array('ve_id'=> $id,"status"=>1))->get();
	 	$equipment_operators_history = DB::table('equipment_operators')->where(array('ve_id'=> $id,"status"=>2))->get();
		
		//dd($equipments_details);
		$spares = DB::table('spares')->where('equ_id', $id)->get();
		$dprdetails = DB::table('dprdetails')->where('e_id', $id)   ->where(DB::raw('month(date)'),"=",$month)   ->get();
//	dd($dprdetails);
	
		$singleday = DB::table('dprdetails')->where('e_id', $id)->where(DB::raw('day(date)'),"=",$date)->where(DB::raw('month(date)'),"=",$month)->first();
		 


		$sparecategory = DB::table('spare_categories')
					->select('spare_category',DB::raw('COUNT(spare_category) as count'))
					->groupBy('spare_category')
					->get();
					
					
					

		 $equipments = DB::table('vendorequipments')
					->join('subcategories', 'subcategories.id', '=', 'vendorequipments.ve_equipment_type','left')
					->join('vendorequipmendetails', 'vendorequipmendetails.ve_id', '=', 'vendorequipments.id','left')
					->join('vendorequipment_loans', 'vendorequipment_loans.ve_id', '=', 'vendorequipments.id','left')
					->join('vendorclients', 'vendorclients.id', '=', 'vendorequipments.clinet_id','left')
					->where('vendorequipments.id',$id)
					->select('vendorequipments.*', 'vendorequipmendetails.*', 'vendorequipment_loans.*','vendorequipments.id as main_id','subcategories.sub_category_name','vendorclients.name as client_name')
					->get();
			  /*echo "<pre>";
			print_r($date);
			print_r($singleday);
			die();   
			 foreach($equipments as $key=>$equipmentsdata){
				$equipments = DB::table('equipments')
				->select('equipments.*', 'projects.*', 'vendors.*')
					->where('equipments.e_id', $id)
					->get();
					$equipments[$key][$equipments];
			} */

			$equipment = $equipments[0];
			// print_r(DB::getQueryLog());
			//dd($equipment);
			$equipment_details = $equipment;
			//dd($equipment_details);
			
			$first_day_this_month = date('Y-m-01'); // hard-coded '01' for first day
			$last_day_this_month  = date('Y-m-t');
			
			
			$equipmentdalycheckups = DB::table('equipmentdalycheckups')->where('equ_id', $id) -> where(DB::raw('day(created_at)'),"=",$date)  ->get();

				
		
			$averagedalycheckupscount = DB::table('equipmentdalycheckups')
										->where(['equ_id'=> $id,'equipment_status'=>'average'])
										->whereBetween('equipmentdalycheckups.created_at', [$first_day_this_month,$last_day_this_month])
										->get()->count();
		if($averagedalycheckupscount==0){
			$averagedalycheckupscount=0;
		}
		$gooddalycheckupscount = DB::table('equipmentdalycheckups')
								->where(['equ_id'=> $id,'equipment_status'=>'good']) 
								->whereBetween('equipmentdalycheckups.created_at', [$first_day_this_month, $last_day_this_month])
								->get()->count();
		if($gooddalycheckupscount==""){
			$gooddalycheckupscount = 0;
		}
		//DB::enableQueryLog();
		$criticaldalycheckupscount = DB::table('equipmentdalycheckups')
									->where(['equ_id'=> $id,'equipment_status'=>'critical'])
									->whereBetween('equipmentdalycheckups.created_at', [$first_day_this_month, $last_day_this_month])
									->get()->count();
		//	print_r(DB::getQueryLog());
		if($criticaldalycheckupscount==""){
			$criticaldalycheckupscount=0;
		}
			 $admin_user_id = auth()->user()->id;
		 $servicecheckups = \DB::table('servicecheckups')->where(['user_id'=>$admin_user_id,'equ_id'=>$id])
						->get();
			
			
			/* $admin_user_id = auth()->user()->id;
		 $servicecheckups = \DB::table('servicecheckups')->where(['user_id'=>$admin_user_id,'equ_id'=>$id])
						->get(); */
		$servicecheckupsdata= $servicecheckups;
		
		$projectlist = \DB::table('clientcontactdetails')
								->select(DB::raw(' id,project_name as title, ve_rental_start_date as start, ve_rental_end_date as end,ve_noofdays,ve_rental_cost'))
								->where(['ve_id'=>$id])
								->get();
		//dd($equipment);
		 $listofinvoice = \DB::table('invoices')->where(['equipment_id'=>$id])
						->get();
			
        return view('vendoradmin/equipment_vendor_detailview', compact('equipment_operators_history','equipment_operators','equipment','singleday','equipment_details','spares','dprdetails','sparecategory','averagedalycheckupscount','gooddalycheckupscount','criticaldalycheckupscount','equipmentdalycheckups','servicecheckups','servicecheckupsdata','projectlist','listofinvoice'));
	}
	
	
	public function operatordelete($id){
		 $date = date('Y-m-d H:i:s');
		
		$operatordelete = array(
								"status"=>2,
								"operator_delete_date"=>$date,
				);
	DB::table('equipment_operators')
			->where('operator_id', $id)
			->update($operatordelete);
		  return redirect()->back();
	}
	
	  public function operatorsave(Request $request)
    {
		    ini_set('memory_limit','256M');
			/****profile image****/
		 $file_tmpname1 = $_FILES['operator_image']['tmp_name'];
       $file_name1 = $_FILES['operator_image']['name'];
	  
		 //$filepath1 = "/home/ubuntu/infraweb/public/images/".time().$file_name1;
		 $filepath1 = "C:/xampp/htdocs/tatainfra/public/images/".time().$file_name1;
		 $operator_image = time().$file_name1;
		 move_uploaded_file($file_tmpname1, $filepath1); 
		 /****RC **/
		 $operator_licence = $_FILES['operator_licence']['tmp_name'];
        $operator_licence_name = $_FILES['operator_licence']['name'];
		 //$d_vechile_rc_path = "/home/ubuntu/infraweb/public/images/".time().$d_vechile_rc_name;
		 $operator_licence_path = "C:/xampp/htdocs/tatainfra/public/images/".time().$operator_licence_name;
		 $operator_licence_s = time().$operator_licence_name;
		 move_uploaded_file($operator_licence, $operator_licence_path);
		
		 /**********/
		 $date = date('Y-m-d H:i:s');
		$values_details = array(
		"ve_id"=>$request->input('ve_id'),
		"operator_name"=>$request->input('operator_name'),
		"operator_phone"=>$request->input('operator_phone'),
		"operator_city"=>$request->input('operator_city'),
		"operator_address"=>$request->input('operator_address'),
		"operator_added_date"=> $date,
		"operator_image"=>$operator_image,
		"operator_licence"=>$operator_licence_s,
		);
		
	
		
        equipment_operator::create($values_details);
		
		

       return redirect()->back();
    }
	
	
	
	
	
	
	
	  public function userstore(Request $request)
    {	
	
		if ( User::where('primary_mobile', '=', $request->user_phone)->exists()) {

               return Redirect()->back()->withInput()->with('error', 'This mobile No exist !');
			}
		if ( User::where('email', '=', $request->user_email)->exists()) {

               return Redirect()->back()->withInput()->with('error', 'This email id exist !');
			}else{	
		//$password = bcrypt($request->input('user_password'));
		$password = Hash::make($request->input('user_password'));
		$loan_details = array(
								
								"admin_user_id"=>$request->input('ve_vendor_id'),
								"role"=>$request->input('role_type'),
								"name"=>$request->input('user_name'),
								"primary_mobile"=>$request->input('user_phone'),
								"email"=>$request->input('user_email'),
								"password"=>$password,
				);
	//dd($loan_details);
	DB::table('users')->insert($loan_details);

        return redirect('/vendorequipment/userlist');
			}
    }
	public function operator_equipment_detailview($id){
	 	

		//$equipments = DB::table('equipments')->get();
		$month = date('m');
		$date = date('d');
		
		
	 	$equipments_details = DB::table('equipments_details')->where('e_id', $id)->get();
		
		
	 	$equipment_operators = DB::table('equipment_operators')->where(array('ve_id'=> $id,"status"=>1))->get();
	 	$equipment_operators_history = DB::table('equipment_operators')->where(array('ve_id'=> $id,"status"=>2))->get();
		
		//dd($equipment_operators);
		$spares = DB::table('spares')->where('equ_id', $id)->get();
		$dprdetails = DB::table('dprdetails')->where('e_id', $id)   ->where(DB::raw('month(date)'),"=",$month)   ->get();
	
	
		$singleday = DB::table('dprdetails')->where('e_id', $id)->where(DB::raw('day(date)'),"=",$date)->where(DB::raw('month(date)'),"=",$month)->first();
		 


		$sparecategory = DB::table('spare_categories')
					->select('spare_category',DB::raw('COUNT(spare_category) as count'))
					->groupBy('spare_category')
					->get();
					
					
					
DB::enableQueryLog();
		 $equipments = DB::table('vendorequipments')
					->join('vendorequipmendetails', 'vendorequipmendetails.ve_id', '=', 'vendorequipments.id','left')
					->join('vendorequipment_loans', 'vendorequipment_loans.ve_id', '=', 'vendorequipments.id','left')
					->where('vendorequipments.id',$id)
					->select('vendorequipments.*', 'vendorequipmendetails.*', 'vendorequipment_loans.*','vendorequipments.id as main_id')
					->get();
			  /*echo "<pre>";
			print_r($date);
			print_r($singleday);
			die();   
			 foreach($equipments as $key=>$equipmentsdata){
				$equipments = DB::table('equipments')
				->select('equipments.*', 'projects.*', 'vendors.*')
					->where('equipments.e_id', $id)
					->get();
					$equipments[$key][$equipments];
			} */

			$equipment = $equipments[0];
			// print_r(DB::getQueryLog());
			//dd($equipment);
			$equipment_details = $equipments_details[0];
			//dd($equipment_details);
        return view('operator/operator_equipment_detailview', compact('equipment_operators_history','equipment_operators','equipment','singleday','equipment_details','spares','dprdetails','sparecategory'));
	}
	
	
	 public function uploadlogsheet(Request $request)
    {
		    ini_set('memory_limit','256M');
			$equipment_id = $request->get('equipment_id');
			/****log sheet morning image****/
		 $file_tmpname1 = $_FILES['logsheetmorning']['tmp_name'];
       $file_name1 = $_FILES['logsheetmorning']['name'];
	  
		 //$filepath1 = "/home/ubuntu/infraweb/public/images/".time().$file_name1;
		 $filepath1 = "C:/xampp/htdocs/tatainfra/public/images/".time().$file_name1;
		 $logsheetmorning = time().$file_name1;
		 move_uploaded_file($file_tmpname1, $filepath1); 
		
		
		 /**********/
		 $updateDetails = ['logsheet_morning' => $logsheetmorning];  
		DB::table('dprdetails')
						->where('dpr_id', $request->get('dpr_id'))
						->update($updateDetails); 

        return redirect('/vendorequipment/operator_equipment_detailview/'.$equipment_id);
    }
	public function uploadlogsheetevening(Request $request)
    {
		    ini_set('memory_limit','256M');
			$equipment_id = $request->get('equipment_id');
			/****log sheet morning image****/
		 $file_tmpname1 = $_FILES['logsheetevening']['tmp_name'];
       $file_name1 = $_FILES['logsheetevening']['name'];
	  
		 //$filepath1 = "/home/ubuntu/infraweb/public/images/".time().$file_name1;
		 $filepath1 = "C:/xampp/htdocs/tatainfra/public/images/".time().$file_name1;
		 $logsheetevening = time().$file_name1;
		 move_uploaded_file($file_tmpname1, $filepath1); 
		
		
		 /**********/
		 $updateDetails = ['logsheet_evening' => $logsheetevening];  
		DB::table('dprdetails')
						->where('dpr_id', $request->get('dpr_id'))
						->update($updateDetails); 

        return redirect('/vendorequipment/operator_equipment_detailview/'.$equipment_id);
    }
	
	
	public function equipment_technician_detailview($id){
	 	$id = base64_decode($id);
//$equipments = DB::table('equipments')->get();
		$month = date('m');
		$date = date('d');
		
		
	 	$equipments_details = DB::table('equipments_details')->where('e_id', $id)->get();
		
		
	 	$equipment_operators = DB::table('equipment_operators')->where(array('ve_id'=> $id,"status"=>1))->get();
	 	$equipment_operators_history = DB::table('equipment_operators')->where(array('ve_id'=> $id,"status"=>2))->get();
		
		//dd($equipment_operators);
		$spares = DB::table('spares')->where('equ_id', $id)->get();
		$dprdetails = DB::table('dprdetails')->where('e_id', $id)   ->where(DB::raw('month(date)'),"=",$month)   ->get();
	
	
		$singleday = DB::table('dprdetails')->where('e_id', $id)->where(DB::raw('day(date)'),"=",$date)->where(DB::raw('month(date)'),"=",$month)->first();
		 


		$sparecategory = DB::table('spare_categories')
					->select('spare_category',DB::raw('COUNT(spare_category) as count'))
					->groupBy('spare_category')
					->get();
					
					
					
DB::enableQueryLog();
		 $equipments = DB::table('vendorequipments')
					->join('vendorequipmendetails', 'vendorequipmendetails.ve_id', '=', 'vendorequipments.id','left')
					->join('vendorequipment_loans', 'vendorequipment_loans.ve_id', '=', 'vendorequipments.id','left')
					->where('vendorequipments.id',$id)
					->select('vendorequipments.*', 'vendorequipmendetails.*', 'vendorequipment_loans.*','vendorequipments.id as main_id')
					->get();
			  /*echo "<pre>";
			print_r($date);
			print_r($singleday);
			die();   
			 foreach($equipments as $key=>$equipmentsdata){
				$equipments = DB::table('equipments')
				->select('equipments.*', 'projects.*', 'vendors.*')
					->where('equipments.e_id', $id)
					->get();
					$equipments[$key][$equipments];
			} */

			$equipment = $equipments[0];
			// print_r(DB::getQueryLog());
			//dd($equipment);
			$equipment_details = $equipments_details[0];
			//dd($equipment_details);
        return view('technician/equipment_technician_detailview', compact('equipment_operators_history','equipment_operators','equipment','singleday','equipment_details','spares','dprdetails','sparecategory'));
		
		
	}
	public function bulkupload(){
		  $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$file_mimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){   
            $csv_file = fopen($_FILES['file']['tmp_name'], 'r');           
            //fgetcsv($csv_file);            
            // get data records from csv file
			$i=1;
            while(($emp_record = fgetcsv($csv_file)) !== FALSE){
				$i++;
				//echo "me".$i;
				if($i==2){ 
				}else{
echo "<pre>";
					print_r($emp_record);
				//die();
                // Check if employee already exists with same email
               /*  $sql_query = "SELECT emp_id, emp_name, emp_salary, emp_age FROM emp WHERE emp_email = '".$emp_record[2]."'";
                $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
				// if employee already exist then update details otherwise insert new record
                if(mysqli_num_rows($resultset)) {                     
					$sql_update = "UPDATE emp set emp_name='".$emp_record[1]."', emp_salary='".$emp_record[3]."', emp_age='".$emp_record[4]."' WHERE emp_email = '".$emp_record[2]."'";
                    mysqli_query($conn, $sql_update) or die("database error:". mysqli_error($conn));
                } else{
					$mysql_insert = "INSERT INTO emp (emp_name, emp_email, emp_salary, emp_age )VALUES('".$emp_record[1]."', '".$emp_record[2]."', '".$emp_record[3]."', '".$emp_record[4]."')";
					mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
                } */
				
				$values = array(
		
		"ve_product_type"=> $emp_record[1],
		"ve_equipment_type"=> $emp_record[2],
		"ve_brand"=> $emp_record[3],
		"ve_year"=>  $emp_record[4],
		"ve_model"=>  $emp_record[5],
		"ve_capacity"=>  $emp_record[6],
		"ve_type_of_work"=>  $emp_record[8],
		"uom"=>  $emp_record[9],
		"ve_vehicle_number"=>  $emp_record[10],
		"ve_expected_mileage"=>  $emp_record[11],
		"ve_vehicle_code"=> NUll,
		"serivce_to_be_done_for_every"=> $emp_record[12],
		"service_metric_km_hours"=> $emp_record[13],
		"service_to_be_done_for_every_xDays"=> $emp_record[14],
		"last_serviced_at"=> $emp_record[15],
		"serviced_at_km_hours"=> $emp_record[16],
		"ve_vendor_id"=> 123,
		
		);
		
				//	DB::enableQueryLog();
			


        $id = vendorequipment::create($values)->id;
		
		
		
		
		
		 $loan_details = array(
								"ve_id"=>$id,
								"bank_name"=>$emp_record[18],
								"bank_location"=>$emp_record[19],
								"total_loan_amount"=>$emp_record[20],
								"total_loan_amount_type"=>NUll,
								"loan_period"=>NUll,
								"loan_start_date"=>$emp_record[21],
								"loan_end_date"=>$emp_record[23],
								"emi_amount"=>$emp_record[22],
								"emi_amount_type"=>Null,
								"emi_last_date"=>$emp_record[24],
				);
	//DB::enableQueryLog();
	 vendorequipment_loan::create($loan_details);
 //print_r(DB::getQueryLog());
 
 $values_details = array(
		"ve_id"=>$id,
		"ve_rental_start_date"=>$emp_record[34],
		"ve_rental_end_date"=>$emp_record[35],
		"no_of_woh"=>$emp_record[36],
		"shift"=>$emp_record[37],
		"ve_noofdays"=>NUll,
		"ve_rental_cost"=>$emp_record[38],
		"ve_billing_cycle"=>$emp_record[39],
		"billing_cycle_is_in_days_months"=>$emp_record[40],
		"rc_start_date"=>NULL,
		"rc_end_date"=>NULL,
		"ins_start_date"=>NULL,
		"ins_end_date"=>NULL,
		"tax_start_date"=>NULL,
		"tax_end_date"=>NULL,
		"permit_end_date"=>NULL,
		"permit_start_date"=>NULL,
		"fitness_end_date"=>NULL,
		"fitness_start_date"=>NULL,
		"project_name"=>$emp_record[25],
		"project_state"=>$emp_record[26],
		"project_city"=>$emp_record[27],
		"project_address"=>$emp_record[28],
		"client_name"=>$emp_record[29],
		"client_designation"=>$emp_record[30],
		"client_phoneno"=>$emp_record[31],
		"client_emailid"=>$emp_record[32],
		"client_state"=>NULL,
		"client_city"=>$emp_record[33],
		"ve_images"=>NULL,
		"ve_vehicle_rc"=>NULL,
		"ve_insurance"=>NULL,
		"ve_road_tax"=>NULL,
		"ve_road_permit"=>NULL,
		"ve_fitness"=>NULL,
		);
		
	
		//DB::enableQueryLog();
        vendorequipmendetails::create($values_details);
		// print_r(DB::getQueryLog());
		        return redirect('/vendorequipment');

					
		 	}
				
            }  
//die();			
            fclose($csv_file);
            $import_status = '?import_status=success';
        } else {
            $import_status = '?import_status=error';
        }
    } else {
        $import_status = '?import_status=invalid_file';
    }
	}
	public function personofcontact(Request $request){
		// $cat_id = Input::get('cat_id');
			$id = $request->input('id');
		
			$vendorclients = DB::table('clientcontacts')->where('client_id', $id)->get();
			$vendorprojects = DB::table('vendorprojects')
			->join('states', 'states.state_id', '=', 'vendorprojects.project_state','left')
			->select('vendorprojects.*','states.state_name as statename')
			->where('client_id', $id)->get();
			
			
			
			
			return response()->json(array('msg'=> $vendorclients,'project'=>$vendorprojects), 200);
		//print_r($states_cities1);
	}	
 public function leaderboard ()
     {
		 $admin_user_id = auth()->user()->id;
		//DB::enableQueryLog();
		$id = Auth::user()->id; 
					$checkleaderboardcount =DB::table('users')
											->where("admin_user_id",$id)
											->get()
											->count();
					if($checkleaderboardcount){
						
					}else{
						return redirect('/vendorequipment/userlist')->with('error', "You don't have Users, Please add  at least one user");
					}
		
		
		$technician_users = \DB::table('users')->where(['admin_user_id'=> $admin_user_id,'role'=> '9'])
						->get();
		//dd($technician_users);
						 foreach($technician_users as $key=>$value){
						 	$technician_users_id = $value->id;
					$technicianplanners =  \DB::table('technicianplanners')->where(['technician_users_id'=> $technician_users_id])
						->get();
						
					 $ecount= $technicianplanners->count();	
					 if($ecount){
					//dd($technicianplanners);
				 	 $technician_users[$key]->ecount = $ecount;
				  	$technician_users[$key]->state = $technicianplanners[0]->tech_state;
					
					
					  $equipments = DB::table('technicianplanners')
					->join('vendorequipments', 'vendorequipments.id', '=', 'technicianplanners.ve_id','left')
					->join('vendorclients', 'vendorclients.id', '=', 'vendorequipments.clinet_id','left')
					->where('technicianplanners.technician_users_id',$technician_users_id)
					->get();
					
					 $technician_users[$key]->clinetname = $equipments[0]->name; 
					 }else{
						$technician_users[$key]->ecount =NUll;
						 $technician_users[$key]->clinetname = Null; 
						$technician_users[$key]->state = Null;						 
					 }
						} 
					
			//dd($technician_users);
			
			$operator_users = \DB::table('users')->where(['admin_user_id'=> $admin_user_id,'role'=> '8'])
						->get();
		//dd($operator_users);
						foreach($operator_users as $key=>$value){
						 	$technician_users_id = $value->id;
					$technicianplanners =  \DB::table('operatorplanners')->where(['operator_users_id'=> $technician_users_id])
						->get();
						
					$ecount= $technicianplanners->count();	
					//dd($technicianplanners);
					if($ecount){
					$operator_users[$key]->ecount = $ecount;
					$operator_users[$key]->state = $technicianplanners[0]->oper_state;
					
					
					 $equipments = DB::table('operatorplanners')
					->join('vendorequipments', 'vendorequipments.id', '=', 'operatorplanners.equipment_id','left')
					->join('vendorclients', 'vendorclients.id', '=', 'vendorequipments.clinet_id','left')
					->where('operatorplanners.operator_users_id',$technician_users_id)
					->get();
					//dd($equipments);
					$operator_users[$key]->clinetname = $equipments[0]->name;
					}else{
						$operator_users[$key]->ecount = Null;
						$operator_users[$key]->state = NUll;
						$operator_users[$key]->clinetname = Null;	
					}
						}

//dd($operator_users);

			
		/* 				
		$operator_users = \DB::table('users')->where(['admin_user_id'=> $admin_user_id,'role'=> '13'])
						->get(); */
		// print_r(DB::getQueryLog());
		//dd($technician_users);
         return view('vendoradmin.leaderboard',compact('technician_users','operator_users'));
    } 
 public function technicianplanner ()
     {
		 $id = Auth::user()->id; 
					$checkleaderboardcount =DB::table('users')
											->where("admin_user_id",$id)
											->where("role",9)
											->get()
											->count();
					if($checkleaderboardcount){
						
					}else{
						return redirect('/vendorequipment/userlist')->with('error', "You don't have Users, Please add  at least one user");
					}
		 $admin_user_id = auth()->user()->id;
		//DB::enableQueryLog();
		$technician_users = \DB::table('users')->where(['admin_user_id'=> $admin_user_id,'role'=> '9'])
						->get();
		$states = DB::table('states')->get();
		// print_r(DB::getQueryLog());
		//dd($vendoradmin_users);
         return view('vendoradmin.technicianplanner',compact('technician_users','states'));
    } 
	public function operatorplanner ()
     {
		 $id = Auth::user()->id; 
					$checkleaderboardcount =DB::table('users')
											->where("admin_user_id",$id)
											->where("role",8)
											->get()
											->count();
					if($checkleaderboardcount){
						
					}else{
						return redirect('/vendorequipment/userlist')->with('error', "You don't have Users, Please add  at least one user");
					}
		 $admin_user_id = auth()->user()->id;
		//DB::enableQueryLog();
		$users = \DB::table('operatorplanners')
						->select("operator_users_id")
						->get();
						$use =array();
		foreach($users as $data){
			$use[] =$data->operator_users_id; 
		}
		
						$technician_users = \DB::table('users')
											
												->where(['admin_user_id'=> $admin_user_id,'role'=> '8'])
												->whereNotIn('id', $use)
						->get();
				//dd($technician_users);
		$states = DB::table('states')->get();
		// print_r(DB::getQueryLog());
		//dd($vendoradmin_users);
         return view('vendoradmin.operatorplanner',compact('technician_users','states'));
    } 
	public function getvendorequipment (Request $request)
     {
		$state = $request->input('state');
		 $admin_user_id = auth()->user()->id;
			//$vendorclients = DB::table('clientcontacts')->where('client_id', $id)->get();
			//DB::enableQueryLog();
			 $equipments = DB::table('vendorequipments')
					->join('subcategories', 'subcategories.id', '=', 'vendorequipments.ve_equipment_type','left')
					->join('vendorequipmendetails', 'vendorequipmendetails.ve_id', '=', 'vendorequipments.id','left')
					->where('vendorequipments.ve_vendor_id',$admin_user_id)
					->where('vendorequipmendetails.project_state',$state)
					->groupBy('vendorequipments.ve_equipment_type')
					->select('vendorequipments.*', 'vendorequipmendetails.*','subcategories.sub_category_name')
					->get();
			/*  print_r(DB::getQueryLog());
		dd($vendoradmin_users); */
			return response()->json(array('equipments'=>$equipments), 200);
    } 
	public function getvendorequipmentcode (Request $request)
     {
		$ve_equipment_type = $request->input('equipment_type');
		 $admin_user_id = auth()->user()->id;
			//$vendorclients = DB::table('clientcontacts')->where('client_id', $id)->get();
			
			 $equipments = DB::table('vendorequipments')
					->join('vendorequipmendetails', 'vendorequipmendetails.ve_id', '=', 'vendorequipments.id','left')
					->where('vendorequipments.ve_equipment_type',$ve_equipment_type)
					->where('vendorequipments.ve_vendor_id',$admin_user_id)
					->distinct('vendorequipments.ve_equipment_type')
					->select('vendorequipments.ve_vehicle_code')
					->get();
			//dd($equipments);
		 	 // print_r(DB::getQueryLog());
		  
		 foreach($equipments as $key=>$equipmentsdata){
			$ve_vehicle_code =  $equipmentsdata->ve_vehicle_code;
			//DB::enableQueryLog();
			$technicianplanners = DB::table('technicianplanners')
			 ->where('technicianplanners.tech_code',$ve_vehicle_code)
			 ->get();
			$exits = $technicianplanners->count();
			//print_r(DB::getQueryLog());
			if($exits){
				$equipments[$key]->exits1 = $exits;
			}else{
				$equipments[$key]->exits1 = 0;
			}
		 }
		  foreach($equipments as $key=>$equipmentsdata){
			$ve_vehicle_code =  $equipmentsdata->ve_vehicle_code;
			 $technicianplanners = DB::table('operatorplanners')
			 ->where('operatorplanners.tech_code',$ve_vehicle_code)
			 ->get();
			$exits = $technicianplanners->count();
			if($exits){
				$equipments[$key]->exits = $exits;
			}else{
				$equipments[$key]->exits = 0;
			}
		 }
			return response()->json(array('equipments'=>$equipments), 200);
    } 
	public function getvendorequipmentnumber (Request $request)
     {
		$ve_vehicle_code = $request->input('vehicle_code');
		
			//$vendorclients = DB::table('clientcontacts')->where('client_id', $id)->get();
			//DB::enableQueryLog();
			 $equipments = DB::table('vendorequipments')
					->join('vendorequipmendetails', 'vendorequipmendetails.ve_id', '=', 'vendorequipments.id','left')
					->where('vendorequipments.ve_vehicle_code',$ve_vehicle_code)
					->distinct('vendorequipments.ve_equipment_type')
					->select('vendorequipments.*')
					->get();
		/* 	  print_r(DB::getQueryLog());
		dd($vendoradmin_users);  */
			return response()->json(array('equipments'=>$equipments), 200);
    }
	public function assignequipemnet($id)
     {
		 $assignequipemnet = DB::table('technicianplanners')
		
			 ->where('technicianplanners.technician_users_id',$id)
			 ->orderBy('tech_id', 'DESC')
			 ->get();
			 /* foreach($assignequipemnet as $key=>$data){
				echo $equipment_id =  $data->equipment_id;
				$equipemnet = DB::table('vendorequipments')
		
			 ->where('vendorequipments.ve_id',$equipment_id)
			->select("ve_id")
			 ->get()->first();
			 //dd($equipemnet);
			dd($equipemnet->ve_id);
			// $assignequipemnet[$key]->ve_id =$equipemnet->ve_id;
			 } */
		$tech_name = DB::table('users')
			 ->where('users.id',$id)
			 ->select('name')
			 ->get();
		// print_r(DB::getQueryLog());
		//dd($assignequipemnet);
	$name = $tech_name[0];
         return view('vendoradmin.assignequipemnet',compact('assignequipemnet','name'));
    }
	public function operassignequipment($id)
     {
		 $assignequipemnet = DB::table('operatorplanners')
		
			 ->where('operatorplanners.operator_users_id',$id)
			 ->orderBy('oper_id', 'DESC')
			 ->get();
			 foreach($assignequipemnet as $key=>$data){
				$tech_code =  $data->tech_code;
				$equipemnet = DB::table('vendorequipments')
		
			 ->where('vendorequipments.ve_vehicle_code',$tech_code)
			->select("id")
			 ->get();
			 $assignequipemnet[$key]->id = $equipemnet[0]->id;
			 }
		$tech_name = DB::table('users')
			 ->where('users.id',$id)
			 ->select('name')
			 ->get();
		// print_r(DB::getQueryLog());
		//dd($assignequipemnet);
	$name = $tech_name[0];
         return view('vendoradmin.operassignequipment',compact('assignequipemnet','name'));
    }
public function equipment_daily_checkup($id){
	 	

		//$equipments = DB::table('equipments')->get();
		$month = date('m');
		$date = date('d');
		
		
	 	$equipments_details = DB::table('vendorequipments')->where('id', $id)->get();
		
		
	 	$equipment_operators = DB::table('equipment_operators')->where(array('ve_id'=> $id,"status"=>1))->get();
	 	$equipment_operators_history = DB::table('equipment_operators')->where(array('ve_id'=> $id,"status"=>2))->get();
		
		//dd($equipments_details);
		$spares = DB::table('spares')->where('equ_id', $id)->get();
		$dprdetails = DB::table('dprdetails')->where('e_id', $id)   ->where(DB::raw('month(date)'),"=",$month)   ->get();
	
	
		$singleday = DB::table('dprdetails')->where('e_id', $id)->where(DB::raw('day(date)'),"=",$date)->where(DB::raw('month(date)'),"=",$month)->first();
		 


		$sparecategory = DB::table('spare_categories')
					->select('spare_category',DB::raw('COUNT(spare_category) as count'))
					->groupBy('spare_category')
					->get();
					
					
					
DB::enableQueryLog();
		 $equipment = DB::table('vendorequipments')
					->join('subcategories', 'subcategories.id', '=', 'vendorequipments.ve_equipment_type','left')
					->join('vendorequipmendetails', 'vendorequipmendetails.ve_id', '=', 'vendorequipments.id','left')
					->join('vendorequipment_loans', 'vendorequipment_loans.ve_id', '=', 'vendorequipments.id','left')
					->where('vendorequipments.id',$id)
					->select('vendorequipments.*', 'vendorequipmendetails.*', 'vendorequipment_loans.*','vendorequipments.id as main_id','subcategories.sub_category_name')
					->get();
			  /*echo "<pre>";
			print_r($date);
			print_r($singleday);
			die();   
			 foreach($equipments as $key=>$equipmentsdata){
				$equipments = DB::table('equipments')
				->select('equipments.*', 'projects.*', 'vendors.*')
					->where('equipments.e_id', $id)
					->get();
					$equipments[$key][$equipments];
			} */
			//dd($equipment);
 if(empty($equipment)){
	 
 }else{
	 $equipment = $equipment[0];
 }
			
			// print_r(DB::getQueryLog());
			
			$equipment_details = $equipment;
			//dd($equipment_details);
			//$equipmentdalycheckups = array();
			try{
		$equipmentdalycheckups = DB::table('equipmentdalycheckups')->where('equ_id', $id) -> where(DB::raw('day(created_at)'),"=",$date)  ->get();
			}catch(Exception $e) {
        echo $e->getMessage(), PHP_EOL;
    }
	$averagedalycheckupscount = DB::table('equipmentdalycheckups')->where(['equ_id'=> $id,'equipment_status'=>'average'])   ->get()->count();
		if($averagedalycheckupscount==0){
			$averagedalycheckupscount=0;
		}
		$gooddalycheckupscount = DB::table('equipmentdalycheckups')->where(['equ_id'=> $id,'equipment_status'=>'good'])   ->get()->count();
		if($gooddalycheckupscount==""){
			$gooddalycheckupscount = 0;
		}
		
		$criticaldalycheckupscount = DB::table('equipmentdalycheckups')->where(['equ_id'=> $id,'equipment_status'=>'critical'])   ->get()->count();
		if($criticaldalycheckupscount==""){
			$criticaldalycheckupscount=0;
		}
		
			 /* if(empty($equipmentdalycheckups)){

				}else{
			$equipmentdalycheckups = $equipmentdalycheckups[0];
			$averagedalycheckupscount = DB::table('equipmentdalycheckups')->where(['equ_id'=> $id,'equipment_status'=>'average'])   ->get()->count();
		if($averagedalycheckupscount==0){
			$averagedalycheckupscount=0;
		}
		$gooddalycheckupscount = DB::table('equipmentdalycheckups')->where(['equ_id'=> $id,'equipment_status'=>'good'])   ->get()->count();
		if($gooddalycheckupscount==""){
			$gooddalycheckupscount = 0;
		}
		
		$criticaldalycheckupscount = DB::table('equipmentdalycheckups')->where(['equ_id'=> $id,'equipment_status'=>'critical'])   ->get()->count();
		if($criticaldalycheckupscount==""){
			$criticaldalycheckupscount=0;
		}
			}  */
			 $admin_user_id = auth()->user()->id;
		 $servicecheckups = \DB::table('servicecheckups')->where(['user_id'=>$admin_user_id,'equ_id'=>$id])
						->get();
		$servicecheckupsdata= $servicecheckups;
		$projectlist = \DB::table('clientcontactdetails')
								->select(DB::raw(' id,project_name as title, ve_rental_start_date as start, ve_rental_end_date as end,ve_noofdays,ve_rental_cost'))
								->where(['ve_id'=>$id])
								->get();
        return view('vendoradmin/equipment_daily_checkup', compact('equipment_operators_history','equipment_operators','equipment','singleday','equipment_details','spares','dprdetails','sparecategory','equipmentdalycheckups','averagedalycheckupscount','gooddalycheckupscount','criticaldalycheckupscount','servicecheckups','servicecheckupsdata','equipments_details','projectlist'));
	}	
	
	
	
public function technician_daily_checkup($id){
	 	

		//$equipments = DB::table('equipments')->get();
		$month = date('m');
		$date = date('d');
		//$id = base64_decode($id);
		
	 	$equipments_details = DB::table('vendorequipments')->where('id', $id)->get();
		
		
	 	$equipment_operators = DB::table('equipment_operators')->where(array('ve_id'=> $id,"status"=>1))->get();
	 	$equipment_operators_history = DB::table('equipment_operators')->where(array('ve_id'=> $id,"status"=>2))->get();
		
		//dd($equipments_details);
		$spares = DB::table('spares')->where('equ_id', $id)->get();
		$dprdetails = DB::table('dprdetails')->where('e_id', $id)   ->where(DB::raw('month(date)'),"=",$month)   ->get();
	
	
		$singleday = DB::table('dprdetails')->where('e_id', $id)->where(DB::raw('day(date)'),"=",$date)->where(DB::raw('month(date)'),"=",$month)->first();
		 


		$sparecategory = DB::table('spare_categories')
					->select('spare_category',DB::raw('COUNT(spare_category) as count'))
					->groupBy('spare_category')
					->get();
					
					
					
DB::enableQueryLog();
		 $equipment = DB::table('vendorequipments')
					->join('vendorequipmendetails', 'vendorequipmendetails.ve_id', '=', 'vendorequipments.id','left')
					->join('subcategories', 'subcategories.id', '=', 'vendorequipments.ve_equipment_type','left')
					->join('vendorequipment_loans', 'vendorequipment_loans.ve_id', '=', 'vendorequipments.id','left')
					->where('vendorequipments.id',$id)
					->select('vendorequipments.*', 'vendorequipmendetails.*', 'vendorequipment_loans.*','vendorequipments.id as main_id','subcategories.sub_category_name')
					->get();
			  /*echo "<pre>";
			print_r($date);
			print_r($singleday);
			die();   
			 foreach($equipments as $key=>$equipmentsdata){
				$equipments = DB::table('equipments')
				->select('equipments.*', 'projects.*', 'vendors.*')
					->where('equipments.e_id', $id)
					->get();
					$equipments[$key][$equipments];
			} */
			//dd($equipment);
 if(empty($equipment)){
	 
 }else{
	 $equipment = $equipment[0];
 }
			
			// print_r(DB::getQueryLog());
			
			$equipment_details = $equipment;
			//dd($equipment_details);
			//$equipmentdalycheckups = array();
			try{
		$equipmentdalycheckups = DB::table('equipmentdalycheckups')->where('equ_id', $id) -> where(DB::raw('day(created_at)'),"=",$date)  ->get();
			}catch(Exception $e) {
        echo $e->getMessage(), PHP_EOL;
    }
	$averagedalycheckupscount = DB::table('equipmentdalycheckups')->where(['equ_id'=> $id,'equipment_status'=>'average'])   ->get()->count();
		if($averagedalycheckupscount==0){
			$averagedalycheckupscount=0;
		}
		$gooddalycheckupscount = DB::table('equipmentdalycheckups')->where(['equ_id'=> $id,'equipment_status'=>'good'])   ->get()->count();
		if($gooddalycheckupscount==""){
			$gooddalycheckupscount = 0;
		}
		
		$criticaldalycheckupscount = DB::table('equipmentdalycheckups')->where(['equ_id'=> $id,'equipment_status'=>'critical'])   ->get()->count();
		if($criticaldalycheckupscount==""){
			$criticaldalycheckupscount=0;
		}
		
			 /* if(empty($equipmentdalycheckups)){

				}else{
			$equipmentdalycheckups = $equipmentdalycheckups[0];
			$averagedalycheckupscount = DB::table('equipmentdalycheckups')->where(['equ_id'=> $id,'equipment_status'=>'average'])   ->get()->count();
		if($averagedalycheckupscount==0){
			$averagedalycheckupscount=0;
		}
		$gooddalycheckupscount = DB::table('equipmentdalycheckups')->where(['equ_id'=> $id,'equipment_status'=>'good'])   ->get()->count();
		if($gooddalycheckupscount==""){
			$gooddalycheckupscount = 0;
		}
		
		$criticaldalycheckupscount = DB::table('equipmentdalycheckups')->where(['equ_id'=> $id,'equipment_status'=>'critical'])   ->get()->count();
		if($criticaldalycheckupscount==""){
			$criticaldalycheckupscount=0;
		}
			}  */
			 $admin_user_id = auth()->user()->id;
		 $servicecheckups = \DB::table('servicecheckups')->where(['user_id'=>$admin_user_id,'equ_id'=>$id])
						->get();
		$servicecheckupsdata= $servicecheckups;
		$projectlist = \DB::table('clientcontactdetails')
								->select(DB::raw(' id,project_name as title, ve_rental_start_date as start, ve_rental_end_date as end,ve_noofdays,ve_rental_cost'))
								->where(['ve_id'=>$id])
								->get();
        return view('vendoradmin/technician_daily_checkup', compact('equipment_operators_history','equipment_operators','equipment','singleday','equipment_details','spares','dprdetails','sparecategory','equipmentdalycheckups','averagedalycheckupscount','gooddalycheckupscount','criticaldalycheckupscount','servicecheckups','servicecheckupsdata','equipments_details','projectlist'));
	}
	
public function operator_daily_checkup($id){
	 	

		//$equipments = DB::table('equipments')->get();
		$month = date('m');
		$date = date('d');
		//$id = base64_decode($id);
		
	 	$equipments_details = DB::table('vendorequipments')->where('id', $id)->get();
		
		
	 	$equipment_operators = DB::table('equipment_operators')->where(array('ve_id'=> $id,"status"=>1))->get();
	 	$equipment_operators_history = DB::table('equipment_operators')->where(array('ve_id'=> $id,"status"=>2))->get();
		
		//dd($equipments_details);
		$spares = DB::table('spares')->where('equ_id', $id)->get();
		$dprdetails = DB::table('dprdetails')->where('e_id', $id)   ->where(DB::raw('month(date)'),"=",$month)   ->get();
	
	
		$singleday = DB::table('dprdetails')->where('e_id', $id)->where(DB::raw('day(date)'),"=",$date)->where(DB::raw('month(date)'),"=",$month)->first();
		 


		$sparecategory = DB::table('spare_categories')
					->select('spare_category',DB::raw('COUNT(spare_category) as count'))
					->groupBy('spare_category')
					->get();
					
					
					
DB::enableQueryLog();
		 $equipment = DB::table('vendorequipments')
					->join('subcategories', 'subcategories.id', '=', 'vendorequipments.ve_equipment_type','left')
					->join('vendorequipmendetails', 'vendorequipmendetails.ve_id', '=', 'vendorequipments.id','left')
					->join('vendorequipment_loans', 'vendorequipment_loans.ve_id', '=', 'vendorequipments.id','left')
					->where('vendorequipments.id',$id)
					->select('vendorequipments.*', 'vendorequipmendetails.*', 'vendorequipment_loans.*','vendorequipments.id as main_id','subcategories.sub_category_name')
					->get();
			  /*echo "<pre>";
			print_r($date);
			print_r($singleday);
			die();   
			 foreach($equipments as $key=>$equipmentsdata){
				$equipments = DB::table('equipments')
				->select('equipments.*', 'projects.*', 'vendors.*')
					->where('equipments.e_id', $id)
					->get();
					$equipments[$key][$equipments];
			} */
			//dd($equipment);
 if(empty($equipment)){
	 
 }else{
	 $equipment = $equipment[0];
 }
			
			// print_r(DB::getQueryLog());
			
			$equipment_details = $equipment;
			//dd($equipment_details);
			//$equipmentdalycheckups = array();
			try{
		$equipmentdalycheckups = DB::table('equipmentdalycheckups')->where('equ_id', $id) -> where(DB::raw('day(created_at)'),"=",$date)  ->get();
			}catch(Exception $e) {
        echo $e->getMessage(), PHP_EOL;
    }
	$averagedalycheckupscount = DB::table('equipmentdalycheckups')->where(['equ_id'=> $id,'equipment_status'=>'average'])   ->get()->count();
		if($averagedalycheckupscount==0){
			$averagedalycheckupscount=0;
		}
		$gooddalycheckupscount = DB::table('equipmentdalycheckups')->where(['equ_id'=> $id,'equipment_status'=>'good'])   ->get()->count();
		if($gooddalycheckupscount==""){
			$gooddalycheckupscount = 0;
		}
		
		$criticaldalycheckupscount = DB::table('equipmentdalycheckups')->where(['equ_id'=> $id,'equipment_status'=>'critical'])   ->get()->count();
		if($criticaldalycheckupscount==""){
			$criticaldalycheckupscount=0;
		}
		
			 /* if(empty($equipmentdalycheckups)){

				}else{
			$equipmentdalycheckups = $equipmentdalycheckups[0];
			$averagedalycheckupscount = DB::table('equipmentdalycheckups')->where(['equ_id'=> $id,'equipment_status'=>'average'])   ->get()->count();
		if($averagedalycheckupscount==0){
			$averagedalycheckupscount=0;
		}
		$gooddalycheckupscount = DB::table('equipmentdalycheckups')->where(['equ_id'=> $id,'equipment_status'=>'good'])   ->get()->count();
		if($gooddalycheckupscount==""){
			$gooddalycheckupscount = 0;
		}
		
		$criticaldalycheckupscount = DB::table('equipmentdalycheckups')->where(['equ_id'=> $id,'equipment_status'=>'critical'])   ->get()->count();
		if($criticaldalycheckupscount==""){
			$criticaldalycheckupscount=0;
		}
			}  */
			 $admin_user_id = auth()->user()->id;
		 $servicecheckups = \DB::table('servicecheckups')->where(['user_id'=>$admin_user_id,'equ_id'=>$id])
						->get();
		$servicecheckupsdata= $servicecheckups;
		$projectlist = \DB::table('clientcontactdetails')
								->select(DB::raw(' id,project_name as title, ve_rental_start_date as start, ve_rental_end_date as end,ve_noofdays,ve_rental_cost'))
								->where(['ve_id'=>$id])
								->get();
        return view('vendoradmin/operator_daily_checkup', compact('equipment_operators_history','equipment_operators','equipment','singleday','equipment_details','spares','dprdetails','sparecategory','equipmentdalycheckups','averagedalycheckupscount','gooddalycheckupscount','criticaldalycheckupscount','servicecheckups','servicecheckupsdata','equipments_details','projectlist'));
	}	
		public function getclientcontacts(Request $request){
		// $cat_id = Input::get('cat_id');
			$id = $request->input('id');
		
			$vendorclients = DB::table('clientcontacts')->where('clientcontacts_id', $id)->get();
			$vendorprojects = DB::table('vendorprojects')
			->join('states', 'states.state_id', '=', 'vendorprojects.project_state','left')
			->select('vendorprojects.*','states.state_name as statename')
			->where('client_id', $id)->get();
			
			
			
			
			return response()->json(array('msg'=> $vendorclients), 200);
		//print_r($states_cities1);
	}
	public function getprojectdetailsdata(Request $request){
		// $cat_id = Input::get('cat_id');
			$id = $request->input('id');
		
			
			$vendorprojects = DB::table('vendorprojects')
			->join('states', 'states.state_id', '=', 'vendorprojects.project_state','left')
			->select('vendorprojects.*','states.state_name as statename')
			->where('vendorprojects.project_id', $id)->get();
			
			
			
			
			return response()->json(array('msg'=> $vendorprojects), 200);
		//print_r($states_cities1);
	}
	 public function softDeletes($id)
    {
        $product = vendorequipment::find( $id );
		if ($product != null) {
       $product->delete();
      
    }
	return  redirect("/vendorequipment")->with('error', 'Record was successfully deleted.');
	}
	
		public function workinghistory(Request $request)
     {
		$id =  $request->get('var');
		$avaliable_equipment = \DB::table('clientcontactdetails')
								->select(DB::raw(' id,project_name as title, ve_rental_start_date as start, ve_rental_end_date as end'))
								->where(['ve_id'=>$id])
								->get();
			return response()->json($avaliable_equipment);
    }
public function servicecheckups($id){
	
	try{
		$servicecheckups = DB::table('servicecheckups')->where('ser_id', $id) ->first();
			}catch(Exception $e) {
        echo $e->getMessage(), PHP_EOL;
    }
	//dd($servicecheckups);
	  return view('vendoradmin/servicecheckups', compact('servicecheckups'));
}	

 public function renewals($id)
     {
		
		$admin_user_id = auth()->user()->id;
		 
		 $clientcount = DB::table('vendorclients')
												->where("vendoradmin_id",$admin_user_id)
												->get()
												->count();
		$clientandprojectdata = DB::table('vendorequipments')
												->join("vendorequipmendetails", 'vendorequipmendetails.ve_id','=','vendorequipments.id')
												->where("vendorequipments.id",$id)
												->get()->first();
			//dd($clientandprojectdata);									
		if($clientcount){
			 $vendorclients = \DB::table('vendorclients')->where('vendoradmin_id', $admin_user_id)
						->get();
		//dd($vendorclients);
		$vendors = DB::table('vendors')->get();
		$projects = DB::table('vendorprojects')->get();
		$subcategories = DB::table('subcategories')->get();
		$eq_brands = DB::table('eq_brands')->get();
		$banks = DB::table('banks')->get();
		
         return view('vendoradmin.renewals', compact('vendors','projects','vendorclients','subcategories','eq_brands','banks','clientandprojectdata'));
		 
		}else{
			
			
			return redirect("/vendor/clientlist")->with('error', "You don't have clients, Please add at least one client and project");
		}	
    }
	
 public function cancelrent($id)
     {
		
		$admin_user_id = auth()->user()->id;
		 
		 $vendorequipmentsdetails = DB::table('vendorequipments')
												->where("id",$id)
												->get()->first();
												
			$client_id = $vendorequipmentsdetails->clinet_id;
			$project_id = $vendorequipmentsdetails->project_id;
			
			$insertdata = array(
			"equ_id"				=>	$id,
			"project_id"   			=>	$project_id,
			"client_id"				=>	$client_id,
			"vendor_admin_id"		=>	$admin_user_id,
			);
			
			DB::table('cancelprojects')->insert($insertdata);
			
			
			$data = array(
						"ve_product_type"=>'avaliable',
					);
		
			DB::table('vendorequipments')
											->where('id', $id)
											->update($data);
			
			return redirect("/vendorequipment")->with('error', "You  Have Successfully Cancel Rent Agreement");
			
    }
}

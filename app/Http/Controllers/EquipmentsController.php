<?php

namespace App\Http\Controllers;
use App\Models\Equipments;
use App\Models\Dprdetails;
use DB;
use Illuminate\Http\Request;
use App\Models\Equipments_details;
use App\Models\Spare_category;
use App\Models\Spares;
class EquipmentsController extends Controller
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
		//return view("equipments");
		$equipments = DB::table('equipments')->get();
		
	
        return view('equipments', compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$vendors = DB::table('vendors')->get();
		$projects = DB::table('projects')->get();
		
         return view('equipments.create', compact('vendors','projects'));
    }
	public function vendordetails(Request $request){
				$id = $request->input('id');
		
		 
				$vendorsdetails = DB::table('vendors')->where('vendor_id', $id)->latest("vendor_id")->get();
			
				return response()->json(array('msg'=> $vendorsdetails), 200);
	}
	public function fieldsupervisor(Request $request){
				$id = $request->input('id');
		
		 
				$fieldsupervisor = DB::table('project_sites')->where('site_id', $id)->get();
			
				return response()->json(array('msg'=> $fieldsupervisor), 200);
	}
	public function projectdetails(Request $request){
				$id = $request->input('id');
		
		 
				$projectdetails = DB::table('projects')->where('project_id', $id)->latest("project_id")->get();
				$project_sites = DB::table('project_sites')->where('project_id', $id)->get();
			
				return response()->json(array('msg'=> $projectdetails,'project_sites'=>$project_sites), 200);
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
         $validatedData = $request->validate([  
            'e_product_type' => 'required', 
            'e_equipment_type' => 'required',
            'e_brand' => 'required',
            'e_year' => 'required',
            'e_model' => 'required',
            'e_capacity' => 'required',
            'e_current_reading' => 'required',
            'e_service_duration' => 'required',
            'e_uom' => 'required',
            'e_wom' => 'required',
            'e_vehicle_number' => 'required',
            'e_expected_mileage' => 'required',
            'e_project_code' => 'required',
            'e_vendor_id' => 'required',
        ],[], 
		[
			'e_product_type' => 'product type', 
			'e_equipment_type' => 'Equipment type', 
			'e_brand' => 'Brand', 
			'e_year' => 'Year', 
			'e_model' => 'Model', 
			'e_capacity' => 'Capacity', 
			'e_current_reading' => 'Current Reading', 
			'e_service_duration' => 'Service Duration', 
			'e_uom' => 'UOM', 
			'e_wom' => 'WOM', 
			'e_vehicle_number' => 'Vehicle Number', 
			'e_expected_mileage' => 'Expected Mileage', 
			'e_project_code' => 'Project Code', 
			'e_vendor_id' => 'Vendor id', 
		]
			);
		//$values = $request->except('url');
		$values = array(
		
		"e_product_type"=> $request->input('e_product_type'),
		"e_equipment_type"=> $request->input('e_equipment_type'),
		"e_brand"=> $request->input('e_brand'),
		"e_year"=> $request->input('e_year'),
		"e_model"=> $request->input('e_model'),
		"e_capacity"=> $request->input('e_capacity'),
		"e_current_reading"=> $request->input('e_current_reading'),
		"e_service_duration"=> $request->input('e_service_duration'),
		"e_type_of_work"=> $request->input('e_type_of_work'),
		"e_uom"=> $request->input('e_uom'),
		"e_wom"=> $request->input('e_wom'),
		"e_vehicle_number"=> $request->input('e_vehicle_number'),
		"e_expected_mileage"=> $request->input('e_expected_mileage'),
		"e_project_code"=> $request->input('e_project_code'),
		"e_vendor_id"=> $request->input('e_vendor_id'),
		"e_user_id"=> $request->input('e_user_id'),
		"e_shift"=> $request->input('shift'),
		
		);
        $id = Equipments::create($values)->id;
		
			foreach ($_FILES['image']['tmp_name'] as $key => $value) {
              
            $file_tmpname = $_FILES['image']['tmp_name'][$key];
            $file_name = $_FILES['image']['name'][$key];
   
            $filepath = "/home/ubuntu/infraweb/public/images/".time().$file_name;
  
                  move_uploaded_file($file_tmpname, $filepath);
				  
                       $imagename[] = time().$file_name;
                    
                }
		$file_tmpname1 = $_FILES['upload']['tmp_name'];
        $file_name1 = $_FILES['upload']['name'];
		 $filepath1 = "/home/ubuntu/infraweb/public/images/".time().$file_name1;
		 $file_name2 = time().$file_name1;
		 move_uploaded_file($file_tmpname1, $filepath1);
		 /****RC **/
		 $d_vechile_rc_tmpname1 = $_FILES['d_vechile_rc']['tmp_name'];
        $d_vechile_rc_name = $_FILES['d_vechile_rc']['name'];
		 $d_vechile_rc_path = "/home/ubuntu/infraweb/public/images/".time().$d_vechile_rc_name;
		 $d_vechile_rc = time().$d_vechile_rc_name;
		 move_uploaded_file($d_vechile_rc_tmpname1, $d_vechile_rc_path);
		 /**insurance*/
		$d_insurance_tmpname1 = $_FILES['d_vechile_rc']['tmp_name'];
        $d_insurance_name = $_FILES['d_vechile_rc']['name'];
		 $d_insurance_path = "/home/ubuntu/infraweb/public/images/".time().$d_insurance_name;
		 $d_insurance = time().$d_insurance_name;
		 move_uploaded_file($d_insurance_tmpname1, $d_insurance_path);
		 /**road tax*/
		 $d_road_tax_tmpname1 = $_FILES['d_vechile_rc']['tmp_name'];
        $d_road_tax_name = $_FILES['d_vechile_rc']['name'];
		 $d_road_tax_path = "/home/ubuntu/infraweb/public/images/".time().$d_road_tax_name;
		 $d_road_tax = time().$d_road_tax_name;
		 move_uploaded_file($d_road_tax_tmpname1, $d_road_tax_path);
		 /***road permit**/
		 $d_road_permit_tmpname1 = $_FILES['d_vechile_rc']['tmp_name'];
         $d_road_permit_name = $_FILES['d_vechile_rc']['name'];
		 $d_road_permit_name_path = "/home/ubuntu/infraweb/public/images/".time().$d_road_permit_name;
		 $d_road_permit = time().$d_road_permit_name;
		 move_uploaded_file($d_road_permit_tmpname1, $d_road_permit_name_path);
		 /*****fitness******/
		  $d_fitness_tmpname1 = $_FILES['d_vechile_rc']['tmp_name'];
         $d_fitness_name = $_FILES['d_vechile_rc']['name'];
		 $d_fitness_name_path = "/home/ubuntu/infraweb/public/images/".time().$d_fitness_name;
		 $d_fitness = time().$d_fitness_name;
		 move_uploaded_file($d_fitness_tmpname1, $d_fitness_name_path);
		 /**********/
		$values_details = array(
		"e_id"=>$id,
		"e_rental_start_date"=>$request->input('e_rental_start_date'),
		"e_rental_end_date"=>$request->input('e_rental_end_date'),
		"e_rental_cost"=>$request->input('e_rental_cost'),
		"e_billing_cycle"=>$request->input('e_billing_cycle'),
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
		"e_images"=>json_encode($imagename),
		"upload_rental_contract"=>$file_name2,
		"d_vechile_rc"=>$d_vechile_rc,
		"d_insurance"=>$d_insurance,
		"d_road_tax"=>$d_road_tax,
		"d_road_permit"=>$d_road_permit,
		"d_fitness"=>$d_fitness,
		);
		
	
		
        Equipments_details::create($values_details);

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipments  $equipments
     * @return \Illuminate\Http\Response
     */
    public function show(Equipments $equipments){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipments  $equipments
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipments $equipments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipments  $equipments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipments $equipments)
    {
        //
    }


	// request for equipment approval junior
	
	public function requestjunior(){
		$brands = DB::table('brands')->get();
        return view('requestjunior', compact('brands'));
	}

	public function update_dpr(Request $request){
		
		 $no_of_litter = $request->input('no_of_litter');
		if($no_of_litter){
			$fuel = "YES";
		}else{
			$fuel =  "NA";
		}
	
		$values_details = array(
		"e_id"=>$request->input('id'),
		"date"=>date("Y")."-".date("m")."-".$request->input('date'),
		"start_time"=>$request->input('start_time'),
		"end_time"=>$request->input('end_time'),
		"start_reading"=>$request->input('start_reading'),
		"end_reading"=>$request->input('end_reading'),
		"fuel"=>$fuel,
		"litres"=>$request->input('no_of_litter'),
		"fuel_reading"=>$request->input('fueled'),
		);
		

		  Dprdetails::create($values_details);
			
        //return redirect('/home');
	}


	public function update_endtime_dpr(Request $request){
		
	 
		$values_details = array(   
			"end_time"=>$request->input('end_time'), 
			"totalwoh"=>$request->input('totalwoh'), 
			"end_reading"=>$request->input('end_reading'), 
		);
			
		DB::table('dprdetails')
			->where('dpr_id', $request->input('dpr_id'))
			->update($values_details);
 
			
        //return redirect('/home');
	}

	//   equipment detail View
	
	public function equipment_detailview($id){
		$month = date('m');
		$date = date('d');
		//$equipments = DB::table('equipments')->get();
	 	$equipments_details = DB::table('equipments_details')->where('e_id', $id)->get();
	 	$spares = DB::table('spares')->where('equ_id', $id)->get();
		$dprdetails = DB::table('dprdetails')->where('e_id', $id)   ->where(DB::raw('month(date)'),"=",$month)   ->get();
	
	
		$singleday = DB::table('dprdetails')->where('e_id', $id)->where(DB::raw('day(date)'),"=",$date)->where(DB::raw('month(date)'),"=",$month)->first();
		 
	 	//$sparecategory = DB::table('spare_categories')->get();
		$sparecategory = DB::table('spare_categories')
					->select('spare_category',DB::raw('COUNT(spare_category) as count'))
					->groupBy('spare_category')
					->get();
		 $equipments = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code','left')
					->join('vendors', 'vendors.vendor_id', '=', 'equipments.e_vendor_id','left')
					//->join('spares', 'spares.equ_id', '=', 'equipments.e_id','left')
					->select('equipments.*', 'projects.*', 'vendors.*')
					->where('equipments.e_id', $id)
					->get();
					/* echo "<pre>";
			print_r($equipments);
			die(); */ 
			$equipment = $equipments[0];
			$equipment_details = $equipments_details[0];
       // return view('equipment_detailview', compact('equipment','equipment_details','spares','sparecategory'));
		return view('equipment_detailview', compact('equipment','singleday','equipment_details','spares','dprdetails','sparecategory'));
	}

public function vendor_equipment_detailview($id){
		$month = date('m');
		$date = date('d');
		//$equipments = DB::table('equipments')->get();
	 	$equipments_details = DB::table('equipments_details')->where('e_id', $id)->get();
	 	$spares = DB::table('spares')->where('equ_id', $id)->get();
		$dprdetails = DB::table('dprdetails')->where('e_id', $id)   ->where(DB::raw('month(date)'),"=",$month)   ->get();
	
	
		$singleday = DB::table('dprdetails')->where('e_id', $id)->where(DB::raw('day(date)'),"=",$date)->where(DB::raw('month(date)'),"=",$month)->first();
		 
	 	//$sparecategory = DB::table('spare_categories')->get();
		$sparecategory = DB::table('spare_categories')
					->select('spare_category',DB::raw('COUNT(spare_category) as count'))
					->groupBy('spare_category')
					->get();
		 $equipments = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code','left')
					->join('vendors', 'vendors.vendor_id', '=', 'equipments.e_vendor_id','left')
					//->join('spares', 'spares.equ_id', '=', 'equipments.e_id','left')
					->select('equipments.*', 'projects.*', 'vendors.*')
					->where('equipments.e_id', $id)
					->get();
					/* echo "<pre>";
			print_r($equipments);
			die(); */ 
			$equipment = $equipments[0];
			$equipment_details = $equipments_details[0];
       // return view('equipment_detailview', compact('equipment','equipment_details','spares','sparecategory'));
		return view('vendor_equipment_detailview', compact('equipment','singleday','equipment_details','spares','dprdetails','sparecategory'));
	}




	public function equipment_vendor_detailview($id){
	 	DB::enableQueryLog();

		//$equipments = DB::table('equipments')->get();
		$month = date('m');
		$date = date('d');
		
		
	 	$equipments_details = DB::table('equipments_details')->where('e_id', $id)->get();
		$spares = DB::table('spares')->where('equ_id', $id)->get();
		$dprdetails = DB::table('dprdetails')->where('e_id', $id)   ->where(DB::raw('month(date)'),"=",$month)   ->get();
	
	
		$singleday = DB::table('dprdetails')->where('e_id', $id)->where(DB::raw('day(date)'),"=",$date)->where(DB::raw('month(date)'),"=",$month)->first();
		 
 //print_r(DB::getQueryLog());

		$sparecategory = DB::table('spare_categories')
					->select('spare_category',DB::raw('COUNT(spare_category) as count'))
					->groupBy('spare_category')
					->get();

		 $equipments = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->join('vendors', 'vendors.vendor_id', '=', 'equipments.e_vendor_id')
					->select('equipments.*', 'projects.*', 'vendors.*')
					->where('equipments.e_id', $id)
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
			$equipment_details = $equipments_details[0];
        return view('equipments/equipment_vendor_detailview', compact('equipment','singleday','equipment_details','spares','dprdetails','sparecategory'));
	}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipments  $equipments
     * @return \Illuminate\Http\Response
     */
	 
    public function destroy(Equipments $equipments)
    {
        //
    }
	


		public function addsparecategory(Request $request){
		 
				 
			$values = array(
		
				"spare_category"=> $request->input('sparecategory'),
				"spare_type"=> $request->input('sparetype'), 
				
			);
 
			$id = Spare_category::create($values)->id;
			if($id){
				return response()->json(array('msg'=> "success"), 200);
			}
			
		//print_r($states_cities1);
	}

		public function addspare(Request $request){
		 
			$values = array(
		
				"spare_category"=> $request->input('sp_cat'),
				"spare_type"=> $request->input('sp_type'), 
				"sparepart_id"=> $request->input('sp_id'), 
				"quantity"=> $request->input('sp_quantity'), 
				"brand"=> $request->input('sp_brand'), 
				"year"=> $request->input('sp_year'), 
				"pre_num"=> $request->input('sp_pre_no'), 
				"vendor_name"=> $request->input('sp_v_name'), 
				"phone"=> $request->input('sp_phone'), 
				"email"=> $request->input('sp_email'), 
				"city"=> $request->input('sp_city'), 
				"comments"=> $request->input('sp_comments'), 
				"equ_id"=> $request->input('equ_id'), 
				
			);
 
			$id = Spares::create($values)->id;
			if($id){
				return response()->json(array('msg'=> "success"), 200);
			}
			
		//print_r($states_cities1);
	}
		public function gettypes(Request $request){
				$id = $request->input('id');
		
		  
				$gettypes = DB::table('spare_categories')->where('spare_category', $id)->get();
			
				return response()->json(array( 'gettypes'=>$gettypes), 200);
	}
}

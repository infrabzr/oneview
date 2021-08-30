<?php

namespace App\Http\Controllers;
use App\Models\Requestforequipment;
use Illuminate\Http\Request;
use DB;
class RequestforequipmentController extends Controller
{
    /**
     * Display a listing of the prducts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$requests = Requestforequipment::all();
       	
		$jrstatus = "1";
		$newrequest = \DB::table('requestforequipments')->where('r_status', $jrstatus)
						->get();
		$newrequest_count = $newrequest->count();


		$srstatus = "2";
		$pending_vendor = \DB::table('requestforequipments')->where('r_status', $srstatus)
						->get();
		$pending_vendor_count = $pending_vendor->count();
		
				
		$vendorstatus = "3";
		$approve_vendor = \DB::table('requestforequipments')->where('r_status', $vendorstatus)
						->get();
		$approve_vendor_count = $approve_vendor->count();
	 
				
		$sr_srstatus = "4";
		$approved_request = \DB::table('requestforequipments')->where('r_status', $srstatus)
						->get();
		$approved_request_count = $approved_request->count();
		
		
		$total_request = DB::table('requestforequipments')
							->get();
							
							
							
		$total_request_n = $total_request->count();
		
		
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project')
					->select('requestforequipments.*', 'projects.*')
					->get();
					/* echo "<pre>";
			print_r($equipments);
			die(); */
         return view('requests.index',compact('requests','newrequest_count','pending_vendor_count','approve_vendor_count','approved_request_count','total_request_n'));
    }
	
	/**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function requestjunior()
    {
		$brands = DB::table('brands')->get(); 
		 
		$projects = DB::table('projects')->get();
		return view('requests.requestjunior', compact('brands','projects'));
    }
	
	  /**
	 * Store a newly created product in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function addjuniorrequest(Request $request)
    {
		$validatedData = $request->validate([  
            'type' => 'required', 
            'r_product_type' => 'required',
            'r_equipment_type' => 'required',
            'r_brand' => 'required',
            'r_model' => 'required',
            'r_capacity' => 'required',
            'r_work' => 'required',
            'r_year' => 'required',
            'r_project' => 'required',
            'address' => 'required',
        ],[], 
		[
			'type' => 'Product type', 
			'r_product_type' => 'Equipment type', 
			'r_equipment_type' => 'Equipment type', 
			'r_brand' => 'Brand', 
			'r_year' => 'Year', 
			'r_model' => 'Model', 
			'r_capacity' => 'Capacity', 
			'r_work' => 'Work', 
			'r_project' => 'Project', 
			'address' => 'Address', 
		]
			);
		
		
		
		$values_details = array(
		"type"=>$request->input('type'),
		"r_product_type"=>$request->input('r_product_type'),
		"r_equipment_type"=>$request->input('r_equipment_type'),
		"r_brand"=>$request->input('r_brand'),
		"r_model"=>$request->input('r_model'),
		"r_capacity"=>$request->input('r_capacity'),
		"r_work"=>$request->input('r_work'),
		"r_year"=>$request->input('r_year'),
		"r_project"=>$request->input('r_project'),
		"address"=>$request->input('address'),
		"r_status"=>1,
		);
      
		//$values = $request->except('url');
		//dd($values);
        Requestforequipment::create($values_details);

        return redirect('/requests');

    }
	/**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function requestsenior($id)
    {  	
	
		$projects = DB::table('projects')->get();
		$brands_equipment = DB::table('brands_equipment')->get();
		$project_sites = DB::table('project_sites')->get();
		$vendors = DB::table('vendors')->get(); 
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project','left')
					->join('project_sites', 'project_sites.site_id', '=', 'requestforequipments.r_project_site','left')
					->join('vendors', 'vendors.vendor_id', '=', 'requestforequipments.r_vendor_id','left')
					->select('requestforequipments.*', 'projects.*', 'vendors.*','project_sites.*','projects.city as pcity','projects.state as pstate')
					->where('requestforequipments.r_id', $id)
					->get(); 
		 
		$request = $requests[0]; 
		//dd($request);
		return view('requests.requestsenior', compact('request','vendors','projects','project_sites','brands_equipment'));
    } 
	public function frequestsenior($id)
    {  	
	
		$projects = DB::table('projects')->get();
		$brands_equipment = DB::table('brands_equipment')->get();
		$project_sites = DB::table('project_sites')->get();
		$vendors = DB::table('vendors')->get(); 
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project','left')
					->join('project_sites', 'project_sites.site_id', '=', 'requestforequipments.r_project_site','left')
					->join('vendors', 'vendors.vendor_id', '=', 'requestforequipments.r_vendor_id','left')
					->select('requestforequipments.*', 'projects.*', 'vendors.*','project_sites.*','projects.city as pcity','projects.state as pstate')
					->where('requestforequipments.r_id', $id)
					->get(); 
		 
		$request = $requests[0]; 
		//dd($request);
		return view('requests.frequestsenior', compact('request','vendors','projects','project_sites','brands_equipment'));
    }
	
	  /**
	 * Store a newly created product in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function addseniorrequest(Request $request)
    {

       
		$values = $request->except('url');
		
		 
		$updateDetails = [
			'rental_start_date' => $request->get('rental_start_date'),
			'rental_end_date' => $request->get('rental_end_date'),
			'noofdays' => $request->get('noofdays'),
			'rental_cost' => $request->get('rental_cost'),
			'r_vendor_id' => $request->get('r_vendor_id'),
			'billing_cycle' => $request->get('billing_cycle'),
			'noofdays_type' => $request->get('noofdays_type'),
			'rental_cost_type' => $request->get('rental_cost_type'),
			'billing_cycle_type' => $request->get('billing_cycle_type'),
			'r_status' => 2
		];

		DB::table('requestforequipments')
			->where('r_id', $request->get('r_id'))
			->update($updateDetails);
       

        return redirect('/requests/requestwidgetclick/1');

    }
	
	
	
	
	public function requestvendor($id){ 
		$projects = DB::table('projects')->get();
		$vendors = DB::table('vendors')->get(); 
		$brands_equipment = DB::table('brands_equipment')->get();
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project','left')
					->join('project_sites', 'project_sites.site_id', '=', 'requestforequipments.r_project_site','left')
					->join('vendors', 'vendors.vendor_id', '=', 'requestforequipments.r_vendor_id','left')
					->select('requestforequipments.*', 'projects.*', 'vendors.*','project_sites.*')
					->where('requestforequipments.r_id', $id)
					->get(); 
		 
		$request = $requests[0]; 
		//dd($request);
		return view('requests.requestvendor', compact('request','vendors','projects','brands_equipment'));
    }
	public function requestvendorapprove($id){ 
		$projects = DB::table('projects')->get();
		$vendors = DB::table('vendors')->get(); 
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project','left')
					->join('vendors', 'vendors.vendor_id', '=', 'requestforequipments.r_vendor_id','left')
					->select('requestforequipments.*', 'projects.*', 'vendors.*')
					->where('requestforequipments.r_id', $id)
					->get(); 
		 
		$request = $requests[0]; 
		//dd($request);
		return view('requests.requestvendorapprove', compact('request','vendors','projects'));
    }
	
	public function addvendorrequest(Request $request){

       $values = $request->except('url');
		foreach ($_FILES['r_image']['tmp_name'] as $key => $value) {
              
            $file_tmpname = $_FILES['r_image']['tmp_name'][$key];
            $file_name = $_FILES['r_image']['name'][$key];
   
            //$filepath = "/home/ubuntu/infraweb/public/images/".time().$file_name;
            $filepath = "C:/xampp/htdocs/tatainfra/public/images/".time().$file_name;
  
                  move_uploaded_file($file_tmpname, $filepath);
				  
                       $imagename[] = time().$file_name;
                    
                }
			 
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
		 //$d_insurance_path = "/home/ubuntu/infraweb/public/images/".time().$d_insurance_name;
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
		$updateDetails = [
			"rc_start_date"=>$request->input('rc_start_date'),
			"r_wom"=>$request->input('r_wom'),
			"r_uom"=>$request->input('r_uom'),
			"rc_end_date"=>$request->input('rc_end_date'),
			"ins_start_date"=>$request->input('ins_start_date'),
			"ins_end_date"=>$request->input('ins_end_date'),
			"tax_start_date"=>$request->input('tax_start_date'),
			"tax_end_date"=>$request->input('tax_end_date'),
			"permit_end_date"=>$request->input('permit_end_date'),
			"permit_start_date"=>$request->input('permit_start_date'),
			"fitness_end_date"=>$request->input('fitness_end_date'),
			"fitness_start_date"=>$request->input('fitness_start_date'),
			"e_vehicle_number"=>$request->input('e_vehicle_number'),
			"e_shift"=>$request->input('e_shift'),
			"e_expected_mileage"=>$request->input('e_expected_mileage'),
			"r_images"=>json_encode($imagename),
			'r_status' => 5,
			"d_vechile_rc"=>$d_vechile_rc,
		"d_insurance"=>$d_insurance,
		"d_road_tax"=>$d_road_tax,
		"d_road_permit"=>$d_road_permit,
		"d_fitness"=>$d_fitness,
		];
	 
		DB::table('requestforequipments')
			->where('r_id', $request->get('r_id'))
			->update($updateDetails);

        return redirect('home/vendor_requestequipment/1');

    }
	
	public function requestpending($id){ 
		$projects = DB::table('projects')->get();
		$vendors = DB::table('vendors')->get(); 
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project','left')
					->join('project_sites', 'project_sites.site_id', '=', 'requestforequipments.r_project_site','left')
					->join('vendors', 'vendors.vendor_id', '=', 'requestforequipments.r_vendor_id','left')
					->select('requestforequipments.*', 'projects.*', 'vendors.*','project_sites.*')
					->where('requestforequipments.r_id', $id)
					->get(); 
		 
		$request = $requests[0]; 
		//dd($request);
		return view('requests.requestpending', compact('request','vendors','projects'));
    }
	public function frequestpending($id){ 
		$projects = DB::table('projects')->get();
		$vendors = DB::table('vendors')->get(); 
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project','left')
					->join('project_sites', 'project_sites.site_id', '=', 'requestforequipments.r_project_site','left')
					->join('vendors', 'vendors.vendor_id', '=', 'requestforequipments.r_vendor_id','left')
					->select('requestforequipments.*', 'projects.*', 'vendors.*','project_sites.*')
					->where('requestforequipments.r_id', $id)
					->get(); 
		 
		$request = $requests[0]; 
		//dd($request);
		return view('requests.frequestpending', compact('request','vendors','projects'));
    }
	public function document_verification($id){ 
		$projects = DB::table('projects')->get();
		$vendors = DB::table('vendors')->get(); 
		$brands_equipment = DB::table('brands_equipment')->get();
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project','left')
					->join('project_sites', 'project_sites.site_id', '=', 'requestforequipments.r_project_site','left')
					->join('vendors', 'vendors.vendor_id', '=', 'requestforequipments.r_vendor_id','left')
					->select('requestforequipments.*', 'projects.*', 'vendors.*','project_sites.*')
					->where('requestforequipments.r_id', $id)
					->get(); 
		 
		$request = $requests[0];
//dd($request);		
		return view('requests.document_verification', compact('request','vendors','projects','brands_equipment'));
    }
	public function fdocument_verification($id){ 
		$projects = DB::table('projects')->get();
		$vendors = DB::table('vendors')->get(); 
		$brands_equipment = DB::table('brands_equipment')->get();
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project','left')
					->join('project_sites', 'project_sites.site_id', '=', 'requestforequipments.r_project_site','left')
					->join('vendors', 'vendors.vendor_id', '=', 'requestforequipments.r_vendor_id','left')
					->select('requestforequipments.*', 'projects.*', 'vendors.*','project_sites.*')
					->where('requestforequipments.r_id', $id)
					->get(); 
		 
		$request = $requests[0];
//dd($request);		
		return view('requests.fdocument_verification', compact('request','vendors','projects','brands_equipment'));
    }
	public function vpendingatclientdetails($id){ 
		$projects = DB::table('projects')->get();
		$vendors = DB::table('vendors')->get(); 
		$brands_equipment = DB::table('brands_equipment')->get();
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project','left')
					->join('project_sites', 'project_sites.site_id', '=', 'requestforequipments.r_project_site','left')
					->join('vendors', 'vendors.vendor_id', '=', 'requestforequipments.r_vendor_id','left')
					->select('requestforequipments.*', 'projects.*', 'vendors.*','project_sites.*')
					->where('requestforequipments.r_id', $id)
					->get(); 
		 
		$request = $requests[0];
//dd($request);		
		return view('requests.vpendingatclientdetails', compact('request','vendors','projects','brands_equipment'));
    }
	public function approve_contract($id){ 
		$projects = DB::table('projects')->get();
		$vendors = DB::table('vendors')->get(); 
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project','left')
					->join('vendors', 'vendors.vendor_id', '=', 'requestforequipments.r_vendor_id','left')
					->select('requestforequipments.*', 'projects.*', 'vendors.*')
					->where('requestforequipments.r_id', $id)
					->get(); 
		 
		$request = $requests[0]; 
		return view('requests.approve_contract', compact('request','vendors','projects'));
    }
	public function requestsenior_two($id){ 
		$projects = DB::table('projects')->get();
		$vendors = DB::table('vendors')->get(); 
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project','left')
					->join('vendors', 'vendors.vendor_id', '=', 'requestforequipments.r_vendor_id','left')
					->select('requestforequipments.*', 'projects.*', 'vendors.*')
					->where('requestforequipments.r_id', $id)
					->get(); 
		 
		$request = $requests[0]; 
		return view('requests.requestsenior_two', compact('request','vendors','projects'));
    }
	public function rejectedrequests_vdetails($id){ 
		$projects = DB::table('projects')->get();
		$vendors = DB::table('vendors')->get(); 
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project','left')
					->join('vendors', 'vendors.vendor_id', '=', 'requestforequipments.r_vendor_id','left')
					->select('requestforequipments.*', 'projects.*', 'vendors.*')
					->where('requestforequipments.r_id', $id)
					->get(); 
		 
		$request = $requests[0]; 
		return view('requests.rejectedrequests_vdetails', compact('request','vendors','projects'));
    }
	
	public function addsenior_tworequest(Request $request){

      $values = $request->except('url');
		
		 
		$updateDetails = [
			'rental_start_date' => $request->get('rental_start_date'),
			'rental_end_date' => $request->get('rental_end_date'),
			'noofdays' => $request->get('noofdays'),
			'rental_cost' => $request->get('rental_cost'),
			'billing_cycle' => $request->get('billing_cycle'),
			'r_status' => 4
		];

		DB::table('requestforequipments')
			->where('r_id', $request->get('r_id'))
			->update($updateDetails);

        return redirect('/requests');

    }
	
	
	public function requestwidgetclick($status)
    {
		
		$typevehicle = "Vehicle";
		$typevehiclecount = \DB::table('requestforequipments')->where('type', $typevehicle)->where('r_status', $status)
						->get();
		$typevehicle_count = $typevehiclecount->count();

		$typeequipment = "Equipment";
		$typeequipmentcount = \DB::table('requestforequipments')->where('type', $typeequipment)->where('r_status', $status)
						->get();
		$typeequipment_count = $typeequipmentcount->count();

		$jrstatus = "1";
		$newrequest = \DB::table('requestforequipments')->where('r_status', $jrstatus)
						->get();
		$newrequest_count = $newrequest->count();


		$srstatus = "2";
		$pending_vendor = \DB::table('requestforequipments')->where('r_status', $srstatus)
						->get();
		$pending_vendor_count = $pending_vendor->count();
		
				
		$vendorstatus = "3";
		$approve_vendor = \DB::table('requestforequipments')->where('r_status', $vendorstatus)
						->get();
		$approve_vendor_count = $approve_vendor->count();
	 
				
		$sr_srstatus = "4";
		$approved_request = \DB::table('requestforequipments')->where('r_status', $sr_srstatus)
						->get();
		$approved_request_count = $approved_request->count();
		
		$sr_srstatus = "6";
		$approved_request = \DB::table('requestforequipments')->where('r_status', $sr_srstatus)
						->get();
		$rejected_request_count = $approved_request->count();
		
		
		$sr_srstatus = "5";
		$document_verification = \DB::table('requestforequipments')->where('r_status', $sr_srstatus)
						->get();
		$document_verification_request_count = $document_verification->count();
		 
		$total_request = DB::table('requestforequipments')
							->get();
							
							
							
		$total_request_n = $total_request->count();
		
		
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project')
					->join('project_sites', 'project_sites.site_id', '=', 'requestforequipments.r_project_site','left')
					->select('requestforequipments.created_at as created','requestforequipments.*', 'projects.*','project_sites.*')
					->where('requestforequipments.r_status', $status)
					->orderBy('r_id', 'DESC')
					->get(); 	
//dd($requests);					
		$states = DB::table('states')->get();
		$projects = DB::table('projects')->get();  
         return view('requestequipment',compact('requests','projects','newrequest_count','pending_vendor_count','approve_vendor_count','approved_request_count','total_request_n','states','typevehicle_count','typeequipment_count','rejected_request_count','document_verification_request_count'));
		  
    }
	
		public function requests_detailview($id){ 
		
		 $requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project','left')
					->join('vendors', 'vendors.vendor_id', '=', 'requestforequipments.r_vendor_id','left')
					//->join('spares', 'spares.equ_id', '=', 'equipments.e_id','left')
					->select('requestforequipments.*', 'projects.*', 'vendors.*')
					->where('requestforequipments.r_id', $id)
					->get();
					/* echo "<pre>";
			print_r($equipments);
			die(); */ 
			$requests = $requests[0]; 
        return view('requests/requests_detailview', compact('requests'));
	}

	
	
	
}

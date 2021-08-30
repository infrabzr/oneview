<?php
namespace App\Http\Controllers;
use DB;
use App\Models\Requestforequipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	public function myprofile(){
			
			$id = Auth::user()->id;
			$userdetails = DB::table('users')->where("id",$id)->first();
			
			return view('vendoradmin/myprofile', compact('userdetails'));
	}
	public function updateprofile(){
			
			$id = Auth::user()->id;
			$userdetails = DB::table('users')->where("id",$id)->first();
			
			return view('vendoradmin/updateprofile', compact('userdetails'));
	}
	public function invoiceview($id){
			
			$userid = Auth::user()->id;
			$userdetails = DB::table('users')->where("id",$userid)->first();
			
			$invoicedetails = DB::table('invoices')
												->join('vendorclients', 'vendorclients.id', '=', 'invoices.client_id')
												->join('vendorequipments', 'vendorequipments.id', '=', 'invoices.equipment_id')
												->join('states', 'states.state_id', '=', 'vendorclients.state')
												->join('subcategories', 'subcategories.id', '=', 'vendorequipments.ve_equipment_type')
												->join('vendorprojects', 'vendorprojects.project_id', '=', 'invoices.project_id')
												->where("invoices.id",$id)
												->select('vendorclients.*','invoices.*','states.*','subcategories.*','vendorprojects.project_address')
												->first();
			//dd($invoicedetails);
			return view('vendoradmin/invoice', compact('userdetails','invoicedetails'));
	}
	public function storeprofile(Request $request){
			
			 /****profile image **/
			$d_vechile_rc_tmpname1 = $_FILES['profile_image']['tmp_name'];
			$d_vechile_rc_name = $_FILES['profile_image']['name'];
			$d_vechile_rc_path = "C:/xampp/htdocs/tatainfra/public/images/".time().$d_vechile_rc_name;
			$profile_image = time().$d_vechile_rc_name;
			move_uploaded_file($d_vechile_rc_tmpname1, $d_vechile_rc_path);
			
			$id = Auth::user()->id;
			$updateDetails = array(
			"name"=>$request->input('name'),
			"email"=>$request->input('email'),
			"primary_mobile"=>$request->input('primary_mobile'),
			"secondary_mobile"=>$request->input('secondary_mobile'),
			"address"=>$request->input('address'),
			"state"=>$request->input('state'),
			"pincode"=>$request->input('pincode'),
			"business_name"=>$request->input('business_name'),
			"bank_name"=>$request->input('bank_name'),
			"account_number"=>$request->input('account_number'),
			"pan"=>$request->input('pan'),
			"gst"=>$request->input('gst'),
			"profile_image"=>$profile_image,
			);
			DB::table('users')
						->where('id', $id)
						->update($updateDetails); 
			
			 return redirect('/home/myprofile')->with('status', "your profile has been successfully updated");
	}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
	   public function superadmin()
    {
		// $equipment_type = $request->input('equipment_type');
		// echo "hi";
		// echo $equipment_type;
		
		return redirect('/home/equipmentstatistics'); 
        return view('superadmin');
    } 
	public function senior()
    {
		// $equipment_type = $request->input('equipment_type');
		// echo "hi";
		// echo $equipment_type;
		
		
        return view('superadmin');
    }
	public function vendor()
    {
		 return redirect('/home/vendor_equipmentdetails');
		$equipment = DB::table('equipments')
					->select('e_equipment_type')
					->groupBy('e_equipment_type')
					->get();
		$project_type = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->select('projects.project_type')
					->groupBy('projects.project_type')
					->get();
		$equipemntdata = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->select('equipments.*', 'projects.*','equipments_details.*')
					->get();
					
			$states = DB::table('states')->get();
			 $id = Auth::user()->id; 
			$sqlQuery = "SELECT e_equipment_type, COUNT(e_equipment_type) AS count FROM equipments join project_sites on project_sites.project_id = equipments.e_project_code where field_supervisor_id=$id GROUP BY e_equipment_type";
			$piechartdata = DB::select(DB::raw($sqlQuery));
			$equipments = "SELECT COUNT(`e_id`) AS count FROM equipments join project_sites on project_sites.project_id = equipments.e_project_code where field_supervisor_id=$id and `e_vehicle_number`='N/A'";
			$equipmentscount = DB::select(DB::raw($equipments));
			$vehicles = "SELECT COUNT(`e_id`) AS count FROM equipments join project_sites on project_sites.project_id = equipments.e_project_code where field_supervisor_id=$id and `e_vehicle_number`!='N/A'";
			$vehiclescount = DB::select(DB::raw($vehicles));
			$project = "SELECT projects.project_name,project_sites.site_name,projects.project_code,projects.phase FROM projects join project_sites on project_sites.project_id = projects.project_id where project_sites.field_supervisor_id=$id";
			$projectdata = DB::select(DB::raw($project));
			DB::enableQueryLog();
			$equipments = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->join('project_sites', 'project_sites.project_id', '=', 'equipments.e_project_code')
					->where('project_sites.field_supervisor_id', $id)
					->select('equipments.*','equipments_details.*')
					->get();
			// dd($equipments);
		// $query = DB::getQueryLog();
				// dd($query); 
        return view('vendors/dashboard',compact('project_type','equipment','vehiclescount','equipmentscount','piechartdata','projectdata','equipments','equipemntdata','states'));
		
       // return view('vendors/dashboard');
    }
	public function vendoradmin()
    {
		$id = Auth::user()->id; 
					$checkequipmentcount =DB::table('vendorequipments')
											->where("ve_vendor_id",$id)->whereNull('deleted_at')
											->get()
											->count();
					if($checkequipmentcount){
						
					}else{
						return redirect('/vendorequipment')->with('error', "You don't have Equipments, Please add  at least one Equipment");
					}
		
		/*pie chart data start*/
		
		 $lastdays = date('Y-m-d', strtotime('today + 60 days'));
		
		$numberofequipment=0;
		$count = 0;
		/*******invoice start******/
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
		/**invoice end */
		/**pending paymnets*/
		$pendingpaymnets = \DB::table('invoices')
						->where('vendor_admin_id', $id)
						->where('amount_status', 2)
						->select('invoices.company_name','invoices.total')
						->get();
						
		//dd($pendingpaymnets);
		/**end pending paymnets*/
		
		
		//DB::enableQueryLog();
			$currentdate = date('Y-m-d');
			
			$dexpiryquery = "select * from `vendorequipments` inner join `vendorequipmendetails` on `vendorequipmendetails`.`ve_id` = `vendorequipments`.`id` where vendorequipments.deleted_at is NULL and vendorequipments.ve_vendor_id= $id and `vendorequipmendetails`.`rc_end_date` between '$currentdate' AND '$lastdays' OR `vendorequipmendetails`.`ins_end_date` between '$currentdate' AND '$lastdays' OR `vendorequipmendetails`.`tax_end_date` between '$currentdate' AND '$lastdays' OR `vendorequipmendetails`.`permit_end_date` between '$currentdate' AND '$lastdays' OR `vendorequipmendetails`.`fitness_end_date` between '$currentdate' AND '$lastdays' ";
				$dexpiry_count = DB::select(DB::raw($dexpiryquery));	
			
			 
		//$query = DB::getQueryLog(); 
		//print_r($query);
				 $dexpiry_count = (count($dexpiry_count)); 
				// dd($dexpiry_count);
$total_equipment = DB::table('vendorequipments')->where('ve_vendor_id',$id)->whereNull('vendorequipments.deleted_at')
					->get();
$total_equipment_n = $total_equipment->count();

		 $dayscount = date('t'); 
//die();		/// it return last date of current month
		$idleequipment = DB::table('vendorequipments')
					->where('vendorequipments.ve_vendor_id',$id)
					->where('vendorequipments.working_count','!=' , $dayscount)
					->get();
$idleequipmentcount = $idleequipment->count();

$llastdays = date('Y-m-d', strtotime('today - 60 days'));
		$correctedComparisons1 = "rentedout"; 
		$lexpiry = DB::table('vendorequipments')
					->join('vendorequipmendetails', 'vendorequipmendetails.ve_id', '=', 'vendorequipments.id')
					->where('vendorequipments.ve_vendor_id',$id)
					->where('vendorequipments.ve_product_type', $correctedComparisons1)
					->whereBetween('vendorequipmendetails.ve_rental_end_date', [$llastdays, $currentdate])
					->select('vendorequipments.*')
					->get();
		$lexpiry_count = $lexpiry->count();



		/*pie end*/
		// return redirect('/home/vendor_equipmentdetails');
		$equipment = DB::table('equipments')
					->select('e_equipment_type')
					->groupBy('e_equipment_type')
					->get();
		$project_type = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->select('projects.project_type')
					->groupBy('projects.project_type')
					->get();
		$equipemntdata = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->select('equipments.*', 'projects.*','equipments_details.*')
					->get();
					
			$states = DB::table('states')->get();
			 
			
			$equipments = "SELECT COUNT(`e_id`) AS count FROM equipments join project_sites on project_sites.project_id = equipments.e_project_code where field_supervisor_id=$id and `e_vehicle_number`='N/A'";
			$equipmentscount = DB::select(DB::raw($equipments));
			$vehicles = "SELECT COUNT(`e_id`) AS count FROM equipments join project_sites on project_sites.project_id = equipments.e_project_code where field_supervisor_id=$id and `e_vehicle_number`!='N/A'";
			$vehiclescount = DB::select(DB::raw($vehicles));
			$project = "SELECT projects.project_name,project_sites.site_name,projects.project_code,projects.phase FROM projects join project_sites on project_sites.project_id = projects.project_id where project_sites.field_supervisor_id=$id";
			$projectdata = DB::select(DB::raw($project));
			DB::enableQueryLog();
			$equipments = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->join('project_sites', 'project_sites.project_id', '=', 'equipments.e_project_code')
					->where('project_sites.field_supervisor_id', $id)
					->select('equipments.*','equipments_details.*')
					->get();
			// dd($equipments);
		// $query = DB::getQueryLog();
				// dd($query); 
		$sqlQuery = "SELECT subcategories.sub_category_name,ve_equipment_type, COUNT(*) AS Total , (COUNT(*) / (SELECT COUNT(*) FROM vendorequipments WHERE `ve_vendor_id` = $id)) * 100 AS 'Percentage' FROM  vendorequipments join subcategories on subcategories.id =vendorequipments.ve_equipment_type WHERE `ve_vendor_id` = $id GROUP BY ve_equipment_type";
			$piechartdata = DB::select(DB::raw($sqlQuery));	
			
			$sqlQuery1 = "SELECT  COUNT(*) AS Total  FROM  vendorequipments WHERE `ve_vendor_id` = $id";
			$piechartdatatotal = DB::select(DB::raw($sqlQuery1));

			
			
			
			$sqlQuery1 = "SELECT ve_product_type, COUNT(*) AS Total FROM vendorequipments WHERE `ve_vendor_id`=$id and deleted_at is NULL GROUP BY ve_product_type";
			$barchartdata = DB::select(DB::raw($sqlQuery1));
			$sqlQueryUnengaged = "SELECT ve_product_type, COUNT(*) AS Total FROM vendorequipments WHERE `ve_vendor_id`=$id and ve_product_type='avaliable' and deleted_at is NULL GROUP BY ve_product_type";
			$barchartdataUnengaged = DB::select(DB::raw($sqlQueryUnengaged));
			$sqlQueryrentedout = "SELECT ve_product_type, COUNT(*) AS Total FROM vendorequipments WHERE `ve_vendor_id`=$id and ve_product_type='rentout' and deleted_at is NULL GROUP BY ve_product_type";
			$barchartdatarentedout = DB::select(DB::raw($sqlQueryrentedout));
			
			
			
			//dd($barchartdatarentedout);
			$workingquery = "SELECT (SELECT COUNT(*) FROM `vendorequipments` WHERE ve_status =1 and ve_vendor_id=$id and deleted_at is NULL) as total, (SELECT count(*) FROM `vendorequipments` WHERE ve_product_type='rentout' and ve_status =1 and ve_vendor_id=$id and deleted_at is NULL) as rentedoutcount, (SELECT count(*) FROM `vendorequipments` WHERE ve_product_type='avaliable' and ve_status =1 and ve_vendor_id=$id and deleted_at is NULL) as unengagedcount";
			$workingdata = DB::select(DB::raw($workingquery));
			//dd($workingdata);
			$breakdownquery = "SELECT (SELECT COUNT(*) FROM `vendorequipments` WHERE ve_status =2 and ve_vendor_id=$id and deleted_at is NULL) as total, (SELECT count(*) FROM `vendorequipments` WHERE ve_product_type='rentout' and ve_status =2 and ve_vendor_id=$id and deleted_at is NULL) as rentedoutcount, (SELECT count(*) FROM `vendorequipments` WHERE ve_product_type='avaliable' and ve_status =2 and ve_vendor_id=$id and deleted_at is NULL) as unengagedcount";
			$breakdowndata = DB::select(DB::raw($breakdownquery));
			
			$piebreakdownquery = "SELECT * FROM `vendorequipments` WHERE ve_product_type='rentout' and ve_status =2 and deleted_at is NULL";
			$piebreakdowndata = DB::select(DB::raw($piebreakdownquery));
			
$brackdownequipmentcount = (count($piebreakdowndata));	

			$dalycheckups = "Select (SELECT COUNT(*) etotal FROM `vendorequipments` where ve_product_type='rentout'  and ve_vendor_id=$id) as total, (SELECT count(*) as total FROM `equipmentdalycheckups` join vendorequipments on  vendorequipments.id = equipmentdalycheckups.equ_id WHERE equipmentdalycheckups.created_at LIKE '%$currentdate%' and vendorequipments.ve_vendor_id=$id) as dalycheckup";
			$dalycheckups_count = DB::select(DB::raw($dalycheckups));

			$dprpening = "Select (SELECT COUNT(*) etotal FROM `vendorequipments` where ve_product_type='rentout' and ve_vendor_id=$id) - (SELECT count(*) as total FROM `dprdetails` join vendorequipments on  vendorequipments.id = dprdetails.e_id WHERE `date` LIKE '%$currentdate%'  and ve_vendor_id=$id) as dprpending";
			$dprpening_count = DB::select(DB::raw($dprpening));

			$readyforservice = "SELECT (SELECT count(*) FROM `servicecheckups` join vendorequipments on  vendorequipments.id = servicecheckups.equ_id WHERE `serviced_date` BETWEEN '$lastdays' AND '$currentdate'  and ve_vendor_id=$id) - (SELECT COUNT(*) etotal FROM `vendorequipments` where ve_product_type='rentout  and ve_vendor_id=$id') as readyforservice";
			$readyforservice_count = DB::select(DB::raw($readyforservice));	
			//dd($readyforservice_count);
			
					
			 $spareparts = "SELECT sparepartscategories.name, count(*) as count FROM `spareparts` join sparepartscategories on sparepartscategories.id = spareparts.category_id WHERE spareparts.vendoradmin_id = $id group by spareparts.category_id";
			$sparepartsdata =  DB::select(DB::raw($spareparts));	
		//	dd($sparepartscount);
		$sparecount =  \DB::table('spareparts')
						->where('vendoradmin_id', $id)
						
						->get();
		
        return view('vendoradmin/dashboard',compact('project_type','equipment','vehiclescount','equipmentscount','piechartdata','projectdata','equipments','equipemntdata','states','barchartdata','piechartdatatotal','workingdata','breakdowndata','dexpiry_count','total_equipment_n','idleequipmentcount','lexpiry_count','brackdownequipmentcount','dalycheckups_count','dprpening_count','readyforservice_count','vendorprojects','pendingpaymnets','sparepartsdata','sparecount','barchartdatarentedout','barchartdataUnengaged'));
		
       // return view('vendors/dashboard');
    }
	public function finance()
    {
		// $equipment_type = $request->input('equipment_type');
		// echo "hi";
		// echo $equipment_type;
		
		
        return view('finance');
    }
    public function index()
    {
		// $equipment_type = $request->input('equipment_type');
		// echo "hi";
		// echo $equipment_type; own_equipment_count 
		$correctedComparisons = "Own";
		$own_equipment = \DB::table('equipments')->where('e_product_type', $correctedComparisons)
						->get();
		$own_equipment_count = $own_equipment->count();


		$correctedComparisons = "Rent";
		$rent_equipment = \DB::table('equipments')->where('e_product_type', $correctedComparisons)
						->get();
		$rent_equipment_count = $rent_equipment->count();


		$equipment = DB::table('equipments')
					->select('e_equipment_type')
					->groupBy('e_equipment_type')
					->get();
		$project_type = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->select('projects.project_type')
					->groupBy('projects.project_type')
					->get();
		$equipments = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->select('equipments.*', 'projects.*')
					->get();
					 
			$states = DB::table('states')->get();
        return view('home', compact('own_equipment_count','rent_equipment_count','equipment','equipments','project_type','states'));
    }
    public function equipment_details()
    {
		$id = Auth::user()->id; 
		// $equipment_type = $request->input('equipment_type');
		// echo "hi";
		// echo $equipment_type; own_equipment_count
		$sqlQuery = "SELECT e_equipment_type, COUNT(e_equipment_type) AS count FROM equipments GROUP BY e_equipment_type";
			$piechartdata = DB::select(DB::raw($sqlQuery));		
		$correctedComparisons = "Own";
		$own_equipment =DB::table('equipments')
					//->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->join('project_sites', 'project_sites.project_id', '=', 'equipments.e_project_code')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->where('project_sites.field_supervisor_id', $id)
					->where('equipments.e_product_type', $correctedComparisons)
					->select('equipments.*', 'projects.*')
					->get();
		
		$own_equipment_count = $own_equipment->count();


		$correctedComparisons = "Rent";
		$rent_equipment =DB::table('equipments')
					//->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->join('project_sites', 'project_sites.project_id', '=', 'equipments.e_project_code')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->where('project_sites.field_supervisor_id', $id)
					->where('equipments.e_product_type', $correctedComparisons)
					->select('equipments.*', 'projects.*')
					->get();
		$rent_equipment_count = $rent_equipment->count();


		$equipment = DB::table('equipments')
					->select('e_equipment_type')
					->groupBy('e_equipment_type')
					->get();
		$project_type = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->select('projects.project_type')
					->groupBy('projects.project_type')
					->get();
					$id = Auth::user()->id; 
		$equipments = DB::table('equipments')
					//->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->join('project_sites', 'project_sites.project_id', '=', 'equipments.e_project_code')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->where('project_sites.field_supervisor_id', $id)
					->select('equipments.*', 'projects.*')
					->get();
					 
			$states = DB::table('states')->get();
        return view('fieldsupervisor.equipment_details', compact('piechartdata','own_equipment_count','rent_equipment_count','equipment','equipments','project_type','states'));
    }
	
	public function equipment_detailssearch(Request $request){
		
		$equipment = DB::table('equipments')
					->select('e_equipment_type')
					->groupBy('e_equipment_type')
					->get();

					$equipments = DB::table('equipments')
								->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
								->select('equipments.*', 'projects.*')
								->get();
		//DB::enableQueryLog(); 
		
					$states_cities = $request->input('states_cities');
					$project_type = $request->input('project_type');
					$project_code = $request->input('project_code');
					$e_product_type = $request->input('product_type');
					$e_equipment_type = $request->input('equipment_type');
				//DB::enableQueryLog();
					$query = DB::table('equipments');
							$query->join('projects', 'projects.project_id', '=', 'equipments.e_project_code');
							$query->select('equipments.*', 'projects.*');
					// Conditionally add another where
							if($states_cities) { $query->orWhere('projects.state', $states_cities); }
							if($project_type) { $query->orWhere('projects.project_type', $project_type); }
							if($project_code) { $query->orWhere('projects.project_code', $project_code); }
							if($e_product_type)  { $query->orWhere('equipments.e_product_type', $e_product_type); }
							
							if($e_equipment_type)  { $query->orWhere('equipments.e_equipment_type', $e_equipment_type); }
					$equipmentsdata = $query->get();
				//$query = DB::getQueryLog();
				//dd($query);
		$correctedComparisons = "Own";
		$own_equipment = \DB::table('equipments')->where('e_product_type', $correctedComparisons)
						->get();
		$own_equipment_count = $own_equipment->count();


		$correctedComparisons = "Rent";
		$rent_equipment = \DB::table('equipments')->where('e_product_type', $correctedComparisons)
						->get();
		$rent_equipment_count = $rent_equipment->count();	
		$states = DB::table('states')->get();
$sqlQuery = "SELECT e_equipment_type, COUNT(e_equipment_type) AS count FROM equipments GROUP BY e_equipment_type";
			$piechartdata = DB::select(DB::raw($sqlQuery));		
        return view('fieldsupervisor.es_search', compact('piechartdata','own_equipment_count','rent_equipment_count','equipmentsdata','equipments','states','equipment'));
		
	}public function search(Request $request){
		
		$equipment = DB::table('equipments')
					->select('e_equipment_type')
					->groupBy('e_equipment_type')
					->get();

					$equipments = DB::table('equipments')
								->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
								->select('equipments.*', 'projects.*')
								->get();
		//DB::enableQueryLog(); 
		
					$states_cities = $request->input('states_cities');
					$project_type = $request->input('project_type');
					$project_code = $request->input('project_code');
					$e_product_type = $request->input('product_type');
					$e_equipment_type = $request->input('equipment_type');
				//DB::enableQueryLog();
					$query = DB::table('equipments');
							$query->join('projects', 'projects.project_id', '=', 'equipments.e_project_code');
							$query->select('equipments.*', 'projects.*');
					// Conditionally add another where
							if($states_cities) { $query->orWhere('projects.state', $states_cities); }
							if($project_type) { $query->orWhere('projects.project_type', $project_type); }
							if($project_code) { $query->orWhere('projects.project_code', $project_code); }
							if($e_product_type)  { $query->orWhere('equipments.e_product_type', $e_product_type); }
							
							if($e_equipment_type)  { $query->orWhere('equipments.e_equipment_type', $e_equipment_type); }
					$equipmentsdata = $query->get();
				//$query = DB::getQueryLog();
				//dd($query);
		$correctedComparisons = "Own";
		$own_equipment = \DB::table('equipments')->where('e_product_type', $correctedComparisons)
						->get();
		$own_equipment_count = $own_equipment->count();


		$correctedComparisons = "Rent";
		$rent_equipment = \DB::table('equipments')->where('e_product_type', $correctedComparisons)
						->get();
		$rent_equipment_count = $rent_equipment->count();	
		$states = DB::table('states')->get();		
        return view('e_search', compact('own_equipment_count','rent_equipment_count','equipmentsdata','equipments','states','equipment'));
		
	}
	public function rentalleaseexpiry(){
		
			//DB::enableQueryLog();
			$lastdays = date('Y-m-d', strtotime('today - 60 days'));
			$currentdate = date('Y-m-d');
			$dexpiry = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->whereBetween('equipments_details.rc_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.ins_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.tax_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.permit_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.fitness_end_date', [$lastdays, $currentdate])
					->get();
		 $dexpiry_count = $dexpiry->count();


		$llastdays = date('Y-m-d', strtotime('today - 60 days'));
		$correctedComparisons1 = "Rent"; 
		$lexpiry = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->where('equipments.e_product_type', $correctedComparisons1)
					->whereBetween('equipments_details.e_rental_end_date', [$llastdays, $currentdate])
					->select('equipments.*', 'projects.*')
					->get();
		$lexpiry_count = $lexpiry->count();
		$total_equipment = DB::table('equipments')
					->get();
		$total_equipment_n = $total_equipment->count();
		$blastdays = date('Y-m-d', strtotime('today - 5 days'));
		$reminder = DB::table('equipments')
					->join('equipment_billing', 'equipment_billing.equ_id', '=', 'equipments.e_id')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->whereBetween('equipment_billing.end_date', [$blastdays, $currentdate])
					->select('equipments.*', 'projects.*')
					->get();	
			$bremindercount = $reminder->count();


			$lastdays = date('Y-m-d', strtotime('today - 60 days'));
					$currentdate = date('Y-m-d');
			$correctedComparisons = "Own";
		$own_equipment = \DB::table('equipments')->where('e_product_type', $correctedComparisons)
						->get();
		$own_equipment_count = $own_equipment->count();


		$correctedComparisons = "Rent";
		
		
		
		
		$rent_equipment = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->where('equipments.e_product_type', $correctedComparisons)
					->whereBetween('equipments_details.e_rental_end_date', [$lastdays, $currentdate])
					->select('equipments.*', 'projects.*')
					->get();
		$rent_equipment_count = $rent_equipment->count();
		

			$equipment = DB::table('equipments')
					->select('e_equipment_type')
					->groupBy('e_equipment_type')
					->get();
			$project_type = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->select('projects.project_type')
					->groupBy('projects.project_type')
					->get();
					$lastdays = date('Y-m-d', strtotime('today - 60 days'));
					$currentdate = date('Y-m-d');
					//DB::enableQueryLog();	
					$correctedComparisons1 = "Rent";
			$equipments = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->where('equipments.e_product_type', $correctedComparisons1)
					->whereBetween('equipments_details.e_rental_end_date', [$lastdays, $currentdate])
					->select('equipments.*', 'projects.*')
					->get();
					//$query = DB::getQueryLog();
				//dd($query); 
			$states = DB::table('states')->get();
			
			$dayscount = date('t');   
			$idleequipment = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->where('equipments.working_count','!=' , $dayscount)
					->select('equipments.*', 'projects.*')
					->get();
			$idleequipmentcount = $idleequipment->count();

        return view('rentalleaseexpiry', compact('idleequipmentcount','total_equipment_n','bremindercount','lexpiry_count','dexpiry_count','own_equipment_count','rent_equipment_count','equipment','equipments','project_type','states'));
	}
	public function documentsexpiry(){
$lastdays = date('Y-m-d', strtotime('today - 60 days'));
			$currentdate = date('Y-m-d');
			$dexpiry = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->whereBetween('equipments_details.rc_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.ins_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.tax_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.permit_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.fitness_end_date', [$lastdays, $currentdate])
					->get();
		$dexpiry_count = $dexpiry->count();


		$llastdays = date('Y-m-d', strtotime('today - 60 days'));
		$correctedComparisons1 = "Rent"; 
		$lexpiry = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->where('equipments.e_product_type', $correctedComparisons1)
					->whereBetween('equipments_details.e_rental_end_date', [$llastdays, $currentdate])
					->select('equipments.*', 'projects.*')
					->get();
		$lexpiry_count = $lexpiry->count();
$total_equipment = DB::table('equipments')
					->get();
$total_equipment_n = $total_equipment->count();
		$blastdays = date('Y-m-d', strtotime('today - 5 days'));
		$reminder = DB::table('equipments')
					->join('equipment_billing', 'equipment_billing.equ_id', '=', 'equipments.e_id')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->whereBetween('equipment_billing.end_date', [$blastdays, $currentdate])
					->select('equipments.*', 'projects.*')
					->get();	
$bremindercount = $reminder->count();
		$lastdays = date('Y-m-d', strtotime('today - 30 days'));
			$currentdate = date('Y-m-d');
			$correctedComparisons = "Own";
		$own_equipment = \DB::table('equipments')->where('e_product_type', $correctedComparisons)
						->get();
		$own_equipment_count = $own_equipment->count();


		$correctedComparisons = "Rent";
		$rent_equipment = \DB::table('equipments')->where('e_product_type', $correctedComparisons)
						->get();
		$rent_equipment_count = $rent_equipment->count();

		$equipment = DB::table('equipments')
					->select('e_equipment_type')
					->groupBy('e_equipment_type')
					->get();
		$project_type = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->select('projects.project_type')
					->groupBy('projects.project_type')
					->get();
		$lastdays = date('Y-m-d', strtotime('today - 60 days'));
		$currentdate = date('Y-m-d');
		$equipments = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->whereBetween('equipments_details.rc_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.ins_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.tax_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.permit_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.fitness_end_date', [$lastdays, $currentdate])
					->select('equipments.*', 'projects.*')
					->get();
					 
			$states = DB::table('states')->get();
			
			$dayscount = date('t');   
		$idleequipment = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->where('equipments.working_count','!=' , $dayscount)
					->select('equipments.*', 'projects.*')
					->get();
$idleequipmentcount = $idleequipment->count();
// dd($rent_equipment_count);
        return view('documentsexpiry', compact('idleequipmentcount','total_equipment_n','bremindercount','lexpiry_count','dexpiry_count','own_equipment_count','rent_equipment_count','equipment','equipments','project_type','states'));
	}
	public function paymentreminder(){
			$lastdays = date('Y-m-d', strtotime('today - 30 days'));
			$currentdate = date('Y-m-d');
			$dexpiry = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->whereBetween('equipments_details.rc_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.ins_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.tax_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.permit_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.fitness_end_date', [$lastdays, $currentdate])
					->get();
		$dexpiry_count = $dexpiry->count();


		$llastdays = date('Y-m-d', strtotime('today - 30 days'));
		$correctedComparisons1 = "Rent"; 
		$lexpiry = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->where('equipments.e_product_type', $correctedComparisons1)
					->whereBetween('equipments_details.e_rental_end_date', [$llastdays, $currentdate])
					->select('equipments.*', 'projects.*')
					->get();
		$lexpiry_count = $lexpiry->count();
$total_equipment = DB::table('equipments')
					->get();
$total_equipment_n = $total_equipment->count();
		$blastdays = date('Y-m-d', strtotime('today - 5 days'));
		$reminder = DB::table('equipments')
					->join('equipment_billing', 'equipment_billing.equ_id', '=', 'equipments.e_id')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->whereBetween('equipment_billing.end_date', [$blastdays, $currentdate])
					->select('equipments.*', 'projects.*')
					->get();	
$bremindercount = $reminder->count();
		$correctedComparisons = "Own";
		$own_equipment = \DB::table('equipments')->where('e_product_type', $correctedComparisons)
						->get();
		$own_equipment_count = $own_equipment->count();


		$correctedComparisons = "Rent";
		$rent_equipment = \DB::table('equipments')->where('e_product_type', $correctedComparisons)
						->get();
		$rent_equipment_count = $rent_equipment->count();


		$equipment = DB::table('equipments')
					->select('e_equipment_type')
					->groupBy('e_equipment_type')
					->get();
		$project_type = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->select('projects.project_type')
					->groupBy('projects.project_type')
					->get();
		$lastdays = date('Y-m-d', strtotime('today - 5 days'));
		$currentdate = date('Y-m-d');
		$equipments = DB::table('equipments')
					->join('equipment_billing', 'equipment_billing.equ_id', '=', 'equipments.e_id')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->whereBetween('equipment_billing.end_date', [$lastdays, $currentdate])
					->select('equipments.*', 'projects.*')
					->get();	 
			$states = DB::table('states')->get();
			$dayscount = date('t');   
		$idleequipment = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->where('equipments.working_count','!=' , $dayscount)
					->select('equipments.*', 'projects.*')
					->get();
$idleequipmentcount = $idleequipment->count();
        return view('paymentreminder', compact('idleequipmentcount','total_equipment_n','bremindercount','lexpiry_count','dexpiry_count','own_equipment_count','rent_equipment_count','equipment','equipments','project_type','states'));
	}
	public function equipmentstatistics(){
			
			$correctedComparisons = "Own";
		$own_equipment = \DB::table('equipments')->where('e_product_type', $correctedComparisons)
						->get();
		$own_equipment_count = $own_equipment->count();


		$correctedComparisons = "Rent";
		$rent_equipment = \DB::table('equipments')->where('e_product_type', $correctedComparisons)
						->get();
		$rent_equipment_count = $rent_equipment->count();

		
		$lastdays = date('Y-m-d', strtotime('today - 60 days'));
			$currentdate = date('Y-m-d');
			$dexpiry = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->whereBetween('equipments_details.rc_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.ins_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.tax_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.permit_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.fitness_end_date', [$lastdays, $currentdate])
					->get();
		$dexpiry_count = $dexpiry->count();


		$llastdays = date('Y-m-d', strtotime('today - 60 days'));
		$correctedComparisons1 = "Rent"; 
		$lexpiry = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->where('equipments.e_product_type', $correctedComparisons1)
					->whereBetween('equipments_details.e_rental_end_date', [$llastdays, $currentdate])
					->select('equipments.*', 'projects.*')
					->get();
		$lexpiry_count = $lexpiry->count();
$total_equipment = DB::table('equipments')
					->get();
$total_equipment_n = $total_equipment->count();
		$blastdays = date('Y-m-d', strtotime('today - 5 days'));
		$reminder = DB::table('equipments')
					->join('equipment_billing', 'equipment_billing.equ_id', '=', 'equipments.e_id')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->whereBetween('equipment_billing.end_date', [$blastdays, $currentdate])
					->select('equipments.*', 'projects.*')
					->get();	
		$bremindercount = $reminder->count();

		$dayscount = date('t');   /// it return last date of current month
		$idleequipment = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->where('equipments.working_count','!=' , $dayscount)
					->select('equipments.*', 'projects.*')
					->get();
$idleequipmentcount = $idleequipment->count();
 
		$equipment = DB::table('equipments')
					->select('e_equipment_type')
					->groupBy('e_equipment_type')
					->get();
		$project_type = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->select('projects.project_type')
					->groupBy('projects.project_type')
					->get();
		$equipments = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->select('equipments.*', 'projects.*')
					->get();
					 
			$states = DB::table('states')->get();
        return view('equipments/equipmentstatistics', compact('rent_equipment_count','own_equipment_count','idleequipmentcount','total_equipment_n','bremindercount','lexpiry_count','dexpiry_count','equipment','equipments','project_type','states'));
	}
	
	
	
	public function testingidle(){
		$currentdate = date('d-m-Y');   
		print_R($currentdate);
		$equipments = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->join('dprdetails', 'dprdetails.e_id', '=', 'equipments.e_id')
					->where('dprdetails.date','=' , $currentdate)
					->select('equipments.e_equipment_type','equipments.e_id','dprdetails.*')
					->get();
dd($equipments);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function idleequipment(){
			$lastdays = date('Y-m-d', strtotime('today - 30 days'));
			$currentdate = date('Y-m-d');
			$dexpiry = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->whereBetween('equipments_details.rc_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.ins_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.tax_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.permit_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.fitness_end_date', [$lastdays, $currentdate])
					->get();
		$dexpiry_count = $dexpiry->count();


		$llastdays = date('Y-m-d', strtotime('today - 30 days'));
		$correctedComparisons1 = "Rent"; 
		$lexpiry = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->where('equipments.e_product_type', $correctedComparisons1)
					->whereBetween('equipments_details.e_rental_end_date', [$llastdays, $currentdate])
					->select('equipments.*', 'projects.*')
					->get();
		$lexpiry_count = $lexpiry->count();
$total_equipment = DB::table('equipments')
					->get();
$total_equipment_n = $total_equipment->count();
		$blastdays = date('Y-m-d', strtotime('today - 5 days'));
		$reminder = DB::table('equipments')
					->join('equipment_billing', 'equipment_billing.equ_id', '=', 'equipments.e_id')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->whereBetween('equipment_billing.end_date', [$blastdays, $currentdate])
					->select('equipments.*', 'projects.*')
					->get();	
$bremindercount = $reminder->count();
		$dayscount = date('t'); 
		$correctedComparisons = "Own";
		$own_equipment = \DB::table('equipments')->where('e_product_type', $correctedComparisons)
						->get();
		$own_equipment_count = $own_equipment->count();


		$correctedComparisons = "Rent";
		$rent_equipment = \DB::table('equipments')->where('e_product_type', $correctedComparisons)
						->get();
		$rent_equipment_count = $rent_equipment->count();

		$equipment = DB::table('equipments')
					->select('e_equipment_type')
					->groupBy('e_equipment_type')
					->get();
		$project_type = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->select('projects.project_type')
					->groupBy('projects.project_type')
					->get();
					$dayscount = date('t');   
		$equipments = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->where('equipments.working_count','!=' , $dayscount)
					->select('equipments.*', 'projects.*')
					->get();
					 
			$states = DB::table('states')->get();
        return view('idleequipment', compact('total_equipment_n','bremindercount','lexpiry_count','dexpiry_count','own_equipment_count','rent_equipment_count','equipment','equipments','project_type','states'));
	}
	public function equipemntbreakdown(){

		$correctedComparisons = "Own";
		$own_equipment = \DB::table('equipments')->where('e_product_type', $correctedComparisons)
						->get();
		$own_equipment_count = $own_equipment->count();


		$correctedComparisons = "Rent";
		$rent_equipment = \DB::table('equipments')->where('e_product_type', $correctedComparisons)
						->get();
		$rent_equipment_count = $rent_equipment->count();


		$equipment = DB::table('equipments')
					->select('e_equipment_type')
					->groupBy('e_equipment_type')
					->get();
		$project_type = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->select('projects.project_type')
					->groupBy('projects.project_type')
					->get();
		$equipments = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->select('equipments.*', 'projects.*')
					->get();
					 
			$states = DB::table('states')->get();
        return view('equipemntbreakdown', compact('own_equipment_count','rent_equipment_count','equipment','equipments','project_type','states'));
	}
	public function equipmentsearch(Request $request){
		
		
					 $states_cities = $request->input('states_cities');
					 $project_type = $request->input('project_type');
					 $project_code = $request->input('project_code');
					 $e_product_type = $request->input('product_type');
					 $e_equipment_type = $request->input('equipment_type');
		
		
					$equipemntdata = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->select('equipments.*', 'projects.*','equipments_details.*')
					->get();
					
			$states = DB::table('states')->get();
			$sqlQuery = "SELECT e_equipment_type, COUNT(e_equipment_type) AS count FROM equipments GROUP BY e_equipment_type";
			$piechartdata = DB::select(DB::raw($sqlQuery));
			       //  DB::enableQueryLog();

					$query = DB::table('equipments');
					$query->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id');
					$query->join('projects', 'projects.project_id', '=', 'equipments.e_project_code');
					$query->select('equipments.*','equipments_details.*');
				// Conditionally add another where
					if($states_cities)   { $query->orWhere('projects.state', $states_cities);             }
					if($project_type)    { $query->orWhere('projects.project_type', $project_type);       }
					if($project_code)    { $query->orWhere('projects.project_code', $project_code);       }
					if($e_product_type)  { $query->orWhere('equipments.e_product_type', $e_product_type); }
					if($e_equipment_type){ $query->orWhere('equipments.e_equipment_type', $e_equipment_type); }
					$equipments = $query->get();
					//dd(DB::getQueryLog()); 
					//die();
			
        return view('dbr_view', compact('piechartdata','equipments','equipemntdata','states'));
		
	}
	public function states_cities(Request $request){
		// $cat_id = Input::get('cat_id');
		$id = $request->input('id');
		
		 if($id==1){
			$states_cities1 = DB::table('states')->get();
			}else{
				$states_cities1 = DB::table('states')->get();
			}
			return response()->json(array('msg'=> $states_cities1), 200);
		//print_r($states_cities1);
	}
	public function dbr_view()
    {
		$month = date('m');
		$equipment = DB::table('equipments')
					->select('e_equipment_type')
					->groupBy('e_equipment_type')
					->get();
		$project_type = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code',"left")
					->select('projects.project_type')
					->groupBy('projects.project_type')
					->get();
			$equipemntdata = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->select('equipments.*', 'projects.*','equipments_details.*')
					->get();
					
			$states = DB::table('states')->get();
			$sqlQuery = "SELECT e_equipment_type, COUNT(e_equipment_type) AS count FROM equipments GROUP BY e_equipment_type";
			$piechartdata = DB::select(DB::raw($sqlQuery));
			
			$equipments = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->select('equipments.*','equipments_details.*')
					->get();
					//$equipments=   json_decode(json_encode($equipments), true);	  
				/* 	$all_equipments = DB::table('equipments')->get(); 
					foreach($equipments as $key=>$all){
						$dpr[] = DB::table('dprdetails')->where('e_id', $all->e_id)   ->where(DB::raw('month(date)'),"=",$month)   ->get();
					}
					
					$equipments['dpr'] = $dpr;  
					 echo "<pre>";print_R($equipments);print_R($dpr);exit; */
					 
			$equipment_count = \DB::table('equipments')->where('e_vehicle_number', 'N/A')
						->get();
		$equipment_count_e = $equipment_count->count();
		$vehicles  = \DB::table('equipments')->where('e_vehicle_number','!=', 'N/A')
						->get();
		$vehicles_count = $vehicles->count();
        return view('dbr_view', compact('vehicles_count','equipment_count_e','piechartdata','equipments','equipment','project_type','equipemntdata','states'));
    }
	public function paymentdetails()
    {
		
			$equipemntdata = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->select('equipments.*', 'projects.*','equipments_details.*')
					->get();
					
			$states = DB::table('states')->get();
			$sqlQuery = "SELECT e_equipment_type, COUNT(e_equipment_type) AS count FROM equipments GROUP BY e_equipment_type";
			$piechartdata = DB::select(DB::raw($sqlQuery));
			
			$equipments = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->select('equipments.*','equipments_details.*')
					->get();
			
        return view('paymentdetails', compact('piechartdata','equipments','equipemntdata','states'));
    }
	
	    public function requestequipment()
    {
		
		$typevehicle = "Vehicle";
		$typevehiclecount = \DB::table('requestforequipments')->where('type', $typevehicle)
						->get();
		$typevehicle_count = $typevehiclecount->count();

		$typeequipment = "Equipment";
		$typeequipmentcount = \DB::table('requestforequipments')->where('type', $typeequipment)
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
		 
		$total_request = DB::table('requestforequipments')
							->get();
							
							
							
		$total_request_n = $total_request->count();
		
		
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project')
					->select('requestforequipments.created_at as created','requestforequipments.*', 'projects.*')
					->latest('r_id')->get(); 		 
		$states = DB::table('states')->get();
		$projects = DB::table('projects')->get();
		
         return view('requestequipment',compact('requests','projects','newrequest_count','pending_vendor_count','approve_vendor_count','approved_request_count','total_request_n','states','typevehicle_count','typeequipment_count'));
		  
    }
	
	 public function filedsupervisorrequest()
    {
		
		$typevehicle = "Vehicle";
		$typevehiclecount = \DB::table('requestforequipments')->where('type', $typevehicle)
						->get();
		$typevehicle_count = $typevehiclecount->count();

		$typeequipment = "Equipment";
		$typeequipmentcount = \DB::table('requestforequipments')->where('type', $typeequipment)
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
		 
		$total_request = DB::table('requestforequipments')
							->get();
							
							
							
		$total_request_n = $total_request->count();
		
		
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project')
					->select('requestforequipments.created_at as created','requestforequipments.*', 'projects.*')
					->orderBy('requestforequipments.r_id','DESC')
					->get(); 		 
		$states = DB::table('states')->get();
		$projects = DB::table('projects')->get();
		$id = Auth::user()->id; 
		$sqlQuery = "SELECT e_equipment_type, COUNT(e_equipment_type) AS count FROM equipments join project_sites on project_sites.project_id = equipments.e_project_code where field_supervisor_id=$id GROUP BY e_equipment_type";
			$piechartdata = DB::select(DB::raw($sqlQuery));
         return view('fieldsupervisor.filedsupervisorrequest',compact('piechartdata','requests','projects','newrequest_count','pending_vendor_count','approve_vendor_count','approved_request_count','total_request_n','states','typevehicle_count','typeequipment_count'));
		  
    }

	    public function requestsearch(Request $request)
    {
		
		$typevehicle = "Vehicle";
		$typevehiclecount = \DB::table('requestforequipments')->where('type', $typevehicle)
						->get();
		$typevehicle_count = $typevehiclecount->count();

		$typeequipment = "Equipment";
		$typeequipmentcount = \DB::table('requestforequipments')->where('type', $typeequipment)
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
		 
		$total_request = DB::table('requestforequipments')
							->get();
							
							
							
		$total_request_n = $total_request->count();
		
		
	/* 	$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project')
					->select('requestforequipments.*', 'projects.*')
					->get(); 	 */	
			//DB::enableQueryLog(); 

			$states_cities = $request->input('states_cities'); 
			$project_code = $request->input('project_code');
			$r_product_type = $request->input('product_type'); 
			//DB::enableQueryLog();
			$query = DB::table('requestforequipments');
				$query->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project');
				$query->select('requestforequipments.created_at as created','requestforequipments.*', 'projects.*');
			// Conditionally add another where
				if($states_cities) { $query->orWhere('projects.state', $states_cities); } 
				if($project_code) { $query->orWhere('projects.project_code', $project_code); }
				if($r_product_type)  { $query->orWhere('requestforequipments.r_product_type', $r_product_type); }
				 
			$requests = $query->get();

					
		$states = DB::table('states')->get();
		$projects = DB::table('projects')->get();
		
         return view('requestequipment',compact('requests','request','projects','newrequest_count','pending_vendor_count','approve_vendor_count','approved_request_count','total_request_n','states','typevehicle_count','typeequipment_count'));
		  
    }
	
	

	 public function newrequestadd()
    {  	
		$id = Auth::user()->id; 
		$sqlQuery = "SELECT e_equipment_type, COUNT(e_equipment_type) AS count FROM equipments join project_sites on project_sites.project_id = equipments.e_project_code where field_supervisor_id=$id GROUP BY e_equipment_type";
			$piechartdata = DB::select(DB::raw($sqlQuery));
		$projects = DB::table('projects')->get();
		$vendors = DB::table('vendors')->get(); 
	/* 	$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project')
					->join('vendors', 'vendors.vendor_id', '=', 'requestforequipments.r_vendor_id')
					->select('requestforequipments.*', 'projects.*', 'vendors.*')
					->where('requestforequipments.r_id', $id)
					->get(); 
		 
		$request = $requests[0];  */
		return view('newrequestadd', compact('vendors','projects','piechartdata'));
    }
	
	    public function requestsenior()
    {  	
		$id = Auth::user()->id; 
		$sqlQuery = "SELECT e_equipment_type, COUNT(e_equipment_type) AS count FROM equipments join project_sites on project_sites.project_id = equipments.e_project_code where field_supervisor_id=$id GROUP BY e_equipment_type";
			$piechartdata = DB::select(DB::raw($sqlQuery));
		$projects = DB::table('projects')->get();
		$vendors = DB::table('vendors')->get(); 
	/* 	$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project')
					->join('vendors', 'vendors.vendor_id', '=', 'requestforequipments.r_vendor_id')
					->select('requestforequipments.*', 'projects.*', 'vendors.*')
					->where('requestforequipments.r_id', $id)
					->get(); 
		 
		$request = $requests[0];  */
		return view('requestsenior', compact('vendors','projects','piechartdata'));
    }
	
	
	    public function requestfiledsuprvisor()
    {  	
			$id = Auth::user()->id; 
			$sqlQuery = "SELECT e_equipment_type, COUNT(e_equipment_type) AS count FROM equipments join project_sites on project_sites.project_id = equipments.e_project_code where field_supervisor_id=$id GROUP BY e_equipment_type";
			$piechartdata = DB::select(DB::raw($sqlQuery));
		$projects = DB::table('projects')->get();
		$vendors = DB::table('vendors')->get(); 
	/* 	$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project')
					->join('vendors', 'vendors.vendor_id', '=', 'requestforequipments.r_vendor_id')
					->select('requestforequipments.*', 'projects.*', 'vendors.*')
					->where('requestforequipments.r_id', $id)
					->get(); 
		 
		$request = $requests[0];  */
		//dd($projects);
		return view('fieldsupervisor.requestfiledsuprvisor', compact('vendors','projects','piechartdata'));
    }
	public function filedsupervisorrequest_details(){
		$brands_equipment = DB::table('brands_equipment')->get();
		//dd($brands_equipment);
		$segment_users = request()->segment(3);
		$requestforequipments = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project')
					->join('project_sites', 'project_sites.project_id', '=', 'requestforequipments.r_project')
					->select('requestforequipments.*', 'projects.*', 'project_sites.*')
					->where('requestforequipments.r_id', $segment_users)
					->get(); 
		//$requestforequipments = DB::table('requestforequipments')->where('r_id', $segment_users)->get();
		$id = Auth::user()->id; 
		//dd($requestforequipments);
		$sqlQuery = "SELECT e_equipment_type, COUNT(e_equipment_type) AS count FROM equipments join project_sites on project_sites.project_id = equipments.e_project_code where field_supervisor_id=$id GROUP BY e_equipment_type";
			$piechartdata = DB::select(DB::raw($sqlQuery));
		return view('fieldsupervisor.filedsupervisorrequest_details',compact('piechartdata','requestforequipments','brands_equipment'));
	}
	
	public function changedocumentstatus(Request $request){
		 
			$document = $request->input('document');
		
			if($document=='rc'){
				 	$updateDetails = ['rc_status' => $request->input('status')];  
			}else if($document=='insurance'){
					$updateDetails = ['insurance_status' => $request->input('status')];  
			}else if($document=='tax'){
					$updateDetails = ['tax_status' => $request->input('status')];  
			}else if($document=='permit'){
					$updateDetails = ['permit_status' => $request->input('status')];  
			}else if($document=='fitness'){
					$updateDetails = ['fitness_status' => $request->input('status')];  
			}else if($document=='rental'){
					$updateDetails = ['rental_status' => $request->input('status')];  
			}
			 
			DB::table('requestforequipments')
						->where('r_id', $request->get('r_id'))
						->update($updateDetails); 
			return response()->json(array('msg'=> "success"), 200);
		//print_r($states_cities1);
	}
	public function generaterc(Request $request){
		 
			
				 	$updateDetails = ['upload_rental_contract' => "1617954818Chrysanthemum.jpg"];  
			
			 
			DB::table('requestforequipments')
						->where('r_id', $request->get('r_id'))
						->update($updateDetails); 
			return response()->json(array('msg'=> "success"), 200);
		//print_r($states_cities1);
	}
	public function approved(Request $request){
		 
			
				 	$updateDetails = ['r_status' => $request->input('status')]; 
			
			 
			DB::table('requestforequipments')
						->where('r_id', $request->get('r_id'))
						->update($updateDetails); 
			return response()->json(array('msg'=> "success"), 200);
		//print_r($states_cities1);
	}
	public function accepetdoc(Request $request){
		 
			
				 	$updateDetails = ['r_status' => $request->input('status')]; 
			
			 
			DB::table('requestforequipments')
						->where('r_id', $request->get('r_id'))
						->update($updateDetails); 
			return response()->json(array('msg'=> "success"), 200);
		//print_r($states_cities1);
	}
	public function rejectdoc(Request $request){
		 
			
				 	$updateDetails = ['r_status' => $request->input('status')];  
			
			 
			DB::table('requestforequipments')
						->where('r_id', $request->get('r_id'))
						->update($updateDetails); 
			return response()->json(array('msg'=> "success"), 200);
		//print_r($states_cities1);
	}
	public function store(Request $request){
		
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
			'type' => 'product type', 
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
		"r_project_site"=>$request->input('r_project_site'),
		"address"=>$request->input('address'),
		"r_uom"=>$request->input('r_uom'),
		"r_wom"=>$request->input('r_wom'),
		"r_status"=>1,
		);
        Requestforequipment::create($values_details);
		 return redirect('/home/newrequestwidgetclick/1');
	}
	public function newrequestwidgetclick($status)
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
		$dsrstatus = "5";
		$document_verification = \DB::table('requestforequipments')->where('r_status', $dsrstatus)
						->get();
		$document_verification_count = $pending_vendor->count();
		$rsrstatus = "5";
		$rejected_rfq = \DB::table('requestforequipments')->where('r_status', $rsrstatus)
						->get();
		$rejected_rfq_count = $pending_vendor->count();
		
				
		$vendorstatus = "3";
		$approve_vendor = \DB::table('requestforequipments')->where('r_status', $vendorstatus)
						->get();
		$approve_vendor_count = $approve_vendor->count();
	 
				
		$sr_srstatus = "4";
		$approved_request = \DB::table('requestforequipments')->where('r_status', $sr_srstatus)
						->get();
		$approved_request_count = $approved_request->count();
		 
		$total_request = DB::table('requestforequipments')
							->get();
							
							
							
		$total_request_n = $total_request->count();
		
		
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project')
					->join('project_sites', 'project_sites.site_id', '=', 'requestforequipments.r_project_site','left')
					->select('requestforequipments.created_at as created','requestforequipments.*', 'projects.*','project_sites.*')
					->orderBy('requestforequipments.r_id','DESC')
					->where('requestforequipments.r_status', $status)
					->get(); 
//dd($requests);					
		$states = DB::table('states')->get();
		$projects = DB::table('projects')->get();  
		$sqlQuery = "SELECT e_equipment_type, COUNT(e_equipment_type) AS count FROM equipments GROUP BY e_equipment_type";
			$piechartdata = DB::select(DB::raw($sqlQuery));
         return view('fieldsupervisor.newrequestwidgetclick',compact('piechartdata','requests','projects','newrequest_count','pending_vendor_count','approve_vendor_count','approved_request_count','total_request_n','states','typevehicle_count','typeequipment_count','document_verification_count','rejected_rfq_count'));
		  
    }
	
	
	
	
	
	
	
	    public function vendor_requestequipment()
    {
		$srstatus = "2";
		$typevehicle = "Vehicle";
		$typevehiclecount = \DB::table('requestforequipments')->where('type', $typevehicle)->where('r_status', $srstatus)
						->get();
		$typevehicle_count = $typevehiclecount->count();

		$typeequipment = "Equipment";
		$typeequipmentcount = \DB::table('requestforequipments')->where('type', $typeequipment)->where('r_status', $srstatus)
						->get();
		$typeequipment_count = $typeequipmentcount->count();
		
		$jrstatus = "2";// for vendor
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
		 
		$total_request = DB::table('requestforequipments')
							->get();
							
							
							
		$total_request_n = $total_request->count();
		
		
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project')
					->join('project_sites', 'project_sites.site_id', '=', 'requestforequipments.r_project_site','left')
					->select('requestforequipments.created_at as created','requestforequipments.*', 'projects.*','project_sites.*')
					->where('requestforequipments.r_status', 2)
					->latest('r_id')->get(); 		 
		$states = DB::table('states')->get();
		$projects = DB::table('projects')->get();
		//dd($requests);
         return view('vendors.vendor_requestequipment',compact('requests','projects','newrequest_count','pending_vendor_count','approve_vendor_count','approved_request_count','total_request_n','states','typevehicle_count','typeequipment_count'));
		  
    }
	 public function rejectedrequests_v()
    {
		$srstatus = "2";
		$typevehicle = "Vehicle";
		$typevehiclecount = \DB::table('requestforequipments')->where('type', $typevehicle)->where('r_status', $srstatus)
						->get();
		$typevehicle_count = $typevehiclecount->count();

		$typeequipment = "Equipment";
		$typeequipmentcount = \DB::table('requestforequipments')->where('type', $typeequipment)->where('r_status', $srstatus)
						->get();
		$typeequipment_count = $typeequipmentcount->count();
		
		$jrstatus = "2";// for vendor
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
		 
		$total_request = DB::table('requestforequipments')
							->get();
							
							
							
		$total_request_n = $total_request->count();
		
		
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project')
					->join('project_sites', 'project_sites.site_id', '=', 'requestforequipments.r_project_site','left')
					->select('requestforequipments.created_at as created','requestforequipments.*', 'projects.*','project_sites.*')
					->where('requestforequipments.r_status', 6)
					->latest('r_id')->get(); 		 
		$states = DB::table('states')->get();
		$projects = DB::table('projects')->get();
		
         return view('vendors.rejectedrequests_v',compact('requests','projects','newrequest_count','pending_vendor_count','approve_vendor_count','approved_request_count','total_request_n','states','typevehicle_count','typeequipment_count'));
		  
    }
	
	    public function vpendingatclient()
    {
		$srstatus = "2";
		$typevehicle = "Vehicle";
		$typevehiclecount = \DB::table('requestforequipments')->where('type', $typevehicle)->where('r_status', $srstatus)
						->get();
		$typevehicle_count = $typevehiclecount->count();

		$typeequipment = "Equipment";
		$typeequipmentcount = \DB::table('requestforequipments')->where('type', $typeequipment)->where('r_status', $srstatus)
						->get();
		$typeequipment_count = $typeequipmentcount->count();
		
		$jrstatus = "2";// for vendor
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
		 
		$total_request = DB::table('requestforequipments')
							->get();
							
							
							
		$total_request_n = $total_request->count();
		
		
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project')
					->join('project_sites', 'project_sites.site_id', '=', 'requestforequipments.r_project_site','left')
					->select('requestforequipments.created_at as created','requestforequipments.*', 'projects.*','project_sites.*')
					->where('requestforequipments.r_status', 5)
					->latest('r_id')->get(); 		 
		$states = DB::table('states')->get();
		$projects = DB::table('projects')->get();
		
         return view('vendors.vpendingatclient',compact('requests','projects','newrequest_count','pending_vendor_count','approve_vendor_count','approved_request_count','total_request_n','states','typevehicle_count','typeequipment_count'));
		  
    }
	
	
	    public function vendor_approvedrequests()
    {
		$srstatus = "2";
		$typevehicle = "Vehicle";
		$typevehiclecount = \DB::table('requestforequipments')->where('type', $typevehicle)->where('r_status', $srstatus)
						->get();
		$typevehicle_count = $typevehiclecount->count();

		$typeequipment = "Equipment";
		$typeequipmentcount = \DB::table('requestforequipments')->where('type', $typeequipment)->where('r_status', $srstatus)
						->get();
		$typeequipment_count = $typeequipmentcount->count();
		
		$jrstatus = "2";// for vendor
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
		 
		$total_request = DB::table('requestforequipments')
							->get();
							
							
							
		$total_request_n = $total_request->count();
		
		
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project')
					->select('requestforequipments.created_at as created','requestforequipments.*', 'projects.*')
					->where('requestforequipments.r_status', 4)
					->latest('r_id')->get(); 		 
		$states = DB::table('states')->get();
		$projects = DB::table('projects')->get();
		
         return view('vendors.vendor_approvedrequests',compact('requests','projects','newrequest_count','pending_vendor_count','approve_vendor_count','approved_request_count','total_request_n','states','typevehicle_count','typeequipment_count'));
		  
    }
	 public function vendor_approverentalcontract()
    {
		$srstatus = "4";
		$typevehicle = "Vehicle";
		$typevehiclecount = \DB::table('requestforequipments')->where('type', $typevehicle)->where('r_status', $srstatus)
						->get();
		$typevehicle_count = $typevehiclecount->count();

		$typeequipment = "Equipment";
		$typeequipmentcount = \DB::table('requestforequipments')->where('type', $typeequipment)->where('r_status', $srstatus)
						->get();
		$typeequipment_count = $typeequipmentcount->count();
		
		$jrstatus = "2";// for vendor
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
		 
		$total_request = DB::table('requestforequipments')
							->get();
							
							
							
		$total_request_n = $total_request->count();
		
		
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project')
					->select('requestforequipments.created_at as created','requestforequipments.*', 'projects.*')
					->where('requestforequipments.r_status', 4)
					->latest('r_id')->get(); 		 
		$states = DB::table('states')->get();
		$projects = DB::table('projects')->get();
		
         return view('vendors.vendor_approverentalcontract',compact('requests','projects','newrequest_count','pending_vendor_count','approve_vendor_count','approved_request_count','total_request_n','states','typevehicle_count','typeequipment_count'));
		  
    }
	public function vendor_equipmentdetails()
    {
		$equipment = DB::table('equipments')
					->select('e_equipment_type')
					->groupBy('e_equipment_type')
					->get();
		$project_type = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code',"left")
					->select('projects.project_type')
					->groupBy('projects.project_type')
					->get();
			$equipemntdata = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->select('equipments.*', 'projects.*','equipments_details.*')
					->get();
					
			$states = DB::table('states')->get();
			$sqlQuery = "SELECT e_equipment_type, COUNT(e_equipment_type) AS count FROM equipments GROUP BY e_equipment_type";
			$piechartdata = DB::select(DB::raw($sqlQuery));
			
			$equipments = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->select('equipments.*','equipments_details.*')
					->get();
			$equipment_count = \DB::table('equipments')->where('e_vehicle_number', 'N/A')
						->get();
		$equipment_count_e = $equipment_count->count();
		$vehicles  = \DB::table('equipments')->where('e_vehicle_number','!=', 'N/A')
						->get();
		$vehicles_count = $vehicles->count();
        
         return view('vendors.vendor_equipmentdetails',compact('vehicles_count','equipment_count_e','piechartdata','equipments','equipment','project_type','equipemntdata','states'));
		  
    }
		public function vendor_paymentdetails()
    {
/* 		$equipment = DB::table('equipments')
					->select('e_equipment_type')
					->groupBy('e_equipment_type')
					->get();
		$project_type = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code',"left")
					->select('projects.project_type')
					->groupBy('projects.project_type')
					->get();
			$equipemntdata = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->select('equipments.*', 'projects.*','equipments_details.*')
					->get();
					
			$states = DB::table('states')->get();
			$sqlQuery = "SELECT e_equipment_type, COUNT(e_equipment_type) AS count FROM equipments GROUP BY e_equipment_type";
			$piechartdata = DB::select(DB::raw($sqlQuery));
			
			$equipments = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->select('equipments.*','equipments_details.*')
					->get();
			$equipment_count = \DB::table('equipments')->where('e_vehicle_number', 'N/A')
						->get();
		$equipment_count_e = $equipment_count->count();
		$vehicles  = \DB::table('equipments')->where('e_vehicle_number','!=', 'N/A')
						->get();
		$vehicles_count = $vehicles->count();
        
         return view('vendors.vendor_equipmentdetails',compact('vehicles_count','equipment_count_e','piechartdata','equipments','equipment','project_type','equipemntdata','states'));
		 
		 
		 
		 */ 
		 
		 
		 
		 
		 
		 
		 
		 
		 $typevehicle = "Vehicle";
		$typevehiclecount = \DB::table('requestforequipments')->where('type', $typevehicle)
						->get();
		$typevehicle_count = $typevehiclecount->count();

		$typeequipment = "Equipment";
		$typeequipmentcount = \DB::table('requestforequipments')->where('type', $typeequipment)
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
		 
		$total_request = DB::table('requestforequipments')
							->get();
							
							
							
		$total_request_n = $total_request->count();
		
		
		$requests = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project')
					->select('requestforequipments.created_at as created','requestforequipments.*', 'projects.*')
					//->where('requestforequipments.r_status', 2)
					->latest('r_id')->get(); 		 
		$states = DB::table('states')->get();
		$projects = DB::table('projects')->get();
		
         return view('vendors.vendor_paymentdetails',compact('requests','projects','newrequest_count','pending_vendor_count','approve_vendor_count','approved_request_count','total_request_n','states','typevehicle_count','typeequipment_count'));
		
		
		
		
		  
    }
	public function operator()
    {
		
		
			$id = Auth::user()->id; 
			$equipments = DB::table('operatorplanners')
					->join('subcategories', 'subcategories.id', '=', 'operatorplanners.oper_equipment_type','left')
					->join('users', 'users.id', '=', 'operatorplanners.operator_users_id','left')
					->join('vendorequipments', 'vendorequipments.id', '=', 'operatorplanners.equipment_id','left')
					->join('vendorequipmendetails', 'vendorequipmendetails.ve_id', '=', 'operatorplanners.equipment_id','left')
					->where('operatorplanners.operator_users_id',$id)
					->select('vendorequipments.ve_vehicle_number as vehicle_number','vendorequipments.*', 'vendorequipmendetails.*', 'operatorplanners.*','users.*','subcategories.*')
					->get();
					
					/* if(count($equipments) == 0){
						$equipments = array();
					}else{
						$equipments = $equipments[0];
					} */
			//	dd($equipments); 
		// $query = DB::getQueryLog();
				// dd($query); 
        return view('operator/dashboard',compact('equipments'));
      
		
       // return view('vendors/dashboard');
    
	}
	public function technician()
    {
		
			$id = Auth::user()->id; 
			$equipments = DB::table('technicianplanners')
					->join('vendorequipments', 'vendorequipments.id', '=', 'technicianplanners.ve_id','left')
					->join('subcategories', 'subcategories.id', '=', 'technicianplanners.tech_equipment_type','left')
					->join('vendorequipmendetails', 'vendorequipmendetails.ve_id', '=', 'technicianplanners.ve_id','left')
					->where('technicianplanners.technician_users_id',$id)
					->select('vendorequipments.ve_vehicle_number as vehicle_number','vendorequipments.*', 'vendorequipmendetails.*', 'technicianplanners.*','subcategories.*')
					->get();
					
					if(count($equipments) == 0){
						$equipment = array();
					}else{
						$equipment = $equipments[0];
					}
					
		foreach($equipments as $key=>$val){
			$id =  $val->ve_id;
			$operatordata = DB::table('operatorplanners')
					->join('users', 'users.id', '=', 'operatorplanners.operator_users_id','left')
				
					->where('operatorplanners.equipment_id',$id)
					->select('users.*')
					->get();
					$equipments[$key]->operatorname = $operatordata[0]->name;
					$equipments[$key]->mobile = $operatordata[0]->primary_mobile;
		}
		//dd($equipments);
		// $query = DB::getQueryLog();
				// dd($query); 
        return view('technician/dashboard',compact('equipments'));
      
		
       // return view('vendors/dashboard');
    }
	public function chiefengineer()
    {
		
			
		//dd($equipments); 
		// $query = DB::getQueryLog();
				// dd($query); 
       // return view('chiefengineer/dashboard',compact('equipments'));
        return view('chiefengineer/dashboard');
      
		
       // return view('vendors/dashboard');
    }
	
}

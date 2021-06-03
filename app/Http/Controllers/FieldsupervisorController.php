<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FieldsupervisorController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
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
        return view('fieldsupervisor/dashboard',compact('project_type','equipment','vehiclescount','equipmentscount','piechartdata','projectdata','equipments','equipemntdata','states'));
    }
	public function widgetclick($status)
    {
		//$status = str_replace("%20"," ",$status);
		//dd($status);
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
			// DB::enableQueryLog();
			$equipments = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id','left')
					->join('project_sites', 'project_sites.project_id', '=', 'equipments.e_project_code','left')
					->Where('project_sites.field_supervisor_id', $id)
					->Where('equipments.e_equipment_type', $status)
					//->Where('equipments.e_equipment_type','like', '%'.$status.'%')
					->select('equipments.*','equipments_details.*')
					->get();
			 // dd($equipments);
		// $query = DB::getQueryLog();
		//	 	dd($query); 
        return view('fieldsupervisor/widgetclick',compact('project_type','equipment','vehiclescount','equipmentscount','piechartdata','projectdata','equipments','equipemntdata','states'));
	}
			public function equipment_detailview($id){
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
			 $id = Auth::user()->id; 
			$sqlQuery = "SELECT e_equipment_type, COUNT(e_equipment_type) AS count FROM equipments join project_sites on project_sites.project_id = equipments.e_project_code where field_supervisor_id=$id GROUP BY e_equipment_type";
			$piechartdata = DB::select(DB::raw($sqlQuery));
        return view('fieldsupervisor/equipment_detailview', compact('piechartdata','equipment','singleday','equipment_details','spares','dprdetails','sparecategory'));
	}
	public function create()
		{
			
			$vendors = DB::table('vendors')->get();
			$projects = DB::table('projects')->get();
			 $id = Auth::user()->id; 
			$sqlQuery = "SELECT e_equipment_type, COUNT(e_equipment_type) AS count FROM equipments join project_sites on project_sites.project_id = equipments.e_project_code where field_supervisor_id=$id GROUP BY e_equipment_type";
			$piechartdata = DB::select(DB::raw($sqlQuery));
			 return view('fieldsupervisor/create', compact('piechartdata','vendors','projects'));
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
			
        return view('fieldsupervisor.paymentdetails', compact('piechartdata','equipments','equipemntdata','states'));
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
}

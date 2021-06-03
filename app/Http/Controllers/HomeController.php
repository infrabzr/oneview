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


			$lastdays = date('Y-m-d', strtotime('today - 30 days'));
					$currentdate = date('Y-m-d');
			$correctedComparisons = "Own";
		$own_equipment = \DB::table('equipments')->where('e_product_type', $correctedComparisons)
						->get();
		$own_equipment_count = $own_equipment->count();


		$correctedComparisons = "Rent";
		$rent_equipment = DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->where('equipments.e_product_type', $correctedComparisons1)
					->whereBetween('equipments_details.e_rental_end_date', [$llastdays, $currentdate])
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
					$lastdays = date('Y-m-d', strtotime('today - 30 days'));
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
		$lastdays = date('Y-m-d', strtotime('today - 30 days'));
			$currentdate = date('Y-m-d');
			$correctedComparisons = "Own";
		$own_equipment = \DB::table('equipments')
					->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->whereBetween('equipments_details.rc_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.ins_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.tax_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.permit_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.fitness_end_date', [$lastdays, $currentdate])
						->where('equipments.e_product_type', $correctedComparisons)
						->get();
		$own_equipment_count = $own_equipment->count();


		$correctedComparisons = "Rent";
		$rent_equipment = \DB::table('equipments')
						->join('equipments_details', 'equipments_details.e_id', '=', 'equipments.e_id')
					->whereBetween('equipments_details.rc_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.ins_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.tax_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.permit_end_date', [$lastdays, $currentdate])
					->whereBetween('equipments_details.fitness_end_date', [$lastdays, $currentdate])
						->where('equipments.e_product_type', $correctedComparisons)
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
					
				  	/* 
					$all_equipments = DB::table('equipments')->get(); 
					foreach($equipments as $key=>$all){
						$dpr[] = DB::table('dprdetails')->where('e_id', $all->e_id)   ->where(DB::raw('month(date)'),"=",$month)   ->get();
					}
					
					$equipments['dpr'] = $dpr; */
					//echo "<pre>";print_R($equipments);print_R($dpr);exit;
					 
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
		return view('fieldsupervisor.requestfiledsuprvisor', compact('vendors','projects','piechartdata'));
    }
	public function filedsupervisorrequest_details(){
		$segment_users = request()->segment(3);
		$requestforequipments = DB::table('requestforequipments')
					->join('projects', 'projects.project_id', '=', 'requestforequipments.r_project')
					->join('project_sites', 'project_sites.project_id', '=', 'requestforequipments.r_project')
					->select('requestforequipments.*', 'projects.*', 'project_sites.*')
					->where('requestforequipments.r_id', $segment_users)
					->get(); 
		//$requestforequipments = DB::table('requestforequipments')->where('r_id', $segment_users)->get();
		$id = Auth::user()->id; 
		$sqlQuery = "SELECT e_equipment_type, COUNT(e_equipment_type) AS count FROM equipments join project_sites on project_sites.project_id = equipments.e_project_code where field_supervisor_id=$id GROUP BY e_equipment_type";
			$piechartdata = DB::select(DB::raw($sqlQuery));
		return view('fieldsupervisor.filedsupervisorrequest_details',compact('piechartdata','requestforequipments'));
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
		"address"=>$request->input('address'),
		"r_status"=>1,
		);
        Requestforequipment::create($values_details);
		 return redirect('/home/filedsupervisorrequest');
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
					->where('requestforequipments.r_status', $status)
					->get(); 		 
		$states = DB::table('states')->get();
		$projects = DB::table('projects')->get();  
		$sqlQuery = "SELECT e_equipment_type, COUNT(e_equipment_type) AS count FROM equipments GROUP BY e_equipment_type";
			$piechartdata = DB::select(DB::raw($sqlQuery));
         return view('fieldsupervisor.newrequestwidgetclick',compact('piechartdata','requests','projects','newrequest_count','pending_vendor_count','approve_vendor_count','approved_request_count','total_request_n','states','typevehicle_count','typeequipment_count'));
		  
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
					->select('requestforequipments.created_at as created','requestforequipments.*', 'projects.*')
					->where('requestforequipments.r_status', 2)
					->latest('r_id')->get(); 		 
		$states = DB::table('states')->get();
		$projects = DB::table('projects')->get();
		
         return view('vendors.vendor_requestequipment',compact('requests','projects','newrequest_count','pending_vendor_count','approve_vendor_count','approved_request_count','total_request_n','states','typevehicle_count','typeequipment_count'));
		  
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
	
	
	
}

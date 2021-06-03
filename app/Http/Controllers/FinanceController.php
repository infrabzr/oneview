<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
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
			
		
        return view('finance/dashboard',compact('piechartdata','equipments','equipemntdata','states'));
    }
	
	
	//   equipment detail View
	
	public function equipment_finance_detailview($id){
		//$equipments = DB::table('equipments')->get();
	 	$equipments_details = DB::table('equipments_details')->where('e_id', $id)->get();
		
		 $equipments = DB::table('equipments')
					->join('projects', 'projects.project_id', '=', 'equipments.e_project_code')
					->join('vendors', 'vendors.vendor_id', '=', 'equipments.e_vendor_id')
					->select('equipments.*', 'projects.*', 'vendors.*')
					->where('equipments.e_id', $id)
					->get();
					/* echo "<pre>";
			print_r($equipments);
			die(); */ 
			$equipment = $equipments[0];
			$equipment_details = $equipments_details[0];
        return view('finance/equipment_finance_detailview', compact('equipment','equipment_details'));
	}


}

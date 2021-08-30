<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Http\Request;

class vendorServices extends Controller
{
      public function index()
    {
		$currentdata  = date('Y-m-d');
		 $firstfive = date('Y-m-d', strtotime('+5 days'));
		$ten = date('Y-m-d', strtotime('+10 days'));
		$fifteen = date('Y-m-d', strtotime('+15 days'));
		$twenty = date('Y-m-d', strtotime('+20 days'));
		$twentyfive = date('Y-m-d', strtotime('+25 days'));
		$thirty = date('Y-m-d', strtotime('+30 days'));
		
		 $admin_user_id = auth()->user()->id;
		 $technicianrole =9;
		 $operatorrole =8;
		 $clinets = DB::table("vendorclients")->where("vendoradmin_id",$admin_user_id)->select('name','id')->get();
		 $projects = DB::table("vendorprojects")->where("vendor_admin_id",$admin_user_id)->select('project_id','project_name')->get();
		 $technician = DB::table("users")->where("admin_user_id",$admin_user_id)->where("role",$technicianrole)->select('id','name')->get();
		 $operator = DB::table("users")->where("admin_user_id",$admin_user_id)->where("role",$operatorrole)->select('id','name')->get();
		 
		 
		 // DB::enableQueryLog();
		 $onetofivedata = DB::table('vendorequipments')->whereBetween('next_serviced_at_date', [$currentdata, $firstfive])->get()->count();
//print_r(DB::getQueryLog());
		$fivetotendata = DB::table('vendorequipments')->whereBetween('next_serviced_at_date', [$firstfive, $ten])->get()->count();
		 $fifteendata = DB::table('vendorequipments')->whereBetween('next_serviced_at_date', [$ten, $fifteen])->get()->count();
		 $twentydata = DB::table('vendorequipments')->whereBetween('next_serviced_at_date', [$fifteen, $twenty])->get()->count();
		 $twentyfivedata = DB::table('vendorequipments')->whereBetween('next_serviced_at_date', [$twenty, $twentyfive])->get()->count();
		 $thirtydata = DB::table('vendorequipments')->whereBetween('next_serviced_at_date', [$twentyfive, $thirty])->get()->count();
		// dd($onetofivedata);
		 
		/* echo "<pre>";
		print_r($clinets);
		print_r($projects);
		print_r($technician);
		print_r($operator);
		die(); */
         return view('vendoradmin/vendorservices', compact('clinets','projects','technician','operator','onetofivedata','fivetotendata','fifteendata','twentydata','twentyfivedata','thirtydata'));
    }
	public function getdata(Request $request,){
		$currentdata  = date('Y-m-d');
		 $firstfive = date('Y-m-d', strtotime('+5 days'));
		 $six = date('Y-m-d', strtotime('+6 days'));
		 $ten = date('Y-m-d', strtotime('+10 days'));
		 $elevn = date('Y-m-d', strtotime('+11 days'));
		 $fifteen = date('Y-m-d', strtotime('+15 days'));
		 $sixteen = date('Y-m-d', strtotime('+16 days'));
		 $twenty = date('Y-m-d', strtotime('+20 days'));
		 $twentyone = date('Y-m-d', strtotime('+20 days'));
		 $twentyfive = date('Y-m-d', strtotime('+25 days'));
		 $twentysix = date('Y-m-d', strtotime('+25 days'));
		 $thirty = date('Y-m-d', strtotime('+30 days'));
		
		$admin_user_id = auth()->user()->id;
		$technicianrole =9;
		$operatorrole =8;
		$clinetsids = array();
		$projectsid =array();
		$rechnicianid =array();
		$operatorid =array();
		$projectlist =array();
		$technicians =array();
		$operator =array();
		
		$id = $request->input('id');
		//$arr = implode(" ",$id);
		foreach($id as $key=>$val){
			// echo $val;
			 $newdata[] =  (explode("-",$val));
		}
		 
		foreach($newdata as $newdata1){
			if($newdata1[0]=="clinets"){
			$clinetsids[] = $newdata1[1];
			}
			if($newdata1[0]=="projects"){
			$projectsid[] = $newdata1[1];
			}
			if($newdata1[0]=="technician"){
			$technicianid[] = $newdata1[1];
			}
			if($newdata1[0]=="operator"){
			$operatorid[] = $newdata1[1];
			}
		}

		
		 $clinetsids = implode (",", $clinetsids);
		// print_r($projectsid);
		 if(!empty($projectsid)){
			 
		 $projectsid = implode (",", $projectsid);
		 }
		
		if(isset($clinetsids)){
		 
		 $onetofivedata = DB::table('vendorequipments')->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$currentdata, $firstfive])->get()->count();

		$fivetotendata = DB::table('vendorequipments')->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$six, $ten])->get()->count();
		 $fifteendata = DB::table('vendorequipments')->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$elevn, $fifteen])->get()->count();
		 $twentydata = DB::table('vendorequipments')->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$sixteen, $twenty])->get()->count();
		 $twentyfivedata = DB::table('vendorequipments')->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$twentyone, $twentyfive])->get()->count();
		 $thirtydata = DB::table('vendorequipments')->whereIn('clinet_id',[$clinetsids])->whereBetween('next_serviced_at_date', [$twentysix, $thirty])->get()->count();
		 
		 
		 
		 /*****client related data*****/
		//echo $clinetsids;
		//DB::enableQueryLog();
		$projectlist = DB::table("vendorprojects")->whereIn('client_id',[$clinetsids])->get();
	//	print_r(DB::getQueryLog());
	
	
		$technicians = DB::table('vendorequipments')
					->join('users', 'users.id', '=', 'vendorequipments.technician_id')
					
					->whereIn('vendorequipments.clinet_id',[$clinetsids])
					 ->groupBy('vendorequipments.technician_id')
					->select('vendorequipments.*', 'users.*')
					->get();
		$operator = DB::table('vendorequipments')
					->join('users', 'users.id', '=', 'vendorequipments.operator_id')
					
					->whereIn('vendorequipments.clinet_id',[$clinetsids])
					 ->groupBy('vendorequipments.operator_id')
					->select('vendorequipments.*', 'users.*')
					->get();
		/*****client related data*****/
		 
		 
		}
		  
		if(!empty($projectsid)){
		//  DB::enableQueryLog();
		 $onetofivedata = DB::table('vendorequipments')->whereIn('project_id', [$projectsid])->whereBetween('next_serviced_at_date', [$currentdata, $firstfive])->get()->count();
		
		$fivetotendata = DB::table('vendorequipments')->whereIn('project_id', [$projectsid])->whereBetween('next_serviced_at_date', [$six, $ten])->get()->count();
		 $fifteendata = DB::table('vendorequipments')->whereIn('project_id', [$projectsid])->whereBetween('next_serviced_at_date', [$elevn, $fifteen])->get()->count();
		 $twentydata = DB::table('vendorequipments')->whereIn('project_id', [$projectsid])->whereBetween('next_serviced_at_date', [$sixteen, $twenty])->get()->count();
		 $twentyfivedata = DB::table('vendorequipments')->whereIn('project_id', [$projectsid])->whereBetween('next_serviced_at_date', [$twentyone, $twentyfive])->get()->count();
		 $thirtydata = DB::table('vendorequipments')->whereIn('project_id', [$projectsid])->whereBetween('next_serviced_at_date', [$twentysix, $thirty])->get()->count();
		  
		//  $projectlist = DB::table("vendorprojects")->whereIn('project_id',[$projectsid])->get();
	//	print_r(DB::getQueryLog());
	
	 //DB::enableQueryLog();
		$technicians = DB::table('vendorequipments')
					->join('users', 'users.id', '=', 'vendorequipments.technician_id')
					
					->whereIn('vendorequipments.project_id',[$projectsid])
					 ->groupBy('vendorequipments.technician_id')
					->select('vendorequipments.*', 'users.*')
					->get();
		//print_r(DB::getQueryLog());
		$operator = DB::table('vendorequipments')
					->join('users', 'users.id', '=', 'vendorequipments.operator_id')
					
					->whereIn('vendorequipments.project_id',[$projectsid])
					 ->groupBy('vendorequipments.operator_id')
					->select('vendorequipments.*', 'users.*')
					->get();
		  
		} 
		if(!empty($technicianid)){
		//  DB::enableQueryLog();
		 $onetofivedata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereBetween('next_serviced_at_date', [$currentdata, $firstfive])->get()->count();
		
		$fivetotendata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereBetween('next_serviced_at_date', [$six, $ten])->get()->count();
		 $fifteendata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereBetween('next_serviced_at_date', [$elevn, $fifteen])->get()->count();
		 $twentydata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereBetween('next_serviced_at_date', [$sixteen, $twenty])->get()->count();
		 $twentyfivedata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereBetween('next_serviced_at_date', [$twentyone, $twentyfive])->get()->count();
		 $thirtydata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereBetween('next_serviced_at_date', [$twentysix, $thirty])->get()->count();
		  
		} 
		if(!empty($operatorid)){
		//  DB::enableQueryLog();
		 $onetofivedata = DB::table('vendorequipments')->whereIn('operator_id', [$operatorid])->whereBetween('next_serviced_at_date', [$currentdata, $firstfive])->get()->count();
		
		$fivetotendata = DB::table('vendorequipments')->whereIn('operator_id', [$operatorid])->whereBetween('next_serviced_at_date', [$six, $ten])->get()->count();
		 $fifteendata = DB::table('vendorequipments')->whereIn('operator_id', [$operatorid])->whereBetween('next_serviced_at_date', [$elevn, $fifteen])->get()->count();
		 $twentydata = DB::table('vendorequipments')->whereIn('operator_id', [$operatorid])->whereBetween('next_serviced_at_date', [$sixteen, $twenty])->get()->count();
		 $twentyfivedata = DB::table('vendorequipments')->whereIn('operator_id', [$operatorid])->whereBetween('next_serviced_at_date', [$twentyone, $twentyfive])->get()->count();
		 $thirtydata = DB::table('vendorequipments')->whereIn('operator_id', [$operatorid])->whereBetween('next_serviced_at_date', [$twentysix, $thirty])->get()->count();
		  
		} 
		if(!empty($clinetsids) && !empty($projectsid)){
		 // DB::enableQueryLog();
		 $onetofivedata = DB::table('vendorequipments')->whereIn('project_id', [$projectsid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$currentdata, $firstfive])->get()->count();
		
		$fivetotendata = DB::table('vendorequipments')->whereIn('project_id', [$projectsid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$six, $ten])->get()->count();
		 $fifteendata = DB::table('vendorequipments')->whereIn('project_id', [$projectsid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$elevn, $fifteen])->get()->count();
		 $twentydata = DB::table('vendorequipments')->whereIn('project_id', [$projectsid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$sixteen, $twenty])->get()->count();
		 $twentyfivedata = DB::table('vendorequipments')->whereIn('project_id', [$projectsid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$twentyone, $twentyfive])->get()->count();
		 $thirtydata = DB::table('vendorequipments')->whereIn('project_id', [$projectsid])->whereIn('clinet_id',[$clinetsids])->whereBetween('next_serviced_at_date', [$twentysix, $thirty])->get()->count();
		  
		}
		if(!empty($clinetsids) && !empty($technicianid)){
		 // DB::enableQueryLog();
		 $onetofivedata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$currentdata, $firstfive])->get()->count();
		
		$fivetotendata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$six, $ten])->get()->count();
		 $fifteendata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$elevn, $fifteen])->get()->count();
		 $twentydata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$sixteen, $twenty])->get()->count();
		 $twentyfivedata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$twentyone, $twentyfive])->get()->count();
		 $thirtydata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('clinet_id',[$clinetsids])->whereBetween('next_serviced_at_date', [$twentysix, $thirty])->get()->count();
		  
		}
		if(!empty($clinetsids) && !empty($operatorid)){
		 // DB::enableQueryLog();
		 $onetofivedata = DB::table('vendorequipments')->whereIn('operator_id', [$operatorid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$currentdata, $firstfive])->get()->count();
		
		$fivetotendata = DB::table('vendorequipments')->whereIn('operator_id', [$operatorid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$six, $ten])->get()->count();
		 $fifteendata = DB::table('vendorequipments')->whereIn('operator_id', [$operatorid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$elevn, $fifteen])->get()->count();
		 $twentydata = DB::table('vendorequipments')->whereIn('operator_id', [$operatorid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$sixteen, $twenty])->get()->count();
		 $twentyfivedata = DB::table('vendorequipments')->whereIn('operator_id', [$operatorid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$twentyone, $twentyfive])->get()->count();
		 $thirtydata = DB::table('vendorequipments')->whereIn('operator_id', [$operatorid])->whereIn('clinet_id',[$clinetsids])->whereBetween('next_serviced_at_date', [$twentysix, $thirty])->get()->count();
		  
		}
		
		if(!empty($clinetsids) && !empty($projectsid) && !empty($technicianid)){
		 // DB::enableQueryLog();
		 $onetofivedata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('project_id', [$projectsid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$currentdata, $firstfive])->get()->count();
		
		$fivetotendata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('project_id', [$projectsid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$six, $ten])->get()->count();
		 $fifteendata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('project_id', [$projectsid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$elevn, $fifteen])->get()->count();
		 $twentydata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('project_id', [$projectsid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$sixteen, $twenty])->get()->count();
		 $twentyfivedata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('project_id', [$projectsid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$twentyone, $twentyfive])->get()->count();
		 $thirtydata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('project_id', [$projectsid])->whereIn('clinet_id',[$clinetsids])->whereBetween('next_serviced_at_date', [$twentysix, $thirty])->get()->count();
		  
		}
		if(!empty($clinetsids) && !empty($operatorid) && !empty($technicianid)){
		 // DB::enableQueryLog();
		 $onetofivedata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('operator_id', [$operatorid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$currentdata, $firstfive])->get()->count();
		
		$fivetotendata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('operator_id', [$operatorid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$six, $ten])->get()->count();
		 $fifteendata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('operator_id', [$operatorid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$elevn, $fifteen])->get()->count();
		 $twentydata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('operator_id', [$operatorid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$sixteen, $twenty])->get()->count();
		 $twentyfivedata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('operator_id', [$operatorid])->whereIn('clinet_id', [$clinetsids])->whereBetween('next_serviced_at_date', [$twentyone, $twentyfive])->get()->count();
		 $thirtydata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('operator_id', [$operatorid])->whereIn('clinet_id',[$clinetsids])->whereBetween('next_serviced_at_date', [$twentysix, $thirty])->get()->count();
		  
		}
		if(!empty($projectsid) && !empty($operatorid) && !empty($technicianid)){
		 // DB::enableQueryLog();
		 $onetofivedata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('operator_id', [$operatorid])->whereIn('project_id', [$projectsid])->whereBetween('next_serviced_at_date', [$currentdata, $firstfive])->get()->count();
		
		$fivetotendata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('operator_id', [$operatorid])->whereIn('project_id', [$projectsid])->whereBetween('next_serviced_at_date', [$six, $ten])->get()->count();
		 $fifteendata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('operator_id', [$operatorid])->whereIn('project_id', [$projectsid])->whereBetween('next_serviced_at_date', [$elevn, $fifteen])->get()->count();
		 $twentydata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('operator_id', [$operatorid])->whereIn('project_id', [$projectsid])->whereBetween('next_serviced_at_date', [$sixteen, $twenty])->get()->count();
		 $twentyfivedata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('operator_id', [$operatorid])->whereIn('project_id', [$projectsid])->whereBetween('next_serviced_at_date', [$twentyone, $twentyfive])->get()->count();
		 $thirtydata = DB::table('vendorequipments')->whereIn('technician_id', [$technicianid])->whereIn('operator_id', [$operatorid])->whereIn('project_id', [$projectsid])->whereBetween('next_serviced_at_date', [$twentysix, $thirty])->get()->count();
		  
		}
		if(!empty($clinetsids) && !empty($projectsid) && !empty($operatorid) && !empty($technicianid)){
		 // DB::enableQueryLog();
		 $onetofivedata = DB::table('vendorequipments')->whereIn('clinet_id', [$clinetsids])->whereIn('technician_id', [$technicianid])->whereIn('operator_id', [$operatorid])->whereIn('project_id', [$projectsid])->whereBetween('next_serviced_at_date', [$currentdata, $firstfive])->get()->count();
		
		$fivetotendata = DB::table('vendorequipments')->whereIn('clinet_id', [$clinetsids])->whereIn('technician_id', [$technicianid])->whereIn('operator_id', [$operatorid])->whereIn('project_id', [$projectsid])->whereBetween('next_serviced_at_date', [$six, $ten])->get()->count();
		 $fifteendata = DB::table('vendorequipments')->whereIn('clinet_id', [$clinetsids])->whereIn('technician_id', [$technicianid])->whereIn('operator_id', [$operatorid])->whereIn('project_id', [$projectsid])->whereBetween('next_serviced_at_date', [$elevn, $fifteen])->get()->count();
		 $twentydata = DB::table('vendorequipments')->whereIn('clinet_id', [$clinetsids])->whereIn('technician_id', [$technicianid])->whereIn('operator_id', [$operatorid])->whereIn('project_id', [$projectsid])->whereBetween('next_serviced_at_date', [$sixteen, $twenty])->get()->count();
		 $twentyfivedata = DB::table('vendorequipments')->whereIn('clinet_id', [$clinetsids])->whereIn('technician_id', [$technicianid])->whereIn('operator_id', [$operatorid])->whereIn('project_id', [$projectsid])->whereBetween('next_serviced_at_date', [$twentyone, $twentyfive])->get()->count();
		 $thirtydata = DB::table('vendorequipments')->whereIn('clinet_id', [$clinetsids])->whereIn('technician_id', [$technicianid])->whereIn('operator_id', [$operatorid])->whereIn('project_id', [$projectsid])->whereBetween('next_serviced_at_date', [$twentysix, $thirty])->get()->count();
		  
		}
		
			//dd($technicians);
		return response()->json(array('one'=> $onetofivedata,'two'=>$fivetotendata,'three'=>$fifteendata,'four'=>$twentydata,'five'=>$twentyfivedata,'six'=>$thirtydata,'projects'=>$projectlist,'technicians'=>$technicians,'operator'=>$operator), 200);
	}
}

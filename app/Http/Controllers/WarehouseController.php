<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Auth;
use App\Models\warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $warehousedata = DB::All();
		dd($warehousedata);
         return view('vendoradmin/warehouse/.list', compact('warehousedata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
		$admin_user_id = auth()->user()->id;
		 
		 $clientcount = DB::table('vendorclients')
												->where("vendoradmin_id",$admin_user_id)
												->get()
												->count();
		if($clientcount){
       $states = DB::table('states')->get();
	
		 $admin_user_id = auth()->user()->id;
		 $vendorclients = \DB::table('vendorclients')->where('vendoradmin_id', $admin_user_id)
						->get();
		//dd($vendorclients);
         return view('vendoradmin/warehouse/.create', compact('states','vendorclients'));
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
		$admin_user_id = auth()->user()->id;
  $validatedData = $request->validate([  
            'project_state' => 'required', 
            'projectname' => 'required',
            'warehousename' => 'required',
            'client_id' => 'required',
         
        ],[], 
		[
			'project_state' => 'product type', 
			'projectname' => 'Equipment type', 
			'warehousename' => 'Brand', 
			'client_id' => 'Client Name', 
		 
		]
			);
        $details = array(
								"warehouse_name"=>$request->input('warehousename'),
								"project_id"=>$request->input('projectname'),
								"state_id"=>$request->input('project_state'),
								"client_id"=>$request->input('client_id'),
								"vendoradmin_id"=>$admin_user_id,
				);
		//dd($details);
	 warehouse::create($details);
	 return redirect('/warehouse/show')->with('status', 'You have successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(warehouse $warehouse)
    {
		
		$admin_user_id = auth()->user()->id;
		 
		 $clientcount = DB::table('vendorclients')
												->where("vendoradmin_id",$admin_user_id)
												->get()
												->count();
		if($clientcount){
		 $admin_user_id = auth()->user()->id;
		 
	 $warehouses = 	 DB::table('warehouses')
					->join('vendorprojects', 'vendorprojects.project_id', '=', 'warehouses.project_id','left')
					->join('vendorclients', 'vendorclients.id', '=', 'warehouses.client_id','left')
					->join('states', 'states.state_id', '=', 'warehouses.state_id','left')
					->where('warehouses.vendoradmin_id',$admin_user_id)
					->whereNull('deleted_at')
					->select('warehouses.*', 'vendorprojects.project_name', 'vendorclients.name as client_name','states.state_name')
					->get();
		 
		 /* 
		 
		 
		 $warehouses = \DB::table('warehouses')
		 
		 ->where('vendoradmin_id', $admin_user_id)
						->get(); */
			//dd($warehouses);
	
		  return view('vendoradmin/warehouse/.list', compact('warehouses'));
		}else{
			return redirect("/vendor/clientlist")->with('error', "You don't have clients, Please add at least one client and project");
		}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		
      $warehouse_data = 	
	  warehouse::find($id);
	  /*  DB::table('warehouses')
					->join('vendorprojects', 'vendorprojects.project_id', '=', 'warehouses.project_id','left')
					->join('vendorclients', 'vendorclients.id', '=', 'warehouses.client_id','left')
					->join('states', 'states.state_id', '=', 'warehouses.state_id','left')
					->where('warehouses.id',$id)
					->select('warehouses.*', 'vendorprojects.project_name', 'vendorclients.name as client_name','states.state_name')
					->get(); */
					 $products = $warehouse_data->toArray();;
		$states = DB::table('states')->get();
	
		 $admin_user_id = auth()->user()->id;
		 $vendorclients = \DB::table('vendorclients')->where('vendoradmin_id', $admin_user_id)
						->get();
		 $vendorprojects = \DB::table('vendorprojects')->where('vendor_admin_id', $admin_user_id)
						->get();
		
        return view('vendoradmin/warehouse/.edit',compact('products','states','vendorclients','vendorprojects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
		$admin_user_id = auth()->user()->id;
		$id = $request->input('id');
          $details2 = array(
								"warehouse_name"=>$request->input('warehousename'),
								"project_id"=>$request->input('projectname'),
								"state_id"=>$request->input('project_state'),
								"client_id"=>$request->input('client_id'),
				);

		//DB::enableQueryLog();		
	$result = DB::table('warehouses')
			->where('id', $id)
			->update($details2);
// $query = DB::getQueryLog();
				 //dd($query); 
		return  redirect("/warehouse/show")->with('status', 'Record updated successfully.');	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(warehouse $id)
    {
       
    }
	public function softDeletes($id)
    {
		
       $product = warehouse::find( $id );
		$product->delete();
		return  redirect("/warehouse/show")->with('error', 'Record was successfully deleted.');
    }
	public function getvendorproject(Request $request)
     {
		$client_id = $request->input('client_id');
		
			//$vendorclients = DB::table('clientcontacts')->where('client_id', $id)->get();
			//DB::enableQueryLog();
			 $project = DB::table('vendorprojects')
					
					->where('vendorprojects.client_id',$client_id)
					->select('vendorprojects.*')
					->get();
			 $state = DB::table('vendorprojects')
					
					->where('vendorprojects.client_id',$client_id)
					->select('vendorprojects.*')
					->get();
			/*  print_r(DB::getQueryLog());
		dd($vendoradmin_users); */
		
		
			return response()->json(array('projectdata'=>$project), 200);
    } 
	public function getvendorclinet(Request $request)
     {
		 $admin_user_id = auth()->user()->id;
		$project_state = $request->input('state');
		
			//$vendorclients = DB::table('clientcontacts')->where('client_id', $id)->get();
			//DB::enableQueryLog();
			 $project = DB::table('vendorclients')
					
					->where('vendorclients.vendoradmin_id',$admin_user_id)
					->where('vendorclients.state',$project_state)
					->select('vendorclients.*')
					->get();
			/*  print_r(DB::getQueryLog());
		dd($vendoradmin_users); */
			return response()->json(array('projectdata'=>$project), 200);
    } 
}

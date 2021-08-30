<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Auth;
use App\Models\spareparts;
use Illuminate\Http\Request;

class SparepartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		 $admin_user_id = auth()->user()->id;
		  $states = DB::table('states')->get();
		 $spareparts_list = \DB::table('spareparts')->where(['vendoradmin_id'=>$admin_user_id])->whereNull('deleted_at')
						->get();
		//dd($spareparts_list);
		 $sparepartscategories = \DB::table('sparepartscategories')->where('vendoradmin_id', $admin_user_id)
						->get();	
		$sparepartssubcategories = \DB::table('sparepartssubcategories')->where('vendoradmin_id', $admin_user_id)
						->get();
		 $vendorprojects = \DB::table('vendorprojects')->where('vendor_admin_id', $admin_user_id)
						->get();
		$warehouses = \DB::table('warehouses')->where('vendoradmin_id', $admin_user_id)
						->get();
         return view('vendoradmin/spareparts/.index', compact('spareparts_list','sparepartscategories','states','vendorprojects','warehouses','sparepartssubcategories'));
    } 
	public function sparepartslist()
    {
		 $admin_user_id = auth()->user()->id;
		 $warehouses = \DB::table('warehouses')->where('vendoradmin_id', $admin_user_id)
						->get()->count();
		if($warehouses){
		  $states = DB::table('states')->get();
		 $spareparts_list = \DB::table('spareparts')->where(['vendoradmin_id'=>$admin_user_id])->whereNull('deleted_at')
						->get();
		//dd($spareparts_list);
		 $sparepartscategories = \DB::table('sparepartscategories')->where('vendoradmin_id', $admin_user_id)
						->get();	
		$sparepartssubcategories = \DB::table('sparepartssubcategories')->where('vendoradmin_id', $admin_user_id)
						->get();
		 $vendorprojects = \DB::table('vendorprojects')->where('vendor_admin_id', $admin_user_id)
						->get();
		$warehouses = \DB::table('warehouses')->where('vendoradmin_id', $admin_user_id)
						->get();
         return view('vendoradmin/spareparts/.list', compact('spareparts_list','sparepartscategories','states','vendorprojects','warehouses','sparepartssubcategories'));
		}else{
			return redirect("/warehouse/show")->with('error', "You don't have warehouse, Please add at least one warehouse");
		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
		 $states = DB::table('states')->get();
	
		 $admin_user_id = auth()->user()->id;
		 $vendorclients = \DB::table('vendorprojects')->where('vendor_admin_id', $admin_user_id)
						->get();
		 $sparepartscategories = \DB::table('sparepartscategories')->where('vendoradmin_id', $admin_user_id)
						->get();
		
		//dd($vendorclients);
         return view('vendoradmin/spareparts/.create', compact('states','vendorclients','sparepartscategories'));
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
            'category_id' => 'required',   
            'sub_cat_id' => 'required',   
            'product_name' => 'required', 
            'price' => 'required', 
            'description' => 'required', 
            'manufacture' => 'required',
            'quantity' => 'required',
            'mfg_year' => 'required',
            'barcode' => 'required',
            'modelno' => 'required',
            'serial_no' => 'required',
            'projectname' => 'required',
            'warehouse_name' => 'required',
         
        ],[], 
		[
			'product_name' => 'Product Name ', 
			'price' => 'Product Price ', 
			'category_id' => 'category Name ', 
			'sub_cat_id' => 'Sub category Name ', 
			'description' => 'Description ', 
			'manufacture' => 'manufacture', 
			'quantity' => 'Quantity', 
			'mfg_year' => 'Manufacturing Year', 
			'barcode' => 'Barcode', 
			'modelno' => 'Model No', 
			'serial_no' => 'Serial No', 
			'projectname' => 'Project name', 
			'warehouse_name' => 'Warehouse Name', 
		 
		]
			);
			
	    $file_tmpname1 = $_FILES['image']['tmp_name'];
       $file_name1 = $_FILES['image']['name'];
	  
		 //$filepath1 = "/home/ubuntu/infraweb/public/images/".time().$file_name1;
		 $filepath1 = "C:/xampp/htdocs/tatainfra/public/images/".time().$file_name1;
		 $image_name = time().$file_name1;
		 move_uploaded_file($file_tmpname1, $filepath1); 
        $details = array(
								"product_name"=>$request->input('product_name'),
								"price"=>$request->input('price'),
								"category_id"=>$request->input('category_id'),
								"sub_cat_id"=>$request->input('sub_cat_id'),
								"description"=>$request->input('description'),
								"image"=>$image_name,
								"manufacture"=>$request->input('manufacture'),
								"quantity"=>$request->input('quantity'),
								"mfg_year"=>$request->input('mfg_year'),
								"barcode"=>$request->input('barcode'),
								"model_no"=>$request->input('modelno'),
								"serial_no"=>$request->input('serial_no'),
								"project_id"=>$request->input('projectname'),
								"warehouse_id"=>$request->input('warehouse_name'),
								"vendoradmin_id"=>$admin_user_id,
				);
		//dd($details);
	 spareparts::create($details);
	 return redirect('/spareparts')->with('status', 'You have successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\spareparts  $spareparts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
		
		$productdata = DB::table('spareparts')
					->join('vendorprojects', 'vendorprojects.project_id', '=', 'spareparts.project_id','left')
					->join('sparepartscategories', 'sparepartscategories.id', '=', 'spareparts.category_id','left')
					->join('warehouses', 'warehouses.id', '=', 'spareparts.warehouse_id','left')
					->where('spareparts.id',$id)
					->select('spareparts.*', 'vendorprojects.project_name', 'sparepartscategories.name as categoryname','warehouses.warehouse_name')
					->get(); 
	
		//dd($productdata);
         return view('vendoradmin/spareparts/.show', compact('productdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\spareparts  $spareparts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $spareparts_date = 	spareparts::find($id);
	
		 $products = $spareparts_date->toArray();
		 $states = DB::table('states')->get();
	
		 $admin_user_id = auth()->user()->id;
		 $vendorclients = \DB::table('vendorclients')->where('vendoradmin_id', $admin_user_id)
						->get();
		 $vendorprojects = \DB::table('vendorprojects')->where('vendor_admin_id', $admin_user_id)
						->get();
		 $warehouses = \DB::table('warehouses')->where('vendoradmin_id', $admin_user_id)
						->get();
		
		 $sparepartscategories = \DB::table('sparepartscategories')->where('vendoradmin_id', $admin_user_id)
						->get();
		$sparepartssubcategories = \DB::table('sparepartssubcategories')->where('vendoradmin_id', $admin_user_id)
						->get();
		//dd($products);
        return view('vendoradmin/spareparts/.edit',compact('products','states','vendorclients','vendorprojects','warehouses','sparepartscategories','sparepartssubcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\spareparts  $spareparts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, spareparts $spareparts)
    {
		$admin_user_id = auth()->user()->id;
        $id = $request->input('id');
		if($_FILES['image']['name']){
          $file_tmpname1 = $_FILES['image']['tmp_name'];
       $file_name1 = $_FILES['image']['name'];
	  
		 //$filepath1 = "/home/ubuntu/infraweb/public/images/".time().$file_name1;
		 $filepath1 = "C:/xampp/htdocs/tatainfra/public/images/".time().$file_name1;
		 $image_name = time().$file_name1;
		 move_uploaded_file($file_tmpname1, $filepath1);
 $details = array(
								"product_name"=>$request->input('product_name'),
								"category_id"=>$request->input('category_id'),
								"sub_cat_id"=>$request->input('sub_cat_id'),
								"description"=>$request->input('description'),
								"image"=>$image_name,
								"manufacture"=>$request->input('manufacture'),
								"quantity"=>$request->input('quantity'),
								"mfg_year"=>$request->input('mfg_year'),
								"barcode"=>$request->input('barcode'),
								"model_no"=>$request->input('modelno'),
								"serial_no"=>$request->input('serial_no'),
								"project_id"=>$request->input('projectname'),
								"warehouse_id"=>$request->input('warehouse_name'),
								"vendoradmin_id"=>$admin_user_id,
				);		 
		}else{
			 $details = array(
								"product_name"=>$request->input('product_name'),
								"category_id"=>$request->input('category_id'),
								"sub_cat_id"=>$request->input('sub_cat_id'),
								"description"=>$request->input('description'),
								"manufacture"=>$request->input('manufacture'),
								"quantity"=>$request->input('quantity'),
								"mfg_year"=>$request->input('mfg_year'),
								"barcode"=>$request->input('barcode'),
								"model_no"=>$request->input('modelno'),
								"serial_no"=>$request->input('serial_no'),
								"project_id"=>$request->input('projectname'),
								"warehouse_id"=>$request->input('warehouse_name'),
								"vendoradmin_id"=>$admin_user_id,
				);
		}
		DB::table('spareparts')
			->where('id', $id)
			->update($details);
		return  redirect("/spareparts")->with('status', 'Record updated successfully.');	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\spareparts  $spareparts
     * @return \Illuminate\Http\Response
     */
    public function destroy(spareparts $spareparts)
    {
		
       
    }
	
	 public function softDeletes($id)
    {
        $product = spareparts::find( $id );
		if ($product != null) {
       $product->delete();
      
    }
		return  redirect("/spareparts")->with('error', 'Record was successfully deleted.');
    }
	public function getwarehouselist(Request $request)
     {
		$project_id = $request->input('project_id');
		
			//$vendorclients = DB::table('clientcontacts')->where('client_id', $id)->get();
			//DB::enableQueryLog();
			 $warehouses = DB::table('warehouses')
					->where('warehouses.project_id',$project_id)
					->select('warehouses.*')
					->get();
			/*  print_r(DB::getQueryLog());
		dd($vendoradmin_users); */
			return response()->json(array('warehouses'=>$warehouses), 200);
    } 
	public function filter(Request $request)
     {
		$category_id = $request->input('category_id');
		$state_id = $request->input('state_id');
		$project_id = $request->input('project_id');
		$warehouse_id = $request->input('warehouse_id');
		
			//$vendorclients = DB::table('clientcontacts')->where('client_id', $id)->get();
			//DB::enableQueryLog();
			 $project = DB::table('spareparts');
					if($state_id){
					 $project->where('state_id',$state_id);
					}
					if($project_id){
					 $project->where('project_id',$project_id);
					}
					if($warehouse_id){
					 $project->where('warehouse_id',$warehouse_id);
					}
					if($category_id){
					 $project->where('category_id',$category_id);
					}
					 $project->whereNull('deleted_at');
					 $project->select('spareparts.*');
					 $filterdata = $project->get();
			/*  print_r(DB::getQueryLog());
		dd($vendoradmin_users); */
			return response()->json(array('filterdata'=>$filterdata), 200);
    } 
	
	public function getsubcategories(Request $request)
     {
		$category_id = $request->input('category_id');
		
			//$vendorclients = DB::table('clientcontacts')->where('client_id', $id)->get();
			//DB::enableQueryLog();
			 $subcategories = DB::table('sparepartssubcategories')
					
					->where('sparepartssubcategories.cat_id',$category_id)
					->select('sparepartssubcategories.*')
					->get();
			
			/*  print_r(DB::getQueryLog());
		dd($vendoradmin_users); */
		
		
			return response()->json(array('subcategories'=>$subcategories), 200);
    }	
	public function getvendorproject(Request $request)
     {
		$state_id = $request->input('state_id');
		
			//$vendorclients = DB::table('clientcontacts')->where('client_id', $id)->get();
			//DB::enableQueryLog();
			 $project = DB::table('vendorprojects')
					
					->where('vendorprojects.project_state',$state_id)
					->select('vendorprojects.*')
					->get();
			
			/*  print_r(DB::getQueryLog());
		dd($vendoradmin_users); */
		
		
			return response()->json(array('projectdata'=>$project), 200);
    } 
	public function getwarehouse(Request $request)
     {
		$project_id = $request->input('project_id');
		
			//$vendorclients = DB::table('clientcontacts')->where('client_id', $id)->get();
			//DB::enableQueryLog();
			 $warehouses = DB::table('warehouses')
					
					->where('warehouses.project_id',$project_id)
					->select('warehouses.*')
					->get();
			
			/*  print_r(DB::getQueryLog());
		dd($vendoradmin_users); */
		
		
			return response()->json(array('warehouses'=>$warehouses), 200);
    }
	public function getequipment(Request $request)
     {
		$project_id = $request->input('id');
		
			//$vendorclients = DB::table('clientcontacts')->where('client_id', $id)->get();
			//DB::enableQueryLog();
			 $equipmentdata = DB::table('vendorequipments')
					->join('subcategories', 'subcategories.id', '=', 'vendorequipments.ve_equipment_type','left')
					->where('vendorequipments.project_id',$project_id)
					->whereNull('vendorequipments.deleted_at')
					->groupBy('vendorequipments.ve_equipment_type')
					->select('vendorequipments.ve_equipment_type','subcategories.sub_category_name')
					->get();
			
			  //print_r(DB::getQueryLog());
		//dd($vendoradmin_users); 
		
		
			return response()->json(array('data'=>$equipmentdata), 200);
    } 
	public function equfilter(Request $request)
     {
		$state_id = $request->input('state_id');
		$project_id = $request->input('project_id');
		$cat_id = $request->input('equ_id');
		
		
		
		
		
			$equipments[]= array() ;
		$equipments1 = DB::table('vendorequipments');
					$equipments1->join('subcategories', 'subcategories.id', '=', 'vendorequipments.ve_equipment_type','left');
					$equipments1->join('vendorequipmendetails', 'vendorequipmendetails.ve_id', '=', 'vendorequipments.id','left');
					$equipments1->join('vendorequipment_loans', 'vendorequipment_loans.ve_id', '=', 'vendorequipments.id','left');
					 $equipments1->where('vendorequipments.project_id', $project_id);
					 $equipments1->where('vendorequipments.ve_equipment_type', $cat_id);
					 $equipments1->where('vendorequipmendetails.project_state', $state_id);
					 $equipments1->whereNull('vendorequipments.deleted_at');
					 $equipments1->orderBy('vendorequipments.id','DESC');
					$equipments1->select('vendorequipments.*', 'vendorequipmendetails.*', 'vendorequipment_loans.*','vendorequipments.id as main_id','subcategories.sub_category_name');
					$equipments = $equipments1->get();
			//	dd($equipments);
				$equipments=   json_decode(json_encode($equipments), true);				
				foreach($equipments as $key=>$val){
					
					$equipment_operators = DB::table('equipment_operators')->where(array('ve_id'=> $val["ve_id"],"status"=>1))->get();
					$equipment_operators =   json_decode(json_encode($equipment_operators), true);	
					 $equipments[$key]["operator"] = $equipment_operators;
					
				}
		
		
		
		
		
			//$vendorclients = DB::table('clientcontacts')->where('client_id', $id)->get();
			//DB::enableQueryLog();
			
					
					/* if($state_id){
					 $project->where('state_id',$state_id);
					} */
					
			/*  print_r(DB::getQueryLog());
		dd($vendoradmin_users); */
			return response()->json(array('filterdata'=>$equipments), 200);
    } 
}

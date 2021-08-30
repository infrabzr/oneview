<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Models\technicianplanners;
use App\Models\equipmentdalycheckup;
use App\Models\servicecheckup;
use Illuminate\Http\Request;

class TechnicianplannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$id = $request->get('technician_users_id');
        $values_details = array(
		"technician_users_id"=> $request->get('technician_users_id'),
		"tech_state"=> $request->get('tech_state'),
		"tech_equipment_type"=> $request->get('tech_equipment_type'),
		"ve_id"=> $request->get('equ_id'),
		"tech_code"=> $request->get('tech_code'),
		"ve_vehicle_number"=> $request->get('ve_vehicle_number'),
		);
		technicianplanners::create($values_details);
		// print_r(DB::getQueryLog());
		        return redirect('/assignequipemnet/'.$id);
    }
  public function dalycheckup(Request $request)
    {
			 $admin_user_id = auth()->user()->id;
			 $id = $request->get('ve_id');
        $values_details = array(
		"user_id"=>  $admin_user_id,
		"equ_id"=> $request->get('ve_id'),
		"equipment_status"=> $request->get('equipment_status'),
		"comment"=> $request->get('comment'),
		);
		//dd($values_details);
		equipmentdalycheckup::create($values_details);
		// print_r(DB::getQueryLog());
		        return redirect('/equipment_daily_checkup/'.$id)->with('status', 'You have successfully added!');
    }
	public function adalycheckup(Request $request)
    {
			 $admin_user_id = auth()->user()->id;
			 $id = $request->get('ve_id');
        $values_details = array(
		"user_id"=>  $admin_user_id,
		"equ_id"=> $request->get('ve_id'),
		"equipment_status"=> $request->get('equipment_status'),
		"comment"=> $request->get('comment'),
		);
		//dd($values_details);
		equipmentdalycheckup::create($values_details);
		// print_r(DB::getQueryLog());
		        return redirect('/vendorequipment/equipment_vendor_detailview/'.$id)->with('status', 'You have successfully added!');
    }
  public function techdalycheckup(Request $request)
    {
			 $admin_user_id = auth()->user()->id;
			 $id = $request->get('ve_id');
        $values_details = array(
		"user_id"=>  $admin_user_id,
		"equ_id"=> $request->get('ve_id'),
		"equipment_status"=> $request->get('equipment_status'),
		"comment"=> $request->get('comment'),
		);
		//dd($values_details);
		equipmentdalycheckup::create($values_details);
		// print_r(DB::getQueryLog());
		        return redirect('/technician_daily_checkup/'.$id)->with('status', 'You have successfully added!');
    }
	public function operatorcheckup(Request $request)
    {
			 $admin_user_id = auth()->user()->id;
			 $id = $request->get('ve_id');
        $values_details = array(
		"user_id"=>  $admin_user_id,
		"equ_id"=> $request->get('ve_id'),
		"equipment_status"=> $request->get('equipment_status'),
		"comment"=> $request->get('comment'),
		);
		//dd($values_details);
		equipmentdalycheckup::create($values_details);
		// print_r(DB::getQueryLog());
		        return redirect('/operator_daily_checkup/'.$id)->with('status', 'You have successfully added!');
    }
	public function servicecheckupstatus(Request $request)
    {
			 $admin_user_id = auth()->user()->id;
			 $sp_cat = $request->get('id');
			 $equ_id = $request->get('equ_id');
			 
			 $avaliable_equipment = \DB::table('servicecheckups')->where(['user_id'=>$admin_user_id,'equ_id'=>$equ_id])
						->get()->count();
			if($avaliable_equipment){
				  $values_details = array(
		"service_status"=>  $sp_cat,
		);
		//dd($values_details);
		//servicecheckup::create($values_details);
		
		DB::table('servicecheckups')
			->where('user_id', $admin_user_id)
			->where('equ_id',$equ_id)
			->update($values_details);
				
			}else{
			$values_details = array(
		"user_id"=>  $admin_user_id,
		"equ_id"=> $equ_id,
		"service_status"=>  $sp_cat,
		);
		//dd($values_details);
		servicecheckup::create($values_details);	
			}
			 
        
		// print_r(DB::getQueryLog());
		        //return redirect('/equipment_daily_checkup/'.$equ_id)->with('status', 'You have successfully updated!');
    }
  public function servicecheckup(Request $request)
    {
			 $admin_user_id = auth()->user()->id;
			 $id = $request->get('equ_id');
			 
			 /****profile image****/
		 $file_tmpname1 = $_FILES['serviced_bill_image']['tmp_name'];
       $file_name1 = $_FILES['serviced_bill_image']['name'];
	  
		 //$filepath1 = "/home/ubuntu/infraweb/public/images/".time().$file_name1;
		 $filepath1 = "C:/xampp/htdocs/tatainfra/public/images/".time().$file_name1;
		 $serviced_bill_image = time().$file_name1;
		 move_uploaded_file($file_tmpname1, $filepath1); 
		 /****RC **/
		 $serviced_parts_image = $_FILES['serviced_parts_image']['tmp_name'];
        $serviced_parts_image_name = $_FILES['serviced_parts_image']['name'];
		 //$d_vechile_rc_path = "/home/ubuntu/infraweb/public/images/".time().$d_vechile_rc_name;
		 $operator_licence_path = "C:/xampp/htdocs/tatainfra/public/images/".time().$serviced_parts_image_name;
		 $serviced_parts_image_name = time().$serviced_parts_image_name;
		 move_uploaded_file($serviced_parts_image, $operator_licence_path);
			 
			 
			 
        $values_details = array(
		"serviced_at"=> $request->get('serviced_at'),
		"serviced_date"=> $request->get('serviced_date'),
		"serviced_amount"=> $request->get('serviced_amount'),
		"serviced_bill_image"=> $serviced_bill_image,
		"serviced_parts_image"=> $serviced_parts_image_name,
		);
		//dd($values_details);
		//servicecheckup::create($values_details);
		
		DB::table('servicecheckups')
			->where('user_id', $admin_user_id)
			->where('equ_id',$id)
			->update($values_details);

		        return redirect('/equipment_daily_checkup/'.$id)->with('status', 'You have successfully added!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\technicianplanners  $technicianplanners
     * @return \Illuminate\Http\Response
     */
    public function show(technicianplanners $technicianplanners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\technicianplanners  $technicianplanners
     * @return \Illuminate\Http\Response
     */
    public function edit(technicianplanners $technicianplanners)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\technicianplanners  $technicianplanners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, technicianplanners $technicianplanners)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\technicianplanners  $technicianplanners
     * @return \Illuminate\Http\Response
     */
    public function destroy(technicianplanners $technicianplanners)
    {
        //
    }
	public function fetchevent(Request $request)
     {
		$id =  $request->get('var');
		$avaliable_equipment = \DB::table('equipmentdalycheckups')
								->select(DB::raw('dailycheckup_id as id,equipment_status as title, created_at as start, updated_at as end'))
								->where(['equ_id'=>$id])
								->get();
			return response()->json($avaliable_equipment);
    } 
}

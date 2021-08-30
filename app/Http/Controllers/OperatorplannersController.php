<?php

namespace App\Http\Controllers;

use App\Models\operatorplanners;
use Illuminate\Http\Request;

class OperatorplannersController extends Controller
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
		"operator_users_id"=> $request->get('technician_users_id'),
		"oper_state"=> $request->get('tech_state'),
		"oper_equipment_type"=> $request->get('tech_equipment_type'),
		"tech_code"=> $request->get('tech_code'),
		"equipment_id"=> $request->get('equ_id'),
		"ve_vehicle_number"=> $request->get('ve_vehicle_number'),
		);
		operatorplanners::create($values_details);
		// print_r(DB::getQueryLog());
		        return redirect('/operassignequipment/'.$id)->with('status', 'You have successfully added!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\operatorplanners  $operatorplanners
     * @return \Illuminate\Http\Response
     */
    public function show(operatorplanners $operatorplanners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\operatorplanners  $operatorplanners
     * @return \Illuminate\Http\Response
     */
    public function edit(operatorplanners $operatorplanners)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\operatorplanners  $operatorplanners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, operatorplanners $operatorplanners)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\operatorplanners  $operatorplanners
     * @return \Illuminate\Http\Response
     */
    public function destroy(operatorplanners $operatorplanners)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;
use DB;
use App\Models\projects;
use Illuminate\Http\Request;
use App\Models\project_sites;
class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
		 
		$projects = DB::table('projects')->get();
		return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$role =2;
		$fieldsupervisor = \DB::table('users')->where('role', $role)
						->get();
						//dd($fieldsupervisor);
      return view('projects.create',compact('fieldsupervisor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		 
        	$values = array(
		
					"project_code"=> $request->input('project_code'),
					"project_name"=> $request->input('project_name'),
					"project_type"=> $request->input('project_type'),
					"project_sites"=> $request->input('project_sites'),
					"phase"=> $request->input('phase'),
					"budget"=> $request->input('budget'),
					"start_time"=> $request->input('start_time'),
					"end_time"=> $request->input('end_time'),
					"project_address"=> $request->input('project_address'),
					"city"=> $request->input('city'),
					"state"=> $request->input('state'),
					"pincode"=> $request->input('pincode')
		
		); 
		 $id = Projects::create($values)->id;
		 
			 

			foreach ($request->input('sites') as $key => $site_value) { 
				  $newvalues = array(
					'project_id' => $id, 
					'project_name' =>$request->input('project_name'), 
					'site_code' => $site_value['site_code'], 
					'site_name' => $site_value['site_name'],
					'field_supervisor' => $site_value['field_supervisor'],
					'primary' => $site_value['primary'],
					'secondary' => $site_value['secondary'],
					'email' => $site_value['email'],
				); 
				 Project_sites::create($newvalues);
			}  

         return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(projects $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(projects $projects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projects $projects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(projects $projects)
    {
        //
    }
}

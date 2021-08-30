<?php

namespace App\Http\Controllers;

use App\Models\modules;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $modules = modules::find(2);
 
$component = $modules->component;
 
dd($component);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\modules  $modules
     * @return \Illuminate\Http\Response
     */
    public function show(modules $modules)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\modules  $modules
     * @return \Illuminate\Http\Response
     */
    public function edit(modules $modules)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\modules  $modules
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, modules $modules)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\modules  $modules
     * @return \Illuminate\Http\Response
     */
    public function destroy(modules $modules)
    {
        //
    }
}

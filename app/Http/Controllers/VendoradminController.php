<?php

namespace App\Http\Controllers;

use App\Models\vendoradmin;
use Illuminate\Http\Request;

class VendoradminController extends Controller
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
	public function clientlist()
    {
		// return redirect('/home/vendor_equipmentdetails');
		
        return view('vendoradmin/clientlist');
		
       // return view('vendors/dashboard');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
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
     * @param  \App\Models\vendoradmin  $vendoradmin
     * @return \Illuminate\Http\Response
     */
    public function show(vendoradmin $vendoradmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vendoradmin  $vendoradmin
     * @return \Illuminate\Http\Response
     */
    public function edit(vendoradmin $vendoradmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vendoradmin  $vendoradmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vendoradmin $vendoradmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vendoradmin  $vendoradmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(vendoradmin $vendoradmin)
    {
        //
    }
}

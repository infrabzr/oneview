<?php

namespace App\Http\Controllers;

use App\Models\sparepartssubcategories;
use Illuminate\Http\Request;

class SparepartssubcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $admin_user_id = auth()->user()->id;
		 $subcategories_list = \DB::table('sparepartssubcategories')
								->join('sparepartscategories', 'sparepartscategories.id', '=', 'sparepartssubcategories.cat_id','left')
								->where(['sparepartssubcategories.vendoradmin_id'=>$admin_user_id])
								->whereNull('sparepartssubcategories.deleted_at')
								->select('sparepartscategories.name as categoryname','sparepartssubcategories.*')
						->get();
		//dd($subcategories_list);
        return view('vendoradmin/spareparts/.subcategories_list',compact('subcategories_list'));
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
     * @param  \App\Models\sparepartssubcategories  $sparepartssubcategories
     * @return \Illuminate\Http\Response
     */
    public function show(sparepartssubcategories $sparepartssubcategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sparepartssubcategories  $sparepartssubcategories
     * @return \Illuminate\Http\Response
     */
    public function edit(sparepartssubcategories $sparepartssubcategories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sparepartssubcategories  $sparepartssubcategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sparepartssubcategories $sparepartssubcategories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sparepartssubcategories  $sparepartssubcategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(sparepartssubcategories $sparepartssubcategories)
    {
        //
    }
}

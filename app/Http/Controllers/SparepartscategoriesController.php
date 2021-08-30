<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Auth;
use App\Models\sparepartscategories;
use Illuminate\Http\Request;

class SparepartscategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		  $admin_user_id = auth()->user()->id;
		 $categories_list = \DB::table('sparepartscategories')->where(['vendoradmin_id'=>$admin_user_id])->whereNull('deleted_at')
						->get();
		//dd($categories_list);
        return view('vendoradmin/spareparts/.categories_list',compact('categories_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('vendoradmin/spareparts/.categories_create');
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
            'category_name' => 'required',
        ],[], 
		[
			'category_name' => 'Category Name ', 
		]
			);
        $details = array(
								"name"=>$request->input('category_name'),
								"vendoradmin_id"=>$admin_user_id,
				);
		//dd($details);
	 sparepartscategories::create($details);
	 return redirect('/sparepartscategories')->with('status', 'You have successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sparepartscategories  $sparepartscategories
     * @return \Illuminate\Http\Response
     */
    public function show(sparepartscategories $sparepartscategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sparepartscategories  $sparepartscategories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
		 $categories_data = \DB::table('sparepartscategories')->where(['id'=>$id])
						->get();
		//dd($categories_data);
        return view('vendoradmin/spareparts/.edit_categories',compact('categories_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sparepartscategories  $sparepartscategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sparepartscategories $sparepartscategories)
    {
       $id = $request->input('id');
	   	$values = array(
		
		"name"=> $request->input('category_name'),
		
		);
		
		
		DB::table('sparepartscategories')
			->where('id', $id)
			->update($values);
		return  redirect("/sparepartscategories")->with('status', 'Record updated successfully.');	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sparepartscategories  $sparepartscategories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	 public function softDeletes($id)
    {
        $product = sparepartscategories::find( $id );
		if ($product != null) {
       $product->delete();
      
    }
		return  redirect("/sparepartscategories")->with('error', 'Record was successfully deleted.');
    }
}

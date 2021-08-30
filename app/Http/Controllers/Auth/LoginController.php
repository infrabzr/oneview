<?php

namespace App\Http\Controllers\Auth;
use DB;
use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected function redirectTo()
    {
        
				$role_id = auth()->user()->role; 
		echo "hi";
	    echo $role_id;
	    die();
				if($role_id ==1 ){
						  return '/fieldsupervisor/dashboard';
				} elseif($role_id == 2){
						 return '/fieldsupervisor';
				} elseif($role_id == 3){
						 return '/home/superadmin';	 
				}elseif($role_id == 4){
						 return '/home/senior';	 
				}elseif($role_id == 5){
					return '/home/vendor';	 
				} elseif($role_id == 6){
					return '/home/finance';	 
				} elseif($role_id == 7){
					$id = Auth::user()->id; 
					$checkequipmentcount =DB::table('vendorequipments')
											->where("ve_vendor_id",$id)
											->get()
											->count();
					if($checkequipmentcount){
						return '/home/vendoradmin';
					}else{
						return '/vendorequipment';
					}

						 
				} elseif($role_id == 8){
					return '/home/operator';	 
				} elseif($role_id == 9){
					return '/home/technician';	 
				} elseif($role_id == 10){
					return '/home/chiefengineer';	 
				} 
    }
	 
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

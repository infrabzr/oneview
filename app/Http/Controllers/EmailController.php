<?php

namespace App\Http\Controllers;
use PDF;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FirstEmail;

class EmailController extends Controller
{
    public function sendEmail() {

        $to_email = "karunakar.2093@gmail.com";

        Mail::to($to_email)->send(new FirstEmail);

        if(Mail::failures() != 0) {
            return "<p> Success! Your E-mail has been sent.</p>";
        }

        else {
            return "<p> Failed! Your E-mail has not sent.</p>";
        }
    }
	 public function index(Request $request)
    {
		
			/* $values = array(
		
				"email"=> $request->input('email'),
				"vehicle_information"=> $request->input('vehicle_information'),
				"vehicle_images"=> $request->input('vehicle_imagesvehicle_images'),
				"vehicle_operator"=> $request->input('vehicle_operator'),
			); */
			$email  = $request->input('email');
			$vehicle_information =  $request->input('vehicle_information');
			$vehicle_information =  $request->input('vehicle_information');
			$vehicle_operator =  $request->input('vehicle_operator');
			$pro_id =  $request->input('pro_id');
			
			 $equipments = DB::table('vendorequipments')
					->join('vendorequipmendetails', 'vendorequipmendetails.ve_id', '=', 'vendorequipments.id','left')
					->join('vendorequipment_loans', 'vendorequipment_loans.ve_id', '=', 'vendorequipments.id','left')
					->where('vendorequipments.id',$pro_id)
					->select('vendorequipments.*', 'vendorequipmendetails.*', 'vendorequipment_loans.*','vendorequipments.id as main_id')
					->get();
			$equipment = $equipments[0];
			if($vehicle_operator == 1){
			$equipment_operators = DB::table('equipment_operators')->where(array('ve_id'=> $pro_id,"status"=>1))->get();
			$data["equipment_operators"] =   json_decode(json_encode($equipment_operators[0]), true);
			}else{
				$data["equipment_operators"] =0;
			}
			//dd($data);
        $data1["email"] = $email;
        $data1["title"] = "Equipment Details";
 
        $files = [
            ('http://13.233.71.224/images/1617689068Tipper_4_1.png'),
            ('http://13.233.71.224/images/1617689068Tipper_4_1.png'),
        ];
  $data["equipment"] = json_decode(json_encode($equipment), true);
  
        Mail::send('email-template', $data, function($message)use($data1, $files) {
            $message->to($data1["email"])
                    ->subject($data1["title"]);
 
            foreach ($files as $file){
                $message->attach($file);
            }
            
        });
			return response()->json(array('msg'=> "success"), 200);
        //dd('Mail sent successfully');
    }
}

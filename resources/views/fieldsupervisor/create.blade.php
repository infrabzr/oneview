@extends('layouts.fieldsupervisor')
@section('content')
<style>
img.img_icon {
    cursor: pointer;
}
label {
    font-size: 13px;
	color:#7a7676;
	    font-weight: 400;
}
.file_upload_oneview{
	display: inline-block;
    background-color: #90919a;
    color: white;
    padding: 0.5rem;
    font-family: sans-serif;
    border-radius: 0.3rem;
    cursor: pointer;
    vertical-align: middle;
    text-align: center;
    margin-top: 14%;
}
select.form-control.form_select_fil_1{
    max-width: 300px;
    padding: 5px 5px;
    background:#e3e1e1;
    color: #6f6868;
    border-radius: 8px;
    border: solid 1px #dbdedf;
}
textarea.form_select_fil_1.form-control, .form_select_fil_1{
	    background:#e3e1e1;
}
.form_select_fil_2 {
    max-width: 300px;
    padding: 5px 5px;
    background: #fffbfb;
    color: #6f6868;
    border-radius: 8px;
    border: solid 1px #dbdedf;
}
.ratio_addequipment {
    margin-top: 2%;
    padding-top: 2.7%;
    padding-bottom: 2%;
    background: #fff;
    margin-bottom: 2.7%;
    margin-left: 2%;
    margin-right: 2%;
    width: 96%;
}
h4.add_equipment{
	background: rgb(228,225,225);
	background: linear-gradient(35deg, rgba(228,225,225,1) 23%, rgba(255,255,255,1) 100%);
}
.nomargin{
	margin: 0px;
    padding-top: 15px;
    padding-bottom: 15px;
    padding-left: 15px;
    color: #4d4c54;
    border: 1px solid #c2c0c0;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    font-size: 14px;
    font-weight: 600;
}
.margin_to_20{
	margin-top:15px;
}
.margin_bottom_20{
margin-bottom:15px;	
}
.nopad_5{
	padding-left:5px;
	padding-right:5px;
}
.border_solid_1px{
	border:1px solid #e5e1e1;
	margin-left:1%;
	margin-right:1%;
	padding-top: 2%;
	width:98%;
	border-radius:10px;
}
.mt-5{
	margin:0px!important;
	font-size:13px;
	color:#232020;
	    font-weight: 700;
}
.thumbnail_image{
	border-radius: 10px;
    margin: 12%;
    padding: 0px;
}
.main_image{
	border-radius:10px;
	border:1px solid #bfbdbd;
}
.side_fixel_20{
	vertical-align: middle;
    padding-left: 20px;
}
.side_fixel_right_50{
	vertical-align: middle;
    padding-right: 50px;
}
.document_type_border{
	border: 1px solid #bab3b3;
	border-radius:10px;
}
.vachile_background_color{
	background-color: #f1eff0;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
    padding-right: 10px;
	    border-radius: 10px;
}
.vachile_document_align{
transform: rotate( 
-90deg
 );
    display: inline-block;
    vertical-align: middle;
    bottom: 0;
    font-weight: 400;
    height: 20px;
    padding: 0;
    white-space: nowrap;
}
.style_background{
	background-color:#e3e1e1;
}
#input-file, #input-file-insurance, #input-file-road-tax, #input-file-road-permit, #input-file-fitness {
    display: none;
    }
	span#selectedFileNameInsurance, span#selectedFileName, span#selectedFileNameRoadTax, span#selectedFileNameFitness, span#selectedFileNameRoadPermit {
    cursor: pointer;
}
 
.textgreen{
	color:green;
}
.red-tooltip + .tooltip > .tooltip-inner {background-color: #f00;}
.red-tooltip + .tooltip > .tooltip-arrow { border-bottom-color:#f00; }
</style>
<form method="post" action="/equipments/store" enctype="multipart/form-data">
@csrf
<div class="col-md-12  ratio_addequipment nopad">
<h4 class="add_equipment nomargin">ADD EQUIPMENT</h4>
<div class="col-md-12  margin_to_20 margin_bottom_20 border_solid_1px">
 @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
<div class="col-md-7 nopad">

<div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Product Type</label>
   <select class="form-control form_select_fil_1" name="e_product_type">
  <option>Select</option>
  <option value="Own">Own</option>
  <option value="Rent">Rent</option>
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Equipment Type</label>
   <select class="form-control form_select_fil_2" name="e_equipment_type">
  <option>Select</option>
  <option value="">Excavator</option>
  <option value=""> Tipper</option>
  <option value="">Crane</option>
  <option value="">Dumper</option>
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Select Brand</label>
   <select class="form-control form_select_fil_2" name="e_brand">
  <option>Select</option>
  <option>LT</option>
  <option>Apollo</option>
  <option>Cat</option>
  <option>Case</option>
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Select Year</label>
   <select class="form-control form_select_fil_2" name="e_year">
  <option value="2021">2021</option>
  <option value="2020">2020</option>
  <option value="2019">2019</option>
  <option value="2018">2018</option>
  <option value="2017">2017</option>
  <option value="2016">2016</option>
  <option value="2015">2015</option>
  <option value="2014">2014</option>
  <option value="2013">2013</option>
  <option value="2012">2012</option>
  <option value="2011">2011</option>
  <option value="2010">2010</option>
  <option value="2009">2009</option>
  <option value="2008">2008</option>
  <option value="2007">2007</option>
  <option value="2006">2006</option>
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Select Model</label>
    <input type="text" class="form-control"  placeholder="" name="e_model">  
	<!--<select class="form-control form_select_fil_2" name="e_model">
  <option value="demo">EX 70</option>
  <option value="demo1">EX 110</option>
  <option value="demo2">Ex 200</option>
</select>-->
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2 nopad_5">
   <div class="col-md-6 nopad"> 
	<label for="exampleInputEmail1">Capacity</label>
    <input type="text" class="form-control"  placeholder="" name="e_capacity"style="border-right: none;border-top-right-radius: 0px!important;
    border-bottom-right-radius: 0px;">  
   
  </div><div class="col-md-6 nopad"> <label for="exampleInputEmail1">&nbsp;</label>
  <select class="form-control form_select_fil_2 style_background" name="e_model" style="border-left: none;border-top-left-radius: 0px!important;
    border-bottom-left-radius: 0px;
    padding: 0px;">
  <option value="cum">cum</option>
  <option value="Ton">Ton</option>
  <option value="cum_HR">cum/HR</option>
</select>
  </div>
  </div>
  </div>
  <div class="col-md-4 nopad">
   
  <div class=" col-md-6 nopad">
    <div class="col-md-6 nopad form-group">
    <label for="exampleInputEmail1">Current Reading</label>
   <input type="text" name="e_current_reading" class="form-control"  placeholder="" style="border-right: none;border-top-right-radius: 0px!important;
    border-bottom-right-radius: 0px;">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
 <div class="col-md-6 nopad form-group ">
    <label for="exampleInputEmail1">&nbsp;</label>
    <select class="form-control style_background"  style="border-left: none;border-top-left-radius: 0px!important;
    border-bottom-left-radius: 0px;width: 55%;
    padding: 0px;">
  <option>Hrs</option>
   <option>Km</option>
</select>    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  </div>
  <div class=" col-md-6 nopad">
    <div class="col-md-6 nopad form-group">
    <label for="exampleInputEmail1">Service Duration</label>
   <input type="text" name="e_service_duration" class="form-control"  placeholder="" style="border-right: none;border-top-right-radius: 0px!important;
    border-bottom-right-radius: 0px;">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
 <div class="col-md-6 nopad form-group">
    <label for="exampleInputEmail1">&nbsp;</label>
    <select class="form-control style_background"  style="border-left: none;border-top-left-radius: 0px!important;
    border-bottom-left-radius: 0px;width: 55%;
    padding: 0px;">
  <option>Hrs</option>
  <option>Km</option>
</select>    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  </div>
  
    
  </div>
  <div class="form-group col-md-1 nopad_5 nopad">
    <label for="exampleInputEmail1">Type of Work</label>
   <select class="form-control form_select_fil_2" name="e_type_of_work">
  <option value="soil">Soil</option>
  <option value="">Rock</option>
 

</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-1 nopad_5">
    <label for="exampleInputEmail1">UOM</label>
    <select class="form-control form_select_fil_2" name="e_uom" >
  <option>Km</option>
  <option>Hour</option>
  <option>Trips</option>
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  
  
  <div class="form-group col-md-1 nopad_5">
    <label for="exampleInputEmail1">No. of WOH</label>
    <select class="form-control form_select_fil_2" name="e_wom">
  <option>Select</option>
  <option>240</option>
  <option>250</option>
  <option>480</option>
  <option>500</option>
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
   <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Vechile No</label>
   <input type="text" class=" form-control"  placeholder="" name="e_vehicle_number">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <input type="hidden" class=" form-control"  value="{{ Auth::user()->id }}" name="e_user_id">
  <div class=" form-group col-md-1 nopad_5 ">
   
    <label for="exampleInputEmail1">Shift</label>
  <select class="form-control form_select_fil_2" name="shift">
  <option value="day">Day Shift</option>
  <option value="night">Night Shift</option>
  <option value="doubleshift">Double Shift</option>
 

</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  
  </div>
  
  
    <div class=" col-md-3 nopad">
    <div class="col-md-4 nopad form-group">
    <label for="exampleInputEmail1">Expected Mileage</label>
   <input type="text" class="form-control" name="e_expected_mileage"  placeholder="" style="border-right: none;border-top-right-radius: 0px!important;
    border-bottom-right-radius: 0px; width:100%;">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
 <div class="col-md-8 nopad form-group ">
    <label for="exampleInputEmail1">&nbsp;</label>
	 <input type="text" class="form-control form_select_fil_1 "  placeholder="Per Ltr" style="border-left: none;border-top-left-radius: 0px!important;
    border-bottom-left-radius: 0px;width:35%;">
        <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  </div>
   
</div>


<div class="col-md-12"><h4 class="mt-5">Project Details</h4></div>
<div class="col-md-12 nopad margin_to_20 margin_bottom_20 border_solid_1px">

<div class="col-md-8 nopad" style="margin-top: 10px;">

<div class="form-group col-md-2">
    <label for="exampleInputEmail1">Project Code</label>
   <select class="form-control form_select_fil_2" id="e_project_code" name="e_project_code">
  <option >Select</option>
    @foreach($projects as $key => $val)
 <option value="{{ $projects[$key]->project_id }}">{{ $projects[$key]->project_code }}</option>
   @endforeach
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Project Name</label>
  <input type="text" id="project_name" class=" form_select_fil_1 form-control" >
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Site</label>
   <select class="form-control form_select_fil_2" id="project_sites">
  <option >Select</option>
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">State</label>
    <input type="text" class=" form_select_fil_1 form-control" id="project_state" placeholder="">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">City</label>
   <input type="text" class="form_select_fil_1 form-control" id="project_city" placeholder="">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Field Supervisor</label>
    <input type="text" class=" form_select_fil_1 form-control" id="field_supervisor" placeholder="">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  </div>
   <div class="col-md-4" style="margin-top: 10px;">
  <div class="form-group col-md-12">
    <label for="exampleInputEmail1">Complete Address</label>
   <textarea  class="form_select_fil_1 form-control " id="project_address"></textarea>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  </div>

   
  
    
  
</div><div class="col-md-12">
<h4 class="mt-5">Vendor Details</h4></div>
<div class="col-md-12  nopad margin_to_20 margin_bottom_20 border_solid_1px">

<div class="col-md-8 nopad" style="margin-top: 10px;">

<div class="form-group col-md-2">
    <label for="exampleInputEmail1">Vendor Code</label>
   <select class="form-control form_select_fil_2" id="e_vendor_id" name="e_vendor_id">
    <option >Select</option>
  @foreach($vendors as $key => $val)
 <option value="{{ $vendors[$key]->vendor_id }}">{{ $vendors[$key]->vendor_code }}</option>
   @endforeach
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Vendor Name</label>
    <input type="text" class="form_select_fil_1 form-control" id="vendor_name" placeholder="">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Phone No</label>
   <input type="text" class="form_select_fil_1 form-control"  id="vendor_phoneno" placeholder="">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Email ID</label>
  <input type="text" class="form_select_fil_1 form-control"  id="vendor_emailid" placeholder="">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">State</label>
   <input type="text" class="form_select_fil_1 form-control"  id="vendor_state" placeholder="">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">City</label>
    <input type="text" class="form_select_fil_1 form-control" id="vendor_city" placeholder="">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  </div>
   <div class="col-md-4" style="margin-top: 10px;">
  <div class="form-group col-md-12">
    <label for="exampleInputEmail1">Complete Address</label>
   <textarea  class="form_select_fil_1 form-control" id="vendor_address"></textarea>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  </div>

   
  
    
  
</div>

<div class="col-md-12"><h4 class="mt-5">Contract Details</h4></div>
<div class="col-md-12 nopad margin_to_20 margin_bottom_20 border_solid_1px"style=" background-color: #e5e1e1;" style="margin-top: 10px;">

<div class="col-md-12 nopad" style="margin-top: 6px;">
<div class="form-group col-md-2">
    <label for="exampleInputEmail1">Rental Start Date</label>
    <input placeholder="From" class="  datepicker first" name="e_rental_start_date" id="e_rental_start_date" type="text"    style="width:90%;">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
	<div class="form-group col-md-2">
    <label for="exampleInputEmail1">Rental End Date</label>
    <input placeholder="To" name="e_rental_end_date" class=" datepicker second" onchange="myFunction(this.value)" id="e_rental_end_date" type="text"     style="width:90%;">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">No Of Days</label>
  <div class="input-group my-group"> 

            
			 <input type="text" class="form-control"  name="noofdays"  id="noofdays" placeholder="" style="border-right: none;border-top-right-radius: 0px!important;
    border-bottom-right-radius: 0px;">
			 <select class="form-control style_background"  style="border-left: none;border-top-left-radius: 0px!important;
    border-bottom-left-radius: 0px; ">
                           <option>Days</option>
  <option>Months</option>
  <option>Years</option>
                        
                    </select> 
        </div>
  </div>
  
   

  <div class=" col-md-2">
	<div class="col-md-6 nopad form-group">
	<label for="exampleInputEmail1">Rental Cost</label>
   <input type="text" class="form-control" name="e_rental_cost"  placeholder="" style="border-right: none;border-top-right-radius: 0px!important;
    border-bottom-right-radius: 0px;">
	</div>
	<div class="col-md-6 form-group nopad ">
	<label for="exampleInputEmail1">&nbsp;</label>
	<select class="form-control style_background"  style="border-left: none;border-top-left-radius: 0px!important;
    border-bottom-left-radius: 0px; ">
  <option>K</option>
  <option>L</option>
  <option>C</option>
</select>
	</div>
  </div>
  <div class=" col-md-2">
	<div class="col-md-5 nopad form-group">
	<label for="exampleInputEmail1">Billing Cycle</label>
   <input type="text" class="form-control" name="e_billing_cycle"  placeholder="" style="border-right: none;border-top-right-radius: 0px!important;
    border-bottom-right-radius: 0px;">
	</div>
	<div class="col-md-7 form-group nopad">
	<label for="exampleInputEmail1">&nbsp;</label>
	<select class="form-control style_background" style="border-left: none;border-top-left-radius: 0px!important;
    border-bottom-left-radius: 0px; width:75%;">
  <option>Days</option>
  <option>Months</option>
  <option>Years</option>
</select>
	</div>
  </div>
     
   <div class="form-group col-md-2">
    <input type="file" name="upload" id="actual-btn">
	<!--<label for="upload" class="file_upload_oneview">Upload Rental Contract</label>
	<span id="file-chosen">No file chosen</span>-->
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
</div>
</div>




<div class="col-md-12  margin_to_20 margin_bottom_20">
<div class="col-md-5">
<div class="col-md-3" id="image_preview"><div class="col-md-12"><img class="thumbnail_image img-responsive" src="https://www.materialwala.com/buildsand/site_assets/newapp/excavator.jpg"></div></div><!--<div class="col-md-3"><img class="thumbnail_image" src="https://www.materialwala.com/buildsand/site_assets/newapp/excavator.jpg"></div>-->
<div class="col-md-9" id="image_preview_full"><img class="main_image" src="https://www.materialwala.com/buildsand/site_assets/newapp/tipper.jpg"></div>
<div class="col-md-12" style="text-align: center; margin-bottom:15px; margin-top:15px;">
 <input type="file" name="image[]" multiple Class="btn btn-primary btn_apply" id="images"  onchange="preview_images();" multiple style=" background: #15aba9;border: none;"/>
<!--<button type="button" class="btn btn-primary btn_apply" style=" background: #15aba9;border: none;">ADD IMAGE</button>--></div>
</div>
<div class="col-md-1 vachile_document_align float-left" ><p style="display:none;">Vehicle Document</p>
</div>
<div class="col-md-6 document_type_border nopad">
<div class="col-md-12  vachile_background_color">
<div class="col-md-6"><span>Document Type</span></div>
<div class="col-md-3">Start Date</div>
<div class="col-md-3"> End Date</div></div>

<div class="col-md-12 margin_to_20">



<div class="col-md-6">

<div class="col-md-6">Vechile Rc </div><div class="col-md-2">

<label class="upload-btn">
  <input type="file" id="input-file" name="d_vechile_rc" onchange="changeText()" />
  <span  ><img  class="img_icon"  data-toggle="tooltip" data-placement="top" title="Upload Vechile Rc Doc"  src="https://www.materialwala.com/buildsand/site_assets/newapp/veh-rc.png"></span> 
</label>



</div> <div class="col-md-4" id="selectedFileName">Validity</div>

</div>
<div class="col-md-3"> <input autocomplete="off"type="text" name="rc_start_date" class=" datepicker rc_first" size="10" placeholder="From"/> </div>
<div class="col-md-3">   <input autocomplete="off"type="text" name="rc_end_date" class=" datepicker rc_second" size="10" placeholder="To" />  </div>

</div>



<div class="col-md-12 margin_to_20" style="background-color:f7f6ff;">
<div class="col-md-6"><div class="col-md-6">Insurance </div><div class="col-md-2">
<label class="upload-btn">
  <input type="file" id="input-file-insurance" name="d_insurance" onchange="changeTextInsurance()" />
  <span ><img class="img_icon"  data-toggle="tooltip" data-placement="top" title="Upload Insurance Doc" src="https://www.materialwala.com/buildsand/site_assets/newapp/insurance.png"></span>
</label>

</div><div class="col-md-4" id="selectedFileNameInsurance">Validity</div></div> 
<div class="col-md-3"> <input autocomplete="off"type="text" name="ins_start_date" class=" datepicker ins_first" size="10" placeholder="From"/> </div>
<div class="col-md-3">   <input autocomplete="off"type="text" name="ins_end_date" class=" datepicker ins_second" size="10" placeholder="To" />  </div>
</div>
<div class="col-md-12 margin_to_20">
<div class="col-md-6"><div class="col-md-6">Road Tax </div><div class="col-md-2">
<label class="upload-btn">
  <input type="file" id="input-file-road-tax" name="d_road_tax" onchange="changeTextRoadTax()" />
  <span ><img class="img_icon"  data-toggle="tooltip" data-placement="top" title="Upload Road Tax Doc" src="https://www.materialwala.com/buildsand/site_assets/newapp/tax.png"></span>
</label>



 </div><div class="col-md-4" id="selectedFileNameRoadTax">Validity</div></div> 
<div class="col-md-3"> <input autocomplete="off"type="text" name="tax_start_date" class=" datepicker tax_first" size="10" placeholder="From"/> </div>
<div class="col-md-3">   <input autocomplete="off"type="text" name="tax_start_date" class=" datepicker tax_second" size="10" placeholder="To" />  </div>
</div>
 
<div class="col-md-12 margin_to_20" style="background-color:f7f6ff;">
<div class="col-md-6"><div class="col-md-6">Road Permit </div><div class="col-md-2">

<label class="upload-btn">
  <input type="file" id="input-file-road-permit" name="d_road_permit" onchange="changeTextRoadPermit()" />
  <span ><img class="img_icon"  data-toggle="tooltip" data-placement="top" title="Upload Road Permit Doc" src="https://www.materialwala.com/buildsand/site_assets/newapp/Road_perrmet.png"></span>
</label>



 </div><div class="col-md-3" id="selectedFileNameRoadPermit">Validity</div></div>

<div class="col-md-3"> <input autocomplete="off"type="text" name="permit_start_date" class=" datepicker permit_first" size="10" placeholder="From"/> </div>
<div class="col-md-3">   <input autocomplete="off"type="text" name="permit_end_date" class=" datepicker permit_second" size="10" placeholder="To" />  </div>
</div>
 
<div class="col-md-12 margin_to_20">
<div class="col-md-6"><div class="col-md-6">Fitness / Break </div><div class="col-md-2">
<label class="upload-btn">
  <input type="file" id="input-file-fitness" name="d_fitness" onchange="changeTextFitness()" />
  <span ><img class="img_icon" data-toggle="tooltip" data-placement="top" title="Upload Fitness / Break Doc" src="https://www.materialwala.com/buildsand/site_assets/newapp/fintenss_break.png"></span>
</label>
 

</div><div class="col-md-4" id="selectedFileNameFitness">Validity</div></div>


<div class="col-md-3"> <input autocomplete="off"type="text" name="fitness_start_date" class=" datepicker fitness_first" size="10" placeholder="From"/> </div>
<div class="col-md-3">   <input autocomplete="off"type="text" name="fitness_end_date" class=" datepicker fitness_second" size="10" placeholder="To" />  </div>
</div>
  
<p>&nbsp;</p>
</div>
<div class="col-md-12" style="text-align: center; margin-bottom:15px; margin-top:15px;"><div class="col-md-6"></div><div class="col-md-6">
<input  type="submit" class="btn btn-primary btn_apply" style="background: rgb(65,56,160);
background: linear-gradient(73deg, rgba(65,56,160,1) 23%, rgba(114,35,162,1) 100%);border: none;"></button></div>
</div>
</div>
</div>
</form>
<script>
const actualBtn = document.getElementById('actual-btn');

const fileChosen = document.getElementById('file-chosen');

actualBtn.addEventListener('change', function(){
  fileChosen.textContent = this.files[0].name
})
 $('#e_vendor_id').on('change',function(e)
 {
    
    var e_vendor_id = e.target.value;

   
    jQuery.ajax({
	    type: 'POST',
        url:'/equipments/vendordetails',

        data: {
			"_token": "{{ csrf_token() }}",
            id: e_vendor_id,
			
        },
        success: function( data ){
			var newdata = data.msg;

			 $("#vendor_name").val(newdata[0].vendor_name);
			 $("#vendor_phoneno").val(newdata[0].vendor_phone);
			 $("#vendor_emailid").val(newdata[0].vendor_email);
			 $("#vendor_state").val(newdata[0].state);
			 $("#vendor_city").val(newdata[0].city);
			 $("#vendor_address").val(newdata[0].address);
        },
       
    }); 
 });
 $('#e_project_code').on('change',function(e)
 {
    
    var e_project_code = e.target.value;
	
   
    jQuery.ajax({
	    type: 'POST',
        url:'/equipments/projectdetails',

        data: {
			"_token": "{{ csrf_token() }}",
            id: e_project_code,
			
        },
        success: function( data ){
			var newdata = data.msg;
			console.log(newdata);
			 $("#project_name").val(newdata[0].project_name);
			
			 $("#project_state").val(newdata[0].state);
			 $("#project_city").val(newdata[0].city);
			 $("#project_address").val(newdata[0].address); 
			 $("#field_supervisor").val(""); 
			 
			 var newdata1 = data.project_sites;
		 
		 var html = '<option >Select</option>';
		
            $.each( newdata1, function( key, value ) { 
				 html+='<option value='+value.site_id+'>'+value.site_name+'-'+value.site_id+'</option>'; 
			 });
			 
			$("#project_sites").html(html);	 
        },
       
    }); 
 });
 $('#project_sites').on('change',function(e)
 {
    
    var e_site_code = e.target.value;
	
   
    jQuery.ajax({
	    type: 'POST',
        url:'/equipments/fieldsupervisor',

        data: {
			"_token": "{{ csrf_token() }}",
            id: e_site_code,
			
        },
        success: function( data ){
			var newdata = data.msg;
			console.log(newdata);
			 $("#field_supervisor").val(newdata[0].field_supervisor);
			 
        },
       
    }); 
 });
 function preview_images() 
{
 var total_file=document.getElementById("images").files.length;
// alert(URL.createObjectURL(event.target.files[0]));
  $('#image_preview_full').html("<div class='col-md-12'><img class='thumbnail_image img-responsive' src='"+URL.createObjectURL(event.target.files[0])+"'></div>");
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<div class='col-md-12'><img class='thumbnail_image img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
 }
}

 
 </script>
 <script>
function myFunction(val) {
  var e_rental_start_date =  $("#e_rental_start_date").val();
	var e_rental_end_date = $("#e_rental_end_date").val();

var date1 = new Date(e_rental_start_date);
var date2 = new Date(e_rental_end_date);
  console.log(date1);
  console.log(date2);
// To calculate the time difference of two dates
var Difference_In_Time = date2.getTime() - date1.getTime();
  
// To calculate the no. of days between two dates
var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

  $("#noofdays").val(Difference_In_Days);
}
</script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
.inputbox{
	width:30% !important;
}
.datepicker{
	height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.my-group .form-control{
    width:50%;
}
</style>
<script>
$('.second').datepicker({
    dateFormat: "yy/mm/dd" 
});

$(".first").datepicker({
  dateFormat: "yy/mm/dd",
  onSelect: function(date) {
    var date1 = $('.first').datepicker('getDate');
    var date = new Date(Date.parse(date1));
    date.setDate(date.getDate() + 1);
    var newDate = date.toDateString();
    newDate = new Date(Date.parse(newDate));
    $('.second').datepicker("option", "minDate", newDate);
  }
});
$('.rc_second').datepicker({
    dateFormat: "yy/mm/dd" 
});
$(".rc_first").datepicker({
  dateFormat: "yy/mm/dd",
  onSelect: function(date) {
    var date1 = $('.rc_first').datepicker('getDate');
    var date = new Date(Date.parse(date1));
    date.setDate(date.getDate() + 1);
    var newDate = date.toDateString();
    newDate = new Date(Date.parse(newDate));
    $('.rc_second').datepicker("option", "minDate", newDate);
  }
});
$('.ins_second').datepicker({
    dateFormat: "yy/mm/dd" 
});
$(".ins_first").datepicker({
  dateFormat: "yy/mm/dd",
  onSelect: function(date) {
    var date1 = $('.ins_first').datepicker('getDate');
    var date = new Date(Date.parse(date1));
    date.setDate(date.getDate() + 1);
    var newDate = date.toDateString();
    newDate = new Date(Date.parse(newDate));
    $('.ins_second').datepicker("option", "minDate", newDate);
  }
});
$('.tax_second').datepicker({
    dateFormat: "yy/mm/dd" 
});
$(".tax_first").datepicker({
  dateFormat: "yy/mm/dd",
  onSelect: function(date) {
    var date1 = $('.tax_first').datepicker('getDate');
    var date = new Date(Date.parse(date1));
    date.setDate(date.getDate() + 1);
    var newDate = date.toDateString();
    newDate = new Date(Date.parse(newDate));
    $('.tax_second').datepicker("option", "minDate", newDate);
  }
});
$('.permit_second').datepicker({
    dateFormat: "yy/mm/dd" 
});
$(".permit_first").datepicker({
  dateFormat: "yy/mm/dd",
  onSelect: function(date) {
    var date1 = $('.permit_first').datepicker('getDate');
    var date = new Date(Date.parse(date1));
    date.setDate(date.getDate() + 1);
    var newDate = date.toDateString();
    newDate = new Date(Date.parse(newDate));
    $('.permit_second').datepicker("option", "minDate", newDate);
  }
});
$('.fitness_second').datepicker({
    dateFormat: "yy/mm/dd" 
});
$(".fitness_first").datepicker({
  dateFormat: "yy/mm/dd",
  onSelect: function(date) {
    var date1 = $('.fitness_first').datepicker('getDate');
    var date = new Date(Date.parse(date1));
    date.setDate(date.getDate() + 1);
    var newDate = date.toDateString();
    newDate = new Date(Date.parse(newDate));
    $('.fitness_second').datepicker("option", "minDate", newDate);
  }
});
</script>
<script type="text/javascript">
  function changeText() {
    var y = document.getElementById("input-file").value;
	const words = y.split('.');
    document.getElementById("selectedFileName").innerHTML = words[1];
	$("#selectedFileName").addClass("textgreen");
  } 
  function changeTextInsurance() {
    var y = document.getElementById("input-file-insurance").value;
	const words = y.split('.');
    document.getElementById("selectedFileNameInsurance").innerHTML =words[1];
	$("#selectedFileNameInsurance").addClass("textgreen");
  }
  function changeTextRoadTax() {
    var y = document.getElementById("input-file-road-tax").value;
	const words = y.split('.');
    document.getElementById("selectedFileNameRoadTax").innerHTML = words[1];
	$("#selectedFileNameRoadTax").addClass("textgreen");
  }
  function changeTextRoadPermit() {
    var y = document.getElementById("input-file-road-permit").value;
	const words = y.split('.');
    document.getElementById("selectedFileNameRoadPermit").innerHTML = words[1];
	$("#selectedFileNameRoadPermit").addClass("textgreen");
  }
  function changeTextFitness() {
    var y = document.getElementById("input-file-fitness").value;
	const words = y.split('.');
    document.getElementById("selectedFileNameFitness").innerHTML = words[1];
	$("#selectedFileNameFitness").addClass("textgreen");
  }
</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
@endsection
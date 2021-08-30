@extends('layouts.vendoradmin')

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
    padding-top: 3px;
    padding-bottom: 0px;
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
.required{
	color: red;
    font-weight: 600;
}
#loan_div{
	display:none;
}
#percentageshow{
	display:none;
}
</style>

<div class="col-md-12  ratio_addequipment nopad" >
<div class="col-md-12 add_equipment nomargin" style="background: linear-gradient(
35deg
, rgba(228,225,225,1) 23%, rgba(255,255,255,1) 100%);">
<div class="col-md-7">
<h4 class="" >ADD EQUIPMENT</h4>
</div>
<?php /*
<div class="col-md-2 text-right ">
<div class="float-right" style="float: right;"><a href="{{URL::to('/file/equipment data.csv') }}"  class="btn btn btn-warning" download>Download Equipment Template </a> 
</div>

</div>
<div class="col-md-3 text-right ">
<form action="/vendorequipment/bulkupload" method="post" enctype="multipart/form-data" id="submitForm">	
@csrf			
						
						      <label for="files"  class="btn btn-primary">Upload Equipment Template</label>
						<input type="file" name="file"   id="files"  style="visibility:hidden;" />
						
					
						  <input type="hidden" class=" form-control"  value="{{ Auth::user()->id }}" name="ve_vendor_id" >

					<!--<input type="submit" class="btn btn-primary" name="import_data" value="IMPORT">-->
							
				</form>
</div>
 */ ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
$("#files").change(function() {
  filename = this.files[0].name
  console.log(filename);
              document.getElementById('submitForm').submit();

});
function submitForm(){
   window.setTimeout(
       function(){
		  // alert();
           //will be executed when the dialog is closed -> submit your form
           //you might want to check if a file is selected here since the onclick will be triggered also in case of pressing 'cancel'-button
            document.getElementById('submitForm').submit();
       }, 0
  );
}
</script>

</div>
<div class="col-md-12">
	 @if (session('status'))
        <div class="alert alert-success" >
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
        </div>
    @endif
	 @if (session('error'))
        <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('error') }}
        </div>
    @endif
	</div>
<form method="post" action="/vendorequipment/rentstore" enctype="multipart/form-data">
@csrf
<!--<h4 class="add_equipment nomargin">ADD EQUIPMENT</h4>-->
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
    <label for="exampleInputEmail1">Product Type <span class="required">*</span></label>
   <select class="form-control form_select_fil_2" id="product_type" name="ve_product_type" required>
  <option value="">Select</option>
  <option value="avaliable">Avaliable</option>
  <option value="rentout" selected>Rented Out</option>
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Equipment Type <span class="required">*</span></label>
   <select class="form-control form_select_fil_2 js-example-basic-single" name="ve_equipment_type" required>
  <option value="">Select</option>
  @foreach($subcategories as $subcategoriesdata)
  <option value="{{$subcategoriesdata->id}}">{{$subcategoriesdata->sub_category_name}}</option>
	@endforeach 

</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Select Brand <span class="required">*</span></label>
   <select class="form-control form_select_fil_2" name="ve_brand" required>
  <option value="">Select</option>
  @foreach($eq_brands as $eq_brandsdata)
  <option value="{{$eq_brandsdata->name}}">{{$eq_brandsdata->name}}</option>
  @endforeach
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Select Year <span class="required">*</span></label>
   <select class="form-control form_select_fil_2" name="ve_year" required>
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
    <label for="exampleInputEmail1">Select Model <span class="required">*</span></label>
    <input type="text" class="form-control"  placeholder="" name="ve_model" required>  
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
    <input type="text" class="form-control"  placeholder="" name="ve_capacity"style="border-right: none;border-top-right-radius: 0px!important;
    border-bottom-right-radius: 0px;" >  
   
  </div><div class="col-md-6 nopad"> <label for="exampleInputEmail1">&nbsp;</label>
  <select class="form-control form_select_fil_2 style_background" name="e_model" style="border-left: none;border-top-left-radius: 0px!important;
    border-bottom-left-radius: 0px;
    padding: 0px;" >
	<option >Select</option>
  <option value="cum">cum</option>
  <option value="Ton">Ton</option>
  <option value="cum_HR">cum/HR</option>
</select>
  </div>
  </div>
  </div>
  
  <div class="form-group col-md-1 nopad_5 nopad">
    <label for="exampleInputEmail1">Type of Work <span class="required">*</span></label>
   <select class="form-control form_select_fil_2" name="ve_type_of_work" required>
<option >Select</option>
  <option value="soil">Soil</option>
  <option value="rock">Rock</option>
  <option value="concrete">Concrete</option>
 

</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  
  <div class="form-group col-md-1">
    <label for="exampleInputEmail1">UOM <span class="required">*</span></label>
  <select class="form-control form_select_fil_2" name="e_uom" required="">
  <option >Select</option>
  <option>Km</option>
  <option>Hour</option>
  <option>Trips</option>
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  
   <div class="form-group col-md-1">
    <label for="exampleInputEmail1">Vehicle No </label>
   <input type="text" class=" form-control"  placeholder="" name="ve_vehicle_number" >
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <input type="hidden" class=" form-control"  value="{{ Auth::user()->id }}" name="ve_vendor_id" required>
  
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Vehicle Code <span class="required">*</span></label>
   <input type="text" class=" form-control"  placeholder="" name="ve_vehicle_code" required>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  
    <div class=" col-md-2 nopad">
    <div class="col-md-5 nopad form-group">
    <label for="exampleInputEmail1">Expected </label>
   <input type="text" class="form-control" name="ve_expected_mileage"  placeholder="" style="border-right: none;border-top-right-radius: 0px!important;
    border-bottom-right-radius: 0px; " >
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
 <div class="col-md-7 nopad form-group ">
    <label for="exampleInputEmail1">Mileage</label>
	 <input type="text" class="form-control form_select_fil_1 "  placeholder="Per Ltr" style="border-left: none;border-top-left-radius: 0px!important;
    border-bottom-left-radius: 0px; width:60%" >
        <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  </div>
  <div class="form-group col-md-1 nopad_5 ">
    <label for="exampleInputEmail1">Loan <span class="required">*</span></label>
   <select class="form-control form_select_fil_2" name="loan_taken" required id="loan_statuscheck">
   <option >Select</option>
  <option value="1">Yes</option>
  <option value="0">No</option>
 

</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
   
</div>


<div class="col-md-12"><h4 class="mt-5">Service Details</h4></div>

<div class="col-md-12  nopad margin_to_20 margin_bottom_20 border_solid_1px">

    <div class="form-group col-md-2 nopad_5">
   <div class="col-md-6 nopad"> 
	<label for="exampleInputEmail1">For Every <span class="required">*</span></label>
    <input type="text" class="form-control"  placeholder="" name="serivce_to_be_done_for_every"style="border-right: none;border-top-right-radius: 0px!important;
    border-bottom-right-radius: 0px;" >  
   
  </div><div class="col-md-6 nopad"> <label for="exampleInputEmail1">&nbsp;</label>
  <select class="form-control form_select_fil_2 style_background" name="service_metric_km_hours" style="border-left: none;border-top-left-radius: 0px!important;
    border-bottom-left-radius: 0px;
    padding: 0px;" >
  <option value="km">Km</option>
  <option value="hour">Hour</option>
</select>
  </div>
  </div>
 <div class="col-md-1 nopad" style="margin-top: 2.4%;text-align: center;    width: 1%;font-weight: 600;"> or</div>
  <div class="form-group col-md-2 nopad_5">
   <div class="col-md-6 nopad"> 
	<label for="exampleInputEmail1">&nbsp;</label>
    <input type="text" class="form-control"  placeholder="" name="service_to_be_done_for_every_xDays"style="border-right: none;border-top-right-radius: 0px!important;
    border-bottom-right-radius: 0px;" >  
   
  </div><div class="col-md-6 nopad"> <label for="exampleInputEmail1">&nbsp;</label>
  <select class="form-control form_select_fil_2 style_background"  style="border-left: none;border-top-left-radius: 0px!important;
    border-bottom-left-radius: 0px;
    padding: 0px;" >
  <option value="cum">Days</option>
</select>
  </div>
  </div>

  <div class="form-group col-md-2 nopad_5">
   <div class="col-md-6 nopad"> 
	<label for="exampleInputEmail1">Last Serviced at <span class="required">*</span></label>
    <input type="text" class="form-control"  placeholder="" name="last_serviced_at"style="border-right: none;border-top-right-radius: 0px!important;
    border-bottom-right-radius: 0px;" required>  
   
  </div><div class="col-md-6 nopad"> <label for="exampleInputEmail1">&nbsp;</label>
  <select class="form-control form_select_fil_2 style_background" name="last_serviced_at_type" style="border-left: none;border-top-left-radius: 0px!important;
    border-bottom-left-radius: 0px;
    padding: 0px;" required>
  <option value="km">Km</option>
  <option value="hour">Hour</option>
</select>
  </div>
  </div>
   <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Date <span class="required">*</span></label>
    <input  class="  datepicker first" name="last_serviced_at_date" id="last_serviced_at_date" type="text"    style="width:90%;">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  
    
  
</div>
<div class="col-md-12" id="loan_div">
<div class="col-md-12"><h4 class="mt-5">Loan Details</h4></div>
<div class="col-md-12 nopad margin_to_20 margin_bottom_20 border_solid_1px" style="margin-top: 10px;">

 
  <div class="form-group col-md-1 nopad_5 ">
    <label for="exampleInputEmail1">Bank Name</label>
   <select class="form-control form_select_fil_2" name="bank_name" >
  <option >Select</option>
  @foreach($banks as $bankdata)
  <option value="{{$bankdata->bank_name}}">{{$bankdata->bank_name}}</option>
 @endforeach

</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
   <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Bank Location</label>
   <input type="text" class=" form-control"  placeholder="SBI Jubilee Hills" name="bank_location" >
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  
  
  <div class="form-group col-md-2 nopad_5">
   <div class="col-md-9 nopad"> 
	<label for="exampleInputEmail1">Total Loan amount</label>
    <input type="text" class="form-control"  placeholder="" name="total_loan_amount"style="border-right: none;border-top-right-radius: 0px!important;
    border-bottom-right-radius: 0px;" >  
   
  </div><div class="col-md-3 nopad"> <label for="exampleInputEmail1">&nbsp;</label>
  <select class="form-control form_select_fil_2 style_background" name="total_loan_amount_type" style="border-left: none;border-top-left-radius: 0px!important;
    border-bottom-left-radius: 0px;
    padding: 0px;"  >
  <option value="cum">L</option>
  <option value="Ton">C</option>
</select>
  </div>
  </div>
   <div class="form-group col-md-2 nopad">
   <div class="col-md-8 nopad"> 
	<label for="exampleInputEmail1">EMI Amount</label>
    <input type="text" class="form-control"  placeholder="" name="emi_amount"style="border-right: none;border-top-right-radius: 0px!important;
    border-bottom-right-radius: 0px;" >  
   
  </div><div class="col-md-4 nopad"> <label for="exampleInputEmail1">&nbsp;</label>
  <select class="form-control form_select_fil_2 style_background" name="emi_amount_type" style="border-left: none;border-top-left-radius: 0px!important;
    border-bottom-left-radius: 0px;
    padding: 0px;" >
  <option value="cum">Inr</option>
</select>
  </div>
  </div>
  
  
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Loan Start Date</label>
    <input placeholder="From" class="  datepicker first" name="loan_start_date" id="lone_rental_start_date" type="text"    style="width:90%;">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
	<div class="form-group col-md-2 nopad">
    <label for="exampleInputEmail1">Loan End Date</label>
    <input placeholder="To" name="loan_end_date" class=" datepicker second" onchange="myFunction(this.value)" id="lone_rental_end_date" type="text"     style="width:90%;">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
 <div class="form-group col-md-1 nopad_5 ">
    <label for="exampleInputEmail1">Loan Period</label>
   <input type="text" id="loan_period" class="form-control" >
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
 
  
  <div class="form-group col-md-2 nopad_5">
   <div class="col-md-8 nopad"> 
	<label for="exampleInputEmail1">EMI Last Date</label>
    <input type="text" class="form-control datepicker first"  placeholder="" name="emi_last_date"  >  
   
  </div>
  </div>
  
</div>
</div>


<div class="col-md-12">
<h4 class="mt-5">Client Details</h4></div>
<div class="col-md-12  nopad margin_to_20 margin_bottom_20 border_solid_1px">

<div class="col-md-12 nopad" style="margin-top: 10px;">
<div class="form-group col-md-2">
    <label for="exampleInputEmail1"> Add Client <span class="required">*</span></label>
    <select class="form-control form_select_fil_2" id="vendorclients" name="client_id">
  <option >Select</option>
    @foreach($vendorclients as $key => $val)
 <option value="{{ $vendorclients[$key]->id }}">{{ $vendorclients[$key]->name }}</option>
   @endforeach
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>

  <div class="form-group col-md-2">
    <label for="exampleInputEmail1"> Person of contact <span class="required">*</span></label>
	  <select class="form-control form_select_fil_2" id="personofcontact" name="persion_id">
	  </select>
    <!--<input type="text" class="form_select_fil_1 form-control" id="client_name" placeholder="">-->
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1"> Designation <span class="required">*</span></label>
    <input type="text" class="form_select_fil_1 form-control" id="client_designation" placeholder="" name="client_designation">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Phone No <span class="required">*</span></label>
   <input type="text" class="form_select_fil_1 form-control"  name="client_phoneno" id="client_phone">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Email ID <span class="required">*</span></label>
  <input type="text" class="form_select_fil_1 form-control"  name="client_emailid" id="contacts_email">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
 <!-- <div class="form-group col-md-2">
    <label for="exampleInputEmail1">State <span class="required">*</span></label>
   <input type="text" class="form_select_fil_1 form-control"  name="client_state" placeholder="">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-1">
    <label for="exampleInputEmail1">City <span class="required">*</span></label>
    <input type="text" class="form_select_fil_1 form-control" name="client_city" placeholder="">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>-->
  </div>

   
  
    
  
</div>


<div class="col-md-12"><h4 class="mt-5">Project Details</h4></div>
<div class="col-md-12 nopad margin_to_20 margin_bottom_20 border_solid_1px">



  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Project Name <span class="required">*</span></label>
	<select class="form-control form_select_fil_2" id="projectname" name="project_id">
	  </select>
  <input type="hidden" id="project_name" class=" form_select_fil_1 form-control" name="project_name">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
 
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">State <span class="required">*</span></label>
    <input type="text" class=" form_select_fil_1 form-control" id="project_state" placeholder="" name="project_state">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">City <span class="required">*</span></label>
   <input type="text" class="form_select_fil_1 form-control" id="project_city" placeholder="" name="project_city">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
 

  <div class="form-group col-md-3">
    <label for="exampleInputEmail1">Complete Address <span class="required">*</span></label>
   <textarea  class="form_select_fil_1 form-control " id="project_address" name="project_address"></textarea>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>


   
  
    
  
</div>




<div class="col-md-12"><h4 class="mt-5">Rental Contract Details</h4></div>
<div class="col-md-12 nopad margin_to_20 margin_bottom_20 border_solid_1px" style="margin-top: 10px;">

<div class="col-md-12 nopad" style="margin-top: 6px;">
<div class="form-group col-md-2">
    <label for="exampleInputEmail1">Rental Start Date <span class="required">*</span></label>
    <input placeholder="From" class="  datepicker first" name="ve_rental_start_date" id="e_rental_start_date" type="text"    style="width:90%;" required>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
	<div class="form-group col-md-2">
    <label for="exampleInputEmail1">Rental End Date <span class="required">*</span></label>
    <input placeholder="To" name="ve_rental_end_date" class=" datepicker second" onchange="myFunction(this.value)" id="e_rental_end_date" type="text"     style="width:90%;" required>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">No Of Days <span class="required">*</span></label>
  <div class="input-group " style="width:70%"> 

            
			 <input readonly type="text" class="form-control"  name="ve_noofdays"  id="noofdays" placeholder="" style="" required>
			<!-- <select class="form-control style_background"  style="border-left: none;border-top-left-radius: 0px!important;
    border-bottom-left-radius: 0px; " id="defaltselect">
                           <option value="days" >Days</option>
  <option  value="months">Months</option>
  <option value="years">Years</option>
                        
                    </select> -->
        </div>
  </div>
 
   <div class=" form-group col-md-1 nopad_5 ">
   
    <label for="exampleInputEmail1">Shift <span class="required">*</span></label>
  <select class="form-control form_select_fil_2" name="shift" required="">
  <option>Select</option>
  <option value="day">Day Shift</option>
  <option value="night">Night Shift</option>
  <option value="doubleshift">Double Shift</option>
 

</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  
  </div>
 <div class="form-group col-md-1 nopad_5">
    <label for="exampleInputEmail1">No. of WOH <span class="required">*</span></label>
	<input type="text" name="e_wom" class="form-control">
    <!--<select class="form-control form_select_fil_2" name="e_wom"  ="">
  <option value="">Select</option>
  <option value="240">240</option>
  <option value="250">250</option>
  <option value="480">480</option>
  <option value="500">500</option>
</select>-->
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class=" col-md-2">
	<div class="col-md-6 nopad form-group">
	<label for="exampleInputEmail1">Rental Cost <span class="required">*</span></label>
   <input type="text" class="form-control" name="ve_rental_cost"  placeholder="" style="border-right: none;border-top-right-radius: 0px!important;
    border-bottom-right-radius: 0px;" required>
	</div>
	<div class="col-md-6 form-group nopad ">
	<label for="exampleInputEmail1">&nbsp;</label>
	<select class="form-control style_background"  style="border-left: none;border-top-left-radius: 0px!important;
    border-bottom-left-radius: 0px; ">
  <option value="k">K</option>
  <option value="l">La</option>
  <option value="c">Cr</option>
</select>
	</div>
  </div>
  <div class=" form-group col-md-1 nopad_5 " >
   
    <label for="exampleInputEmail1">GST <span class="required">*</span></label>
  <select class="form-control form_select_fil_2" name="gst" required="" id="gst">
 <option >Select</option>
 <option value="inclusive">Inclusive</option>
  <option value="excluding">Excluding</option>
 

</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  
  </div>
  <div class=" form-group col-md-1 nopad_5 " id="percentageshow">
   
    <label for="exampleInputEmail1">Percentage <span class="required">*</span></label>
  <select class="form-control form_select_fil_2" name="gstpercentage" >
 <option >Select</option>
 <?php for($i=1;$i<=28;$i++){ ?>
 <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
 <?php } ?>
 

</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  
  </div>
  <div class=" col-md-2">
	<!--<div class="col-md-5 nopad form-group">
	<label for="exampleInputEmail1">Billing Cycle <span class="required">*</span></label>
   <input type="text" class="form-control" name="ve_billing_cycle"  placeholder="" style="border-right: none;border-top-right-radius: 0px!important;
    border-bottom-right-radius: 0px;" required>
	</div>-->
	<div class="col-md-12 form-group nopad">
	<label for="exampleInputEmail1">Billing Cycle </label>
	<select name="ve_billing_cycle" class="form-control style_background" style="">
  <option >Select</option>
  <option value="15">15 Days</option>
  <option value="30">30 Days</option>
</select>
	</div>
  </div>
     
    <div class=" form-group col-md-1 nopad_5 ">
   
    <label for="exampleInputEmail1">Mobilization <span class="required">*</span></label>
  <select class="form-control form_select_fil_2" name="mobilization" required="">
 <option >Select</option>
 <option value="one">One Side</option>
  <option value="Two">Two Side</option>
 

</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  
  </div>
   <div class=" col-md-2">
   
	  <label for="exampleInputEmail1">Mobilization Price <span class="required">*</span></label>
	<label for="exampleInputEmail1"></label>
   <input type="text" class="form-control" name="mobilization_price"  placeholder="" style="" required>
	
	
  </div>
  <div class="form-group col-md-2">
   <label for="exampleInputEmail1">Upload Rental Agreement Doc <span class="required">*</span></label>
	 <input type="file" name="upload" id="actual-btn">
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
<div class="col-md-1 vachile_document_align float-left" ><p style="display:none;">Vehicle Document </p>
</div>
<div class="col-md-6 document_type_border nopad">
<div class="col-md-12  vachile_background_color">
<div class="col-md-3"><span>Document Type</span></div>
<div class="col-md-3"><span>Upload</span></div> 
<div class="col-md-3">ID No</div>
<div class="col-md-3"> End Date</div></div>

<div class="col-md-12 margin_to_20">



<div class="col-md-6">

<div class="col-md-6">Vechile Rc <span class="required">*</span></div><div class="col-md-2">

<label class="upload-btn">
  <input type="file" id="input-file" name="d_vechile_rc" onchange="changeText()" required />
  <span  ><img  class="img_icon"  data-toggle="tooltip" data-placement="top" title="Upload Vechile Rc Doc"  src="https://www.materialwala.com/buildsand/site_assets/newapp/veh-rc.png"> Upload</span> 
</label>



</div> <div class="col-md-4" id="selectedFileName"></div>

</div>
<div class="col-md-3"> <input type="text" name="rc_no" class=" form-control"  placeholder="Rc No." required /> </div>
<div class="col-md-3">   <input autocomplete="off"type="text" name="rc_end_date" class=" datepicker rc_second" size="10" placeholder="To"  required />  </div>

</div>



<div class="col-md-12 margin_to_20" style="background-color:f7f6ff;">
<div class="col-md-6"><div class="col-md-6">Insurance <span class="required">*</span></div><div class="col-md-2">
<label class="upload-btn">
  <input type="file" id="input-file-insurance" name="d_insurance" onchange="changeTextInsurance()" required />
  <span ><img class="img_icon"  data-toggle="tooltip" data-placement="top" title="Upload Insurance Doc" src="https://www.materialwala.com/buildsand/site_assets/newapp/insurance.png"> Upload</span>
</label>

</div><div class="col-md-4" id="selectedFileNameInsurance"></div></div> 
<div class="col-md-3"> <input type="text" name="ins_no" class=" form-control" placeholder="Insurance No."/> </div>
<div class="col-md-3">   <input autocomplete="off"type="text" name="ins_end_date" class=" datepicker ins_second" size="10" placeholder="To" required />  </div>
</div>
<div class="col-md-12 margin_to_20">
<div class="col-md-6"><div class="col-md-6">Road Tax <span class="required">*</span></div><div class="col-md-2">
<label class="upload-btn">
  <input type="file" id="input-file-road-tax" name="d_road_tax" onchange="changeTextRoadTax()" required />
  <span ><img class="img_icon"  data-toggle="tooltip" data-placement="top" title="Upload Road Tax Doc" src="https://www.materialwala.com/buildsand/site_assets/newapp/tax.png"> Upload</span>
</label>



 </div><div class="col-md-4" id="selectedFileNameRoadTax"></div></div> 
<div class="col-md-3"> <input type="text" name="tax_no" class=" form-control" placeholder="Tax No."/> </div>
<div class="col-md-3">   <input autocomplete="off"type="text" name="tax_start_date" class=" datepicker tax_second" size="10" placeholder="To" required />  </div>
</div>
 
<div class="col-md-12 margin_to_20" style="background-color:f7f6ff;">
<div class="col-md-6"><div class="col-md-6">Road Permit <span class="required">*</span></div><div class="col-md-2">

<label class="upload-btn">
  <input type="file" id="input-file-road-permit" name="d_road_permit" onchange="changeTextRoadPermit()" required />
  <span ><img class="img_icon"  data-toggle="tooltip" data-placement="top" title="Upload Road Permit Doc" src="https://www.materialwala.com/buildsand/site_assets/newapp/Road_perrmet.png">Upload </span>
</label>



 </div><div class="col-md-3" id="selectedFileNameRoadPermit"></div></div>

<div class="col-md-3"> <input type="text" name="permit_no" class=" form-control"  placeholder="Permit No."/> </div>
<div class="col-md-3">   <input autocomplete="off"type="text" name="permit_end_date" class=" datepicker permit_second" size="10" placeholder="To" required />  </div>
</div>
 
<div class="col-md-12 margin_to_20">
<div class="col-md-6"><div class="col-md-6">Fitness / Break <span class="required">*</span></div><div class="col-md-2">
<label class="upload-btn">
  <input type="file" id="input-file-fitness" name="d_fitness" onchange="changeTextFitness()" required />
  <span ><img class="img_icon" data-toggle="tooltip" data-placement="top" title="Upload Fitness / Break Doc" src="https://www.materialwala.com/buildsand/site_assets/newapp/fintenss_break.png"> Upload</span>
</label>
 

</div><div class="col-md-4" id="selectedFileNameFitness"></div></div>


<div class="col-md-3"> <input type="text" name="fitness_no" class=" form-control" size="10" placeholder="Fitness No." required /> </div>
<div class="col-md-3">   <input autocomplete="off"type="text" name="fitness_end_date" class=" datepicker fitness_second" size="10" placeholder="To" required />  </div>
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
 
 
 $('#vendorclients').on('change',function(e)
 {
    
    var e_project_code = $(this).val();
	
   console.log(e_project_code);
    jQuery.ajax({
	    type: 'POST',
        url:'/vendorequipment/personofcontact',

        data: {
			"_token": "{{ csrf_token() }}",
            id: e_project_code,
			
        },
        success: function( data ){
			var newdata = data.msg;
			var projectdata = data.project;
			
			window.localStorage.setItem('msg', JSON.stringify(newdata));
			window.localStorage.setItem('project', JSON.stringify(projectdata));
		 console.log(newdata);
		 var html = '<option >Select</option>';
		
            $.each( newdata, function( key, value ) { 
				 html+='<option value='+value.clientcontacts_id+'>'+value.contacts_name+'-'+value.contacts_mobile+'</option>'; 
			 });
			
			$("#personofcontact").html(html); 
			
			var html1 = '<option >Select</option>';
		
            $.each( projectdata, function( key, value ) { 
				 html1+='<option value='+value.project_id+'>'+value.project_name+'</option>'; 
			 });
		
			$("#projectname").html(html1);
			 $("#client_designation").val("");
  $("#client_phone").val("");
  $("#contacts_secondarymobile").val("");
  $("#contacts_email").val("");
			/* 
			 $("#project_name").val(newdata[0].project_name);
			
			 $("#project_state").val(newdata[0].state);
			 $("#project_city").val(newdata[0].city);
			 $("#project_address").val(newdata[0].address); 
			 $("#field_supervisor").val(""); 
			 
			 	  */
        },
       
    }); 
 });
 $('#personofcontact').on('change',function(e)
 {
    var personofcontact = $(this).val();
	 //console.log(e_project_code);
    jQuery.ajax({
	    type: 'POST',
        url:'/vendorequipment/getclientcontacts',

        data: {
			"_token": "{{ csrf_token() }}",
            id: personofcontact,
			
        },
        success: function( data ){
			var selectedData = data.msg[0];
			/* 
			selectedData.forEach((element, index)=>{
				console.log(element);
			}) */
			console.log(selectedData.contacts_designation);
			 $("#client_designation").val(selectedData.contacts_designation);
  $("#client_phone").val(selectedData.contacts_mobile);
  $("#contacts_secondarymobile").val(selectedData.contacts_secondarymobile);
  $("#contacts_email").val(selectedData.contacts_email);
			},
       
    }); 
/* console.log(personofcontact);
		var msg = JSON.parse(window.localStorage.getItem('msg'));
		//console.log(msg);
		var count = msg.length;
		//console.log(count);
		if(count===1){
var selectedid = personofcontact;
   var selectedData  = msg;
  $("#client_designation").val(selectedData.contacts_designation);
  $("#client_phone").val(selectedData.contacts_mobile);
  $("#contacts_secondarymobile").val(selectedData.contacts_secondarymobile);
  $("#contacts_email").val(selectedData.contacts_email);
		}else{
			var selectedid = personofcontact-1;
   var selectedData  = msg[selectedid];
  $("#client_designation").val(selectedData.contacts_designation);
  $("#client_phone").val(selectedData.contacts_mobile);
  $("#contacts_secondarymobile").val(selectedData.contacts_secondarymobile);
  $("#contacts_email").val(selectedData.contacts_email);
		} */
		
 });

 $('#projectname').on('change',function(e)
 {
    var projectid = $(this).val();
	  jQuery.ajax({
	    type: 'POST',
        url:'/vendorequipment/getprojectdetailsdata',

        data: {
			"_token": "{{ csrf_token() }}",
            id: projectid,
			
        },
        success: function( data ){
			var selectedData = data.msg[0];
			/* 
			selectedData.forEach((element, index)=>{
				console.log(element);
			}) */
			console.log(selectedData.statename);
	  $("#project_name").val(selectedData.project_name);
	  $("#project_city").val(selectedData.project_city);
  $("#project_state").val(selectedData.statename); 
  $("#project_address").val(selectedData.project_address); 
			},
       
    }); 

		/* var project = JSON.parse(window.localStorage.getItem('project'));
		var selectedid1 = projectid-1;
   var selectedData1  = project[selectedid1]; */

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
 function dateDiff(startingDate, endingDate) {
    var startDate = new Date(new Date(startingDate).toISOString().substr(0, 10));
    if (!endingDate) {
        endingDate = new Date().toISOString().substr(0, 10);    // need date in YYYY-MM-DD format
    }
    var endDate = new Date(endingDate);
    if (startDate > endDate) {
        var swap = startDate;
        startDate = endDate;
        endDate = swap;
    }
    var startYear = startDate.getFullYear();
    var february = (startYear % 4 === 0 && startYear % 100 !== 0) || startYear % 400 === 0 ? 29 : 28;
    var daysInMonth = [31, february, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    var yearDiff = endDate.getFullYear() - startYear;
    var monthDiff = endDate.getMonth() - startDate.getMonth();
    if (monthDiff < 0) {
        yearDiff--;
        monthDiff += 12;
    }
    var dayDiff = endDate.getDate() - startDate.getDate();
    if (dayDiff < 0) {
        if (monthDiff > 0) {
            monthDiff--;
        } else {
            yearDiff--;
            monthDiff = 11;
        }
        dayDiff += daysInMonth[startDate.getMonth()];
    }
		if(yearDiff > 0 && monthDiff > 0 && dayDiff > 0){

      return yearDiff + 'Y-' + monthDiff + 'M-' + dayDiff + 'D';
		}else if(monthDiff > 0 && dayDiff > 0 ){
			return  monthDiff + ' M  - ' + dayDiff + ' D';
		}else if(monthDiff > 0 ){
			return  monthDiff + ' M ' ;
		}else if(yearDiff > 0 ){
			return  yearDiff + ' Y ' ;
		}else if( dayDiff > 0){
			return  dayDiff + '  D';
		}
		
}
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
//alert(Difference_In_Days);
if(Difference_In_Days==30 || Difference_In_Days==31 || Difference_In_Days==60 || Difference_In_Days==62|| Difference_In_Days==60 || Difference_In_Days==62){
	 $('#defaltselect option[value="months"]').attr("selected", "selected");
}
var diff = dateDiff(e_rental_start_date, e_rental_end_date);


  $("#noofdays").val(diff);
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
$('#product_type').change(function() {
	 if($(this).val() == "avaliable")
	{ 
//var APP_URL = {!! url('/vendorequipment/rentcreate') !!};

	 	window.location.href="{{url('vendorequipment/create/')}}";
	}
});

$('#loan_statuscheck').change(function(){
	 if($(this).val() == 1)
	{ 
	//alert(1);
 
    $("#loan_div").show();
	}else{
		//alert(0);
		 $("#loan_div").hide();
	}
})
$('#gst').change(function(){
	//alert($(this).val());
	 if($(this).val() === "excluding")
	{ 
	//alert(1);
 
    $("#percentageshow").show();
	}else{
	//	alert(0);
		 $("#percentageshow").hide();
	}
})
</script>

@endsection
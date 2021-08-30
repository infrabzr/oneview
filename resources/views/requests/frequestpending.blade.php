@extends('layouts.fieldsupervisor')
@section('content')
<style>
.col-md-2 img{
	cursor:pointer;
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
	border-radius:10px;
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
</style>

<div class="col-md-12  ratio_addequipment nopad">
<h4 class="add_equipment nomargin">EQUIPMENT REQUEST</h4>
 <form method="POST" action="{{ url('requests/addjuniorrequest')  }}">
 @csrf
<div class="col-md-12  margin_to_20 margin_bottom_20 ">
<input type="hidden" value="{{$request->r_id}}" name="r_id" id="r_id"/>
<div class="col-md-6 ">
<div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Type</label>
	 
		<select  disabled="true" id="type" class="form-control form_select_fil_1 @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" >
			<option value="">Select</option>
			<option value="Vehicle" {{$request->type == 'Vehicle'  ? 'selected' : ''}} >Vehicle</option>
			<option  value="Equipment" {{$request->type == 'Equipment'  ? 'selected' : ''}} >Equipment</option>
		</select> 
  </div>
<div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Product Type</label>
	 
		<select  disabled="true" id="r_product_type" class="form-control  @error('r_product_type') is-invalid @enderror" name="r_product_type"   >
			<option value="">Select</option>
			<option value="own" {{$request->r_product_type == 'own'  ? 'selected' : ''}} >Own</option>
			<option  value="rent" {{$request->r_product_type == 'rent'  ? 'selected' : ''}} >Rent</option>
		</select> 
  </div>
  <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Equipment Type</label>
		<select  disabled="true" id="r_equipment_type" class="form-control  @error('r_equipment_type') is-invalid @enderror" name="r_equipment_type"  >
			  <option value="">Select</option>
			  <option  value="excavator" {{$request->r_equipment_type == 'excavator'  ? 'selected' : ''}}>Excavator</option>
			  <option value="tipper" {{$request->r_equipment_type == 'tipper'  ? 'selected' : ''}}>Tipper</option>
			  <option  value="crane" {{$request->r_equipment_type == 'crane'  ? 'selected' : ''}}>Crane</option>
			  <option  value="dumper" {{$request->r_equipment_type == 'dumper'  ? 'selected' : ''}}>Dumper</option>
		</select>
		 
  </div>
  <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Select Brand</label>
   <select  disabled="true" id="r_brand" class="form-control  @error('r_brand') is-invalid @enderror" name="r_brand"   >
	 <option value="">Select</option>
	   <option value="lt" {{$request->r_brand == 'lt'  ? 'selected' : ''}} >LT</option>
	  <option value="apollo"  {{$request->r_brand == 'apollo'  ? 'selected' : ''}} >Apollo</option>
	  <option value="cat"  {{$request->r_brand == 'cat'  ? 'selected' : ''}} >Cat</option>
	  <option value="case"  {{$request->r_brand == 'case'  ? 'selected' : ''}} >Case</option>
	</select>
	
  </div>
  <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Select Year</label>
    <select  disabled="true" class="form-control " name="r_year">
	  <option value="">Select</option>
  <option value="2021"  {{$request->r_year == '2021'  ? 'selected' : ''}}>2021</option>
  <option value="2020"  {{$request->r_year == '2020'  ? 'selected' : ''}}>2020</option>
  <option value="2019"  {{$request->r_year == '2019'  ? 'selected' : ''}}>2019</option>
  <option value="2018"  {{$request->r_year == '2018'  ? 'selected' : ''}}>2018</option>
  <option value="2017"  {{$request->r_year == '2017'  ? 'selected' : ''}}>2017</option>
  <option value="2016"  {{$request->r_year == '2016'  ? 'selected' : ''}}>2016</option>
  <option value="2015"  {{$request->r_year == '2015'  ? 'selected' : ''}}>2015</option>
  <option value="2014"  {{$request->r_year == '2014'  ? 'selected' : ''}}>2014</option>
  <option value="2013"  {{$request->r_year == '2013'  ? 'selected' : ''}}>2013</option>
  <option value="2012"  {{$request->r_year == '2012'  ? 'selected' : ''}}>2012</option>
  <option value="2011"  {{$request->r_year == '2011'  ? 'selected' : ''}}>2011</option>
  <option value="2010"  {{$request->r_year == '2010'  ? 'selected' : ''}}>2010</option>
  <option value="2009"  {{$request->r_year == '2009'  ? 'selected' : ''}}>2009</option>
  <option value="2008"  {{$request->r_year == '2008'  ? 'selected' : ''}}>2008</option>
  <option value="2007"  {{$request->r_year == '2007'  ? 'selected' : ''}}>2007</option>
  <option value="2006"  {{$request->r_year == '2006'  ? 'selected' : ''}}>2006</option>
</select>
 
  </div>
   <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">UOM</label>
    <select  disabled="true" class="form-control form_select_fil_2" name="r_uom" required>
  <option value="Km" {{$request->r_uom == 'Km'  ? 'selected' : ''}}>Km</option>
  <option value="hour" {{$request->r_uom == 'hour'  ? 'selected' : ''}}>Hour</option>
  <option value="trips" {{$request->r_uom == 'trips'  ? 'selected' : ''}}>Trips</option>
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  
  
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">No. of WOH</label>
    <select disabled="true" class="form-control form_select_fil_2" name="r_wom" required>
  <option value="">Select</option>
  <option value="240" {{$request->r_wom == '240'  ? 'selected' : ''}}>240</option>
  <option value="250" {{$request->r_wom == '250'  ? 'selected' : ''}}>250</option>
  <option value="480" {{$request->r_wom == '480'  ? 'selected' : ''}}>480</option>
  <option value="500" {{$request->r_wom == '500'  ? 'selected' : ''}}>500</option>
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>  
 
  </div>
  <div class="col-md-6 ">
   <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Model No</label>
	<input disabled="true" autocomplete="off"id="r_model" type="text" class="form-control @error('r_model') is-invalid @enderror" name="r_model" value="{{ $request->r_model }}"   >
 
  </div><div class="form-group col-md-3 nopad_5">
   <div class="col-md-6 nopad"> 
	<label for="exampleInputEmail1">Capacity</label>
    <input disabled="true" type="text" class="form-control"  placeholder="" name="e_capacity"style="border-right: none;border-top-right-radius: 0px!important;
    border-bottom-right-radius: 0px;" required  value="{{ $request->r_capacity }}">  
   
  </div><div class="col-md-6 nopad"> <label for="exampleInputEmail1">&nbsp;</label>
  <select disabled="true" class="form-control form_select_fil_2 style_background" name="e_model" style="border-left: none;border-top-left-radius: 0px!important;
    border-bottom-left-radius: 0px;
    padding: 0px;" required>
  <option value="cum" {{$request->e_model == 'cum'  ? 'selected' : ''}}>cum</option>
  <option value="Ton" {{$request->e_model == 'Ton'  ? 'selected' : ''}}>Ton</option>
  <option value="cum_HR" {{$request->e_model == 'cum_HR'  ? 'selected' : ''}}>cum/HR</option>
</select>
  </div>
  </div>
  
  <div class="form-group col-md-2 nopad_5 nopad">
    <label for="exampleInputEmail1">Type of Work</label>
   <select disabled="true"  class="form-control form_select_fil_2" name="e_type_of_work" required>
  <option value="soil" {{$request->e_type_of_work == 'soil'  ? 'selected' : ''}}>Soil</option>
  <option value="rock" {{$request->e_type_of_work == 'rock'  ? 'selected' : ''}}>Rock</option>
 

</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  </div>
</div> 



<div class="col-md-12">
<h4 class="mt-5">Vendor Details</h4></div>
<div class="col-md-12  margin_to_20 margin_bottom_20 border_solid_1px">

<div class="col-md-8">

<div class="form-group col-md-2">
    <label for="exampleInputEmail1">Vendor Code</label>
 
     	 <select disabled="true" class="form-control " id="r_vendor_id" name="r_vendor_id">
  <option value="">Select</option>
    @foreach($vendors as $key => $val)
 <option  {{$request->r_vendor_id == $vendors[$key]->vendor_id  ? 'selected' : ''}} value="{{ $vendors[$key]->vendor_id }}">{{ $vendors[$key]->vendor_id }}</option>
   @endforeach
</select>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Vendor Name</label>
   <input disabled="true" autocomplete="off" id="vendor_name" disabled type="text" class="form-control  @error('vendor_name') is-invalid @enderror" name="vendor_name" value="{{ $request->vendor_name }}"   >
 
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Phone No</label>
  <input disabled="true" utocomplete="off"id="vendor_phone" type="text" disabled class=" form-control @error('vendor_phone') is-invalid @enderror" name="vendor_phone" value="{{ $request->vendor_phone }}"   >
 
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Email ID</label>
    <input disabled="true" autocomplete="off"id="vendor_email" type="text" disabled class=" form-control @error('vendor_email') is-invalid @enderror" name="vendor_email" value="{{ $request->vendor_email }}"   >
 
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">State</label>
     <input disabled="true" autocomplete="off"id="state" type="text" disabled class=" form-control @error('state') is-invalid @enderror" name="state" value="{{ $request->state }}"   >
 
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">City</label>
      <input disabled="true" autocomplete="off"id="city" type="text" disabled class=" form-control @error('city') is-invalid @enderror" name="city" value="{{ $request->city }}"   >
 
  </div>
  </div>
   <div class="col-md-4">
  <div class="form-group col-md-12">
    <label for="exampleInputEmail1">Complete Address</label>
   <textarea disabled="true" id="address" type="text" disabled class="form_select_fil_1 form-control @error('address') is-invalid @enderror" name="address"    >{{ $request->address }}</textarea>
  </div>
  </div>

   
  
    
  
</div> 
<div class="col-md-12"><h4 class="mt-5">Contract Details</h4></div>
<div class="col-md-12  margin_to_20 margin_bottom_20 border_solid_1px">






<div class="col-md-3"> 
	<label for="exampleInputEmail1" style="    margin-left: 15px;">Rental Start Date</label>
  <div class="form-group col-md-12"> 
		 <input disabled="true" autocomplete="off"type="text" value="{{ $request->rental_start_date }}" name="rental_start_date" class=" datepicker first" size="10" placeholder="From"/>
		  <input disabled="true" autocomplete="off"type="text" value="{{ $request->rental_end_date }}" name="rental_end_date" class=" datepicker second" size="10" placeholder="To" />  
  </div>
  </div>

 
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
</script>
	<div class="form-group col-md-1" style="    width: 14%;">
    <label for="exampleInputEmail1">No Of Days</label>
  <div class="input-group my-group">

            <input disabled="true" autocomplete="off"type="text" disabled value="{{ $request->noofdays }}" class="form-control inputbox" id="noofdays" name="noofdays" >
			<select   disabled="true" class="selectpicker form-control" data-live-search="true" title="Please select a lunch ...">
                           <option value="Days"  {{$request->noofdays_type == 'Days'  ? 'selected' : ''}}>Days</option>
						  <option  value="Months" {{$request->noofdays_type == 'Months'  ? 'selected' : ''}}>Months</option>
						  <option value="Years" {{$request->noofdays_type == 'Years'  ? 'selected' : ''}}>Years</option>
                        
                    </select> 
        </div>
  </div>
 
  <div class="form-group col-md-1" style="    width: 14%;">
    <label for="exampleInputEmail1">Rental Cost</label>
   <div class="input-group my-group"> 

            <input disabled="true" autocomplete="off"type="text"   value="{{ $request->rental_cost }}"  class="form-control inputbox" name="rental_cost"  >
			<select disabled="true" class="selectpicker form-control" data-live-search="true" title="Please select a lunch ...">
                        <option value="K" {{$request->rental_cost_type == 'Ks'  ? 'selected' : ''}}>K</option>
						  <option  value="L" {{$request->rental_cost_type == 'L'  ? 'selected' : ''}}>L</option>
						  <option value="C" {{$request->rental_cost_type == 'C'  ? 'selected' : ''}}>C</option>
                        
                    </select> 
        </div>
  </div>
     <div class="form-group col-md-1" style="    width: 14%;">
    <label for="exampleInputEmail1">Billing Cycle</label>
  <div class="input-group my-group"> 

            <input disabled="true" autocomplete="off" type="text" value="{{ $request->billing_cycle }}" class="form-control inputbox" name="billing_cycle" ><select  disabled="true" class="selectpicker form-control" data-live-search="true" title="Please select a lunch ...">
                       <option value="Days" {{$request->billing_cycle_type == 'Days'  ? 'selected' : ''}}>Days</option>
						  <option  value="Months" {{$request->billing_cycle_type == 'Months'  ? 'selected' : ''}}>Months</option>
						  <option value="Years" {{$request->billing_cycle_type == 'Years'  ? 'selected' : ''}}>Years</option>
                        
                    </select> 
        </div>
  </div> 
    
   <div class="form-group col-md-2"  style="    width: 14%;"> 
   <!--<a target="_blank" href="{{url('/images')}}/{{ $request->upload_rental_contract }}"><button  type="button" style="    margin-top: 25px;">View Rental Contract</button></a>-->
   </div>
 <div class="col-md-2" style="    margin-top: 25px;" > 
 <?php if($request->rental_status == 0){ ?>
<!--<img onclick="approve('rental');" style="    margin-right: 5px;" src="https://www.materialwala.com/buildsand/site_assets/newapp/right_tick.png">
<img onclick="reject('rental');" src="https://www.materialwala.com/buildsand/site_assets/newapp/wrong.png">-->
<?php }else if($request->rental_status == 1){ ?>
<span class="green">Approved</span>
<?php  }else if($request->rental_status == 2){ ?>
<span class="red">Rejected</span>
<?php } ?>
</div>
</div>


<div class="col-md-12"><h4 class="mt-5">Project Details</h4></div>
<div class="col-md-12  margin_to_20 margin_bottom_20 border_solid_1px">

<div class="col-md-8">

 
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Select Project</label>
    	 <select disabled="true" class="form-control form_select_fil_2" id="r_project" name="r_project">
  <option >Select</option>
    @foreach($projects as $key => $val)
 <option  {{$request->r_project == $projects[$key]->project_id  ? 'selected' : ''}} value="{{ $projects[$key]->project_id }}">{{ $projects[$key]->project_code }}</option>
   @endforeach
</select>
  </div> 
    <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Project Name</label>
  <input disabled="true" type="text" id="project_name" class=" form_select_fil_1 form-control" value="{{ $request->project_name }}"   >
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">State</label>
     <input disabled="true" autocomplete="off"id="project_state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ $request->state }}"   >
  </div>
  <div class="form-group col-md-3">
    <label for="exampleInputEmail1">City</label>
   <input disabled="true" autocomplete="off"id="project_city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $request->city }}"   >
  </div>
  <div class="form-group col-md-3">
    <label for="exampleInputEmail1">Field Supervisor</label>
    <input disabled="true" autocomplete="off"id="field_supervisor" type="text" class="form-control @error('field_supervisor') is-invalid @enderror" name="field_supervisor" value="{{ $request->field_supervisor }}"   >
  </div>
  </div>
   <div class="col-md-4">
  <div class="form-group col-md-12">
    <label for="exampleInputEmail1">Complete Address</label>
   <textarea disabled="true" id="project_address" type="text" class="form_select_fil_1 form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"    >{{ $request->address }}</textarea>
     
  </div>
  </div>

   
  
    
  
</div>


<div class="col-md-12" style="margin-bottom: 0%;z-index: 10000;position: absolute;margin-top: 100vh;margin-left: 50%;font-size: 16px;font-weight: 600;color:red">Pending at vendor</div>
<div class="col-md-12  margin_to_20 margin_bottom_20" style="background: #00000026;opacity: 0.2;">
<div class="col-md-5">




<div class="col-md-3">

<div class='col-md-12' style="margin-bottom:15px;"><img class='thumbnail_image img-responsive' src="{{url('/images')}}/noimage2.jpeg"></div> 


</div>


<div class="col-md-9"><img class="main_image thumbnail_image img-responsive" src="{{url('/images')}}/noimage1.jpeg"></div> 
</div>
<div class="col-md-1 vachile_document_align float-left" ><p style="display:none;">Vehicle Document</p>
</div>
<div class="col-md-6 document_type_border nopad">
<div class="col-md-12  vachile_background_color">
<div class="col-md-6"><span>Document Type</span></div>
<div class="col-md-2">Start Date</div>
<div class="col-md-3"> End Date</div></div>

<div class="col-md-12 margin_to_20">
<div class="col-md-6">
<div class="col-md-6">Vehicle Rc </div>
<div class="col-md-2"><a target="_blank" href="{{url('/images')}}/{{ $request->d_vechile_rc }}"><img data-toggle="tooltip" data-placement="top" title="View Vehicle Rc" src="https://www.materialwala.com/buildsand/site_assets/newapp/veh-rc.png"></a></div>
 <div class="col-md-4">Validity</div></div>
<div class="col-md-2"> {{ $request->rc_start_date }}</div>
<div class="col-md-2"> {{ $request->rc_end_date }}</div>
<div class="col-md-2"> 
<?php if($request->rc_status == 0){ ?>
<!--<img onclick="approve('rc');" style="margin-right: 5px;" src="https://www.materialwala.com/buildsand/site_assets/newapp/right_tick.png">
<img onclick="reject('rc');" src="https://www.materialwala.com/buildsand/site_assets/newapp/wrong.png">-->
<?php }else if($request->rc_status == 1){ ?>
<!--<span class="green">Approved</span>-->
<?php  }else if($request->rc_status == 2){ ?>
<!--<span class="red">Rejected</span>-->
<?php } ?>
</div>
</div>
<div class="col-md-12 margin_to_20" style="background-color:f7f6ff;">
<div class="col-md-6"><div class="col-md-6">Insurance </div>
<div class="col-md-2"><a target="_blank" href="{{url('/images')}}/{{ $request->d_insurance }}"><img  data-toggle="tooltip" data-placement="top" title="View Insurance" src="https://www.materialwala.com/buildsand/site_assets/newapp/insurance.png"></a></div>
<div class="col-md-4">Validity</div></div>
<div class="col-md-2"> {{ $request->ins_start_date }}</div>
<div class="col-md-2"> {{ $request->ins_end_date }}</div>
<div class="col-md-2"> 
<?php if($request->insurance_status == 0){ ?>
<!--<img onclick="approve('insurance');" style="margin-right: 5px;" src="https://www.materialwala.com/buildsand/site_assets/newapp/right_tick.png">
<img onclick="reject('insurance');" src="https://www.materialwala.com/buildsand/site_assets/newapp/wrong.png">-->
<?php }else if($request->insurance_status == 1){ ?>
<!--<span class="green">Approved</span>-->
<?php  }else if($request->insurance_status == 2){ ?>
<!--<span class="red">Rejected</span>-->
<?php } ?>
</div>
</div>
<div class="col-md-12 margin_to_20">
<div class="col-md-6"><div class="col-md-6">Road Tax </div>
<div class="col-md-2"><a target="_blank" href="{{url('/images')}}/{{ $request->d_road_tax }}"><img src="https://www.materialwala.com/buildsand/site_assets/newapp/tax.png"  data-toggle="tooltip" data-placement="top" title="View Road Tax"></a></div>
<div class="col-md-4">Validity</div></div>
<div class="col-md-2"> {{ $request->tax_start_date }}</div>
<div class="col-md-2"> {{ $request->tax_end_date }}</div>
<div class="col-md-2"> 
<?php if($request->tax_status == 0){ ?>
<!--<img onclick="approve('tax');" style="margin-right: 5px;" src="https://www.materialwala.com/buildsand/site_assets/newapp/right_tick.png">
<img onclick="reject('tax');" src="https://www.materialwala.com/buildsand/site_assets/newapp/wrong.png">-->
<?php }else if($request->tax_status == 1){ ?>
<!--<span class="green">Approved</span>-->
<?php  }else if($request->tax_status == 2){ ?>
<!--<span class="red">Rejected</span>-->
<?php } ?>
</div>
</div>
<div class="col-md-12 margin_to_20" style="background-color:f7f6ff;">
<div class="col-md-6"><div class="col-md-6">Road Permit </div>
<div class="col-md-2"><a target="_blank" href="{{url('/images')}}/{{ $request->d_road_permit }}"><img  data-toggle="tooltip" data-placement="top" title="View Road Permit" src="https://www.materialwala.com/buildsand/site_assets/newapp/Road_perrmet.png"></a></div>
<div class="col-md-3">Validity</div></div>
<div class="col-md-2"> {{ $request->permit_start_date }}</div>
<div class="col-md-2"> {{ $request->permit_end_date }}</div>
<div class="col-md-2"> 
<?php if($request->permit_status == 0){ ?>
<!--<img onclick="approve('permit');" style="margin-right: 5px;" src="https://www.materialwala.com/buildsand/site_assets/newapp/right_tick.png">
<img onclick="reject('permit');" src="https://www.materialwala.com/buildsand/site_assets/newapp/wrong.png">-->
<?php }else if($request->permit_status == 1){ ?>
<!--<span class="green">Approved</span>-->
<?php  }else if($request->permit_status == 2){ ?>
<!--<span class="red">Rejected</span>-->
<?php } ?>
</div>
</div>
<div class="col-md-12 margin_to_20">
<div class="col-md-6"><div class="col-md-6">Fitness / Break </div>
<div class="col-md-2"><a target="_blank" href="{{url('/images')}}/{{ $request->d_fitness }}"><img  data-toggle="tooltip" data-placement="top" title="View Fitness / Break" src="https://www.materialwala.com/buildsand/site_assets/newapp/fintenss_break.png"></a></div>
<div class="col-md-4">Validity</div></div>
<div class="col-md-2"> {{ $request->fitness_start_date }}</div>
<div class="col-md-2"> {{ $request->fitness_end_date }}</div>
<div class="col-md-2"> 
<?php if($request->fitness_status == 0){ ?>
<!--<img  onclick="approve('fitness');" style="margin-right: 5px;" src="https://www.materialwala.com/buildsand/site_assets/newapp/right_tick.png">
<img onclick="reject('fitness');" src="https://www.materialwala.com/buildsand/site_assets/newapp/wrong.png">-->
<?php }else if($request->fitness_status == 1){ ?>
<!--<span class="green">Approved</span>-->
<?php  }else if($request->fitness_status == 2){ ?>
<!--<span class="red">Rejected</span>-->
<?php } ?>
</div>
</div>
<p>&nbsp;</p>
</div>
<div class="col-md-12" style="text-align: center; margin-bottom:15px; margin-top:15px;display:none;"><div class="col-md-6"></div><div class="col-md-6">
<button type="button" class="btn btn-primary btn_apply" style="background: rgb(65,56,160);
background: linear-gradient(73deg, rgba(65,56,160,1) 23%, rgba(114,35,162,1) 100%);border: none;">APPROVE</button>&nbsp;&nbsp;<button type="button" class="btn btn-primary btn_apply" style="background: rgb(65,56,160);
background: linear-gradient(73deg, rgba(65,56,160,1) 23%, rgba(114,35,162,1) 100%);border: none;">Save And Close</button></div>
</div>
</div>

</form>
</div>


<script>
function approve(doc){
	var document = doc; 
	var r_id = $('#r_id').val(); 
   
   jQuery.ajax({
	    type: 'POST',
        url:'/home/changedocumentstatus',

        data: {
			"_token": "{{ csrf_token() }}",
            document: document,
            r_id: r_id,
			status:1
			
        },
        success: function( data ){ 
			location.reload();
		 
        },
       
    });
}
function reject(doc){
	
	if(confirm("Are you sure you want to reject this?")){
       
		var document = doc; 
	var r_id = $('#r_id').val(); 
   
   jQuery.ajax({
	    type: 'POST',
        url:'/home/changedocumentstatus',

        data: {
			"_token": "{{ csrf_token() }}",
            document: document,
            r_id: r_id,
			status:2
			
        },
        success: function( data ){ 
			location.reload();
		 
        },
       
    });
    }
    else{
        return false;
    }
	
	
}

</script>
<style>
.form-control{
	background: #e3e1e1;
    color: #6f6868;
}
</style>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
$('input, select').each(function(){
  checkEmpty($(this));
});

function checkEmpty(elem){
  if(elem.val() !== ''){
    elem.addClass('empty');
  } else {
    elem.removeClass('empty');
  }
}

</script>




@endsection
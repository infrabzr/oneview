@extends('layouts.fieldsupervisor')
@section('content')
<body>
<style>
label {
    font-size: 13px;
	color:#7a7676;
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
	    font-weight: bold;
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
</style>

<div class="col-md-12  ratio_addequipment nopad">
<h4 class="add_equipment nomargin">REQUEST FOR EQUIPMENT APPROVAL</h4>
<form method="POST" action="{{ url('requests/addseniorrequest')  }}">
                        @csrf
<div class="col-md-12  margin_to_20 margin_bottom_20 "> 
<div class="col-md-6 ">
<div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Type</label>
	 
		<select id="type" class="form-control form_select_fil_1 @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" >
			<option value="">Select</option>
			<option value="Vehicle"   >Vehicle</option>
			<option  value="Equipment"  >Equipment</option>
		</select> 
  </div>
<div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Product Type</label>
	 
		<select id="r_product_type" class="form-control form_select_fil_1 @error('r_product_type') is-invalid @enderror" name="r_product_type"   >
			<option value="">Select</option>
			<option value="own"  >Own</option>
			<option  value="rent"   >Rent</option>
		</select> 
  </div>
  <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Equipment Type</label>
		<select  id="r_equipment_type" class="form-control form_select_fil_2 @error('r_equipment_type') is-invalid @enderror" name="r_equipment_type"  >
			  <option value="">Select</option>
			  <option  value="excavator"  }>Excavator</option>
			  <option value="tipper" >Tipper</option>
			  <option  value="crane" >Crane</option>
			  <option  value="dumper"  >Dumper</option>
		</select>
		 
  </div>
  <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Select Brand</label>
   <select id="r_brand" class="form-control form_select_fil_2 @error('r_brand') is-invalid @enderror" name="r_brand"   >
	 <option value="">Select</option>
	   <option>LT</option>
	  <option>Apollo</option>
	  <option>Cat</option>
	  <option>Case</option>
	</select>
	
  </div>
  <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Select Year</label>
    <select class="form-control form_select_fil_2" name="r_year">
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
 
  </div>
 
  </div>
  <div class="col-md-6 ">
   <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Model No</label>
	<input autocomplete="off"id="r_model" type="text" class="form-control @error('r_model') is-invalid @enderror" name="r_model" value=""   >
 
  </div>
  <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Capacity</label>
   <input autocomplete="off"id="r_capacity" type="text" class="form-control @error('r_capacity') is-invalid @enderror" name="r_capacity" value=""   >
 
  </div>
    <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Type of Work</label>
    <input autocomplete="off"id="r_work" type="text" class="form-control @error('r_work') is-invalid @enderror" name="r_work" value=""   >
 
  </div>
  </div>
</div> 



<div class="col-md-12">
<h4 class="mt-5">Vendor Details</h4></div>
<div class="col-md-12  margin_to_20 margin_bottom_20 border_solid_1px">

<div class="col-md-8">

<div class="form-group col-md-2">
    <label for="exampleInputEmail1">Vendor Code</label>
 
     	 <select class="form-control form_select_fil_2" id="r_vendor_id" name="r_vendor_id">
  <option >Select</option>
    @foreach($vendors as $key => $val)
 <option    value="{{ $vendors[$key]->vendor_id }}">{{ $vendors[$key]->vendor_id }}</option>
   @endforeach
</select>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Vendor Name</label>
   <input autocomplete="off" id="vendor_name" disabled type="text" class="form-control form_select_fil_1 @error('vendor_name') is-invalid @enderror" name="vendor_name" value=" "   >
 
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Phone No</label>
  <input autocomplete="off"id="vendor_phone" type="text" disabled class="form_select_fil_1 form-control @error('vendor_phone') is-invalid @enderror" name="vendor_phone" value=" "   >
 
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Email ID</label>
    <input autocomplete="off"id="vendor_email" type="text" disabled class="form_select_fil_1 form-control @error('vendor_email') is-invalid @enderror" name="vendor_email" value=" "   >
 
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">State</label>
     <input autocomplete="off"id="state" type="text" disabled class="form_select_fil_1 form-control @error('state') is-invalid @enderror" name="state" value=" "   >
 
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">City</label>
      <input autocomplete="off"id="city" type="text" disabled class="form_select_fil_1 form-control @error('city') is-invalid @enderror" name="city" value=" "   >
 
  </div>
  </div>
   <div class="col-md-4">
  <div class="form-group col-md-12">
    <label for="exampleInputEmail1">Complete Address</label>
   <textarea id="address" type="text" disabled class="form_select_fil_1 form-control @error('address') is-invalid @enderror" name="address"    > </textarea>
  </div>
  </div>

   
  
    
  
</div>
<div class="col-md-12"><h4 class="mt-5">Contract Details</h4></div>
<div class="col-md-12  margin_to_20 margin_bottom_20 border_solid_1px">






<div class="col-md-2"> 
	<label for="exampleInputEmail1" style="    margin-left: 15px;">Rental Start Date</label>
  <div class="form-group col-md-12"> 
		 <input autocomplete="off"type="text" name="rental_start_date" class=" datepicker first" size="5" placeholder="From"/>
		  <input autocomplete="off"type="text" name="rental_end_date" onchange="myFunction(this.value)" class=" datepicker second" size="5" placeholder="To" />  
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
	<div class="form-group col-md-1" style="    width: 12%;">
    <label for="exampleInputEmail1">No Of Days</label>
  <div class="input-group my-group"> 

            <input autocomplete="off"type="text" class="form-control inputbox" name="noofdays" >
			<select   class="selectpicker form-control" data-live-search="true" title="Please select a lunch ...">
                           <option>Days</option>
  <option>Months</option>
  <option>Years</option>
                        
                    </select> 
        </div>
  </div>
 
  <div class="form-group col-md-1" style="    width: 12%;">
    <label for="exampleInputEmail1">Rental Cost</label>
   <div class="input-group my-group"> 

            <input autocomplete="off"type="text" class="form-control inputbox" name="rental_cost"  >
			<select class="selectpicker form-control" data-live-search="true" title="Please select a lunch ...">
                         <option>K</option>
  <option>L</option>
  <option>C</option>
                        
                    </select> 
        </div>
  </div>
     <div class="form-group col-md-1" style="    width: 15%;">
    <label for="exampleInputEmail1">Billing Cycle</label>
  <div class="input-group my-group"> 

            <input autocomplete="off" type="text" class="form-control inputbox" name="billing_cycle" "><select   class="selectpicker form-control" data-live-search="true" title="Please select a lunch ...">
                         <option>Days</option>
  <option>Months</option>
  <option>Years</option>
                        
                    </select> 
        </div>
  </div> 
   <div class="form-group col-md-2"> 
   <button  type="button"  style="    margin-top: 25px;">Generate Rental Contract</button>
   </div>
   <div class="form-group col-md-2"> 
   <button style="    margin-top: 25px;" disabled>Download Rental Contract</button>
   </div>
   <div class="form-group col-md-1"> 
   <button  type="button"  style="    margin-top: 15px;" class="btn  btn-info">
   Submit
   </button>
   </div>
</div>


<div class="col-md-12"><h4 class="mt-5">Project Details</h4></div>
<div class="col-md-12  margin_to_20 margin_bottom_20 border_solid_1px">

<div class="col-md-8">

 
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Select Project</label>
    	 <select class="form-control form_select_fil_2" id="r_project" name="r_project">
  <option >Select</option>
    @foreach($projects as $key => $val)
 <option value="{{ $projects[$key]->project_id }}">{{ $projects[$key]->project_code }}</option>
   @endforeach
</select>
  </div> 
    <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Project Name</label>
  <input type="text" id="project_name" class=" form_select_fil_1 form-control" value=" "   >
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">State</label>
     <input autocomplete="off"id="project_state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value=" "   >
  </div>
  <div class="form-group col-md-3">
    <label for="exampleInputEmail1">City</label>
   <input autocomplete="off"id="project_city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value=" "   >
  </div>
  <div class="form-group col-md-3">
    <label for="exampleInputEmail1">Field Supervisor</label>
    <input autocomplete="off"id="field_supervisor" type="text" class="form-control @error('field_supervisor') is-invalid @enderror" name="field_supervisor" value=""   >
  </div>
  </div>
   <div class="col-md-4">
  <div class="form-group col-md-12">
    <label for="exampleInputEmail1">Complete Address</label>
   <textarea id="project_address" type="text" class="form_select_fil_1 form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"    > </textarea>
     
  </div>
  </div>

   
  
    
  
</div>
 <div class="col-md-12" style=" margin-bottom:15px; margin-top:15px;"> 
<button type="submit" class="btn btn-primary btn_apply" style="background: rgb(65,56,160);
background: linear-gradient(73deg, rgba(65,56,160,1) 23%, rgba(114,35,162,1) 100%);border: none;">SUBMIT</button></div>

</form>



</div>
  

<script>

 $('#r_project').on('change',function(e)
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
			 
		 
        },
       
    }); 
 });
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
@endsection

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
<input type="hidden" value="{{$request->r_id}}" name="r_id"/>
<div class="col-md-6 ">
<div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Type</label>
	 
		<select id="type" class="form-control  @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" >
			<option value="">Select</option>
			<option value="Vehicle" {{$request->type == 'Vehicle'  ? 'selected' : ''}} >Vehicle</option>
			<option  value="Equipment" {{$request->type == 'Equipment'  ? 'selected' : ''}} >Equipment</option>
		</select> 
  </div>
<div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Product Type</label>
	 
		<select id="r_product_type" class="form-control  @error('r_product_type') is-invalid @enderror" name="r_product_type"   >
			<option value="">Select</option>
			<option value="own" {{$request->r_product_type == 'own'  ? 'selected' : ''}} >Own</option>
			<option  value="rent" {{$request->r_product_type == 'rent'  ? 'selected' : ''}} >Rent</option>
		</select> 
  </div>
  <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Equipment Type</label>
		<select  id="r_equipment_type" class="form-control form_select_fil_2 @error('r_equipment_type') is-invalid @enderror" name="r_equipment_type"  >
			  <option value="">Select</option>
			  
			  
			  <option  value="Backhoeloader"   {{$request->r_equipment_type == 'Backhoeloader'  ? 'selected' : ''}} >Backhoe loader</option>
			  <option  value="excavator"  {{$request->r_equipment_type == 'excavator'  ? 'selected' : ''}}>Excavator</option>
			  <option value="tipper" {{$request->r_equipment_type == 'tipper'  ? 'selected' : ''}}>Tipper</option>
			  <option  value="crane" {{$request->r_equipment_type == 'crane'  ? 'selected' : ''}}>Crane</option>
			  <option  value="dumper"  {{$request->r_equipment_type == 'dumper'  ? 'selected' : ''}}>Dumper</option>
			  <option  value="grader"  {{$request->r_equipment_type == 'grader'  ? 'selected' : ''}}>Grader</option>
			  <option  value="Hydracrane"  {{$request->r_equipment_type == 'Hydracrane'  ? 'selected' : ''}}>Hydra crane</option>
			  <option  value="soilcompactor"  {{$request->r_equipment_type == 'soilcompactor'  ? 'selected' : ''}}>Soil Compactor</option>
			  <option  value="Transitmixer" {{$request->r_equipment_type == 'Transitmixer'  ? 'selected' : ''}} >Transit mixer</option>
			  <option  value="wheelloader"  {{$request->r_equipment_type == 'wheelloader'  ? 'selected' : ''}}>wheel loader</option>
			  
			  
			
		</select>
		 
  </div>
  <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Select Brand</label>
   <select id="r_brand" class="form-control form_select_fil_2 @error('r_brand') is-invalid @enderror" name="r_brand"   >
	 <option value="">Select</option>
	   @foreach($brands_equipment as $key => $val)
 <option  {{$request->r_brand == $brands_equipment[$key]->name  ? 'selected' : ''}} value="{{ $brands_equipment[$key]->brands_id }}">{{ $brands_equipment[$key]->name }}</option>
   @endforeach
	</select>
	
  </div>
  <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Select Year</label>
    <select class="form-control form_select_fil_2" name="r_year">
	<option value="">Select</option>
  <option value="2021" {{$request->r_year == '2021'  ? 'selected' : ''}}>2021</option>
  <option value="2020"  {{$request->r_year == '2020'  ? 'selected' : ''}} >2020</option>
  <option value="2019" {{$request->r_year == '2019'  ? 'selected' : ''}} >2019</option>
  <option value="2018" {{$request->r_year == '2018'  ? 'selected' : ''}} >2018</option>
  <option value="2017" {{$request->r_year == '2017'  ? 'selected' : ''}} >2017</option>
  <option value="2016" {{$request->r_year == '2016'  ? 'selected' : ''}} >2016</option>
  <option value="2015" {{$request->r_year == '2015'  ? 'selected' : ''}} >2015</option>
  <option value="2014" {{$request->r_year == '2014'  ? 'selected' : ''}} >2014</option>
  <option value="2013" {{$request->r_year == '2013'  ? 'selected' : ''}} >2013</option>
  <option value="2012" {{$request->r_year == '2012'  ? 'selected' : ''}} >2012</option>
  <option value="2011" {{$request->r_year == '2011'  ? 'selected' : ''}} >2011</option>
  <option value="2010" {{$request->r_year == '2010'  ? 'selected' : ''}} >2010</option>
  <option value="2009" {{$request->r_year == '2009'  ? 'selected' : ''}} >2009</option>
  <option value="2008" {{$request->r_year == '2008'  ? 'selected' : ''}} >2008</option>
  <option value="2007" {{$request->r_year == '2007'  ? 'selected' : ''}} >2007</option>
  <option value="2006" {{$request->r_year == '2006'  ? 'selected' : ''}} >2006</option>
</select>
 
  </div>
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">UOM</label>
    <select class="form-control form_select_fil_2" name="r_uom" required>
  <option value="Km" {{$request->r_uom == 'Km'  ? 'selected' : ''}} >Km</option>
  <option value="Hour" {{$request->r_uom == 'Hour'  ? 'selected' : ''}} >Hour</option>
  <option value="Trips" {{$request->r_uom == 'Trips'  ? 'selected' : ''}} >Trips</option>
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  
  
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">No. of WOH</label>
    <select class="form-control form_select_fil_2" name="r_wom" required>
  <option value="">Select</option>
  <option value="240"  {{$request->r_wom == '240'  ? 'selected' : ''}} >240</option>
  <option value="250" {{$request->r_wom == '250'  ? 'selected' : ''}} >250</option>
  <option value="480" {{$request->r_wom == '480'  ? 'selected' : ''}} >480</option>
  <option value="500" {{$request->r_wom == '500'  ? 'selected' : ''}} >500</option>
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>  
  </div>
  <div class="col-md-6 ">
   <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Model No</label>
	<input autocomplete="off"id="r_model" type="text" class="form-control @error('r_model') is-invalid @enderror" name="r_model" value="{{ $request->r_model }}"   >
 
  </div>
 <div class="form-group col-md-3 nopad_5">
   <div class="col-md-6 nopad"> 
	<label for="exampleInputEmail1">Capacity</label>
    <input type="text" class="form-control"  placeholder="" name="e_capacity"style="border-right: none;border-top-right-radius: 0px!important;
    border-bottom-right-radius: 0px;" required value="{{ $request->r_capacity }}" >  
   
  </div><div class="col-md-6 nopad"> <label for="exampleInputEmail1">&nbsp;</label>
  <select class="form-control form_select_fil_2 style_background" name="e_model" style="border-left: none;border-top-left-radius: 0px!important;
    border-bottom-left-radius: 0px;
    padding: 0px;" required>
  <option value="cum">cum</option>
  <option value="Ton">Ton</option>
  <option value="cum_HR">cum/HR</option>
</select>
  </div>
  </div>
  
  <div class="form-group col-md-2 nopad_5 nopad">
    <label for="exampleInputEmail1">Type of Work</label>
   <select class="form-control form_select_fil_2" name="e_type_of_work" required>
  <option value="soil">Soil</option>
  <option value="">Rock</option>
 

</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
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
 <option  {{$request->r_project == $projects[$key]->project_id  ? 'selected' : ''}} value="{{ $projects[$key]->project_id }}">{{ $projects[$key]->project_code }}</option>
   @endforeach
</select>
  </div> 
    <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Project Name</label>
  <input type="text" id="project_name" class=" form_select_fil_1 form-control" value="{{ $request->project_name }}"   >
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
   
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Site</label>
   <select class="form-control form_select_fil_2" id="project_sites">
  <option value="">Select</option>
  @foreach($project_sites as $key => $val)
 <option  {{$request->site_id == $project_sites[$key]->site_id  ? 'selected' : ''}} value="{{ $project_sites[$key]->site_id }}">{{ $project_sites[$key]->project_name }}</option>
   @endforeach
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  
  
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">State</label>
     <input autocomplete="off"id="project_state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ $request->pstate }}"   >
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">City</label>
   <input autocomplete="off"id="project_city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $request->pcity }}"   >
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Field Supervisor</label>
    <input autocomplete="off"id="field_supervisor" type="text" class="form-control @error('field_supervisor') is-invalid @enderror" name="field_supervisor" value="{{ $request->field_supervisor }}"    >
  </div>
  </div>
   <div class="col-md-4">
  <div class="form-group col-md-12">
    <label for="exampleInputEmail1">Complete Address</label>
   <textarea id="project_address" type="text" class="form_select_fil_1 form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"    >{{ $request->project_address }}</textarea>
     
  </div>
  </div>

   
  
    
  
</div>
 <div class="col-md-12" style=" margin-bottom:15px; margin-top:15px;"> 
<button type="submit" class="btn btn-primary btn_apply" style="background: rgb(65,56,160);
background: linear-gradient(73deg, rgba(65,56,160,1) 23%, rgba(114,35,162,1) 100%);border: none;">SUBMIT</button></div>

</form>



</div>
  

<script>
$('#r_vendor_id').on('change',function(e)
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
			 $("#vendor_phone").val(newdata[0].vendor_phone);
			 $("#vendor_email").val(newdata[0].vendor_email);
			 $("#state").val(newdata[0].state);
			 $("#city").val(newdata[0].city);
			 $("#address").val(newdata[0].address);
        },
       
    }); 
 });
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
</script>
<style>
.empty{
	background:yellow;
}
</style>
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

$('input, select').each(function(){
  checkEmpty($(this));
});




</script>
@endsection

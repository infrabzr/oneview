<?php // echo "<pre>";print_r($fieldsupervisor); exit; ?>@extends('layouts.app')
@section('content')
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
.inputbox{
	width:30% !important;
}.my-group .form-control{
    width:50%;
}
</style>

<div class="col-md-12  ratio_addequipment nopad">
<h4 class="add_equipment nomargin">Add Project</h4>
 <form method="POST" action="{{ url('projects/store')  }}">
                        @csrf
		@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif 
 

<div class="col-md-12  margin_to_20 "><h4 class="mt-5">Project Details</h4></div>
<div class="col-md-12  margin_to_20 margin_bottom_20 border_solid_1px">

<div class="col-md-8">

 
<div class="form-group col-md-2">
    <label for="exampleInputEmail1">Project Code</label>
  <input type="text" id="project_code" name="project_code" class="  form-control" value=" "   >
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
    <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Project Name</label>
  <input type="text" id="project_name" name="project_name"class="  form-control" value=" "   >
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
    <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Project Type</label>
  <input type="text" id="project_name" name="project_type"class="  form-control" value=" "   >
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
 
    <div class="form-group col-md-3">
    <label for="exampleInputEmail1">Project Sites</label>
	 <select class="  form-control"  id="project_sites" name="project_sites"	 >
	 <option>Select</option>
	 <option value="1">1</option>
	 <option value="2">2</option>
	 <option value="3">3</option>
	 <option value="4">4</option>
	 </select>
  </div>
 
    <div class="form-group col-md-3">
    <label for="exampleInputEmail1">Phase</label>
  <input type="text" id="project_name" name="phase"class="  form-control" value=" "   >
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  </div>
  <div class="col-md-4">
  <div class="form-group col-md-5"  >
    <label for="exampleInputEmail1">Estimated Budget</label>
  <div class="input-group my-group"> 

            <input autocomplete="off"type="text" class="form-control inputbox" name="budget" >
			<select   class="selectpicker form-control" data-live-search="true" title="Please select a lunch ...">
                         <option>M</option>
                         <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        
                    </select> 
        </div>
  </div>
  <div class="form-group col-md-7" >
   <label for="exampleInputEmail1" style="    margin-left: 15px;">Estimated End Time</label>
  <div class="form-group col-md-12"> 
		 <input autocomplete="off"type="text" name="start_time" class=" datepicker first" size="5" placeholder="Start"/>
		  <input autocomplete="off"type="text" name="end_time" class=" datepicker second" size="5" placeholder="End" />  
  </div>
  </div>
  </div>
 	
  </div>
    

   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
     <style>
 
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


<div class="col-md-12  margin_to_20 "><h4 class="mt-5">Address Details</h4></div>
<div class="col-md-12  margin_to_20 margin_bottom_20 border_solid_1px">

<div class="col-md-12">

	<div class="form-group col-md-4">
    <label for="exampleInputEmail1">Project Address</label>
   
     <input id="project_address" type="text" name="project_address" class="form-control @error('state') is-invalid @enderror"   value="{{ old('state') }}"   >
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">City</label>
   <input id="city" name="city" type="text" class="form-control @error('city') is-invalid @enderror"   value="{{ old('city') }}"   >
  </div> 
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">State</label>
     <input id="state" name="state" type="text" class="form-control @error('state') is-invalid @enderror"   value="{{ old('state') }}"   >
  </div>

  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Pin Code</label>
   <input id="pincode" type="text" name="pincode" class="form-control @error('city') is-invalid @enderror"   value="{{ old('city') }}"   >
  </div> 
  </div>
   
   
  
    
  
</div>

<div id="contactdetailsdiv">

  
</div>

 
 <div class="col-md-12" style=" margin-bottom:15px; margin-top:15px;"> 
<button type="submit" class="btn btn-primary btn_apply" style="background: rgb(65,56,160);
background: linear-gradient(73deg, rgba(65,56,160,1) 23%, rgba(114,35,162,1) 100%);border: none;">SUBMIT</button></div>

</form>

</div> 
 
<script>
 $('#project_sites').on('change',function(e) {
	 var substr= e.target.value;
			 
			var html = '<div class="col-md-12  margin_to_20 "><h4 class="mt-5">Contact Details</h4></div><div class="col-md-12  margin_to_20 margin_bottom_20 border_solid_1px">';
			
			var i;
				for (i = 1; i <= substr; i++) {
				 
					html+='<div class="col-md-12 margin_bottom_20 border_solid_1px">	<div class="form-group col-md-1">    <label for="exampleInputEmail1"></label> Site-'+i+'  </div>  <div class="form-group col-md-1">    <label for="exampleInputEmail1">Site Code</label>   <input id="site_code" name="sites['+i+'][site_code]" type="text" class="form-control"    >  </div>   <div class="form-group col-md-2">    <label for="exampleInputEmail1">Site Name</label><input id="site_name" name="sites['+i+'][site_name]" type="text" class="form-control  "     >  </div> <div class="form-group col-md-2">    <label for="exampleInputEmail1">Field Supervisor</label> <select  id="field_supervisor" class="form-control field_supervisor1" name="sites['+i+'][field_supervisor]"  ><option value="">Select</option>';
					
					 <?php foreach($fieldsupervisor as $data){ ?>
					html+='<option value="<?php echo $data->name; ?>"><?php echo $data->name; ?></option>';
					 <?php } ?>
					
					html+='</select>      </div>     <div class="form-group col-md-2">    <label for="exampleInputEmail1">Primary</label>   <input id="primary" name="sites['+i+'][primary]"  type="text" class="form-control  "       >  </div>   <div class="form-group col-md-2">    <label for="exampleInputEmail1">Secondary</label>   <input id="secondary" name="sites['+i+'][secondary]" type="text" class="form-control "      >  </div>   <div class="form-group col-md-2">    <label for="exampleInputEmail1">Email ID</label>   <input id="email" name="sites['+i+'][email]"  type="text" class="form-control  "       >  </div>     </div>'; 
					 
				}

			html+='</div>';
		 
			$("#contactdetailsdiv").html(html);	 
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
			 
		 
        },
       
    }); 
 });
 
  $('#field_supervisor').on('change',function(e)
 {
    
    var e_project_code = e.target.value;
	alert(e_project_code);
   
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

@endsection

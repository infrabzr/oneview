@extends('layouts.fieldsupervisor')
@section('content')
<body>
<?php 

/*  echo "<pre>";
print_r($requestforequipments); */ 
?>
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
	 
		<select id="type" class="form-control form_select_fil_1 @error('type') is-invalid @enderror" name="type" disabled="true">
			<option value="">Select</option>
			<option value="Vehicle"   <?php if($requestforequipments[0]->type=="Vehicle"){ echo "selected"; } ?>>Vehicle</option>
			<option  value="Equipment" <?php if($requestforequipments[0]->type=="Equipment"){ echo "selected"; } ?> >Equipment</option>
		</select> 
  </div>
<div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Product Type</label>
	 
		<select id="r_product_type" class="form-control form_select_fil_1 @error('r_product_type') is-invalid @enderror" name="r_product_type"   disabled="true">
			<option value="">Select</option>
			<option value="own" <?php if($requestforequipments[0]->r_product_type=="own"){ echo "selected"; } ?> >Own</option>
			<option  value="rent"  <?php if($requestforequipments[0]->r_product_type=="rent"){ echo "selected"; } ?> >Rent</option>
		</select> 
  </div>
  <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Equipment Type</label>
		<select  id="r_equipment_type" class="form-control form_select_fil_2 @error('r_equipment_type') is-invalid @enderror" name="r_equipment_type"  disabled="true">
			  <option value="">Select</option>
			  <option  value="excavator"  <?php if($requestforequipments[0]->r_equipment_type=="excavator"){ echo "selected"; } ?>>Excavator</option>
			  <option value="tipper" <?php if($requestforequipments[0]->r_equipment_type=="tipper"){ echo "selected"; } ?>>Tipper</option>
			  <option  value="crane" <?php if($requestforequipments[0]->r_equipment_type=="crane"){ echo "selected"; } ?>>Crane</option>
			  <option  value="dumper"  <?php if($requestforequipments[0]->r_equipment_type=="dumper"){ echo "selected"; } ?>>Dumper</option>
		</select>
		 
  </div>
  <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Select Brand</label>
   <select id="r_brand" class="form-control form_select_fil_2 @error('r_brand') is-invalid @enderror" name="r_brand"  disabled="true" >
	 <option value="">Select</option>
	   <option <?php if($requestforequipments[0]->r_brand=="LT"){ echo "selected"; } ?>>LT</option>
	  <option <?php if($requestforequipments[0]->r_brand=="Apollo"){ echo "selected"; } ?>>Apollo</option>
	  <option <?php if($requestforequipments[0]->r_brand=="Cat"){ echo "selected"; } ?>>Cat</option>
	  <option <?php if($requestforequipments[0]->r_brand=="Case"){ echo "selected"; } ?>>Case</option>
	</select>
	
  </div>
  <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Select Year</label>
    <select class="form-control form_select_fil_2" name="r_year" disabled="true">
  <option value="2021" <?php if($requestforequipments[0]->r_year=="2021"){ echo "selected"; } ?>>2021</option>
  <option value="2020" <?php if($requestforequipments[0]->r_year=="2020"){ echo "selected"; } ?>>2020</option>
  <option value="2019" <?php if($requestforequipments[0]->r_year=="2019"){ echo "selected"; } ?>>2019</option>
  <option value="2018" <?php if($requestforequipments[0]->r_year=="2018"){ echo "selected"; } ?>>2018</option>
  <option value="2017" <?php if($requestforequipments[0]->r_year=="2017"){ echo "selected"; } ?>  >2017</option>
  <option value="2016" <?php if($requestforequipments[0]->r_year=="2016"){ echo "selected"; } ?>>2016</option>
  <option value="2015" <?php if($requestforequipments[0]->r_year=="2015"){ echo "selected"; } ?>>2015</option>
  <option value="2014" <?php if($requestforequipments[0]->r_year=="2014"){ echo "selected"; } ?>>2014</option>
  <option value="2013" <?php if($requestforequipments[0]->r_year=="2013"){ echo "selected"; } ?>>2013</option>
  <option value="2012" <?php if($requestforequipments[0]->r_year=="2012"){ echo "selected"; } ?>>2012</option>
  <option value="2011" <?php if($requestforequipments[0]->r_year=="2011"){ echo "selected"; } ?>>2011</option>
  <option value="2010" <?php if($requestforequipments[0]->r_year=="2010"){ echo "selected"; } ?>>2010</option>
  <option value="2009" <?php if($requestforequipments[0]->r_year=="2009"){ echo "selected"; } ?> >2009</option>
  <option value="2008" <?php if($requestforequipments[0]->r_year=="2008"){ echo "selected"; } ?>>2008</option>
  <option value="2007" <?php if($requestforequipments[0]->r_year=="2007"){ echo "selected"; } ?>>2007</option>
  <option value="2006" <?php if($requestforequipments[0]->r_year=="2006"){ echo "selected"; } ?>>2006</option>
</select>
 
  </div>
 
  </div>
  <div class="col-md-6 ">
   <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Model No</label>
	<input disabled="true" id="r_model" type="text" class="form-control @error('r_model') is-invalid @enderror" name="r_model" value="<?php echo $requestforequipments[0]->r_model; ?>"   >
 
  </div>
  <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Capacity</label>
   <input disabled="true"id="r_capacity" type="text" class="form-control @error('r_capacity') is-invalid @enderror" name="r_capacity" value="<?php echo $requestforequipments[0]->r_capacity; ?>"   >
 
  </div>
    <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Type of Work</label>
    <input disabled="true" id="r_work" type="text" class="form-control @error('r_work') is-invalid @enderror" name="r_work" value="<?php echo $requestforequipments[0]->r_work; ?>"   >
 
  </div>
  </div>
</div> 



<div class="col-md-12"><h4 class="mt-5">Project Details</h4></div>
<div class="col-md-12  margin_to_20 margin_bottom_20 border_solid_1px">

<div class="col-md-8">

 
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Select Project</label>
    	 <select class="form-control form_select_fil_2" id="r_project" name="r_project" disabled="true">
		 <option selected><?php echo $requestforequipments[0]->project_code; ?></option>
 
   
   
</select>
  </div> 
    <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Project Name</label>
  <input type="text" id="project_name" class=" form_select_fil_1 form-control" disabled="true" value="<?php echo $requestforequipments[0]->project_name; ?> "   >
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">State</label>
     <input autocomplete="off"id="project_state" disabled="true" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value=" <?php echo $requestforequipments[0]->state; ?>"   >
  </div>
  <div class="form-group col-md-3">
    <label for="exampleInputEmail1">City</label>
   <input autocomplete="off"id="project_city" disabled="true" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="<?php echo $requestforequipments[0]->city; ?> "   >
  </div>
  <div class="form-group col-md-3">
    <label for="exampleInputEmail1">Field Supervisor</label>
    <input autocomplete="off"id="field_supervisor" disabled="true" type="text" class="form-control @error('field_supervisor') is-invalid @enderror" name="field_supervisor" value="<?php echo $requestforequipments[0]->field_supervisor; ?>"   >
  </div>
  </div>
   <div class="col-md-4">
  <div class="form-group col-md-12">
    <label for="exampleInputEmail1">Complete Address</label>
   <textarea id="project_address" type="text" disabled="true" class="form_select_fil_1 form-control @error('address') is-invalid @enderror" name="address" value="<?php echo $requestforequipments[0]->project_address; ?>"    > </textarea>
     
  </div>
  </div>

   
  
    
  
</div>


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

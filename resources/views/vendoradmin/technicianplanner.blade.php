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
hr {
    margin-top: 13px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid #000;
}
.col-md-8.activeclients1_css {
    background-color: #c9f7f5;
}
.activeclients2_css {
    background-color: #2ad3cc;
    padding: 1.4%;
    width: 17%;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
}
.col-md-8.activeclients3_css {
    background-color: #ffe2e5;
}
.activeclients4_css {
    background-color: #ee707d;
    padding: 1.4%;
    width: 17%;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
}
.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 4px solid #fff;
}
.activeclients3_css .fa {
   color: #ee707d;
    padding: 3px 10px;
    font-size: 18px;
}
.activeclients1_css .fa{
	    color: #2ad3cc;
    padding: 3px 10px;
    font-size: 18px;
}
th,td {
    font-size: 12px;
    font-weight: 400;
}
</style>
<style>

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 6%;
  height: 245px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 12px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border-left: none;
  height: 300px;
}
</style>
<!--
-->
<!--
-->
<div class="col-md-12">
  

  <div class="tab-content">
    <div id="technician" class="tab-pane fade in active">
      <h3>Technician Planner</h3>
     <form method="post" action="/technicianplanner/store" enctype="multipart/form-data">
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
<div class="col-md-12 nopad">

<div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Technician Name</label>
   <select class="form-control form_select_fil_2" id="product_type" name="technician_users_id" required>
     <option value="">Select</option>
   @foreach($technician_users as $key => $val)
  <option value="{{ $technician_users[$key]->id }}">{{$technician_users[$key]->name }}</option>
     @endforeach
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">State</label>
   <select class="form-control form_select_fil_2" id="state" name="tech_state" required>
     <option value="">Select</option>
   @foreach($states as $key => $val)
  <option value="{{ $states[$key]->state_name }}">{{$states[$key]->state_name }}</option>
     @endforeach
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Equipment Type</label>
  
  <select class="form-control form_select_fil_2" id="ve_equipment_type" name="tech_equipment_type" required>
 
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Code</label>
   <select class="form-control form_select_fil_2" id="ve_equipment_type_code" name="tech_code" required>
 
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Vehicle Number</label>
   <select class="form-control form_select_fil_2" id="ve_vehicle_number" name="ve_vehicle_number" required>
 
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <input type="hidden" name="equ_id" id="equ_id">
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">&nbsp;</label>
    <input type="submit" class="form-control btn btn-success" value="Assign" placeholder="">  
	<!--<select class="form-control form_select_fil_2" name="e_model">
  <option value="demo">EX 70</option>
  <option value="demo1">EX 110</option>
  <option value="demo2">Ex 200</option>
</select>-->
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
 
  </div>
    </div>
    </form>
    
  </div>
  </div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
th {
    text-align: center;
}
.h3, h3 {
    font-size: 16px;
    text-align: center;
}
.nav-tabs>li {
    float: left;
    margin-bottom: -1px;
    width: 50%;
}
.nav-tabs>li>a {
    text-align: center;
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}
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
 $('#state').on('change',function(e)
 {
    
    var state_name = e.target.value;
	
   
    jQuery.ajax({
	    type: 'POST',
        url:'/getvendorequipment',

        data: {
			"_token": "{{ csrf_token() }}",
            state: state_name,
			
        },
        success: function( data ){
			var newdata = data.equipments;
			console.log(newdata);
			 var html = '<option >Select</option>';
			$.each(newdata, function(key,value){
				 html+='<option value='+value.ve_equipment_type+'>'+value.sub_category_name+'</option>'; 
			});
			$("#ve_equipment_type").html(html);	 
			 //$("#field_supervisor").val(newdata[0].field_supervisor);
			 
        },
       
    }); 
 });
 $('#ve_equipment_type').on('change',function(e)
 {
    
    var equipment_type = e.target.value;
	
   
    jQuery.ajax({
	    type: 'POST',
        url:'/getvendorequipmentcode',

        data: {
			"_token": "{{ csrf_token() }}",
            equipment_type: equipment_type,
			
        },
        success: function( data ){
			var newdata = data.equipments;
			console.log(newdata);
			 var html = '<option >Select</option>';
			$.each(newdata, function(key,value){
				if(value.exits1===0){
				 html+='<option value='+value.ve_vehicle_code+'>'+value.ve_vehicle_code+'</option>'; 
				}
			});
			$("#ve_equipment_type_code").html(html);	 
			 //$("#field_supervisor").val(newdata[0].field_supervisor);
			 
        },
       
    }); 
 });
 $('#ve_equipment_type_code').on('change',function(e)
 {
    
    var vehicle_code = e.target.value;
	
   
    jQuery.ajax({
	    type: 'POST',
        url:'/getvendorequipmentnumber',

        data: {
			"_token": "{{ csrf_token() }}",
            vehicle_code: vehicle_code,
			
        },
        success: function( data ){
			var newdata = data.equipments;
			console.log(newdata);
			 var html = '<option >Select</option>';
			$.each(newdata, function(key,value){
				 html+='<option value='+value.ve_vehicle_number+'>'+value.ve_vehicle_number+'</option>'; 
				 $("#equ_id").val(value.id);	
			});
			$("#ve_vehicle_number").html(html);	 
			 //$("#field_supervisor").val(newdata[0].field_supervisor);
			 
        },
       
    }); 
 });
</script>

@endsection
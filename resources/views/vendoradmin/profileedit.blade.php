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


.addnewproject .fa {
        color: #fff;
    font-size: 0.7em;
    vertical-align: middle;
    margin-top: 35px;
    background-color: #5f79ca;
    padding: 6px;
    border-radius: 50%;
}
.addnewclient .fa {
        color: #fff;
    font-size: 0.7em;
    vertical-align: middle;
    margin-top: 35px;
    background-color: #5f79ca;
    padding: 6px;
    border-radius: 50%;
}
.addnewproject .fa-minus {
    color: #fff;
    font-size: 0.7em;
    vertical-align: middle;
    margin-top: 35px;
    background-color: red;
    padding: 6px;
    border-radius: 50%;
}
</style>

<div class="col-md-12  ratio_addequipment nopad" >
<div class="col-md-12 add_equipment nomargin" style="background: linear-gradient(
35deg
, rgba(228,225,225,1) 23%, rgba(255,255,255,1) 100%);">
<div class="col-md-8">
<h4 class="" >ADD Client</h4>
</div>
<div class="col-md-4 ">
<div class="float-right" style="float: right;">
<!--
<select class="form-control form_select_fil_2" id="product_type" name="ve_product_type" required>
  <option value="">Select</option>
  <option value="nonib_user" selected>Non 1 View User</option>
  <option value="ib_user">1 View User</option>
</select>-->
</div>
</div>
</div>
<form method="post" action="/vendore/update" enctype="multipart/form-data">
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
    <label for="exampleInputEmail1">Client Name</label>
    <input type="text" class="form-control"  placeholder="" name="client_name" value="{{$profiledetails->name}}">  
    <input type="hidden" class="form-control"  placeholder="" name="id" value="{{$profiledetails->id}}">  
	
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">State</label>
  <select class="form-control form_select_fil_2" id="state" name="client_state" required>
  <option >Select</option>
    @foreach($states as $key => $val)
 <option value="{{ $states[$key]->state_id }}" <?php if($profiledetails->state== $states[$key]->state_id){ echo "Selected";} ?>>{{ $states[$key]->state_name }}</option>
   @endforeach
</select>
	
    <small id="emailHelp" class="form-text text-muted"></small>
  </div> 
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Phone</label>
    <input type="text" class="form-control"  placeholder="" name="client_phone" value="{{$profiledetails->mobile}}">  
	
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" class="form-control"  placeholder="" name="client_email" value="{{$profiledetails->email}}">  
	
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">City</label>
    <input type="text" class="form-control"  placeholder="" name="client_city" value="{{$profiledetails->city}}">  
	
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Complete Address</label>
    <input type="text" class="form-control"  placeholder="" name="client_address" value="{{$profiledetails->address}}">  
	
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
   <div class="form-group col-md-2 nopad_5">
  <img src="{{URL('/images')}}/{{$profiledetails->logo}}" style="with:30px;height:30;">
    <label for="exampleInputEmail1">Upload Logo</label>
    <input type="file" class="form-control"  placeholder="" name="client_logo" >  
	<input type="hidden" name="logo" value="{{$profiledetails->logo}}">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
   <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">PAN Number</label>
    <input type="text" class="form-control"  placeholder="" name="pan_number" value="{{$profiledetails->pan_number}}">  
	
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">GST Number</label>
    <input type="text" class="form-control"  placeholder="" name="gst_number" value="{{$profiledetails->gst_number}}">  
	
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
     <input type="hidden" class=" form-control"  value="{{$profiledetails->vendoradmin_id}}" name="vendoradmin_id" >



  <?php 
/*   
  $arr1 = json_decode($profiledetails->contact_details);
 // print_R($arr);
  $aar = json_decode('[{"var1":"9","var2":"16","var3":"16"},{"var1":"8","var2":"15","var3":"15"}]');
  print_R($aar);
  echo "<br>";
  print_R($arr1);

foreach($aar as $item) { //foreach element in $arr
 
   echo  $uses = $item->var1; //etc 
}
foreach($arr1 as $item) { //foreach element in $arr
 
   echo  $uses = $item->var1; //etc 
} */
 

?>
  
  
 
  <?php 
  $cont_de = json_decode($profiledetails->contact_details);   
  $pro_de = json_decode($profiledetails->project_details);   
  
  //$pro_de = json_decode($profiledetails->contact_details);
/*  echo "<pre>";
print_r($pro_de);  */
  ?>
  
</div>


<div class="col-md-12"><h4 class="mt-5">Add Contact Details</h4></div>
<input type="hidden" id="contactdetails_id" value="1">
<?php foreach($clientcontacts as $key=>$pro_data){    ?>
<div class="col-md-12  nopad margin_to_20 margin_bottom_20 border_solid_1px" id="addcontactdetails">
<div id='TextBoxesGroup'>
<div id='TextBoxDiv' class="col-md-12">
    <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Contact Name</label>
	<input type="hidden" name="clientcontacts_id[]" value="<?php echo $pro_data->clientcontacts_id; ?>">
	<input type="hidden" name="vendor_admin_id[]" value="<?php echo $pro_data->vendor_admin_id; ?>">
    <input type="text" class="form-control"  placeholder="" name="contact_name[]" value="<?php    echo $pro_data->contacts_name; ?>">  
	
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Mobile No</label>
    <input type="text" class="form-control"  placeholder="" name="contact_mobile[]" value="<?php    echo $pro_data->contacts_mobile; ?>" required>  
	
    <small id="emailHelp" class="form-text text-muted"></small>
  </div> 
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Secondary No</label>
    <input type="text" class="form-control"  placeholder="" name="contact_secondaryno[]" value="<?php    echo $pro_data->contacts_secondarymobile; ?>" >  
	
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Email ID</label>
    <input type="text" class="form-control"  placeholder="" name="contact_email[]" value="<?php    echo $pro_data->contacts_email; ?>" required>  
	
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
   <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Designation</label>
    <input type="text" class="form-control"  placeholder="" name="contact_designation[]" value="<?php    echo $pro_data->contacts_designation; ?>" required>  
	
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
   <div class="form-group col-md-2 nopad_5 addnewclient" id="addnewclient">
    <!--<label for="exampleInputEmail1"> <i class="fa fa-plus addButton1" aria-hidden="true"  id='addButton'></i> </label>-->
   
  </div>
   <input type="hidden" class=" form-control"  value="<?php echo request()->segment(3); ?> " name="id" required>
  </div>
</div>

</div>
<?php } ?>
<div class="col-md-12"><h4 class="mt-5">Add Projects</h4></div>
<input type="hidden" id="project_id" value="1">
<?php foreach($vendorprojects as $pro_data){ ?>
<div class="col-md-12 nopad margin_to_20 margin_bottom_20 border_solid_1px" style="margin-top: 10px;">
<div id='TextBoxesGroupProject'>
<div id='TextBoxDivProject' class="col-md-12">
 <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Project Name</label>
	<input type="hidden" name="project_id[]" value="<?php echo $pro_data->project_id; ?>">
    <input type="text" class="form-control"  placeholder="" name="project_name[]" value="<?php echo $pro_data->project_name; ?>">  
	
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
   <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">State</label>
 <select class="form-control form_select_fil_2" id="state" name="project_state[]" >
  <option >Select</option>
    @foreach($states as $key => $val)
 <option value="{{ $states[$key]->state_id }}" <?php if($pro_data->project_state==$states[$key]->state_id){ echo "selected"; } ?>>{{ $states[$key]->state_name }}</option>
   @endforeach
</select>
		
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
   <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">City</label>
    <input type="tex" class="form-control"  placeholder="" name="project_city[]" value="<?php echo $pro_data->project_city; ?>">  
	
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Address</label>
    <input type="tex" class="form-control"  placeholder="" name="project_address[]" value="<?php echo $pro_data->project_address; ?>">  
	
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  
  
  <div class="form-group col-md-2 nopad_5 addnewproject " id="addnewproject_new">
    <!--<label for="exampleInputEmail1"><i class="fa fa-plus addButtonProject1" aria-hidden="true"  id="addButtonProject"></i></label>-->
    
  </div>
</div>
</div>
</div>
<?php } ?>
<!--
<input type="button" value="Add Another" id='addButtonProject' >-->
<input type="submit"  id="submit" class="btn  btn-primary">
</div>
</form>

 

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">

$(document).ready(function(){

    var counter = 1;
        
   // $("#addButton").click(function () {
         $(document).on("click", "#addButton" , function() {
var contactdetails_count = counter+1;
$("#contactdetails_id").val(contactdetails_count);
			
			
var removeadd = counter;
		removeadd--; 
 $(".addButton1").remove();			
 $(".addButton" + removeadd).remove();			
    
        
    var newTextBoxDiv = $(document.createElement('div'))
         .attr("id", 'TextBoxDiv' + counter).attr("class","col-md-12");
                
    newTextBoxDiv.after().html('<div class="form-group col-md-2 nopad_5"><label for="exampleInputEmail1">Contact Name</label><input type="text" class="form-control"  placeholder="" name="contact_name[]" required>  <small id="emailHelp" class="form-text text-muted"></small></div><div class="form-group col-md-2 nopad_5"><label for="exampleInputEmail1">Mobile No</label><input type="text" class="form-control"  placeholder="" name="contact_mobile[]" required>  <small id="emailHelp" class="form-text text-muted"></small></div> <div class="form-group col-md-2 nopad_5"><label for="exampleInputEmail1">Secondary No</label><input type="text" class="form-control"  placeholder="" name="contact_secondaryno[]" required>  <small id="emailHelp" class="form-text text-muted"></small></div><div class="form-group col-md-2 nopad_5"><label for="exampleInputEmail1">Email ID</label><input type="text" class="form-control"  placeholder="" name="contact_email[]" required>  <small id="emailHelp" class="form-text text-muted"></small></div><div class="form-group col-md-2 nopad_5"><label for="exampleInputEmail1">Designation</label><input type="text" class="form-control"  placeholder="" name="contact_designation[]" required><small id="emailHelp" class="form-text text-muted"></small></div><div class="form-group col-md-1 nopad_5 addnewproject"> <label for="exampleInputEmail1"> <i class="fa fa-plus addButton'+counter+'" aria-hidden="true"  id="addButton"></i> &nbsp;&nbsp;&nbsp; </label></div><div class="form-group col-md-1 nopad_5 addnewproject"> <label for="exampleInputEmail1"> <i class="fa fa-minus " aria-hidden="true"  id="removeButton"></i> &nbsp;&nbsp;&nbsp; </label></div>');
            
    newTextBoxDiv.appendTo("#TextBoxesGroup");

                
    counter++;
	
     });
 $(document).on("click", "#removeButton" , function() {
			counter--;
			var contactdetails_count = $("#contactdetails_id").val();
			
			
			var contactdetails = contactdetails_count-1;
			//alert(contactdetails);
			$("#contactdetails_id").val(contactdetails);
			var contactdetails_count = $("#contactdetails_id").val();
			if(contactdetails_count==1){
				$("#addnewclient").html('<i class="fa fa-plus addButton1" aria-hidden="true" id="addButton"></i>');
			}

          //  $(this).parent().remove();
			$("#TextBoxDiv" + counter).remove();
			
        });

        $(document).on("click", "#addButtonProject" , function() {      
 		var contactdetails_count = counter+1;
$("#project_id").val(contactdetails_count);
			
			
var removeadd = counter;
		removeadd--; 
 $(".addButtonProject1").remove();			
 $(".addButtonProject" + removeadd).remove();	
 
        
    var newTextBoxDiv = $(document.createElement('div'))
         .attr("id", 'TextBoxDivProject' + counter).attr("class","col-md-12");
                
    newTextBoxDiv.after().html('<div class="form-group col-md-2 nopad_5"><label for="exampleInputEmail1">Project Name</label><input type="text" class="form-control"  placeholder="" name="project_name[]" required>  <small id="emailHelp" class="form-text text-muted"></small></div><div class="form-group col-md-2 nopad_5"><label for="exampleInputEmail1">State</label><select class="form-control form_select_fil_2" id="state" name="project_state[]" required><option >Select</option> @foreach($states as $key => $val)<option value="{{ $states[$key]->state_id }}">{{ $states[$key]->state_name }}</option>@endforeach</select><small id="emailHelp" class="form-text text-muted"></small></div><div class="form-group col-md-2 nopad_5"><label for="exampleInputEmail1">City</label><input type="tex" class="form-control"  placeholder="" name="project_city[]" required>  <small id="emailHelp" class="form-text text-muted"></small></div><div class="form-group col-md-2 nopad_5 addnewproject"><label for="exampleInputEmail1"> <i class="fa fa-plus addButton'+counter+'" aria-hidden="true"  id="addButtonProject"></i></label></div><div class="form-group col-md-2 nopad_5 addnewproject"><label for="exampleInputEmail1"> <i class="fa fa-minus " aria-hidden="true"  id="removeButtonProject"></i></label></div>');
            
    newTextBoxDiv.appendTo("#TextBoxesGroupProject");

                
    counter++;
	//alert();
     });

    /*  $("#removeButtonProject").click(function () {
            counter--;
        $("#TextBoxDivProject" + counter).remove();
            
     });
    */
   
    $(document).on("click", "#removeButtonProject" , function() {
		
			counter--;
			var project_id = $("#project_id").val();
			
			
			var project_id = project_id-1;
			//alert(contactdetails);
			$("#project_id").val(project_id);
			var project_id_count = $("#project_id").val();
			if(project_id_count == 1){
				$("#addnewproject_new").html('<i class="fa fa-plus addButtonProject1" aria-hidden="true" id="addButtonProject"></i>');
			}

          //  $(this).parent().remove();
			$("#TextBoxDivProject" + counter).remove();
			
        });
   
   
  });
  
  $('#product_type').change(function() {
	 if($(this).val() == "ib_user")
	{ 
//var APP_URL = {!! url('/vendorequipment/rentcreate') !!};

	 	window.location.href="http://127.0.0.1:8000/vendor/createibclients";
	}
});
</script>

@endsection
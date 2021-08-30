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
<h4 class="" >Add Warehouse</h4>
</div>
<div class="col-md-4 ">
<div class="float-right" style="float: right;">


</div>
</div>
</div>
<form method="post" action="/warehouse/store" enctype="multipart/form-data">
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
    <label for="exampleInputEmail1">State <span class="required">*</span></label>
   <select class="form-control form_select_fil_2" id="state" name="project_state" required>
     <option value="">Select</option>
   @foreach($states as $key => $val)
  <option value="{{ $states[$key]->state_id }}">{{$states[$key]->state_name }}</option>
     @endforeach
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Clients <span class="required">*</span></label>
  
  <select class="form-control form_select_fil_2" id="clients" name="client_id" required>
   <option value="">Select</option>
   @foreach($vendorclients as $key => $val)
  <option value="{{ $vendorclients[$key]->id }}">{{$vendorclients[$key]->name }}</option>
     @endforeach
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div> 
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Project Name <span class="required">*</span></label>
  
  <select class="form-control form_select_fil_2" id="projectlist" name="projectname" required>
 
</select>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
 
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">Warehouse Name <span class="required">*</span></label>
  <input type="text" name="warehousename" class="form-control">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  
  <div class="form-group col-md-2 nopad_5">
    <label for="exampleInputEmail1">&nbsp;</label>
    <input type="submit" class="form-control btn btn-success" value="Add" placeholder="">  
	<!--<select class="form-control form_select_fil_2" name="e_model">
  <option value="demo">EX 70</option>
  <option value="demo1">EX 110</option>
  <option value="demo2">Ex 200</option>
</select>-->
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
 
  </div>

<!--
<input type="button" value="Add Another" id='addButtonProject' >-->
</div>
</form>

 

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
 $('#state').on('change',function(e)
 {
    
    var state_name = e.target.value;
	
   
    jQuery.ajax({
	    type: 'POST',
        url:'/getvendorclinet',

        data: {
			"_token": "{{ csrf_token() }}",
            state: state_name,
			
        },
        success: function( data ){
			var newdata = data.projectdata;
			console.log(newdata);
			 var html = '<option >Select</option>';
			$.each(newdata, function(key,value){
				 html+='<option value='+value.id+'>'+value.name+'</option>'; 
			});
			$("#clients").html(html);	 
			 //$("#field_supervisor").val(newdata[0].field_supervisor);
			 
        },
       
    }); 
 }); 
 $('#clients').on('change',function(e)
 {
    
    var client_id = e.target.value;
	
   
    jQuery.ajax({
	    type: 'POST',
        url:'/getvendorproject',

        data: {
			"_token": "{{ csrf_token() }}",
            client_id: client_id,
			
        },
        success: function( data ){
			var newdata = data.projectdata;
			console.log(newdata);
			 var html = '<option >Select</option>';
			$.each(newdata, function(key,value){
				 html+='<option value='+value.project_id+'>'+value.project_name+'</option>'; 
			});
			$("#projectlist").html(html);	 
			 //$("#field_supervisor").val(newdata[0].field_supervisor);
			 
        },
       
    }); 
 });
</script>

@endsection
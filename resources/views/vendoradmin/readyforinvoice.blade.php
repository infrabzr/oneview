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
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #fbf7f6;
  width: 5%;
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class 
.tab button.active {
  background-color: #ccc;
}*/

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  width: 70%;
  border-left: none;
  height: 500px;
}
.button_css{
	color: #000;
    border: 1px solid #000;
    padding-top: 13%;
    padding-bottom: 13%;
    border-radius: 7px;
	font-size: 9px;
}
.col-md-4 h3{
	border-bottom: 1px solid;
    border-left: 1px solid;
	font-size: 16px;
	background-color: #fff;
    padding: 3%;
    box-shadow: 9px 15px 9px 8px rgb(184 175 175 / 75%);
    /* -webkit-box-shadow: 9px 15px 9px 8px rgb(184 175 175 / 75%); */
    -moz-box-shadow: 9px 15px 9px 8px rgba(184,175,175,0.75);
}
.col-md-5 h3{
	border-radius: 10px;
	font-size: 16px;
	background-color: #fff;
    padding: 3%;
   
}
col-md-4 h3 span, .col-md-3 h3 span{
	background: #101fdc;
    color: #fff;
}
h3 span {
  background: #3fa3bd;
    color: #fff;
    padding: 0% 2% 0% 2%;
    font-size: 16px;
    float: right;
}

.profile_name{
	border: 1px solid #fff;
    padding-top: 2%;
    padding-bottom: 2%;
    margin-top: 2%;
	background: #fff;
}
.profile_box{
	background: #ebeeff;
    padding: 2%;
	    border-radius: 10px;
		border: 1px solid #5555552b;
		margin-top: 2%;
}
.profilename.text-center {
    font-size: 20px;
    text-transform: uppercase;
    color: #87bec5;
}
.sideheading{
	color:#969698;
}
table th,td {
    font-size: 12px;
}
.table-bordered {
    border: 1px solid #ddd;
    text-align: center;
}
tr{
	    background-color: #f9f9f9;
}
th {
    text-align: center;
}
.active p {
    background: #0000004d;
}
</style>

<div class="col-md-12">



<div id="London" class="tabcontent">
  <div class="row">
  
  <div class="col-md-12">
  <div class="col-md-12">
  
  
  </div>
  <div class="col-md-12" style="
    margin-bottom: 4%;
">
  
   
  <div class="col-md-5"><h3>Total Projects<span>{{count($vendorprojects)}}</span></h3></div>
  </div><div class="col-md-12">
  <table class="table table-bordered">
<tr style="background-color:#eaeef7;">
<th>
S.No
</th>
<th>
Project
</th>
<th>
No.Of Equipment
</th>
<th>
Rental Value
</th>
<th>
Billing Cycle
</th>
<th>
Invoice 
</th>
<?php 
$i=1;
foreach($vendorprojects as $newdata){	
?>
<tr>
<td><?php  echo $i; ?></td>
<td><a href="{{url('vendor/listofinvoice')}}/<?php  echo $newdata->project_id; ?>"><?php  echo $newdata->project_name; ?></a></td>
<td><?php  echo $newdata->counta; ?></td>
<td><?php  echo "&#8377; ". number_format($newdata->v_rental_cost);  ?></td>
<td><?php  echo $newdata->ve_billing_cycle." Days"; ?></td>
<td> <?php  if($newdata->next_invoice_generated_date){ $todaydate = date("Y-m-d");
$start = strtotime($todaydate);
 $end = strtotime($newdata->next_invoice_generated_date);

$days_between = ceil(abs($end - $start) / 86400); if($days_between==0){ ?><a href="{{url('vendor/listofinvoice')}}/<?php  echo $newdata->project_id; ?>">View Invoice</a><?php }else{ echo "$days_between day to go generate the invoice"; } } ?></td>
</tr>
<?php $i++; } ?>
</table>
  
  </div>
  </div>
   <!-- <div class="col-md-1"></div>
 >
  <div class="col-md-1"></div>-->
  </div><div class="col-md-12">
  
  <div class="col-md-5"></div>
  
</div>
</div>


<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</div>
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
$('#product_type').change(function() {
	 if($(this).val() == "rentout")
	{ 
//var APP_URL = {!! url('/vendorequipment/rentcreate') !!};

	 	window.location.href="http://127.0.0.1:8000/vendorequipment/rentalcreate";
	}
});
</script>

@endsection
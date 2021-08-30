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
  height:159px;
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
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'one')" id="defaultOpen">Client List</button><hr style="
    margin: 0;
"></hr>
  <button class="tablinks" onclick="openCity(event, 'two')">Rental Renewals</button>
  <!--<button class="tablinks" onclick="openCity(event, 'three')">Rental Contract</button>-->
</div>
<?php // echo "<pre>";

$clientlist = json_decode(json_encode($clientlist), true);

 ?>
<div id="one" class="tabcontent">

 <div class="col-md-12" style="margin-top:2%;">
 
<div class="col-md-1"></div>
<div class="col-md-3 ">
<div class="col-md-8 activeclients3_css">

<p style="
    margin-bottom: 0px;font-size: 13px;
"><i class="fa fa-folder" aria-hidden="true" style="
    vertical-align: middle;
"></i><span style="
    margin-bottom: 0px;
    margin-top: 2px;
    position: absolute;
">Directory</span></p></div><div class="col-md-4 activeclients4_css">
<span style="color: #fff;font-size: 13px;">0</span>
</div>
</div>


<div class="col-md-3 ">
<div class="col-md-8 activeclients1_css nopad">

<p style="
    margin-bottom: 0px;font-size: 13px;
"><i class="fa fa-user-plus" style="
    vertical-align: middle;
"></i> <span style="
    margin-bottom: 0px;
    margin-top: 2px;
    position: absolute;
">Active Clients</span></p></div><div class="col-md-4 activeclients2_css">
<span style="color: #fff;font-size:13px;"><?php echo count($clientlist); ?></span>
</div>
</div>
</div>
<div class="col-md-12">
<div class="col-md-1"></div><div class="col-md-9">
<div class="col-md-12 nopad">
<div class="col-md-11 nopad"><hr></div><div class="col-md-1 nopad text-right"><a href="{{ url('/vendor/createclients') }}">Add Client</a></div></div>
<div class="col-md-12 text-center"><b>Client List</b></div>
<table class="table table-bordered">
<tr style="background-color:#eaeef7;">
<th>
S NO
</th>
<th>
Client Name
</th>
<th>
State
</th>
<th>
City
</th>
<th>
Contract Value
</th>

<th>
Action
</th>
</tr>
<?php // echo "<pre>";

$clientlist = json_decode(json_encode($clientlist), true);
$i=1;
foreach($clientlist as $data){
 ?>
 
<tr style="background-color:#f2f3f7;">
<td><?php echo $i; ?></td>
<td><img src="{{ url('/images') }}/<?php echo $data["logo"];?>" style="with:30px;height:30;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data["name"];?></td>
<td><?php echo $data["state_name"];?></td>
<td><?php echo $data["city"];?></td>
<td>281401 INR</td>
<td><a href="{{ url('/vendor/profiledetails') }}/<?php echo $data['id']; ?>"><i class="fa fa-eye" aria-hidden="true" style="color:#2ad3cc;"></i> View</a>
<a href="{{ url('/vendor/profileedit') }}/<?php echo $data['id']; ?>"><i class="fa fa-edit" aria-hidden="true" style="color:#2ad3cc;"></i> Edit</a>
</td>
</tr>
<?php $i++; } ?>
</table></div><div class="col-md-2"></div>
</div>
</div>

<div id="two" class="tabcontent">
 
  <table class="table table-bordered" id="project_history">
<caption style="color:#000; text-align:center">Rental contract expired</caption>
<thead >
<tr style="background-color:#eaeef7;">
<th>ID</th>
<th> Client Name</th>
<th> Equipment Name</th>
<th>vehicle number</th>
<th>rental Start Date</th>
<th>rental End Date</th>
<th>number of days</th>
<th>cost</th>
<th>Renewals</th>
</tr>
</thead>
<tbody>
<?php $i= 1; foreach($clientcontactdetails as $projectdata){ ?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $projectdata->name; ?></td>
<td><?php echo $projectdata->category_name; ?></td>
<td><?php echo $projectdata->ve_vehicle_number; ?></td>
<td><?php echo $projectdata->ve_rental_start_date; ?></td>
<td><?php echo $projectdata->ve_rental_end_date; ?></td>
<td><?php echo $projectdata->ve_noofdays; ?></td>
<td><?php echo $projectdata->ve_rental_cost; ?></td>
<td><a href="{{url('/vendorequipment/renewals')}}/<?php echo $projectdata->ve_id; ?>">Renewals</a></td>
</tr>
<?php $i++; } ?>
</tbody>

</table>
</div>

<div id="three" class="tabcontent">
   <h3>Rental Contract
</h3>
  <p>Coming Soon.</p> 
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


@endsection
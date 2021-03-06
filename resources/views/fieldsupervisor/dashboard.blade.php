@extends('layouts.fieldsupervisor') 
@section('content')

<style>

.main_heading{
	color:#444447 ;
	font-size:18px;
	    vertical-align: middle;
}
.sub_heading{
	color:#111112;
	font-size:12px;
	    vertical-align: middle;
}
.main_heading_num{
		color:#111112;
	font-size:25px; 
	    vertical-align: middle;
}
.add_sub_heading{
	color:#444447;
	font-size:13px;
}
.right_side{
	float:right;
	    margin-top: 1%;
}
.side_fixel_20{
	    vertical-align: middle;
	padding-left:20px;
}
.side_fixel_30{
	    vertical-align: middle;
	padding-left:20px;
}
.side_fixel_10{
	    vertical-align: middle;
	padding-left:10px;
}
.side_fixel_50{
	    vertical-align: middle;
	padding-left:50px;
}
.side_fixel_35{
	    vertical-align: middle;
	padding-left:35px;
}
.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: none;
}
.fa-edit{
	width: 25px;
    height: 25px;
    background: #cacace;
    border-radius: 6px;
    font-size: 16px;
    padding: 5px;
    color: #041639;
    text-align: center;
}
.fa-trash-o, .fa-trash {
	width: 25px;
height: 25px;
background: #f33924;
border-radius: 6px;
font-size: 16px;
padding: 5px;
color: #fff;
text-align: center;
}
.margin_to_20{
	margin-top:20px;
}
.margin_bottom_20{
margin-bottom:20px;	
}
button.btn.btn-primary.btn_apply {
background: linear-gradient(
79deg
, rgba(101,77,188,1) 23%, rgba(168,42,167,1) 100%);

border-radius: 20px;
border: none;
color: #fff;
font-size: 12px;
width: 90px;
}
#example1 th{
	color:#2b2626;
	font-size:13px;
}
.table_header{
	background-color:#edf5f8;
}
#example1 td{
	color:#757373;
	font-size:13px;
}
.fa-plus-circle{
	font-size:20px;
	color:#544bc1;
}
select.form_select_fil {
    max-width: 300px;
    padding: 5px 5px;
    background: #dffaff;
    color: #6f6868;
    border-radius: 8px;
    border: solid 1px #dbdedf;
}
.form_select_fil_2{
max-width: 300px;
padding: 5px 5px;
background: #fffbfb;
color: #6f6868;
border-radius: 8px;
border: solid 1px #dbdedf;
}
i.fa.fa-etsy1.ror_text1 {
   width: 20px;
height: 20px;
padding: 5px 0px 10px;
text-align: center;
font-size: 10px;
color: #fff;
background: #6d9ddf;
transform: skew(
13deg
);
	
}
i.fa.fa-etsy1.ror_text2 {
   width: 20px;
height: 20px;
padding: 5px 0px 10px;
text-align: center;
font-size: 10px;
color: #fff;
background: #9793ee;
transform: skew(
13deg
);
	
}

.fa-trash-o:hover {
    color: red;
    cursor: pointer;
}
span.edit_icon_p {
    padding-right: 10px;
	vertical-align: middle;
}
span.delete_icon_p {
    padding-right: 10px;
	vertical-align: middle;
}




@media only screen and (max-width: 1024px) and (min-height:600px)  {
	.margin_bottom_20 {
    margin-bottom: 20px;
    text-align: center;
}
.form_select_fil_2{
	margin-bottom: 1%;
}
.c100{
	font-size: 55px!important;
}
.subtext span {
    font-size: 10px;
}
}
span.in_class_one {
    background-color: #38cec3;
    padding-top: 4px;
    padding-bottom: 4px;
    border: 1px solid #858587;
    width: 2.8646%;
    text-align: center;
    display: inline-block;
}
span.in_class_two {
    background-color: #f71d0f;
    padding-top: 4px;
    padding-bottom: 4px;
    border: 1px solid #858587;
    width: 2.8646%;
    text-align: center;
    display: inline-block;
}
span.in_class_three {
    background-color: #fabc05;
    padding-left: 8px;
    padding-top: 4px;
    padding-bottom: 4px;
    border: 1px solid #858587;
    width: 2.8646%;
    text-align: center;
    display: inline-block;
}
span.in_class_four {
    background-color: #16817a;
    padding-top: 4px;
    padding-bottom: 4px;
    border: 1px solid #858587;
    width: 2.8646%;
    text-align: center;
	color:#000;
    display: inline-block;
}
span.in_loopClass {
    background-color: #38cec3;
    padding-top: 4px;
    padding-bottom: 4px;
    border: 1px solid #858587;
    width:2.9846%;
    text-align: center;
    display: inline-block;
}
.tabwidth8{
	width:15px;
	height:15px;
}
span.right_side_border {
    border: 1px solid #7d8181;
    padding-bottom: 0.5%;
    padding-top: 1%;
    padding-left: 26%;
    padding-right: 26%;
}
.rental_objective_css{
	color:#7572ce;
}
.days_css{
	color:#6f6464!important;
}
.dollar_8{
	border: 1px solid #b0b0b3;
	padding:1px;
	color:#111112;
	width:23px;
	height:23px;
}
.right_side_border{
	color:#099187;
}
span.view_css_new {
    background: linear-gradient(
95deg
, rgba(79,74,194,1) 23%, rgba(151,83,175,1) 100%);
color:#fff;
	padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 15px;
    padding-right: 15px;
}
.side_h5{
	color:#2b2626;
}
.view_right{
	text-align:right;
}
.paddingleft{
	padding-left:2%;
}
.textcolor{
	color:#6a4dbb;
}
.percentage{
	margin-top: 1%;
    margin-left: 0%;
    padding-left: 2.5%;
}
</style>
<body>

<?php  foreach($piechartdata as $data){ $demo[] = $data->count; } ?>
<div class="col-md-12"style=" background: #fff; padding: 1%;margin-top: 1%;" ><div class="col-md-4"><span>Total Equipment:</span> <span style="font-size:18px;"><?php echo array_sum($demo); ?></span></div><div class="col-md-8 float-right" style="text-align: right;"><span>Project Code:</span><span class="textcolor"><?php echo $projectdata[0]->project_code; ?> </span><span class="paddingleft">Project Name:</span><span class="textcolor"><?php echo $projectdata[0]->project_name; ?> </span><span class="paddingleft">Site: </span><span class="textcolor"><?php echo $projectdata[0]->site_name; ?></span><span class="paddingleft">Phase:</span><span class="textcolor"><?php echo $projectdata[0]->phase; ?> </span></div></div>


    <div class="col-md-12 ratio">
					
						@foreach($piechartdata as $key => $val)
						<a href="{{ URL('/fieldsupervisor/widgetclick/'.$piechartdata[$key]->e_equipment_type )}}">
						<div class="tab6" style="margin-top: 1%;
						<?php  $segment_posts = request()->segment(3);  if($piechartdata[$key]->e_equipment_type == $segment_posts){?>border: 1px solid #ff6565;<?php }else{ ?>
						border: 1px solid #16a79e; <?php } ?>
						width: 10%!important;background-color:white;padding: 7px !important;height:22vh">
						<div class="notifyname1"> <!--<span><i class="fa fa-etsy" aria-hidden="true"></i></span>--></div>
							<div class="col-md-12 nopad" style="margin-top: 3vh;">
							<div class="col-md-12 card-body box-profile">
						 <div class="c100 p100 margin_left_24">
								<span style="color:#000;">{{ $piechartdata[$key]->count }}</span>
								<div class="slice">
									<div class="bar" style="border: 0.08em solid #16a79e;"></div>
									<div class="fill" style="border: 0.08em solid #16a79e;"></div>
								</div>
							</div>
							</div>
							<div class="subtext">
								<span>{{ $piechartdata[$key]->e_equipment_type }}</span>
							</div>
							</div>
		
						
						
					</div></a>
					
					@endforeach
					
						
       
    </div>
	



<div class="col-md-12">
<div class="col-md-12 equipment_ratio">
<span class="main_heading">DPR Details</span><img class="side_fixel_50" src="https://materialwala.com/buildsand/site_assets/newapp/filter20x20.png"><img class="side_fixel_30" src="https://materialwala.com/buildsand/site_assets/newapp/excavator35x35.png">
 <span class="sub_heading side_fixel_10">Vehicles </span>
 <span class="main_heading_num side_fixel_20"><?php echo $vehiclescount[0]->count; ?></span> <img class="side_fixel_50" src="https://materialwala.com/buildsand/site_assets/newapp/rented35x35.png">
 <span class="sub_heading side_fixel_10">Equipments </span>
 <span class="main_heading_num side_fixel_20"><?php echo $equipmentscount[0]->count; ?></span>
<div class="col-md-12 nopad margin_to_20 margin_bottom_20">
<form method="post" action="{{ route('equipmentsearch') }}">
@csrf
<span class="">
<select class="form-select form_select_fil" id="first_category" aria-label="Default select example">
  <option selected>Select by </option>
  <option value="1" selected>State</option>
  <option value="2">City</option> 
</select></span><span class="side_fixel_35 ">
<select class="form-select form_select_fil_2"  name="states_cities" aria-label="Default select example">
  <option>Select State</option>
	@foreach($states as $key => $val)
 <option value="{{ $states[$key]->state_name }}">{{ $states[$key]->state_name }}</option>
   @endforeach
</select></span><span class="side_fixel_35 ">
<select class="form-select form_select_fil_2" name="project_type"  aria-label="Default select example">
   <option selected>Project Type</option>
 @foreach($project_type as $key => $val)
 <option value="{{ $project_type[$key]->project_type }}">{{ $project_type[$key]->project_type }}</option>
   @endforeach
</select></span><span class="side_fixel_35 ">
<select class="form-select form_select_fil_2" name ="project_code" aria-label="Default select example">
  <option selected>Project Code</option>
  @foreach($equipemntdata as $key => $val)
 <option value="{{ $equipemntdata[$key]->project_code }}">{{ $equipemntdata[$key]->project_code }}</option>
   @endforeach
</select></span><span class="side_fixel_35 ">
<select class="form-select form_select_fil_2" name="product_type" aria-label="Default select example">
  <option selected>Product Type</option>
  <option value="Own">Own</option>
  <option value="Rented">Rented</option>
  <option value="Both">Both</option>
</select></span><span class="side_fixel_35 ">
<select class="form-select form_select_fil_2" aria-label="Default select example" name="equipment_type">
  <option selected>Equipment Type</option>
@foreach($equipment as $key => $val)
 <option value="{{ $equipment[$key]->e_equipment_type }}">{{ $equipment[$key]->e_equipment_type }}</option>
   @endforeach
</select>
</span><span class="side_fixel_35 ">
<input  type="submit" class="btn btn-primary btn_apply"></button>
</span><span class="side_fixel_35 " style="display:none;">Search Equipment</span>
</form>
</div>


@foreach($equipments as $key => $val)
<div class="col-md-12 nopad">

@php
$diffdays = $equipments[$key]->e_wom
@endphp
<div class="col-md-11 nopad" style=" background-color: #dcf1f2; text-align:center;">
<div class="col-md-6 rental_objective_css"><span style="float:left;">{{ $equipments[$key]->e_equipment_type }} #IB21-{{$equipments[$key]->e_id}}</span>Rental Objective <span class="dollar_8"><?php echo ceil($diffdays/30);?></span>
<span class="days_css"> Hrs/ {{ $equipments[$key]->e_wom }} Hrs per month</span>
</div>
@php
$fdate = $equipments[$key]->e_rental_start_date;
$tdate = $equipments[$key]->e_rental_end_date;
$datetime1 = strtotime($fdate);
$datetime2 = strtotime($tdate); 
$days = (int)(($datetime2 - $datetime1)/86400);

@endphp
<div class="col-md-3 rental_objective_css">Rental Billing Cycle <span class="dollar_8">{{ $equipments[$key]->e_billing_cycle }}</span>
 <span class="days_css">Days</span></div> <div class="col-md-3 rental_objective_css">Rental Period <span class="dollar_8">{{$days}} </span>
 <span class="days_css"> year</span></div></div>
 <div class="col-md-1 view_right"><a href="http://13.233.71.224/fieldsupervisor/equipment_detailview/{{ $equipments[$key]->e_id }}"><span class="view_css_new">View</span></a></div>


<div class="col-md-11 nopad" style="    border-bottom: 6px solid #dcf1f2;    background: #dcf1f2;">
<a href="http://13.233.71.224/fieldsupervisor/equipment_detailview/{{ $equipments[$key]->e_id }}"><span class="in_class_one">01</span></a>
<a href="http://13.233.71.224/fieldsupervisor/equipment_detailview/{{ $equipments[$key]->e_id }}"><span class="in_class_two">02</span></a>
<a href="http://13.233.71.224/fieldsupervisor/equipment_detailview/{{ $equipments[$key]->e_id }}"><span class="in_class_three">03</span></a>
<a href="http://13.233.71.224/fieldsupervisor/equipment_detailview/{{ $equipments[$key]->e_id }}"><span class="in_class_four">04</span></a>
<?PHP  for( $i=5; $i<=31; $i++){ ?>
<a href="http://13.233.71.224/fieldsupervisor/equipment_detailview/{{ $equipments[$key]->e_id }}"><span class="in_loopClass"><?php if($i<10){ echo 0; } echo $i; ?></span></a>
<?php } ?>
</div><div class="col-md-1 "></div><div class="col-md-12 ">&nbsp;</div>  

</div>
 @endforeach
<div class="col-md-12">

<div class="col-md-3 nopad"><div class="col-md-1">
<div class=" tabwidth8 tab5ico" style="background-image: linear-gradient(to right, #16a79d , #00dccd 80%);    margin-top: 31%;">	</div></div><div class="col-md-11 side_h5">&nbsp; Rental objective achieved </div>
</div>
<div class="col-md-3 nopad"><div class="col-md-1">
<div class="tabwidth8  tab5ico" style="background-color:#f71d0f; margin-top: 31%;background-image: none;"></div>	
			
			</div ><div class="col-md-11 side_h5">&nbsp; Idle</div></div>
<div class="col-md-3 nopad"><div class="col-md-1">
			<div class=" tabwidth8 tab5ico" style="background-color:#fabc05;background-image: none; margin-top: 31%;">&nbsp;&nbsp;	</div></div><div class="col-md-11 side_h5">&nbsp; Below Rental Objective</div>
</div>
<div class="col-md-3 nopad"><div class="col-md-1">
			<div class=" tabwidth8 tab5ico" style="background-color: #16817a;background-image: none; margin-top: 31%;">&nbsp;&nbsp;	</div></div><div class="col-md-11 side_h5">&nbsp; Rental Objective Exceeded</div>
</div>

</div>
</div>
</div>
</div>
</body>
<footer><script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
window.onload = function() {
	var chart = new CanvasJS.Chart("chartContainer1", {
	theme: "light2", // "light2", "dark1", "dark2"
	animationEnabled: true, // change to true		
	title:{
		text: "Ongoing Projects",
		fontColor: "#ffb700",
		 fontWeight: "normal",
         fontSize: 16,
		 fontFamily: "tahoma",
	},
	data: [
	{
		// Change type to "bar", "area", "spline", "pie",etc.
		type: "column",
		dataPoints: [
			{ label: "p1",  y: 500  },
			{ label: "p2",  y: 200 },
			{ label: "p3",  y: 100  },
			{ label: "p4",  y: 70  },
			{ label: "p5",  y: 200  },
			{ label: "p6",  y: 90  },
			
		]
	}
	]
});
chart.render();
var chart = new CanvasJS.Chart("chartContainer2", {
	theme: "light2", // "light2", "dark1", "dark2"
	animationEnabled: true, // change to true		
	title:{
		text: "No of Equipments across all sites",
		fontColor: "#ffb700",
		 fontWeight: "normal",
         fontSize: 16,
		 fontFamily: "tahoma",
	},
	data: [
	{
		// Change type to "bar", "area", "spline", "pie",etc.
		type: "column",
		dataPoints: [
			{ label: "Total",  y: 500  },
			{ label: "Active",  y: 100 },
			{ label: "Breakdown",  y: 400  },
			
		]
	}
	]
});
chart.render();
}
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Type of Equipment",
		 fontColor: "#ffb700",
		 fontWeight: "normal",
         fontSize: 16,
		 fontFamily: "tahoma",
	},
	data: [{
		type: "pie",
		startAngle: 240,
		//yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			@foreach($piechartdata as $key => $val)
			{y: {{ $piechartdata[$key]->count }}, label: "'{{ $piechartdata[$key]->e_equipment_type }}'"},
			@endforeach
			
			
		
			
			
		]
	}]
});
chart.render();
</script>

<script>
 $('#first_category').on('change',function(e)
 {
    console.log(e);
    var cat_id = e.target.value;
// alert(cat_id);
   
   jQuery.ajax({
	    type: 'POST',
        url:'/home/states_cities',

        data: {
			"_token": "{{ csrf_token() }}",
            id: cat_id,
			
        },
        success: function( data ){
			var newdata = data.msg;
		 
		 var html = '<option>Select</option>';
		
            $.each( newdata, function( key, value ) { 
				 html+='<option value='+value.state_name+'>'+value.state_name+'</option>'; 
			 });
			 
			$("#states_cities").html(html);	 
        },
       
    });
 });
 
 </script>
</footer>
</html>
@endsection
@extends(((Auth::user()->role == '5') ? 'layouts.vendor' : 'layouts.app'))
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
.sidr_fixel_20{
	    vertical-align: middle;
	padding-left:20px;
}
.sidr_fixel_30{
	    vertical-align: middle;
	padding-left:20px;
}
.sidr_fixel_10{
	    vertical-align: middle;
	padding-left:10px;
}
.sidr_fixel_50{
	    vertical-align: middle;
	padding-left:50px;
}
.sidr_fixel_35{
	    vertical-align: middle;
	padding-left:20px;
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
.tablr_header{
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
span.deletr_icon_p {
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
    background-color:  #38cec3;
    padding-top: 4px;
    padding-bottom: 4px;
	  width: 2.9646%;
    text-align: center;
	border: 1px solid #858587;
	    display: inline-block;
}
span.in_class_two {
    background-color:  #f71d0f;
    padding-top: 4px;
    padding-bottom: 4px;
	  width: 2.9646%;
    text-align: center;
	border: 1px solid #858587;
	    display: inline-block;
}
span.in_class_three{
    background-color: #fabc05;
    padding-top: 4px;
    padding-bottom: 4px;
	  width: 2.9646%;
    text-align: center;
	    display: inline-block;
	border: 1px solid #858587;
}
span.in_class_four{
    background-color: #16817a;
    padding-top: 4px;
    padding-bottom: 4px;
	  width: 2.9646%;
	      display: inline-block;
    text-align: center;
	border: 1px solid #858587;
	color: #fff;
}
span.in_loopClass {
   background-color: #38cec3;
    padding-top: 4px;
    padding-bottom: 4px;
    border: 1px solid #858587;
    width: 2.9646%;
    text-align: center;
    display: inline-block;
}
.tabwidth8{
	width:15px;
	height:15px;
}
span.right_sidr_border {
    border: 1px solid #7d8181;
    padding-bottom: 0.5%;
    padding-top: 1%;
    padding-left: 1%;
    padding-right: 1%;
}
.rental_objectivr_css{
	color:#7572ce;
	    padding-left: 10%;
}
.days_css{
	color:#6f6464!important;
}
.dollar_8{
	padding:1px;
	color:#111112;
	width:23px;
	height:23px;
}
.right_sidr_border{
	color:#099187;
	border: 1px solid #000;
    text-align: center;
    padding-top: 4%;
    margin-bottom: 7%;
    padding-bottom: 4%;
}
span.view_css_new {
    background: linear-gradient(
95deg
, rgba(79,74,194,1) 23%, rgba(151,83,175,1) 100%);
color:#fff;
	padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 22px;
    padding-right: 22px;
}
.sidr_h5{
	color:#2b2626;
	font-weight:600;
}
.view_right{
	text-align:right;
}
/* .tab6{
	height:auto!important;
} */
</style>
<body>
<?php 
 $rolr_id = Auth::user()->role; 
		
				if($rolr_id ==5){ ?>

<div class="col-md-12">
<div class="col-md-12 ratio">
 
 	<a href="{{ URL('/requests/requestwidgetclick/1')}}"  style="    color: black;">
					<div class="tab6" style="background-color:white;padding: 7px !important;height:25vh; width: 10% !important;">
					<div class="notifyname2"> <span><i class="fa fa-exclamation" aria-hidden="true"></i></span></div>
							<div class="col-md-12 nopad">
							<div class="col-md-12 card-body box-profile"> 
						 <div class="c100 p100 margin_left_24" >
								<span><?php echo $newrequest_count; ?> </span>
								<div class="slice">
									<div class="bar" style="border: 0.08em solid #fabb05" ></div>
									  
									<div class="fill" style="border: 0.08em solid #fabb05;"></div>
									 
								</div>
							</div>
							</div><div class="subtext">
									<span>Ready<br>for Invoicing</span>						
							
							</div>
							</div>
		
						
						
					</div>
					</a>
					 
					
					<a href="{{ URL('/requests/requestwidgetclick/2')}}" style="    color: black;">
					<div class="tab6" style="background-color:white;padding: 7px !important;height:25vh; width: 10% !important;">
				  <br>
							<div class="col-md-12 nopad">
							<div class="col-md-12 card-body box-profile"> 
						 <div class="c100 p100 margin_left_24" >
								<span><?php echo $pending_vendor_count; ?></span>
								<div class="slice">
									<div class="bar" style="border: 0.08em solid #ea4237" ></div> 
									<div class="fill" style="border: 0.08em solid #ea4237;"></div> 
								</div>
							</div>
							</div><div class="subtext">
										<span>Rejected Invoices</span>					
							
							</div>
							</div>
		
						
						
					</div>
					</a>
					<a href="{{ URL('/requests/requestwidgetclick/3')}}"  style="    color: black;">
					<div class="tab6" style="background-color:white;padding: 7px !important;height:25vh; width: 10% !important;">
				  <div class="notifyname2"> <span><i class="fa fa-exclamation" aria-hidden="true"></i></span></div>
							<div class="col-md-12 nopad">
							<div class="col-md-12 card-body box-profile"> 
						 <div class="c100 p100 margin_left_24" >
								<span><?php echo $approve_vendor_count; ?></span>
								<div class="slice">
									<div class="bar" style="border: 0.08em solid #544bc1" ></div> 
									<div class="fill" style="border: 0.08em solid #544bc1;"></div> 
								</div>
							</div>
							</div><div class="subtext">
										<span>Raised Invoices</span>			
							
							</div>
							</div>
		
						
						
					</div>
					</a>
					 <a href="{{ URL('/requests/requestwidgetclick/4')}}"  style="    color: black;">
					
					<div class="tab6" style="background-color:white;padding: 7px !important;height:25vh; width: 10% !important;">
				 <br>
							<div class="col-md-12 nopad">
							<div class="col-md-12 card-body box-profile"> 
						 <div class="c100 p100 margin_left_24" >
								<span><?php echo $approved_request_count; ?></span>
								<div class="slice">
									<div class="bar" style="border: 0.08em solid #16a79e" ></div> 
									<div class="fill" style="border: 0.08em solid #16a79e;"></div> 
								</div>
							</div>
							</div><div class="subtext">
										<span>Approved Invoices</span>	
							
							</div>
							</div>
		
						
						
					</div>
					</a>
				 <a href="{{ URL('/requests/requestwidgetclick/4')}}"  style="    color: black;">
					
					<div class="tab6" style="background-color:white;padding: 7px !important;height:25vh; width: 10% !important;">
				 <br>
							<div class="col-md-12 nopad">
							<div class="col-md-12 card-body box-profile"> 
						 <div class="c100 p100 margin_left_24" >
								<span><?php echo $approved_request_count; ?></span>
								<div class="slice">
									<div class="bar" style="border: 0.08em solid #676769" ></div> 
									<div class="fill" style="border: 0.08em solid #676769;"></div> 
								</div>
							</div>
							</div><div class="subtext">
										<span>View <br>Previous Invoices</span>	
							
							</div>
							</div>
		
						
						
					</div>
					</a>
					 
</div>
</div>
				<?php } ?>
<div class="col-md-12" style="margin-top:1%;">
<div class="col-md-12 equipment_ratio">
<span class="main_heading">DPR Details</span><img class="sidr_fixel_50" src="{{ asset('newapp/filter20x20.png') }}"><img class="sidr_fixel_30" src="{{ asset('newapp/excavator35x35.png') }}">
 <span class="sub_heading sidr_fixel_10">Vehicles </span>
 <span class="main_heading_num sidr_fixel_20">{{$typevehicle_count}}</span> <img class="sidr_fixel_50" src="{{ asset('newapp/rented35x35.png') }}">
 <span class="sub_heading sidr_fixel_10">Equipments </span>
 <span class="main_heading_num sidr_fixel_20">{{$typeequipment_count}}</span>
 <span style="display:none;" class="add_sub_heading right_side">NEW REQUEST <i class="fa fa-plus-circle"></i></span>
<div class="col-md-12 nopad margin_to_20 margin_bottom_20">
<form method="post" action="{{ route('equipmentsearch') }}">
@csrf
<span class="">
<select class="form-select form_select_fil" id="first_category" aria-label="Default select example">
  <option selected>Select by </option>
  <option value="1" selected>State</option>
  <option value="2">City</option> 
</select></span><span class="sidr_fixel_35 ">
<select class="form-select form_select_fil_2"  name="states_cities" aria-label="Default select example">
  <option>Select State</option>
	@foreach($states as $key => $val)
 <option value="{{ $states[$key]->state_name }}">{{ $states[$key]->state_name }}</option>
   @endforeach
</select></span><span class="sidr_fixel_35 ">
<select class="form-select form_select_fil_2" name="project_type"  aria-label="Default select example">
   <option selected>Project Type</option>
 @foreach($requests as $key => $val)
 <option value="{{ $requests[$key]->project_type }}">{{ $requests[$key]->project_type }}</option>
   @endforeach
</select></span><span class="sidr_fixel_35 ">
<select class="form-select form_select_fil_2" name ="project_code" aria-label="Default select example">
  <option selected>Project Code</option>
  @foreach($requests as $key => $val)
 <option value="{{ $requests[$key]->project_code }}">{{ $requests[$key]->project_code }}</option>
   @endforeach
</select></span>
<span class="sidr_fixel_35 ">
<select class="form-select form_select_fil_2" name ="project_code" aria-label="Default select example">
  <option selected>Project Name</option>
  @foreach($requests as $key => $val)
 <option value="{{ $requests[$key]->project_code }}">{{ $requests[$key]->project_name }}</option>
   @endforeach
</select></span>
<span class="sidr_fixel_35 ">
<select class="form-select form_select_fil_2" name ="project_code" aria-label="Default select example">
  <option selected>Site</option>
  @foreach($requests as $key => $val)
 <option value="{{ $requests[$key]->project_code }}">{{ $requests[$key]->project_code }}</option>
   @endforeach
</select></span>
<span class="sidr_fixel_35 ">
<select class="form-select form_select_fil_2" name="product_type" aria-label="Default select example">
  <option selected>Product Type</option>
  <option value="Own">Own</option>
  <option value="Rented">Rented</option>
  <option value="Both">Both</option>
</select></span><span class="sidr_fixel_35 ">
<select class="form-select form_select_fil_2" aria-label="Default select example" name="equipment_type">
  <option selected>Equipment Type</option>
 @foreach($requests as $key => $val)
 <option value="{{ $requests[$key]->r_equipment_type }}">{{ $requests[$key]->r_equipment_type }}</option>
   @endforeach
</select>
</span><span class="sidr_fixel_35 ">
<input  type="submit" class="btn btn-primary btn_apply"></button>
</span><span class="sidr_fixel_35 " style="display:none;">Search Equipment</span>
</form>
</div>


@foreach($requests as $key => $val)
<div class="col-md-12 nopad">
<div class="col-md-1 nopad" >&nbsp;</div>
@php 
$diffdays = $requests[$key]->r_wom
@endphp
<div class="col-md-12"><div class="col-md-11 nopad" style=" background-color: #dcf1f2; ">
<div class="col-md-12"><div class="col-md-2"><span class="cnopad sidr_h5">{{ $requests[$key]->r_equipment_type }} #IB21-{{$requests[$key]->r_id}} </span></div><div class="col-md-6">
<span class=" rental_objective_css">Rental Objective</span> <span class="dollar_8"><?php echo  ceil($diffdays/30); ?></span>
<span class="days_css"> Hrs/ {{ $requests[$key]->r_wom }} Hrs per month</span>

@php
$loopdays =  $requests[$key]->billing_cycle;
$fdate = $requests[$key]->rental_start_date;
$tdate = $requests[$key]->rental_end_date; 
$datetime1 = strtotime($fdate);
$datetime2 = strtotime($tdate); 
$days = (int)(($datetime2 - $datetime1)/86400);
@endphp
<span class="rental_objectivr_css">Rental Billing Cycle </span><span class="dollar_8">{{ $requests[$key]->billing_cycle }}</span>
 <span class="days_css">Days</span></div><div class="col-md-4">
 
 <span class=" rental_objectivr_css">Rental Period </span><span class="dollar_8">{{$days}} </span> <span class="days_css"> Days</span>
<span style=" padding: 2px;margin-left:5%;color: white;margin-top: 0.5%;margin-bottom: 0.5%;" class="btn btn-primary rental_objectivr_css">Raise Invoice </span>
</div>
</div>
<div class="col-md-12 nopad"style="  border-bottom: 6px solid #dcf1f2;    background: #dcf1f2;">
<a href="http://13.233.71.224/equipments/vendor_equipment_detailview/{{ $requests[$key]->r_id }}"><span class="in_class_one">01</span></a>
<a href="http://13.233.71.224/equipments/vendor_equipment_detailview/{{ $requests[$key]->r_id }}"><span class="in_class_two">02</span></a>
<a href="http://13.233.71.224/equipments/vendor_equipment_detailview/{{ $requests[$key]->r_id }}"><span class="in_class_three">03</span></a>
<a href="http://13.233.71.224/equipments/vendor_equipment_detailview/{{ $requests[$key]->r_id }}"><span class="in_class_four">04</span></a>
<?PHP  for( $i=5; $i<=$loopdays; $i++){ ?>
<a href="http://13.233.71.224/equipments/vendor_equipment_detailview/{{ $requests[$key]->r_id }}"><span class="in_loopClass"><?php if($i<10){ echo 0; } echo $i; ?></span></a>
<?php } ?>
</div> </div>
<div class="col-md-1 view_right"><p style="text-align: center; border: 1px solid;"><span>79%</span></p><p style="text-align: center; border: 1px solid; background: linear-gradient( 
95deg
 , rgba(79,74,194,1) 23%, rgba(151,83,175,1) 100%);
    color: #fff;"><a href="http://13.233.71.224/equipments/vendor_equipment_detailview/{{ $requests[$key]->r_id }}" style="color:#fff;">View</a></p></div>
<!--<div class="col-md-1 view_right"><div class="right_sidr_border">79%</div><div><a href="http://13.233.71.224/equipments/vendor_equipment_detailview/{{ $requests[$key]->r_id }}"><span class="view_css_new">View</span></a></div></div>--><div class="col-md-12 ">&nbsp;</div>

</div>
 @endforeach
<div class="col-md-12"><div class="col-md-3 nopad"><div class="col-md-1">
<div class=" tabwidth8 tab5ico" style="background-image: linear-gradient(to right, #16a79d , #00dccd 80%);    margin-top: 31%;">	</div></div><div class="col-md-11 sidr_h5">&nbsp; Rental objective achieved </div>
</div><div class="col-md-3 nopad"><div class="col-md-1">
<div class="tabwidth8  tab5ico" style="background-color:#f71d0f; margin-top: 31%;background-image: none;"></div>	
			
			</div ><div class="col-md-11 sidr_h5">&nbsp; Idle</div></div><div class="col-md-3 nopad"><div class="col-md-1">
			<div class=" tabwidth8 tab5ico" style="background-color: #16817a;background-image: none; margin-top: 31%;">&nbsp;&nbsp;	</div></div><div class="col-md-11 sidr_h5">&nbsp; Rental Objective Exceeded</div>
</div>
<div class="col-md-3 nopad"><div class="col-md-1">
			<div class=" tabwidth8 tab5ico" style="background-color:#fabc05;background-image: none; margin-top: 31%;">&nbsp;&nbsp;	</div></div><div class="col-md-11 sidr_h5">&nbsp; Below Rental Objective</div>
</div>
</div>
</div>
</div>
</div>
</body> 
<footer>

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
				 html+='<option value='+value.statr_name+'>'+value.statr_name+'</option>'; 
			 });
			 
			$("#states_cities").html(html);	 
        },
       
    });
 });
 
 </script>
</footer>
</html>
@endsection
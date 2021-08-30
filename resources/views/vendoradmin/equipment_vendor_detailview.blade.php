<?php
 // dd($equipment);
?>


@extends('layouts.vendoradmin')
@section('content')
<style>

.modal .modal-dialog {
    -webkit-transform: translate(0,-5%);
    -o-transform: translate(0,-5%);
    transform: translate(0,-5%);
    top: 5%;
    margin: 0 auto;
}
.tdone{
	color: #00dccd;
}.tdtwo{
	color: #f71d0f;
}.tdthree{
	    color: #fabc05;
}.tdfour{
	color: #16817a;
}
</style>
<style>
.col-md-3.sparestab {
    margin-top: 2%;
}
.col-md-10.tab5txt {
    margin-top: 2%;
}
.contract{
	  margin: 5px;
}
.contract_ach{
  color:#00dccd ;     margin-top: 10px;
  font-weight:bold;
}.contract_idle{
  color:#f71d0f;      margin-top: 10px;
   font-weight:bold;
}.contract_exce{
  color:#16817a;     margin-top: 10px;
   font-weight:bold;
}.contract_below{
  color:#fabc05;     margin-top: 10px;
   font-weight:bold;
}.contract_bill{
  color:#38cec3;     margin-top: 10px;
  font-weight:bold;
}
.viewbtn{
	background:#15aba9;
	    height: 25px;
    padding: 0px;
    width: 50px;
}
.viewbtn:hover{
	background:#15aba9;
}
.table_header {
    background-color: #edf5f8;
}
.fa_images{
	width:42px;height:42px; 
}

.border_solid_1px {
    border: 1px solid #c5c5c5;
	background:#fff;	 
}
.subtext_new span {
    font-size: 18px;
    font-weight: 400;
} 
.subtext_new{
	margin:10%;
}
.answer{
	color:#42b0c7;
}
.margin_to_20{
	margin-top:15px;
}
.margin_bottom_20{
	margin-bottom:15px;	
}
.thumbnail_image{
	border-radius:10px;
}
.main_image{
	border-radius:10px;
	border:1px solid #bfbdbd;
}
.nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover{
	    background-color: #42b0c7;
		margin-right:20px;
		    height: 35px;
}.nav-pills>li>a {
     background-color: #a7afc0;
	 color:#fff;
	margin-right: 20px;
	    height: 35px;
	
	    border-radius: unset;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
} .uppertable>tbody>tr>td{
	line-height: 0.7;
}
.c100{
	margin-left:0px;
}
</style>
<style>

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
 
.mt-5{
	margin:0px!important;
	font-size:13px;
	color:#232020;
	    font-weight: 700;
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
	border-top-left-radius: 10px;
    border-top-right-radius: 10px;
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
.sparestab{
	    background: #e5ebef;
    border-radius: 10px;    margin-right: 2%;
    margin-left: 2%;
}


/*dpr details*/


span.in_class_one {
    background-color: #00dccd;
    /* padding-left: 8px;
    padding-right: 8px; */
    padding-top: 4px;
    padding-bottom: 4px;
	border: 1px solid #858587;
	width: 2.8646%;
text-align: center;
display: inline-block;
}
span.in_class_two {
    background-color:  lightgray;
 /*    padding-left: 8px;
    padding-right: 8px; */
    padding-top:4px;
    padding-bottom: 4px;
	border: 1px solid #858587;
	\width: 2.8646%;
text-align: center;
display: inline-block;
}
span.in_class_three{
    background-color: #fabc05;
    // padding-left: 8px;
    // padding-right: 8px;
    padding-top: 4px;
    padding-bottom: 4px;
	border: 1px solid #858587;
	width: 2.8646%;
text-align: center;
display: inline-block;
}
span.in_class_four{
    background-color: #16817a;
   /*  padding-left: 8px;
    padding-right: 8px; */
    padding-top: 4px;
    padding-bottom:4px;
	border: 1px solid #858587;
	width: 2.8646%;
text-align: center;
display: inline-block;
}
span.in_class_start{
    background-color: yellow;
   /*  padding-left: 8px;
    padding-right: 8px; */
    padding-top: 4px;
    padding-bottom:4px;
	border: 1px solid #858587;
	width: 2.8646%;
text-align: center;
display: inline-block;
}span.in_class_idel{
    background-color: red;
   /*  padding-left: 8px;
    padding-right: 8px; */
    padding-top: 4px;
    padding-bottom:4px;
	border: 1px solid #858587;
	width: 2.8646%;
text-align: center;
display: inline-block;
}
span.in_loopClass {
    background-color:  #38cec3;
   /*  padding-left: 8px;
    padding-right: 8.65px; */
    padding-top:4px;
    padding-bottom: 4px;
	border: 1px solid #858587;
	width: 2.846%;
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
    padding-left: 1%;
    padding-right: 1%;
}
.rental_objective_css{
	color:#7572ce;
	    font-size: 0.9em;
		    font-weight: bold;
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
}span.view_css_new {
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
}.fa-plus-circle{
	color:#4f4ac2;
}.tab5txt{
	    left: 50%;
    top: 40%;
}
.form-group {
    margin-bottom: 15px;
    margin-top: 15px;
}
#project_history th {
	font-size:14px;
}

th, td {
    text-align: center;
}

</style>
  <input type="hidden" value="{{ Request::segment(3) }}" id="equ_id" />
<div class="col-md-12" style="margin-top:15px;">

	 <div class="col-md-6">
	 
		<table  class="table table-bordered uppertable" style="    background: white;">
		 <tbody style="white-space: pre;    font-size: 0.9em;">
		<tr>
			<td><b>Equipment Name</b>  :  <span class="answer">{{ $equipment->sub_category_name }}</span></td>
			<td><b>Brand</b>  :  <span class="answer">{{ $equipment->ve_brand }}</span></td>
			<td><b>Year</b>  :  <span class="answer">{{ $equipment->ve_year }}</span></td>
		</tr> 
		 	<tr>
			<!--<td><b>Equipment Type</b>  :  <span class="answer">{{ $equipment->ve_equipment_type }}</span></td>-->
			<td><b>Model No</b>  :  <span class="answer">{{ $equipment->ve_model }}</span></td>
			<td><b>Capacity</b>  :  <span class="answer">{{ $equipment->ve_capacity }}</span></td>
			<td><b>Veh Number</b>  :  <span class="answer">{{ $equipment->ve_vehicle_number }}</span></td>
		</tr> 
		 	<tr>
			
			<td><b>Current Reading</b>  :  <span class="answer"></span></td>
			<td ><b>Product type</b>  :  <span class="answer">{{ $equipment->ve_product_type }}</span></td>
			<td ><b>Type Of Work</b>  :  <span class="answer">{{ $equipment->ve_type_of_work }}</span></td>
		</tr> 
		 	
		 	<tr>
			<!--<td><b>Project Name</b>  :  <span class="answer"></span></td>-->
			
			<!--
			<td ><b>Equipment Details</b>  :  <a class="btn btn-info" href="{{ URL('/vendorequipment/edit/'.$equipment->main_id )}}">Update</a></td>
			-->
		</tr> 
		 	 
		 
		</tbody>
		</table>
	 
	 
	 
	 </div>
	 
	 <div class="col-md-6 border_solid_1px">
	 
	 <div class="col-md-3"  style="    border-right: 1px solid #c5c5c5;">
		<div class="col-md-12 ">
				<div class="subtext_new">
								<span>Profit</span>
							
							</div> 
				<div class="col-md-12 card-body box-profile">
						 <div class="margin_left_24 c100 p80 " >
								<span>80%</span>
								<div class="slice">
									<div class="bar" ></div>
									<div class="fill"></div>
								</div>
							</div>
							</div>
		</div>
	 </div>
	 
	 <div class="col-md-3" style="    border-right: 1px solid #c5c5c5;">
	 	<div class="col-md-12 ">
				<div class="subtext_new">
								<span>Services</span>
							
							</div> 
				<div class="col-md-12 card-body box-profile">
						 <div class="margin_left_24 c100 p50 " >
								<span>50%</span>
								<div class="slice">
									<div class="bar" ></div>
									<div class="fill"></div>
								</div>
							</div>
							</div>
		</div>
	 </div>
	 
	 <div class="col-md-3"  style="    border-right: 1px solid #c5c5c5;">
	 	<div class="col-md-12 ">
				<div class="subtext_new">
								<span>Spares</span>
							
							</div> 
				<div class="col-md-12 card-body box-profile">
						 <div class="margin_left_24 c100 p50 " >
								<span>50%</span>
								<div class="slice">
									<div class="bar" ></div>
									<div class="fill"></div>
								</div>
							</div>
							</div>
				</div>
	 </div>
	 
	  <div class="col-md-3">
	 <div class="col-md-12 ">
				<div class="subtext_new">
								<span>Health</span>
							
							</div> 
				<div class="col-md-12 card-body box-profile" style="margin-left: -25px;">
						 <img   class="main_image" src="{{ asset('images/health.png') }}">
							</div>
				</div>
	 </div>
	 
	 </div>
	 <div class="modal fade" id="myModal123" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alert</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure want to proceed ? </p>
        </div>
		<input type ="hidden" id="clickvalue">
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-default"  onclick="updatedetail()">ok</button>
        </div>
      </div>
      
    </div>
  </div>
<div class="modal fade" id="myModal1234" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alert</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure want to proceed ? </p>
        </div>
		<input type ="hidden" id="clickvalue1">
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-default"  onclick="savedetail()">ok</button>
        </div>
      </div>
      
    </div>
  </div>

<div class="modal fade" id="myModalsuccess" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Success</h4>
        </div>
        <div class="modal-body">
          <p>Success </p>
        </div>
		<input type ="hidden" id="clickvalue1">
        <div class="modal-footer">
        
          <button type="button" class="btn btn-default"  onclick="successmessage()">ok</button>
        </div>
      </div>
      
    </div>
  </div>
	<div class="col-md-12">
	 @if (session('status'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
        </div>
    @endif
	 
	</div>
	 <div class="col-md-12" style="
    margin-top: 1%;
">
	 <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Veh Document Details</a>
  </li>
  <li class="nav-item active" id="dprdetails_inactive">
    
<a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Rental Contract Details</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill"  href="#healthdiv" role="tab"   aria-selected="false">Booking</a>
  </li>
  <li class="nav-item" id="dprdetails_active">
    <a class="nav-link" id="dprdetails-tab" data-toggle="pill" href="#dprdetails" role="tab" aria-controls="dprdetails" aria-selected="false">DPR Details</a>
  </li>
   <li class="nav-item" id="service_active">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill"   href="#dalycheckup" role="tab"   aria-selected="false">Daly Checkup</a>
  </li>
  <li class="nav-item" id="service_active">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill"   href="#service" role="tab"   aria-selected="false">Service</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Spares</a>
  </li>
  <!-- <li class="nav-item" id="service_active">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill"   href="#operatordiv" role="tab"   aria-selected="false">Operator</a>
  </li>-->
 
  

  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill"   href="#profitdiv"  role="tab" aria-selected="false">Invoice</a>
  </li>
</ul>

<div class="tab-content margin_bottom_20" id="pills-tabContent" style="background: #fff;height:100vh;">
<div class="tab-pane" id="profitdiv" role="profitdiv" aria-labelledby="profitdiv">
 <table class="table table-bordered">
  <caption style="color:#000; text-align:center" > Invoice History </caption>
<tr style="background-color:#eaeef7;">
<th>
S.No
</th>
<th>
Invoice Genrated Date
</th>
<th>
Invoice ID
</th>
<th>
Client Name
</th><th>
Sub Total
</th>
<th>
IGST
</th>
<th>
SGST	
</th>
<th>
CGST
</th>
<th>
Total
</th>

<th>
Status
</th>

<th>
Action
</th>
<th>
payment Receipt 
</th>

<?php
if(!$listofinvoice==0){
			
		
		 
$i=1;
foreach($listofinvoice as $listofinvoicedata){	
?>
<tr>
<td><?php  echo $i; ?></td>
<td><?php  echo $listofinvoicedata->invoice_date; ?></td>
<td><?php  echo $listofinvoicedata->invoice; ?></td>
<td><?php  echo $equipment->client_name; ?></td>
<td><?php  echo $listofinvoicedata->subtotal; ?></td>
<td><?php  echo $listofinvoicedata->integratedgst; ?></td>
<td><?php  echo $listofinvoicedata->centralgst; ?></td>
<td><?php  echo $listofinvoicedata->stategst; ?></td>
<td><?php  echo $listofinvoicedata->total; ?></td>

<td><?php  if($listofinvoicedata->payment_receipt!=""){ echo "<span style='color:green;'>Payment Received</span> ";}else{ echo "<span style='color:red;'>Pending Payments </span>";} ?></td>

<td><?php  if($listofinvoicedata->amount_status==2){ ?><select id="invoicestatus">
<option>Select Option</option>
<option value="PaymentReceived,<?php  echo $listofinvoicedata->id; ?>">Payment Received</option>
</select><?php }else{ ?> <a href="{{url('home/invoiceview/')}}/{{$listofinvoicedata->id}}">View</a><?php } ?></td>
<td>
<?php  if($listofinvoicedata->amount_status==1){ ?>
<?php  if($listofinvoicedata->payment_receipt){ ?>
<a target="_blank" href="{{url('images/')}}/<?php echo $listofinvoicedata->payment_receipt; ?>"><img src="{{url('images/')}}/<?php echo $listofinvoicedata->payment_receipt; ?>" style="width:75px;height:75px"></a>
<?php }else{?>

<form action="{{url('vendor/uplaod_receipt')}}" method="post" enctype="multipart/form-data">
				@csrf
							<input type="file" onchange="this.form.submit()" name="payment_receipt_img">
					<input type="hidden" name="id" value="<?php  echo $listofinvoicedata->id; ?>">
					
					<input type="hidden" name="equipment_id" value="{{ Request::segment(3) }}">
</form>
<?php  } }else{ echo "--";} ?></td>

</tr>
<?php $i++;
 }
}else{
			
		}
 ?>
</table>
  </div>
  <div class="tab-pane " id="healthdiv" role="healthdiv" aria-labelledby="healthdiv">
   <h3 class="text-center">Booking</h3>
   <div class="col-md-6">
  <div id="calendar1"></div> 
  </div>
<div class="col-md-6">
<table class="table table-bordered" id="project_history">
<caption style="color:#000; text-align:center">Project History</caption>
<thead >
<tr style="background-color:#eaeef7;">
<th>ID</th>
<th>Project Name</th>
<th>rental Start Date</th>
<th>rental End Date</th>
<th>number of days</th>
<th>cost</th>
</tr>
</thead>
<tbody>
<?php $i= 1; foreach($projectlist as $projectdata){ ?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $projectdata->title; ?></td>
<td><?php echo $projectdata->start; ?></td>
<td><?php echo $projectdata->end; ?></td>
<td><?php echo $projectdata->ve_noofdays; ?></td>
<td><?php echo $projectdata->ve_rental_cost; ?></td>
</tr>
<?php $i++; } ?>
</tbody>

</table>
</div>
  </div>
  
  <div class="tab-pane active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  
  
<div class="col-md-12 margin_to_20 margin_bottom_20 ">


<div class="col-md-4" style="padding:0px;">
	<style>
	.website_slider_li{
		margin-bottom:15%;
	}
.hide-bullets {
    list-style:none;
	margin:0;
}
 

.carousel-inner>.item>img, .carousel-inner>.item>a>img {
    width: 100%;
}
#slider-thumbs {
    height: 20vh;
   
    white-space: nowrap;
}
#carousel-bounding-box{
	height: 60vh;
    background: red;
    position: relative;
    background-color: #fff;
    box-shadow: #000 2px 2px 18px -10px;
    position: relative;
    height: 70vh;
    border: solid 1px #b3b3b359;
}
#myCarousel{
height: 200px;
    width: 315px;
}
.webiste_inner{height: 70vh;
    top: 0%;}
.item{
	height:70vh;
	position:relative;	
}	 
 .textbox {
    width: 70%;
	border-left: transparent;
    border-right: transparent;
    border-top: transparent;
	box-shadow: none;
}
</style>
 <link rel="stylesheet" type="text/css" href="https://www.infrabazaar.com/infracss/lightbox/style3.css" />

 <div class="row">
            <div class="col-sm-3" id="slider-thumbs" style="margin-left:-25px;">
                <!-- Bottom switcher of slider -->
                <ul class="hide-bullets "> 
				<?php $dataa = json_decode($equipment->ve_images);

				?>
				@foreach (json_decode($equipment->ve_images) as $key=>$img) 
                    <li class="col-sm-12 nopad website_slider_li">
                        <a class="" id="carousel-selector-{{ $key ?? '-' }}" href="#image-{{ $key ?? '-' }}">
                            <img  width="48px" height="48px" class="thumbnail_image" style="margin:0" src="{{url('/images')}}/{{ $img }}" class="">
                        </a>
						<div class="lb-overlay" id="image-{{ $key ?? '-' }}">
							<img src="{{url('/images')}}/{{ $img }}" alt="image01" />
							<!--<div class="prevnext">
								<a href="#image-<?php// if($key==0){ echo $counta-1 ;}else { echo $key-1;}  ?>" class="lb-prev">Prev</a>
								<a href="#image-<?php //$key1 = 0; $countb = $key+1; if($counta==$countb){ echo $key1 ;}else { echo $key+1;  }  ?>" class="lb-next">Next</a>
							</div> -->
							<a href="#page" class="lb-close">X</a>
						</div>
                    </li>
				 
				@endforeach
                </ul>
            </div>
            <div class="col-sm-9">
                <div class="col-xs-12" id="slider">
                    <!-- Top part of the slider -->
                    <div class="row">
                        <div class="col-sm-12 nopad" id="">
                            <div class="carousel slide" id="myCarousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner webiste_inner">
								 
								@foreach (json_decode($equipment->ve_images) as $key=>$img)
                                    <div class="{{$key == 0  ? 'active' : ''}}   item" data-slide-number="{{ $key ?? '-' }}">
									<a href="#image-1">
                                        <img   class="main_image" src="{{url('/images')}}/{{ $img }}" class=""></a></div>
								@endforeach
                                </div>
                                <!-- Carousel nav -->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Slider-->
        </div>
		<script>
$(document).ready(function($) {
 
        $('#myCarousel').carousel({
                interval: 5000
        });
 
        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            console.log(id_selector, id);
            jQuery('#myCarousel').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});
$(document).ready(function($) {
 
        $('#myCarousel1').carousel({
                interval: 5000
        });
 
        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            console.log(id_selector, id);
            jQuery('#myCarousel1').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        $('#myCarousel1').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});

</script>
	</div>
<div class="col-md-4" style="display:none;">
@foreach (json_decode($equipment_details->ve_images) as $img)
     <div class="col-md-2"><img width="48px" height="48px" class="thumbnail_image" src="{{url('/images')}}/{{ $img }}"></div>
@endforeach

<div class="col-md-10"><img width="315px" height="224px" class="main_image" src="https://materialwala.com/buildsand/site_assets/newapp/tipper.jpg"></div> 
</div>
<div class="col-md-8">
<img class="thumbnail_image" style="    width: 90%;    margin-left: 70px;" src="https://materialwala.com/buildsand/site_assets/newapp/graph.jpg">

</div>
</div>
<div class="col-md-12  margin_to_20 margin_bottom_20">
  <div class="col-md-4">
  </div>
  <div class="col-md-8"  style="font-size: 13px;">
  <div class="col-md-4">
	
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img  class="fa_images" src="https://materialwala.com/buildsand/site_assets/newapp/owner_1.png"   /></div><div class="col-md-9"><span><b>Vendor Name</b></span><br><span style="color:#42b0c7;"> {{$equipment->client_name }}</span></div></div>
  
  </div>
  <div class="col-md-4">
 
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img   class="fa_images"  src="https://materialwala.com/buildsand/site_assets/newapp/Owner_contact_2.png" /></div><div class="col-md-9"><span><b>Vendor Adderss</b></span><br><span  style="color:#42b0c7;"> {{$equipment->project_address }}</span></div></div>
 
  
  </div>
  <div class="col-md-4">
	 
	<div class="col-md-12" >	<div class="col-md-3"><img  class="fa_images"  src="https://materialwala.com/buildsand/site_assets/newapp/Vendor_contract_3.png" /></div><div class="col-md-9"><span><b>Vendor Contact</b></span><br><span  style="color:#42b0c7;">{{$equipment->client_phoneno }}</span></div></div>
  </div>
  
  
  </div>



</div>

<div class="col-md-12  ">
  <div class="col-md-4">
  </div>
  <div class="col-md-8" style="font-size: 13px;">
  <div class="col-md-4">
	
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img  class="fa_images" src="https://materialwala.com/buildsand/site_assets/newapp/Vendormail_4.png" /></div><div class="col-md-9"><span><b>Email Id</b></span><br><span  style="color:#42b0c7;">{{$equipment->client_emailid }}</span></div></div>
  
  </div>
  <div class="col-md-4">
 
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img class="fa_images" src="https://materialwala.com/buildsand/site_assets/newapp/Vendor_Contract_5.png" /> </div><div class="col-md-9"><span><b>View Rental Contract</b></span><br><a  style="color:#42b0c7;" href="{{url('/images')}}/{{ $equipment->upload_rental_contract }}" target="_blank">View</a></div></div>
 
  
  </div>
  <div class="col-md-4" style="display:none;">
	 
	<div class="col-md-12">	<div class="col-md-3"><img  class="fa_images"  src="https://materialwala.com/buildsand/site_assets/newapp/Owner_contact_2.png" /></div><div class="col-md-9"><span><b>LOREMIPSUM</b></span><br><span  style="color:#42b0c7;">Lorem </span></div></div>
  </div>
  
  
  </div>



</div>



<div class="col-md-12  margin_to_20 margin_bottom_20">
  <div class="col-md-4">
  </div>
  <div class="col-md-8">
 <div class="modal-content" style="border-radius: 20px;">
      <div style="background:#d2d6df;padding:10px;border-top-left-radius: 20px;border-top-right-radius: 20px;">
        <h5 class="modal-title" id="staticBackdropLiveLabel" >Contract Details</h5> 
      </div>
      <div   style="margin-top: 15px;
    margin-bottom: 75px;font-size:13px;">
        <div class="col-md-12">
		  <div class="col-md-1"></div>
			<div class="col-md-2"><b>Rental Start Date</b><div class="contract"> {{$equipment->ve_rental_start_date}}</div></div>
			<div class="col-md-2"><b>Rental End Date</b><div  class="contract">{{$equipment->ve_rental_end_date}}</div></div>
			<div class="col-md-2"><b>No Of Days</b><div  class="contract">{{$equipment->ve_noofdays}}</div></div>
			<div class="col-md-2"><b>Rental Cost</b><div  class="contract">{{$equipment->ve_rental_cost}}</div></div>
			<div class="col-md-2"><b>Billing Cycle</b><br><div  class="contract">{{$equipment->ve_billing_cycle}} Days</div></div>
			<div class="col-md-1"></div>
			<!--<div class="col-md-2"><b>Equipment Status</b><div  class="contract">{{$equipment->ve_billing_cycle}}</div></div>-->
		
		</div>
		 
      </div> 
    </div>
  
  
  </div>



</div>



</div>


  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  
<div class="col-md-12  margin_to_20 margin_bottom_20">
<div class="col-md-12 ">
<div class="col-md-5">




<div class="col-md-3">
@foreach (json_decode($equipment->ve_images) as $key=>$img) 
<div class='col-md-12' style="margin-bottom:15px;"><img class='thumbnail_image img-responsive' src="{{url('/images')}}/{{ $img }}"></div> 

 @endforeach
</div>


<div class="col-md-9"><img class="main_image thumbnail_image img-responsive" src="{{url('/images')}}/{{ $img }}"></div> 
</div>
<div class="col-md-1 vachile_document_align float-left" ><p style="display:none;">Vechile Document</p>
</div>
<div class="col-md-7 document_type_border nopad">
<div class="col-md-12  vachile_background_color">
<div class="col-md-5"><span>Document Type</span></div>
<div class="col-md-3">ID No</div>
<div class="col-md-3"> End Date</div></div>

<div class="col-md-12 margin_to_20">
<div class="col-md-5"><div class="col-md-6"><input type="checkbox" name="vechile_rc" id="vechile_rc" value="vechile_rc" class="cb-element"> &nbsp;&nbsp; Vechile Rc </div><div class="col-md-2"><img src="https://materialwala.com/buildsand/site_assets/newapp/veh-rc.png"></div> <div class="col-md-4">Validity</div></div>
<div class="col-md-3"> {{ $equipment->rc_no }}</div>
<div class="col-md-3"> {{ $equipment->rc_end_date }}</div>
<div class="col-md-1"><a href="{{url('/images')}}/{{$equipment->ve_vehicle_rc}}" target="_blank">  View </a></div>


</div>
<div class="col-md-12 margin_to_20" style="background-color:f7f6ff;">
<div class="col-md-5"><div class="col-md-6"><input type="checkbox" name="vechile_insurance" id="vechile_insurance" value="vechile_insurance" class="cb-element"> &nbsp;&nbsp;Insurance </div><div class="col-md-2"><img src="https://materialwala.com/buildsand/site_assets/newapp/insurance.png"></div><div class="col-md-4">Validity</div></div>
<div class="col-md-3"> {{ $equipment->ins_no }}</div>
<div class="col-md-3"> {{ $equipment->ins_end_date }}</div>
<div class="col-md-1"><a href="{{url('/images')}}/{{$equipment->ve_insurance}}" target="_blank"> View</a></div>
</div>
<div class="col-md-12 margin_to_20">
<div class="col-md-5"><div class="col-md-6"><input type="checkbox" name="vechile_roadtax" id="vechile_roadtax" value="vechile_roadtax" class="cb-element"> &nbsp;&nbsp; Road Tax </div><div class="col-md-2"><img src="https://materialwala.com/buildsand/site_assets/newapp/tax.png"> </div><div class="col-md-4">Validity</div></div>
<div class="col-md-3"> {{ $equipment->tax_no }}</div>
<div class="col-md-3"> {{ $equipment->tax_end_date }}</div>
<div class="col-md-1"><a href="{{url('/images')}}/{{$equipment->ve_road_tax}}" target="_blank"> View</a></div>
</div>
<div class="col-md-12 margin_to_20" style="background-color:f7f6ff;">
<div class="col-md-5"><div class="col-md-6"><input type="checkbox" name="vechile_roadpermit" id="vechile_roadpermit" value="vechile_roadpermit" class="cb-element"> &nbsp;&nbsp;  Road Permit </div><div class="col-md-2"><img src="https://materialwala.com/buildsand/site_assets/newapp/Road_perrmet.png"> </div><div class="col-md-3">Validity</div></div>
<div class="col-md-3"> {{ $equipment->permit_end_date }}</div>
<div class="col-md-3"> {{ $equipment->permit_no }}</div>
<div class="col-md-1"> <a href="{{url('/images')}}/{{$equipment->ve_road_permit}}" target="_blank">View</a></div>

</div>
<div class="col-md-12 margin_to_20">
<div class="col-md-5"><div class="col-md-6"><input type="checkbox" name="vechile_fitness" id="vechile_fitness" value="vechile_fitness" class="cb-element"> &nbsp;&nbsp; Fitness / Break </div><div class="col-md-2"><img src="https://materialwala.com/buildsand/site_assets/newapp/fintenss_break.png"> </div><div class="col-md-4">Validity</div></div>
<div class="col-md-3"> {{ $equipment->fitness_no }}</div>
<div class="col-md-3"> {{ $equipment->fitness_end_date }}</div>
<div class="col-md-1"><a href="{{url('/images')}}/{{$equipment->ve_fitness}}" target="_blank"> View</a></div>

</div>
<div class="col-md-12 margin_to_20">
<div class="col-md-5"><div class="col-md-6"><input type="checkbox" name="vechile_fitness" id="checkall" value="all"> &nbsp;&nbsp; Check All  </div><div class="col-md-6"><button type="button" class="btn btn-primary" id="share_doc">
 Share Documents
</button></div></div>
<div class="col-md-3"> </div>
<div class="col-md-3"></div>
<div class="col-md-1"> </div>

</div>
<p>&nbsp;</p>
</div> 
</div> 
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">The Below listed information is shared</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	   <div class="modal-body">
	  <div class="col-md-12">
	  <div class="modal-body col-md-4" style="padding: 0px 0px 0px 15px;">
       <div class="form-group">
    <input type="checkbox"  id="vehicle_documents" checked> <label for="exampleInputEmail1">Vehicle Documents</label>
   
    
  </div>
      </div>
	  <div class="modal-body col-md-4" style="padding:0px;">
       <div class="form-group">
    <input type="checkbox"  id="vehicle_information" name="vehicle_information" value="1"> <label for="exampleInputEmail1">Vehicle Information</label>
   
    
  </div>
      </div>
	  <div class="modal-body col-md-4" style="padding:0px;">
       <div class="form-group">
    <input type="checkbox"  id="vehicle_images" value="1" name="vehicle_images"> <label for="exampleInputEmail1">Vehicle Images</label>
   
    
  </div>
      </div>
	  <div class="modal-body col-md-4" style="padding: 0px 0px 0px 15px;">
       <div class="form-group">
    <input type="checkbox" id="vehicle_operator" value="1" name="vehicle_operator"> <label for="exampleInputEmail1">Operator Details</label>
   
    
  </div>
      </div>
	 <div class="modal-body col-md-4" style="padding:0px;">
	 </div>
	 <div class="modal-body col-md-4" style="padding:0px;">
	 </div>
	 </div>
     
       <div class="form-group" style="margin-left: 5%;margin-right: 15%;">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
        <button type="button" class="btn btn-primary" id="send_mail">Send</button>
      </div>
    </div>
  </div>
</div>



  <style>
  .modal-header {
    padding: 15px;
    border-bottom: 1px solid #e5e5e5;
    background: #2db9c8;
	color: #fff;
}
.modal-title {
    margin: 0;
    line-height: 1.42857143;
    font-size: 16px;
}
  .operator_name{
	font-size: 18px;
    font-weight: 600;
    background: #ccc;
    padding: 1%;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}
#operatorcontent{
	display:none;
}
#yourBtn {
margin-top:5%;
  top: 150px;
  font-family: calibri;
  width: 108px;
  padding: 10px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border: 1px dashed #BBB;
  text-align: center;
  background-color: #DDD;
  cursor: pointer;
}
  </style>
  
  </div>
  

  <script>
  $('#checkall').change(function () {
    $('.cb-element').prop('checked',this.checked);
});

$('.cb-element').change(function () {
 if ($('.cb-element:checked').length == $('.cb-element').length){
  $('#checkall').prop('checked',true);
 }
 else {
  $('#checkall').prop('checked',false);
 }
});


  jQuery(document).ready(function(){
    jQuery('#hideshow').on('click', function(event) {        
         jQuery('#operatorcontent').toggle('show');
    });
});

$(function(){$('#hideshow').click(function() {
	
       $(this).val() == "show" ? play_int() : play_pause();
    });
});


function play_int() {
	
    $('#hideshow').val("hide");
    // do play
}

function play_pause() {
	
    $('#hideshow').val("show");
    // do pause
}
  </script>
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
  
  <div class="col-md-12  margin_to_20 margin_bottom_20">
<div class="col-md-4">
<div class="col-md-2"><img width="48px" height="48px" class="thumbnail_image" src="https://materialwala.com/buildsand/site_assets/newapp/excavator.jpg"></div>
<div class="col-md-10"><img width="315px" height="224px" class="main_image" src="https://materialwala.com/buildsand/site_assets/newapp/tipper.jpg"></div> 
</div>
<div class="col-md-8">
     @foreach ($sparecategory as $sc)
			 <div class="col-md-3 sparestab" >		
			<div class="col-md-12" style="padding: 0;height:50px">	
			<div class="col-md-2"  >	
			<img style="    width: 35px;    height: 35px;     margin-top: 10px;" src="https://materialwala.com/buildsand/site_assets/newapp/spare_ico1.png" />
			</div>
			<div class="col-md-10 tab5txt">	
			<h5>
			{{ $sc->spare_category }} - {{ $sc->count }}</h5> 
			</div>
			</div>
		</div>
				@endforeach
  </div><div class="col-md-8  margin_to_20 margin_bottom_20">
<div class="col-md-12  margin_to_20 margin_bottom_20">
<div class="col-md-2" id="addsparebtn" style="cursor:pointer;">

			<img style="margin-bottom: 5px;"src="https://materialwala.com/buildsand/site_assets/newapp/spare_add.png" /><span style="    margin: 2px;">Add Spares</span>
</div>
<div class="col-md-9" style="    border-top: 1px solid #333;
    margin-top: 10px;"> 
</div>
<div class="col-md-1"  id="btn" style="cursor:pointer;">

			<img src="https://materialwala.com/buildsand/site_assets/newapp/spare-settings.png" style="    float: right;"/>
</div>
</div>
<div class="col-md-12  margin_to_20 margin_bottom_20" id="addspares" style="display:none;">
<div class="modal-content" style="border-radius: 20px;height: 50vh;">
      <div style="background:#d2d6df;padding:10px;border-top-left-radius: 20px;border-top-right-radius: 20px;">
	  <button type="button" class="close spares_close" >&times;</button>
        <h5 class="modal-title" id="staticBackdropLiveLabel" >Add Spares</h5> 
      </div>
<div class="col-md-12"  style="font-size: 13px;    margin-top: 20px;">
 
 <div class="col-md-4">
	
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img  class="fa_images" src="https://materialwala.com/buildsand/site_assets/newapp/owner_1.png"   /></div>
	<div class="col-md-9"><span><b>Spare Category</b></span><br>
	<select class="form-control" id="sp_cat">
	<option value="">Select</option>
	 @foreach ($sparecategory as $sc)
	 <option  value="{{ $sc->spare_category }}">{{ $sc->spare_category }}</option> 
	@endforeach
	</select>
	</div></div>
  
  </div>
  <div class="col-md-4">
 
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img   class="fa_images"  src="https://materialwala.com/buildsand/site_assets/newapp/Owner_contact_2.png" /></div><div class="col-md-9"><span><b>Spare Type</b></span><br>
	<select class="form-control sptypediv" id="sp_type" >
	 
 
	</select>
	 </div></div>
 
  
  </div>
  <div class="col-md-4">
	 
	<div class="col-md-12" >	<div class="col-md-3"><img  class="fa_images"  src="https://materialwala.com/buildsand/site_assets/newapp/Vendor_contract_3.png" /></div><div class="col-md-9"><span><b>Sparepart ID</b></span><br><input type="text"  id="sp_id" style="width: 15vh;    height: 3.5vh;"  class="form-control"/></div></div>
  </div>
  
   



</div>

<div class="col-md-12  " style="font-size: 13px;">
  
  <div class="col-md-4">
	
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img  class="fa_images" src="https://materialwala.com/buildsand/site_assets/newapp/Vendormail_4.png" /></div><div class="col-md-9"><span><b>Quantity</b></span><br><input class="form-control"  id="sp_quantity" type="text" style="width: 15vh;    height: 3.5vh;" class="form-control"/></div></div>
  
  </div>
  <div class="col-md-4">
 
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img class="fa_images" src="https://materialwala.com/buildsand/site_assets/newapp/Vendor_Contract_5.png" /> </div><div class="col-md-9"><span><b>Brand</b></span><br><input type="text"  id="sp_brand" style="width: 15vh;    height: 3.5vh;"  class="form-control"/></div></div>
 
  
  </div>
  <div class="col-md-4">
	 
	<div class="col-md-12">	<div class="col-md-3"><img  class="fa_images"  src="https://materialwala.com/buildsand/site_assets/newapp/Owner_contact_2.png" /></div><div class="col-md-9"><span><b>Year</b></span><br><input type="text"  id="sp_year"  style="width: 15vh;    height: 3.5vh;"  class="form-control"/>  </div></div>
  </div>
  
   



</div>



<div class="col-md-12  margin_to_20 margin_bottom_20">
   <h5 class="modal-title" id="staticBackdropLiveLabel" >Purchased From</h5>  
 <div class="modal-content" style="border-radius: 20px;">
  
      <div   style="margin-top: 15px;    margin-bottom: 75px;font-size:13px;">
	  <div class="col-md-12">
		   
			<div class="col-md-3"><b>Procurement No</b><div  class=" "><input type="text"   id="sp_pre_no" style="width:20vh;  height: 3.5vh;" class="form-control"/></div></div>
			<div class="col-md-2"  ><b>Vendor Name</b><div  class=" "><input type="text"   id="sp_v_name" style="width:10vh;  height: 3.5vh;" class="form-control"/></div></div>
			<div class="col-md-2"  ><b>Ph-No</b><div  class=" "><input type="text" id="sp_phone"  style="width:10vh;  height: 3.5vh;"  class="form-control"/></div></div>
			<div class="col-md-2"  ><b>Email ID</b><br><div  class=" "><input type="text" id="sp_email"  style="width:10vh;  height: 3.5vh;" class="form-control"/></div></div>
			<div class="col-md-1"><b>City</b><div  class=" "><input type="text"  id="sp_city" style="width:8vh;  height: 3.5vh;"  class="form-control"/></div></div>
			<div class="col-md-2"><b>Comments</b><div  class=" "><input type="text" id="sp_comments"  style="width:15vh;  height: 3.5vh;"  class="form-control"/></div></div>
		
		</div>
		 
      </div> 
    </div>
<div class="col-md-12  margin_to_20 margin_bottom_20"  style="text-align:center;">
<button type="button" id="addsparepart" class="btn btn-primary">Submit</button>


</div>
</div>
   
</div>
</div>
<div class="col-md-12  margin_to_20 margin_bottom_20" id="listspares" style="height: 40vh;">
  
  <div class="blue block">
       <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
 
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header"  style="height:7vh;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Master Data</h4>
          </div>
          <div class="modal-body" style="height:12vh;">
            <div class="col-md-5">
				<div style="float:left;    margin: 5px;"><img style="    width: 35px;    height: 35px; " src="https://materialwala.com/buildsand/site_assets/newapp/spare_ico1.png" /></div>
				<div  >Spare Category<input type="text" id="sparecategory" />
				</div>
			</div>
            <div class="col-md-5">
				<div style="float:left;    margin: 5px;"><img style="    width: 35px;    height: 35px; " src="https://materialwala.com/buildsand/site_assets/newapp/spare_ico1.png" /></div>
				<div  >Spare Type<input type="text" id="sparetype" />
				</div>
			</div>
			 <div class="col-md-2" style="    margin-top: 10px;">
			 <button type="button" id="mastercategory" class="btn">Add</button>
			 </div>
			 
          </div> 
        </div>
 
      </div>
    </div>
 </div>
<table id="example1" class="table  table-striped" style="box-shadow: 0 2px 4px 0 rgba(181,181,181,.7);">
              <thead>
              
				<tr class="table_header"><td>S.No</td> 
			 <td>S-Category</td> 
			 <td>S-Type</td> 
			 <td>S-ID</td>
			 <td>S-Brand</td>   
			 <td>Action</td></tr>
              </thead>
              <tbody>
			 @if($spares)
				 @foreach ($spares as $s)
			  <tr>
			   <td>{{$loop->iteration}}</td>
			  <td>{{$s->spare_category}}</td>
			  <td>{{$s->spare_type}}</td>
			  <td>{{$s->sparepart_id}}</td>  
			  <td>{{$s->brand}}</td> 
			<td><button  class="btn btn-primary viewbtn ">View</button></td>  
			  </tr>
				@endforeach
			 @else
				 <tr><td>No spares</td></tr>
			@endif
              </tbody><tbody>
			  
			  </tbody>
			  
			  </table>
 

</div>

</div>
  </div>
   


 
  
  
  
  </div>
  
 	@php
	$diffdays = $equipment->e_wom;
	 
	$fdate = $equipment->ve_rental_start_date;
	$tdate = $equipment->ve_rental_end_date;
	$datetime1 = strtotime($fdate);
	$datetime2 = strtotime($tdate);
	$days = (int)(($datetime2 - $datetime1)/86400);
	$total_days = count($dprdetails);
	
	$idle = date('d')-count($dprdetails);
	
	if(isset($singleday->start_time)){
		$idle_new = $idle;
	}else{
		$idle_new = $idle-1;
	}
	@endphp
  	
	<?php $percount = 0 ;foreach($dprdetails as $key=>$dpr){  $percount = $percount + $dpr->totalwoh; } ?>
  <?php $idle = array(); $used = array();  $belowrental = array(); $exceededrental = array(); $achievedrental = array(); 
 $diffdays=10;
  $rentalhrs = ceil($diffdays/30);
  for( $i=1; $i<=31; $i++){  foreach($dprdetails as $key=>$dpr){  ?>

<?php  


 $timestamp = strtotime($dpr->date);  ?>


<?php 
if($dpr->totalwoh < 8){ $belowrental[] = date('d',$timestamp); }  
if($dpr->totalwoh > 8){ $exceededrental[] = date('d',$timestamp); }  
if($dpr->totalwoh == 8){ $achievedrental[] = date('d',$timestamp); }  

if(date('d',$timestamp) == $i){  
	    $used[] = date('d',$timestamp);
 }else {  
	$idle[] = $i;
 }

 ?>
 

 

<?php } }    ?> 
<?php $bwrental = array_unique($belowrental); ?>
<?php $exceedrental = array_unique($exceededrental); ?>
<?php $achieverental = array_unique($achievedrental); ?>
  <div class="tab-pane fade" id="dprdetails" role="tabpanel" aria-labelledby="dprdetails">
  
  <div class="col-md-12  margin_to_20 margin_bottom_20">
  <div class="col-md-12   ">
  
  <div class="col-md-5 margin_to_20 margin_bottom_20">
  
  <div class="col-md-3 rental_objective_css nopad">Rental Objective 
  <br> 
  <span class="dollar_8"><?php echo $equipment->e_wom; ?> Hours</span> <span class="days_css"></span></div>
  
  <div class="col-md-3 rental_objective_css nopad">Rental Billing Cycle <br> <span class="dollar_8"><?php echo $equipment->ve_billing_cycle; ?> Days</span> <span class="days_css"></span></div>

  <div class="col-md-3 rental_objective_css nopad">Rental Period <br> <span class="dollar_8"><?php echo $equipment->ve_noofdays; ?></span> <span class="days_css"></span></div>
  <div class="col-md-3 rental_objective_css nopad">Rental Price <br> <span class="dollar_8">Rs <?php echo $equipment->ve_rental_cost; ?></span> </div>
  
  </div>
  <div class="col-md-7  margin_to_20 margin_bottom_20">
  <div class="modal-content" style="border-radius: 20px;height:17vh;">
      <div class="col-md-12" style="background:#dcf1f2;padding:10px;    font-weight: bold;font-size: 0.8em;border-top-left-radius: 20px;border-top-right-radius: 20px;">
        
			<div class="col-md-1"></div>
			<div class="col-md-2">Rental Objective Achieved</b></div>
			<div class="col-md-2">Idle</div>
			<div class="col-md-2">Rental Objective Exceeded</div>
			<div class="col-md-2">Below Rental Objective</div>
			<div class="col-md-2">Total Days</div>
			<div class="col-md-1"></div>
			<!--<div class="col-md-2">Total Bill</div>-->
		</div>
     
      <div style="">
        <div class="col-md-12">
			<div class="col-md-1"><div class="contract_bill"></div></div>
			<div class="col-md-2"><div class="contract_ach"> {{count($achieverental) ?? '-'}} Days</div></div>
			<div class="col-md-2"><div class="contract_idle">{{$idle_new ?? '-'}} Days</div></div>
			<div class="col-md-2"><div class="contract_exce"> {{count($exceedrental) ?? '-'}} Days</div></div>
			<div class="col-md-2"><div class="contract_below"> {{count($bwrental) ?? '-'}} Days</div></div>
			<div class="col-md-2"><div class="contract_exce"> {{$total_days+$idle_new ?? '-'}} Days</div></div>
			<!--<div class="col-md-2"><div class="contract_bill"></div></div>-->
			<div class="col-md-1"><div class="contract_bill"></div></div>
		</div>
		 
      </div> 
    </div>
   
  
  </div>
  </div>
   <?php
  $ve_rental_start_date =  $equipment->ve_rental_start_date;
$date=date_create($ve_rental_start_date);
 $rentalstartdate = date_format($date,"d");
$rentalstartmonth = date_format($date,"F");
$rentalstartmonth1 = date_format($date,"n");
$currentmonth = date('F');
$currentmonth1 = date('n');
 $currentday = date('d');



$ve_rental_end_date =$equipment->ve_rental_end_date;
$enddate = date_create($ve_rental_end_date);
 $rentalenddate = date_format($enddate,"d");

$rentalendmonth = date_format($enddate,"F");
$rentalendmonth1 = date_format($enddate,"n");
 ?>
    <div class="col-md-12 nopad"> 
	<div class="col-md-12" style="margin-bottom:1%">

<div class="col-md-2 nopad">
<div class="col-md-1">
<div class=" tabwidth8 tab5ico" style="background-image: linear-gradient(to right, yellow , yellow 80%);    margin-top: 31%;">	</div></div><div class="col-md-12 side_h5">&nbsp; Rental booking Dates </div>
</div><div class="col-md-2 nopad">
<div class="col-md-1">
<div class=" tabwidth8 tab5ico" style="background-image: linear-gradient(to right, #16a79d , #00dccd 80%);    margin-top: 31%;">	</div></div><div class="col-md-12 side_h5">&nbsp; Rental objective achieved </div>
</div>

<div class="col-md-2 nopad"><div class="col-md-1">
<div class="tabwidth8  tab5ico" style="background-color:#f71d0f; margin-top: 31%;background-image: none;"></div>	
			
			</div ><div class="col-md-11 side_h5">&nbsp; Breakdown</div></div>
			<div class="col-md-2 nopad"><div class="col-md-1">
			<div class=" tabwidth8 tab5ico" style="background-color:#fabc05;background-image: none; margin-top: 31%;">&nbsp;&nbsp;	</div></div><div class="col-md-11 side_h5">&nbsp; Below Rental Objective</div>
</div>
			<div class="col-md-2 nopad"><div class="col-md-1">
			<div class=" tabwidth8 tab5ico" style="background-color: #16817a;background-image: none; margin-top: 31%;">&nbsp;&nbsp;	</div></div><div class="col-md-12 side_h5">&nbsp; Rental Objective Exceeded</div>
</div>

</div>
<div class="col-md-11 nopad"style=" background-color: #dcf1f2; text-align:center;">DPR Details<span style="float:right;">&nbsp; Month: <?php echo $currentmonth; ?></span>

<div class="col-md-12 nopad" style="margin-top: 10px;text-align: center;    border-bottom: 6px solid #dcf1f2;    background: #dcf1f2;">
 

<?php 
$nextbookingdays= array();
$bookingmonths= array();
if($currentmonth == $rentalendmonth){
for($i=$currentday+1; $i<= $rentalenddate; $i++){
					//	echo $i;
						$nextbookingdays[] = $i;
					}
}else{
for($i=$currentday+1; $i<= 31; $i++){
					//	echo $i;
						$nextbookingdays[] = $i;
					}	
}
for($i=$rentalstartmonth1; $i<= $rentalendmonth1; $i++){
//	echo $i;
	$bookingmonths[] = $i;
}

 for( $i=01; $i<=31; $i++){ // foreach($dprdetails as $dpr){  ?>




<?php 

// 
	if(in_array($currentmonth1,$bookingmonths)){
		if($currentmonth== $rentalstartmonth){ 
		
		}else{
			 $rentalstartdate =0;
		}
		if($currentmonth == $rentalendmonth){
					/* for($i=$currentday+1; $i<= $rentalenddate; $i++){
					//	echo $i;
						$nextbookingdays[] = $i;
					} */
		}else{
				/* for($i=$currentday+1; $i<= 31; $i++){
				//	echo $i;
					$nextbookingdays[] = $i;
				} */
			$rentalenddate =31;
		}
		
 /* if($rentalstartdate>$i){ $class="in_class_two"; }else{ if($rentalenddate < $i){ $class="in_class_two"; } else{ if(in_array($i,$achieverental)){ $class="in_class_one";  }else if(in_array($i,$exceedrental)){ $class="in_class_four";  }else{ $class="in_class_idel"; } } } */
  if($rentalstartdate>$i){
		 $class="in_class_two"; 
		 }else{ if($rentalenddate < $i){
					$class="in_class_two"; 
					}else{
							if(in_array($i,$nextbookingdays)){
								$class="in_class_start"; 
							}else if(in_array($i,$bwrental)){ 
							$class="in_class_three";   
							}else if(in_array($i,$achieverental)){
								$class="in_class_one";  
							}else if(in_array($i,$exceedrental)){
								 $class="in_class_four"; 
							}else{
									 $class="in_class_idel"; 
								} 
						 } 
		 }
		
		/* 
		else if($currentmonth == $rentalendmonth){
	
	 if($rentalstartdate>$i){
		 $class="in_class_two"; 
		 }else{ if($rentalenddate < $i){
					$class="in_class_two"; 
					}else{
							if(in_array($i,$nextbookingdays)){
								$class="in_class_start"; 
							}else if(in_array($i,$achieverental)){
								$class="in_class_one";  
							}else if(in_array($i,$exceedrental)){
								 $class="in_class_four"; 
							}else{
									 $class="in_class_idel"; 
								} 
						 } 
			}
		} */
 }else{
	 $class="in_class_two";
 }
/*  if($i == $rentalstartdate){  $class="in_class_start"; }else if(in_array($i,$achieverental)){ $class="in_class_one";  }else if(in_array($i,$exceedrental)){ $class="in_class_four";   }else if(in_array($i,$bwrental)){ $class="in_class_three";   }else if(in_array($i,$used)){   $class="in_loopClass"; }else if($i >= date('d')){   $class="in_loopClass"; }else{ $class="in_class_two";  } */ //}  ?>





<span class="<?php echo $class; ?>" ><?php if($i<10){echo 0; } echo $i; ?></span>

<?php }// } ?>
</div> 



</div>  
<?php if(count($dprdetails) != 0){ $per = $percount/count($dprdetails). '%';}//$per =  number_format( $per * 100, 2 ) . '%'; ?>
<!--<div class="col-md-1" ><span class="right_side_border" style="font-weight: bold;width: 100%;     text-align: center;    display: inline-block;    padding: 5px;margin-top: 30px;">{{$per ?? '-'}} </span></div>-->



</div>
<style>
.disabled{
	pointer-events: none;
    background-color: #eee !important;
    opacity: 0.7;
}.bootstrap-timepicker-widget table td input {
    width: 30px !important;
}
</style> 

<div class="col-md-12 margin_to_20 margin_bottom_20"><div class="col-md-10"><b>Daily Log Sheet</b></div><div class="col-md-2" style="float:right;color: rgba(79,74,194,1);"><u>OverAll Log Sheet</u></div> </div> 


<div class="col-md-12">
<?php 

// 
	if(in_array($currentmonth1,$bookingmonths)){
		if($currentmonth== $rentalstartmonth){ 
		if($currentday >= $rentalstartdate){ 
		
	?>

<table id="example1" class="table  table-striped" style="font-size: 12px;box-shadow: 0 2px 4px 0 rgba(181,181,181,.7);">
              <thead>
              
				<tr class="table_header">
				
				<td>Date</td> 
			 <td>UOM</td> 
			 <td>Shift</td> 
			 <td>Actual WOH</td>
			 <td>Start Time</td> 
			 <td>Start Reading</td> 
			 <td>End Reading</td> 
			 <td>End Time</td> 
			 <td>Total WOH</td>
			 <td>Fuel</td>
			 <td>No. Of Ltrs</td>
			 <td>Fueled Reading</td>
			<!-- <td>Field Supervisor</td>-->
			 <td>Operator</td>
			 <td>View Log Sheet</td>
			 <td>Action</td>
			 
			 
			 </tr>
              </thead>
              <tbody>
			  
			  
			  <?php foreach($dprdetails as $dpr){ 
			  $timestamp = strtotime($dpr->date);   
 
			  
			  ?>
			  <?php //if(in_array(date('d',$timestamp),$achieverental)){ $class="in_class_one"; $tdclass="tdone"; }else if(in_array(date('d',$timestamp),$exceedrental)){ $class="in_class_four"; $tdclass="tdfour"; }else if(in_array(date('d',$timestamp),$bwrental)){ $class="in_class_three"; $tdclass="tdthree"; }else if(in_array(date('d',$timestamp),$used)){   $class="in_loopClass"; }else if(date('d',$timestamp) >= date('d')){   $class="in_loopClass"; }else{  $tdclass="in_class_two"; } ?>
			  <tr>
			  <td class="<?php // echo $tdclass; ?>" style="font-weight:bold;width: 6.5%;"><?php echo $dpr->date; ?></td>   
			  <td>Kms</td>
			  <td>Day</td>
			  <td>8 Hrs</td>
			  <td><input type="hidden" onkeypress="return isNumberKey(this, event);" class="form-control textbox" value="<?php echo $dpr->start_time; ?>"  id="starttime_new<?php echo $dpr->dpr_id; ?>"><?php echo $dpr->start_time; ?></td>
			  <td><?php echo $dpr->start_reading; ?></td> 
			  
			  <?php if(isset($singleday)){ 
			  if($dpr->date == $singleday->date){ ?>
				<?php if($dpr->end_time){ ?>
					<td><?php echo $dpr->end_reading; ?></td> 
			
				<?php } else { ?>
				<td><input type="text" onkeypress="return isNumberKey(this, event);" class="form-control textbox" id="endreading_new<?php echo $dpr->dpr_id; ?>"></td>
				<?php } ?>
			  <?php }else{ ?>
			  <td><?php echo $dpr->end_reading; ?></td> 
			  <?php } }else{ ?> 
			   <td><?php echo $dpr->end_reading; ?></td> 
			  <?php } ?>
			 

			 <?php if(isset($singleday)){ if($dpr->date == $singleday->date){?>
				<?php if($dpr->end_time){ ?>
					<td><?php echo $dpr->end_time; ?></td> 
			
				<?php } else{ ?>
				<td>
				<div  class="input-group bootstrap-timepicker timepicker" style="display: block;">
					<input readonly="" style="width: 60%;" id="endtime_new<?php echo $dpr->dpr_id; ?>" class="form-control timepickernew input-small" type="text"><span class="form-control input-group-addon" style="width: 25%;"><i class="glyphicon glyphicon-time"></i></span>
					</div> 
				</td>
				<?php } ?>
			  <?php }else{ ?>
			  <td><?php echo $dpr->end_time; ?></td> 
			  <?php } }else{ ?> 
			  <td> <?php echo $dpr->end_time; ?></td> 
			  <?php } ?>
			  
			   
			  <td style="font-weight:bold;    text-align: center;"><?php if($dpr->totalwoh){ ?><?php echo $dpr->totalwoh; ?><?php } else{ ?><span id="total_working<?php echo $dpr->dpr_id; ?>">-</span><?php } ?></td> 
			  <td><?php echo $dpr->fuel; ?></td> 
			  <td><?php echo $dpr->litres; ?></td> 
			  <td><?php echo $dpr->fuel_reading; ?></td>  
			  <td></td>
			   <td><?php //echo   auth()->user()->name;?></td>
			  <td>
			  <?php if($dpr->logsheet_morning){ ?>
			 <a href="{{url('/images')}}/{{ $dpr->logsheet_morning }}" target="_blank">1 Logsheet</a>
			  <?php if($dpr->logsheet_evening){
?>
 <a href="{{url('/images')}}/{{ $dpr->logsheet_evening }}" target="_blank">2 Logsheet</a>
<?php 
				  }else{ ?>
			  <form action="{{ url('/vendorequipment/uploadlogsheetevening') }}" method="post" enctype="multipart/form-data">
					@csrf
					<input type="file" onchange="this.form.submit()" name="logsheetevening"/>
					<input type="hidden" name="dpr_id" value="<?php echo $dpr->dpr_id; ?>">
					<input type="hidden" name="equipment_id" value="{{ Request::segment(3) }}">
			</form>
			  <?php } }else{ ?>
				  <form action="{{ url('/vendorequipment/uploadlogsheet') }}" method="post" enctype="multipart/form-data">
					@csrf
					<input type="file" onchange="this.form.submit()" name="logsheetmorning"/>
					<input type="hidden" name="dpr_id" value="<?php echo $dpr->dpr_id; ?>">
					<input type="hidden" name="equipment_id" value="{{ Request::segment(3) }}">
			</form>
				  
			  <?php }?>
			  </td>
			   <?php if(isset($singleday)){ if($dpr->date == $singleday->date){ ?>
			   <?php if($dpr->end_time){ ?>
					<td>-</td>
			
				<?php } else{ ?>
				
				 <td><button   class="view_css_new  "  onclick="updatedetailnew(<?php echo $dpr->dpr_id; ?>)" style="font-size: 1.3em;background: linear-gradient( 95deg , rgba(79,74,194,1) 23%, rgba(151,83,175,1) 100%);    color: #fff;" style="">Update</button> </td>
				<?php } ?>
			  <?php }else{ ?>
			   <td>-</td>
			  <?php } }else{ ?> 
			  <td>-</td>
			  <?php } ?>
			  </tr>
			  <?php } ?>
			  
			  
			  
			  <?php $i = date('d'); ?>
			   <style>
			  #end_time_hide-<?php echo $i; ?>, #end_reading_hide-<?php echo $i; ?>, #start_reading_hide-<?php echo $i; ?>, #start_time_hide-<?php echo $i; ?>, #no_of_litter_hide-<?php echo $i; ?>,#fueled_hide-<?php echo $i; ?>{
				  display:none;
			  }
			  </style>
			  <tr <?php if(isset($singleday)){?>style="display:none;"<?php } ?>>
			  <td style="font-weight:bold;width: 6.5%;"><?php  echo date('Y'); ?>-<?php echo date('m'); ?>-<?php echo $i; ?></td>   
			  <td>Kms</td>
			  <td>Day</td>
			  <td>8 Hrs</td>
			  <td> 
					<div id="start_time_hide-<?php echo $i; ?>"   class="input-group bootstrap-timepicker timepicker">
					<input readonly style="width: 60%;"  id="starttime<?php echo $i; ?>" class="form-control timepickernew input-small" type="text" ><span class="form-control input-group-addon" style="width: 25%;"><i class="glyphicon glyphicon-time"></i></span>
					</div>

					<span id="start_time_show-<?php echo $i; ?>">-</span>
			   
			   </td>
			  <td >
			  
			  <span  ><input type="text" onkeypress="return isNumberKey(this, event);" class="form-control textbox"  id="start_reading_hide-<?php echo $i; ?>"></span><span id="start_reading_show-<?php echo $i; ?>">-</span>
			  
			  </td>
			   
			  <td>
			  
			  <span ><input type="text" onkeypress="return isNumberKey(this, event);" class="form-control textbox" id="end_reading_hide-<?php echo $i; ?>"></span><span id="end_reading_show-<?php echo $i; ?>" >-</span>
			  
			  </td>
			 
			  <td > 
			  
			    <div id="end_time_hide-<?php echo $i; ?>"   class="input-group bootstrap-timepicker timepicker">
					<input style="width: 60%;"   readonly id="endtime<?php echo $i; ?>" class="form-control timepickernew input-small" type="text" ><span class="form-control input-group-addon" style="width: 25%;"><i class="glyphicon glyphicon-time"></i></span>
				</div>
			  <span  id="end_time_show-<?php echo $i; ?>">-</span>
			  
			  
			  </td>
			
			   <td style="font-weight:bold; text-align: center;"><span id="total_working<?php echo $i; ?>">-</span></td>
			   <td><select id="mySelect<?php echo $i; ?>" onchange="myFunction1(<?php echo $i; ?>)">
			   <option>NA</option>
			   <option value="yes">Yes</option>
			   </select></td>
			  <td  ><span ><input type="text"  onkeypress="return isNumberKey(this, event);" class="form-control textbox" id="no_of_litter_hide-<?php echo $i; ?>"></span><span id="no_of_litter_show-<?php echo $i; ?>" >-</span></td>
			 
			  <td ><span ><input type="text" onkeypress="return isNumberKey(this, event);" class="form-control textbox"  id="fueled_hide-<?php echo $i; ?>"></span><span  id="fueled_show-<?php echo $i; ?>">-</span></td>
			    
			    <td>Srinu - 123456</td>
			    <td>-</td>
			    <td>
				
				<i  style="font-size: 1.7em; <?php  if( date('d') != $i ){ ?>color:  #999;<?php } ?>" class="showall fa fa-plus-circle hidebutton<?php echo $i; ?>" aria-hidden="true" onclick="myFunction(<?php echo $i; ?>)"></i>
				 <button   class="view_css_new hideall showbutton<?php echo $i; ?>"  onclick="savedetailnew(<?php echo $i; ?>)" style="font-size: 1.3em;display:none;    background: linear-gradient( 95deg , rgba(79,74,194,1) 23%, rgba(151,83,175,1) 100%);    color: #fff;" style="">Save</button> 
				</td>
			  </tr>  
              </tbody><tbody>
			  
			  </tbody>
			  
			  </table>
  
	<?php } }else{ 
	
	
	?>
	
<table id="example1" class="table  table-striped" style="font-size: 12px;box-shadow: 0 2px 4px 0 rgba(181,181,181,.7);">
              <thead>
              
				<tr class="table_header">
				
				<td>Date</td> 
			 <td>UOM</td> 
			 <td>Shift</td> 
			 <td>Actual WOH</td>
			 <td>Start Time</td> 
			 <td>Start Reading</td> 
			 <td>End Reading</td> 
			 <td>End Time</td> 
			 <td>Total WOH</td>
			 <td>Fuel</td>
			 <td>No. Of Ltrs</td>
			 <td>Fueled Reading</td>
			 <!--<td>Field Supervisor</td>-->
			 <td>Operator</td>
			 <td>View Log Sheet</td>
			 <td>Action</td>
			 
			 
			 </tr>
              </thead>
              <tbody>
			  
			  
			  <?php foreach($dprdetails as $dpr){ 
			  $timestamp = strtotime($dpr->date);   
 
			  
			  ?>
			  <?php //if(in_array(date('d',$timestamp),$achieverental)){ $class="in_class_one"; $tdclass="tdone"; }else if(in_array(date('d',$timestamp),$exceedrental)){ $class="in_class_four"; $tdclass="tdfour"; }else if(in_array(date('d',$timestamp),$bwrental)){ $class="in_class_three"; $tdclass="tdthree"; }else if(in_array(date('d',$timestamp),$used)){   $class="in_loopClass"; }else if(date('d',$timestamp) >= date('d')){   $class="in_loopClass"; }else{  $tdclass="in_class_two"; } ?>
			  <tr>
			  <td class="<?php // echo $tdclass; ?>" style="font-weight:bold;width: 6.5%;"><?php echo $dpr->date; ?></td>   
			  <td>Kms</td>
			  <td>Day</td>
			  <td>8 Hrs</td>
			  <td><input type="hidden" onkeypress="return isNumberKey(this, event);" class="form-control textbox" value="<?php echo $dpr->start_time; ?>"  id="starttime_new<?php echo $dpr->dpr_id; ?>"><?php echo $dpr->start_time; ?></td>
			  <td><?php echo $dpr->start_reading; ?></td> 
			  
			  <?php if(isset($singleday)){ 
			  if($dpr->date == $singleday->date){ ?>
				<?php if($dpr->end_time){ ?>
					<td><?php echo $dpr->end_reading; ?></td> 
			
				<?php } else { ?>
				<td><input type="text" onkeypress="return isNumberKey(this, event);" class="form-control textbox" id="endreading_new<?php echo $dpr->dpr_id; ?>"></td>
				<?php } ?>
			  <?php }else{ ?>
			  <td><?php echo $dpr->end_reading; ?></td> 
			  <?php } }else{ ?> 
			   <td><?php echo $dpr->end_reading; ?></td> 
			  <?php } ?>
			 

			 <?php if(isset($singleday)){ if($dpr->date == $singleday->date){?>
				<?php if($dpr->end_time){ ?>
					<td><?php echo $dpr->end_time; ?></td> 
			
				<?php } else{ ?>
				<td>
				<div  class="input-group bootstrap-timepicker timepicker" style="display: block;">
					<input readonly="" style="width: 60%;" id="endtime_new<?php echo $dpr->dpr_id; ?>" class="form-control timepickernew input-small" type="text"><span class="form-control input-group-addon" style="width: 25%;"><i class="glyphicon glyphicon-time"></i></span>
					</div> 
				</td>
				<?php } ?>
			  <?php }else{ ?>
			  <td><?php echo $dpr->end_time; ?></td> 
			  <?php } }else{ ?> 
			  <td> <?php echo $dpr->end_time; ?></td> 
			  <?php } ?>
			  
			   
			  <td style="font-weight:bold;    text-align: center;"><?php if($dpr->totalwoh){ ?><?php echo $dpr->totalwoh; ?><?php } else{ ?><span id="total_working<?php echo $dpr->dpr_id; ?>">-</span><?php } ?></td> 
			  <td><?php echo $dpr->fuel; ?></td> 
			  <td><?php echo $dpr->litres; ?></td> 
			  <td><?php echo $dpr->fuel_reading; ?></td>  
			  <td></td>
			   <td><?php //echo   auth()->user()->name;?></td>
			  <td>
			  <?php if($dpr->logsheet_morning){ ?>
			 <a href="{{url('/images')}}/{{ $dpr->logsheet_morning }}" target="_blank">1 Logsheet</a>
			  <?php if($dpr->logsheet_evening){
?>
 <a href="{{url('/images')}}/{{ $dpr->logsheet_evening }}" target="_blank">2 Logsheet</a>
<?php 
				  }else{ ?>
			  <form action="{{ url('/vendorequipment/uploadlogsheetevening') }}" method="post" enctype="multipart/form-data">
					@csrf
					<input type="file" onchange="this.form.submit()" name="logsheetevening"/>
					<input type="hidden" name="dpr_id" value="<?php echo $dpr->dpr_id; ?>">
					<input type="hidden" name="equipment_id" value="{{ Request::segment(3) }}">
			</form>
			  <?php } }else{ ?>
				  <form action="{{ url('/vendorequipment/uploadlogsheet') }}" method="post" enctype="multipart/form-data">
					@csrf
					<input type="file" onchange="this.form.submit()" name="logsheetmorning"/>
					<input type="hidden" name="dpr_id" value="<?php echo $dpr->dpr_id; ?>">
					<input type="hidden" name="equipment_id" value="{{ Request::segment(3) }}">
			</form>
				  
			  <?php }?>
			  </td>
			   <?php if(isset($singleday)){ if($dpr->date == $singleday->date){ ?>
			   <?php if($dpr->end_time){ ?>
					<td>-</td>
			
				<?php } else{ ?>
				
				 <td><button   class="view_css_new  "  onclick="updatedetailnew(<?php echo $dpr->dpr_id; ?>)" style="font-size: 1.3em;background: linear-gradient( 95deg , rgba(79,74,194,1) 23%, rgba(151,83,175,1) 100%);    color: #fff;" style="">Update</button> </td>
				<?php } ?>
			  <?php }else{ ?>
			   <td>-</td>
			  <?php } }else{ ?> 
			  <td>-</td>
			  <?php } ?>
			  </tr>
			  <?php } ?>
			  
			  
			  
			  <?php
			  $i = date('d'); ?>
			   <style>
			  #end_time_hide-<?php echo $i; ?>, #end_reading_hide-<?php echo $i; ?>, #start_reading_hide-<?php echo $i; ?>, #start_time_hide-<?php echo $i; ?>, #no_of_litter_hide-<?php echo $i; ?>,#fueled_hide-<?php echo $i; ?>{
				  display:none;
			  }
			  </style>
			  		  
			  <?php
if($currentmonth== $rentalendmonth){ 
		if($currentday <= $rentalenddate){  ?>
			  <tr <?php if(isset($singleday)){?>style="display:none;"<?php } ?>>
			  <td style="font-weight:bold;width: 6.5%;"><?php  echo date('Y'); ?>-<?php echo date('m'); ?>-<?php echo $i; ?></td>   
			  <td>Kms</td>
			  <td>Day</td>
			  <td>8 Hrs</td>
			  <td> 
					<div id="start_time_hide-<?php echo $i; ?>"   class="input-group bootstrap-timepicker timepicker">
					<input readonly style="width: 60%;"  id="starttime<?php echo $i; ?>" class="form-control timepickernew input-small" type="text" ><span class="form-control input-group-addon" style="width: 25%;"><i class="glyphicon glyphicon-time"></i></span>
					</div>

					<span id="start_time_show-<?php echo $i; ?>">-</span>
			   
			   </td>
			  <td >
			  
			  <span  ><input type="text" onkeypress="return isNumberKey(this, event);" class="form-control textbox"  id="start_reading_hide-<?php echo $i; ?>"></span><span id="start_reading_show-<?php echo $i; ?>">-</span>
			  
			  </td>
			   
			  <td>
			  
			  <span ><input type="text" onkeypress="return isNumberKey(this, event);" class="form-control textbox" id="end_reading_hide-<?php echo $i; ?>"></span><span id="end_reading_show-<?php echo $i; ?>" >-</span>
			  
			  </td>
			 
			  <td > 
			  
			    <div id="end_time_hide-<?php echo $i; ?>"   class="input-group bootstrap-timepicker timepicker">
					<input style="width: 60%;"   readonly id="endtime<?php echo $i; ?>" class="form-control timepickernew input-small" type="text" ><span class="form-control input-group-addon" style="width: 25%;"><i class="glyphicon glyphicon-time"></i></span>
				</div>
			  <span  id="end_time_show-<?php echo $i; ?>">-</span>
			  
			  
			  </td>
			
			   <td style="font-weight:bold; text-align: center;"><span id="total_working<?php echo $i; ?>">-</span></td>
			   <td><select id="mySelect<?php echo $i; ?>" onchange="myFunction1(<?php echo $i; ?>)">
			   <option>NA</option>
			   <option value="yes">Yes</option>
			   </select></td>
			  <td  ><span ><input type="text"  onkeypress="return isNumberKey(this, event);" class="form-control textbox" id="no_of_litter_hide-<?php echo $i; ?>"></span><span id="no_of_litter_show-<?php echo $i; ?>" >-</span></td>
			 
			  <td ><span ><input type="text" onkeypress="return isNumberKey(this, event);" class="form-control textbox"  id="fueled_hide-<?php echo $i; ?>"></span><span  id="fueled_show-<?php echo $i; ?>">-</span></td>
			   
			    <td>Srinu - 123456</td>
			    <td>-</td>
			    <td>
				
				<i  style="font-size: 1.7em; <?php  if( date('d') != $i ){ ?>color:  #999;<?php } ?>" class="showall fa fa-plus-circle hidebutton<?php echo $i; ?>" aria-hidden="true" onclick="myFunction(<?php echo $i; ?>)"></i>
				 <button   class="view_css_new hideall showbutton<?php echo $i; ?>"  onclick="savedetailnew(<?php echo $i; ?>)" style="font-size: 1.3em;display:none;    background: linear-gradient( 95deg , rgba(79,74,194,1) 23%, rgba(151,83,175,1) 100%);    color: #fff;" style="">Save</button> 
				</td>
</tr><?php } }else{ ?> 
 <tr <?php if(isset($singleday)){?>style="display:none;"<?php } ?>>
			  <td style="font-weight:bold;width: 6.5%;"><?php  echo date('Y'); ?>-<?php echo date('m'); ?>-<?php echo $i; ?></td>   
			  <td>Kms</td>
			  <td>Day</td>
			  <td>8 Hrs</td>
			  <td> 
					<div id="start_time_hide-<?php echo $i; ?>"   class="input-group bootstrap-timepicker timepicker">
					<input readonly style="width: 60%;"  id="starttime<?php echo $i; ?>" class="form-control timepickernew input-small" type="text" ><span class="form-control input-group-addon" style="width: 25%;"><i class="glyphicon glyphicon-time"></i></span>
					</div>

					<span id="start_time_show-<?php echo $i; ?>">-</span>
			   
			   </td>
			  <td >
			  
			  <span  ><input type="text" onkeypress="return isNumberKey(this, event);" class="form-control textbox"  id="start_reading_hide-<?php echo $i; ?>"></span><span id="start_reading_show-<?php echo $i; ?>">-</span>
			  
			  </td>
			   
			  <td>
			  
			  <span ><input type="text" onkeypress="return isNumberKey(this, event);" class="form-control textbox" id="end_reading_hide-<?php echo $i; ?>"></span><span id="end_reading_show-<?php echo $i; ?>" >-</span>
			  
			  </td>
			 
			  <td > 
			  
			    <div id="end_time_hide-<?php echo $i; ?>"   class="input-group bootstrap-timepicker timepicker">
					<input style="width: 60%;"   readonly id="endtime<?php echo $i; ?>" class="form-control timepickernew input-small" type="text" ><span class="form-control input-group-addon" style="width: 25%;"><i class="glyphicon glyphicon-time"></i></span>
				</div>
			  <span  id="end_time_show-<?php echo $i; ?>">-</span>
			  
			  
			  </td>
			
			   <td style="font-weight:bold; text-align: center;"><span id="total_working<?php echo $i; ?>">-</span></td>
			   <td><select id="mySelect<?php echo $i; ?>" onchange="myFunction1(<?php echo $i; ?>)">
			   <option>NA</option>
			   <option value="yes">Yes</option>
			   </select></td>
			  <td  ><span ><input type="text"  onkeypress="return isNumberKey(this, event);" class="form-control textbox" id="no_of_litter_hide-<?php echo $i; ?>"></span><span id="no_of_litter_show-<?php echo $i; ?>" >-</span></td>
			 
			  <td ><span ><input type="text" onkeypress="return isNumberKey(this, event);" class="form-control textbox"  id="fueled_hide-<?php echo $i; ?>"></span><span  id="fueled_show-<?php echo $i; ?>">-</span></td>
			   
			    <td>Srinu - 123456</td>
			    <td>-</td>
			    <td>
				
				<i  style="font-size: 1.7em; <?php  if( date('d') != $i ){ ?>color:  #999;<?php } ?>" class="showall fa fa-plus-circle hidebutton<?php echo $i; ?>" aria-hidden="true" onclick="myFunction(<?php echo $i; ?>)"></i>
				 <button   class="view_css_new hideall showbutton<?php echo $i; ?>"  onclick="savedetailnew(<?php echo $i; ?>)" style="font-size: 1.3em;display:none;    background: linear-gradient( 95deg , rgba(79,74,194,1) 23%, rgba(151,83,175,1) 100%);    color: #fff;" style="">Save</button> 
				</td>
</tr>
<?php } ?> 
              </tbody><tbody>
			  
			  </tbody>
			  
			  </table>
	<?php   } } ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>  


<script>
$('.timepickernew').timepicker();
$('.timepickernew').val('');
            
</script>
  

<script>
$("#share_doc").click(function(){
    var checked = $("input:checked").length > 0;
    if (!checked){
        alert("Please check at least one checkbox");
        return false;
    }else{
	//	alert(1);
		$('#exampleModal').modal('show');
	}
});
</script>

			  <script>
			  
function savedetailnew(dpr_id){
	/* $('#myModal1234').modal('show');
	 */
	 $("#clickvalue1").val(dpr_id);
	alert("are you sure want to submit this form.");
	savedetail();
}
function successmessage(){
	location.reload();
}
function myFunction1(id) {
	var lengthid = id.toString().length;
	if(lengthid == 1){
		id='0'+id;
	}else{ 
		id=id;
	}	
  var x = document.getElementById("mySelect"+id).value;
  if(x==="yes"){
	$("#no_of_litter_show-"+id).css("display","none");
  $("#no_of_litter_hide-"+id).css("display","block");
  
  $("#fueled_show-"+id).css("display","none");
  $("#fueled_hide-"+id).css("display","block");
  }
}
</script>
		<script type="text/javascript">
    function isNumberKey(txt, evt) {
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode == 46) {
        //Check if the text already contains the . character
        if (txt.value.indexOf('.') === -1) {
          return true;
        } else {
          return false;
        }
      } else {
        if (charCode > 31 &&
          (charCode < 48 || charCode > 57))
          return false;
      }
      return true;
    }
  </script>	  
 <script>
function myFunction(id) {
	var lengthid = id.toString().length;
	if(lengthid == 1){
		id='0'+id;
	}else{ 
		id=id;
	}
	 
	$(".showall").show();
	$(".hideall").hide();
	$(".hidebutton"+id).hide();
	$('.showbutton'+id).show();
	$("#start_time_show-"+id).focus();
	$("#start_time_show-"+id).css("display","none");
	$("#start_time_hide-"+id).css("display","block");

	$("#start_reading_show-"+id).css("display","none");
	$("#start_reading_hide-"+id).css("display","block");

	<?php if(isset($singleday)){ ?> 
	 $("#end_reading_show-"+id).css("display","none");
	$("#end_reading_hide-"+id).css("display","block");

	$("#end_time_show-"+id).css("display","none");
	$("#end_time_hide-"+id).css("display","block"); 
	
	<?php  }else{ ?> 
	
	$("#end_reading_show-"+id).css("display","block");
	 $("#end_reading_hide-"+id).css("display","none");

	$("#end_time_show-"+id).css("display","block");
	$("#end_time_hide-"+id).css("display","none"); 
	<?php } ?> 
}



function savedetail(){
	  //  alert("The function called 'function_two' has been called.");

	var id = $("#clickvalue1").val();
	var lengthid = id.toString().length;
	if(lengthid == 1){
		id='0'+id;
	}else{ 
		id=id;
	}
	
var start_time = $("#starttime"+id).val();
var start_reading = $("#start_reading_hide-"+id).val();
var end_reading = $("#end_reading_hide-"+id).val();
var end_time = $("#endtime"+id).val();
var no_of_litter = $("#no_of_litter_hide-"+id).val();
var fueled = $("#fueled_hide-"+id).val();
var x = document.getElementById("mySelect"+id).value;
	 
	 
	 
	 
	 
    if(x==="yes"){
	  if(no_of_litter==""){
		 alert("required No. Of Ltrs");
	  }
	  if(fueled == ""){
		 alert("required Fueled Reading");
		  
	  }
  }
	if(start_time){
		 
		/* var timeStart = new Date("01/01/2007 " + start_time);
		var timeEnd = new Date("01/01/2007 " + end_time);

		var diff = (timeEnd - timeStart) / 60000; //dividing by seconds and milliseconds

		var minutes = diff % 60;
		var hours = (diff - minutes) / 60;      */
		
		 <?php 
		 
		 $eqi =  request()->segment(2);
		 if (is_numeric($eqi)) {
        $equ_id = $eqi;
    }
    else {
        $eqi =  request()->segment(3);
		
        $equ_id = $eqi;
    }
 

		 ?>
		//var total_working = (end_time - start_time);
		//var total_working1 = Math.round(total_working,2);
	//	$("#total_working"+id).html(hours);
		//alert("Are you sure want to proceed ? "); 
		//$('#myModal123').modal('show');
		jQuery.ajax({
	    type: 'POST',
        url:'/equipments/update_dpr',

        data: {
			"_token": "{{ csrf_token() }}",
            id: <?php echo $equ_id; ?>,
			date: id,
			start_time:start_time,
			start_reading:start_reading,
			end_reading:end_reading,
			end_time:end_time,
			no_of_litter:no_of_litter,
			fueled:fueled,
        },
        success: function( data ){
			//$('#myModalsuccess').modal('show');
			location.reload();
		}
			 });
	}else{
		$("#start_time_show-"+id).css("display","none");
		$("#start_time_hide-"+id).css("display","block");

		$("#start_reading_show-"+id).css("display","none");
		$("#start_reading_hide-"+id).css("display","block");

		$("#end_reading_show-"+id).css("display","none");
		$("#end_reading_hide-"+id).css("display","block");

		$("#end_time_show-"+id).css("display","none");
		$("#end_time_hide-"+id).css("display","block"); 
	}  
}


function updatedetailnew(dpr_id){
	//$('#myModal123').modal('show');
	$("#clickvalue").val(dpr_id);
	alert("are you sure want to update?");
	updatedetail();
}
function updatedetail(dpr_id){
	var dpr_id  = $("#clickvalue").val();
	var end_reading = $("#endreading_new"+dpr_id).val();
	var end_time = $("#endtime_new"+dpr_id).val();
	var start_time = $("#starttime_new"+dpr_id).val();
	
	
	 
	
		var timeStart = new Date("01/01/2007 " + start_time);
		var timeEnd = new Date("01/01/2007 " + end_time);

		var diff = (timeEnd - timeStart) / 60000; //dividing by seconds and milliseconds

		var minutes = diff % 60;
		var hours = (diff - minutes) / 60;     
		
		
		//var total_working = (end_time - start_time);
		//var total_working1 = Math.round(total_working,2);
		$("#total_working"+dpr_id).html(hours);
		 
	//alert("Are you sure want to proceed ? "); 
	//$('#myModal123').modal('show');
		jQuery.ajax({
	    type: 'POST',
        url:'/equipments/update_endtime_dpr',

        data: {
			"_token": "{{ csrf_token() }}",
            dpr_id: dpr_id, 
			end_reading:end_reading,
			end_time:end_time,  
			totalwoh:hours,  
        },
        success: function( data ){
				//$('#myModalsuccess').modal('show');
				location.reload();
		}
			 });
}














</script>

</div>

  </div>
  </div>
  <div  class="tab-pane fade" id="dalycheckup" role="tabpanel" aria-labelledby="dalycheckup" >
  <div class="col-md-6" style="padding:2%">
  
  <div class="response"></div>
    <div id='calendar' style="width: 90%;"></div>
  </div>
  <div class="col-md-6">
  <div class="col-md-12  margin_to_20 margin_bottom_20">
  <div class="modal-content" style="border-radius: 20px;height:12vh;">
      <div class="col-md-12" style="background:#dcf1f2;padding:10px;    font-weight: bold;font-size: 0.8em;border-top-left-radius: 20px;border-top-right-radius: 20px;">
        
			<div class="col-md-3">Good</div>
			<div class="col-md-3">Average</div>
			<div class="col-md-3">Critical</div>
			<div class="col-md-3">Total</div>
			
		</div>
     
      <div style="">
        <div class="col-md-12">
		 
			<div class="col-md-3"><div class="contract_ach">{{ $gooddalycheckupscount }} Days</div></div>
			<div class="col-md-3"><div class="contract_exce">{{ $averagedalycheckupscount }} Days</div></div>
			<div class="col-md-3"><div class="contract_idle">{{ $criticaldalycheckupscount }} Days</div></div>
			<div class="col-md-3"><div class="contract_below">30 Days</div></div>
			
		
		</div>
		 
      </div>
		
    </div>
   <hr/>
  <div class="col-md-12" style="padding:2%;    background: #f5f5f5;">	
  

  <?php
 if(empty($equipmentdalycheckups)){
   $araycheck = 0;
}else{
	$araycheck = 1;
}
/*
dd($equipmentdalycheckups); */
// if($araycheck==1){
  ?>
  @if(!$equipmentdalycheckups->isEmpty())
	  
  <?php $equipmentdalycheckups = $equipmentdalycheckups[0]; ?>

	  @else
<?php //}else{ ?>
<form method="post" action="/technicianplanner/adalycheckup" enctype="multipart/form-data" onsubmit="return confirm('Do you really want to submit the form?');">
@csrf  
<?php 
$urlid = Request::segment(2);
if (is_numeric($urlid)) {
?>
<input type="hidden" name="ve_id" value="{{ Request::segment(2) }}">
<?php }else{ ?>
<input type="hidden" name="ve_id" value="{{ Request::segment(3) }}">

<?php } ?>
	  <div class="col-md-12">
	  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 nopad col-form-label">Equipment Status</label>
    <div class="col-sm-6">
      <select class="custom-select form-control" name="equipment_status" >
  <option >Please Select</option>
  <option value="good" >Good</option>
  <option value="average">Average</option>
  <option value="critical" >Critical</option>
</select>
    </div>
  </div>
	  </div> 
	  <div class="col-md-12">
	  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 nopad col-form-label">Comments</label>
    <div class="col-sm-6 nopad">
      <textarea class="custom-select form-control" name="comment" >
 
</textarea>
    </div>
	
  </div>
	  </div>
	  <div class="col-md-12 float-right">
	  
	  <input type="submit" value="Submit" class="btn btn-primary" style=" float: right;margin-top: 4%;">
	
	  </div>
	  </form>
	 <div class="col-md-12">
	    <div class="circular">
    <div class="inner"></div>
    <div class="circle">
      <div class="bar left">
        <div class="progress"></div>
      </div>
      <div class="bar right">
        <div class="progress"></div>
      </div>
    </div>
  </div>
	  </div>
@endif
	  </div>
	 
	  <div class="col-md-12" style="margin-top:10%">
	  <span style="background-color:#2cbd77;padding-left: 1.5%;padding-right: 1.5%;margin-right: 1%;">&nbsp;</span><span style="margin-right: 4%;">Good</span> <span style="background-color:#355646;padding-left: 1.5%;padding-right: 1.5%;margin-right: 1%;">&nbsp;</span><span style="margin-right: 4%;">Average</span>  <span style="background-color:#d72626;padding-left: 1.5%;padding-right: 1.5%;margin-right: 1%;">&nbsp;</span><span style="margin-right: 4%;">Critical</span> 
	  </div>
  </div>
  </div>
  
  </div>
  <div  class="tab-pane fade" id="service" role="tabpanel" aria-labelledby="service" >
  
  <div class="col-sm-12" >
  
	
  
  
	    <?php if(count($servicecheckups) == 0){ $servicecheckups =array(); }else{ $servicecheckups = $servicecheckups[0]; } ?>
	<style>
	#service_details{
	display:block;
}
	</style>
	<h3> Service Details</h3> 
	<div class="col-sm-6" style="margin-top:2%">
	<?php
 $forevery = $equipment->service_details_days;
 $last_serviced_at_date = $equipment->last_serviced_at_date;
$todaydate = date("Y-m-d");
 
 $next_due_date = date('Y-m-d h:i:s', strtotime($last_serviced_at_date. ' +30 days'));
$start = strtotime($todaydate);
$end = strtotime($next_due_date);
 $days_between = ceil(abs($end - $start) / 86400); 
//echo $days_between;  
 if($days_between==0){
	?><h3 class="text-center">Service Now</h3>
<label for="staticEmail" class="col-form-label">Service Status</label>
	 <select class="custom-select form-control" id="service_status" name="service_status" >
  <option >Service</option>
  <option value="pending" <?php if($servicecheckups->service_status=='pending'){ echo "selected"; } ?>>Pending</option>
  <option value="progress" <?php if($servicecheckups->service_status=='progress'){ echo "selected"; } ?>> In Progress</option>
  <option value="completed" <?php if($servicecheckups->service_status=='completed'){ echo "selected"; } ?>>Completed</option>
</select>
	<?php
 }else{
	 if($days_between==1){
	 echo "<p class='text-center' style='text-transform: none;'>Service due in $days_between day</p>";
	 }else{
	 echo "<p class='text-center' style='text-transform: none;'>Service due in $days_between days</p>";	 
	 }
	 }  
	?>
  
</div>

<div class="col-sm-6" style="margin-top:2% ;padding-right:1%;background: #cccccc40;" id="service_details">
 <?php  if($days_between==0){ ?> 
 <form method="post" action="/technicianplanner/servicecheckup" enctype="multipart/form-data" onsubmit="return confirm('Do you really want to submit the form?');">
@csrf  
<?php 
$urlid = Request::segment(2);
if (is_numeric($urlid)) {
?>
<input type="hidden" name="equ_id" id="equ_id_new" value="{{ Request::segment(2) }}">
<?php }else{ ?>
<input type="hidden" name="equ_id" id="equ_id_new" value="{{ Request::segment(3) }}">

<?php } ?>
   <div class="form-group row">
  <!--  <label for="staticEmail" class="col-sm-4 nopad col-form-label">Serviced At</label>
    <div class="col-sm-8 nopad">
	<input type="text" class="form-control" name="serviced_at">
      
    </div>-->
	<div class="form-group  nopad col-md-12">
	<label for="staticEmail" class="col-sm-4 nopad col-form-label"> Serviced at</label>
	
   <div class="col-md-6 nopad"> 
	
    <input type="text" class="form-control" placeholder="" name="serviced_at" style="border-right: none;border-top-right-radius: 0px!important;
    border-bottom-right-radius: 0px;" required="" value="<?php echo $servicecheckups->serviced_at; ?>">  
   
  </div><div class="col-md-2 nopad"> 
  <select class="form-control form_select_fil_2 style_background" readonly name="last_serviced_at_type" style="border-left: none;border-top-left-radius: 0px!important;
    border-bottom-left-radius: 0px;
    padding: 0px;" required="">
  <option value="km" <?php if($equipment->serviced_at_km_hours=="km"){ echo "selected"; } ?>>Km</option>
  <option value="hour" <?php if($equipment->serviced_at_km_hours=="hour"){ echo "selected"; } ?>>Hour</option>
</select>
  </div>
  </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 nopad col-form-label">Serviced Date</label>
    <div class="col-sm-8 nopad">
	<input type="date" class="form-control" name="serviced_date" readonly value="<?php echo $servicecheckups->serviced_date; ?>">
      
    </div>
	
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 nopad col-form-label">Serviced Amount</label>
    <div class="col-sm-8 nopad">
	<input type="text" class="form-control" name="serviced_amount" readonly value="<?php echo $servicecheckups->serviced_amount; ?>">
      
    </div>
	
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 nopad col-form-label">Bill Image</label>
    <div class="col-sm-8 nopad">
	<input type="file" class="form-control" name="serviced_bill_image">
      
    </div>
	
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 nopad col-form-label">Bill Image</label>
    <div class="col-sm-8 nopad">
	<input type="file" class="form-control" name="serviced_parts_image">
      
    </div>
	
  </div>
  <div class="form-group row">
    <input type="submit" value="Submit" class="btn btn-primary" style=" float: right;margin-top: 4%;">
	
  </div>
  </form>
 <?php } ?>
  </div>
   
  <?php //dd(); ?>
	
	<table class="table table-bordered">
	 <caption style="text-align:center;">Service records</caption>
<tr style="background-color:#eaeef7;">
<th>
S NO
</th>
<th>
 service status
</th>
<th>
 serviced at 
</th>
<th>
serviced date
</th>

<th>
serviced amount
</th>

<th>
Bill
</th>
<th>
Action
</th>
</tr>
<?php if($servicecheckupsdata){ ?>
@foreach($servicecheckupsdata as $servicecheckups_data)
<tr>
  <td>{{$loop->iteration}}</td>
	  <td>{{ $servicecheckups_data->service_status }}</td>
 <td>{{ $servicecheckups_data->serviced_at }}  </td>
 <td>{{ $servicecheckups_data->serviced_date }}</td>

<td>{{ $servicecheckups_data->serviced_amount }}</td>
<td><img src="{{url('/images')}}/{{ $servicecheckups_data->serviced_bill_image }}" style="width:40px;height:40px;"></td>
<td><a href="{{url('/servicecheckups')}}/{{$servicecheckups_data->ser_id}}">Edit</a></td>
</tr>
 @endforeach
<?php } ?>
</table>
    </div>
  
  </div>
  
  
  <div  class="tab-pane fade" id="operatordiv" role="operatordiv" aria-labelledby="operatordiv" >
  <div class="col-md-12">
<?php 

if(!$equipment_operators->isEmpty()){
//dd($equipment_operators);	
//foreach($equipment_operators as $operators){
?>
@foreach($equipment_operators as $key => $val)

<form  method="post" action="/vendorequipment/operatorsave" enctype="multipart/form-data">
@csrf
<h1 class="operator_name">Operator Details</h1>
<div class="col-md-2">
<img src="{{url('/images')}}/{{$equipment_operators[$key]->operator_image}}<?php //echo $operators->operator_image; ?>" style="width: 100%;">
<input type="file" name="operator_image" id="yourBtn">
</div>
<div class="col-md-1">
<img src="{{url('/images')}}/{{$equipment_operators[$key]->operator_licence}}" style="width: 100%;">
<input type="file" name="operator_licence" id="yourBtn">
</div>
<div class="col-md-8">
<div class="col-md-12" style="background: #d1d5da;vertical-align: middle;">
<input type="hidden" name="operator_id" value="{{ Request::segment(3) }}">
<div class="col-md-12">
<div class="col-md-3 nopad">
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-6 nopad col-md-6 col-form-label">Operator Name:</label>
    <div class="col-sm-6 col-md-6 nopad" style="margin-top: -8px;">
    <input type="text" name="operator_name" id="operator_name" value="{{$equipment_operators[$key]->operator_name}}" class="form-control" >
    </div>
  </div>

</div> 
<div class="col-md-3 nopad">
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-6 nopad col-md-6 col-form-label">Phone No:</label>
    <div class="col-sm-6 col-md-6 nopad" style="margin-top: -8px;">
   <input type="text" name="operator_phone" id="operator_phone" value="{{$equipment_operators[$key]->operator_phone}}" class="form-control" >
    </div>
  </div>
</div>
<div class="col-md-3 nopad">
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-6 nopad col-md-6 col-form-label">City:</label>
    <div class="col-sm-6 col-md-6 nopad" style="margin-top: -8px;">
    <input type="text" name="operator_city" id="operator_city" value="{{$equipment_operators[$key]->operator_city}}" class="form-control" >
    </div>
  </div>

</div>


<div class="col-md-3 nopad">
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-6 nopad col-md-6 col-form-label">Address:</label>
    <div class="col-sm-6 col-md-6 nopad" style="margin-top: -8px;">
    <input type="text" name="operator_address" id="operator_address" value="{{$equipment_operators[$key]->operator_address}}" class="form-control">
    </div>
  </div>
</div>
</div>

</div>
</div>
<div class="col-md-1">
<input type="submit" class="btn btn-primary" value="Edit" style="
    padding-right: 24%;
    text-align: center;
    padding-left: 31%;
    margin-bottom: 4%;
">
<a class="btn btn-danger" href="/vendorequipment/operatordelete/{{$equipment_operators[$key]->operator_id}}">Delete</a>
</div>
</form>
 @endforeach
<?php  }else{ ?>

<form  method="post" action="/vendorequipment/operatorsave" enctype="multipart/form-data">
@csrf
<h1 class="operator_name">Operator Details</h1>
<div class="col-md-2">
<img src="{{url('/images/user.png')}}" style="width: 100%;">
<input type="file" name="operator_image" id="yourBtn" >
</div>
<div class="col-md-1">
<img src="{{url('/images/Licences.png')}}" style="width: 100%;">
<input type="file" name="operator_licence" id="yourBtn">
</div>
<div class="col-md-8">
<div class="col-md-12" style="background: #d1d5da;vertical-align: middle;">
<input type="hidden" name="ve_id" value="{{ Request::segment(3) }}">
<div class="col-md-12">
<div class="col-md-3 nopad">
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-6 nopad col-md-6 col-form-label">Operator Name:</label>
    <div class="col-sm-6 col-md-6 nopad" style="margin-top: -8px;">
    <input type="text" name="operator_name" id="operator_name" value="" class="form-control" >
    </div>
  </div>

</div> 
<div class="col-md-3 nopad">
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-6 nopad col-md-6 col-form-label">Phone No:</label>
    <div class="col-sm-6 col-md-6 nopad" style="margin-top: -8px;">
   <input type="text" name="operator_phone" id="operator_phone" value="" class="form-control" >
    </div>
  </div>
</div>
<div class="col-md-3 nopad">
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-6 nopad col-md-6 col-form-label">City:</label>
    <div class="col-sm-6 col-md-6 nopad" style="margin-top: -8px;">
    <input type="text" name="operator_city" id="operator_city" value="" class="form-control" >
    </div>
  </div>

</div>


<div class="col-md-3 nopad">
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-6 nopad col-md-6 col-form-label">Address:</label>
    <div class="col-sm-6 col-md-6 nopad" style="margin-top: -8px;">
    <input type="text" name="operator_address" id="operator_address" value="" class="form-control">
    </div>
  </div>
</div>
</div>

</div>
</div>

<div class="col-md-1">
<input type="submit" value="save">
</form>

</div>
<?php } ?>

</div>

<div class="col-md-12">
 
  
  <div id="operatorcontent">
  <?php 

if(!$equipment_operators_history->isEmpty()){
 ?>
  <h1 class="operator_name" >Operators Deleted History <input type='button' id='hideshow' value='show'></h1>
  <table class="table">
  <tr>
  <th>Operator  Name</th>
  <th>Phone No</th>
  <th>City</th>
  <th>Address</th>
  <th>Operator Ddded Date</th>
  <th>Operator Delete Date</th>
  </tr>
  @foreach($equipment_operators_history as $key => $val)
  <tr>
  <td>{{$equipment_operators_history[$key]->operator_name}}</td>
  <td>{{$equipment_operators_history[$key]->operator_phone}}</td>
  <td>{{$equipment_operators_history[$key]->operator_city}}</td>
  <td>{{$equipment_operators_history[$key]->operator_address}}</td>
  <td>{{$equipment_operators_history[$key]->operator_added_date}}</td>
  <td>{{$equipment_operators_history[$key]->operator_delete_date}}</td>
  </tr>
  
   @endforeach
  </table>
<?php } ?>
  </div>
  </div>
  </div>
  
  
  
  
  
</div>

 
	 </div>
	  
	
</div> 

<style>
.fc-unthemed td.fc-today {
    background: #f7d10e!important;
}
.block 
{
  width:100%; 
}

.modal, .modal-backdrop {
    position: absolute !important;
	height:150vh;
}.after_modal_appended
{  
  position:relative;
}
</style>

<style>
.circular{
  height:100px;
  width: 100px;
  position: relative;
  transform:scale(2);
}
.circular .inner{
  position: absolute;
  z-index: 6;
  top: 50%;
  left: 50%;
  height: 80px;
  width: 80px;
  margin: -40px 0 0 -40px;
  background: #dde6f0;
  border-radius: 100%;
 
}
.circular .number{
  position: absolute;
  top:50%;
  left:50%;
  transform: translate(-50%, -50%);
  z-index:10;
  font-size:18px;
  font-weight:500;
  color:#4158d0;
}
.circular .bar{
  position: absolute;
  height: 100%;
  width: 100%;
  background: #fff;
  -webkit-border-radius: 100%;
  clip: rect(0px, 100px, 100px, 50px);
}
.circle .bar .progress{
  position: absolute;
  height: 100%;
  width: 100%;
  -webkit-border-radius: 100%;
  clip: rect(0px, 50px, 100px, 0px);
  background: #2cbd77;
}
.circle .left .progress{
  z-index:1;
  animation: left 4s linear both;
}
@keyframes left{
  100%{
    transform: rotate(180deg);
  }
}
.circle .right {
  transform: rotate(180deg);
  z-index:3;
 
}
.circle .right .progress{
  animation: right 4s linear both;
  animation-delay:4s;
}
@keyframes right{
  100%{
    transform: rotate(180deg);
  }
}
.fc-time{
	display:none;
}
</style>
<link rel="stylesheet" href="{{URL::to('fullcalendar/fullcalendar.min.css')}}" />
<script src="{{URL::to('fullcalendar/lib/moment.min.js')}}"></script>
<script src="{{URL::to('fullcalendar/fullcalendar.min.js')}}"></script>

<script>

$(document).ready(function () {
	
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "http://192.168.0.16:8000/technicianplanner/fetchevent?var=<?php echo $equ_id; ?>",
	  /*  events: [
    {
      title: 'Event Title1',
      start: '2021-07-17T13:13:55.008',
      end: '2021-07-19T13:13:55.008'
    },
    {
      title: 'Event Title2',
      start: '2021-07-17T13:13:55-0400',
      end: '2021-07-19T13:13:55-0400'
    }
  ] */
       // displayEventTime: true,
        /* eventRender: function (event, element, view) {
			console.log(event);
            if (event.allDay === 'true') {
				
                event.allDay = true;
            } else {
				
                event.allDay = false;
            }
        }, */
		
       // selectable: true,
       // selectHelper: true,
      

    });
});
$(document).ready(function () {
	
    var calendar = $('#calendar1').fullCalendar({
        editable: true,
        events: "http://192.168.0.16:8000/vendorequipment/workinghistory?var=<?php echo $equ_id; ?>",
	  /*  events: [
    {
      title: 'Event Title1',
      start: '2021-07-17T13:13:55.008',
      end: '2021-07-19T13:13:55.008'
    },
    {
      title: 'Event Title2',
      start: '2021-07-17T13:13:55-0400',
      end: '2021-07-19T13:13:55-0400'
    }
  ] */
       // displayEventTime: true,
        /* eventRender: function (event, element, view) {
			console.log(event);
            if (event.allDay === 'true') {
				
                event.allDay = true;
            } else {
				
                event.allDay = false;
            }
        }, */
		
       // selectable: true,
       // selectHelper: true,
      

    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
</script>
<script>
 $('#service_status').on('change',function(e)
 {
  
    var sp_cat = e.target.value;
	var equ_id = $("#equ_id_new").val();
	
if(sp_cat=='completed'){
$("#service_details").show();
}else{
	$("#service_details").hide();

}

    jQuery.ajax({
		
	    type: 'POST',
        url:'/technicianplanner/servicecheckupstatus',

        data: {
			"_token": "{{ csrf_token() }}",
            id: sp_cat,
            equ_id: equ_id,
			
        },
        success: function( data ){ 
			alert("successfully updated");
        },
       
    }); 
 });


const numb = document.querySelector(".number");
let counter = 0;
setInterval(() => {
  if(counter == 100 ){
    clearInterval();
  }else{
    counter+=1;
    numb.textContent = counter + "%";
  }
}, 80);
</script>




<script>
 
$(document).ready(function(){
	$("#addsparebtn").click(function(){
		$("#addspares").show();
		$("#listspares").hide();
    });
	$(".spares_close").click(function(){
		
		$("#listspares").show();
		$("#addspares").hide();
    });
	
     $("body").on("click","#btn",function(){
            
          $("#myModal").modal("show");
      
          //appending modal background inside the blue div
          $('.modal-backdrop').appendTo('.blue');   
    
          //remove the padding right and modal-open class from the body tag which bootstrap adds when a modal is shown
          $('body').removeClass("modal-open")
          $('body').css("padding-right","");     
      });
 
});
</script>
<script>
 $('#mastercategory').on('click',function(e)
 {
    console.log(e);
    var sparecategory = $("#sparecategory").val();
    var sparetype = $("#sparetype").val(); 
	var error= true;
if(sparecategory == ""){
	alert("Please enter spare category.");
	error = false;
}
if(sparetype == ""){
	alert("Please enter spare type."); 
	error = false;
}
   if(error == true){
	  jQuery.ajax({
	    type: 'POST',
        url:'/equipments/addsparecategory',

        data: {
			"_token": "{{ csrf_token() }}",
            sparecategory: sparecategory,
            sparetype: sparetype,
			
        },
        success: function( data ){
			var newdata = data.msg;
			if(newdata == 'success'){
				alert("Successfully added");
				location.reload();
			}
	 
        },
       
    }); 
   }
   
 });
 
 $('#addsparepart').on('click',function(e)
 {
    console.log(e);
    var sp_cat = $("#sp_cat").val();
    var sp_type = $("#sp_type").val(); 
    var sp_id = $("#sp_id").val(); 
    var sp_quantity = $("#sp_quantity").val(); 
    var sp_brand = $("#sp_brand").val(); 
    var sp_year = $("#sp_year").val(); 
    var sp_pre_no = $("#sp_pre_no").val(); 
    var sp_v_name = $("#sp_v_name").val(); 
    var sp_email = $("#sp_email").val(); 
    var sp_phone = $("#sp_phone").val(); 
    var sp_city = $("#sp_city").val(); 
    var sp_comments = $("#sp_comments").val(); 
    var equ_id = $("#equ_id").val(); 
	var error= true;
if(sp_cat == ""){
	alert("Please enter spare category.");
	error = false;
}
if(sp_type == ""){
	alert("Please enter spare type."); 
	error = false;
}
   if(error == true){
	  jQuery.ajax({
	    type: 'POST',
        url:'/equipments/addspare',

        data: {
			"_token": "{{ csrf_token() }}",
            sp_cat: sp_cat,
            sp_type: sp_type,
			sp_id: sp_id,
			sp_quantity: sp_quantity,
			sp_brand: sp_brand,
			sp_year: sp_year,
			sp_pre_no: sp_pre_no,
			sp_v_name: sp_v_name,
			sp_phone: sp_phone,
			sp_email: sp_email,
			sp_city: sp_city,
			sp_comments: sp_comments,
			equ_id: equ_id,
			
        },
        success: function( data ){
			var newdata = data.msg;
			if(newdata == 'success'){
				alert("Successfully added");
				location.reload();
			}
	 
        },
       
    }); 
   }
   
 });
   $('#sp_cat').on('change',function(e)
 {
    
    var sp_cat = e.target.value; 
    jQuery.ajax({
	    type: 'POST',
        url:'/equipments/gettypes',

        data: {
			"_token": "{{ csrf_token() }}",
            id: sp_cat,
			
        },
        success: function( data ){ 
			var newdata1 = data.gettypes;
		 console.log(newdata1);
			var html = '<option value="">Select</option>';
		
            $.each( newdata1, function( key, value ) { 
				 html+='<option value='+value.spare_type+'>'+value.spare_type+'</option>'; 
			 });
			 
			$(".sptypediv").html(html);	 
        },
       
    }); 
 });
 </script>
<script>
$("#service_active").addClass("active");
$("#dalycheckup").addClass("active in");
$("#dprdetails_inactive").removeClass("active");
$("#pills-home").removeClass("active"); 




 $('#send_mail').on('click',function(e)
 {
    //console.log(e);
    var email = $("#exampleInputEmail1").val();
    var pro_id = {{ Request::segment(3) }};
	if($('input[name="vehicle_information"]:checked'))
	{
		var vehicle_information =($("#vehicle_information").val());
	}else{
		var vehicle_information =0;
	}
	if($('input[name="vehicle_images"]:checked'))
	{
		var vehicle_images =($("#vehicle_images").val());
	}else{
		var vehicle_images =0;
	}
	if($('input[name="vehicle_operator"]:checked'))
	{
		//alert(1);
		var vehicle_operator =($("#vehicle_operator").val());
	}else{
		var vehicle_operator =0;
	}
alert(vehicle_operator);
	  jQuery.ajax({
	    type: 'POST',
        url:'/email/index',

        data: {
			"_token": "{{ csrf_token() }}",
            email: email,
            pro_id: pro_id,
            vehicle_information: vehicle_information,
            vehicle_images: vehicle_images,
            vehicle_operator: vehicle_operator,
			
        },
        success: function( data ){
			var newdata = data.msg;
			if(newdata == 'success'){
				alert("Documents has been sent successfully");
				location.reload();
			}
	 
        },
       
    }); 

   
 });
 
 
 
</script>

<script>
$('#invoicestatus').on('change',function(e)
 {
    
    var status = e.target.value;
var fields = status.split(',');

var statusname = fields[0];
var id = fields[1];

    jQuery.ajax({
	    type: 'POST',
        url:'/vendor/invoicestatus',

        data: {
			"_token": "{{ csrf_token() }}",
            id: id,
			
        },
        success: function( data ){
			alert("Please Upload the Payment Receipt");
			window.location.reload();
        },
       
    }); 
 });
</script>
@endsection

@extends('layouts.app')
@section('content')

<style>
.contract{
	  margin: 5px;
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
    background-color:  #38cec3;
    padding-left: 8px;
    padding-right: 8px;
    padding-top: 4px;
    padding-bottom: 4px;
	border: 1px solid #858587;
}
span.in_class_two {
    background-color:  #f71d0f;
    padding-left: 8px;
    padding-right: 8px;
    padding-top:4px;
    padding-bottom: 4px;
	border: 1px solid #858587;
}
span.in_class_three{
    background-color: #fabc05;
    padding-left: 8px;
    padding-right: 8px;
    padding-top: 4px;
    padding-bottom: 4px;
	border: 1px solid #858587;
}
span.in_class_four{
    background-color: #16817a;
    padding-left: 8px;
    padding-right: 8px;
    padding-top: 4px;
    padding-bottom:4px;
	border: 1px solid #858587;
}
span.in_loopClass {
    background-color:  #38cec3;
    padding-left: 8px;
    padding-right: 8px;
    padding-top:4px;
    padding-bottom: 4px;
	border: 1px solid #858587;
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
}
.fa-plus-circle{
	color:#4f4ac2;
}
</style>
  
<div class="col-md-12" style="margin-top:15px;">
	 <div class="col-md-6">
	 
		<table  class="table table-bordered uppertable" style="    background: white;">
		 <tbody style="white-space: pre;    font-size: 0.9em;">
		<tr>
			<td><b>Equipment Name</b>  :  <span class="answer">{{ $equipment->e_equipment_type }}</span></td>
			<td><b>Brand</b>  :  <span class="answer">{{ $equipment->e_brand }}</span></td>
			<td><b>Year</b>  :  <span class="answer">{{ $equipment->e_year }}</span></td>
		</tr> 
		 	<tr>
			<td><b>Equipment Type</b>  :  <span class="answer">{{ $equipment->e_equipment_type }}</span></td>
			<td><b>Model No</b>  :  <span class="answer">{{ $equipment->e_model }}</span></td>
			<td><b>Capacity</b>  :  <span class="answer">{{ $equipment->e_capacity }}</span></td>
		</tr> 
		 	<tr>
			<td><b>Veh Code</b>  :  <span class="answer"></span></td>
			<td colspan="2"><b>Current Reading</b>  :  <span class="answer">{{ $equipment->e_current_reading }}</span></td>
		</tr> 
		 	<tr>
			<td><b>Project Code</b>  :  <span class="answer">{{ $equipment->project_code }}</span></td>
			<td colspan="2"><b>Service Duration</b>  :  <span class="answer">{{ $equipment->e_service_duration }}</span></td>
		</tr> 
		 	<tr>
			<td><b>Project Name</b>  :  <span class="answer">{{ $equipment->project_name }}</span></td>
			<td colspan="2"><b>Type Of Work</b>  :  <span class="answer">{{ $equipment->e_type_of_work }}</span></td>
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
	 </div>
	 
	 </div>
	 
	 
	 
	 <div class="col-md-12">
	 <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item active" id="dprdetails_inactive">
    
<a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Equipment Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Veh Document Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Spares</a>
  </li>
  <li class="nav-item" id="dprdetails_active">
    <a class="nav-link" id="dprdetails-tab" data-toggle="pill" href="#dprdetails" role="tab" aria-controls="dprdetails" aria-selected="false">DPR Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill"  role="tab"   aria-selected="false">Health</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill"   role="tab"   aria-selected="false">Profit</a>
  </li>
</ul>
<div class="tab-content margin_bottom_20" id="pills-tabContent" style="background: #fff;height:100vh;">
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
    width: 50%;
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
				@foreach (json_decode($equipment_details->e_images) as $key=>$img) 
                    <li class="col-sm-12 nopad website_slider_li">
                        <a class="" id="carousel-selector-<?php echo $key; ?>" href="#image-{{ $key }}">
                            <img  width="48px" height="48px" class="thumbnail_image" style="margin:0" src="{{url('/images')}}/{{ $img }}" class="">
                        </a>
						<div class="lb-overlay" id="image-<?php echo $key; ?>">
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
								 
								@foreach (json_decode($equipment_details->e_images) as $key=>$img)
                                    <div class="{{$key == 0  ? 'active' : ''}}   item" data-slide-number="{{ $key }}">
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
@foreach (json_decode($equipment_details->e_images) as $img)
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
	
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img  class="fa_images" src="https://materialwala.com/buildsand/site_assets/newapp/owner_1.png"   /></div><div class="col-md-9"><span><b>OWNER</b></span><br><span style="color:#42b0c7;"> {{ $equipment->vendor_name }}</span></div></div>
  
  </div>
  <div class="col-md-4">
 
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img   class="fa_images"  src="https://materialwala.com/buildsand/site_assets/newapp/Owner_contact_2.png" /></div><div class="col-md-9"><span><b>VENDOR ADDERSS</b></span><br><span  style="color:#42b0c7;"> {{ $equipment->address }}</span></div></div>
 
  
  </div>
  <div class="col-md-4">
	 
	<div class="col-md-12" >	<div class="col-md-3"><img  class="fa_images"  src="https://materialwala.com/buildsand/site_assets/newapp/Vendor_contract_3.png" /></div><div class="col-md-9"><span><b>VENDOR CONTACT</b></span><br><span  style="color:#42b0c7;">{{ $equipment->vendor_phone }}</span></div></div>
  </div>
  
  
  </div>



</div>

<div class="col-md-12  ">
  <div class="col-md-4">
  </div>
  <div class="col-md-8" style="font-size: 13px;">
  <div class="col-md-4">
	
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img  class="fa_images" src="https://materialwala.com/buildsand/site_assets/newapp/Vendormail_4.png" /></div><div class="col-md-9"><span><b>EMAIL ID</b></span><br><span  style="color:#42b0c7;">{{ $equipment->vendor_email }}</span></div></div>
  
  </div>
  <div class="col-md-4">
 
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img class="fa_images" src="https://materialwala.com/buildsand/site_assets/newapp/Vendor_Contract_5.png" /> </div><div class="col-md-9"><span><b>View Rental Contract</b></span><br><a  style="color:#42b0c7;" href="{{url('/images')}}/{{ $equipment_details->upload_rental_contract }}" target="_blank">{{ $equipment_details->upload_rental_contract }}</a></div></div>
 
  
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
		  
			<div class="col-md-2"><b>Rental Start Date</b><div class="contract">{{ $equipment_details->e_rental_start_date }}</div></div>
			<div class="col-md-2"><b>Rental End Date</b><div  class="contract">{{ $equipment_details->e_rental_end_date }}</div></div>
			<div class="col-md-2"><b>No Of Days</b><div  class="contract">---</div></div>
			<div class="col-md-2"><b>Rental Cost</b><div  class="contract">{{ $equipment_details->e_rental_cost }}</div></div>
			<div class="col-md-2"><b>Billing Cycle</b><br><div  class="contract">{{ $equipment_details->e_billing_cycle }}</div></div>
			<div class="col-md-2"><b>Equipment Status</b><div  class="contract">---</div></div>
		
		</div>
		 
      </div> 
    </div>
  
  
  </div>



</div>



</div>


  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  
<div class="col-md-12  margin_to_20 margin_bottom_20">
<div class="col-md-4">
<div class="col-md-2"><img width="48px" height="48px" class="thumbnail_image" src="https://materialwala.com/buildsand/site_assets/newapp/excavator.jpg"></div>
<div class="col-md-10"><img width="315px" height="224px" class="main_image" src="https://materialwala.com/buildsand/site_assets/newapp/tipper.jpg"></div> 
</div>
<div class="col-md-1 vachile_document_align float-left" ><p style="display:none;">Vechile Document</p>
</div>
<div class="col-md-7 document_type_border nopad">
<div class="col-md-12  vachile_background_color">
<div class="col-md-6"><span>Document Type</span></div>
<div class="col-md-3">Start Date</div>
<div class="col-md-3"> End Date</div></div>

<div class="col-md-12 margin_to_20">
<div class="col-md-5"><div class="col-md-6">Vechile Rc </div><div class="col-md-2"><img src="https://materialwala.com/buildsand/site_assets/newapp/veh-rc.png"></div> <div class="col-md-4">Validity</div></div>
<div class="col-md-3"> {{ $equipment_details->rc_start_date }}</div>
<div class="col-md-3"> {{ $equipment_details->rc_end_date }}</div>
<div class="col-md-1"> View</div>


</div>
<div class="col-md-12 margin_to_20" style="background-color:f7f6ff;">
<div class="col-md-5"><div class="col-md-6">Insurance </div><div class="col-md-2"><img src="https://materialwala.com/buildsand/site_assets/newapp/insurance.png"></div><div class="col-md-4">Validity</div></div>
<div class="col-md-3"> {{ $equipment_details->ins_start_date }}</div>
<div class="col-md-3"> {{ $equipment_details->ins_end_date }}</div>
<div class="col-md-1"> View</div>
</div>
<div class="col-md-12 margin_to_20">
<div class="col-md-5"><div class="col-md-6">Road Tax </div><div class="col-md-2"><img src="https://materialwala.com/buildsand/site_assets/newapp/tax.png"> </div><div class="col-md-4">Validity</div></div>
<div class="col-md-3"> {{ $equipment_details->tax_start_date }}</div>
<div class="col-md-3"> {{ $equipment_details->tax_end_date }}</div>
<div class="col-md-1"> View</div>
</div>
<div class="col-md-12 margin_to_20" style="background-color:f7f6ff;">
<div class="col-md-5"><div class="col-md-6">Road Permit </div><div class="col-md-2"><img src="https://materialwala.com/buildsand/site_assets/newapp/Road_perrmet.png"> </div><div class="col-md-3">Validity</div></div>
<div class="col-md-3"> {{ $equipment_details->permit_end_date }}</div>
<div class="col-md-3"> {{ $equipment_details->permit_start_date }}</div>
<div class="col-md-1"> View</div>

</div>
<div class="col-md-12 margin_to_20">
<div class="col-md-5"><div class="col-md-6">Fitness / Break </div><div class="col-md-2"><img src="https://materialwala.com/buildsand/site_assets/newapp/fintenss_break.png"> </div><div class="col-md-4">Validity</div></div>
<div class="col-md-3"> {{ $equipment_details->fitness_start_date }}</div>
<div class="col-md-3"> {{ $equipment_details->fitness_end_date }}</div>
<div class="col-md-1"> View</div>

</div>
<p>&nbsp;</p>
</div> 
</div>
  
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
  
  <div class="col-md-12  margin_to_20 margin_bottom_20">
<div class="col-md-4">
<div class="col-md-2"><img width="48px" height="48px" class="thumbnail_image" src="https://materialwala.com/buildsand/site_assets/newapp/excavator.jpg"></div>
<div class="col-md-10"><img width="315px" height="224px" class="main_image" src="https://materialwala.com/buildsand/site_assets/newapp/tipper.jpg"></div> 
</div>
<div class="col-md-8">
  
  <div class="col-md-3 sparestab" >		
			<div class="col-md-12" style="padding: 0;height:50px">	
			<div class="col-md-5"  >	
			<img style="    width: 35px;    height: 35px;     margin-top: 10px;" src="https://materialwala.com/buildsand/site_assets/newapp/spare_ico1.png" />
			</div>
			<div class="col-md-7 tab5txt">	
			<h5>
			Tyres - 04</h5> 
			</div>
			</div>
		</div>
		<div class="col-md-3 sparestab" >		
			<div class="col-md-12" style="padding: 0;height:50px">	
			<div class="col-md-5"  >	
			
			<img style="    width: 35px;    height: 35px;     margin-top: 10px;" src="https://materialwala.com/buildsand/site_assets/newapp/spare_ico2.png" />
			</div>
			<div class="col-md-7 tab5txt">	
			<h5>Air Filters - 5</h5>
			 
			</div>
			</div>
		</div>
		<div class="col-md-3 sparestab"  >		
			<div class="col-md-12" style="padding: 0;height:50px">	
			<div class="col-md-5 "  >	
		
			<img style="    width: 35px;    height: 35px;     margin-top: 10px;" src="https://materialwala.com/buildsand/site_assets/newapp/spare_ico1.png" />
			</div>
			<div class="col-md-7 tab5txt">	
			<h5>Lubricants - 20L</h5> 
			</div>
			</div>
		</div>
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
        <h5 class="modal-title" id="staticBackdropLiveLabel" >Add Spares</h5> 
      </div>
<div class="col-md-12"  style="font-size: 13px;    margin-top: 20px;">
 
  <div class="col-md-4">
	
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img  class="fa_images" src="https://materialwala.com/buildsand/site_assets/newapp/owner_1.png"   /></div><div class="col-md-9"><span><b>Spare Category</b></span><br><input type="text" style="width: 15vh;    height: 3.5vh;" class="form-control"/></div></div>
  
  </div>
  <div class="col-md-4">
 
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img   class="fa_images"  src="https://materialwala.com/buildsand/site_assets/newapp/Owner_contact_2.png" /></div><div class="col-md-9"><span><b>Spare Type</b></span><br><input type="text" style="width: 15vh;    height: 3.5vh;"  class="form-control"/></div></div>
 
  
  </div>
  <div class="col-md-4">
	 
	<div class="col-md-12" >	<div class="col-md-3"><img  class="fa_images"  src="https://materialwala.com/buildsand/site_assets/newapp/Vendor_contract_3.png" /></div><div class="col-md-9"><span><b>Sparepart ID</b></span><br><input type="text" style="width: 15vh;    height: 3.5vh;"  class="form-control"/></div></div>
  </div>
  
   



</div>

<div class="col-md-12  " style="font-size: 13px;">
  
  <div class="col-md-4">
	
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img  class="fa_images" src="https://materialwala.com/buildsand/site_assets/newapp/Vendormail_4.png" /></div><div class="col-md-9"><span><b>Quantity</b></span><br><input class="form-control" type="text" style="width: 15vh;    height: 3.5vh;" class="form-control"/></div></div>
  
  </div>
  <div class="col-md-4">
 
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img class="fa_images" src="https://materialwala.com/buildsand/site_assets/newapp/Vendor_Contract_5.png" /> </div><div class="col-md-9"><span><b>Brand</b></span><br><input type="text" style="width: 15vh;    height: 3.5vh;"  class="form-control"/></div></div>
 
  
  </div>
  <div class="col-md-4">
	 
	<div class="col-md-12">	<div class="col-md-3"><img  class="fa_images"  src="https://materialwala.com/buildsand/site_assets/newapp/Owner_contact_2.png" /></div><div class="col-md-9"><span><b>Year</b></span><br><input type="text" style="width: 15vh;    height: 3.5vh;"  class="form-control"/></div></div>
  </div>
  
   



</div>



<div class="col-md-12  margin_to_20 margin_bottom_20">
   <h5 class="modal-title" id="staticBackdropLiveLabel" >Purchased From</h5>  
 <div class="modal-content" style="border-radius: 20px;">
  
      <div   style="margin-top: 15px;    margin-bottom: 75px;font-size:13px;">
	  <div class="col-md-12">
		  
			<div class="col-md-2"><b>Procured From</b><div class=" "><input type="text" style="width:10vh;  height: 3.5vh;" class="form-control" /></div></div>
			<div class="col-md-2"><b>PO. No</b><div  class=" "><input type="text"  style="width:10vh;  height: 3.5vh;" class="form-control"/></div></div>
			<div class="col-md-2" style="width: 15%;"><b>Vendor Name</b><div  class=" "><input type="text"  style="width:10vh;  height: 3.5vh;" class="form-control"/></div></div>
			<div class="col-md-2" style="width: 11%;"><b>Ph-No</b><div  class=" "><input type="text" style="width:10vh;  height: 3.5vh;"  class="form-control"/></div></div>
			<div class="col-md-2" style="width: 11%;"><b>Email ID</b><br><div  class=" "><input type="text" style="width:10vh;  height: 3.5vh;" class="form-control"/></div></div>
			<div class="col-md-1"><b>City</b><div  class=" "><input type="text" style="width:8vh;  height: 3.5vh;"  class="form-control"/></div></div>
			<div class="col-md-1"><b>Comments</b><div  class=" "><input type="text" style="width:10vh;  height: 3.5vh;"  class="form-control"/></div></div>
		
		</div>
		 
      </div> 
    </div>
<div class="col-md-12  margin_to_20 margin_bottom_20"  style="text-align:center;">
<button class="btn btn-primary">Submit</button>


</div>
</div>
   
</div>
</div>
<div class="col-md-12  margin_to_20 margin_bottom_20" id="listspares">
  
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
				<div  >Spare Category<input type="text" />
				</div>
			</div>
            <div class="col-md-5">
				<div style="float:left;    margin: 5px;"><img style="    width: 35px;    height: 35px; " src="https://materialwala.com/buildsand/site_assets/newapp/spare_ico1.png" /></div>
				<div  >Spare Type<input type="text" />
				</div>
			</div>
			 <div class="col-md-2" style="    margin-top: 10px;">
			 <button type="button" class="btn">Add</button>
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
			 <td>S-Action</td> 
			 <td>Action</td></tr>
              </thead>
              <tbody>
			  <tr>
			  <td>01</td>
			<td>Loremipsum</td><td>Lorem</td>
			<td>Lorem</td>
			<td>Lorem</td>
			<td>Lorem</td> 
			<td><button  class="btn btn-primary viewbtn ">View</button></td>  
			  </tr>
			  <tr>
			  <td>01</td>
			<td>Loremipsum</td><td>Lorem</td>
			<td>Lorem</td>
			<td>Lorem</td>
			<td>Lorem</td> 
			<td><button  class="btn btn-primary viewbtn">View</button></td>  
			  </tr><tr>
			  <td>01</td>
			<td>Loremipsum</td><td>Lorem</td>
			<td>Lorem</td>
			<td>Lorem</td>
			<td>Lorem</td> 
			<td><button  class="btn btn-primary viewbtn">View</button></td>  
			  </tr><tr>
			  <td>01</td>
			<td>Loremipsum</td>
			<td>Lorem</td>
			<td>Lorem</td>
			<td>Lorem</td>
			<td>Lorem</td> 
			<td><button class="btn btn-primary viewbtn ">View</button></td>  
			  </tr>
              </tbody><tbody>
			  
			  </tbody>
			  
			  </table>
 

</div>

</div>
  </div>
   


 
  
  
  
  </div>
  
  
  <div class="tab-pane fade" id="dprdetails" role="tabpanel" aria-labelledby="dprdetails">
  
  <div class="col-md-12  margin_to_20 margin_bottom_20">
  <div class="col-md-12  margin_to_20 margin_bottom_20">
  
  <div class="col-md-4 rental_objective_css">Rental Objective 
  <br>
  <br>
  <span class="dollar_8">$8</span> <span class="days_css">Hrs/ $240 Hrs per month</span></div>
  
  <div class="col-md-3 rental_objective_css">Rental Billing Cycle <br><br><span class="dollar_8">$15</span> <span class="days_css">Days</span></div>

  <div class="col-md-3 rental_objective_css">Rental Period <br><br><span class="dollar_8">$1</span> <span class="days_css">year</span></div>
  
  </div>
  <div class="col-md-12 nopad"> 
<div class="col-md-11 "style="border-left: 1px solid #7e8283;    border-right: 1px solid #7e8283;    border-top: 1px solid #7e8283;    background-color: #dcf1f2;padding-bottom: 1%;margin-bottom: -17px;padding-top: 0.3%;text-align:center;">DPR Details   <span style="float:right;">&nbsp; Month: <?php echo date('F');?></span></div>

<div class="col-md-1 view_right"><span class="view_css_new">View</span></div>

<div class="col-md-12 ">&nbsp;</div> 


<div class="col-md-11 nopad">
<span class="in_class_one">01</span>
<span class="in_class_two">02</span>
<span class="in_class_three">03</span>
<span class="in_class_four">04</span>
<?PHP  FOR( $i=5; $i<=31; $i++){ ?>
<span class="in_loopClass"><?php if($i<10){echo 0; } echo $i; ?></span>

<?php } ?>
<span class="in_loopClass">All</span>
</div>
<div class="col-md-1"><Span class="right_side_border">$79%</span></div>
</div>


<div class="col-md-12 margin_to_20 margin_bottom_20"><div class="col-md-10">Daily Log Sheet</div><div class="col-md-2" style="float:right;">OverAll Log Sheet </div> </div> 

<div class="col-md-12">

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
			 <td>Field Supervisor</td>
			 <td>Operator</td>
			 <td>View Log Sheet</td>
			 <td>Action</td>
			 
			 
			 </tr>
              </thead>
              <tbody>
			  <?PHP  for( $i=1; $i<=31; $i++){ ?>
			  <style>
			  #end_time_hide-<?php echo $i; ?>, #end_reading_hide-<?php echo $i; ?>, #start_reading_hide-<?php echo $i; ?>, #start_time_hide-<?php echo $i; ?>, #no_of_litter_hide-<?php echo $i; ?>,#fueled_hide-<?php echo $i; ?>{
				  display:none;
			  }
			  </style>
			  <tr>
			  <td><?php echo $i; ?>-<?php echo date('m'); ?>-<?php  echo date('y'); ?></td>   
			  <td>Kms</td>
			  <td>Day</td>
			  <td>8 Hrs</td>
			  <td ><span ><input type="text" onkeypress="return isNumberKey(this, event);" class="form-control textbox" id="start_time_hide-<?php echo $i; ?>"></span><span id="start_time_show-<?php echo $i; ?>">-</span></td>
			  <td ><span  ><input type="text" onkeypress="return isNumberKey(this, event);" class="form-control textbox"  id="start_reading_hide-<?php echo $i; ?>"></span><span id="start_reading_show-<?php echo $i; ?>">-</span></td>
			   
			  <td  ><span ><input type="text" onkeypress="return isNumberKey(this, event);" class="form-control textbox" id="end_reading_hide-<?php echo $i; ?>"></span><span id="end_reading_show-<?php echo $i; ?>" >-</span></td>
			 
			  <td ><span ><input type="text" onkeypress="return isNumberKey(this, event);" class="form-control textbox"  id="end_time_hide-<?php echo $i; ?>"></span><span  id="end_time_show-<?php echo $i; ?>">-</span></td>
			
			   <td><span id="total_working">-</span></td>
			   <td><select id="mySelect" onchange="myFunction1(<?php echo $i; ?>)">
			   <option>NA</option>
			   <option value="yes">Yes</option>
			   </select></td>
			  <td  ><span ><input type="text"  onkeypress="return isNumberKey(this, event);" class="form-control textbox" id="no_of_litter_hide-<?php echo $i; ?>"></span><span id="no_of_litter_show-<?php echo $i; ?>" >-</span></td>
			 
			  <td ><span ><input type="text" onkeypress="return isNumberKey(this, event);" class="form-control textbox"  id="fueled_hide-<?php echo $i; ?>"></span><span  id="fueled_show-<?php echo $i; ?>">-</span></td>
			    <td>Sub - 123456</td>
			    <td>Srinu - 123456</td>
			    <td>-</td>
			    <td><i class="fa fa-plus-circle " aria-hidden="true" onclick="myFunction(<?php echo $i; ?>)"></i></td>
			  </tr>  
			  <?php } ?>
              </tbody><tbody>
			  
			  </tbody>
			  
			  </table>
			  <script>
function myFunction1(id) {

  var x = document.getElementById("mySelect").value;
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
	var start_time = $("#start_time_hide-"+id).val();
	var start_reading = $("#start_reading_hide-"+id).val();
	var end_reading = $("#end_reading_hide-"+id).val();
	var end_time = $("#end_time_hide-"+id).val();
	var no_of_litter = $("#no_of_litter_hide-"+id).val();
	var fueled = $("#fueled_hide-"+id).val();
	 var x = document.getElementById("mySelect").value;
  if(x==="yes"){
	  if(no_of_litter==""){
		 alert("required No. Of Ltrs");
	  }
	  if(fueled == ""){
		 alert("required Fueled Reading");
		  
	  }
  }
	if(start_time){
		var total_working = (end_time - start_time);
		var total_working1 = Math.round(total_working,2);
		$("#total_working").html(total_working1);
		alert("are you sure want to proceed ? ")
		
		jQuery.ajax({
	    type: 'POST',
        url:'/equipments/update_dpr',

        data: {
			"_token": "{{ csrf_token() }}",
            id: <?php echo request()->segment(3); ?>,
			date: id,
			start_time:start_time,
			start_reading:start_reading,
			end_reading:end_reading,
			end_time:end_time,
			no_of_litter:no_of_litter,
			fueled:fueled,
        },
        success: function( data ){
			alert("success");
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
</script>

</div>
<div class="col-md-12"><div class="col-md-2 nopad"><div class="col-md-1">
<div class=" tabwidth8 tab5ico" style="background-image: linear-gradient(to right, #16a79d , #00dccd 80%);    margin-top: 31%;">	</div></div><div class="col-md-11 side_h5">&nbsp; Rental objective achieved </div>
</div><div class="col-md-1 nopad"><div class="col-md-1">
<div class="tabwidth8  tab5ico" style="background-color:#f71d0f; margin-top: 31%;background-image: none;"></div>	
			
			</div ><div class="col-md-11 side_h5">&nbsp; Idle</div></div><div class="col-md-3 nopad"><div class="col-md-1">
			<div class=" tabwidth8 tab5ico" style="background-color: #16817a;background-image: none; margin-top: 31%;">&nbsp;&nbsp;	</div></div><div class="col-md-11 side_h5">&nbsp; Rental Objective Exceeded</div>
</div>
<div class="col-md-2 nopad"><div class="col-md-1">
			<div class=" tabwidth8 tab5ico" style="background-color:#fabc05;background-image: none; margin-top: 31%;">&nbsp;&nbsp;	</div></div><div class="col-md-11 side_h5">&nbsp; Below Rental Objective</div>
</div>
</div>
  </div>
  </div>
  
</div>

 
	 </div>
	  
	
</div> 

<style>
.block 
{
  width:100%; 
}

.modal, .modal-backdrop {
    position: absolute !important;
}.after_modal_appended
{  
  position:relative;
}
</style>
<script>
 
$(document).ready(function(){
	$("#addsparebtn").click(function(){
		$("#addspares").show();
		$("#listspares").hide();
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
@php
$segment = request()->segment(3);
@endphp
@if($segment)
	<script>
$("#dprdetails_active").addClass("active");
$("#dprdetails").addClass("active in");
$("#dprdetails_inactive").removeClass("active");
$("#pills-home").removeClass("active");
</script>
@endif
@endsection

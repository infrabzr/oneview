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
.tablr_header {
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
.filr_upload_oneview{
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
.sidr_fixel_20{
	vertical-align: middle;
    padding-left: 20px;
}
.sidr_fixel_right_50{
	vertical-align: middle;
    padding-right: 50px;
}
.document_typr_border{
	border: 1px solid #bab3b3;
	border-radius:10px;
}
.vachilr_background_color{
	background-color: #f1eff0;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
    padding-right: 10px;
	border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}
.vachilr_document_align{
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
.stylr_background{
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
    background-color:  #f71d0f;
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
span.in_loopClass {
    background-color:  #38cec3;
   /*  padding-left: 8px;
    padding-right: 8.65px; */
    padding-top:4px;
    padding-bottom: 4px;
	border: 1px solid #858587;
	width: 2.8646%;
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
.right_sidr_border{
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
.sidr_h5{
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
</style>
  <input type="hidden" value="{{ Request::segment(3) }}" id="equ_id" />
<div class="col-md-12" style="margin-top:15px;">
	 <div class="col-md-6">
	 
		<table  class="table table-bordered uppertable" style="    background: white;">
		 <tbody style="white-space: pre;    font-size: 0.9em;">
		<tr>
			<td><b>Equipment Name</b>  :  <span class="answer">{{ $requests->r_equipment_type }}</span></td>
			<td><b>Brand</b>  :  <span class="answer">{{ $requests->r_brand }}</span></td>
			<td><b>Year</b>  :  <span class="answer">{{ $requests->r_year }}</span></td>
		</tr> 
		 	<tr>
			<td><b>Equipment Type</b>  :  <span class="answer">{{ $requests->r_equipment_type }}</span></td>
			<td><b>Model No</b>  :  <span class="answer">{{ $requests->r_model }}</span></td>
			<td><b>Capacity</b>  :  <span class="answer">{{ $requests->r_capacity }}</span></td>
		</tr> 
		 	<tr>  
			<td ><b>Product type</b>  :  <span class="answer">{{ $requests->r_product_type }}</span></td>
		</tr> 
		 	<tr>
			<td><b>Project Code</b>  :  <span class="answer">{{ $requests->project_code }}</span></td> 
		</tr> 
		 	<tr>
			<td><b>Project Name</b>  :  <span class="answer">{{ $requests->project_name }}</span></td> 
		</tr> 
		 	 
		 
		</tbody>
		</table>
	 
	 
	 
	 </div>
	 
	 <div class="col-md-6 border_solid_1px" style="display:none;">
	 
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
				<div class="col-md-12 card-body box-profile">
						 <img   class="main_image" src="{{ asset('images/health.png') }}">
							</div>
				</div>
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
  
</ul>
<div class="tab-content margin_bottom_20" id="pills-tabContent" style="background: #fff;height:100vh;">
  <div class="tab-pane active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  
  
<div class="col-md-12 margin_to_20 margin_bottom_20 ">


<div class="col-md-4" style="padding:0px;">
<?php  if($requests->r_images){ ?>
	<style>
	.websitr_slider_li{
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
.webistr_inner{height: 70vh;
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
				@foreach (json_decode($requests->r_images) as $key=>$img) 
                    <li class="col-sm-12 nopad websitr_slider_li">
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
                                <div class="carousel-inner webistr_inner">
								 
								@foreach (json_decode($requests->r_images) as $key=>$img)
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
<?php } ?>
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
	
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img  class="fa_images" src="https://materialwala.com/buildsand/site_assets/newapp/owner_1.png"   /></div><div class="col-md-9"><span><b>Vendor Name</b></span><br><span style="color:#42b0c7;"> {{ $requests->vendor_name }}</span></div></div>
  
  </div>
  <div class="col-md-4">
 
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img   class="fa_images"  src="https://materialwala.com/buildsand/site_assets/newapp/Owner_contact_2.png" /></div><div class="col-md-9"><span><b>Vendor Adderss</b></span><br><span  style="color:#42b0c7;"> {{ $requests->address }}</span></div></div>
 
  
  </div>
  <div class="col-md-4">
	 
	<div class="col-md-12" >	<div class="col-md-3"><img  class="fa_images"  src="https://materialwala.com/buildsand/site_assets/newapp/Vendor_contract_3.png" /></div><div class="col-md-9"><span><b>Vendor Contact</b></span><br><span  style="color:#42b0c7;">{{ $requests->vendor_phone }}</span></div></div>
  </div>
  
  
  </div>



</div>

<div class="col-md-12  ">
  <div class="col-md-4">
  </div>
  <div class="col-md-8" style="font-size: 13px;">
  <div class="col-md-4">
	
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img  class="fa_images" src="https://materialwala.com/buildsand/site_assets/newapp/Vendormail_4.png" /></div><div class="col-md-9"><span><b>Email Id</b></span><br><span  style="color:#42b0c7;">{{ $requests->vendor_email }}</span></div></div>
  
  </div>
  <div class="col-md-4">
 
	<div class="col-md-12" style="border-right:1px solid #c5c5c5;">	<div class="col-md-3"><img class="fa_images" src="https://materialwala.com/buildsand/site_assets/newapp/Vendor_Contract_5.png" /> </div><div class="col-md-9"><span><b>View Rental Contract</b></span><br> </div></div>
 
  
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
		  
			<div class="col-md-2"><b>Rental Start Date</b><div class="contract">{{ $requests->rental_start_date }}</div></div>
			<div class="col-md-2"><b>Rental End Date</b><div  class="contract">{{ $requests->rental_end_date }}</div></div>
			<div class="col-md-2"><b>No Of Days</b><div  class="contract">---</div></div>
			<div class="col-md-2"><b>Rental Cost</b><div  class="contract">{{ $requests->rental_cost }}</div></div>
			<div class="col-md-2"><b>Billing Cycle</b><br><div  class="contract">{{ $requests->billing_cycle }}</div></div>
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
<?php  if($requests->r_images){ ?>
<div class="row">
            <div class="col-sm-3" id="slider-thumbs" style="margin-left:-25px;">
                <!-- Bottom switcher of slider -->
                <ul class="hide-bullets "> 
				@foreach (json_decode($requests->r_images) as $key=>$img) 
                    <li class="col-sm-12 nopad websitr_slider_li">
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
                                <div class="carousel-inner webistr_inner">
								 
								@foreach (json_decode($requests->r_images) as $key=>$img)
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
        </div><?php } ?>
</div>

<div class="col-md-1 vachilr_document_align float-left" ><p style="display:none;">Vechile Document</p>
</div>
<div class="col-md-7 document_typr_border nopad">
<div class="col-md-12  vachilr_background_color">
<div class="col-md-5"><span>Document Type</span></div>
<div class="col-md-3">Start Date</div>
<div class="col-md-3"> End Date</div></div>

<div class="col-md-12 margin_to_20">
<div class="col-md-5"><div class="col-md-6">Vechile Rc </div><div class="col-md-2"><img src="https://materialwala.com/buildsand/site_assets/newapp/veh-rc.png"></div> <div class="col-md-4">Validity</div></div>
<div class="col-md-3"> {{ $requests->rc_start_date }}</div>
<div class="col-md-3"> {{ $requests->rc_end_date }}</div>
<div class="col-md-1"> View</div>


</div>
<div class="col-md-12 margin_to_20" style="background-color:f7f6ff;">
<div class="col-md-5"><div class="col-md-6">Insurance </div><div class="col-md-2"><img src="https://materialwala.com/buildsand/site_assets/newapp/insurance.png"></div><div class="col-md-4">Validity</div></div>
<div class="col-md-3"> {{ $requests->ins_start_date }}</div>
<div class="col-md-3"> {{ $requests->ins_end_date }}</div>
<div class="col-md-1"> View</div>
</div>
<div class="col-md-12 margin_to_20">
<div class="col-md-5"><div class="col-md-6">Road Tax </div><div class="col-md-2"><img src="https://materialwala.com/buildsand/site_assets/newapp/tax.png"> </div><div class="col-md-4">Validity</div></div>
<div class="col-md-3"> {{ $requests->tax_start_date }}</div>
<div class="col-md-3"> {{ $requests->tax_end_date }}</div>
<div class="col-md-1"> View</div>
</div>
<div class="col-md-12 margin_to_20" style="background-color:f7f6ff;">
<div class="col-md-5"><div class="col-md-6">Road Permit </div><div class="col-md-2"><img src="https://materialwala.com/buildsand/site_assets/newapp/Road_perrmet.png"> </div><div class="col-md-3">Validity</div></div>
<div class="col-md-3"> {{ $requests->permit_end_date }}</div>
<div class="col-md-3"> {{ $requests->permit_start_date }}</div>
<div class="col-md-1"> View</div>

</div>
<div class="col-md-12 margin_to_20">
<div class="col-md-5"><div class="col-md-6">Fitness / Break </div><div class="col-md-2"><img src="https://materialwala.com/buildsand/site_assets/newapp/fintenss_break.png"> </div><div class="col-md-4">Validity</div></div>
<div class="col-md-3"> {{ $requests->fitness_start_date }}</div>
<div class="col-md-3"> {{ $requests->fitness_end_date }}</div>
<div class="col-md-1"> View</div>

</div>
<p>&nbsp;</p>
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
    var sp_prr_no = $("#sp_prr_no").val(); 
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
			sp_prr_no: sp_prr_no,
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
				 html+='<option value='+value.sparr_type+'>'+value.sparr_type+'</option>'; 
			 });
			 
			$(".sptypediv").html(html);	 
        },
       
    }); 
 });
 </script>
@php
$segment = request()->segment(3);
@endphp
@if($segment)
	<script>
/* $("#dprdetails_active").addClass("active");
$("#dprdetails").addClass("active in");
$("#dprdetails_inactive").removeClass("active");
$("#pills-home").removeClass("active"); */
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>  



<script>
$('.timepickernew').timepicker();
            
</script>
			  <script>
function myFunction1(id) {
	
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
	
	$(".showall").show();
	$(".hideall").hide();
	$(".hidebutton"+id).hide();
	$('.showbutton'+id).show();
	$("#start_timr_show-"+id).focus();
	$("#start_timr_show-"+id).css("display","none");
	$("#start_timr_hide-"+id).css("display","block");

	$("#start_reading_show-"+id).css("display","none");
	$("#start_reading_hide-"+id).css("display","block");

	$("#end_reading_show-"+id).css("display","none");
	$("#end_reading_hide-"+id).css("display","block");

	$("#end_timr_show-"+id).css("display","none");
	$("#end_timr_hide-"+id).css("display","block"); 
}

function savedetail(id){
	
	
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
		 
		var timeStart = new Date("01/01/2007 " + start_time);
		var timeEnd = new Date("01/01/2007 " + end_time);

		var diff = (timeEnd - timeStart) / 60000; //dividing by seconds and milliseconds

		var minutes = diff % 60;
		var hours = (diff - minutes) / 60;     
		
		
		//var total_working = (end_time - start_time);
		//var total_working1 = Math.round(total_working,2);
		$("#total_working"+id).html(hours);
		alert("Are you sure want to proceed ? "); 
		jQuery.ajax({
	    type: 'POST',
        url:'/equipments/updatr_dpr',

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
		$("#start_timr_show-"+id).css("display","none");
		$("#start_timr_hide-"+id).css("display","block");

		$("#start_reading_show-"+id).css("display","none");
		$("#start_reading_hide-"+id).css("display","block");

		$("#end_reading_show-"+id).css("display","none");
		$("#end_reading_hide-"+id).css("display","block");

		$("#end_timr_show-"+id).css("display","none");
		$("#end_timr_hide-"+id).css("display","block"); 
	}  
}
</script>
@endif
@endsection

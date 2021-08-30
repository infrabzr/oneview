@extends('layouts.vendoradmin')
@section('content')

<style>
.subtext p {
    font-size: 10px;
    font-weight: 600;
	    color: #000;
}
.mainh1{
	font-size: 18px;
    bottom: 0;
    display: inline-block;
    font-weight: 400;
    -webkit-transform: rotate( 
-90deg
 );
    transform: rotate( 
-90deg
 );
    -webkit-transform-origin: left;
    transform-origin: left;
    white-space: nowrap;
    width: 0px;
    margin-top: 190%;
}
.ratio1 {
    margin-top: 2%;
    background: #fff;
       padding-bottom: 1%;
	   border: 1px solid #a4a4a4;
	       margin-left: 4%;
}
.c100 > span {
cursor: pointer!important;
}
.c100 {
    cursor: pointer!important;
}
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
	vertical-align:middlie;
}
.right_side{
	float:right;
	    margin-top: 0px;
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
	font-size:30px;  
	color:#544bc1;
	vertical-align: middle;
	margin-bottom: 6px;
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
.subtext p {
    font-size: 10px;
}
}
.line1 {
      width: 36%;
    height: 0;
    border: 1px solid #C4C4C4;
    margin: 3px;
    color: #e0e0e7!important;
    display: inline-block;
    margin-left: 2%;
    margin-right: 1%;

}
.new_css{
	background: linear-gradient( 
79deg
 , rgba(101,77,188,1) 23%, rgba(168,42,167,1) 100%)!important;
    border-radius: 20px!important;
    border: none!important;
    color: #fff!important;
    font-size: 12px!important;
    width: 90px!important;
}
.tab6{
	width:16%;
	float: left;
	margin-right: 2%;
    margin-left: 2%;
	cursor: pointer;
	border:none!important;
	text-align: center;
	height: 22vh;
	border-radius: 8%;
	box-shadow:none!important;
}
#chartdiv {
  width: 100%;
  height: 250px;
}
#samipaicontainerchart {
    height:150px;
}
#samipaicontainerchart1 {
    height: 150px;
}

#samipaicontainerchart2 {
    height: 150px;
}
.highcharts-title{
	font-size:12px!important;
	color:#000!important;
}
svg{
	background:#fff!important;
}
.highcharts-credits{
	display:none!important;
}
.reports{text-align: center;
    font-size: 14px;
    margin: 1%;
    color: #000;
    font-weight: 600;
	margin:0px;
	padding:0px;
	}
	.reportsdiv{
		background-color:#fff;
	}
	.canvasjs-chart-credit{
		display:none;
	}
	.oee{
		text-align:center;font-size: 14px;font-weight: 600;padding: 0px;margin: 0px;
	}
	.c100{
		margin-left: 18px!IMPORTANT;
	}
</style>
<body>



   
  <div class="col-md-12 nopad" >
  <div class="col-md-7 nopad" >
   <div class="col-md-12 nopad" style="background-color: #fff;padding-bottom: 2%!important;padding-top: 2%!important;">
	<div class="col-md-1" style="
    background: #644dbe;
	margin: 0;
    padding: 0;
    text-align: center;
    color: #fff;   
"><h1 class="mainh1" style=" ">DPR STATUS</h1></div>
<div class="col-md-11 reportsdiv">
<h3 class="reports">REPORTS</h3>
<?php 
if($total_equipment_n){
$lexpiry = ceil(($lexpiry_count/$total_equipment_n)*100);
}else{
$lexpiry = 0;	
}
?>
						<a href="{{ URL('/vendorequipment')}}?var=expiry"><div class="tab6" style="background-color:white;padding: 0px !important;">
						<div class="notifyname1" > <span style="background:#fff;"></span></div>
							<div class="col-md-12 nopad">
							<div class="col-md-12 card-body box-profile">
							<div class="c100 p<?php echo $lexpiry; ?> margin_left_24">
								<span><?php echo $lexpiry; ?>%</span>
								<div class="slice">
									<div class="bar" style="border: 0.08em solid #34a853;"></div>
									<?php if($lexpiry <=50){?>
									<div class="fill" ></div>
									<?php }else{ ?>
									<div class="fill" style="border: 0.08em solid #34a853;"></div>
									<?php } ?>
								</div>
							</div>
							</div>
							<div class="subtext">
								<p>Equipment Approaching Rental Lease Expiry</p>
							</div>
							</div>
		
						
						
					</div></a> <a href="{{ URL('/vendorequipment?var=dexpiry')}}">
					<div class="tab6" style="background-color:white;padding: 0px !important;">
					<div class="notifyname2"> <span style="background:#fff;"></span></div>
							<div class="col-md-12 nopad">
							<div class="col-md-12 card-body box-profile">
							
							
							<?php 
							if($total_equipment_n){
							$dexpiry = ceil(($dexpiry_count/$total_equipment_n)*100); }else{
							$dexpiry = 0;	
							} ?>
						 <div class="c100 p<?php echo $dexpiry; ?> margin_left_24" >
								<span><?php echo $dexpiry; ?> %</span>
								<div class="slice">
									<div class="bar" style="border: 0.08em solid #fbbc05" ></div>
									<?php if($dexpiry <=50){ ?>
									<div class="fill" ></div>
									<?php }else{ ?>
									<div class="fill" style="border: 0.08em solid #fbbc05;"></div>
									<?php } ?>
								</div>
							</div>
							</div><div class="subtext">
								<p>Document Expiry</p>
							
							</div>
							</div>
		
						
						
					</div></a>
					<a href="{{ URL('/vendorequipment?var=payment')}}"><div class="tab6" style="background-color:white;padding: 0px !important;">
					<div class="notifyname3"> <span style="background:#fff;"></span></div>
							<div class="col-md-12 nopad">
							<div class="col-md-12 card-body box-profile">
							<?php //$breminder = ceil(($bremindercount/$total_equipment_n)*100); ?>
						 <div class="margin_left_24 c100 p0 " >
								<span>0%</span>
								<div class="slice">
									<div class="bar" style="border: 0.08em solid #006d2f"></div>
									<div class="fill"></div>
								</div>
							</div>
							</div><div class="subtext">
								<p>Payment Reminder</p>
							
							</div>
							</div>
		
						
						
					</div></a>
					<a href="{{ URL('/vendorequipment?var=idle')}}"><div class="tab6" style="background-color:white;padding: 0px !important;">
					<div class="notifyname4"> <span style="background:#fff;"></span></div>
							<div class="col-md-12 nopad">
							<div class="col-md-12 card-body box-profile">
								
							<?php 
							if($total_equipment_n){
							$idleequipmentcount = ceil(($idleequipmentcount/$total_equipment_n)*100);}else{
								$idleequipmentcount = 0;
							}
								?>
						 <div class="c100 p<?php echo $idleequipmentcount; ?> margin_left_24">
								<span><?php echo $idleequipmentcount; ?>%</span>
								<div class="slice">
									<div class="bar" style="border: 0.08em solid #ff914d"></div>
									<?php if($idleequipmentcount <= 50){?>
									<div class="fill" ></div>
									<?php }else{ ?>
									<div class="fill" style="border: 0.08em solid #ff914d;"></div>
									<?php } ?>
								</div>
							</div>
							</div><div class="subtext">
								<p>Idle Equipment</p>
							
							</div>
							</div>
		
						
						
					</div></a>
					<a href="{{ URL('/vendorequipment?var=breakdown')}}"><div class="tab6" style="background-color:white;padding: 0px !important;">
					<div class="notifyname5"> <span style="background:#fff;"></span></div>
							<div class="col-md-12 nopad">
							<div class="col-md-12 card-body box-profile">
							<?php
							if($total_equipment_n){
							$brackdownequipmentcount = ceil(($brackdownequipmentcount/$total_equipment_n)*100); }else{
								$brackdownequipmentcount = 0;
							} ?>
						
							<div class="c100 p<?php echo $brackdownequipmentcount; ?> margin_left_24">
								<span><?php echo $brackdownequipmentcount; ?>%</span>
								<div class="slice">
									<div class="bar" style="border: 0.08em solid #e94335"></div>
									<?php if($brackdownequipmentcount <= 50){?>
									<div class="fill" ></div>
									<?php }else{ ?>
									<div class="fill" style="border: 0.08em solid #e94335;"></div>
									<?php } ?>
								</div>
							</div>
							
							
							</div><div class="subtext">
								<p>Equipment Breakdown</p>
							
							</div>
							</div>
		
						
						
					</div></a>
						
       
    </div>
    </div>
	<div class="col-md-12 nopad" style="background-color: #eaeaea;padding-bottom: 2%!important;padding-top: 2%!important;">
		<div class="col-md-6 nopad" style="background-color:#a6a6a6;">
		<div id="chartContainer" style="height: 300px; width: 100%;">
		</div></div>
		<div class="col-md-6 nopad" style="background-color:#a6a6a6;"><div id="equipmentstatus" style="height: 300px; width: 100%;"></div></div>
		</div>
		<div class="col-md-12 nopad" style="background-color: #fff;padding-bottom: 2%!important;padding-top: 2%!important;">
		<div class="col-md-6 nopad">
		<div id="areachartContainer" style="height: 400px; width: 100%;">
		</div></div>
		<div class="col-md-6 nopad" style="background: #fff;">
		
		<div class="col-md-12 nopad" >
		<div class="col-md-4"><div id="samipaicontainerchart"></div></div>
		<div class="col-md-4"><div id="samipaicontainerchart1"></div></div>
		<div class="col-md-4"><div id="samipaicontainerchart2"></div></div>
		</div>
		<h3 class="oee">OEE (Overall Equipment Effectiveness)</h3>
		<div id="chartdiv" style="background: #fff;"> </div>
		
		</div>
		</div>
		</div>
		<div class="col-md-5 nopad">
		<div class="col-md-12 nopad">
		<div class="alertsandnotifications">
		<h3 class="alertsnotificationcss"> ALERTS & NOTIFICATIONS <i class="fa fa-bell" aria-hidden="true" ></i>
</h3>
		</div>
		<div class="col-md-5 nopad">
		<div class="emicss">
		<h3 class="emis"><span ><i class="fa fa-credit-card emicardbg1" aria-hidden="true"></i></span> EMI'S </i>
</h3>
<h1 class="emih1">15  <sub style="font-size:28px;">L</sub></h1>
<p class="emip">TOTAL EMI'S TO BE PAID</p>
<p class="emipsecond">10 EMI'S are due on <span style="color:#ff9756;font-weight:600;">03 Aug 2021</span></p>
<p class="emipthree">8 EMI'S are due on <span style="color:#000;font-weight:600;">07 Aug 2021</span></p>
<p class="emipfour">7 EMI'S are due on <span style="color:#fcc526;font-weight:600;">10 Aug 2021</span></p>
<p class="btn btn-view">View Now</p>
		</div>
		<div class="requestcss">
		<div class="requestcssone">
		<h3><span> <i class="fa fa-paper-plane span-paper-plane" aria-hidden="true"></i></span > Requests <span style="float:right;margin-right: 9%;color: #000;"></span></h3>
		 <div class="koh-faq-question">
        <i class="fa fa-cog" aria-hidden="true"></i>
        <span class="koh-faq-question-span"> Spare Parts </span><span class="sparepartscss"><?php echo count($sparecount); ?></span>
		<i class="fa fa-chevron-right" aria-hidden="true"></i>
      </div>
      <div class="koh-faq-answer" style="margin-top: 11%;margin-bottom: 11%;">
        <?php foreach($sparepartsdata as $sparepartscountdata){  ?>
		<p class="emipthree2"><?php echo $sparepartscountdata->name; ?> <span class="sparcount"><?php echo $sparepartscountdata->count; ?></span></p><?php } ?>
		<p class="btn btn-view"><a href="{{url('/spareparts')}}" style="color:#fff;">View Now</a></p>
      </div>
		</div>
		</div>
		</div>
		<div class="col-md-7 nopad">
		<div class="row rightside" >
		<div class="col-md-12 nopad" style="background: #fff;">
		<h3 class="emis"><span ><i class="fa fa-file-text-o emicardbg1" aria-hidden="true"></i>
</span> Ready for invoicing </i>
</h3>
<?php 
$i=1;
foreach($vendorprojects as $newdata){	
?>
		<p class="emipthree1"><?php  echo $newdata->project_name; ?> <span class="sparcount1">Rs. <?php  echo number_format($newdata->v_rental_cost);  ?>   <span class="view"><a href="{{url('/vendor/readyforinvoice')}}">View</a></span></span>  </p>
<?php } ?>
		
		<p style="text-align: center;"><button class="btn btn-view"><a href="{{url('/vendor/readyforinvoice')}}" style="color:#fff;">View Now</a></button></p>
		</div>
		<div class="col-md-12 nopad" style="color:#d9d9d9;">
		<h3 class="emis"><span ><i class="fa fa-money emicardbg1" aria-hidden="true"></i>
</span> Pending Payment </i>
</h3>
<?php 
foreach($pendingpaymnets as $pendingpaymnetsdata){
?>
		<p class="emipthree1"><?php echo $pendingpaymnetsdata->company_name; ?> <span class="sparcount1">Rs. <?php echo $pendingpaymnetsdata->total; ?>   <span class="view"><a href="{{url('/vendor/readyforinvoice')}}">View</a></span></span>  </p>
<?php  } ?>

		</div>
		<div class="col-md-12 nopad" style="background: #fff;">
		<h3 class="emis"><span ><i class="fa fa-bar-chart emicardbg1" aria-hidden="true"></i>
</span> DPR Uploading Pending </i> <span style="color:#ff1616;font-weight:bold;">{{$dprpening_count[0]->dprpending}}</span>
</h3>
		</div>
		<div class="col-md-12 nopad" style="color:#d9d9d9;">
		<h3 class="emis"><span ><i class="fa fa-search emicardbg1" aria-hidden="true"></i>
</span> Regular Checkup </i><span style="color:#ff1616;font-weight:bold;">{{ $dalycheckups_count[0]->total - $dalycheckups_count[0]->dalycheckup}}</span>/<span style="color:#000;font-weight:bold;">{{$dalycheckups_count[0]->total}}</span>
</h3>
		</div>
		<div class="col-md-12 nopad" style="background: #fff;">
		<h3 class="emis"><span ><i class="fa fa-bar-chart emicardbg1" aria-hidden="true"></i>
</span> Ready for service </i><span style="color:#ff1616;font-weight:bold;">{{ $readyforservice_count[0]->readyforservice}}</span>
</h3>
<p class="emipthree1">Scheduled <span class="sparcount1">30   <span class="view">View</span></span>  </p>
		<p class="emipfour1"> Delayed <span class="sparcount1">10   <span class="view">View</span></span></p>
<div class="circle_in" style="margin-left: 15%;">
<!--<div class="badge2 ">12</div>
<div class="badge1 ">8</div>-->
<div class="firstimage col-md-6" style="margin-left: -10%;">
<img src="{{url('images/green.png')}}">
<div class="centered">12</div>

</div>
<div class="firstimage col-md-6">
<img src="{{url('images/red.png')}}">
<div class="centered">19</div>
</div>
<div class="col-md-6 nopad">
<p class="paragraph">General Serive<p>
		</div>
		<div class="col-md-6 nopad">
<p class="paragraph">Critical Serive<p>
		</div>
		</div>
		
		</div>
		</div>
		</div>
		
		</div>
		</div>
		</div></body>
		<script>
		$(document).ready(function(){
    $(".koh-faq-answer").show();
});
		$(document).ready(function() {
			$( ".koh-faq-question" ).click(function() {
  //  $(this).parent().find(".koh-faq-answer").toggle();
	$( ".koh-faq-answer" ).toggle();
    $(this).find(".fa-chevron-right").toggleClass('active');
  });
});
		</script>
		<style>
		/*toggle*/
		.paragraph{
			font-size:12px;
			text-align:left;
		}
		.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
	color: #fff;
}
		   #burst-8 {
      background: red;
      width: 80px;
      height: 80px;
      position: relative;
      text-align: center;
      transform: rotate(20deg);
    }
    #burst-8:before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      height: 80px;
      width: 80px;
      background: red;
      transform: rotate(135deg);
    }
		
		
		.badge2 {
  height: 100px;
  width: 100px;
  display: table-cell;
  text-align: center;
  vertical-align: middle;
  border-radius: 50%;
  background: #34a853;
}	.badge1{
  height: 100px;
  width: 100px;
  display: table-cell;
  text-align: center;
  vertical-align: middle;
  border-radius: 50%;
  background: #ff1616;
}
		h3.emis {
    font-size: 18px;
    margin-left: 6%;
	color: #000;
}
		.rightside{
			text-align: center;
    border-top: 10px solid #8a43e4;
    border-left: 10px solid #8a43e4;
    border-bottom: 10px solid #8a43e4;
    border-right: 20px solid #8a43e4;
    margin: 0px;
    font-size: 20px;
    padding: 3%;
    font-weight: 600;
	padding: 0px;
		}
		span.view {
    background: #ccc;
    padding-left: 4px;
    padding-right: 4px;
    color: #000;
}
			span.sparcount1 {
    float: right;
    margin-right: 10%;
}
		.emipfour1 {
    text-align: left;
	 margin-left: 10%;
    font-size: 11px;
    font-weight: normal;
	color: #000;
}
		.emipthree1 {
    font-size: 11px;
    font-weight: normal;
    border-bottom: 1px dotted #000;
    text-align: left;
    margin-left: 10%;
	color: #000;
}
		.koh-faq-question {
    margin-top: 11%;
    margin-bottom: 9%;
}
		span.sparcount {
    float: right;
    margin-right: 30%;
}
		span.sparepartscss {
    margin-left: 10%;
    font-size: 12px;
    background: #8a43e4;
    padding: 2%;
    border-radius: 50%;
    color: #fff;
    font-weight: normal;
}
		i.fa.fa-cog {
    font-size: 18px;
    color: #000;
    float: left;
    margin-top: 5%;
}
		.fa-chevron-right{
			color:#000;
		}
		.koh-faqs-page-title {
  font-family: Nexa W01 Heavy;
  font-size: 30px;
  color: #04202E;
  font-weight: 700;
}

.koh-faq-question-span {
  font-family: Helvetica Neue LT Pro Roman !important;
  font-size: 16px !important;
  color: #000 !important;
  font-weight: 700 !important;
  display: inline-block;
}

.koh-faq-answer {
  font-family: Helvetica Neue LT Pro Roman;
  color: #000;
  font-weight: 400;
  display: none;
}

.icon {
  font-size: 10px;
  padding-right: 5px;
}

.fa {
  transition: transform .2s;
}

.fa.active {
  transform: rotateZ(90deg);
}
		
		.span-paper-plane{
			background: #fff;
			border-radius: 50%;
			margin-right:7%;
			padding:10px;
			
		}
		.fa-paper-plane{
			color: #000!important;
    font-size: 12px;	
		}
		.requestcssone h3{
							color:#000;
							padding-top: 8%;
							padding-bottom: 8%;
							background: #d9d9d9;
							margin-left: -4%;
							margin-right: -4%;
							margin-top: -3%;
						}
		.btn-view{
			    color: #fff;
				background-color: #6422b8;
				border-color: #6422b8;
		}
		.emip {
    text-align: center;
    font-size: 10px;
    font-weight: normal;
}
.emipsecond{
	text-align: center;
    font-size: 12px;
    font-weight: normal;
	border-bottom:1px dotted #000;
}
.emipthree2{
	text-align: left;
	margin-left:10%;
    font-size: 12px;
    font-weight: normal;
	border-bottom:1px dotted #000;
}.emipthree{
	text-align: center;
    font-size: 12px;
    font-weight: normal;
	border-bottom:1px dotted #000;
}.emipfour2{
	text-align: left;
	margin-left:10%;
    font-size: 12px;
    font-weight: normal;
}.emipfour{
	text-align: center;
    font-size: 12px;
    font-weight: normal;
}
		.emicardbg{
			background:#d9d9d9;
			border-radius:50%;
		}.emicardbg1{
			background:#d9d9d9;
			padding:10px;
			color:#000;
			border-radius: 50%;
		}
		.fa-credit-card{
			    color: #000!important;
				font-size: 11px;
				vertical-align: middle;
				margin-top: -5%;
				font-weight: 600;
		}
		.emis{
			text-align: left;
		}
		.emih1{
			font-size:72px;
			font-weight:600;
			margin: 0;
		}
		sub {
    bottom: 0em;
	color:#8a43e4;
}
		.fa-bell{
					float: right;
					color:#70d7ff;
					font-size:20px;
				}
		.alertsnotificationcss{	
								text-align: center;
								border-top: 10px solid #8a43e4;
								border-left: 10px solid #8a43e4;
								border-bottom: 20px solid #8a43e4;
								border-right: 10px solid #8a43e4;
								margin: 0px;
								font-size: 20px;
								padding: 3%;
								font-weight: 600;
							}
			.emicss{
				text-align: center;
								border-top: 10px solid #8a43e4;
								border-left:  10px solid #8a43e4;
								border-bottom: 10px solid #8a43e4;
								border-right: 20px solid #8a43e4;
								margin: 0px;
								font-size: 20px;
								padding: 3%;
								font-weight: 600;
			}
			.requestcss{
				text-align: center;
								
								border-left:  10px solid #8a43e4;
								border-bottom: 10px solid #8a43e4;
								border-right: 20px solid #8a43e4;
								margin: 0px;
								font-size: 20px;
								padding: 3%;
								font-weight: 600;
								
			}
		</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
 Highcharts.setOptions({
     colors: ['#fbbc05', '#a6a6a6']
    });
Highcharts.chart('samipaicontainerchart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false,
		plotColor:'#fbbc05',
    },
    title: {
        text: 'Availability Loss',
        align: 'center',
        verticalAlign: 'middle',
        y: 60
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: 'bold',
                    color: 'white'
                }
            },
            startAngle: -90,
            endAngle: 90,
            center: ['50%', '75%'],
            size: '110%'
        }
    },
    series: [{
        type: 'pie',
        name: 'Browser share',
        innerSize: '50%',
        data: [
            ['', 58.9],
            ['', 13.29],
           
        ]
    }]
});
Highcharts.setOptions({
     colors: ['#e94335', '#a6a6a6']
    });
Highcharts.chart('samipaicontainerchart1', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: 'Performance Loss',
        align: 'center',
        verticalAlign: 'middle',
        y: 60
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: 'bold',
                    color: 'white'
                }
            },
            startAngle: -90,
            endAngle: 90,
            center: ['50%', '75%'],
            size: '110%'
        }
    },
    series: [{
        type: 'pie',
        name: 'Browser share',
        innerSize: '50%',
        data: [
            ['', 58.9],
            ['', 13.29],
           
        ]
    }]
});
Highcharts.setOptions({
     colors: ['#4285f4', '#a6a6a6']
    });
Highcharts.chart('samipaicontainerchart2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: 'Quality  Loss',
        align: 'center',
        verticalAlign: 'middle',
        y: 60
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: 'bold',
                    color: 'white'
                }
            },
            startAngle: -90,
            endAngle: 90,
            center: ['50%', '75%'],
            size: '110%'
        }
    },
    series: [{
        type: 'pie',
        name: 'Browser share',
        innerSize: '50%',
        data: [
            ['', 58.9],
            ['', 13.29],
           
        ]
    }]
});

</script>
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv", am4charts.PieChart);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.data = [
  {
    country: "working",
    value: 401
  },
  {
    country: "idle",
    value: 300
  }
];
chart.radius = am4core.percent(70);
chart.innerRadius = am4core.percent(40);
chart.startAngle = 180;
chart.endAngle = 360;  

var series = chart.series.push(new am4charts.PieSeries());
series.dataFields.value = "value";
series.dataFields.category = "country";

series.slices.template.cornerRadius = 10;
series.slices.template.innerCornerRadius = 7;
series.slices.template.draggable = true;
series.slices.template.inert = true;
series.alignLabels = false;

series.hiddenState.properties.startAngle = 90;
series.hiddenState.properties.endAngle = 90;

chart.legend = new am4charts.Legend();

}); // end am4core.ready()
</script>

<script>

 window.onload = function () {
CanvasJS.addColorSet("areachartContainer",
                [//colorSet Array

                "#9b70d1",
                "#773ec1",
                "#3a1866",              
                ]);
var chart = new CanvasJS.Chart("areachartContainer", {
	  colorSet: "areachartContainer",
	animationEnabled: true,
	title:{
		text: "Financials",
		 fontColor: "#000",
		 fontWeight: "Bold",
         fontSize: 16,
		 fontFamily: "Whitney-Medium",
	},
	axisY :{
		includeZero: false,
		prefix: "₹"
	},
	toolTip: {
		shared: true
	},
	legend: {
		fontSize: 13
	},
	axisY: {
    gridThickness: 0,
    stripLines: [
      {
        value: 0,
        showOnTop: true,
        color: "gray",
        thickness: 2
      }
    ]
 },
	data: [{
		type: "splineArea",
		showInLegend: true,
		name: "Total Revenue",
		yValueFormatString: "$#,##0",
		xValueFormatString: "MMM YYYY",
		dataPoints: [
			{ x: new Date(2021, 2), y: 15 },
			{ x: new Date(2021, 3), y: 25 },
			{ x: new Date(2021, 4), y: 55 },
			{ x: new Date(2021, 5), y: 79 },
			{ x: new Date(2021, 6), y: 100 },
			{ x: new Date(2021, 7), y: 126 },


		]
 	},
	{
		type: "splineArea", 
		showInLegend: true,
		name: "EMI",
		yValueFormatString: "$#,##0",
		dataPoints: [
			{ x: new Date(2021, 2), y: 7 },
			{ x: new Date(2021, 3), y: 19 },
			{ x: new Date(2021, 4), y: 45 },
			{ x: new Date(2021, 5), y: 42 },
			{ x: new Date(2021, 6), y: 70 },
			{ x: new Date(2021, 7), y: 98 },


		]
 	},
	{
		type: "splineArea", 
		showInLegend: true,
		name: "Maintenance",
		yValueFormatString: "$#,##0",     
		dataPoints: [
			{ x: new Date(2021, 2), y: 1 },
			{ x: new Date(2021, 3), y: 11 },
			{ x: new Date(2021, 4), y: 26 },
			{ x: new Date(2021, 5), y: 36 },
			{ x: new Date(2021, 6), y: 40 },
			{ x: new Date(2021, 7), y: 80 },


		]
 	}
	]
});
chart.render();

	  var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	backgroundColor: "#eaeaea",
	title: {
		text: "Equipment Categories ",
		 fontColor: "#000",
		 fontWeight: "bold",
         fontSize: 16,
		 fontFamily: "Whitney-Medium",
		  
	},
	subtitles:[
		{
		text: "Total: <?php echo $piechartdatatotal[0]->Total; ?>      Categories:<?php echo count($piechartdata); ?>",
		fontColor: "#000",
		 fontWeight: "normal",
         fontSize: 12,
		 fontFamily: "Whitney-Medium",
		}
		],
	data: [{
		type: "pie",
		startAngle: 240,
		indexLabel: "{label} {y}",
		dataPoints: [
	<?php foreach($piechartdata as $piedata){ ?>
	{y: <?php echo $piedata->Total; ?>, label: "<?php echo $piedata->sub_category_name;  ?>"},
	<?php } ?>
			
		
			
			
		]
	}]
});
chart.render(); 







    var chart = new CanvasJS.Chart("equipmentstatus",
    {
		backgroundColor: "#eaeaea",
      title:{
        text: "Equipment Status",
		 fontColor: "#000",
		 fontWeight: "bold",
         fontSize: 16,
		 fontFamily: "Whitney-Medium",
      },
      axisY: {
    gridThickness: 0.1,
    stripLines: [
      {
        value: 0,
        showOnTop: true,
        color: "gray",
        thickness: 2
      }
    ]
 },
      data: [
      {
        type: "column",
        showInLegend: true,
        legendText: "Total",
        color: "#fbbc05",
        dataPoints: [
		{ y: <?php  if( count($barchartdata)==2){ echo $barchartdata[0]->Total + $barchartdata[1]->Total; }else  if(  count($barchartdata)==1){  echo $barchartdata[0]->Total; }else if( count($barchartdata)==1){  echo $barchartdata[1]->Total; }else{ echo 0; } ?>, label: "Total Equipment"},
      { y: <?php if(count($barchartdataUnengaged)!=0){  echo $barchartdataUnengaged[0]->Total;
	  }else{ echo 0; } ?>, label: "Unengaged"},
       { y: <?php if(count($barchartdatarentedout)!=0){ echo $barchartdatarentedout[0]->Total; }else{ echo 0; } ?>, label: "Rented Out"},
        
      
     
        ]
      },
      {
        type: "column",
        showInLegend: true,
        legendText: "Working",
        color: "#34a853",
        dataPoints: [
      
        { y:  <?php echo $workingdata[0]->total; ?>, label: "Total Equipment"},
        { y: <?php echo $workingdata[0]->unengagedcount; ?>, label: "Unengaged"},
        { y: <?php echo $workingdata[0]->rentedoutcount; ?>, label: "Rented Out"},
       
        ]
      },
      {
        type: "column",
        showInLegend: true,
        legendText: "Breakdown",
        color: "#e94335",
        dataPoints: [
   
        { y: <?php echo $breakdowndata[0]->total; ?>, label: "Total Equipment"},
        { y: <?php echo $breakdowndata[0]->unengagedcount; ?>, label: "Unengaged"},
        { y: <?php echo $breakdowndata[0]->rentedoutcount; ?>, label: "Rented Out"},
       
        ]
      }
      ]
    });

chart.render();
}
</script>
</body>
</html>
@endsection
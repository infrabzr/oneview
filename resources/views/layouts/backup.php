  <html lang="en">
<head>
<title>Infra Bazaar - 1View Dashboard</title> 
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}"> 
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">  
<link rel="stylesheet" href="{{ asset('css/newapp_header.css?v=0.1') }} ">

<script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>  
<link rel="stylesheet" href="{{ asset('css/circle.css') }}">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<style>
.headingforpop{
	background: #f5f5f5;    margin: 1px;text-align: center;
}
.tab6 {
    width: 16%;
    background-color: white;
    box-shadow: #000 0px 2px 24px -9px;
    height: 50px;
    border-radius: 11px;
    float: left;
    margin-right:5px;
    margin-left:5px;
    cursor: pointer;
}
.my_dashboard_css{
	padding: 0;
    border-radius: 6px;
    height: 50px;
    background: linear-gradient( 
95deg
 , rgba(79,74,194,1) 23%, rgba(151,83,175,1) 100%);
    padding-top: 10px;
}
.my_dashboard_css span {
    color: #fff;
    font-size: 13px;
}
.ongoing_projects_css span, .equipment_details_css span, .request_equipment_css span{
	color :#6a4dbb;
	font-size: 13px;
}
.col-md-12.ongoing_projects_css, .equipment_details_css, .request_equipment_css {
    vertical-align: middle;
    margin-top: 5%;
}
.my_dashboard_css i.fa.fa-tachometer {
    font-size: 29px;
}
.request_equipment_css .fa {
	font-size: 29px;
	color:#6a4dbb;
}
.count_css{
	background: #6579c7;
    padding: 3%;
    border-radius: 8px;
    color: #fff!important;
    margin-left: 4%;
}
#activebackground{
	padding: 0;
    border-radius: 6px;
    height: 50px;
    background: linear-gradient( 
95deg
 , rgba(79,74,194,1) 23%, rgba(151,83,175,1) 100%);
    padding-top: 10px;
	margin-top: 0%;
	
}
#activebackground span, #activebackground .fa {
	color:#fff!important;
}
</style>
<?php
$role = Auth::user()->role;
 ?>
<header>
<div class="row" style="padding-left:15px;padding-right:15px;background-image: linear-gradient(to right, #504BC3 , #9853B0 80%);">
<div class="row">
	<div class="col-md-12">			
		<div class="col-md-12" style="text-align:right">
		<a href="{{ url('/home/vendor_equipmentdetails') }}">
		<img style="float:left;width: 7%;margin-top: 5px;" src="https://materialwala.com/buildsand/site_assets/images/logo.png">
		</a>
		<span style="color: #fff;">Name: {{ Auth::user()->name }} &nbsp;&nbsp;&nbsp;&nbsp; - </span>&nbsp;&nbsp;&nbsp;&nbsp;  <span style="color: #fff;">  <?php if($role==1){ echo "Senior Management"; }else if($role==2){ echo "Super Admin";}else if($role==3){ echo "Senior Role"; }else if($role==4){ echo "Field Supervisor"; }else if($role==5){ echo "Vendor"; }elseif($role==6){ echo "Finance";} ?></span><span style="color: #fff;"> &nbsp;&nbsp;&nbsp;&nbsp;  Vendor id: #{{$role = Auth::user()->id }}</span>
		<input type="text" class="searchinput" style="color:black" id="fname" name="search" placeholder="Search"></input>
		<i class="fa fa-snowflake-o"></i> 
 
		 
		  
	
		<span class="dropdown">
			<i class="dropdown-toggle fa fa-bell-o" data-toggle="dropdown"  ></i>  
				<ul class="dropdown-menu mosttop">
				   <li class="headingforpop"><a href="#">Notifications</a></li>
				  <li><a href="#">This is a Dummy Text</a></li>
				  <li><a href="#">This is a Dummy Text</a></li>
				  <li><a href="#">This is a Dummy Text</a></li>
				  <li><a href="#">This is a Dummy Text</a></li>
				</ul>
		  </span>
		<span class="dropdown">
			<i class="dropdown-toggle fa fa-commenting-o" data-toggle="dropdown"  ></i>  
				<ul class="dropdown-menu mosttop">
				  <li class="headingforpop"><a href="#">Messages</a></li>
				  <li><a href="#">This is a Dummy Text</a></li>
				  <li><a href="#">This is a Dummy Text</a></li>
				  <li><a href="#">This is a Dummy Text</a></li>
				  <li><a href="#">This is a Dummy Text</a></li>
				</ul>
		  </span>
		  	 
			<i class="fa fa-th-large"></i>  
				 
		<span class="dropdown">
			<i class="dropdown-toggle fa fa-user-o" data-toggle="dropdown"  ></i>  
				<ul class="dropdown-menu mosttop">
				  <li class="headingforpop"> {{ Auth::user()->name }} </li>
				  <li><a href="#">Profile</a></li>
				  <li><a href="#">Settings</a></li>
				  <hr style="margin: 5px;">
				  <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li> 
				</ul>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
				
		  </span>
		</div>
	</div>
</div>
<script>
$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');


  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass("show");
  });


  return false;
});
 $(".subMenu").click(function(){
    $(".dropdown-menu1").toggle();
  });
</script>
<style>
.dropdown-menu1{
	display:none;
}
</style>


<div class="row" style="margin-right:15px;margin-left:15px;padding-bottom: 10px;">
	<div class="col-md-12 menu" style="text-align: left;">		
		  <a href="#"><i class="fa fa-bars"><span>Dashboard</span></i></a>
		 
		   <span class="dropdown">
			<i  class="dropdown-toggle fa fa-area-chart" data-toggle="dropdown"><span>Project List</span></i> 
				<ul class="dropdown-menu line">
				  <li><a href="#">Add New Project</a></li>
				  <li><a href="#">Projects List</a></li> 
				  <li><a href="#">Ongoing Projects</a></li> 
				</ul>
		  </span>
		   <span class="dropdown">
			<i  class="dropdown-toggle fa fa-area-chart" data-toggle="dropdown"><span>Project List</span></i> 
				<ul class="dropdown-menu line">
				  <li><a href="#">Add New Project</a></li>
				  <li><a href="#">Projects List</a></li> 
				  <li><a href="#">Ongoing Projects</a></li> 
				</ul>
		  </span>
		  
		  
		   
		  
		   <span class="dropdown">
			<i  class="dropdown-toggle fa fa-file-text-o" data-toggle="dropdown"><span>Equipment</span></i> 
				<ul class="dropdown-menu line">
				  <li><a href="#"  style="color:#ccc;">RTM</a></li>
				  <li><a href="#">Equipment Stats</a></li>
				  <li><a href="{{URL::to('/vendorequipment') }}">Equipment Details</a></li>  
				  <li><a href="{{URL::to('/vendorequipment/create') }}">Add Equipment</a></li>  
				  <li class="subMenu"><a >Spare Parts</a>
				  
				  <ul class="dropdown-menu1" >
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Submenu</a></li>
		  </ul>
				  </li>
				  <li><a href="#">DPR Details</a></li>  
				  <li><a href="#" style="color:#ccc;">Payment Details</a></li>  
				  <li><a href="#" style="color:#ccc;">Spare Management</a></li>  
				  <li><a href="#"  style="color:#ccc;">Transfer Equipment</a></li>  
				  <li><a href="#"  style="color:#ccc;">Upload Vendor Details</a></li>  
				  
				</ul>
		  </span>
		   <span class="dropdown">
			<i  class="dropdown-toggle fa fa-file-text-o" data-toggle="dropdown"><span>Spare Parts</span></i> 
				<ul class="dropdown-menu line">
				  
				  <li><a href="#"  style="color:#ccc;">Spare Parts Inventory</a></li>
				  <li><a href="#"  style="color:#ccc;">Spare Parts Stats</a></li>
				  <li><a href="#"  style="color:#ccc;">Request for Spare Parts</a></li>
				 
				  
				</ul>
		  </span>
		  <span class="dropdown">
			<i  class="dropdown-toggle fa fa-user-plus" data-toggle="dropdown"><span>Technician</span></i> 
				<ul class="dropdown-menu line">
				  <li><a href="{{URL::to('/vendorequipment/createuser') }}">Technician Planner</a></li>   
				  <li><a href="{{URL::to('/vendorequipment/userlist') }}"> Leader Bord</a></li>  
				</ul>
		  </span>
		  
		    
		<!--<i class="fa fa-hourglass-start"><span></span></i>
		<i class="fa fa-hourglass-half"><span>Request pending with IB</span></i>
		<i class="fa fa-pie-chart"><span>DPR Monthly Report</span></i>-->
		<span class="dropdown">
			<i  class="dropdown-toggle fa fa-university" data-toggle="dropdown"><span>Financials</span></i> 
				<ul class="dropdown-menu line">
				  <li><a href="{{URL::to('/vendorequipment/createuser') }}">Ready for Invoicing</a></li>   
				  <li><a href="{{URL::to('/vendorequipment/userlist') }}"> Pending Payments</a></li>
				  <li><a href="{{URL::to('/vendorequipment/userlist') }}"> Payment Received</a></li>
				</ul>
		  </span>
		 <span class="dropdown">
			<i  class="dropdown-toggle fa fa-user-plus" data-toggle="dropdown"><span>User Management</span></i> 
				<ul class="dropdown-menu line">
				  <li><a href="{{URL::to('/vendorequipment/createuser') }}">Create User</a></li>   
				  <li><a href="{{URL::to('/vendorequipment/userlist') }}"> User List</a></li>   
				</ul>
		  </span>
		   
	</div>
</div>
</div>
<div class="row" style="">
@php
$segment_users = request()->segment(2);
@endphp
	<div class="col-md-12" style="padding: 0; margin-top:1%">	

<div class="tab5" style="box-shadow: none;background-color:transparent;width: 5%;">		
			<div class="col-md-12" style="padding: 0;height:50px">	
			
			<div class="col-md-9 tab5txt">	
			
			
			</div>
			</div>
		</div>
		
		<div class="tab6"  style="background: #ccc;">		
			<div class="col-md-12 request_equipment_css" <?php if($segment_users=="ongoingproject"){ ?> id="activebackground" <?php } ?>>	
			<div class="col-md-2 " >	
			<img src="https://materialwala.com/buildsand/site_assets/newapp/dpr_2.jpg">
			</div>
			<div class="col-md-9 tab5txt">	
			
			<span>Ongoing Projects</span>
			</div>
			</div>
		</div><a href="{{url('vendorequipment')}}">
		<div class="tab6">		
			<div class="col-md-12 request_equipment_css" <?php if($segment_users=="vendor_equipmentdetails"){ ?> id="activebackground" <?php } ?>>	
			<div class="col-md-2 ">	
			<img src="https://materialwala.com/buildsand/site_assets/newapp/dpr_4.jpg">
			</div>
			<div class="col-md-9 tab5txt">	
			<?php 
			$typeequipmentcount = \DB::table('vendorequipments')
						->get();
		$typeequipment_count = $typeequipmentcount->count();
			
			?>
			<span>Equipment Details</span><span class="count_css">{{$typeequipment_count}}</span>
			</div>
			</div>
		</div></a>
		
		<div class="tab6" style="background: #ccc;">		
			<div class="col-md-12 request_equipment_css" <?php if($segment_users=="vendor_requestequipment"){ ?> id="activebackground" <?php } ?>>	
			<div class="col-md-2 nopad" >	
			<i class="fa fa-cog"></i>
			</div>
			<div class="col-md-9 tab5txt nopad">	
			<?php
$jrstatus = "2";// for vendor
		$newrequest = \DB::table('requestforequipments')
						->get();
		$newrequest_count = $newrequest->count();
			?>
			<span>Request for Equipment</span><span class="count_css">5<?php //echo $newrequest_count; ?> </span>
			</div>
			</div>
		</div>
		
		<a href="#"><div class="tab6" style="background: #ccc;">		
			<div class="col-md-12 request_equipment_css" <?php if($segment_users=="vendor_paymentdetails"){ ?> id="activebackground" <?php } ?>>	
			<div class="col-md-2 nopad" >	
			<i class="fa fa-credit-card"></i>
			</div>
			<div class="col-md-9 tab5txt nopad">	
			
			<span>Payment Deatils</span>
			</div>
			</div>
		</div></a>
	</div>
</div>
</header>
  <main class="py-4">
            @yield('content')
        </main>
 
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
}.canvasjs-chart-credit{
	display:none;
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
		<a href={{URL::to('/home/superadmin')}}><img style="float:left;width: 8%;margin-top: 10px;" src="{{ asset('images/logo.png') }}"></a><span style="color: #fff;">Name: {{ Auth::user()->name }} &nbsp;&nbsp;&nbsp;&nbsp; - </span>&nbsp;&nbsp;&nbsp;&nbsp;  <span style="color: #fff;">  <?php if($role==1){ echo "Senior Management"; }else if($role==2){ echo "Super Admin";}else if($role==3){ echo "Senior Role"; }else if($role==4){ echo "Field Supervisor"; }else if($role==5){ echo "Vendor"; }elseif($role==6){ echo "Finance";} ?></span><span style="color: #fff;"> &nbsp;&nbsp;&nbsp;&nbsp;  Emp ID: #{{$role = Auth::user()->id }}</span>
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
				  <li><a href="#">Need Help?</a></li>
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
<div class="row" style="margin-right:15px;margin-left:15px;padding-bottom: 40px;">
	<div class="col-md-12 menu" style="text-align: left;">		
		  <a href={{URL::to('/home/superadmin')}}><i class="fa fa-bars"><span>Dashboard</span></i></a>
		 
		   <span class="dropdown">
			<i  class="dropdown-toggle fa fa-area-chart" data-toggle="dropdown"><span>Project List</span></i> 
				<ul class="dropdown-menu line">
				  <li><a href="{{URL::to('/projects/create') }}">Add New Project</a></li>
				  <li><a href="{{URL::to('/projects') }}">Projects List</a></li> 
				  <li><a href="{{URL::to('/projects') }}">Ongoing Projects</a></li> 
				</ul>
		  </span>
		  
		  
		   
		  
		   <span class="dropdown">
			<i  class="dropdown-toggle fa fa-file-text-o" data-toggle="dropdown"><span>Equipment</span></i> 
				<ul class="dropdown-menu line">
				  <li><a href="{{URL::to('/home/equipmentstatistics') }}"  style="color:#ccc;">RTM</a></li>
				  <li><a href="{{URL::to('/home/equipmentstatistics') }}">Equipment Stats</a></li>
				  <li><a href="{{URL::to('/home') }}">Equipment Details</a></li>  
				  <li><a href="{{URL::to('/equipments/create') }}">Add Equipment</a></li>  
				  <li><a href="{{URL::to('/requests/requestwidgetclick/1') }}">Request for Equipment Approval</a></li>
				  <li><a href="{{URL::to('/home/dbr_view') }}">DPR Details</a></li>  
				  <li><a href="#" style="color:#ccc;">Spare Management</a></li>  
				  <li><a href="#"  style="color:#ccc;">Transfer Equipment</a></li>  
				</ul>
		  </span>
		  
		  
		    
		<!--<i class="fa fa-hourglass-start"><span></span></i>
		<i class="fa fa-hourglass-half"><span>Request pending with IB</span></i>
		<i class="fa fa-pie-chart"><span>DPR Monthly Report</span></i>-->
		 <span class="dropdown">
			<i  class="dropdown-toggle fa fa-user-plus" data-toggle="dropdown"><span>User Management</span></i> 
				<ul class="dropdown-menu line">
				  <li><a href="#">Create User</a></li>
				  <li><a href="#">Edit User Profile</a></li>   
				  <li><a href="#"> User List</a></li>   
				</ul>
		  </span>
		   <span class="dropdown">
			<i  class="dropdown-toggle fa fa-ticket" data-toggle="dropdown"><span>Customer Support</span></i> 
				<ul class="dropdown-menu line">
				  <li><a href="#">Talk With Us</a></li>
				  <li><a href="#">Chat With Us</a></li>   
				</ul>
		  </span>
		   
			 <span class="dropdown">
			<i  class="dropdown-toggle fa fa-th" data-toggle="dropdown"><span>More</span></i> 
				<ul class="dropdown-menu line">
				  <li><a href="#">Material Details</a></li>
				  <li><a href="#">Request For Material Approval</a></li> 
				</ul>
		  </span>
	</div>
</div>
</div>
<div class="row" style="margin-top: -25px;">
	<div class="col-md-12" style="padding: 0;">		
	<?php 
		
$total_projects = DB::table('projects')
							->get();
$total_projects_count = $total_projects->count();
		?>
		<div class="tab5">		
		<a href="{{URL::to('/projects') }}">
			<div class="col-md-12" style="padding: 0;height:50px">	
			<div class="col-md-2 tab5ico" style="background-image: linear-gradient(to right, #16a79d , #00dccd 80%);">	
			<i class="fa fa-area-chart"></i>
			</div>
			<div class="col-md-9 tab5txt">	
			<h3><?php echo $total_projects_count;  ?></h3>
			<p>Ongoing Projects</p>
			</div>
			</div>
		</a>
		</div>
		<?php 
		
$total_request = DB::table('requestforequipments')
							->get();
$total_request_n = $total_request->count();
		?>
		<div class="tab5">	
		<a href="{{URL::to('/home/requestequipment') }}">		
			<div class="col-md-12" style="padding: 0;height:50px">	
			<div class="col-md-2 tab5ico" style="background-image: linear-gradient(to right, #d8a40c, #ffda6e 80%)">	
			<i class="fa fa-hourglass-start"></i>
			</div>
			<div class="col-md-9 tab5txt">	
			<h3><?php echo $total_request_n; ?></h3>
			<p>Request For Equipment Approval</p>
			</div>
			</div>
		</a>
		</div>
		<!--<div class="tab5">		
			<div class="col-md-12" style="padding: 0;height:50px">	
			<div class="col-md-2 tab5ico" style="background-image: linear-gradient(to right, #ea4237 , #ff8179 80%);">	
			<i class="fa fa-hourglass-half"></i>
			</div>
			<div class="col-md-9 tab5txt">	
			<h3>72</h3>
			<p>Pending at IB</p>
			</div>
			</div>
		</div>-->
		<div class="tab5">		
		<a href="{{URL::to('/home/dbr_view') }}">
			<div class="col-md-12" style="padding: 0;height:50px">	
			<div class="col-md-2 tab5ico" style="background-image: linear-gradient(to right, #2196f3 , #a5d7ff 80%)">	
			<i class="fa fa-calendar"></i>
			</div>
			<div class="col-md-9 tab5txt">	 
			<p>Site-Wise DPR</p>
			</div>
			</div>
		</a>
		</div>
		<?php 
		$total_equipment = \DB::table('equipments')
						->get();
		$total_equipment_count = $total_equipment->count();
		?>
		<div class="tab5">		
		<a href="{{URL::to('/home') }}">
			<div class="col-md-12" style="padding: 0;height:50px">	
			<div class="col-md-2 tab5ico" style="background-image: linear-gradient(to right, #4caf50 , #b7f56f 80%);">	
			<i class="fa fa-file-text-o"></i>
			</div>
			<div class="col-md-9 tab5txt">	
			<h3><?php echo $total_equipment_count; ?></h3>
			<p>Equipment Details</p>
			</div>
			</div>
		</a>
		</div>
	</div>
</div>
</header>
<style>


</style>  
 
  <main class="py-4">
            @yield('content')
        </main>
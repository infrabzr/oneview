@extends('layouts.app')

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
</style>
<body>
 

<div class="col-md-12 margin_to_20 margin_bottom_20">
<div class="col-md-12 equipment_ratio">
<span class="main_heading"> 
Project Details</span> 
 <span class="add_sub_heading right_side"><a href="{{URL::to('/projects/create') }}">Add New Project </a><i class="fa fa-plus-circle"></i></span>
<div class="col-md-12 nopad margin_to_20 margin_bottom_20">
<form method="post" action="{{ route('search') }}">
@csrf
<span class="">
<select class="form-select form_select_fil" id="first_category" aria-label="Default select example">
  <option selected>Select by </option>
  <option value="1" selected>State</option>
  <option value="2">City</option> 
</select></span><span class="side_fixel_35 ">
<select class="form-select form_select_fil_2" id="states_cities" name="states_cities" aria-label="Default select example">
 
</select></span><span class="side_fixel_35 ">
<select class="form-select form_select_fil_2" name="project_type" aria-label="Default select example">
  <option selected>Project Type</option>
 @foreach($projects as $key => $val)
 <option value="{{ $projects[$key]->project_type }}">{{ $projects[$key]->project_type }}</option>
   @endforeach
</select></span><span class="side_fixel_35 ">
<select class="form-select form_select_fil_2" name ="project_code" aria-label="Default select example">
  <option selected>Project Code</option>
  @foreach($projects as $key => $val)
 <option value="{{ $projects[$key]->project_code }}">{{ $projects[$key]->project_code }}</option>
   @endforeach
</select></span>  <span class="side_fixel_35 ">
<input  type="submit" class="btn btn-primary btn_apply"></button>
</span><span class="side_fixel_35 " style="display:none;">Search Equipment</span>
</form>
</div>

<div class="col-md-12 nopad">
<table id="example1" class="table table-bordered table-striped" style="box-shadow: 0 2px 4px 0 rgba(181,181,181,.7);">
              <thead>
                   <tr class="table_header">
					  <th>S.No</th>
					  <th>Project Code</th>  
					  <th>Project Name</th>
					  <th>Project Type</th>
					  <th>Project Site</th>
					  <th>Phase</th>
					  <th>State</th>
					  <th>City</th> 
					  <th>End Time</th>
					  <th>Action</th> 					  
                </tr>
              </thead>
              <tbody>
			  
			  @foreach($projects as $key => $val)
     
     

			  <tr>
			   <td>{{ $loop->iteration }}</td>
			  <td>{{ $projects[$key]->project_code }}</td>
			  <td>{{ $projects[$key]->project_name }}</td>
			  <td>{{ $projects[$key]->project_type }}</td>
			   <td>{{ $projects[$key]->project_sites }}</td>
			   <td>{{ $projects[$key]->phase }}</td>
			   <td>{{ $projects[$key]->state }}</td>
			   <td>{{ $projects[$key]->city }}</td>
			   <td>{{ $projects[$key]->end_time }}</td> 
			  <td><span class="edit_icon_p"><i class="fa fa-edit"></i></span><span class="delete_icon_p"><i class="fa fa-trash-o fa-lg"></i></span><span> <i class=" fa fa-etsy1 ror_text1" aria-hidden="true">R</i></span> </td>     
			  </tr>
			 
			 @endforeach
			 
              <tbody>
			  
			  </table>
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
		text: "No Of Equipment accross all sites",
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
			{ label: "Web",  y: 5  },
			{ label: "android",  y: 30  },
			{ label: "ios",  y: 40  },
			
		]
	}
	]
});
chart.render();
}
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
		 
		 var html = '';
		
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

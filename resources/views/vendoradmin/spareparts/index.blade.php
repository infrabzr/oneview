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
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #fbf7f6;
  width: 5%;
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class 
.tab button.active {
  background-color: #ccc;
}*/

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  width: 100%;
  border-left: none;
  height: 500px;
}
.button_css{
	color: #000;
    border: 1px solid #000;
    padding-top: 13%;
    padding-bottom: 13%;
    border-radius: 7px;
	font-size: 9px;
}
.col-md-4 h3{
	border-bottom: 1px solid;
    border-left: 1px solid;
	font-size: 16px;
	background-color: #fff;
    padding: 3%;
    box-shadow: 9px 15px 9px 8px rgb(184 175 175 / 75%);
    /* -webkit-box-shadow: 9px 15px 9px 8px rgb(184 175 175 / 75%); */
    -moz-box-shadow: 9px 15px 9px 8px rgba(184,175,175,0.75);
}
.col-md-5 h3{
	border-radius: 10px;
	font-size: 16px;
	background-color: #fff;
    padding: 3%;
   
}
col-md-4 h3 span, .col-md-3 h3 span{
	background: #101fdc;
    color: #fff;
}
h3 span {
  background: #3fa3bd;
    color: #fff;
    padding: 0% 2% 0% 2%;
    font-size: 16px;
}

.profile_name{
	border: 1px solid #fff;
    padding-top: 2%;
    padding-bottom: 2%;
    margin-top: 2%;
	background: #fff;
}
.profile_box{
	background: #ebeeff;
    padding: 2%;
	    border-radius: 10px;
		border: 1px solid #5555552b;
		margin-top: 2%;
}
.profilename.text-center {
    font-size: 20px;
    text-transform: uppercase;
    color: #87bec5;
}
.sideheading{
	color:#969698;
}
table th,td {
    font-size: 12px;
}
.table-bordered {
    border: 1px solid #ddd;
    text-align: center;
}
tr{
	    background-color: #f9f9f9;
}
th {
    text-align: center;
}
.active p {
    background: #0000004d;
}
i.fa.fa-plus-circle, .fa-list-alt {
    color: #000;
    font-size: 20px;
}
.fa-pencil-square-o, .fa-trash, .fa-eye{
	color: #000;
    font-size: 14px;
}
.numberofskus {

    font-size: 16px;
    background-color: #f5f4fa;
	padding-top: 5%;
    padding-bottom: 5%;
  
}
.numberofskus h4{
	font-size:13px;
}
#chartdiv {
  height:150px;
}
#samipaicontainerchart {
    height: 150px;
}
.warehouse-main{
	background-color:#fff;
	color:#39434f;
}
.warehouse-main h2{
	border:1px solid  #dddbdc;
	    margin: 0px;
		font-size:22px;
		padding: 2%;
}
.fa-home{
	color:#39434f;
}
.form-control-new{
	display: block;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
}
.col-md-12.maintable {
    margin-top: 3%;
    background: #ebeaea;
    padding-top: 2%;
}
.margintopbutton {
	margin-top:2%;
	margin-bottom:2%;
	padding-top:2%;
	padding-bottom:2%;
}
.selectlist{
    padding: 2px;
    margin: 1%;
	background:none;
    border-radius: 10px;
	border: none;
}
span.categorycss {
   margin-right: 2%;
    border: 1px solid #ccc;
    font-size: 16px;
    color: #000;
    padding: 1%;
    border-radius: 10px;
    background: #efefef;
}
.inventory_list{
	text-align:left;
	border:none!important;

	height:40px; line-height:40px;
}
.marginequals {
    margin-left: 2.2% !important;
}
</style>

<div class="col-md-12">



<div id="London" class="tabcontent">
  <div class="row">
  
  <div class="col-md-12">
  <div class="col-md-12">
  
  
  </div>
  <div class="col-md-12" style="margin-bottom: 3%;">
 <div class="col-md-12">
	 @if (session('status'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
        </div>
    @endif
	 @if (session('error'))
        <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('error') }}
        </div>
    @endif
	</div>
  </div>
  <div class="col-md-12">
  <div class="col-md-12" style="background:#fff; margin-bottom:3%;">
  
  <div class="col-md-6 nopad" style="margin-top: 2%;">
  <div class="col-md-4 ">
  <div class="numberofskus">
  <h2 style="text-align:center; color:#26a19c;">{{ count($spareparts_list)}}</h2>
  <h4 style="text-align:center; color:#3a4450;">Number of SKU's</h3>
  </div>
  </div>
  <div class="col-md-4">
  <div class="numberofskus">
  <h2 style="text-align:center; color:#26a19c;"> 	
				4

  </h2>
  <h4 style="text-align:center;color:#3a4450;">Current Value in WH</h3>
  </div>
  </div>
  <div class="col-md-4 ">
  <div class="numberofskus">
  <h2 style="text-align:center; color:#26a19c;">{{ count($spareparts_list)}}</h2>
  <h4 style="text-align:center; color:#3a4450;">inventory turnover ratio</h3>
  </div>
  </div>
  </div>
  <div class="col-md-6">
  <div class="col-md-6">
  <div id="chartContainer" style="height: 150px; width: 100%;"></div><script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>  </div><div class="col-md-6">

  		 <div id="samipaicontainerchart"></div>


  </div>
  </div>
  </div>
    <div class="col-md-12 margintopbutton nopad">
  <div class="col-md-12 nopad">
  <div class="warehouse-main row">
  <h2 class="inventory_list marginequals nopad">inventory list</h2>
  <div class="col-md-12  warehouse-main" style="padding:2%;     border-top: 1px solid #ebe4e4;background: #fff;">
   <span class="categorycss">Engine - 20</span><span class="categorycss">Brakes - 15</span><span class="categorycss">Lubricants - 17</span>
   </div>
 <div class="col-md-12 warehouse-main" style="    border: 1px solid #ebe6e6; background:#ecefeead;">
	
			<select  class="selectlist" name="category" id="category_id"> 
				<option value="">Select Category</option>
				@foreach($sparepartscategories as $key => $val)
				<option value="{{ $sparepartscategories[$key]->id }}">{{$sparepartscategories[$key]->name }}</option>
				@endforeach
			</select>
			<select  class="selectlist" name="category" id="subcategory_id"> 
				<option value="">Select Sub Category</option>
				@foreach($sparepartssubcategories as $key => $val)
				<option value="{{ $sparepartssubcategories[$key]->id }}">{{$sparepartssubcategories[$key]->name }}</option>
				@endforeach
			</select>
		   <select  class="selectlist" id="state_id" name="state_id">  
				<option value="">Select State</option>
				@foreach($states as $key => $val)
					<option value="{{ $states[$key]->state_id }}">{{$states[$key]->state_name }}</option>
				@endforeach
			</select>
		   <select  class="selectlist" name="project_id" id="project_id"> 
				<option value="">Select Project</option>
					@foreach($vendorprojects as $key => $val)
					<option value="{{ $vendorprojects[$key]->project_id }}">{{$vendorprojects[$key]->project_name }}</option>
					@endforeach
			</select>
		    <select  class="selectlist" name="warehouse_id" id="warehouse_id"> 
					<option value="">Select Warehous </option>
					@foreach($warehouses as $key => $val)
					<option value="{{ $warehouses[$key]->id }}">{{$warehouses[$key]->warehouse_name }}</option>
					@endforeach
			</select>
			<input type="button" value="Apply" id="searchbutton" Class="btn btn-success">

   </div>
  <table class="table table-bordered">

<tr style="background-color: #626662;color: #fff;font-size: 14px;">
<th>
S.NO
</th><th>
Spare Name
</th>
<th>
Manufacture
</th><th>
WH Stock
</th><th>
Site Stock
</th>
<th>
average of lead time
</th>
<th>
Reorder Point
</th>
<th>
Safety Stock
</th>
<th>
Stock Status
</th>


 <tbody id="serachdata">
			  
			  @foreach($spareparts_list as $key => $val)
     
     

			  <tr>
			   <td>{{ $loop->iteration }}</td>
			  <td>{{ $spareparts_list[$key]->product_name }}</td>    
			  <td>{{ $spareparts_list[$key]->manufacture }}</td>    
			  <td>{{ $spareparts_list[$key]->quantity }}</td>    
			  <td>-</td>    
			  <td>-</td>    
			  <td>-</td>    
			  <td>-</td>    
			  <td>-</td>    
			    
			  </tr>
			 
			 @endforeach
			 
              <tbody>
 </table>
  </div>
  

  </div>
   <!--<div class="col-md-6">
   <div class="col-md-12 warehouse-main" style="padding:2%;     border: 1px solid #c7c7c7;">
   <select  class="selectlist"> <option>State List</option></select><select  class="selectlist"> <option>Project Type</option></select><select  class="selectlist"> <option>Porject Code</option></select><select  class="selectlist"> <option>Porject Name</option></select></div>
   <div class="col-md-12 warehouse-main">
  
   </div>
   </div>-->

  </div>
  
  
  </div>
  </div>
   <!-- <div class="col-md-1"></div>
 >
  <div class="col-md-1"></div>-->
  </div><div class="col-md-12">
  
  <div class="col-md-5"></div>
  
</div>
</div>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
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

.highcharts-figure, .highcharts-data-table table {
    min-width: 320px; 
    max-width: 500px;
    margin: 1em auto;
}



.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}
</style>
<script>
$(document).ready(function(){
    $("#searchbutton").click(function(event) {
        var category_id = $("#category_id").val();
        var state_id = $("#state_id").val();
        var project_id = $("#project_id").val();
        var warehouse_id = $("#warehouse_id").val();
		console.log(category_id);
		console.log(state_id);
		console.log(project_id);
		console.log(warehouse_id);
        $.ajax({
            type: "POST",
            url: "/spareparts/filter",
            data: { 
			"_token": "{{ csrf_token() }}",
			category_id:category_id,
			state_id: state_id ,
			project_id: project_id ,
			warehouse_id: warehouse_id,
			},
            success: function( data ){
				//alert('success');
				var newdata = data.filterdata;
			console.log(newdata);
			 var html = '';
			 var i = 1;
			 if( newdata.length > 0){
			$.each(newdata, function(key,value){
				 html+='<tr>'; 
				 html+='<td>'+i+'</option>'; 
				 html+='<td>'+value.product_name+'</option>'; 
				 html+='<td>'+value.manufacture+'</option>'; 
				 html+='<td>'+value.quantity+'</option>'; 
				 html+='<td>-</option>'; 
				 html+='<td>-</option>'; 
				 html+='<td>-</option>'; 
				 html+='<td>-</option>'; 
				 html+='<td>-</option>'; 
				  html+='</tr>'; 
				  i++;
			});
			 }else{
			 html+='<tr>'; 
				 html+='<td colspan="8">NO Data Found</option>'; 

				  html+='</tr>'; 	 
			 }
			$("#serachdata").html(html);	 
			 //$("#field_supervisor").val(newdata[0].field_supervisor);
				}
        });
    });
});

$('#category_id').on('change',function(e)
 {
    
    var category_id = e.target.value;
	
   
    jQuery.ajax({
	    type: 'POST',
        url:'/spareparts/getsubcategories',

        data: {
			"_token": "{{ csrf_token() }}",
            category_id: category_id,
			
        },
        success: function( data ){
			var newdata = data.subcategories;
			console.log(newdata);
			 var html = '<option >Select Project</option>';
			$.each(newdata, function(key,value){
				 html+='<option value='+value.id+'>'+value.name+'</option>'; 
			});
			$("#subcategory_id").html(html);	 
			 //$("#field_supervisor").val(newdata[0].field_supervisor);
			 
        },
       
    }); 
 });


$('#state_id').on('change',function(e)
 {
    
    var state_id = e.target.value;
	
   
    jQuery.ajax({
	    type: 'POST',
        url:'/spareparts/getvendorproject',

        data: {
			"_token": "{{ csrf_token() }}",
            state_id: state_id,
			
        },
        success: function( data ){
			var newdata = data.projectdata;
			console.log(newdata);
			 var html = '<option >Select Project</option>';
			$.each(newdata, function(key,value){
				 html+='<option value='+value.project_id+'>'+value.project_name+'</option>'; 
			});
			$("#project_id").html(html);	 
			 //$("#field_supervisor").val(newdata[0].field_supervisor);
			 
        },
       
    }); 
 });


$('#project_id').on('change',function(e)
 {
    
    var project_id = e.target.value;
	
   
    jQuery.ajax({
	    type: 'POST',
        url:'/spareparts/getwarehouse',

        data: {
			"_token": "{{ csrf_token() }}",
            project_id: project_id,
			
        },
        success: function( data ){
			var newdata = data.warehouses;
			console.log(newdata);
			 var html = '<option >Select Warehouses</option>';
			$.each(newdata, function(key,value){
				 html+='<option value='+value.id+'>'+value.warehouse_name+'</option>'; 
			});
			$("#warehouse_id").html(html);	 
			 //$("#field_supervisor").val(newdata[0].field_supervisor);
			 
        },
       
    }); 
 });


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

<script> Highcharts.setOptions({
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
        text: 'SKU to record',
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
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Stack Status",
		horizontalAlign: "left"
	},
	data: [{
		type: "doughnut",
		startAngle: 60,
		//innerRadius: 60,
		indexLabelFontSize: 10,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: [
			{ y: 67, label: "Below Records" },
			{ y: 28, label: "in stock" },
			{ y: 10, label: "out of stock" },
		]
	}]
});
chart.render();

}
</script>
@endsection
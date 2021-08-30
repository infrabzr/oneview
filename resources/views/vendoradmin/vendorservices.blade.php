@extends('layouts.vendoradmin')
@section('content')
<div class="row">

<div class="col-md-12">
<h2>Vendor Services</h2>
<div class="col-md-3" style="background: #fff;border: 1px solid #ccc;">
<h4>Clients</h4>
<?php foreach($clinets as $clinetsdata ) { ?>
<div class="checkbox">
      <label><input type="checkbox"  value="clinets-{{$clinetsdata->id}}" class="ads_Checkbox"><a href="" style="
    color: #878787;
">{{ $clinetsdata->name }}</a></label>
    </div>
<?php } ?>
<h4>Project</h4>
<div class="project_id" id="projects">
<?php foreach($projects as $projectsdata ) { ?>
<div class="checkbox" >
      <label><input type="checkbox" value="projects-{{$projectsdata->project_id}}"  class="check_projects "><a href="" style="
    color: #878787;
">{{ $projectsdata->project_name }}</a></label>
    </div>
<?php } ?>
</div>
<h4>Technician</h4>
<div class="project_id" id="technicians">

<?php foreach($technician as $techniciandata ) { ?>
<div class="checkbox">
      <label><input type="checkbox" value="technician-{{$techniciandata->id}}"  class="technician_Checkbox"><a href="" style="
    color: #878787;
">{{ $techniciandata->name }}</a></label>
    </div>
<?php } ?>
  </div>
<h4>Operator</h4>
<div class="project_id" id="operator">
<?php foreach($operator as $operatordata ) { ?>
<div class="checkbox">
      <label><input type="checkbox" value="operator-{{$operatordata->id}}" class="operator_Checkbox"><a href="" style="
    color: #878787;
">{{ $operatordata->name }}</a></label>
    </div>
<?php } ?>
</div>
</div>
<div class="col-md-9" style="background: #fff;border: 1px solid #ccc;">
<script type="text/javascript">
//$('.ads_Checkbox').click(function() {
	
	$('body').on('change', '.operator_Checkbox', function () {	
	
    var sel = $('input[type=checkbox]:checked').map(function(_, el) {
        return $(el).val();
    }).get();
    
    alert(sel);
	 jQuery.ajax({
	    type: 'POST',
        url:'/vendorservices/getdata',

        data: {
			"_token": "{{ csrf_token() }}",
            id: sel,
			
        },
        success: function( data ){
			var one = data.one;
			var two = data.two;
			var three = data.three;
			var four = data.four;
			var five = data.five;
			var six = data.six;
			
			var newdata = data.projects;
			
		/*  var html = '';
			$.each(newdata, function(key,value){
				 html+="<div class='checkbox' ><label><input type='checkbox' value='projects-"+value.project_id+"'  class='ads_Checkbox newads_checkbox'>"+value.project_name+"</label></div>"; 
			});
			$("#projects").html(html);	 */
			
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1", // "light2", "dark1", "dark2"
	animationEnabled: false, // change to true		
	title:{
		text: "Service "
	},
	data: [
	{
		// Change type to "bar", "area", "spline", "pie",etc.
		type: "column",
		dataPoints: [
			{ label: "1-5 Days",  y: one  },
			{ label: "5-10 Days", y: two  },
			{ label: "10-15 Days", y:three  },
			{ label: "15-20 Days",  y:four },
			{ label: "20-25 Days",  y: five },
			{ label: "25-30 Days",  y: six  }
		]
	}
	]
});
chart.render();
		}	
		});
	});
	$('body').on('change', '.technician_Checkbox', function () {	
	
    var sel = $('input[type=checkbox]:checked').map(function(_, el) {
        return $(el).val();
    }).get();
    
    alert(sel);
	 jQuery.ajax({
	    type: 'POST',
        url:'/vendorservices/getdata',

        data: {
			"_token": "{{ csrf_token() }}",
            id: sel,
			
        },
        success: function( data ){
			var one = data.one;
			var two = data.two;
			var three = data.three;
			var four = data.four;
			var five = data.five;
			var six = data.six;
			
			var newdata = data.projects;
			
		/*  var html = '';
			$.each(newdata, function(key,value){
				 html+="<div class='checkbox' ><label><input type='checkbox' value='projects-"+value.project_id+"'  class='ads_Checkbox newads_checkbox'>"+value.project_name+"</label></div>"; 
			});
			$("#projects").html(html);	 */
			
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1", // "light2", "dark1", "dark2"
	animationEnabled: false, // change to true		
	title:{
		text: "Service "
	},
	data: [
	{
		// Change type to "bar", "area", "spline", "pie",etc.
		type: "column",
		dataPoints: [
			{ label: "1-5 Days",  y: one  },
			{ label: "5-10 Days", y: two  },
			{ label: "10-15 Days", y:three  },
			{ label: "15-20 Days",  y:four },
			{ label: "20-25 Days",  y: five },
			{ label: "25-30 Days",  y: six  }
		]
	}
	]
});
chart.render();
		}	
		});
	});
	
	
	$('body').on('change', '.check_projects', function () {	
	
    var sel = $('input[type=checkbox]:checked').map(function(_, el) {
        return $(el).val();
    }).get();
    
    alert(sel);
	 jQuery.ajax({
	    type: 'POST',
        url:'/vendorservices/getdata',

        data: {
			"_token": "{{ csrf_token() }}",
            id: sel,
			
        },
        success: function( data ){
			var one = data.one;
			var two = data.two;
			var three = data.three;
			var four = data.four;
			var five = data.five;
			var six = data.six;
			
				var techniciansdata = data.technicians;	
		 var html = '';
			$.each(techniciansdata, function(key,value){
				 html+="<div class='checkbox' ><label><input type='checkbox' value='technician-"+value.id+"'  class='technician_Checkbox append_technician_Checkbox'>"+value.name+"</label></div>"; 
			});
			$("#technicians").html(html);	
					
		var operatordata = data.operator;	
		 var html = '';
			$.each(operatordata, function(key,value){
				 html+="<div class='checkbox' ><label><input type='checkbox' value='operator-"+value.id+"'  class='operator_Checkbox append_operator_Checkbox'>"+value.name+"</label></div>"; 
			});
			$("#operator").html(html);	
			
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1", // "light2", "dark1", "dark2"
	animationEnabled: false, // change to true		
	title:{
		text: "Service "
	},
	data: [
	{
		// Change type to "bar", "area", "spline", "pie",etc.
		type: "column",
		dataPoints: [
			{ label: "1-5 Days",  y: one  },
			{ label: "5-10 Days", y: two  },
			{ label: "10-15 Days", y:three  },
			{ label: "15-20 Days",  y:four },
			{ label: "20-25 Days",  y: five },
			{ label: "25-30 Days",  y: six  }
		]
	}
	]
});
chart.render();
		}	
		});
	});
	
	
	
	$('body').on('change', '.newads_checkbox', function () {	
	
    var sel = $('input[type=checkbox]:checked').map(function(_, el) {
        return $(el).val();
    }).get();
    
    alert(sel);
	 jQuery.ajax({
	    type: 'POST',
        url:'/vendorservices/getdata',

        data: {
			"_token": "{{ csrf_token() }}",
            id: sel,
			
        },
        success: function( data ){
			var one = data.one;
			var two = data.two;
			var three = data.three;
			var four = data.four;
			var five = data.five;
			var six = data.six;
			
			
		var techniciansdata = data.technicians;	
		 var html = '';
			$.each(techniciansdata, function(key,value){
				 html+="<div class='checkbox' ><label><input type='checkbox' value='technician-"+value.id+"'  class='technician_Checkbox append_technician_Checkbox'>"+value.name+"</label></div>"; 
			});
			$("#technicians").html(html);	
					
		var operatordata = data.operator;	
		 var html = '';
			$.each(operatordata, function(key,value){
				 html+="<div class='checkbox' ><label><input type='checkbox' value='operator-"+value.id+"'  class='operator_Checkbox append_operator_Checkbox'>"+value.name+"</label></div>"; 
			});
			$("#operator").html(html);	
			
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1", // "light2", "dark1", "dark2"
	animationEnabled: false, // change to true		
	title:{
		text: "Service "
	},
	data: [
	{
		// Change type to "bar", "area", "spline", "pie",etc.
		type: "column",
		dataPoints: [
			{ label: "1-5 Days",  y: one  },
			{ label: "5-10 Days", y: two  },
			{ label: "10-15 Days", y:three  },
			{ label: "15-20 Days",  y:four },
			{ label: "20-25 Days",  y: five },
			{ label: "25-30 Days",  y: six  }
		]
	}
	]
});
chart.render();
		}	
		});
	});
$('.ads_Checkbox').on('change', function() {
	

    var sel = $('input[type=checkbox]:checked').map(function(_, el) {
        return $(el).val();
    }).get();
    
    alert(sel);
	 jQuery.ajax({
	    type: 'POST',
        url:'/vendorservices/getdata',

        data: {
			"_token": "{{ csrf_token() }}",
            id: sel,
			
        },
        success: function( data ){
			var one = data.one;
			var two = data.two;
			var three = data.three;
			var four = data.four;
			var five = data.five;
			var six = data.six;
			
			var newdata = data.projects;
			
		 var html = '';
			$.each(newdata, function(key,value){
				 html+="<div class='checkbox' ><label><input type='checkbox' value='projects-"+value.project_id+"'  class='ads_Checkbox newads_checkbox'>"+value.project_name+"</label></div>"; 
			});
			$("#projects").html(html);	
			
			
		var techniciansdata = data.technicians;	
		 var html = '';
			$.each(techniciansdata, function(key,value){
				 html+="<div class='checkbox' ><label><input type='checkbox' value='technician-"+value.id+"'  class='technician_Checkbox append_technician_Checkbox'>"+value.name+"</label></div>"; 
			});
			$("#technicians").html(html);	
					
		var operatordata = data.operator;	
		 var html = '';
			$.each(operatordata, function(key,value){
				 html+="<div class='checkbox' ><label><input type='checkbox' value='operator-"+value.id+"'  class='operator_Checkbox append_operator_Checkbox'>"+value.name+"</label></div>"; 
			});
			$("#operator").html(html);	
			
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1", // "light2", "dark1", "dark2"
	animationEnabled: false, // change to true		
	title:{
		text: "Service "
	},
	data: [
	{
		// Change type to "bar", "area", "spline", "pie",etc.
		type: "column",
		dataPoints: [
			{ label: "1-5 Days",  y: one  },
			{ label: "5-10 Days", y: two  },
			{ label: "10-15 Days", y:three  },
			{ label: "15-20 Days",  y:four },
			{ label: "20-25 Days",  y: five },
			{ label: "25-30 Days",  y: six  }
		]
	}
	]
});
chart.render();
		}	
		});
})



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
			var onevalue = 10; 
			var twovalue = 15; 
			var threevalue = 5; 
			var fourvalue = 20; 
			var fivevalue = 30; 
			//alert(onevalue);
		var chart = new CanvasJS.Chart("chartContainer", {
		theme: "light1", // "light2", "dark1", "dark2"
		animationEnabled: false, // change to true		
		title:{
			text: "Service "
		},
		data: [
		{
		// Change type to "bar", "area", "spline", "pie",etc.
		type: "column",
		dataPoints: [
			{ label: "1-5 Days",  y: onevalue  },
			{ label: "5-10 Days", y: twovalue  },
			{ label: "10-15 Days", y: threevalue  },
			{ label: "20-25 Days",  y: fourvalue  },
			{ label: "25-30 Days",  y: fivevalue  }
		]
		}
	]
});
chart.render();

        },
       
    }); 
 });

window.onload = function () {
var onevalue = 10; 
var twovalue = 15; 
var threevalue = 5; 
var fourvalue = 20; 
var fivevalue = 30; 
//alert(onevalue);
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1", // "light2", "dark1", "dark2"
	animationEnabled: false, // change to true		
	title:{
		text: "Service "
	},
	data: [
	{
		// Change type to "bar", "area", "spline", "pie",etc.
		type: "column",
		dataPoints: [
			{ label: "1-5 Days",  y: {{ $onetofivedata }}  },
			{ label: "5-10 Days", y: {{ $fivetotendata }}  },
			{ label: "10-15 Days", y: {{ $fifteendata }}  },
			{ label: "15-20 Days",  y: {{ $twentydata }}  },
			{ label: "20-25 Days",  y: {{ $twentyfivedata }}  },
			{ label: "25-30 Days",  y: {{ $thirtydata }}  }
		]
	}
	]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
</body>
</div>
</div>
</div>
@endsection

@extends('layouts.engineer')

@section('content')
<body>
<style>
.widgets{
	background-color: #fff;
    padding: 4%;
}
</style>
<div class="col-md-12">
<div class="row">
<div class="col-md-3">
<div class="widgets row">
<div class="col-md-3"><img src="{{ url('icons/ico_1.png') }} ">
</div><div class="col-md-9">
<div><span>Regular Checkup</span></div>
<div><span>150</span>/<span>200</span></div>
</div>
</div>
</div>
<div class="col-md-3">
<div class="widgets row">
<div class="col-md-3"><img src="{{ url('icons/ico_22.png') }} ">
</div><div class="col-md-9">
<div><span>Ready For Service</span></div>
<div><span>150</span>/<span>200</span></div>
</div>
</div>
</div>
<div class="col-md-3">
<div class="widgets row">
<div class="col-md-3"><img src="{{ url('icons/ico_33.png') }} ">
</div><div class="col-md-9">
<div><span>Requests</span></div>
<div><span>150</span>/<span>200</span></div>
</div>
</div>
</div>
<div class="col-md-3">
</div>
</div>
<!--<h2>Technician Leader Board</h2>
<table id="example1" class="table table-bordered table-striped" style="box-shadow: 0 2px 4px 0 rgba(181,181,181,.7);">
              <thead>
                    <tr class="table_header">
					   <th>S.No</th>
					   <th>Vehicle Code</th> 
					   <th>Equipment Type</th>
					   <th>Vehicle Number</th>
					   <th>Project Code</th>					   
					   <th>Project Name</th>
					   <th>State</th>
					   <th>City</th> 
					   <th>Operator</th>
					   <th>Action</th> 					  
                    </tr>
              </thead>
             
			  
			  </table>-->
</div>

</body>
</html>
@endsection
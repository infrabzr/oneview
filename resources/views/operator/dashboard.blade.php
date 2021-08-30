@extends('layouts.operator')@section('content')
<body>
<div class="col-md-12 "style="margin-top:2%;">
<table id="example1" class="table table-bordered table-striped" style="box-shadow: 0 2px 4px 0 rgba(181,181,181,.7);">
<caption class="text-center">Equipments Data</caption>
              <thead>
                    <tr class="table_header">
					   <th>S.No</th>
					   <th>Vehicle Code</th> 
					   <th>Equipment Type</th>
					   <th>Vehicle Number</th>
					 				   
					   <th>Project Name</th>
					   <th>State</th>
					   <th>City</th> 
					   <th>Operator</th>
					   <th>Action</th> 					  
                    </tr>
              </thead>
              <tbody>
			  
			  @foreach($equipments as $key => $val)
     
     

			  <tr>
			  <td>{{$loop->iteration}}</td>
			  <td>{{ $equipments[$key]->ve_vehicle_code }}</td>
			  <td>{{ $equipments[$key]->sub_category_name }}</td>
			   <td>{{ $equipments[$key]->vehicle_number }}</td>
			
			  <td>{{ $equipments[$key]->project_name }}</td>
			   
			   <td>{{ $equipments[$key]->project_state }}</td>
			   <td>{{ $equipments[$key]->project_city }}</td>
			  <td>{{ $equipments[$key]->name }} - {{ $equipments[$key]->primary_mobile }}</td>
			  <td>
			  <a href="{{ URL('/operator_daily_checkup/'.$equipments[$key]->ve_id) }}"><span class="edit_icon_p"><i class="fa fa-eye" aria-hidden="true" style="font-size:1em;color:#000;"></i></span></a>
			  <span class="delete_icon_p"><i class="fa fa-trash-o fa-lg"></i></span>
			
			  </tr>
			
			 @endforeach
			 
              <tbody>
			  
			  </table>
</div>

</body>
</html>
@endsection
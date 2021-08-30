<?php
 // dd($equipment);
?>


@extends('layouts.vendoradmin')
@section('content')
<style>
.modal .modal-dialog {
    -webkit-transform: translate(0,-5%);
    -o-transform: translate(0,-5%);
    transform: translate(0,-5%);
    top: 5%;
    margin: 0 auto;
}
.tdone{
	color: #00dccd;
}.tdtwo{
	color: #f71d0f;
}.tdthree{
	    color: #fabc05;
}.tdfour{
	color: #16817a;
}
.formclass{
	display:none;
	border:1px soild #ccc;
	background-color:#fff;
	padding:2%;
}
</style>






<div class="col-md-12">
    <div class="card-body row mt-5" style="margin-top:4%">
	
	<div class="col-md-3">
	<div class="form-group  nopad col-md-12">
							<label for="staticEmail" class="col-sm-4 nopad col-form-label"> Service Status Update</label>
	<select class="custom-select form-control" id="service_status" name="service_status" >
  <option >Service</option>
  <option value="pending" <?php if($servicecheckups->service_status=='pending'){ echo "selected"; } ?>>Pending</option>
  <option value="progress" <?php if($servicecheckups->service_status=='progress'){ echo "selected"; } ?>> In Progress</option>
  <option value="completed" <?php if($servicecheckups->service_status=='completed'){ echo "selected"; } ?>>Completed</option>
</select>
        </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12 m-auto">
		
		
            <div class="card card-body">
			
                <form method="post" action="/technicianplanner/servicecheckup" enctype="multipart/form-data" onsubmit="return confirm('Do you really want to submit the form?');" class="formclass" <?php if($servicecheckups->service_status=='completed'){  ?>style="display:block"	<?php } ?>>
				 <legend class="text-center">Update Service Details</legend>
				@csrf  
					<?php 
					$urlid = Request::segment(2);
					if (is_numeric($urlid)) {
					?>
					<input type="hidden" name="equ_id" id="equ_id_new" value="<?php echo $servicecheckups->equ_id; ?>">
					<?php }else{ ?>
					<input type="hidden" name="equ_id" id="equ_id_new" value="<?php echo $servicecheckups->equ_id; ?>">

					<?php } ?>
					<div class="form-group row">
						<div class="form-group  nopad col-md-12">
							<label for="staticEmail" class="col-sm-4 nopad col-form-label"> Serviced at</label>
								<div class="col-md-6 nopad"> 
								<input type="text" class="form-control" placeholder="" name="serviced_at" style="border-right: none;border-top-right-radius: 0px!important;
								border-bottom-right-radius: 0px;" required="" value="<?php echo $servicecheckups->serviced_at; ?>">  
								</div>
							  <div class="col-md-2 nopad"> 
									  <select class="form-control form_select_fil_2 style_background"  name="last_serviced_at_type" style="border-left: none;border-top-left-radius: 0px!important;
										border-bottom-left-radius: 0px;
										padding: 0px;" required="">
									  <option value="km" >Km</option>
									  <option value="hour" >Hour</option>
									</select>
							  </div>
						</div>
					</div>
					<div class="form-group row">
						<label for="staticEmail" class="col-sm-4 nopad col-form-label">Serviced Date</label>
						<div class="col-sm-8 nopad">
					<input type="date" class="form-control " name="serviced_date"   value="<?php echo $servicecheckups->serviced_date;  ?>">
						</div>
					</div>
			  <div class="form-group row">
				<label for="staticEmail" class="col-sm-4 nopad col-form-label">Serviced Amount</label>
				<div class="col-sm-8 nopad">
				<input type="text" class="form-control" name="serviced_amount"  value="<?php echo $servicecheckups->serviced_amount; ?>">
				  
				</div>
				
			  </div>
			  <div class="form-group row">
				<label for="staticEmail" class="col-sm-4 nopad col-form-label">Bill Image</label>
				<div class="col-sm-8 nopad">
				<input type="file" class="form-control" name="serviced_bill_image">
				  
				</div>
				<img src="{{url('/images')}}/<?php echo $servicecheckups->serviced_bill_image; ?>" style="width:40px;height:40px;">
			  </div>
				  <div class="form-group row">
					<label for="staticEmail" class="col-sm-4 nopad col-form-label">Bill Image</label>
					<div class="col-sm-8 nopad">
					<input type="file" class="form-control" name="serviced_parts_image">
					  
					</div>
					<img src="{{url('/images')}}/<?php echo $servicecheckups->serviced_parts_image; ?>" style="width:40px;height:40px;">
				  </div>
				  <div class="form-group row">
					<input type="submit" value="Submit" class="btn btn-primary" style=" float: right;margin-top: 4%;">
					
				  </div>
			</form>
        </div>
	
    </div>
	<div class="col-md-3">
        </div>
        </div>
</div>








 


 
  
<script>
 $('#service_status').on('change',function(e)
 {
  
    var sp_cat = e.target.value;
	var equ_id = $("#equ_id_new").val();
	
if(sp_cat=='completed'){
$("#service_details").show();
}else{
	$("#service_details").hide();

}

    jQuery.ajax({
		
	    type: 'POST',
        url:'/technicianplanner/servicecheckupstatus',

        data: {
			"_token": "{{ csrf_token() }}",
            id: sp_cat,
            equ_id: equ_id,
			
        },
        success: function( data ){ 
			alert("successfully updated");
			window.location.reload();
        },
       
    }); 
 });
</script>
@endsection
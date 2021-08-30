@extends('layouts.vendoradmin')

@section('content')
<style>
.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 1px solid #ddd;
    vertical-align: middle;
}
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
</style>

<div class="col-md-12">



<div id="London" class="tabcontent">
  <div class="row">
  
  <div class="col-md-12">
  <div class="col-md-12">
  
  
  </div>
  <div class="col-md-12" style="
    margin-bottom: 4%;
">
  
   
  <div class="col-md-5"><h3><span>Project Name:<?php if(!$listofinvoice==0){ echo $listofinvoice[0]->company_name; } ?> </span></h3></div>
  </div><div class="col-md-12">
  <div class="col-md-12">
	 @if (session('status'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
        </div>
    @endif
	 
	</div>
  <table class="table table-bordered">
  <caption style="color:#000; text-align:center" > Invoice History </caption>
<tr style="background-color:#eaeef7;">
<th>
S.No
</th>
<th>
Invoice Genrated Date
</th>
<th>
Invoice ID
</th>
<th>
Sub Total
</th>
<th>
IGST
</th>
<th>
SGST	
</th>
<th>
CGST
</th>
<th>
Total
</th>
<th>
View Invoice
 </th>
<th>
Status
</th>

<th>
Action
</th>
<th>
payment Receipt 
</th>

<?php
if(!$listofinvoice==0){
			
		
		 
$i=1;
foreach($listofinvoice as $listofinvoicedata){	
?>
<tr>
<td><?php  echo $i; ?></td>
<td><?php  echo $listofinvoicedata->invoice_date; ?></td>
<td><?php  echo $listofinvoicedata->invoice; ?></td>
<td><?php  echo $listofinvoicedata->subtotal; ?></td>
<td><?php  echo $listofinvoicedata->integratedgst; ?></td>
<td><?php  echo $listofinvoicedata->centralgst; ?></td>
<td><?php  echo $listofinvoicedata->stategst; ?></td>
<td><?php  echo $listofinvoicedata->total; ?></td>
<td><a href="">View</a></td>
<td><?php  if($listofinvoicedata->payment_receipt!=""){ echo "<span style='color:green;'>Payment Received</span> ";}else{ echo "<span style='color:red;'>Pending Payments </span>";} ?></td>

<td><?php  if($listofinvoicedata->amount_status==2){ ?><select id="invoicestatus">
<option>Select Option</option>
<option value="PaymentReceived,<?php  echo $listofinvoicedata->id; ?>">Payment Received</option>
</select><?php }else{ echo "-";} ?></td>
<td>
<?php  if($listofinvoicedata->amount_status==1){ ?>
<?php  if($listofinvoicedata->payment_receipt){ ?>
<a target="_blank" href="{{url('images/')}}/<?php echo $listofinvoicedata->payment_receipt; ?>"><img src="{{url('images/')}}/<?php echo $listofinvoicedata->payment_receipt; ?>" style="width:75px;height:75px"></a>
<?php }else{?>

<form action="{{url('vendor/uplaod_receipt')}}" method="post" enctype="multipart/form-data">
				@csrf
							<input type="file" onchange="this.form.submit()" name="payment_receipt_img">
					<input type="hidden" name="id" value="<?php  echo $listofinvoicedata->id; ?>">
					
					<input type="hidden" name="equipment_id" value="{{ Request::segment(3) }}">
</form>
<?php  } }else{ echo "--";} ?></td>

</tr>
<?php $i++;
 }
}else{
			
		}
 ?>
</table>
  
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
</style>
<script>
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

@endsection
@extends('layouts.vendoradmin')
@section('content')
<div class="container">
<div class="row">
<br></br>
<fieldset class="field-set-item" style="height:1050px!important">
  <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/home/vendoradmin')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Invoice</li>
            </ol>
          </nav>
 <div class="form-input-padding">
 
 

 <style>
 .panel {
   margin-bottom: 20px; 
  }
 .panel-body{
 	padding-bottom:0px!important; 
 }
 legend{
 	margin-bottom: 40px;
 }
 .main-footer{
 	display: none;
 }
 .footer-add p{
 	text-align:center;
 	margin:0px;
 }
 .panel-default{
 	border:0px!important;
 }
 .jobinfo-clr{
 	border:0px!important;
 }
 .logo-invoice{
 	float:right;
 }
 th{
	 
	 border: 1px solid #333;    border-bottom: 2px solid #333 !important;
 } td{
	 
	 border: 1px solid #333;
 }
 </style>
<div class="col-md-12" style="margin-top:20px;">
<table class="table  " style="    border: 1px solid #333; font-size:16px;">

<thead>

<tr> 

<td style="background-color:#274c7b!important; -webkit-print-color-adjust: exact !important;; -webkit-print-color-adjust: exact !important;color:white!important;    width: 25%;"><b><center style="color:#fff!important;font-size: 20px!important;"> INVOICE DATE </center></b></td> 

<td style="width: 25%;"> <center style="font-size: 20px!important;"><b> {{$invoicedetails->invoice_date}}</b></center></td> 

<td style="background-color:#274c7b!important; -webkit-print-color-adjust: exact !important;color:white!important;"><b><center style="color:#fff!important;font-size: 20px!important;"> INVOICE NO </center></b></td> 

<td style="width: 25%;"><center style="font-size: 20px!important;"><b>{{$invoicedetails->invoice}}</b></center><center style="font-size: 20px!important;display:none;">

</center></td>

</tr>
 <tr> 
 
 <td colspan="2" style="    background-color: lightgrey!important;-webkit-print-color-adjust: exact !important;"> 
	<br>
	<b>{{ $userdetails->business_name }}</b>
	<br>
	<br>
	
	<b>Mobile:</b> {{ $userdetails->primary_mobile }}<br> 
	
	<b>Address:</b>{{ $userdetails->address }}<br>
	<b>State:</b> {{ $userdetails->state }}<br> 
	<b>Pincode:</b> {{ $userdetails->pincode }}<br>
	<b>PAN:</b> {{ $userdetails->pan }}<br> 
	<b>GST:</b> {{ $userdetails->gst }}<br> 
		
 </td>

 <td colspan="2"> 
 
	<br>
	<b>{{$invoicedetails->name}} </b>
	
	<br> </br>
	<b>Email Id:</b> {{$invoicedetails->email}}<br> 
	<b>Mob:</b> 9246343840<br> 
	
	<b>Address:</b> {{$invoicedetails->address}}<br>
	<b>State:</b> {{$invoicedetails->state_name}}<br>
	<b>PAN:</b> {{$invoicedetails->pan_number}}<br> 
	<b>GST:</b> {{$invoicedetails->gst_number}}<br> 	
	 
		
		 
				</td> 
 
 </tr> 
 </thead>  
 
  <tbody>
  <tr> 
 
 <th colspan="2" style="background-color:#274c7b!important; -webkit-print-color-adjust: exact !important;color:white!important;"><center><b style="color:#fff!important;font-size: 20px!important;">DESCRIPTION</b></center>

 </th><th colspan="2" style="background-color:#274c7b!important; -webkit-print-color-adjust: exact !important;color:white!important;"><center><b style="color:#fff!important;font-size: 20px!important;">AMOUNT (INR)</b></center> 
 
 </th></tr> 
  <tr> 
  
 <td colspan="2"> 
	 
	<b>Type of fee:</b> Rental Service <br><br>
	<b>Account:</b> Towards the rent of {{$invoicedetails->sub_category_name}}.<br>
	<b>Qty:</b>1 <br>
	<b>Hours:</b>{{$invoicedetails->number_woh}} /hours <br>
	<b>Duration:</b>{{$invoicedetails->duration_from}} - {{$invoicedetails->duration_to}}<br>
	<b>Project location:</b> {{$invoicedetails->project_address}}<br>  </td>
  <td colspan="2" style="margin:0;padding:0;">
   <table style="width:100%;">
      <tbody><tr style="line-height:40px;">
   
   <td style="width:50%; background-color:lightgrey!important;-webkit-print-color-adjust: exact !important;padding-left: 2%;"><b>Sub Total </b></td>
   
   <td align="right" style="padding-right: 3%;">{{$invoicedetails->subtotal}}</td>
   
   </tr> 
     <?php if($invoicedetails->integratedgst){ ?>
	 <tr style="line-height:40px;">
   
   <td style="width:50%;background-color:lightgrey!important;-webkit-print-color-adjust: exact !important;padding-left: 2%;"><b>Central Tax (CGST) {{$invoicedetails->gst}}%</b></td>
   
   <td align="right" style="padding-right: 3%;">{{$invoicedetails->integratedgst}}</td>
   
   </tr> 
	 <?php  }else{?>    
	<tr style="line-height:40px;">
   
   <td style="width:50%;background-color:lightgrey!important;-webkit-print-color-adjust: exact !important;padding-left: 2%;"><b>Central Tax (CGST) {{$invoicedetails->gst/2}}%</b></td>
   
   <td align="right" style="padding-right: 3%;">{{$invoicedetails->centralgst}}</td>
   
   </tr> 
   
	<tr style="line-height:40px;">
   
   <td style="width:50%;background-color:lightgrey!important;-webkit-print-color-adjust: exact !important;padding-left: 2%;"><b>State Tax {{$invoicedetails->gst/2}}%
 </b></td>
   
   <td align="right" style="padding-right: 3%;">{{$invoicedetails->stategst}}</td>
   
   </tr> 
	 <?php } ?>
   
   
   
   
   
   <tr style="line-height:40px">
   <td style="width:50%;background-color:#274c7b!important; -webkit-print-color-adjust: exact !important;color:white!important;padding-left: 2%;"><b style="color:#fff!important;font-size: 20px!important;">TOTAL</b></td>
   
   <td align="right" style="padding-right: 3%;"><b>{{$invoicedetails->total}}</b></td>
   
   </tr> 
   </tbody></table>
   </td>
</tr> 
<tr> 
 
 <th colspan="1" style="background-color:lightgrey!important;-webkit-print-color-adjust: exact !important;"><b>AMOUNT IN WORDS</b>

 </th><th colspan="3">Rupees <?php 
 
 $number = $invoicedetails->total;
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? '' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . ucfirst($plural) . " " . ucfirst($hundred)
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . ucfirst($plural) . " " . ucfirst($hundred);
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  echo ucfirst($result) . "Rupees  " . $points . " ";
 
 //$curr =  convert_number_to_words($detailview['total']);  $curre = str_replace("-"," ",$curr); echo $curre; ?> Only 
 
 </th></tr> 
  
<tr> 
 
 <th colspan="1" style="background-color:lightgrey!important;-webkit-print-color-adjust: exact !important;"><b>PAYMENT METHOD</b>

 </th><th colspan="3">{{$invoicedetails->paymentmethod}}
 
 </th></tr> 
  

 
 
</tbody>
</table>
<p><b>NOTE:</b></p>
<p>1. Cheques and drafts are subjected to realization.</p>
 <p>2. This is system generated invoice no signature required.</p>

</div>
</div>
</fieldset>

<br><br><br><br>
<div class="row footer-add" style="display:none;">
	<div style="width: 94%; height: 17px; border-bottom: 1px solid black; text-align: center;    margin-left:3%; ">
  <span style="font-size: 20px; background-color: #fff!important; padding: 0 10px;">
   <b>Infra bazaar Pvt. Ltd</b> 
  </span>
</div><br>
	
	<!--<p><b>Corpoorate identity Number:</b> U74120TG2011PTC077818</p>
	<p>8-2-596, Ground Floor, Puzzolana Towers, Road No.10, Banjara Hills, Hyderabad-5000034, T.S, India</p> -->
	<div style="width: 94%;  text-align: center;    margin-left:3%; "><b>Ph:</b>  {{ $userdetails->primary_mobile }}</div>
	<div style="width: 94%; text-align: center;    margin-left:3%; "><b>E-mail: {{ $userdetails->email }} </b></div>
</div>
</div>
</div>
 @endsection
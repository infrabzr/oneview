
<!doctype html>
<html lang="en">
  <head>
    <title>Infrabazaar Sharing equipment details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
<style>
table, th, td {
 		padding: 10px;
        border: 1px solid black;
        border-collapse: collapse;
}
</style>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-12 m-auto">
              <div class="textbody">
			  <p><b>Greetings</B> </p>
			  <p style="text-align:justify">Sharing equipment details for {{ $equipment["ve_equipment_type"] }}. Please let me know if you require any further details.
</p>
<p>Please find the attachment document
</p></div><br>
 <div class="priceme"><p><b style="color:#6aa20f"><u>EQUIPMENT DETAILS</u></b><p>
<table style="border-collapse: collapse;width: 100%;border: 1px solid black;">
<tr style="background-color: #f1eff0;">
<th style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">Equipment Name</th>
<th style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">Brand</th>
<th style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">Model No</th>
<th style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">Capacity</th>
<th style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">Veh Number</th>
<th style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">Year</th>
<th style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">Current Reading</th>
</tr>
<tr>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">{{ $equipment["ve_equipment_type"] }}</td>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">{{ $equipment["ve_brand"] }}</td>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">{{ $equipment["ve_model"] }}</td>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">{{ $equipment["ve_capacity"] }}</td>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">{{ $equipment["ve_vehicle_number"] }}</td>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">{{ $equipment["ve_year"] }}</td>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">2502Km/hr</td>
</tr>
<!--<tr style="background-color: #f7f6ff;">
<td style="text-align: left;padding: 8px;"><b>Equipment Name</b></td>
<td style="text-align: left;padding: 8px;">    Backhoeloader </td>
<td style="text-align: left;padding: 8px;"><b>	Brand  </b></td>
<td style="text-align: left;padding: 8px;">  166	</td>
<td style="text-align: left;padding: 8px;"> <b>Year  </b></td>
<td style="text-align: left;padding: 8px;">  2018 </td></tr>
<tr >
<td style="text-align: left;padding: 8px;"><b>Equipment Type  </b></td>
<td style="text-align: left;padding: 8px;">  Backhoeloader </td>
<td style="text-align: left;padding: 8px;">	<b>Model No </b> </td>
<td style="text-align: left;padding: 8px;">  220 </td>
<td style="text-align: left;padding: 8px;"><b>	Capacity  </b></td>
<td style="text-align: left;padding: 8px;">  12 </td></tr>
<tr style="background-color: #f2f2f2;">
<td style="text-align: left;padding: 8px;"><b>Veh Number </b>  </td>
<td style="text-align: left;padding: 8px;" >  TS08AA1111	  </td>
<td style="text-align: left;padding: 8px;"> <b>Current Reading </b>  </td>
<td style="text-align: left;padding: 8px;">   </td>
<td style="text-align: left;padding: 8px;"><b>	Product Type</b>  </td>
<td style="text-align: left;padding: 8px;">   Equipment  </td></tr>-->

</table>
               
            </div>
			 <div class="priceme"><p><b style="color:#6aa20f"><u>Veh Document Details</u></b><p>
<table style="border-collapse: collapse;width: 100%;padding: 10px;border: 1px solid black;">
<tr style="background-color: #f1eff0;">
<th style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">Document Type</th>
<th style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">Start Date</th>
<th style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">End Date</th>
</tr>
<tr >
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">Vechile Rc</td>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">{{ $equipment["rc_no"] }}</td>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">{{ $equipment["rc_end_date"] }}</td>
</tr>
<tr style="background-color: #f7f6ff;">
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">Insurance</td>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">{{ $equipment["ins_no"] }}</td>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">{{ $equipment["ins_end_date"] }}</td>
</tr>
<tr >
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">Road Tax</td>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;"> {{ $equipment["tax_no"] }}</td>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">{{ $equipment["tax_end_date"] }}</td>
</tr>
<tr style="background-color: #f7f6ff;">
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">Road Permit</td>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">{{ $equipment["permit_end_date"] }}</td>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">{{ $equipment["permit_no"] }}</td>
</tr>
<tr >
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">Fitness / Break</td>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;"> {{ $equipment["fitness_no"] }}</td>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">{{ $equipment["fitness_end_date"] }}</td>
</tr>
</table>
               
            </div>
			
			<?php if($equipment_operators){ ?>
			<div class="priceme"><p><b style="color:#6aa20f"><u>Operator Details</u></b><p>
<table style="border-collapse: collapse;width: 100%;padding: 10px;border: 1px solid black;" >
<tr style="background-color: #f1eff0;">
<th style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">Operator Name </th>
<th style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">Phone No</th>
<th style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">City</th>
<th style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">Address</th>

</tr>
<tr >
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">{{ $equipment_operators["operator_name"] }}</td>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">{{ $equipment_operators["operator_phone"] }}</td>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">{{ $equipment_operators["operator_city"] }}</td>
<td style="text-align: left;padding: 8px;padding: 10px;border: 1px solid black;">{{ $equipment_operators["operator_address"] }}</td>
</tr>

</table>
               
            </div>
			<?php } ?>
			
			<br></br>
			 <p> Regards</p>
                <p> Suneel.KV </p>
                <p> <b>Email:</b> support@infrabazaar.com </p>
                <p> <b>Phone:</b> 7095338855 </p>
        </div>
    </div>
  </body>
</html>
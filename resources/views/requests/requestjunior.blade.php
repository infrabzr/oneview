@extends('layouts.app')
@section('content')
<style>
label {
    font-size: 13px;
	color:#7a7676;
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
    padding-top: 15px;
    padding-bottom: 15px;
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
	    font-weight: bold;
}
.thumbnail_image{
	border-radius:10px;
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
</style>

<div class="col-md-12  ratio_addequipment nopad">
<h4 class="add_equipment nomargin">REQUEST FOR EQUIPMENT APPROVAL</h4>
 <form method="POST" action="{{ url('requests/addjuniorrequest')  }}">
                        @csrf
<div class="col-md-12  margin_to_20 margin_bottom_20 ">
 @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
<div class="col-md-6 ">

<div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Type</label>
	 
		<select id="type" required class="form-control form_select_fil_1 @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" >
			<option value="">Select</option>
			<option value="Vehicle">Vehicle</option>
			<option  value="Equipment">Equipment</option>
		</select> 
  </div>
<div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Product Type</label>
	 
		<select id="r_product_type" required class="form-control form_select_fil_1 @error('r_product_type') is-invalid @enderror" name="r_product_type" value="{{ old('r_product_type') }}" >
			<option value="">Select</option>
			<option value="Own">Own</option>
			<option value="Rent" >Rent</option>
		</select> 
  </div>
  <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Equipment Type</label>
		<select  id="r_equipment_type" required class="form-control form_select_fil_2 @error('r_equipment_type') is-invalid @enderror" name="r_equipment_type" value="{{ old('r_equipment_type') }}" >
			  <option value="">Select</option>
			  <option  value="Backhoeloader"  >Backhoe loader</option>
			  <option  value="excavator"  >Excavator</option>
			  <option value="tipper" >Tipper</option>
			  <option  value="crane" >Crane</option>
			  <option  value="dumper"  >Dumper</option>
			  <option  value="grader"  >Grader</option>
			  <option  value="Hydracrane"  >Hydra crane</option>
			  <option  value="soilcompactor"  >Soil Compactor</option>
			  <option  value="Transitmixer"  >Transit mixer</option>
			  <option  value="wheelloader"  >wheel loader</option>
		</select>
		 
  </div>
  <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Select Brand</label>
   <select id="r_brand" required class="form-control form_select_fil_2 @error('r_brand') is-invalid @enderror" name="r_brand" value="{{ old('r_brand') }}" >
	 <option value="">Select</option>
  <option value="ABEL">ABEL</option>
												<option value="ACE">ACE</option>
												<option value="Airman">Airman</option>
												<option value="Ajax Fiori">Ajax Fiori</option>
												<option value="Akona">Akona</option>
												<option value="Alpha">Alpha</option>
												<option value="Altius">Altius</option>
												<option value="AMW">AMW</option>
												<option value="Apollo">Apollo</option>
												<option value="Aquarius">Aquarius</option>
												<option value="Armstrong">Armstrong</option>
												<option value="Ashok Leyland">Ashok Leyland</option>
												<option value="ATLAS COPCO">ATLAS COPCO</option>
												<option value="Atul">Atul</option>
												<option value="Avery">Avery</option>
												<option value="BEML">BEML</option>
												<option value="Bharat Benz">Bharat Benz</option>
												<option value="BMW">BMW</option>
												<option value="Bobcat">Bobcat</option>
												<option value="BOMAG">BOMAG</option>
												<option value="BULL">BULL</option>
												<option value="Casagrande">Casagrande</option>
												<option value="Case Construction">Case Construction</option>
												<option value="CAT">CAT</option>
												<option value="CCS Equipment">CCS Equipment</option>
												<option value="Chevrolet">Chevrolet</option>
												<option value="Chicago Pneumatic">Chicago Pneumatic</option>
												<option value="CLAAS">CLAAS</option>
												<option value="Coles">Coles</option>
												<option value="CONMAT">CONMAT</option>
												<option value="Cosmos">Cosmos</option>
												<option value="CRC Evans">CRC Evans</option>
												<option value="Cummins">Cummins</option>
												<option value="Daemo">Daemo</option>
												<option value="Daimler">Daimler</option>
												<option value="Dasmesh">Dasmesh</option>
												<option value="Demag">Demag</option>
												<option value="DENYO">DENYO</option>
												<option value="Deutz Fahr">Deutz Fahr</option>
												<option value="Doosan">Doosan</option>
												<option value="Dowin">Dowin</option>
												<option value="DOZCO">DOZCO</option>
												<option value="Drillto">Drillto</option>
												<option value="DW/TXS">DW/TXS</option>
												<option value="Dynapac">Dynapac</option>
												<option value="EDT-DIPL">EDT-DIPL</option>
												<option value="Eicher">Eicher</option>
												<option value="ELGI">ELGI</option>
												<option value="Elgi Horizon">Elgi Horizon</option>
												<option value="EMCO ELECON">EMCO ELECON</option>
												<option value="Escorts">Escorts</option>
												<option value="Essae">Essae</option>
												<option value="Everdigm">Everdigm</option>
												<option value="falcon machines">falcon machines</option>
												<option value="FIAT">FIAT</option>
												<option value="Fine">Fine</option>
												<option value="Force">Force</option>
												<option value="FORD">FORD</option>
												<option value="FURUKAWA">FURUKAWA</option>
												<option value="Furukawa Rock Drill Co. Ltd.">Furukawa Rock Drill Co. Ltd.</option>
												<option value="Fuso">Fuso</option>
												<option value="Fuwa">Fuwa</option>
												<option value="GB">GB</option>
												<option value="GB Industries Co. Ltd.">GB Industries Co. Ltd.</option>
												<option value="Godrej &amp; Boyce">Godrej &amp; Boyce</option>
												<option value="Goliath">Goliath</option>
												<option value="Gottwald">Gottwald</option>
												<option value="Greaves">Greaves</option>
												<option value="greaves bomag">greaves bomag</option>
												<option value="Grove">Grove</option>
												<option value="Herrenknecht">Herrenknecht</option>
												<option value="Hicom">Hicom</option>
												<option value="Hindustan">Hindustan</option>
												<option value="Hino">Hino</option>
												<option value="HMT Machine Tools Limited">HMT Machine Tools Limited</option>
												<option value="HONDA">HONDA</option>
												<option value="Hyundai">Hyundai</option>
												<option value="ICE">ICE</option>
												<option value="IMT">IMT</option>
												<option value="Indeco">Indeco</option>
												<option value="Indo Farm Equipment Limited">Indo Farm Equipment Limited</option>
												<option value="INDO POWER">INDO POWER</option>
												<option value="INDUS">INDUS</option>
												<option value="Ingersoll Rand">Ingersoll Rand</option>
												<option value="International Tractors Limited">International Tractors Limited</option>
												<option value="iveco">iveco</option>
												<option value="Jakson">Jakson</option>
												<option value="JCB">JCB</option>
												<option value="JISUNG">JISUNG</option>
												<option value="JLG">JLG</option>
												<option value="John Deere">John Deere</option>
												<option value="JPR">JPR</option>
												<option value="Juno">Juno</option>
												<option value="Juno Equipments">Juno Equipments</option>
												<option value="Kamaz">Kamaz</option>
												<option value="KATO">KATO</option>
												<option value="Kinney">Kinney</option>
												<option value="Kirloskar">Kirloskar</option>
												<option value="Kobelco">Kobelco</option>
												<option value="Komac">Komac</option>
												<option value="Komatsu">Komatsu</option>
												<option value="KRUPP">KRUPP</option>
												<option value="Kubota">Kubota</option>
												<option value="L&amp;T">L&amp;T</option>
												<option value="L&amp;T Case">L&amp;T Case</option>
												<option value="L&amp;T Komatsu">L&amp;T Komatsu</option>
												<option value="Leeboy">Leeboy</option>
												<option value="Leyland Deere">Leyland Deere</option>
												<option value="Liebherr">Liebherr</option>
												<option value="Lincoln Electric">Lincoln Electric</option>
												<option value="Linde">Linde</option>
												<option value="Link Belt">Link Belt</option>
												<option value="Liugong">Liugong</option>
												<option value="Lokomo">Lokomo</option>
												<option value="Macons">Macons</option>
												<option value="Mahindra">Mahindra</option>
												<option value="Mait">Mait</option>
												<option value="MAN">MAN</option>
												<option value="Manitowoc">Manitowoc</option>
												<option value="Marshall">Marshall</option>
												<option value="Maruti">Maruti</option>
												<option value="Massey ferguson">Massey ferguson</option>
												<option value="Maxmech">Maxmech</option>
												<option value="Maxomix">Maxomix</option>
												<option value="MBH">MBH</option>
												<option value="MEC">MEC</option>
												<option value="Mekaster">Mekaster</option>
												<option value="Mercedes">Mercedes</option>
												<option value="Mercedes Benz">Mercedes Benz</option>
												<option value="Metso">Metso</option>
												<option value="Mitsubishi">Mitsubishi</option>
												<option value="Mitsui">Mitsui</option>
												<option value="MNP">MNP</option>
												<option value="mtu">mtu</option>
												<option value="Mukand">Mukand</option>
												<option value="Nakoda Machinery Private Limited">Nakoda Machinery Private Limited</option>
												<option value="New Holland">New Holland</option>
												<option value="Niagara">Niagara</option>
												<option value="NIDO">NIDO</option>
												<option value="Nippon Sheriya">Nippon Sheriya</option>
												<option value="NISSAN">NISSAN</option>
												<option value="Nissan Diesel">Nissan Diesel</option>
												<option value="Omega">Omega</option>
												<option value="Orien">Orien</option>
												<option value="Others">Others</option>
												<option value="P&amp;H">P&amp;H</option>
												<option value="Palfinger">Palfinger</option>
												<option value="Parker">Parker</option>
												<option value="Perfora">Perfora</option>
												<option value="perkins">perkins</option>
												<option value="Piaggio">Piaggio</option>
												<option value="PLL">PLL</option>
												<option value="Powerscreen">Powerscreen</option>
												<option value="PPM">PPM</option>
												<option value="Pratissoli">Pratissoli</option>
												<option value="PRD RIGS">PRD RIGS</option>
												<option value="Preet Agro Industries Pvt Ltd">Preet Agro Industries Pvt Ltd</option>
												<option value="Putzmeister">Putzmeister</option>
												<option value="Puzzolana">Puzzolana</option>
												<option value="Rashtriya">Rashtriya</option>
												<option value="RHINOCEROS EQUIPMENTS PVT LTD">RHINOCEROS EQUIPMENTS PVT LTD</option>
												<option value="Sandvik">Sandvik</option>
												<option value="Sany">Sany</option>
												<option value="Scania">Scania</option>
												<option value="Schoma">Schoma</option>
												<option value="Schwing Stetter">Schwing Stetter</option>
												<option value="Shantui">Shantui</option>
												<option value="Shirke">Shirke</option>
												<option value="Shoava Engineers">Shoava Engineers</option>
												<option value="siemens">siemens</option>
												<option value="singh construction">singh construction</option>
												<option value="SKE">SKE</option>
												<option value="SML">SML</option>
												<option value="SML ISUZU">SML ISUZU</option>
												<option value="SMM Group">SMM Group</option>
												<option value="SoilMec">SoilMec</option>
												<option value="Solid India">Solid India</option>
												<option value="Sonalika">Sonalika</option>
												<option value="Sonic">Sonic</option>
												<option value="Soosan">Soosan</option>
												<option value="SPP">SPP</option>
												<option value="Stamford">Stamford</option>
												<option value="sudhir">sudhir</option>
												<option value="Sunland Kori">Sunland Kori</option>
												<option value="Superior">Superior</option>
												<option value="Svedala">Svedala</option>
												<option value="Swaraj">Swaraj</option>
												<option value="Tafe Motors and Tractors Limited">Tafe Motors and Tractors Limited</option>
												<option value="Taiyo">Taiyo</option>
												<option value="Tata">Tata</option>
												<option value="TATA AVEZA">TATA AVEZA</option>
												<option value="Tata Hitachi">Tata Hitachi</option>
												<option value="Tata Motors Limited">Tata Motors Limited</option>
												<option value="tatra">tatra</option>
												<option value="Taurian">Taurian</option>
												<option value="Terex">Terex</option>
												<option value="thomas">thomas</option>
												<option value="TIL">TIL</option>
												<option value="Toyota">Toyota</option>
												<option value="TPS">TPS</option>
												<option value="Unipave">Unipave</option>
												<option value="Unisteel">Unisteel</option>
												<option value="Universal">Universal</option>
												<option value="Velson">Velson</option>
												<option value="Vermeer">Vermeer</option>
												<option value="Vietz">Vietz</option>
												<option value="Vietz GMBH">Vietz GMBH</option>
												<option value="volkswagen">volkswagen</option>
												<option value="Voltas">Voltas</option>
												<option value="Voltas Baoli">Voltas Baoli</option>
												<option value="Volvo">Volvo</option>
												<option value="Whiteman">Whiteman</option>
												<option value="Wilson">Wilson</option>
												<option value="Winget">Winget</option>
												<option value="Wirtgen">Wirtgen</option>
												<option value="yamaha">yamaha</option>
												<option value="Yammar">Yammar</option>
												<option value="Yantai Eddie">Yantai Eddie</option>
												<option value="Zoomlion">Zoomlion</option>
	</select>
	
  </div>
  <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Select Year</label>
       <select class="form-control form_select_fil_2" required  name="r_year">
  <option value="2021">2021</option>
  <option value="2020">2020</option>
  <option value="2019">2019</option>
  <option value="2018">2018</option>
  <option value="2017">2017</option>
  <option value="2016">2016</option>
  <option value="2015">2015</option>
  <option value="2014">2014</option>
  <option value="2013">2013</option>
  <option value="2012">2012</option>
  <option value="2011">2011</option>
  <option value="2010">2010</option>
  <option value="2009">2009</option>
  <option value="2008">2008</option>
  <option value="2007">2007</option>
  <option value="2006">2006</option>
</select> 
  </div>
 
  </div>
  <div class="col-md-6 ">
   <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Model No</label>
	<input id="r_model" type="text"required class="form-control @error('r_model') is-invalid @enderror" name="r_model" value="{{ old('r_model') }}"   > 
  </div>
  <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Capacity</label>
   <input id="r_capacity" type="text" required class="form-control @error('r_capacity') is-invalid @enderror" name="r_capacity" value="{{ old('r_capacity') }}"   > 
  </div>
    <div class="form-group col-md-3 nopad_5">
    <label for="exampleInputEmail1">Type of Work</label>
 <select class="form-control @error('r_work') is-invalid @enderror" name="r_work" required>
  <option value="soil">Soil</option>
  <option value="">Rock</option>
 

</select>
  </div>
  </div>
</div> 
 


<div class="col-md-12"><h4 class="mt-5">Project Details</h4></div>
<div class="col-md-12  margin_to_20 ">

<div class="col-md-8">

 
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Select Project</label>
      
	 <select class="form-control form_select_fil_2" id="r_project" name="r_project">
  <option >Select</option>
    @foreach($projects as $key => $val)
 <option value="{{ $projects[$key]->project_id }}">{{ $projects[$key]->project_code }}</option>
   @endforeach
</select>
  </div>   
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">Project Name</label>
  <input type="text" id="project_name" class=" form_select_fil_1 form-control" >
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">State</label>
     <input id="project_state" type="text" class="form-control @error('state') is-invalid @enderror"   value="{{ old('state') }}"   >
  </div>
  <div class="form-group col-md-3">
    <label for="exampleInputEmail1">City</label>
   <input id="project_city" type="text" class="form-control @error('city') is-invalid @enderror"   value="{{ old('city') }}"   >
  </div>
  <div class="form-group col-md-3">
    <label for="exampleInputEmail1">Field Supervisor</label>
    <input id="field_supervisor" type="text" class="form-control @error('field_supervisor') is-invalid @enderror"  value="{{ old('field_supervisor') }}"   >
  </div>
  </div>
   <div class="col-md-4">
  <div class="form-group col-md-12">
    <label for="exampleInputEmail1">Complete Address</label>
   <textarea id="project_address" type="text" class="form_select_fil_1 form-control @error('address') is-invalid @enderror"   value="{{ old('address') }}"    ></textarea>
     
  </div>
  </div>

   
  
    
  
</div>

<div class="col-md-12   margin_bottom_20">

 <div class="col-md-4">
  <div class="form-group col-md-12">
    <label for="exampleInputEmail1">Comments</label> 
	<textarea id="r_comments" type="text" class="form-control @error('r_comments') is-invalid @enderror" name="r_comments" value="{{ old('r_comments') }}"></textarea>
  </div>
  </div>

</div>
 <div class="col-md-12" style=" margin-bottom:15px; margin-top:15px;"> 
<button type="submit" class="btn btn-primary btn_apply" style="background: rgb(65,56,160);
background: linear-gradient(73deg, rgba(65,56,160,1) 23%, rgba(114,35,162,1) 100%);border: none;">SUBMIT</button></div>

</form>

</div> 
<script>

 $('#r_project').on('change',function(e)
 {
    
    var e_project_code = e.target.value;
	
   
    jQuery.ajax({
	    type: 'POST',
        url:'/equipments/projectdetails',

        data: {
			"_token": "{{ csrf_token() }}",
            id: e_project_code,
			
        },
        success: function( data ){
			var newdata = data.msg;
			console.log(newdata);
			 $("#project_name").val(newdata[0].project_name);
			
			 $("#project_state").val(newdata[0].state);
			 $("#project_city").val(newdata[0].city);
			 $("#project_address").val(newdata[0].address); 
			 $("#field_supervisor").val(""); 
			 
		 
        },
       
    }); 
 });
</script>

@endsection

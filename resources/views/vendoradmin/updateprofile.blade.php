@extends('layouts.vendoradmin')
@section('content')
<div class="container">
    <div class="card-body row mt-5">
	<h3 class="text-center">Update Profile</h3>
                <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/home/vendoradmin')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
            </ol>
          </nav>
	<div class="col-md-3 col-sm-12 col-xs-12 m-auto"></div>
        <div class="col-md-6 col-sm-12 col-xs-12 m-auto">
            <div class="card card-body">
                
                <form action="{{url('/home/storeprofile')}}" method="post" enctype="multipart/form-data">
				@csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" value="{{$userdetails->name}}"  name="name">
                    </div>
                    <div class="form-group">
                        <lable for="email">Email:</lable>
                        <input type="email" class="form-control" value="{{ $userdetails->email }}"  name="email">
                    </div>
                    <div class="form-group">
                        <lable for="primary_mobile"> Primary Mobile:</lable>
                        <input type="text" class="form-control" value="{{ $userdetails->primary_mobile }}" name="primary_mobile" >
                    </div>
                    
                    <div class="form-group">
                        <lable for="secondary_mobile">Secondary Mobile:</lable>
                        <input type="text" class="form-control" value="{{ $userdetails->secondary_mobile }}" name="secondary_mobile">
                    </div>
                    <div class="form-group">
                        <lable for="address">Address:</lable>
                        <input type="text" class="form-control" value="{{ $userdetails->address }}" name="address">
                    </div>
                    <div class="form-group">
                        <lable for="state">State:</lable>
                        <input type="text" class="form-control" value="{{ $userdetails->state }}" name="state">
                    </div>
                    <div class="form-group">
                        <lable for="pincode">Pincode:</lable>
                        <input type="text" class="form-control" value="{{ $userdetails->pincode }}" name="pincode">
                    </div>
                    <div class="form-group">
                        <lable for="business_name">Business Name:</lable>
                        <input type="text" class="form-control" value="{{ $userdetails->business_name }}" name="business_name">
                    </div>
                    <div class="form-group">
                        <lable for="bank_name">Bank Name:</lable>
                        <input type="text" class="form-control" value="{{ $userdetails->bank_name }}" name="bank_name">
                    </div>
                    <div class="form-group">
                        <lable for="account_number">Account Number:</lable>
                        <input type="text" class="form-control" value="{{ $userdetails->account_number }}" name="account_number">
                    </div>
                    <div class="form-group">
                        <lable for="pan">PAN Number:</lable>
                        <input type="text" class="form-control" value="{{ $userdetails->pan }}" name="pan">
                    </div>
                    <div class="form-group">
                        <lable for="gst">GST Number:</lable>
                        <input type="text" class="form-control" value="{{ $userdetails->gst }}" name="gst">
                    </div>
                    <div class="form-group">
                        <lable for="profile_image">Profile image:</lable>
                        <input type="file" class="form-control" value="{{ $userdetails->profile_image }}"  name="profile_image">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                   
                </form>
    
        </div>
    </div><div class="col-md-3 col-sm-12 col-xs-12 m-auto"></div>
        </div>
</div>
@endsection
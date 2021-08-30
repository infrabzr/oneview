@extends('layouts.vendoradmin')
@section('content')
<style>
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
</style>
<div class="row">
<div class="col-md-12">
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/home/vendoradmin')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    <div class="col-md-12">
	 @if (session('status'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
        </div>
    @endif
	 
	</div>
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{ $userdetails->name }} </h4>
                      <p class="text-secondary mb-1">{{ $userdetails->business_name }}</p>
                      <p class="text-muted font-size-sm">{{ $userdetails->address }}</p>
                   
                    </div>
                  </div>
                </div>
              </div>
            
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     {{ $userdetails->name  }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     {{ $userdetails->email  }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $userdetails->primary_mobile  }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">secondary mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $userdetails->secondary_mobile  }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $userdetails->address  }}
                    </div>
                  </div>
                   <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">State Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $userdetails->state  }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">PIN Code</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $userdetails->pincode  }}
                    </div>
                  </div>
				  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Bank Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $userdetails->bank_name  }}
                    </div>
                  </div>
                  <hr> 
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Account Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $userdetails->account_number  }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">PAN Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $userdetails->pan  }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">GST Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $userdetails->gst  }}
                    </div>
                  </div>
                 
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="{{url('home/updateprofile')}}">Edit</a>
                    </div>
                  </div>
                </div>
              </div>

             


            </div>
          </div>

        </div>
    </div>
</div>
</div>
@endsection
@extends('layouts.standalone')

@section('content')
<style>
.form-control {
    height: calc(1.2em + 0.75rem + 2px);
    padding: 0.20rem 0.75rem;
	border: 0px solid #ced4da;
	 box-shadow: 0 0 1px rgb(0 0 0 / 1%), 0 1px 3px rgb(0 0 0 / 66%);
}
.btn{
	    line-height: 1.0;
}
input[type=radio], input[type=checkbox] {
    box-sizing: border-box;
    padding: 0;
    border: 1px #95b2c0;
}
.oneview_login_background{
	background-image:url(/images/login_images/1view_loginnbg.jpg);
	   
		background-size: cover;
}
.login_reg_container{
	    min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
  min-height: 100vh; /* These two lines are counted as one :-)       */

  display: flex;
  align-items: center
}

.ib_oneview_login_leftside{
	width:100%;
		background-image:url(images/login_images/1view_loginimg2.jpg);
		display: flex;
    align-items: center;
    background-repeat: no-repeat;
    height: 476px;
	background-size: 100% 100%;
		

  display: flex;
  align-items: center
}
.ib_oneview_login_rightside{
	width:100%;
	background-image:url(images/login_images/oneview_login_right_side.jpg);
	display: flex;
    align-items: center;
    height: 476px;
}
.nopadding {
   padding: 0 !important;
   margin: 0 !important;
}
.card_one {
    width: 100%;
    padding: 5%;
}
p.login_logo {
    text-align: center;
    width: 100%;
    vertical-align: middle;
}
p.main_logo{
	 text-align: center;
    width: 100%;
}
p.login_logo_text {
    text-align: center;
    width: 100%;
	color:#fff;
}
.submit_button_oneview{
	background: linear-gradient(
9deg
, rgb(168 84 195) 0%, rgba(1,155,225,1) 100%)!important;
    padding-left: 28%;
    padding-right: 28%;
    box-shadow: 0 0 4px rgb(0 0 0 / 13%), 0 4px 3px rgb(0 0 0 / 20%)
}
.login_title_ib{
	color: #77767b;
	font-weight: bold;
	margin-bottom: 1rem;
	font-size:18px;
}
a.btn.btn-link.ib_forgot_border {
    text-decoration: underline;
	font-size: 12px;
	padding-left: 6%;
	color:#40809e;
}

.login_form{
	padding-top: 10%;
	padding-bottom: 10%;
	padding-left:17.5%;
	padding-right:17.5%;
}
.form-check-label{
	font-size: 12px;
	color:#050505;
}
</style>

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<div class="container-fluid oneview_login_background">
    <div class="row justify-content-center login_reg_container">
        <div class="col-md-4 nopadding ib_oneview_login_leftside"><div style="text-align: center;width: 100%;"><p class="login_logo"><img  src="images/login_images/1viewlogo.png">
		<p class="login_logo_text">View infromation at your fingrtips</p></p></div></div>
        <div class="col-md-4 nopadding ib_oneview_login_rightside">
            <div class="card_one">
                <!--<div class="card-header">{{ __('Login') }}</div>-->

                <div class="card-body"><p class="main_logo"><img  src="images/login_images/1view_logo1.png"></p>
				
                    <form method="POST" action="{{ route('login') }}" class="login_form" >
                        @csrf
<h3 class="login_title_ib">Login</h3>
                        <div class="form-group row">
                           

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder ="Enter your user name">
<span style="position:absolute;right: 30px;top: 9px;    font-size: 16px;
    color: #615f6a;" class="fa fa-user "></span>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                           

                            <div class="col-md-12 ">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder ="Enter your password">
<span style="position:absolute;right: 30px;top: 9px;    font-size: 16px;
    color: #615f6a;" class="fa fa-lock form-control-feedback"></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
						<div class="col-md-6"><button type="submit" class="btn btn-primary submit_button_oneview">
                                    {{ __('Login') }}
                                </button></div>
                        

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
							</div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 nopadding">
                                

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link ib_forgot_border" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

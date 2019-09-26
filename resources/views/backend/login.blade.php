<!DOCTYPE html>
<html>

<!-- Mirrored from radixtouch.in/templates/admin/hotel/source/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Sep 2019 17:43:53 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title>Spice Hotel | Bootstrap 4 Admin Dashboard Template + UI Kit</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="{{asset('backend/assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="{{asset('backend/assets/plugins/iconic/css/material-design-iconic-font.min.css')}}">
    <!-- bootstrap -->
	<link href="{{asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/pages/extra_pages.css')}}">
	<!-- favicon -->
    <link rel="shortcut icon" href="{{asset('backend/assets/img/favicon.ico')}}" /> 
</head>
<body>
    <div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form class="login100-form validate-form"  method="POST" action="{{ route('login') }}">
					   @csrf
					<span class="login100-form-logo">
						<i class="zmdi zmdi-flower"></i>
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100 @error('email') is-invalid @enderror" type="text" name="email" placeholder="Username">

						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
						
					</div>
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="text-center p-t-90">
						 @if (Route::has('password.request'))
                                    <a class="btn btn-link" style="color:white;" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

					</div>
				</form>
			</div>
		</div>
	</div>
    <!-- start js include path -->
    <script src="{{asset('backend/assets/plugins/jquery/jquery.min.js')}}" ></script>
    <!-- bootstrap -->
    <script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.min.js')}}" ></script>
    <script src="{{asset('backend/assets/js/pages/extra_pages/login.js')}}" ></script>
    <!-- end js include path -->
</body>
</html>
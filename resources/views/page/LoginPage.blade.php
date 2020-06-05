@extends('master')
@section('content')
<div class="container">
		<div class="container-login100">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form action="{{route('login')}}" method="post" class="login100-form validate-form flex-sb flex-w">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					@csrf
					<span class="login100-form-title p-b-53">
						Đăng nhập
					</span>

					<a href="{{ url('/auth/redirect/facebook') }}" class="btn-face m-b-20">
						<i class="fa fa-facebook-official" style="color: white;"></i>
						Facebook
					</a>

					<a href="{{ url('/auth/redirect/google') }}" class="btn-google m-b-20">
						<img src="source/image/icons/icon-google.png" alt="GOOGLE">
						Google
					</a>
					
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Email
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="email" name="email" style="border: 0px;" >
						<span class="focus-input100"></span>
					</div>
					@error('email')
                                 <p class="text-danger" role="alert">
                                        {{ $message }}
                                 </p>
                    @enderror
					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Password
						</span>

						<a href="#" class="txt2 bo1 m-l-5">
							Quên mật khẩu?
						</a>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" id="password" name="password" required autocomplete="current-password" style="border: 0px;" >
						<span class="focus-input100"></span>

					</div>
					@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Sign In
						</button>
					</div>

					<div class="w-full text-center p-t-55">
						<span class="txt2">
							Chưa đăng ký?
						</span>

						<a href="{{route('Signup')}}" class="txt2 bo1">
							Đăng ký ngay
						</a>
					</div>
				</form>
			</div>
			<!--
			<form action="{{route('login')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				@csrf
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						@if (Session::has('dang ky'))
							<div class="alert alert-success">
					      		{{ Session::get('dang ky') }}
							</div>
						@endif	
						<h3 style="color: blue; font-family: sans-serif; font-weight: bold">Đăng nhập</h3>
						<div class="space60">&nbsp;</div>

						
						<div class="form-block">
							<label style="margin-top: 5px;font-size: 20px; font-weight: 500" for="email">Email của bạn</label>
							<input style="margin-top: 5px;" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus id="email" name="email">
							@error('email')
                                    <p class="text-danger" role="alert">
                                        {{ $message }}
                                    </p>
                            @enderror
						</div>
						<div class="form-block">
							<label style="margin-top: 5px;font-size: 20px; font-weight: 500" for="password">Mật khẩu</label>
							<input style="margin-top: 5px;" type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">
							 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
						</div>
						<div class="space30">&nbsp;</div>
						<div>
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
						<div class="space100">&nbsp;</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
			-->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
@section('script')
<!-- include js files -->
	<script src="source/assets/dest/js/jquery.js"></script>
	<script src="source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="source/assets/dest/vendors/animo/Animo.js"></script>
	<script src="source/assets/dest/vendors/dug/dug.js"></script>
	<script src="source/assets/dest/js/scripts.min.js"></script>
	<!--customjs-->
<!--===============================================================================================-->
	<script src="source/assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="source/assets/vendor/bootstrap/js/popper.js"></script>
<!--===============================================================================================-->
	<script src="source/assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="source/assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="source/assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="source/assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="source/assets/dest/js/login.js"></script>
	<script type="text/javascript">
    $(function() {
        // this will get the full URL at the address bar
        var url = window.location.href;

        // passes on every "a" tag
        $(".main-menu a").each(function() {
            // checks if its the same on the address bar
            if (url == (this.href)) {
                $(this).closest("li").addClass("active");
				$(this).parents('li').addClass('parent-active');
            }
        });
    });   


</script>
<script>
	 jQuery(document).ready(function($) {
                'use strict';
				
// color box

//color
      jQuery('#style-selector').animate({
      left: '-213px'
    });

    jQuery('#style-selector a.close').click(function(e){
      e.preventDefault();
      var div = jQuery('#style-selector');
      if (div.css('left') === '-213px') {
        jQuery('#style-selector').animate({
          left: '0'
        });
        jQuery(this).removeClass('icon-angle-left');
        jQuery(this).addClass('icon-angle-right');
      } else {
        jQuery('#style-selector').animate({
          left: '-213px'
        });
        jQuery(this).removeClass('icon-angle-right');
        jQuery(this).addClass('icon-angle-left');
      }
    });
				});
	</script>
@endsection
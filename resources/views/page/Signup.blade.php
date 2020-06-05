@extends('master')
@section('content')
<div class="container">
	<div class="container-login100">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form action="{{route('postSignup')}}" method="post" class="login100-form validate-form flex-sb flex-w">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					@csrf
					<span class="login100-form-title p-b-53">
						Đăng ký với
					</span>

					<a href="{{ url('/auth/redirect/facebook') }}" class="btn-face m-b-20">
						<i class="fa fa-facebook-official"></i>
						Facebook
					</a>

					<a href="{{ url('/auth/redirect/google') }}" class="btn-google m-b-20">
						<img src="source/image/icons/icon-google.png" alt="GOOGLE">
						Google
					</a>
					<span class="error-line">
						@if(count($errors) > 0)
						 	<div class="alert alert-danger">
						 		{{$errors->first()}}<br>
						 	</div>
						@endif
						@if (Session::has('dang ky'))
							<div class="alert alert-success">
					      		{{ Session::get('dang ky') }}
							</div>
						@endif
					</span>
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							<br>Email
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="email" id="email" name="email" required style="border: 0px;" >
						<span class="focus-input100"></span>
					</div>
                    <div class="p-t-31 p-b-9">
						<span class="txt1">
							Tên bạn là cc gì?
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" id="your_last_name" name="username" required style="border: 0px;" >
						<span class="focus-input100"></span>
					</div>
					@error('username')
                                 <p class="text-danger" role="alert">
                                        {{ $message }}
                                 </p>
                    @enderror
                    <div class="p-t-31 p-b-9">
						<span class="txt1">
							Số điện thoại
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" id="phone" name="phone" required style="border: 0px;" >
						<span class="focus-input100"></span>
					</div>
					@error('phone')
                                 <p class="text-danger" role="alert">
                                        {{ $message }}
                                 </p>
                    @enderror
					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Mật khẩu
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" id="password" name="password" required style="border: 0px;" >
						<span class="focus-input100"></span>

					</div>
					@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="p-t-13 p-b-9">
						<span class="txt1">
							Nhập lại mật khẩu ko quên cmnl
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" id="phone" name="password_confirmation" required style="border: 0px;" >
						<span class="focus-input100"></span>

					</div>
					@error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Sign In
						</button>
					</div>
				</form>
			</div>
	</div>		
	<!--
			
			<form action="{{route('postSignup')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
						@csrf
				<div class="row">
					<div class="col-sm-3">
					</div>
					<div class="col-sm-6">
						@if(count($errors) > 0)
						 	<div class="alert alert-danger">
						 		@foreach($errors->all() as $er)
						 		{{$er}}
						 		@endforeach
						 	</div>
						@endif
						@if (Session::has('dang ky'))
							<div class="alert alert-success">
					      		{{ Session::get('dang ky') }}
							</div>
						@endif	
						<h3 style="color: blue; font-family: sans-serif; font-weight: bold">ĐĂNG KÝ</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label style="margin-top: 10px;font-size: 20px; font-weight: 500" for="email">Email (bắt buộc)</label>
							<input class="form-control" style="margin-top: 5px;" type="email" id="email" name="email" required>
						</div>

						<div class="form-block">
							<label style="margin-top: 10px;font-size: 20px; font-weight: 500" for="your_last_name">Tên người dùng</label>
							<input class="form-control" style="margin-top: 5px;" type="text" id="your_last_name" name="username" required>
						</div>
						
						<div class="form-block">
							<label style="margin-top: 10px;font-size: 20px; font-weight: 500" for="phone">Số điện thoại</label>
							<input class="form-control" style="margin-top: 5px;" type="text" id="phone" name="phone" required>
						</div>
						<div class="form-block">
							<label style="margin-top: 10px;font-size: 20px; font-weight: 500" for="phone">Mật khẩu</label>
							<input class="form-control" style="margin-top: 5px;" type="password" id="phone" name="password" required>
						</div>
						<div class="form-block">
							<label style="margin-top: 10px;font-size: 20px; font-weight: 500" for="phone">Xác nhận mật khẩu</label>
							<input class="form-control" style="margin-top: 5px;" type="password" id="phone" name="password_confirmation" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form> -->
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
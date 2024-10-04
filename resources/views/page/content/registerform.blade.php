<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

	<!-- Css Styles -->
	<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="/css/elegant-icons.css" type="text/css">
	<link rel="stylesheet" href="/css/nice-select.css" type="text/css">
	<link rel="stylesheet" href="/css/jquery-ui.min.css" type="text/css">
	<link rel="stylesheet" href="/css/owl.carousel.min.css" type="text/css">
	<link rel="stylesheet" href="/css/slicknav.min.css" type="text/css">
	<link rel="stylesheet" href="/css/style.css" type="text/css">
	<link rel="stylesheet" href="/css/login.css" type="text/css">
	<link rel="stylesheet" href="/fonts/material-icon/css/material-design-iconic-font.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

	<div class="humberger__menu__overlay"></div>
	<div class="humberger__menu__wrapper">
		<div class="humberger__menu__logo">
			<a href="#"><img src="img/logo.png" alt=""></a>
		</div>
		<div class="humberger__menu__cart">
			<ul>
				<li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
				<li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
			</ul>
			<div class="header__cart__price">item: <span>$150.00</span></div>
		</div>
		<div class="humberger__menu__widget">
			<div class="header__top__right__language">
				<img src="img/language.png" alt="">
				<div>English</div>
				<span class="arrow_carrot-down"></span>
				<ul>
					<li><a href="#">Spanis</a></li>
					<li><a href="#">English</a></li>
				</ul>
			</div>
			<div class="header__top__right__auth">
				<a href="#"><i class="fa fa-user"></i> Login</a>
			</div>
		</div>

		<div id="mobile-menu-wrap"></div>
		<div class="header__top__right__social">
			<a href="#"><i class="fa fa-facebook"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-linkedin"></i></a>
			<a href="#"><i class="fa fa-pinterest-p"></i></a>
		</div>
		<div class="humberger__menu__contact">
			<ul>
				<li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
				<li>Free Shipping for all Order of $99</li>
			</ul>
		</div>
	</div>
	<header class="header">
		<div class="header__top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="header__top__left">
							<ul>
								<li><i class="fa fa-envelope"></i> @if(!empty($value)) {{ Str::limit($value, 6, '...') }} @endif</li>


								<li>Miễn phí cho các đơn hàng có giá trị 1.000.000 VNĐ</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="header__top__right">
							<div class="header__top__right__social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-pinterest-p"></i></a>
							</div>

							<div class="header__top__right__auth">
								@if(auth()->check())
								<a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i>Đăng xuất</a>
								<form id="logout-form" action="" method="POST" style="display: none;">
									@csrf
								</form>
								@else
								<a href="/admin/user/login"><i class="fa fa-user"></i>Đăng nhập</a>
								@endif
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

	</header>

	<section class="signup" style="margin: 50px 0;">
		<div class="container-form">
			<div class="signup-content">
				<div class="signup-form">
					<h2 class="form-title">Sign up</h2>
					<form class="register-form" id="register-form">

						<div class="form-group">
							<label for="email"><i class="zmdi zmdi-email"></i></label>
							<input type="email" name="username" id="username" placeholder="Nhập email của bạn vào" />
						</div>
						@if(Session::has("errorr"))
						<div class="alert alert-danger">
							{{Session::get('errorr')}}
						</div>
						@endif
						<span style="color: red;">{{ $errors->first('username') }}</span>
						<div class="form-group">
							<label for="pass"><i class="zmdi zmdi-lock"></i></label>
							<input type="password" name="password" id="password" placeholder="Nhập Password của bạn vào" />
						</div>
						@if(Session::has("error"))
						<div class="alert alert-danger">
							{{Session::get('error')}}
						</div>
						@endif
						<span style="color: red;">{{ $errors->first('password') }}</span>
						<div class="form-group">
							<label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
							<input type="password" name="confirm" id="confirm" placeholder="Xác thực mật khẩu" />
						</div>
						@if(Session::has("errorrs"))
						<div class="alert alert-danger">
							{{Session::get('errorrs')}}
						</div>
						@endif
						<span style="color: red;">{{ $errors->first('confirm') }}</span>
						<div class="form-group">
							<input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
							<label for="agree-term" class="label-agree-term"><span><span></span></span>Tôi đồng ý các tuyên bố trong <a href="#" class="term-service">Điều khoản dịch vụ</a></label>
						</div>
						<div class="form-group form-button">
							<input formaction="{{ url('/register/customer') }}" type="submit" name="signup" id="signup" class="form-submit" value="Đăng ký" />
						</div>
					</form>
				</div>
				<div class="signup-image">
					<figure><img src="/img/signup-image.jpg" alt="sing up image"></figure>
					<a href="/login" class="signup-image-link">I am already member</a>
				</div>
			</div>
		</div>
	</section>
	@include('page.body.footer')
</body>
<script>
	
</script>
</html>
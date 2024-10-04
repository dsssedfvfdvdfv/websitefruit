<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ</title>

   @include('page.body.library')
<style>
    .dropdown-content {
	display: none;
	position: absolute;
	background-color: #f1f1f1;
	
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
  }
  
  .dropdown-content a {
	color: black;
	padding-top: 12px;
	padding-bottom: 12px;
	padding-right: 80px;
	padding-left: 15px;
	text-decoration: none;
	display: block;
	float: left;	
  }
  
  .dropdown-content a:hover {background-color: #ddd;}
  
  .header__top__right__auth:hover .dropdown-content {display: block;}

</style>
</head>

<body>

    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
            <li><a href="#"><i class="fa fa-heart"></i><span></span></a></li>
                        <li><a href="#" class="cart-icon"><i class="fa fa-shopping-bag"></i> <span>{{ Cart::content()->unique('id')->count();}}</span></a></li>

            </ul>
            <div class="header__cart__price">item: {{ number_format(Cart::subtotal(), 2, ',', '.') }}
                        VND <span></span></div>
        </div>
       
        <nav class="humberger__menu__nav mobile-menu">
        <ul>
                        <li><a href="/" data-menu="main">Trang chủ</a></li>
                        <li><a href="/store" data-menu="store">Cửa hàng</a></li>
                        <li><a href="/loadOrderAll" data-menu="page">Trang</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="#">Chi tiết cửa hàng</a></li>
                                <li><a href="#">Chi tiết đơn hàng</a></li>
                                <li><a href="#">Thanh toán</a></li>
                                <li><a href="#">Blog </a></li>
                            </ul>
                        </li>
                        <li><a href="#" data-menu="blog">Blog</a></li>
                        <li><a href="#" data-menu="contact">Liên hệ</a></li>
                    </ul>
        </nav>
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
                                @if(auth('customers')->check())
                                <a href="{{ route('logoutcustomer') }}"><i class="fa fa-sign-out"></i>Đăng xuất</a>
                                <form id="logout-form" action="" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                @else
                                <a href="/login"><i class="fa fa-user"></i>Đăng nhập</a>
                                @endif
                                <div class="dropdown-content">
                                <a href="/profile">Profile</a>                             
                            </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="/"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="/" data-menu="main">Trang chủ</a></li>
                            <li><a href="/store" data-menu="store">Cửa hàng</a></li>
                            <li><a href="#" data-menu="page">Trang</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="#">Chi tiết cửa hàng</a></li>
                                    <li><a href="#">Chi tiết đơn hàng</a></li>
                                    <li><a href="#">Thanh toán</a></li>
                                    <li><a href="#">Blog </a></li>
                                </ul>
                            </li>
                            <li><a href="#" data-menu="blog">Blog</a></li>
                            <li><a href="#" data-menu="contact">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span></span></a></li>
                            <li><a href="#" class="cart-icon"><i class="fa fa-shopping-bag"></i> <span>{{ Cart::content()->unique('id')->count();}}</span></a></li>

                        </ul>
                        <div class="header__cart__price">item: {{ number_format(Cart::subtotal(), 2, ',', '.') }} VND</div>
                        @include('page.body.listmenu')
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh mục</span>

                        </div>
                        <ul>
                            @foreach($categories as $category)
                            <li><a href="/product/{{ htmlspecialchars($category['description']) }}">{{ htmlspecialchars($category['name']) }}</a></li>
                            @endforeach
                        </ul>

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do you need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>{{$phone}}</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('page.body.pageindex')
    @include('page.body.footer')
</body>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.nice-select.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/jquery.slicknav.js"></script>
<script src="/js/mixitup.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('nav .header__menu ul li a').click(function(e) {
            e.preventDefault();
            let selectedMenu = $(this).data('menu');
            console.log(selectedMenu);
            if (selectedMenu === 'main') {
                loadContent('/');
            } else if (selectedMenu === 'store') {
                loadContent('/store');
            } else if (selectedMenu === 'page') {
                loadContent('/page');
            } else if (selectedMenu === 'blog') {
                loadContent('/blog');
            } else if (selectedMenu === 'contact') {
                loadContent('/contact');
            }
        });

        function loadContent(url) {
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $('#content').html(data);
                }
            });
        }
    });
</script>

</html>
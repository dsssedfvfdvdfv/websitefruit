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
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i><span></span></a></li>
                        <li><a href="#" class="cart-icon"><i class="fa fa-shopping-bag"></i> <span>{{ Cart::content()->unique('id')->count();}}</span></a></li>

                    </ul>
                    <div class="header__cart__price">item: {{ number_format(Cart::subtotal(), 2, ',', '.') }}
                        VND <span></span></div>
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
                        <li><a href="/product/{{ htmlspecialchars($category['slug']) }}">{{ htmlspecialchars($category['name']) }}</a></li>
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

            </div>
        </div>
    </div>
</section>
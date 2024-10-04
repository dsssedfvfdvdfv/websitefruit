<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach($categories as $category)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="https://firebasestorage.googleapis.com/v0/b/fir-7dffa.appspot.com/o/{{ htmlspecialchars($category['image']) }}?alt=media&token=64bc7f48-d0fe-4d50-b5bd-248eec94422c">
                        <h5><a href="{{ htmlspecialchars($category['description']) }}">{{ htmlspecialchars($category['name']) }}</a></h5>
                    </div>
                </div>
                @endforeach              
            </div>
        </div>
    </div>
</section>

<section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm nổi bật</h2>
                    </div>

                    <div class="featured__controls">                                
                        <ul>
                        <li class="active" data-filter="*">All</li>
                        @foreach($categories as $category)
                            <li data-filter=".{{ htmlspecialchars($category['slug']) }}">{{ htmlspecialchars($category['name']) }}</li>                          
                            @endforeach  
                        </ul>
                        
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix {{ htmlspecialchars($product['slug']) }} ">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="https://firebasestorage.googleapis.com/v0/b/webstorbook.appspot.com/o/{{ htmlspecialchars($product['image']) }}?alt=media&token=d5dd8a65-9156-4db1-a5ef-99232869487b">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{ htmlspecialchars($product['productname']) }}</a></h6>
                            <h5> {{ htmlspecialchars($product['price']) }} VND</h5>
                        </div>
                    </div>
                </div>
                @endforeach
             
            </div>
        </div>
    </section>

    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="/img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="/img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="/img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Tung Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Danh mục</h4>
                        <ul>
                            @foreach($categories as $category)
                            <li><a href="/product/{{ htmlspecialchars($category['slug']) }}">{{ htmlspecialchars($category['name']) }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                   


                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Sản phẩm nổi bật</h4>
                            <div class="latest-product__slider owl-carousel">
                                @foreach($producthot as $product)
                                @if($loop->iteration % 3 == 1)
                                <div class="latest-prdouct__slider__item">
                                    @endif
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                        <a href="/detailproduct/{{ htmlspecialchars($product['id']) }}"><img src="https://firebasestorage.googleapis.com/v0/b/webstorbook.appspot.com/o/{{ htmlspecialchars($product['image']) }}?alt=media&token=d5dd8a65-9156-4db1-a5ef-99232869487b" alt="" style="height: 60px;width: 60px;"></a>
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ htmlspecialchars($product['productname']) }}</h6>
                                            <span>{{ number_format($product->price) }} VND</span>
                                        </div>
                                    </a>
                                    @if($loop->iteration % 3 == 0 || $loop->last)
                                </div>
                                @endif
                                @endforeach
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            @foreach($productsale as $product)
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                               <div class="product__discount__item__pic set-bg" data-setbg="https://firebasestorage.googleapis.com/v0/b/webstorbook.appspot.com/o/{{ htmlspecialchars($product['image']) }}?alt=media&token=d5dd8a65-9156-4db1-a5ef-99232869487b">
                                        <div class="product__discount__percent">{{ htmlspecialchars($product['sale']) }}%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="/detailproduct/{{ htmlspecialchars($product['id']) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>{{ htmlspecialchars($product['name']) }}</span>
                                        <h5><a href="#">{{ htmlspecialchars($product['productname']) }}</a></h5>
                                        <div class="product__item__price">{{ $discountedPrice =number_format(($product['price'] * (100 - $product['sale'])) / 100) }} VND <span> {{number_format(htmlspecialchars($product['price'])) }} VND</span></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select>
                                    <option value="0">Default</option>
                                    <option value="0">Default</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>{{$count}}</span> Products found</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($products as $product)    
                    <div class="col-lg-4 col-md-6 col-sm-6">                       
                        <div class="product__item">
                            <div name='id' class="hidden" data-value="{{ htmlspecialchars($product['id']) }}"></div>                                       
                            <div class="product__item__pic set-bg imgproduct">
                            <a href="/detailproduct/{{ htmlspecialchars($product['id']) }}"><img class="product__item__pic set-bg imgproduct" value="{{ htmlspecialchars($product['image']) }}" src="https://firebasestorage.googleapis.com/v0/b/webstorbook.appspot.com/o/{{ htmlspecialchars($product['image'])}}?alt=media&token=d5dd8a65-9156-4db1-a5ef-99232869487b" alt="">  </a>
                            <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>         
                                </ul>
                            </div>                         
                            <div class="product__item__text">
                                <h6 ><a class="nameproduct"  href="#" data-value="{{ htmlspecialchars($product['productname']) }}">{{ htmlspecialchars($product['productname']) }}</a></h6>
                                <h5 class="priceproduct" data-value="{{ htmlspecialchars($product['price']) }}">{{ htmlspecialchars(number_format($product['price'])) }} VND</h5>
                            </div>
                        </div>                      
                    </div>                 
                    @endforeach
                </div>
                {!!$products->links()!!}              
            </div>
        </div>
    </div>
</section>
<script>
    
</script>
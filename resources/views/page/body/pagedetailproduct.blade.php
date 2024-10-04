<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Chi tiết sản phẩm</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <a href="./index.html">Sản phẩm</a>
                        <span>Chi tiết sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="https://firebasestorage.googleapis.com/v0/b/webstorbook.appspot.com/o/{{ htmlspecialchars($productdetail['image'])}}?alt=media&token=d5dd8a65-9156-4db1-a5ef-99232869487b" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <img data-imgbigurl="img/product/details/product-details-2.jpg" src="img/product/details/thumb-1.jpg" alt="">
                        <img data-imgbigurl="img/product/details/product-details-3.jpg" src="img/product/details/thumb-2.jpg" alt="">
                        <img data-imgbigurl="img/product/details/product-details-5.jpg" src="img/product/details/thumb-3.jpg" alt="">
                        <img data-imgbigurl="img/product/details/product-details-4.jpg" src="img/product/details/thumb-4.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{$productdetail->productname}}</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <div class="product__details__price">{{$productdetail->price}} VND</div>
                    <form action="/cart/{{$productdetail->id}}" method="get">
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1" min="1" name="quantityproduct" class="quantityproduct">
                                </div>
                            </div>
                        </div>
                        <button type="submit" href="#" class="primary-btn">ADD TO CARD</button>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>

                            <li><b>Tình trạng </b> @if ($productdetail->stock_quantity > 1)<span class="text-success font-weight-bold">Còn hàng</span></li>
                            @else
                            <span class="text-danger font-weight-bold">Hết hàng</span></li>
                            @endif
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Reviews <span>({!! $count !!})</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>{{$productdetail->description}}</p>
                            </div>

                            </form>
                            <form>
                                {!! csrf_field() !!}
                                <div class="review_product">
                                    <div class="col-lg-12">
                                        <div class="section-title related__product__title">
                                            <h2>Đánh giá sản phẩm</h2>
                                        </div>
                                    </div>
                                    <textarea id="text" rows="4" cols="50" class="txaa p-2" placeholder="Bình luận sản phẩm"></textarea>

                                    <input type="hidden" value="{{$productdetail->id}}" name="idproduct">
                                    <input type="hidden" value="{!!$value!!}" name="user">
                                    <button class="btn btn-info btn-submit" style="float: right; margin-top: 10px;">Gửi đánh giá</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">

                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel indicators -->
                                    <ol class="carousel-indicators">
                                        @foreach($data->chunk(2)->take(5) as $key => $chunk)
                                        <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                                        @endforeach
                                    </ol>
                                    <!-- Wrapper for carousel items -->
                                    <div class="carousel-inner">
                                        @foreach($data->chunk(2) as $key => $chunk)
                                     
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <div class="row">
                                                @foreach($chunk as $info)                                              
                                                <div class="col-sm-6">
                                                    <div class="media">
                                                        <img src="https://firebasestorage.googleapis.com/v0/b/webstorbook.appspot.com/o/{!! $info->avatar !!}?alt=media&token=d5dd8a65-9156-4db1-a5ef-99232869487b" class="mr-3" alt="">
                                                        <div class="media-body">
                                                            <div class="testimonial">
                                                                <p>{!! $info->comment !!}</p>
                                                                <p class="overview"><b>{!! $info->lastname !!}  {!! $info->firstname !!}</b>, {!! $info->city !!}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                @endforeach
                                            </div>
                                        </div>
                                     
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Sản phẩm liên quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product__discount__slider owl-carousel">
                @foreach($productrelase as $product)
                <div class="col-lg-4">
                    <div class="product__discount__item">
                        <div class="product__discount__item__pic set-bg" data-setbg="https://firebasestorage.googleapis.com/v0/b/webstorbook.appspot.com/o/{{ htmlspecialchars($product['image']) }}?alt=media&token=d5dd8a65-9156-4db1-a5ef-99232869487b">
                            <div class="product__discount__percent">{{ htmlspecialchars($product['sale']) }}%</div>
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="/detailproduct/{{ htmlspecialchars($product['id']) }}"><i class="fa fa-retweet"></i></a></li>
                                
                            </ul>
                        </div>
                        <div class="product__discount__item__text">
                            <span>{{ htmlspecialchars($product['name']) }}</span>
                            <h5><a href="#">{{ htmlspecialchars($product['productname']) }}</a></h5>
                            <div class="product__item__price">{{ $discountedPrice = ($product['price'] * (100 - $product['sale']) / 100) }} VND <span> {{ htmlspecialchars($product['price']) }} VND</span></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function() {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else if (oldValue = 1) {
                var newVal = 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });
</script>
<script>
    $(document).ready(function() {
        $(".btn-submit").click(function(e) {
            e.preventDefault();

            var _token = $("input[name='_token']").val();
            var comment = $("#text").val();
            var idproduct = $("input[name='idproduct']").val();
            var user = $("input[name='user']").val();
            if (user) {
                $.ajax({
                    url: "/submitreview",
                    type: 'POST',
                    data: {
                        _token: _token,
                        comment: comment,
                        idproduct: idproduct,
                        user: user
                    },

                    success: function(data) {
                        Swal.fire({
                            icon: "success",
                            title: "Cám ơn bạn đã đánh giá!",
                            showConfirmButton: false,
                            timer: 1500
                        });

                        setTimeout(function() {
                            location.reload();
                        }, 1500);


                    },
                    error: function(error) {
                        console.log(error);
                        alert('Error submitting review. Please try again.');
                    }
                });
            } else {
                window.location.href = "/login";
            }



        });
    });
</script>
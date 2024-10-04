<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="#">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6><span class="icon_tag_alt"></span> Bạn muốn có coupon? <a href="#">Click here</a> để nhập code
                </h6>
            </div>
        </div>
        <div class="checkout__form">
            <h4>Chi tiết hóa đơn</h4>
            <form action="">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div id="section-shipping-rate" class="section">
                            <div class="order-checkout__loading--box">
                                <div class="order-checkout__loading--circle"></div>
                            </div>
                            <div class="section-header">
                                <h2 class="section-title" style="text-align: left;">Phương thức vận chuyển</h2>
                            </div>
                            <div class="section-content">
                                <div class="content-box">
                                    <div class="content-box-row">
                                        <div class="radio-wrapper">
                                            <label class="radio-label" for="shipping_rate_id_1000097177" style="margin: 0;">
                                                <div class="radio-input">
                                                    <input id="shipping_rate_id_1000097177" class="input-radio" type="text" name="shipping_rate_id" value="#" checked style="display: none;" />
                                                </div>
                                                <img src="/img/logoshippingfee.png" alt="" style="width: 8%;">
                                                <span class="radio-label-primary" style="margin-left:10px ;">Phí giao hàng</span>

                                                <span class="radio-accessory content-box-emphasis p-2">
                                                    30,000₫
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section-header" style="margin-top: 20px;">
                                <h2 class="section-title" style="text-align: left;">Phương thức thanh toán</h2>
                            </div>
                            <div class="section-content">
                                <div class="content-box">
                                    <div class="content-box-row">
                                        <div class="radio-wrapper">
                                            <label class="radio-label" for="shipping_rate_id_1000097177" style="margin: 0;">
                                                <div class="radio-input">
                                                    <input class="input-radio" type="radio" id="payment" name="payment" value="Thanh toán trực tiếp" checked />
                                                </div>
                                                <img class='main-img' src="https://hstatic.net/0/0/global/design/seller/image/payment/cod.svg?v=6" />
                                                <span class="radio-label-primary" style="margin-left:10px ;">Thanh toán khi giao hàng (COD)</span>

                                            </label>
                                        </div>


                                     
                                    </div>
                                    <span style="color: red;">{{ $errors->first('payment') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Đơn hàng của bạn</h4>
                            <div style="display: inline-flex;">
                                <div class="checkout__order__products">Sản phẩm</div>
                                <div class="checkout__order__products" style="margin: 0 30px;">Số lượng(kg)</div>
                                <div class="checkout__order__products" style="margin-left: 10px;">Thành tiền(VND)</div>
                            </div>
                            @foreach($cart as $item)
                            <ul>
                                <li>
                                    <p style="width: 110px;">{{$item->name}}</p> <span style="margin: 0 30px;">{{$item->qty}}</span> <span style="margin-left: 50px;">{{($item->price)*($item->qty)}}</span>
                                </li>
                            </ul>
                            @endforeach
                            <div class="checkout__order__subtotal" id="subtotal">Tổng giá ban đầu <span name="subtotal" id="subtotal">{{Cart::subtotal()}} VND</span></div>
                            <div class="checkout__order__total" id="shipfee">Phí ship <input class="input-span" type="text" readonly value="30000" name="shipfee"> <span>VND</span>
                            </div>
                            <div class="checkout__order__total">Tổng tiền <input type="text" class="input-span" readonly style="width: 163px;" name="total" id="total" value=""> <span>VND</span></div>

                            <button formaction="/addProductDetail" type="submit" class="site-btn">PLACE ORDER</button>
                           
                            
                                <button formaction="/paymentVNpay" formmethod="post" type="submit" name="redirect" class=" online site-btn" >
                                   Thanh toán VNPAY
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>



<script>
    var subtotal = parseFloat("{{ Cart::subtotal() }}");
    var shipFee = 30000;
    var total = subtotal + shipFee;
    document.getElementById("total").value = total;
</script>
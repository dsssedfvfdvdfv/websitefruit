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
            <form action="/order">
                @csrf
                <div class="row">
                  
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Họ<span>*</span></p>
                                    <input type="text" name="lastname">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Tên<span>*</span></p>
                                    <input type="text" name="firstname">
                                    <span style="color: red;">{{ $errors->first('firstname') }}</span>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                        <div class="col-lg-6">
                        <div class="checkout__input">
                            <p>Thành phố<span>*</span></p>
                            <select name="city" id="city" >
                                <option value="" selected>Chọn thành phố</option>
                                @foreach ($cities['data'] as $city)
                                <option value="{{ $city['ProvinceName'] }}">{{ $city['ProvinceName'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="checkout__input" >
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" placeholder="Street Address" class="checkout__input__add" name="adress">
                            <span style="color: red;">{{ $errors->first('adress') }}</span>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="text" name="phone">
                                    <span style="color: red;">{{ $errors->first('phone') }}</span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email">
                                </div>
                            </div>
                        </div>

                        <div class="checkout__input">
                            <p>Ghi chú<span>*</span></p>
                            <input type="text" placeholder="Chú ý về đơn hàng" name="note">
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
                                    <p style="width: 110px;">{{$item->name}}</p> <span style="margin: 0 30px;">{{$item->qty}}</span> <span style="margin-left: 50px;">{{number_format(($item->price)*($item->qty))}}</span>
                                </li>
                            </ul>
                            @endforeach
                            <div class="checkout__order__subtotal" id="subtotal">Tổng giá ban đầu <span name="subtotal" id="subtotal">{{number_format( Cart::subtotal())}} VND</span></div>
                            <div class="checkout__order__total" id="shipfee">Phí ship <input class="input-span" type="text" readonly value="30000" name="shipfee"> <span>VND</span>
                            </div>
                            <div class="checkout__order__total">Tổng tiền <input type="text" class="input-span" readonly style="width: 163px;" name="total" id="total" value=""> <span>VND</span></div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>

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
    document.getElementById("total").value =  total;
</script>
<script>

</script>
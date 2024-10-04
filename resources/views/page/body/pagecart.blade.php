<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Tung Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home </a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="https://firebasestorage.googleapis.com/v0/b/webstorbook.appspot.com/o/{{$item->options->image}}?alt=media&token=d5dd8a65-9156-4db1-a5ef-99232869487b" alt="">
                                    <h5>{{$item->name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                 {{ number_format($item->price)}} VND
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                        <a href="#" class="decrease-quantity" data-item-id="{{$item->rowId}}"><i class="fa-solid fa-minus"></i></a>
                                            <input type="text" class="quantity-input" name="quantity" data-price="{{$item->price}}" value="  {{$item->qty}}" min="1">
                                            <a href="#" class="add-to-cart" data-item-id="{{$item->id}}"><i class="fa-solid fa-plus"></i></a>
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    <span class="item-total" data-value="{{$item->price}}">{{number_format(($item->price)*($item->qty))}} VND</span>

                                </td>
                                <td class="shoping__cart__item__close">
                                <a href="#" class="remove-to-cart" data-row-id="{{$item->rowId}}"><span class="icon_close"></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- <script>
                        // Bắt sự kiện khi số lượng thay đổi
                        const quantityInputs = document.querySelectorAll('.quantity-input');
                        quantityInputs.forEach(input => {
                            input.addEventListener('input', updateTotal);
                        });

                        function updateTotal(event) {
                            const input = event.target;
                            const price = parseFloat(input.getAttribute('data-price'));
                            const quantity = parseInt(input.value);
                            const total = price * quantity;
                            const totalElement = input.closest('tr').querySelector('.item-total');
                            totalElement.textContent = total;
                            totalElement.setAttribute('value', total);
                            
                        }
                    </script> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns d-flex justify-content-between">
                    <a href="/store" class="primary-btn cart-btn">Tiếp tục mua sắm</a>
                    <a href="/createOrder" class="primary-btn cart-btn">Trang Thanh Toán</a>
                    <div>
                        <p class="fa-2x fonst-weight-bold">Tổng giá tiền là: <span id="cart-total" class="text-primary">{{number_format(Cart::subtotal())}}</span> VND</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function() {
    $('.remove-to-cart').click(function(e) {
        e.preventDefault(); 
        var itemID = $(this).data('row-id');     
        $.ajax({
            type: 'GET',
            url: '/cart/remove/' + itemID, 
            success: function(data) {
                location.reload();                    
            },
            error: function(xhr, status, error) {
              
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {
    $('.add-to-cart').click(function(e) {
        e.preventDefault(); 
        var itemID = $(this).data('item-id');     
        $.ajax({
            type: 'GET',
            url: '/cart/' + itemID, 
            success: function(data) {
                location.reload();                    
            },
            error: function(xhr, status, error) {
              
            }
        });
    });
});
</script>
<script>
  $(document).ready(function() {
    $('.decrease-quantity').click(function(e) {
        e.preventDefault();
        var itemID = $(this).data('item-id'); // Trích xuất itemID từ data-item-id
        var quantityInput = $(this).closest('.pro-qty').find('.quantity-input');
        var currentQuantity = parseInt(quantityInput.val(), 10);
        if (currentQuantity > 1) {           
            var newQuantity = currentQuantity - 1;
            quantityInput.val(newQuantity);
            updateCart(itemID, newQuantity);
        }
    });

    function updateCart(itemID, newQuantity) {      
        $.ajax({
            type: 'GET',
            url: '/updateqty/' + itemID, 
            data: { quantity: newQuantity },
            success: function(data) {
               location.reload();
            },
            error: function(xhr, status, error) {
              
            }
        });
    }
});

</script>

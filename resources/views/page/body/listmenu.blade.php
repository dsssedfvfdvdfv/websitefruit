<div class="cart-dropdown" id="cart-dropdown">
    <div class="col-lg-12">
    @if (count($cart) === 0)   
                <img src="../img/cart/emptycart.png" alt="" style="width: 100px; height: 100px; margin-right: 58px;">
                <h3 class="mb-3">Giỏ hàng trống...</h3>
    @else
        <div class="shoping__cart__table" style="width: 300px;">
            <table>
                <thead>
                    <tr>
                        <th class="shoping__product">Products</th>
                        <th>Price</th>
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
                        {{ number_format(($item->price),2,',','.') }} VND
                        </td>
                        <td class="shoping__cart__total">
                           
                        </td>
                        <td class="shoping__cart__item__close">
                            <a href="/cart/remove/{{$item->rowId}}"><span class="icon_close"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="shoping__checkout d-flex">
            <a href="/shoppingcart" class="btn btn-primary mr-2">Xem giỏ hàng</a>
            <a href="/removeall" class="btn btn-danger">Xóa giỏ hàng</a>
        </div>

        @endif
    </div>

</div>
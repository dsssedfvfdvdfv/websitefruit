<div class="card">
    <div class="card-body">
        <div class="container mb-5 mt-3">
            <div class="row d-flex align-items-baseline">
                <div class="col-xl-9">
                    <p style="color: #7e8d9f;font-size: 20px;">Invoice &gt;&gt; <strong>{!! $detail->id !!}</strong></p>
                </div>
            </div>
            <div class="container">
                <div class="col-md-12">
                    <div class="text-center">
                        <i class=" fa-solid fa-file-invoice-dollar fa-4x ms-0" style="color:#000 ;"></i>
                        <p class="pt-2">Hóa đơn</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8">
                        <ul class="list-unstyled">
                            <li class="text-muted">Tới: <span style="color:#8f8061 ;">{{ $detail->lastname }} {{ $detail->first_name }} </span></li>
                            <li class="text-muted">Thành phố: {!! $detail->city !!}</li>
                            <li class="text-muted">Địa chỉ: {!! $detail->adress !!}</li>
                            <li class="text-muted"><i class="fas fa-phone"></i> {!! $detail->phone !!}</li>
                        </ul>
                    </div>
                    <div class="col-xl-4">
                        <p class="text-muted">Invoice</p>
                        <ul class="list-unstyled">
                            <li class="text-muted"><i class="fas fa-circle" style="color:#000 ;"></i> <span class="fw-bold">ID:</span>{!! $detail->id !!}</li>
                            <li class="text-muted"><i class="fas fa-circle" style="color:#000 ;"></i> <span class="fw-bold">Creation Date: </span>{!! $detail->created_at !!}</li>
                            <li class="text-muted"><i class="fas fa-circle" style="color:#000;"></i> <span class="me-1 fw-bold">Trạng thái thanh toán:
                                    @if($detail->paymentstatus==0)
                                </span><span class="badge bg-warning text-black fw-bold">Chưa thanh toán</span>
                                @endif

                                @if($detail->paymentstatus==1)
                                </span><span class="badge bg-lime text-black fw-bold">Đã thanh toán</span></li>
                            @endif

                            </li>
                            <li class="text-muted"><i class="fas fa-circle" style="color:#000;"></i> <span class="me-1 fw-bold">Trạng thái giao hàng:
                                    @if($detail->orderstatus==0)
                                </span><span class="badge bg-warning text-black fw-bold">Đang giao hàng</span>
                                @endif

                                @if($detail->orderstatus==1)
                                </span><span class="badge bg-lime text-black fw-bold">Đã giao hàng</span></li>
                            @endif
                            @if($detail->orderstatus==2)
                                </span><span class="badge bg-orange text-black fw-bold" style="color: #000;">Đang giao hàng</span></li>
                            @endif

                            @if($detail->orderstatus==3)
                                </span><span class="badge bg-red text-black fw-bold" style="color: #000;">Đã hủy đơn</span></li>
                            @endif
                            </li>
                        </ul>
                    </div>
                </div>
                @foreach($item as $items)
                <div class="row my-2 mx-1 justify-content-center">
                   
                    <div class="col-md-2 mb-4 mb-md-0">
                        <div class="
                        bg-image
                        ripple
                        rounded-5
                        mb-4
                        overflow-hidden
                        d-block
                        " data-ripple-color="light">
                            <img src="https://firebasestorage.googleapis.com/v0/b/webstorbook.appspot.com/o/{{$items->image}}?alt=media&token=d5dd8a65-9156-4db1-a5ef-99232869487b" class="w-100" height="200px" />
                            <a href="#!">
                                <div class="hover-overlay">
                                    <div class="mask" style="background-color: hsla(0, 0%, 98.4%, 0.2)"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-7 mb-4 mb-md-0">
                   
                        <p class="fw-bold" style="font-weight: bold;">{{$items->productName}}</p>
                        <p class="mb-1">
                            <span class="text-muted me-2">Số lượng:</span><span>{{$items->quantity}}</span>
                        </p>
                        <p>
                            <span class="text-muted me-2">Đơn giá:</span><span>{{number_format($items->price)}} VND</span>
                        </p>
                    </div>
                    <div class="col-md-3 mb-4 mb-md-0">
                        <span>Tổng tiền: </span>
                        <h5 class="mb-2">
                           <span class="align-middle">{{ number_format( $items->quantity * $items->price)}} VND</span>
                        </h5>
                      
                    </div>
                </div>
                @endforeach
                {!! $item->links() !!}
                <hr>
                <div class="row">
                  
                    <div class="col-xl-3" style="font-size: 20px;">
                    <p class="mb-1">
                            <span class="text-muted me-2">Phương thức thanh toán:</span><span>{{$detail->paymentmethod}}</span>
                        </p>
                        <ul class="list-unstyled">                      
                            <li class="text-muted ms-3"><span class="text-black me-4">Tổng sản phẩm:</span> {!! number_format($detail->total) !!} VND</li>
                            <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Shipping: </span> {!! number_format($detail->shippingfee) !!} VND</li>
                        </ul>
                        <p class="text-black float-start"><span class="text-black me-3"> Tổng hóa đơn: </span><span style="font-size: 25px;font-weight: bold;"> {!! number_format($detail->totalall) !!} VND</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Invoice</title>
  <style>
    .invoice-info {
      display: flex;
      margin-bottom: 20px;
    }

    .table {
      width: 100%;
      border-collapse: collapse;
    }


    .table th {
      background-color: #f2f2f2;
      border: 1px solid #d8d8d8;
      text-align: left;
      padding: 10px;
    }


    .table td {
      border: 1px solid #d8d8d8;
      padding: 10px;
    }


    .table tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }


    .table tbody tr:nth-child(odd) {
      background-color: #ffffff;
    }

    .table tbody tr td:last-child {
      border-right: 0;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="content-wrapper" style="margin-left: 0;">
      <div class="invoice-info">
        <div class="">
          To
          <address>
            <strong>Xin chào {!!$info->lastname!!} {!! $info->first_name !!}</strong><br>

            {!!$info->adress!!}<br>
            {!!$info->city!!}<br>

            Email: {!!$info->email!!}
          </address>
        </div>

        <div class="col-sm-4 invoice-col" style="margin-left: 30px;">
          <b>Hóa đơn #{!!$info->id!!}</b><br>
          <br>
          <b>Được tạo ngày:</b> {!!$info->updated_at!!}<br>
        </div>

      </div>

      <div class="row" style="margin-bottom: 30px;">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Tổng tiền</th>
              </tr>
            </thead>

            <tbody>
              @foreach($order as $item)
              <tr>
                <td>{!! $item->id !!}</td>
                <td>{!! $item->productName !!}</td>
                <td>{!! $item->quantity !!}</td>
                <td>{{ number_format($item->price, 0) }} VND</td>
                <td>{{ number_format($item->quantity * $item->price, 0) }} VND</td>
              </tr>
              @endforeach
            </tbody>

          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
        </div>
        <div class="col-6">


          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>{{ number_format($info->total, 0) }} VND</td>
              </tr>            
              <tr>
                <th>Shipping:</th>
                <td>{{ number_format($info->shippingfee, 0) }} VND</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>{{ number_format($info->totalall, 0) }} VND</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>{{$feature}}</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">{{$feature}}</li>
            </ol>
         </div>
      </div>
   </div>
</section>

<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card card-primary mt3 table-pagenition">
               <div class="card-header">
                  <h3 class="card-title">@yield('title', 'Hóa đơn')</h3>
               </div>
               <div id="item-lists">
                  @include('admin.data.datainvoice')
               </div>
            </div>
         </div>
      </div>

   </div>
   </div>
   <div class="col-md-6">
   </div>
   </div>
   </div>
</section>
<script>
   $(document).ready(function() {
      $('#dataTable').DataTable({
         "processing": true,
         "serverSide": true,
         "ajax": '{{ route("loadlist") }}',
         "columns": [{
               "data": 'id',
               name: 'id'
            },
            {
               "data": 'codeid',
               name: 'codeid'
            },
            {
               "data": null,
               "name": 'firstname',
               "render": function(data, type, row) {
                  return row.lastname + ' ' + row.first_name;
               }
            },
            {
               "data": 'city',
               name: 'city'
            },
            {
               "data": 'adress',
               name: 'adress'
            },
            {
               "data": 'phone',
               name: 'phone'
            },
            {
               "data": 'email',
               name: 'email'
            },
            {
               "data": "created_at",
               "name": "created_at",
               "render": function(data, type, row) {

                  return moment(data).format('DD-MM-YYYY');
               }
            },
            {
               "data": 'totalall',
               "name": 'totalall',
               "render": function(data, type, row) {
                  var formattedTotal = parseFloat(data).toLocaleString('en-US', {
                     style: 'currency',
                     currency: 'VND'
                  });
                  return formattedTotal;
               }
            },
            {
               "data": 'paymentmethod',
               name: 'paymentmethod'
            },
            {
               "data": "paymentstatus",
               name: 'paymentstatus',
               "render": function(data, type, row) {
                  if (data === 0) {
                     return "<button class='btn-payment' data-id='" + row.id + "'><i class='fa-solid fa-xmark'></i></button>";

                  } else if (data === 1) {
                     return "<span style='color:blue;font-weight:bold'>Đã thanh toán</span>";
                  } else {
                     return "Trạng thái không xác định";
                  }

               }
            },
            {
               "data": "orderstatus",
               name: 'orderstatus',
               "render": function(data, type, row) {
                  if (data === 0) {
                     return "<span style='color:red;font-weight:bold'>Chưa nhận hàng</span>";
                  } else if (data === 1) {
                     return "<span style='color:blue;font-weight:bold'>Đã nhận hàng</span> ";
                  }else if (data === 2) {
                     return "<span style='color:orange;font-weight:bold'>Đang giao hàng </span> "
                  }
                   else if (data === 3) {
                     return "<span style='color:red;font-weight:bold'>Đã hủy đơn </span> "
                  } else {
                     return "Trạng thái không xác định";
                  }
               }
            },
            {
               "data": null,
               "render": function(data, type, row) {
                  var activateLink = '<a href="/delivery/' + row.id + '" class="btn btn-success activate-btn" data-id="' + row.id + '"><i class="fa-solid fa-check"></i></a>';
                  var deleteLink = '<a href="/cancel/' + row.id + '" class="btn btn-danger delete-btn" data-id="' + row.id + '"><i class="fa-solid fa-xmark"></i></a>';
                  if (row.orderstatus === 0) {
                     return '<div class="btn-group" role="group">' + activateLink + deleteLink + '</div>';
                  } else if (row.orderstatus === 1) {
                     return '<i class="fa-solid fa-check" style="color:green;font-weight:bold;font-size:30px"></i>';
                  }else if (row.orderstatus === 2) {                   
                     return '<a href="/sucess/' + row.id + '"  data-id="' + row.id + '"><i class="fa-solid fa-truck-fast" style="color:orange;font-weight:bold;font-size:30px"></i></a>';                     
                  }
                   else {
                     return '<i class="fa-solid fa-ban" style="color:red;font-weight:bold;font-size:30px"></i>'
                  }
               }
            },
            {
               "data": null,
               "render": function(data, type, row) {
                  var view = '<a href="/detailinvoice/' + row.id + '">View</a>';
                  return '<div class="btn-group" role="group">' + view + '</div>';
               }
            }

         ]
      });
   });
</script>
<script>
   var customerID = $(this).data('id');
   console.log(customerID);
   $(document).on('click', '.btn-payment', function(e) {
      e.preventDefault();
      var customerID = $(this).data('id');
      console.log(customerID);
      Swal.fire({ // Sử dụng Swal.fire thay vì swal
         title: "Xác nhận kích hoạt?",
         text: "Đơn hàng đã được thanh toán?",
         icon: 'success',
         showCancelButton: true, // Hiển thị nút hủy bỏ
         confirmButtonColor: "#3085d6",
         cancelButtonColor: "#d33",
         confirmButtonText: "Kích hoạt",

      }).then((result) => {
         if (result.isConfirmed) {

            Swal.fire({
               title: "Success!",
               text: "Đã thanh toán đơn hàng",
               icon: "success",
               timer: 1000,
               showConfirmButton: false
            });
            setTimeout(function() {
               window.location.href = '/paymentstatus/' + customerID;
            }, 1000)

         }
      });
   });
</script>
@extends('admin.user.pagecustomer')
@section('title', 'Trang quản trị')
@section('content')
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
                  <h3 class="card-title">@yield('title', 'Admin')</h3>
               </div>
               <div id="item-lists">
                  @include('admin.data.datacustomer')
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
        
         "ajax": '{{ route("customer") }}',
         "columns": [{
               "data": "id",
               name: 'id'
            },
            {
               "data": "username",
               name: 'username'
            },
            {
               "data": "level",
               name: 'level'
            },                          
            {
               "data": "user_type",
               name: 'user_type',
               "render": function(data, type, row) {
                  if (data === 0) {
                     return "admin";
                  } else if (data === 1) {
                     return "user";
                  } else {
                     return "Trạng thái không xác định";
                  }
               }
            },
            {
               "data": "status",
               "name": "status",
               "render": function(data, type, row) {
                  if (data === 0) {
                     return "Không hoạt động";
                  } else if (data === 1) {
                     return "Hoạt động";
                  } else {
                     return "Trạng thái không xác định";
                  }
               }
            },
            {
               "data": "created_at",
               "name": "created_at",
               "render": function(data, type, row) {

                  return moment(data).format('DD-MM-YYYY');
               }
            },
            {
               "data": null,
               "render": function(data, type, row) {
                  var activateLink = '<a href="#" class="btn btn-success activate-btn" data-id="' + row.id + '"><i class="fa-solid fa-check"></i></a>';
                  var deleteLink = '<a href="#" class="btn btn-danger delete-btn" data-id="' + row.id + '"><i class="fa-solid fa-xmark"></i></a>';
                  var editLink = '<a href="/editcustomer/' + row.id + '" class="btn btn-info edit-btn" ><i class="fa-solid fa-pen"></i></a>';

                  return '<div class="btn-group" role="group">' + activateLink + deleteLink + editLink + '</div>';
               }
            }
         ],

      });
      
   });
</script>
<script>
   $(document).on('click', '.activate-btn', function(e) {
      e.preventDefault();
      var customerID = $(this).data('id');
      Swal.fire({ // Sử dụng Swal.fire thay vì swal
         title: "Xác nhận kích hoạt?",
         text: "Bạn có chắc chắn muốn kích hoạt người dùng này?",
         icon: 'success',
         showCancelButton: true, // Hiển thị nút hủy bỏ
         confirmButtonColor: "#3085d6",
         cancelButtonColor: "#d33",
         confirmButtonText: "Kích hoạt",

      }).then((result) => {
         if (result.isConfirmed) {

            Swal.fire({
               title: "Success!",
               text: "Tài khoản đã được kích hoạt",
               icon: "success",
               timer: 1000,
               showConfirmButton: false
            });
            setTimeout(function() {
               window.location.href = '/activate/customer/' + customerID;
            }, 1000)

         }
      });
   });


   $(document).on('click', '.delete-btn', function(e) {
      e.preventDefault();
      var customerID = $(this).data('id');
      Swal.fire({
         title: "Xác nhận thực hiện hành động?",
         text: "Chọn một hành động để thực hiện cho người dùng này:",
         icon: "warning",
         showCancelButton: true,
         confirmButtonColor: "#d33",
         cancelButtonColor: "#3085d6",
         confirmButtonText: "Xóa người dùng",
         cancelButtonText: "Vô hiệu hóa người dùng",
         reverseButtons: true
      }).then((result) => {
         if (result.isConfirmed) {
            Swal.fire({
               title: "Success!",
               text: "Tài khoản đã được xóa",
               icon: "success",
               timer: 1000,
               showConfirmButton: false
            });


            setTimeout(function() {
               window.location.href = '/delete/customer/' + customerID;
            }, 1000);
         } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
               title: "Success!",
               text: "Tài khoản đã được vô hiệu hóa",
               icon: "success",
               timer: 1000,
               showConfirmButton: false
            });
            setTimeout(() => {
               window.location.href = '/deactivate/customer/' + customerID;
            }, 1000);

         }
      });
   });
</script>

@endsection
@extends('admin.user.pagefruit')
@section('title', 'Trang sản phẩm')
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
                  @include('admin.data.datafruit')
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
         "lengthMenu": false,
         "pageLength": 1,
         "ajax": '{{ route("loadfruit") }}',
         "columns": [{
               "data": 'id',
               name: 'id'
            },
            {
               "data": 'productname',
               name: 'productname'
            },
            {
               "data": 'description',
               name: 'description'
            },
            {
               "data": 'price',
               name: 'price'
            },
            {
               "data": 'stock_quantity',
               name: 'stock_quantity'
            },
            {
               "data": 'SupplierName',
               "name": 'SupplierName'
            } ,
            {
               "data": "hot",
               "name": "hot",
               "render": function(data, type, row) {
                  if (data === 1) {
                     return "Nổi bật";
                  } else if (data === 0) {
                     return "Tắt nổi bật";
                  } else {
                     return "Trạng thái không xác định";
                  }
               }
            },
            {
               "data": "image",
               name: 'image',
               "render": function(data, type, row) {
                  if (data) {
                     return '<img src="https://firebasestorage.googleapis.com/v0/b/webstorbook.appspot.com/o/' + data + '?alt=media&token=d5dd8a65-9156-4db1-a5ef-99232869487b" alt="Ảnh sản phẩm" style="width:100%">';
                  } else {
                     return '';
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
               "data": 'orderposition',
               name: 'orderposition'
            },
            {
               "data": 'MethodName',
               name: 'MethodName'
            },
            {
               "data": 'alias',
               name: 'alias'
            },

   
            {
               "data": 'keyword',
               name: 'keyword'
            },
            {
               "data": 'description_keyword',
               name: 'description_keyword'
            },
         
            {
               "data": null,
               "render": function(data, type, row) {

                  var editLink = '<a href="/editfruit/' + row.id + '" class="btn btn-info edit-btn" ><i class="fa-solid fa-pen"></i></a>';

                  return '<div class="btn-group" role="group">' + editLink + '</div>';
               }
            }
         ]
      });
   });
</script>


@endsection
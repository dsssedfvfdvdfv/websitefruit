<div class="content-wrapper" style="margin-left: 0">

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-3">

               <!-- Profile Image -->
               <div class="card card-primary ">
                  <div class="card-body box-profile">
                     <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" id="previewImage" src="https://firebasestorage.googleapis.com/v0/b/webstorbook.appspot.com/o/{{ isset($infocustomer->avatar) ? $infocustomer->avatar : '' }}?alt=media&token=d5dd8a65-9156-4db1-a5ef-99232869487b" alt="User profile picture">
                     </div>

                     <h3 class="profile-username text-center">{{ isset($customerdetail->firstname) ? $customerdetail->firstname : '' }}</h3>

                     <p class="text-muted text-center">Thành viên
                        @if (isset($totalSum))
                        @if ($totalSum >= 20000000)
                        VIP
                        @elseif ($totalSum >= 10000000)
                        Kim Cương
                        @elseif ($totalSum >= 1000000)
                        Vàng
                        @elseif ($totalSum >= 200000)
                        Bạc
                        @else
                        Thường
                        @endif
                        @else
                        Chưa có thông tin
                        @endif
                     </p>

                     <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                           <b>Số lượng đơn hàng đã mua</b> <a class="float-right">{{ isset($count) ? $count : '' }}</a>
                        </li>
                        <li class="list-group-item">
                           <b>Chi tiêu</b> <a class="float-right">{{ isset($totalSum) ? number_format($totalSum) : '' }} VND</a>
                        </li>
                     </ul>

                     <input type="file" id="img" name="img" class="mt-3" onchange="previewFile()" style="width: 216px;">

                  </div>

               </div>



            </div>

            <div class="col-md-9">
               <div class="card">
                  <div class="card-header p-2">
                     <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#info" data-toggle="tab">Thông tin</a></li>
                        <li class="nav-item"><a class="nav-link" href="#order" data-toggle="tab">Đơn hàng</a></li>

                     </ul>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                     <div class="tab-content">
                        <div class="active tab-pane" id="info">
                           <div class="wrapper">

                              <form action="{{ route('infocustomer') }}" method="post">
                                 @csrf
                                 <div id="wizard">
                                    <!-- SECTION 1 -->
                                    <h4></h4>
                                    <section>
                                       <div class="form-header">
                                          <div class="form-group">
                                             <input type="hidden" id="customer-data" data-customer-id="{{ isset($id) ? $id : '' }}" name="id" value="{{ isset($id) ? $id : '' }}">
                                             <input type="hidden" name="nameimg" value="{{ isset($infocustomer->avatar) ? $infocustomer->avatar : '' }}" id="imagename">
                                             <div class="form-holder ">
                                                <input name="lastname" type="text" placeholder="Họ" class="form-control" value="{{ isset($infocustomer->lastname) ? $infocustomer->lastname : '' }}">
                                                <span style="color: red;">{{ $errors->first('lastname') }}</span>
                                             </div>

                                             <div class="form-holder">
                                                <input name="firstname" type="text" placeholder="Tên" class="form-control" value="{{ isset($infocustomer->firstname) ? $infocustomer->firstname : '' }}">
                                                <span style="color: red;">{{ $errors->first('firstname') }}</span>
                                             </div>

                                             <div class="form-holder">
                                                <input name="phone" type="text" placeholder="Số điện thoại" class="form-control" value="{{ isset($infocustomer->numberphone) ? $infocustomer->numberphone : '' }}">
                                                <span style="color: red;">{{ $errors->first('phone') }}</span>
                                             </div>

                                             <div class="form-holder">
                                                <input name="email" type="text" placeholder="Email" class="form-control" value="{{ isset($infocustomer->email) ? $infocustomer->email : '' }}">
                                                <span style="color: red;">{{ $errors->first('email') }}</span>
                                             </div>

                                             <div class="form-holder ">
                                                <input name="adress" type="text" placeholder="Địa chỉ" class="form-control" value="{{ isset($infocustomer->adress) ? $infocustomer->adress : '' }}">
                                                <span style="color: red;">{{ $errors->first('adress') }}</span>
                                             </div>

                                             <div class="form-holder ">
                                                <input name="date" type="text" placeholder="Ngày sinh" class="form-control" value="{{ isset($infocustomer->birthday) ? $infocustomer->birthday : '' }}">
                                                <span style="color: red;">{{ $errors->first('date') }}</span>
                                             </div>

                                             <div class="form-holder ">
                                                <div class="form-check form-check-inline">
                                                   <input name="sex" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" {{ isset($infocustomer->sex) && $infocustomer->sex== 1 ? 'checked' : '' }} value="1">
                                                   <label class="form-check-label" for="inlineRadio1">Nam</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                   <input name="sex" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0" {{ isset($infocustomer->sex) && $infocustomer->sex== 0 ? 'checked' : '' }} value="0">
                                                   <label class="form-check-label" for="inlineRadio2">Nữ</label>
                                                </div>
                                                <span style="color: red;">{{ $errors->first('sex') }}</span>
                                             </div>

                                          </div>
                                       </div>

                                    </section>
                                    <button class="btn  btn-save" style="margin: 20px 0;background-color: #7fad39;color: #fff;font-weight: bold;" onclick="uploadImage()">Cập nhập thông tin</button>
                                 </div>
                              </form>
                           </div>
                        </div>



                        <div class="tab-pane" id="order">
                           <table id="dataTable" class=" table-striped" style="width: 100%;">
                              <thead>
                                 <tr>
                                    <th>STT</th>
                                    <th>Ngày mua</th>
                                    <th>SDT</th>
                                    <th>Tổng tiền</th>
                                    <th>Thành Phố</th>
                                    <th>Địa chỉ</th>
                                    <th>Chi tiết</th>
                                    <th>Ghi chú</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>

                              </tbody>

                           </table>

                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>



<!-- Modal -->
<div class="modal fade exampleModal" id="editModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Edit Member</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>

      </div>
   </div>
</div>
<script>
   $(document).ready(function() {
      $('#dataTable').DataTable({
         "processing": true,
         "serverSide": true,
         "lengthMenu": false,
         "pageLength": 2,
         "ajax": '{{ route("profile") }}',
         "columns": [{
               "data": 'id',
               name: 'id'
            },
            {
               "data": "created_at",
               name: 'created_at',
               "render": function(data, type, row) {

                  return moment(data).format('DD-MM-YYYY');
               }
            },
            {
               "data": 'phone',
               name: 'phone'
            },
            {
               "data": 'totalall',
               "name": 'totalall',
               "render": function(data, type, row) {

                  return new Intl.NumberFormat('vi-VN', {
                     style: 'currency',
                     currency: 'VND'
                  }).format(data);
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
               "data": 'notes',
               name: 'notes'
            },
            {
               "data": null,
               "render": function(data, type, row) {

                  var editLink = '<button id="btnMyTest001" type="button" class="btn btn-success" data-toggle="modal" data-target="#my_modal" data-id="' + row.id + '" style="border:none;outline:none;background:none"><a href="#"class="btn btn-info edit-btn" ><i class="fa-solid fa-circle-info"></i></a></button> ';

                  return '<div class="btn-group" role="group" >' + editLink + '</div>';
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
                  } else if (data === 2) {
                     return "<span style='color:orange;font-weight:bold'>Đang giao hàng </span> "
                  } 
                   else if (data === 3) {
                     return "<span style='color:red;font-weight:bold'>Đã hủy đơn </span> "
                  } else {
                     return "Trạng thái không xác định";
                  }
               }
            },
         ]
      });
   });

</script>

<script>
   function previewFile() {
      const preview = document.querySelector('#previewImage');
      const nameimage = document.querySelector('#imagename');
      const fileInput = document.querySelector('#img');
      const file = fileInput.files[0];
      const reader = new FileReader();

      reader.addEventListener('load', function() {
         preview.src = reader.result;
         nameimage.value = file.name;
      }, false);

      if (file) {
         reader.readAsDataURL(file);
      }
   }
</script>
<script>
   function uploadImage() {
      const ref = firebase.storage().ref();
      const file = document.querySelector('#img').files[0];

      if (!file) {
         console.error('Chưa chọn file ảnh.');
         return;
      }

      const metadata = {
         contentType: file.type
      };

      const name = file.name;
      const uploadIMG = ref.child(name).put(file, metadata);

      uploadIMG
         .then(snapshot => snapshot.ref.getDownloadURL())
         .then(url => {
            console.log(url);
            Toast.fire({
               icon: 'success',
               title: 'Upload Thành Công',
            });
         })
         .catch(error => {
            console.error('Lỗi khi upload ảnh:', error);
            Toast.fire({
               icon: 'error',
               title: 'Lỗi khi upload ảnh',
            });
         });
   }
</script>
<script>
   $(document).on("click", "#btnMyTest001", function(e) {

      var rowData = $('#dataTable').DataTable().row($(this).closest('tr')).data();


      if (rowData) {

         var id = rowData.id;
         var city = rowData.city;
         var adress = rowData.adress;
         var note = rowData.notes;

         $('#my_modal #id_modal').text("Mã hóa đơn: " + id);
         $('#my_modal #city_modal').text("Thành phố: " + city);
         $('#my_modal #adress_modal').text("Địa chỉ: " + adress);
         $('#my_modal #note_modal').text("Ghi chú: " + note);


      }
   });

   $(document).on("click", "#btnMyTest001", function(e) {
      var productId = $(this).data("id");
      loadProductData(productId);
      loadTotal(productId);
   });

   function loadProductData(productId) {
      $.ajax({
         url: '/loadOrderAll/' + productId,
         type: 'GET',
         dataType: 'json',
         success: function(data) {
            var productsArray = Object.values(data);
            console.log(productsArray);
            displayProducts(productsArray);
         },
         error: function(error) {
            console.log(error);

         }
      });
   }

   function numberFormat(number) {
      return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
   }

   function loadTotal(productId) {
      $.ajax({
         url: '/loadOrderTotal/' + productId,
         type: 'GET',
         dataType: 'json',
         success: function(data) {
            console.log(data);
            var productsArray = Object.values(data);



            var total = numberFormat("Tổng: " + productsArray[9] + " VND");
            var shippingfee = numberFormat("Phí ship: " + productsArray[13] + " VND");


            var totalall = numberFormat("Tổng hóa đơn: " + productsArray[14] + " VND");
            $('#total_modal').text(total);
            $('#shippingfee_modal').text(shippingfee);
            $('#totalall_modal').text(totalall);
         },
         error: function(error) {
            console.log(error);

         }
      });
   }

   function displaytotal(products) {

   }

   function displayProducts(products) {
      var product_list = $("#product_list");
      product_list.empty();


      var table = $("<table>").addClass("table");
      var thead = $("<thead>").appendTo(table);
      var headerRow = $("<tr>").appendTo(thead);
      $("<th>").text("Hình").appendTo(headerRow);
      $("<th>").text("Tên Sản Phẩm").appendTo(headerRow);
      $("<th>").text("Giá").appendTo(headerRow);
      $("<th>").text("Số lượng").appendTo(headerRow);
      $("<th>").text("Tổng 1 sản phẩm").appendTo(headerRow);


      var tbody = $("<tbody>").appendTo(table);
      products.forEach(function(product) {
         var row = $("<tr>").appendTo(tbody);
         $("<td>").append($("<img>").attr("src", 'https://firebasestorage.googleapis.com/v0/b/webstorbook.appspot.com/o/' + product.image + '?alt=media&token=d5dd8a65-9156-4db1-a5ef-99232869487b')).appendTo(row);
         $("<td>").text(product.productName).appendTo(row);
         $("<td>").text(numberFormat(product.price) + " VND").appendTo(row);
         $("<td>").text(" " + product.quantity).appendTo(row);
         $("<td>").text(" " + numberFormat(product.quantity * product.price) + " VND").appendTo(row);
      });


      $("#product_list").empty().append(table);

   }
</script>


<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="" style="margin-left: 0;">
            <section class="content">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-3">
                     </div>
                     <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                           <div class="col-lg-10 col-xl-8">
                              <div class="card" style="border-radius: 10px;">

                                 <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                       <p class="lead fw-normal mb-0" style="color: #000;">Hóa đơn</p>
                                       <p class="small text-muted mb-0" id="id_modal" class="form-control">Receipt Voucher :</p>
                                       </p>
                                    </div>
                                    <p class="lead fw-normal mb-0" style="color: #000;">Danh sách sản phẩm</p>
                                    <ul id="product_list" class="list-group">
                                    </ul>
                                    <div class="d-flex justify-content-between pt-2">
                                       <p class="fw-bold mb-0">Chi tiết đơn hàng</p>
                                       <p class="text-muted mb-0 total" id="total_modal"><span class="fw-bold me-4" id="total_modal_text">Total</span></p>

                                    </div>

                                    <div class="d-flex justify-content-between pt-2">
                                       <p class="text-muted mb-0" id="city_modal">Thành phố : </p>
                                       <p class="text-muted mb-0" id="shippingfee_modal"><span class="fw-bold me-4"></span> </p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                       <p class="text-muted mb-0" id="adress_modal">Địa chỉ : </p>

                                    </div>

                                    <div class="d-flex justify-content-between mb-5">
                                       <p class="text-muted mb-0" id="note_modal">Ghi chú : </p>

                                    </div>
                                 </div>
                                 <div class="card-footer border-0 " style="background-color: #000; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                                    <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0" id="totalall_modal">Total
                                       paid: <span class="h2 mb-0 ms-2">
                                       </span></h5>
                                    </>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
            </section>
         </div>
      </div>
   </div>
</div>
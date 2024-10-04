<div class="content-wrapper" style="margin-left: 0;">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">User Profile</li>
               </ol>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-3">

               <!-- Profile Image -->
               <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                     <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="https://firebasestorage.googleapis.com/v0/b/webstorbook.appspot.com/o/{{ isset($customerdetail->avatar) ? $customerdetail->avatar : '' }}?alt=media&token=d5dd8a65-9156-4db1-a5ef-99232869487b" alt="User profile picture">
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
                           <b>Số lượng đơn hàng đã mua</b> <a class="float-right">{{ isset($countorder) ? $countorder : '' }}</a>
                        </li>
                        <li class="list-group-item">
                           <b>Chi tiêu</b> <a class="float-right">{{ isset($totalSum) ? $totalSum : '' }} VND</a>
                        </li>
                     </ul>

                     <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
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
                              <form action="">
                                 <div id="wizard">
                                    <!-- SECTION 1 -->
                                    <h4></h4>
                                    <section>
                                       <div class="form-header">
                                          <div class="form-group">
                                         
                                             <input type="hidden" id="customer-data" data-customer-id="{{ isset($customerdetail->customerID) ? $customerdetail->customerID: '' }}" name="id" value="{{ isset($customerdetail->customerID) ? $customerdetail->customerID : '' }}">
                                             <div class="form-holder ">
                                                <input type="text" placeholder="Họ" class="form-control" value="{{ isset($customerdetail->lastname) ? $customerdetail->lastname : '' }}">
                                             </div>
                                             <div class="form-holder">
                                                <input type="text" placeholder="Tên" class="form-control" value="{{ isset($customerdetail->firstname) ? $customerdetail->firstname : '' }}">
                                             </div>
                                             <div class="form-holder">
                                                <input type="text" placeholder="Số điện thoại" class="form-control" value="{{ isset($customerdetail->numberphone) ? $customerdetail->numberphone : '' }}">
                                             </div>
                                             <div class="form-holder">
                                                <input type="text" placeholder="Email" class="form-control" value="{{ isset($customerdetail->email) ? $customerdetail->email : '' }}">
                                             </div>
                                             <div class="form-holder ">
                                                <input type="text" placeholder="Địa chỉ" class="form-control" value="{{ isset($customerdetail->adress) ? $customerdetail->adress : '' }}">
                                             </div>
                                             <div class="form-holder ">
                                                <input type="text" placeholder="Ngày sinh" class="form-control" value="{{ isset($customerdetail->birthday) ? $customerdetail->birthday : '' }}">
                                             </div>

                                             <div class="form-holder ">
                                                <div class="form-check form-check-inline">
                                                   <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" {{ isset($customerdetail->sex) && $customerdetail->sex== 1 ? 'checked' : '' }} value="1">
                                                   <label class="form-check-label" for="inlineRadio1">Nam</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                   <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="false" {{ isset($customerdetail->sex) && $customerdetail->sex== 0 ? 'checked' : '' }} value="0">
                                                   <label class="form-check-label" for="inlineRadio2">Nữ</label>
                                                </div>
                                             </div>
                                          </div>
                                       </div>

                                    </section>
                                  
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
<script>
   $(document).ready(function() {
      var customerId = $('#customer-data').data('customer-id');
      console.log(customerId);
      $('#dataTable').DataTable({
         "processing": true,
         "serverSide": true,
         "ajax": '{{ url("/editcustomer") }}/' + customerId,
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
               "data": null,
               "render": function(data, type, row) {

                  var editLink = '<button onclick="myForm(event)" style="border:none;outline:none;background:none"><a href="#" class="btn btn-info edit-btn" ><i class="fa-solid fa-circle-info"></i></a></button> ';

                  return '<div class="btn-group" role="group" >' + editLink + '</div>';
               }
            }
         ]
      });
   });
</script>
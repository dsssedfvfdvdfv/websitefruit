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
<div class="col-md-12">


   <div class="card card-primary mt3 table-pagenition">
      <div class="card-header">
         <h3 class="card-title">Chi tiết tài khoản</h3>
      </div>
     
      <form action="" >
         @csrf
         <label for="" class="col-form-label" style="margin-left: 16px;">ID:</label>
         <input type="text" id="id" name='id' style="margin-left: 16px; width: 30px;text-align: center;" value="{{ isset($userdetail->id) ? $userdetail->id : '' }}" disabled>
         <div class="modal-body">
            <label for="" class="col-form-label">Email:</label>
            <input type="text" id="email" name='email' class="form-control form-group-lg" value="{{ isset($userdetail->email) ? $userdetail->email : '' }}">
            <span style="color: red;">{{ $errors->first('email') }}</span>
         </div>
         <div class="modal-body">
            <label for="" class="col-form-label">Họ tên</label>
            <input type="text" id="name" name='name' class="form-control form-group-lg" value="{{ isset($userdetail->name) ? $userdetail->name : '' }}">
            <span style="color: red;">{{ $errors->first('name') }}</span>
         </div>
         <div class="modal-body">
            <label for="" class="col-form-label">Địa chỉ:</label>
            <input type="text" id="adress" name='adress' class="form-control form-group-lg" value="{{ isset($userdetail->address) ? $userdetail->address : '' }}">
            <span style="color: red;">{{ $errors->first('adress') }}</span>
         </div>
         <div class="modal-body">
            <label for="" class="col-form-label">Ngày sinh:</label>
            <input type="text" id="birthday" name='birthday' class="form-control form-group-lg" value="{{ isset($userdetail->birthday) ? date('Y-m-d', strtotime($userdetail->birthday)) : '' }}">
            <span style="color: red;">{{ $errors->first('birthday') }}</span>
         </div>
         <div class="modal-body">
            <label for="" class="col-form-label">Số điện thoại:</label>
            <input type="text" id="numberphone" name='numberphone' class="form-control form-group-lg" value="{{ isset($userdetail->numberphone) ? $userdetail->numberphone : '' }}">
            <span style="color: red;">{{ $errors->first('numberphone') }}</span>
         </div>
         <div class="modal-body">
            <label for="sex" class="col-form-label">Giới tính: </label>
            <input type="radio" id="sex" name="sex" class="m-3" {{ isset($userdetail->sex) && $userdetail->sex == 0 ? 'checked' : '' }} value="0">Nam
            <input type="radio" id="sex" name="sex" class="m-3" {{ isset($userdetail->sex) && $userdetail->sex == 1 ? 'checked' : '' }} value="1">Nữ
         </div>
         <div class="modal-body">
            <label for="" class="col-form-label">Vai trò:</label>
            <input type="text" id="role" name='role' class="form-control form-group-lg" value="{{ isset($userdetail->role) ? $userdetail->role : '' }}">
            <span style="color: red;">{{ $errors->first('role') }}</span>
         </div>
         <div class="modal-body">
            <label for="user_type" class="col-form-label">Kiểu tài khoản: </label>
            <input type="radio" id="user_type" name="user_type" class="m-3" {{ isset($userdetail->user_type) && $userdetail->user_type == 0 ? 'checked' : '' }} value="0">Admin
            <input type="radio" id="user_type" name="user_type" class="m-3" {{ isset($userdetail->user_type) && $userdetail->user_type == 1 ? 'checked' : '' }} value="1">User
         </div>
         <div class="modal-body">
            <label for="" class="col-form-label">Ngày tạo:</label>
            <input type="text" id="createdate" name='createdate' class="form-control form-group-lg" disabled value="{{ isset($userdetail->created_at) ? $userdetail->created_at->format('Y-m-d') : '' }}">
         </div>

         <button formaction="{{ isset($userdetail) ? url('/update/' . $userdetail->id) : '#' }}" class="btn btn-info m-3 btn-save">Cập nhập</button>
         <input type="file" id="img" name="img" class="mt-3" >
      </form>
   </div>
</div>
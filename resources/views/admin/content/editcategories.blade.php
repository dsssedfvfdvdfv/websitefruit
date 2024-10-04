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
         <h3 class="card-title">Chi tiết phân loại</h3>
      </div>
     
      <form method="POST" action="{{ route('formCategories') }}">
         @csrf
         <label for="" class="col-form-label" style="margin-left: 16px;">ID:</label>
         <input type="text" id="id" name='id' style="margin-left: 16px; width: 30px;text-align: center;" value="{{ isset($category->id) ? $category->id : '' }}" readonly>
        
         <div class="modal-body">
            <label for="" class="col-form-label">Tên loại</label>
            <input type="text" id="name" name='name' class="form-control form-group-lg" value="{{ isset($category->name) ? $category->name : '' }}">
            <span style="color: red;">{{ $errors->first('name') }}</span>
         </div>
         <div class="modal-body">
            <label for="" class="col-form-label">Miêu tả:</label>
            <input type="text" id="description" name='description' class="form-control form-group-lg" value="{{ isset($category->description) ? $category->description : '' }}">
            <span style="color: red;">{{ $errors->first('description') }}</span>
         </div>
               
         <div class="modal-body">
            <label for="" class="col-form-label">Từ khóa:</label>
            <input type="text" id="slug" name='slug' class="form-control form-group-lg" value="{{ isset($category->slug) ? $category->slug : '' }}">
            <span style="color: red;">{{ $errors->first('slug') }}</span>
         </div>
         <div class="modal-body">
            <label for="" class="col-form-label">Ngày tạo:</label>
            <input type="text" id="createdate" name='createdate' class="form-control form-group-lg" disabled value="{{ isset($category->created_at) ? $category->created_at->format('Y-m-d') : '' }}">
         </div>

         <button formaction="{{route('formCategories')}}" class="btn btn-info m-3 btn-save">Cập nhập</button>

         
      </form>
   </div>
</div>
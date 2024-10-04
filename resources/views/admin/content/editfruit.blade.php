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
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary mt3 table-pagenition">
            <form action="">
                @csrf
                <div class="modal-body">
                    <div class="">
                        <label for="" class="col-form-label">ID:</label>
                        <input type="text" id="id" name='id' style="margin-left: 10px; width: 30px;text-align: center;" value="{{ isset($product->id) ? $product->id : '' }}" readonly>
                        <div class="form-group">
                            <label for="name" class="col-form-label">Tên sản phẩm: </label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ isset($product->productname) ? $product->productname : '' }}">
                            <span style="color: red;">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="detail" class="col-form-label">Chi tiết:</label>
                            <textarea type="text" id="detail" name="detail" class="form-control" value="{{ isset($product->description) ? $product->description : '' }}">{{ isset($product->description) ? $product->description : '' }}</textarea>
                            <span style="color: red;">{{ $errors->first('detail') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-form-label">Giá: </label>
                            <input type="text" id="price" name="price" class="form-control" value="{{ isset($product->price) ? $product->price : '' }}">
                            <span style="color: red;">{{ $errors->first('price') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="col-form-label">Số lượng nhập vào(kg): </label>
                            <input type="text" id="quantity" name="quantity" class="form-control" value="{{ isset($product->stock_quantity) ? $product->stock_quantity : '' }}">
                            <span style="color: red;">{{ $errors->first('quantity') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="madefrom" class="col-form-label">Nhập khẩu từ:</label>
                            <select id="madefrom" name="madefrom" class="form-control">
                                <option value="" selected>Chọn một tùy chọn</option>
                                @foreach ($supplier as $company => $value)
                                <option value="{{ $value }}" {{ isset($product->SupplierID) && $value == $product->SupplierID ? 'selected' : '' }}>{{ $company }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hot" class="col-form-label">Nổi bật:</label>
                            <input type="radio" id="hot-yes" name="hot" class="m-3" {{ isset($product->hot) && $product->hot== 1 ? 'checked' : '' }} value="1"><label for="hot-yes">Bật</label>
                            <input type="radio" id="hot-no" name="hot" class="m-3" {{ isset($product->hot) && $product->hot == 0 ? 'checked' : '' }} value="0"><label for="hot-no">Tắt</label>
                        </div>
                        <div class="form-group">
                            <label for="opsition" class="col-form-label">Vị trí: </label>
                            <input type="text" id="opsition" name="opsition" class="form-control" value="{{ isset($product->orderposition) ? $product->orderposition : '' }}">
                            <span style="color: red;">{{ $errors->first('opsition') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="catelogy" class="col-form-label">Phân loại: </label>
                            <select id="category" name="category" class="form-control">
                                <option value="" selected>Chọn một tùy chọn</option>
                                @foreach ($category as $company => $value)
                                <option value="{{ $value }}" {{ isset($product->CategoryID) && $value == $product->CategoryID ? 'selected' : '' }}>{{ $company }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alias" class="col-form-label">Bí danh: </label>
                            <input type="text" id="alias" name="alias" class="form-control" value="{{ isset($product->alias) ? $product->alias : '' }}">
                            <span style="color: red;">{{ $errors->first('alias') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="view" class="col-form-label">View: </label>
                            <input type="text" id="view" name="view" class="form-control" value="{{ isset($product->view) ? $product->view : '' }}" disabled>
                            <span style="color: red;">{{ $errors->first('view') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="keyword" class="col-form-label">Keyword: </label>
                            <input type="text" id="keyword" name="keyword" class="form-control" value="{{ isset($product->keyword) ? $product->keyword : '' }}">
                            <span style="color: red;">{{ $errors->first('keyword') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description_keyword" class="col-form-label">Keyword Miêu tả: </label>
                            <input type="text" id="description_keyword" name="description_keyword" class="form-control" value="{{ isset($product->description_keyword) ? $product->description_keyword : '' }}">
                            <span style="color: red;">{{ $errors->first('description_keyword') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-form-label">Tên Hình: </label>
                            <input dis type="text" id="imagename" name="imagename" class="form-control" value="{{ isset($product->image) ? $product->image : '' }}">
                            <span style="color: red;">{{ $errors->first('imagename') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="slug" class="col-form-label">Slug: </label>
                            <input dis type="text" id="slug" name="slug" class="form-control" value="{{ isset($product->slug) ? $product->slug : '' }}">
                            <span style="color: red;">{{ $errors->first('slug') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sale" class="col-form-label">Sale: </label>
                            <input dis type="text" id="sale" name="sale" class="form-control" value="{{ isset($product->sale) ? $product->sale : '' }}">
                            <span style="color: red;">{{ $errors->first('sale') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-form-label">Trạng thái:</label>
                            <input type="radio" id="status" name="status" class="m-3" {{ isset($product->status) && $product->status== 1 ? 'checked' : '' }} value="1"><label for="status">Bật</label>
                            <input type="radio" id="status" name="status" class="m-3" {{ isset($product->status) && $product->status == 0 ? 'checked' : '' }} value="0"><label for="status">Tắt</label>
                        </div>
                    </div>
                </div>

                <button formaction="{{  url('/fruit/create')  }}" class="btn btn-info m-3 btn-save">Xử lý</button>
                <button class="btn btn-danger m-3 btn-delete">Xóa</button>
            </form>

        </div>
    </div>
    <div class="cart col-md-4">
        <div class="card">
            <div class="card-body">
                <img name="image" src="https://firebasestorage.googleapis.com/v0/b/webstorbook.appspot.com/o/{{isset($product->image) ? $product->image : ''}}?alt=media&token=d5dd8a65-9156-4db1-a5ef-99232869487b" alt="Ảnh sản phẩm" class="img-fluid img-thumbnail" id="previewImage">
                <div class="pt-3" style="display: flex;">
                    <input type="file" id="img" name="img" class="mt-3" onchange="previewFile()" style="width: 216px;">
                    <button onclick="uploadImage()" class="btn btn-info btn-upload">Upload</button>
                </div>

            </div>
        </div>

    </div>
</div>
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
   $(document).on('click', '.btn-delete', function(e) {
    e.preventDefault();
    var inputElement = document.getElementById("id");
    var productID = inputElement.value;

    if (!productID) {
        // Nếu productID trống, hiển thị thông báo và không tiến hành xóa
        Swal.fire({
            title: "Lỗi!",
            text: "Không có sản phẩm để xóa.",
            icon: "error",
        });
    } else {
        Swal.fire({
            title: "Xác nhận thực hiện hành động?",
            text: "Chọn một hành động để thực hiện cho người dùng này:",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Xóa sản phẩm",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Success!",
                    text: "Sản phẩm đã được xóa",
                    icon: "success",
                    timer: 1000,
                    showConfirmButton: false
                });

                setTimeout(function() {
                    window.location.href = '/deleteProduct/' + productID;
                }, 1000);
            }
        });
    }
});

</script>
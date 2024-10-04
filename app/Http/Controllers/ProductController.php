<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\clear;
use App\Models\Config;
use App\Models\Customer;
use App\Models\Product;
use App\Models\productController as ModelsProductController;
use App\Models\Review;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function editform(){
        $feature='Sản phẩm';
        $value=Cookie::get('cookieName');  
        $supplier=Supplier::getCompanyActive();
        $category=Category::getCategoryActive();
        return view('admin.user.formfruit',[
            'feature'=>$feature,
            'value'=>$value,
            'supplier'=>$supplier,
            'category'=>$category
        ]);
    }
    
   



 
    public function show(Request $request )    {
       
        $feature='Sản phẩm';
        $value=Cookie::get('cookieName');
        $product=Product::getAllProduct(); 
        
        if($request->ajax()){
            return datatables()->of($product)->toJson();
        }
        return view('admin.content.main_fruit',[
            'feature'=>$feature,
            'value'=>$value
        ]);
    }

 

    public function functionBoth(Request $request){
        $id=$request->input('id');
        $productname = $request->input('name');
        $description = $request->input('detail');
        $price = $request->input('price');
        $stock_quantity = $request->input('quantity');
        $SupplierID = $request->input('madefrom');
        $hot = $request->input('hot');
        $orderposition = $request->input('opsition');
        $CategoryID = $request->input('category');
        $alias = $request->input('alias');
        $keyword = $request->input('keyword');
        $description_keyword = $request->input('description_keyword');
        $status = $request->input('status');
        $view = 0;
        $image = $request->input('imagename');
        $slug=$request->input('slug');
        $sale=$request->input('sale');
        $feature = 'Sản phẩm';
        $value = Cookie::get('cookieName');
        
        $validator=Validator::make($request->all(),[
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'madefrom' => 'required',
            'opsition' => 'required',
            'imagename'=>'required',
            'alias' => 'required',
            'keyword' => 'required',
            'description_keyword' => 'required',
            'slug'=>'required'
        ],[
           'name.required'=>"Bạn chưa nhập name",
           'detail.required'=>"Bạn chưa nhập chi tiết",
           'price.required'=> "Bạn chưa nhập giá",
           'quantity.required'=>'Bạn chưa nhập số lượng',
           'madefrom.equired'=>'Bạn chưa chọn nơi nhập hàng',
           'opsition.required'=>'Bạn chưa chọn vị trí hiển thị',
           'imagename.required'=>'Bạn chưa lựa chọn ảnh',
           'alias.required'=>'Bạn chưa để bí danh',
           'keyword.required'=>'Bạn chưa nhập từ khóa',
           'description_keyword.required'=>"Bạn chưa nhập miêu tả từ khóa",
           'slug.required'=>"Bạn chưa nhập tên đệm",
        ]);
       
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = [
            'productname' => $productname,
            'description' => $description,
            'image' => $image,
            'price' => $price,
            'stock_quantity' => $stock_quantity,
            'SupplierID' => $SupplierID,
            'hot' => $hot,
            'status' => $status,
            'view' => $view,
            'orderposition' => $orderposition,
            'CategoryID' => $CategoryID,
            'alias' => $alias,
            'keyword' => $keyword,
            'description_keyword' => $description_keyword,
            'slug' => $slug,
            'sale' => $sale
        ];
        try {
            $productnew = Product::functionBoth($data,['id'=>$id]);
       
            return redirect()->route('loadfruit')->with([
                'feature' => $feature,
                'value' => $value
            ]);
        } catch (\Exception $e) {
            echo $e;
            return $e;
        }
    }
    public function deleteProduct($id){
        $remove=Product::deleteProduct($id);
        return redirect()->back();
    }
    public function editProduct($id)
    {
        $value = Cookie::get('cookieName');
        $product =Product::editProduct($id);
        $feature = 'Chi tiết';
        $supplier=Supplier::getCompanyActive();
        $category=Category::getCategoryActive();
        return view('admin.user.formfruit', [
            'value'=>$value,
            'product'=>$product,
            'feature'=>$feature,
            'supplier'=>$supplier,
            'category'=>$category
        ]);
    }

    public function editDetail($id){
        $productedit=Product::getData('get','*',[['id',$id]],'','')->first();
        $slug=$productedit->slug;
        $categories = Category::listCategory();
        $phone = Config::getNumberPhone();
        $value = Cookie::get('cookieName');
        $productrelase=Product::getData('get','*',[['status',true],['slug',$slug], ['products.sale','>',1]],'','');  
        $data=Review::loadComment($id);       
        $count=Review::loadCommentCount($id);
       
        return view('page.content.detailproduct',[
            'categories' => $categories,
            'phone' => $phone,
            'value' => $value,
            'productdetail'=>$productedit,
            'productrelase'=>$productrelase,
            'data'=>$data,
            'count'=>$count
        ]);
    }
  
}

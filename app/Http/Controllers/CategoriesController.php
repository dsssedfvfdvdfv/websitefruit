<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function loadCategories(Request $request){    
        $category = Category::getData('get', '*', '', '', '');    
        if ($request->ajax()) {
            return datatables()->of($category)->toJson();
        }
    }

    public function formCategories(Request $request){
        $value = Cookie::get('cookieName');     
        $feature='Phân loại';
         return view('admin.user.editformcategories', [
             'value' => $value,
             'feature'=>$feature
         ]);
    }
    
    public function edit($id){
        $edit=Category::getData('first','*',[['id',$id]],'','');
      
        $value = Cookie::get('cookieName');     
        $feature='Phân loại';
         return view('admin.user.editformcategories', [
             'value' => $value,
             'feature'=>$feature,
             'category'=>$edit

         ]);
    }

    public function functionBoth(Request $request){
        $slug=$request->input('slug');
        $id=$request->input('id');
        $name=$request->input('name');
        $description=$request->input('description');
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required', 
            'slug' => 'required',
        ], [
            'name.required' => "Bạn chưa nhập tên phân loại",
            'description.required' => "Bạn chưa nhập miêu tả",
            'slug.required' => "Bạn chưa nhập từ khóa",
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $data = [        
            'slug' => $slug,  
            'description'=>$description,
            'name'=>$name         
        ];
        try {
           
            $category = Category::functionBoth($data,['id'=>$id]);
            
        $value = Cookie::get('cookieName');     
        $feature='Phân loại';
        return redirect()->route('categories')->with([
            'feature' => $feature,
            'value' => $value
        ]);
        } catch (\Exception $e) {
            echo $e;
            return $e;
        }
    }


    public function activeCategories(Request $request,$id){
        
        $data=['status'=>1];
        $category = Category::functionBoth($data,['id'=>$id]);
        return redirect()->back();
    }
    public function deactiveCategories(Request $request,$id){
        
        $data=['status'=>0];
        $category = Category::functionBoth($data,['id'=>$id]);
        return redirect()->back();
    }

    public function deleteCategories($id){
        $remove=Category::deleteCategory($id);
        return redirect()->back();
    }
}

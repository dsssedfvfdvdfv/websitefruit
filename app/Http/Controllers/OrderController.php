<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Config;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
{
    public function loadOrder($id){
        $load=Order::getData('first','*',[['id',$id]],'','');           
        $item=OrderDetail::getData('get','*',[['orderID',$load->id]],['products','orderdetail.ProductID','=','products.id'],'');     
        return response()->json($item);
    }

    public function loadTotal($id){
        $load=Order::getData('first','*',[['id',$id]],'','');   
        return response()->json($load);
    }
    

    public function loadlist(Request $request){
        $value = Cookie::get('cookieName'); 
        $feature='Hóa đơn';
        $data = Order::getData('get', '*', '', '', '');       
        if($request->ajax()){
            return datatables()->of($data)->toJson();
        }
        return view('admin.user.pageorder',[
            'value' => $value,
            'feature'=>$feature
        ]);
    }

    public function updateSuccessOrder($id){
        $status=1;
        Order::where('id', $id)->update(['orderstatus' => $status]);
        return redirect()->back();
    }
    public function updateDeliveryOrder($id){
        $status=2;
        Order::where('id', $id)->update(['orderstatus' => $status]);
        return redirect()->back();
    }
    public function updateCancelOrder($id){
        $status=3;
        Order::where('id', $id)->update(['orderstatus' => $status]);
        return redirect()->back();
    }
    public function updatePaymentstatus($id){
        $status=1;
        Order::where('id', $id)->update(['paymentstatus' => $status]);
        return redirect()->back();
    }

    public function detailinvoice($id){
        $detail=Order::getData('first','*',[['id',$id]],'','');
        $item=OrderDetail::getData('get','*',[['orderID',$detail->id]],['products','orderdetail.ProductID','=','products.id'],2);
     
        $value = Cookie::get('cookieName'); 
        return view('admin.user.pageinvoice',[
            'detail'=>$detail,
            'value' => $value,
            'item'=>$item
        ]);
    }

  
}

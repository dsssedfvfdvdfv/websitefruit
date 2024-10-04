<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function order(Request $request)
    {
        $lastname = $request->input('lastname');
        $firstname = $request->input('firstname');
        $city = $request->input('city');
        $adress = $request->input('adress');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $note = $request->input('note');
        $subtotal = Cart::subtotal();
        $shipfee = $request->input('shipfee');
        $padi = 0;
        $orderstatus = 0;
        $total = $request->input('total');
        $account = request()->cookie('cookieName');
        $info=Customer::where('username',$account)->first();
        if($info==null){
            $codeid=null;
        }else{
            $codeid=$info->id;
        }
      
        $cart = Cart::content();
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'adress' => 'required|min:9',
            'phone' => 'required|digits:10',
            'email' => 'required|email'
        ], [
            'firstname.required' => 'Bạn chưa nhập tên',
            'adress.required' => 'Bạn chưa nhập địa chỉ',
            'adress.max' => 'Cần địa chỉ cụ thể hơn',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.digits' => 'Số điện thoại sai định dạng',
            'email.required' => 'Bạn chưa nhập địa chỉ email', 
            'email.email' => 'Địa chỉ email không hợp lệ', 
        ]);
        $data = [
            'lastname' => $lastname,
            'first_name' => $firstname,
            'codeid'=>$codeid,
            'city' => $city,
            'adress' => $adress,
            'phone' => $phone,
            'email' => $email,
            'notes' => $note,
            'total' => $subtotal,
            'paymentstatus' => $padi,
            'orderstatus' => $orderstatus,
            'shippingfee' => $shipfee,
            'totalall' => $total,
        ];
                       

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {                   
            $bill = Order::functionBoth([], $data); 
            Session::put('id',$bill->id);
            return redirect('orderdetail');
        } catch (\Exception $e) {
           dd($e);
        }
    }
    public function createOrder()
    {
        return redirect('checkout/');
    }
    public function addProductDetail(Request $request){
        $paymentMethod = $request->input('payment');
        Session::flash('payment',$paymentMethod);
        Session::flash('method',0);
        $cart = Cart::content();
        $orderid=$request->session()->get('id');
        $condition = ['id' => $orderid];
            foreach ($cart as $item) {
                $productId = $item->id;
                $productname = $item->name;
                $quantity = $item->qty;
                $price = $item->price;
                $productData[] = [
                    'ProductID' => $productId,
                    'productName' => $productname,
                    'quantity' => $quantity,
                    'price' => $price,
                    'orderID' => $orderid,
                    
                ];
            }
         
            try {
                foreach ($productData as $dataa) {
                    $orderdetail = OrderDetail::functionBoth([$orderid], $dataa);               
                }
             
                $result = Order::functionBoth(['paymentmethod' => $paymentMethod], $condition);            
                return redirect('thankpage');
            } catch (Exception $e) {
               return $e;
            }
       
       
    }
}
  
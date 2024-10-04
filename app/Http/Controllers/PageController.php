<?php

namespace App\Http\Controllers;

use App\Charts\ExpensesChart;
use App\Models\Category;
use App\Models\Config;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Providers\GHNServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\testEmail;
use App\Models\infomationCustomer;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function login()
    {     
        return view('page.content.loginform');
    }
    public function register()
    {
        $cartItems = Cart::content();

        foreach ($cartItems as $item) {
            $rowId = $item->rowId;
            $id = $item->id;
            $name = $item->name;
            $qty = $item->qty;
            $price = $item->price;
        }
        return view('page.content.registerform');
    }
    public function index()
    {
        $categories = Category::listCategory();
        $phone = Config::getNumberPhone();
        $value = Cookie::get('cookieName');
        $product = Product::getData('get','*',[['hot',true],['status',true]],'','');
        $total = Cart::total(2, '.', ',');
        return view('page.content.index', [
            'categories' => $categories,
            'value' => $value,
            'phone' => $phone,
            'products' => $product,
            'total'=>$total
        ]);
    }
    public function store(Request $request)
    {
        $count = Product::getData("count", "*", [['status', true]], "");
        $categories = Category::listCategory();
        $phone = Config::getNumberPhone();
        $value = Cookie::get('cookieName');    
      
        $productsale = Product::getData('get', ['products.*', 'categories.name'],  [['products.sale','>',1]], ['categories', 'products.CategoryID', '=', 'categories.id'], "");
        $products = Product::getData('get', '*', [['status', true]],"",9);    
        $producthot = Product::getData('get', '*', [['status', true],['hot',true]],"",9);       
        return view('page.content.store', [
            'count' => $count,
            'categories' => $categories,
            'value' => $value,
            'phone' => $phone,
            'productsale' => $productsale,
            'products' => $products,
            'producthot'=>$producthot
        ]);
    }

    public function productSlug($slug)
    {
        $count = Product::getData('count','*',[['status',true],['slug',$slug]],'','');
        $categories = Category::listCategory();
        $products = Product::getData('get','*',[['status',true],['slug',$slug]],'',9);
        $phone = Config::getNumberPhone();      
        $value = Cookie::get('cookieName');
        $producthot = Product::getData('get', '*', [['status', true],['hot',true]],"",9);     
        $productsale = Product::getData('get', ['products.*', 'categories.name'], [['products.sale','>',1]], ['categories', 'products.CategoryID', '=', 'categories.id'], "");
        return view('page.content.store', [
            'categories' => $categories,
            'value' => $value,
            'phone' => $phone,
            'productsale' => $productsale,
            'products' => $products,
            'producthot'=>$producthot,
            'count' => $count,
        ]);
    }

    public function shoppingcart(){
        $categories = Category::listCategory();
        $phone = Config::getNumberPhone();
        $value = Cookie::get('cookieName');
        return view('page.content.shoppingcart',[
            'categories' => $categories,
            'phone' => $phone,
            'value' => $value,
        ]);
    }
    
    public function checkout(Request $request){      
        $categories = Category::listCategory();
        $phone = Config::getNumberPhone();
        $value = Cookie::get('cookieName'); 
        $token = '0da3fb68-638c-11ee-b394-8ac29577e80e';    
        $provinceId =$request->input('cityid');
        
        $cities = Http::withHeaders([
            'Token' => $token,
        ])->get('https://online-gateway.ghn.vn/shiip/public-api/master-data/province')->json();

        $districts = Http::withHeaders([
            'Token' => $token,
        ])->get('https://online-gateway.ghn.vn/shiip/public-api/master-data/district', [
            'province_id' => $provinceId,
        ])->json();
        return view('page.content.checkout',[
            'categories' => $categories,
            'phone' => $phone,
            'value' => $value,
            'cities'=>$cities, 
            'districts'=>$districts          
        ]);
       }
      
       public function getDistricts($provinceId){
        $token = '0da3fb68-638c-11ee-b394-8ac29577e80e';  
        $districts = Http::withHeaders([
            'Token' => $token,
        ])->get('https://online-gateway.ghn.vn/shiip/public-api/master-data/district', [
            'province_id' => $provinceId,
        ])->json();  
        return $districts;
       }
       public function orderdetail(Request $request){
        $categories = Category::listCategory();
        $phone = Config::getNumberPhone();
        $value = Cookie::get('cookieName');      
        return view('page.content.orderdetail',[
            'categories' => $categories,
            'phone' => $phone,
            'value' => $value,
        ]);
       }

       public function detailProductForm(){
        $categories = Category::listCategory();
        $phone = Config::getNumberPhone();
        $value = Cookie::get('cookieName');  
        return view('page.content.detailproduct',[
            'categories' => $categories,
            'phone' => $phone,
            'value' => $value,
        ]);
       }

       public function thankpage(Request $request){
        $id = $request->session()->get('id');;
        $orderid=Order::getData('get','*',[['id',$id]],'','')->first();
        $email=$orderid->email;     
        $cart = Cart::content();
        $id = $request->session()->get('id');;
        $condition = ['id' => $id];
        $paymenmethod=Session::get('payment');
        $method=Session::get('method');

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
                'orderID' => $id
            ];
        }

        foreach ($productData as $dataa) {
            $orderdetail = OrderDetail::functionBoth([$id], $dataa);
        }
        if($paymenmethod){
            $result = Order::functionBoth(['paymentmethod' => $paymenmethod, 'paymentstatus' => $method], $condition);
        }else{
            $result = Order::functionBoth(['paymentmethod' => 'Thanh toán online', 'paymentstatus' =>1], $condition);
        }
      
        $categories = Category::listCategory();
        $phone = Config::getNumberPhone();
        $value = Cookie::get('cookieName');  
        $subject='Test subject';
        $body='Test Message';   
        $id = $request->session()->get('id');
        $info=Order::getData('get','*',[['id',$id]],'','')->first();
        $order=Order::getData('get','*',[['orders.id',$id]],['orderdetail','orders.id','=','orderdetail.orderID'],'');

        Mail::to($email)->send(new testEmail($subject,$body,$info,$order));
      
        return view('page.content.thankpage',[
            'categories' => $categories,
            'phone' => $phone,
            'value' => $value,
        ]);
       }
       

       public function profile(Request $request ){
        $categories = Category::listCategory();      
        $phone = Config::getNumberPhone();
        $value = Cookie::get('cookieName'); 
        $email=Customer::getData('first','*',[['username',$value]],'','');
        $data=infomationCustomer::getData('first','*',[['customerID',$email->id]],'','');    
        $ordercustomer = Customer::getData('get', '*', [['customers.id', $email->id]], ['orders', 'customers.id', '=', 'orders.codeid'], '');
        $countorder = count($ordercustomer);
        $totalSum = $ordercustomer->sum('totalall');

        if($request->ajax()){
            return datatables()->of($ordercustomer)->toJson();
        }
        
        return view('page.content.profile',[
            'categories' => $categories,
            'value' => $value,
            'phone' => $phone,
            'infocustomer'=>$data,
            'count'=>$countorder,
            'totalSum' => $totalSum,
            'id'=>$email->id,
             
        ]);
       }
     
       public function invoice(){      
        $value = Cookie::get('cookieName'); 
        return view('admin.user.pageinvoice',[           
            'value' => $value,          
        ]);
       }
       public function statistics(ExpensesChart $chart,Request $request)
       {      
           $value = Cookie::get('cookieName'); 
           $year = $request->input('selectedYear', 2023);    
           $loadyear = Order::select(DB::raw('YEAR(created_at) as year  '))
           ->groupBy(DB::raw('YEAR(created_at)'))
           ->get();
          
           $chart = $chart->build($year);
       
           return view('admin.user.statistics', [           
               'value' => $value,     
               'chart' => $chart ,
               'loadyear'=>$loadyear   
           ]);
       }


       public function loadCategories(Request $request){
        $value = Cookie::get('cookieName'); 
        $feature = 'Phân loại';
        return view('admin.user.pagecategories',[
            'value'=>$value,
            'feature'=>$feature
        ]);
       }
    
}

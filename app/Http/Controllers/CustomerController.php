<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\infomationCustomer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\FuncCall;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $feature = 'Tài khoản';
        $customer = Customer::getData('get', '*', '', '', '');
        $value = Cookie::get('cookieName');
        if ($request->ajax()) {
            return datatables()->of($customer)->toJson();
        }

        return view('admin.content.maincustomer', [
            'feature' => $feature,
            'value' => $value
        ]);
    }

    public function createCustomer(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $confirm = $request->input('confirm');
        $status = '1';
        $level = '1';
        $user_type = 1;

        $validator = Validator::make($request->all(), [
            'username' => 'required|email',
            'password' => 'required',
            'confirm' => 'required',
        ], [

            'username.required' => 'Bạn chưa nhập email',
            'username.email' => 'Email không hợp lệ',
            'password.required' => 'Bạn chưa nhập password',
            'confirm.required' => 'Bạn chưa nhập xác nhận',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            if ($password == $confirm) {
                $existingUser = Customer::where('username', $username)->first();
                if ($existingUser) {
                    $error = 'Địa chỉ email đã tồn tại.';
                    return redirect()->back()->with('errorr', $error);
                } else {
                    $user = Customer::createCustomer($username, Hash::make($password), $status, $level, $user_type);
                    return redirect()->route('login')->with('success', 'Đăng ký thành công!');
                }
            } else {
                $error = 'Mật khẩu xác nhận không khớp.';
                return redirect()->back()->with('errorrs', $error);
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return redirect()->back()->with('error', $errorMessage);
        }
    }

    public function updateinfo()
    {
    }



    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:filter',
            'password' => 'required'
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Bạn chưa nhập password'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if (Auth::guard('customers')->attempt([
            'username' => $request->input('email'),
            'password' => $request->input('password')
        ])) {
            $email = $request->input('email');
            $currentTime = Carbon::now('Asia/Ho_Chi_Minh');
            Cookie::queue(Cookie::make('cookieName', $email, 120));
            Cookie::queue(Cookie::make('lastLoginTime', $currentTime, 120));
            return redirect()->route('index');
            $customer = Auth::guard('customers')->user();
            if ($customer->status == 1) {
                if ($customer->user_type == 1) {
                    $email = $request->input('email');
                               
                    return redirect()->route('index');
                } else {
                    return redirect()->back()->with('error', 'Tài khoản không có quyền truy cập.');
                }
            } else {
                return redirect()->back()->with('error', 'Tài khoản đã bị vô hiệu hóa.');
            }
        } else {
            return redirect()->back()->with('error', 'Sai mật khẩu hoặc tài khoản không tồn tại');
        }
    }


    public function logout()
    {
        Auth::guard('customers')->logout();
        cookie()->queue(cookie()->forget('cookieName'));
        return redirect()->route('index');
    }


    public function activated($customerID)
    {
        $newStatus = 1;
        $customer = Customer::updateStatus($customerID, $newStatus);
        return redirect()->back();
    }


    public function deactivate($customerID)
    {
        $newStatus = 0;
        $customer = Customer::updateStatus($customerID, $newStatus);
        return redirect()->back();
    }


    public function delete($customerID)
    {

        $customer = Customer::deleteStatus($customerID);
        return redirect()->back();
    }


    public function editAccount($id,Request $request)
    {
        $value = Cookie::get('cookieName');
        $customerdetail = Customer::getData('get', '*', [['customers.id', $id]], ['infomationcustomer', 'customers.id', '=', 'infomationcustomer.customerID'], '')->first();    
        $ordercustomer = Customer::getData('get', '*', [['customers.id', $id]], ['orders', 'customers.id', '=', 'orders.codeid'], '');
        if($request->ajax()){
            return datatables()->of($ordercustomer)->toJson();
        }
        $countorder = count($ordercustomer);
        $totalSum = $ordercustomer->sum('totalall');
        $feature = 'Chi tiết';
        return view('admin.user.editformcustom', [
            'value' => $value,
            '$feature' => $feature,
            'customerdetail' => $customerdetail,
            'countorder' => $countorder,
            'totalSum' => $totalSum
        ]);
    }


    public function getOrderByCustomer()
    {
        $ordercustomer = Customer::getData('get', '*', [['customers.id', 10]], ['orders', 'customers.id', '=', 'orders.codeid'], '');
        $value = Cookie::get('cookieName');
        return view('admin.user.editformcustom', [
            'value' => $value,
        ]);
    }


    public function formEdit()
    {
        $value = Cookie::get('cookieName');
        $feature = 'Chi tiết';
        return view('admin.user.editformcustom', compact('feature', 'value'));
    }

    public function functionBoth(Request $request)
    {
        $id = $request->input('id');
        $lastname = $request->input('lastname');
        $firstname = $request->input('firstname');
        $imgname = $request->input('nameimg');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $adress = $request->input('adress');
        $date = $request->input('date');
        $sex = $request->input('sex');
        $validator = Validator::make($request->all(), [
            'lastname' => 'required',
            'firstname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',

            'adress' => 'required|min:9',
            'date' => 'required|date_format:Y-m-d',
            'sex' => 'required'
        ], [
            'lastname.required' => "Bạn chưa nhập họ",
            'firstname.required' => "Bạn chưa nhập tên",
            'phone.required' => "Bạn chưa nhập số điện thoại",
            'email.required' => "Bạn chưa nhập email",
            'email.email' => "Sai định dạng email",
            'adress.required' => "Bạn chưa nhập địa chỉ",
            'date.required' => "Bạn chưa nhập ngày",
            'date.date_format' => 'Nhập đúng định dạng ngày (VD: 2003-12-24)',
            'sex.required' => "Bạn chưa lựa chọn giới tính"
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = [
            'lastname' => $lastname,
            'firstname' => $firstname,
            'numberphone' => $phone,
            'email' => $email,
            'adress' => $adress,
            'birthday' => $date,
            'customerID' => $id,
            'sex' => $sex,
            'avatar' => $imgname
        ];
        try {

            $info = infomationCustomer::functionBoth($data, ['customerID' => $id]);

            return redirect()->back();
        } catch (\Exception $e) {
            echo $e;
            return $e;
        }
    }
}

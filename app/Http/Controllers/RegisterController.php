<?php

namespace App\Http\Controllers;

use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
   public function index(){
    dd(Cart::content());
    return view("admin.user.register",['title'=>'Đăng ký']);
   }

   public function store(Request $request) {
    $name = $request->input('name');
    $email = $request->input('email');
    $password = $request->input('password');
    $confirm = $request->input('confirm');
    $status = '1';
    $role = 'ADMIN';
    $user_type = 0;

    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'confirm' => 'required',
    ], [
        'name.required' => 'Bạn chưa nhập name',
        'email.required' => 'Bạn chưa nhập email',
        'email.email' => 'Email không hợp lệ',
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
            $existingUser = User::where('email', $email)->first();
            if ($existingUser) {            
                $error = 'Địa chỉ email đã tồn tại.';
                return redirect()->back()->with('error', $error);
            } else {
                $user = User::createUser($name, $email, $password, $status, $role, $user_type);
                return redirect()->route('main')->with('success', 'Đăng ký thành công!');
            }
        } else {
            $error = 'Mật khẩu xác nhận không khớp.';
            return redirect()->back()->with('error', $error);
        }
    } catch (\Exception $e) {
        $errorMessage = $e->getMessage();
        return redirect()->back()->with('error', $errorMessage);
    }
}

}

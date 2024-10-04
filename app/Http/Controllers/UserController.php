<?php

namespace App\Http\Controllers;

use App\Models\Online;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
   
    public function index(Request $request)
    {

        $title = "Đăng Nhập";
        return view("admin.user.login", compact('title'));
    }

    public function store(Request $request)
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

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {
            $user = Auth::user();
            if ($user->status == 1) {
                if ($user->user_type == 0) {
                    $email = $request->input('email');
                    $cookie = Cookie::queue(Cookie::make('cookieName', $email, 120));
                    
                    return redirect()->route('main');
                } 
            } else {
                return redirect()->back()->with('error', 'Tài khoản đã bị cấm.');
            }
        } else {
            return redirect()->back()->with('error', 'Sai mật khẩu hoặc tài khoản không tồn tại');
        }
    }

    public function logout()
    {
        Auth::logout();
        cookie()->queue(cookie()->forget('cookieName'));
        return redirect()->route('loginform');
    }
    public function editAccount($id)
    {
        $value = Cookie::get('cookieName');
        $userdetail = User::edit($id);
        $feature = 'Chi tiết';
        return view('admin.user.editform', compact('userdetail', 'feature', 'value'));
    }
    public function updateAccount($id,Request $request){
        $name=$request->input('name');
        $address=$request->input('adress');
        $avatar=$request->input('avatar');
        $numberphone=$request->input('numberphone');
        $birthday=$request->input('birthday');
        $sex=$request->input('sex');
        $user_type=$request->input('user_type');
        $role=$request->input('role');
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email' => 'required|email:filter',
            'numberphone'=>'required',
            'adress'=>'required',
            'birthday'=>'required|date_format:Y-m-d',
            'sex'=>'required',
            'user_type'=>'required',
            'role'=>'required'
        ],[
            'name.required'=>'Bạn chưa nhập name',
            'email.required' => 'Bạn chưa nhập email',
            'numberphone.required'=>'Bạn chưa nhập số điện thoại',
            'adress.required' => 'Bạn chưa nhập địa chỉ',
            'birthday.required'=>'Bạn chưa nhập ngày sinh',
            'birthday.date_format' => 'Ngày sinh phải ở định dạng yyyy-mm-dd. VD:2000-12-24',
            'sex.required' => 'Bạn chưa chọn giới tính',
            'user_type.required'=>'Bạn chưa chọn kiểu tài khoản',
            'role.required' => 'Bạn chưa nhập vai trò',
        ]   
    );
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }
    try {
        $user=User::updateAccount($id,$name,$address,$avatar,$numberphone,$birthday,$sex,$user_type,$role);
        return redirect()->route('main');
    } catch (\Exception $e) {      
        return $e;
    }
    }
    public function deleteAccount($id)
    {
        $userRemove = User::deleteAccout($id);
        return redirect()->back();
    }

    public function index1()
    {
        if (request()->ajax()) {
            return datatables()->of(User::getAllUser())
                ->addColumn('action', 'user-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('index');
    }
  

    public function countUser(Request $request)
    {
        if (isset($_SERVER['HTTP_COOKIE'])) {
            if (!Session::get('user_visitor')) {
                Session::put('user_visitor', $_SERVER['HTTP_COOKIE']);
                $sessionid = Session::get('user_visitor');
                $lasttime = now('Asia/Ho_Chi_Minh');
                $ip = $request->ip();
                $user = Online::getCountUser($sessionid, $lasttime, $ip);
                return $user;
            } else {
            }
        }
    }
    public function updateLastTime(Request $request)
    {
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $visitor = Session::get('user_visitor');
            print_r($visitor); 
            if(Session::get('user_visitor'))  {
                $user=Online::updatetime($visitor);
                return $user;
            }       
        }
    }


    //Register Account Admin
    public function register(){
        $value = Cookie::get('cookieName');
        $feature='Tài khoản Admin';
        return view('admin.user.formregister',[
            'value'=>$value,
            'feature'=>$feature
        ]);
    }
}

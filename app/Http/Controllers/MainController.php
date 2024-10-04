<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\View;
use Shetabit\Visitor\Facade\Visitor;

class MainController extends Controller
{

    public function editform(){
        $feature='Tài khoản';
        $value=Cookie::get('cookieName');       
        return view('admin.user.editform',compact('feature','value'));
    }
    public function index(Request $request)
    {    
        $users = User::getAllUser();
        $feature = 'Tài khoản';
        $value = Cookie::get('cookieName');
        if($request->ajax()){
            return datatables()->of($users)
        ->addColumn('action', 'admin.content.user-action')
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
        }    
      
        return view("admin.content.main", compact( 'feature', 'value'));
    }
  
    public function activated($userId)
    {
        $newStatus = 1; // Thay đổi trạng thái theo nhu cầu của bạn
        $user = User::find($userId);

        if (!$user) {
            return redirect()->back()->with('error', 'Người dùng không tồn tại');
        }

        $user->status = $newStatus;

        if ($user->save()) {
            return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
        } else {
            return redirect()->back()->with('error', 'Không thể cập nhật trạng thái');
        }
    }
    public function deactivate($userId)
    {
        $newStatus = 0; // Thay đổi trạng thái theo nhu cầu của bạn
        $user = User::find($userId);

        if (!$user) {
            return redirect()->back()->with('error', 'Người dùng không tồn tại');
        }

        $user->status = $newStatus;

        if ($user->save()) {
            return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
        } else {
            return redirect()->back()->with('error', 'Không thể cập nhật trạng thái');
        }
    }

    public function updateUser(Request $request, $id)
    {
        $email = $request->input('email');
        $name = $request->input('name');
        $confirm = $request->input('confirm');

        $user = User::updateUser($id, $email, $name, $confirm);

        if ($user) {
            return redirect()->route('main');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy người dùng.');
        }
    }
}

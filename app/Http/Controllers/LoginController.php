<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Hash;
use App\User;

class LoginController extends Controller
{
    public function getLogin(){
        return view('page.login');
    }
    
    public function postLogin(){

    }

    public function getSignup(){
        return view('page.signup');
    }
    
    public function postSignup(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:user,email',
                'password'=>'required|min:6|max|25',
                'name'=>'required|max:30',
                'reset_password'=>'required|same:password',
                'phone' => 'required|regex:/(01)[0-9]{10}/'
            ],
            [
                'email.required'=>'Hãy nhập lại email',
                'email.email'=>'Email chưa đúng định dạng',
                'email.unique'=>'email đã tồn tại',
                'password.required'=>'Hãy nhập lại password',
                'password.max'=>'Mật khẩu ngắn hơn 25 kí tự',
                'password.min'=>'Mật khẩu dài hơn 6 kí tự',
                'name.required'=>'Hãy nhập lại tên',
                'phone.required'=>'Hãy nhập lại số điện thoại',
                'phone.regex'=>'Số điện thoại có 10 số',
                'name.max'=>'Tên ngắn hơn 30 kí tự',
                'reset_password.required'=>'Hãy Nhập lại mật khẩu',
                'reset_password.same'=>'Mật khẩu nhập lại không đúng',
            ]);
        $user = new User();
        $user->full_name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        dd($user);
        return redirect()->back()->with('thongbao','Đăng kí thành công');
    }

}


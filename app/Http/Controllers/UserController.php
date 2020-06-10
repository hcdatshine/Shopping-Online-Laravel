<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::select()->paginate(5);
        return view('admin/user/index',compact('users'));
    }

    public function postAdd(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:user,email',
                'password'=>'required|min:6|max:25',
                'name'=>'required|max:30',
                'reset_password'=>'required|same:password',
                'phone' => 'required'
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
                'name.max'=>'Tên ngắn hơn 30 kí tự',
                'reset_password.required'=>'Hãy Nhập lại mật khẩu',
                'reset_password.same'=>'Mật khẩu nhập lại không đúng',
            ]);
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->remember_token = 'asdhfalsjdflas';
        $user->save();
        return redirect()->back()->with('message','Đăng kí thành công');
    }

    public function getEdit($id){
        $editUser = User::find($id);
        return view('admin/user/edit',compact('editUser'));
    }

    public function postEdit(Request $req,$id){
        $user = User::find($id);
        $this->validate($req,[
            'address'=>'required',
            'name'=>'required|max:30',
            'phone' => 'required'
        ],[
            'password.min'=>'Mật khẩu dài hơn 6 kí tự',
            'address.required'=>'Hãy nhập lại địa chỉ',
            'name.required'=>'Hãy nhập lại tên',
            'phone.required'=>'Hãy nhập lại số điện thoại',
            'name.max'=>'Tên ngắn hơn 30 kí tự'
        ]);
        $user->name = $req->name;
        $user->phone = $req->phone;
        $user->address = $req->address;
        // $user->email = $req->email;
        $user->save();
        return redirect()->back()->with('message','Sửa thành công');
    }

    public function deleteUser(){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('message',' Xoá thành công');
    }
}

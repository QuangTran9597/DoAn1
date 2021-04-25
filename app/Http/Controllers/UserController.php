<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function login_user(Request $request){

        $user = $request->only('email', 'password', 'quyen');

        if (Auth::attempt($user)) {
             $user = Auth::user();

            if($user->quyen == 'user'){

                 return redirect()->route('user.index');
            } else {
                $user->quyen == 'admin';
                return redirect()->route('admin.welcome');
            }

        } else {
            return redirect()->route('login')->with('thongbao', 'Đăng nhập không thành công');
        }
         return redirect()->route('login')->with('thongbao', 'Đăng nhập không thành công');

    }

    public function index(){
        return view('users.index');
    }

    public function topics() {
        return view('users.topics');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

}

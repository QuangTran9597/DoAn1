<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function login(){
        return view('layout.login');
    }

    public function register(){
        return view('layout.register');
    }

    public function forgot_password(){
        return view('layout.forgot_password');
    }
}

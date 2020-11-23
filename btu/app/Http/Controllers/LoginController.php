<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
//    public function getLogin(){
//        return view('user.login');
//
//    }
    public function login(){
//        return 'helloo user';
        return view('user.login');

    }
}

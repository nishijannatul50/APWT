<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function login(){
        return view('Login');
    }
    public function loginCheck(Request $request){
        $this->validate(
            $request,
            [
                
                'username'=> 'required',
                'password'=>'required'
            ],
            [
                'username.required'=> 'Please Enter your username',
                'password.required'=> 'Please Enter your password',
                
            ]
           
        );

        return "LOGIN SUCCESSFULLY"; 
    }
}
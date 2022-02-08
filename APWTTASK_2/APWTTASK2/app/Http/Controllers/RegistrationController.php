<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;

class RegistrationController extends Controller
{
    //

     public function registration(){
        return view('Registration');
    }
    public function validateRegistration(Request $request){
        //using requests validate method
        $this->validate(
            $request,
            [
                'name'=>'required|min:7|max:50',
                'email'=>'email',
                'password'=>'required',
                'confirm password'=>'required',
                'dob'=>'required',
                'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/'
            ],
            [
                'name.required'=>'Name is required',
                'name.min'=>'Name must be more than 7 characters'
            ]
            );
            $var = new customer();
            $var->name= $request->name;
            $var->email = $request->email;
            $var->phone = $request->phone;
            $var->username = $request->username;
            $var->password=$request->cpassword;
            $var->dob = $request->dob;
            $var->save();
            
            return "Register Successfully"; 
    }
}
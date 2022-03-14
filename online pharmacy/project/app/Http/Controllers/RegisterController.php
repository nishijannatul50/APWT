<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function showReg()
    {
        return view('pages.registration');
    }
    // public function RegisterSubmit(Request $request)
    // {
    //     //using requests validate method
    //     $validate = $request->validate(
    //         [
    //             'name' => 'required|min:4|max:15',
    //             'dob' => 'required',
    //             'email' => 'required|email',
    //             // 'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/',
    //             'password' => [
    //                 'required',
    //                 'string',
    //                 'min:10',             // must be at least 10 characters in length
    //                 'regex:/[a-z]/',      // must contain at least one lowercase letter
    //                 'regex:/[A-Z]/',      // must contain at least one uppercase letter
    //                 'regex:/[0-9]/',      // must contain at least one digit
    //                 'regex:/[@$!%*#?&]/' // must contain a special character

    //             ],
    //             'password_confirmation' => [
    //                 'required',
    //                 'same:password',
    //                 'min:10'
    //             ]
    //         ],
    //         [
    //             'password_confirmation.required' => 'Confirm Password is Required',
    //             'password_confirmation.same' => 'Password and Confirm Password must match!',
    //             'password.required' => 'Password is required',
    //             'name.required' => 'Name is required',
    //             'email.required' => 'Email is required',
    //             'name.min' => 'Name must be greater than 5 characters',
    //             'name.max' => 'Name must be less than 15 characters'
    //         ]
    //     );
    //     return view('pages.success');
    // }
    public function registrationValidation(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:4|max:20',
                'email' => 'required|email',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
                'address' => 'required',
                'role' => 'required',
                'password' => [
                    'required',
                    'string',
                    'min:10',             // must be at least 10 characters in length
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/' // must contain a special character

                ],
                'confirm-password' => [
                    'required',
                    'same:password',
                    'min:10'
                ]
            ],
            [
                'phone.required' => 'Phone is required!',
                'phone.regex' => 'Invalid phone number!',
                'address.required' => 'Address is required!',
                'confirm-password.required' => 'Confirm Password is Required!',
                'confirm-password.same' => 'Confirm Password not match!',
                'password.required' => 'Password is required!',
                'password.regex' => 'Invalid password formate!',
                'password.min' => 'Must contain 10 characters!',
                'name.required' => 'Name is required!',
                'email.required' => 'Email is required!',
                'email.email' => 'Invalid email address!',
                'name.min' => 'Insert more than 4 characters!',
                'name.max' => 'Insert less than  20 characters!',
                'role.required' => 'Select your user role!'
            ]
        );

        $email = $request->email;
        $check = User::where([
            ['email', '=', $email]

        ])->first();
        if ($check) {

            $request->session()->flash('database-error', 'Email already taken! use another one!');
            return redirect('registration');
        } else {
            $var = new User();
            $var->name = $request->name;
            $var->email = $request->email;
            $var->phone = $request->phone;
            $var->address = $request->address;
            $var->password = $request->password;
            $var->role = $request->role;
            $var->save();
            $request->session()->flash('database-success', 'Registration Successful. wait for approval!');
            return redirect('login');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Admin;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function showAdminProfile(){

    $admin = Admin::where('id',Session()->get('id'))->first();
    return view('pages.dashboard')->with('admin',$admin);
   }
   
    function EditAdminProfile($id)
    {
        $admin = Admin::find($id);
        return view('pages.editAdminProfile', ['admin' => $admin]);
    }
    function updateAdminProfile(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:4|max:20',
                'email' => 'required|email',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
                'address' => 'required',
                'password' => [
                    'required',
                    'string',
                    'min:10',             // must be at least 10 characters in length
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/' // must contain a special character

                ],
            ],
            [
                'phone.required' => 'Phone is required!',
                'phone.regex' => 'Invalid phone number!',
                'address.required' => 'Address is required!',
                'password.required' => 'Password is required!',
                'password.regex' => 'Invalid password formate!',
                'password.min' => 'Must contain 10 characters!',
                'name.required' => 'Name is required!',
                'email.required' => 'Email is required!',
                'email.email' => 'Invalid email address!',
                'name.min' => 'Insert more than 5 characters!',
                'name.max' => 'Insert less than 20 characters!',
            ]
        );
        $var = Admin::find($request->id);
        $var->name = $request->name;
        $var->email = $request->email;
        $var->phone = $request->phone;
        $var->address = $request->address;
        $var->password = $request->password;
        $var->update();
        $request->session()->flash('admin-update', 'Profile Update successfully');
        return redirect('adminDashboard');
       
    }
}

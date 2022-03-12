<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;

class LoginController extends Controller
{
    public function show()
    {
        return view('pages.login');
    }
    public function loginValidation(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'role' => 'required',
                'password' => [
                    'required',
                    'string',
                    'min:5',             // must be at least 5 characters in length
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/', // must contain a special character
                ],
            ],

            [
                'password.regex' => 'Invalid password formate!',
                'password.required' => 'Password is required!',
                'email.required' => 'Email is required!',
                'email.email' => 'Invalid email address!',
                'role.required' => 'Select your user role!'
            ]
        );
        $role = $request->role;
        if ($role == 'admin') {
            $check = Admin::where([
                ['email', '=', $request->email],
                ['password', '=', $request->password]
            ])->first();

            if ($check) {

                // $user = User::where('id', $request->id)->first();
                $request=session()->put('role',$check->role);
                $request=session()->put('id',$check->id);
                $request=session()->put('email',$check->email);
                $request=session()->put('name',$check->name);
                $request=session()->put('phone',$check->phone);
                return redirect()->route('adminDashboard');
                // return view('pages.dashboard');
                // return view('pages.dashboard', compact($admin));
            }

            $request->session()->flash('database-error', 'User Not Found!');
            return redirect('login');
        } 
        
        else {
            $check = User::where([
                ['email', '=', $request->email],
                ['password', '=', $request->password]
            ])->first();

            if ($check) {
                $request=session()->put('role',$check->role);
                $request=session()->put('id',$check->id);
                $request=session()->put('email',$check->email);
                $request=session()->put('name',$check->name);
                $request=session()->put('phone',$check->phone);
                return redirect()->route('userDashboard');
            }
            $request->session()->flash('database-error', 'User Not Found!');
            return redirect('login');
        }
    }
    public function loginSubmit(Request $req){
        $u = User::where('email',$req->email)
                  ->where('password',$req->password)
                  ->first();
        if($u){
            session()->put('user',$u->id);
            if ($req->remember) {
                setcookie('remember',$req-email, time()+36000);
                Cookie::queue('name',$u->email."This is for testing",time()+60);
            }else{
                setcookie('remember',"");
                Cookie::queue('name',"");
            }
           
        }
        return redirect()->route('login');

    }
    public function logout(Request $request)
    {
        session()->flush();
        return redirect('/');
    }
}

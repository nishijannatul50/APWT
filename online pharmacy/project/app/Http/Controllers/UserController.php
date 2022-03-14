<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller
{
    public function userList()
    {
        $allUsers = User::all();
        return view('pages.userList', ['allUsers' => $allUsers]);
    }
    function deleteUser(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $user->delete();
        $request->session()->flash('user-delete', 'User Deleted Successfully!');
        return redirect('userList');
    }
    public function allUser()
    {
        $allUsers = User::all();
        return view('pages.addUser', ['allUsers' => $allUsers]);
    }
    public function listingUser(Request $request)
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
                    'min:10',             
                    'regex:/[a-z]/',     
                    'regex:/[A-Z]/',     
                    'regex:/[0-9]/',      
                    'regex:/[@$!%*#?&]/' 

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
                'role.required' => 'Select your user role!'
            ]
        );
        $email = $request->email;
        $check = User::where([
            ['email', '=', $email]
        ])->first();
        if ($check) {
            $request->session()->flash('database-error', 'Email already taken!');
            return redirect('addUser');
        } else {
            $var = new User();
            $var->name = $request->name;
            $var->email = $request->email;
            $var->phone = $request->phone;
            $var->address = $request->address;
            $var->password = $request->password;
            $var->role = $request->role;
            $var->save();
            $request->session()->flash('user-added', 'User Added!');
            return redirect('addUser');
        }
    }


    
    function EditUser($id)
    {
        $users = User::find($id);
        return view('pages.editUser', ['users' => $users]);
    }
    function updateUser(Request $request)
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
                'role.required' => 'Select your user role!'
            ]
        );
        $var = User::find($request->id);
        $var->name = $request->name;
        $var->email = $request->email;
        $var->phone = $request->phone;
        $var->address = $request->address;
        $var->password = $request->password;
        $var->role = $request->role;
        $var->update();
        $request->session()->flash('user-update', 'User Updated Successfully!');
        return redirect('userList');
    }



    // update profile
    public function showUserProfile(){

        $user = User::where('id',Session()->get('id'))->first();
        return view('pages.dashboard')->with('user',$user);
       }
       
        function EditUserProfile($id)
        {
            $user = User::find($id);
            return view('pages.editUserProfile', ['user' => $user]);
        }
        function updateUserProfile(Request $request)
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
            $var = User::find($request->id);
            $var->name = $request->name;
            $var->email = $request->email;
            $var->phone = $request->phone;
            $var->address = $request->address;
            $var->password = $request->password;
            $var->update();
            $request->session()->flash('user-update', 'Profile Update successfully');
            return redirect('userDashboard');
           
        }

         //change profile image by (user)
    function updateUserImage(Request $request)
    {
        $this->validate(
            $request,
            [
                'image' => 'required',
                'role' => 'required',
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'status' => 'required'
            ],
        );
        $var = User::find($request->id);
        $var->name = $request->name;
        $var->email = $request->email;
        $var->address = $request->address;
        $var->password = $request->password;
        $var->phone = $request->phone;
        $var->role = $request->role;
        $var->status = $request->status;

        if ($request->hasFile('image')) {
            $destination = 'uploads/userProfile/' . $var->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/userProfile/', $fileName);
            $var->image =  $fileName;
        }
        $var->update();
        $request->session()->flash('image-update', 'Image changed successfully!');
        return redirect('userrDashboard');
    }



        //show every single user all orders
    public function userOrders($id)
    {
        $users = user::find($id);
        $user = user::where('id', $users->id)->first();
        $userOrders =Order::where('customerId',$id)->get();// function 
        return view('pages.userOrders')->with(['user' => $users, 'orders' => $userOrders]);
    }
    //show every single user all productRatings
    public function userP_rating($id)
    {
        $users = user::find($id);
        $user = user::where('id', $users->id)->first();
        $userP_ratings =  $user->p_ratings; // function 
        
        return view('pages.rating.usersAll_P_rating')->with(['user' => $users, 'ratings' => $userP_ratings]);
    }
    public function customerS_rating($id)
    {
        $users = user::find($id);
        $user = user::where('id', $users->id)->first();
        $customerS_ratings =  $user->s_ratings; // function 
        return view('pages.rating.customersAll_S_rating')->with(['user' => $users, 'ratings' => $customerS_ratings]);
    }



//get single order details
public function GetSingleOrder($id)
{
    $var = Order::find($id);
    return $var;
}

    }
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User</title>

</head>

<body>
    @extends('../layouts.app')
    @section('content')
    <div class="d-flex justify-content-center align-items-center" style="
    
    width: 100%;
    background: darkblue;
    ">
        <div>
            <div class="form-area">
                <div class="py-4" style=" 
                    border-radius: 10px;
                    width: 1000px;
                    min-height: 90vh;
                    color: white;
                ">
                    <form action="{{route('addUser')}}" method="post">
                        {{csrf_field()}}

                        <table class="mb-4">
                            <tr>
                                <td>
                                    <h4 class="fw-bold">Add User</h4>
                                </td>
                                <td> 
                                    @if(session('user-added'))
                                    <div class="text-center text-white" style="width: 100%; padding: 10px 105px; margin-left: 20px; border-radius: 10px; background-color: #C32BAD">
                                        <span class="fw-bold">{{ session('user-added') }}</span>
                                    </div>
                                    @endif
                                    </td>
                            </tr>
                        </table>

                        <table>
                            <tr>
                                <td class="pr-3 py-2" style="width:400px;"><input placeholder="name" type="text" value="{{old('name')}}"
                                        name="name" class="form-control">
                                </td>
                                <td>
                                    <div>
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                
                                <td class=""><select hidden type="input"  value="{{old('role')}}" name="role"
                                        class="form-control">
                                        <option value="user">User</option>
                                    </select>
                                </td>
                                <td>
                                    <div>
                                        @error('role')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                        
                                <td class="pr-3 py-2"><input placeholder="Email" value="{{old('email')}}" type="text" name="email"
                                        class="form-control">
                                </td>
                                <td>
                                    <div>
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        @if(session('database-error'))
                                        <span class="text-danger"> {{ session('database-error') }}</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="pr-3 py-2"><input placeholder="Address" value="{{old('address')}}" type="text" name="address"
                                        class="form-control"></td>
                                <td>
                                    <div>
                                        @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="pr-3 py-2"><input placeholder="Phone" value="{{old('phone')}}" type="text" name="phone"
                                        class="form-control">
                                </td>
                                <td>
                                    <div>
                                        @error('phone')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="pr-3 py-2"><input placeholder="Password" value="{{old('password')}}" type="password" name="password"
                                        class="form-control"></td>
                                <td>
                                    <div>
                                        @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>

                            
                           
                        </table>
                        <div class="d-flex">
                            <a href={{route('userList')}} class="btn btn-danger btn-sm mt-3 px-3">Back</a>
                            <div class="mx-3">
                                <input type="submit" value="Add" class="btn btn-primary btn-sm mt-3 px-4">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</body>
@endsection

</html>
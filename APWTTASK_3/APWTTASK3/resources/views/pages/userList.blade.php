<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User List</title>
    <style>
        body { max-width: 100%; overflow-x: hidden; }
    </style>
</head>

@extends('../layouts.app')
@section('content')
<div class="row" >
    <div class="col-3" style="background: darkblue">
        @include('pages.adminSideBar')
    </div>
    <div class="col-9">
        <div class="d-flex py-5 justify-content-center align-items-center
      ">
            <div>
                {{-- update message --}}
                @if(session('user-update'))
                <div class="alert alert-warning w-100 text-center" role="alert">
                    <span class="fw-bold"> {{ session('user-update') }}</span>
                </div>
                @endif
                {{-- delete message --}}
                @if(session('user-delete'))
                <div class="alert alert-danger font-weight-bold w-100 text-center" role="alert">
                    <span class="fw-bold">
                        {{ session('user-delete') }}
                    </span>
                </div>
                @endif
                <h4 class="my-4 fw-bold text-uppercase">User List</h4>
                <table class="table table-borded table-striped">
                    <tr class="text-center">
                        <th class="px-4">Id</th>
                        <th class="px-4">Name</th>
                        <th class="px-4">Email</th>
                        <th class="px-4">Address</th>
                        <th class="px-4">Phone</th>
                        <th class="px-4">Action</th>
                    </tr>
                    @foreach($allUsers as $user)
                    <tr class="text-center">
                        <td class="px-4">{{$user->id}}</td>
                        <td class="px-4">{{$user->name}}</td>
                        <td class="px-4">{{$user->email}}</td>
                        <td class="px-4">{{$user->address}}</td>
                        <td class="px-4">{{$user->phone}}</td>
                        <td class="px-4">
                            <a class="btn btn-primary btn-sm mx-1" href={{ "editUser/".$user->id }}>Update</a>
                            <a class="btn btn-danger btn-sm" href={{ "deleteUser/".$user->id }}>Delete</a>
                            
                        </td>
                    </tr>
                    @endforeach
                </table>
                <a class="btn btn-primary btn-sm mb-3" href="{{route('addUser')}}">Add User</a>
            </div>
        </div>
    </div>
</div>

@endsection

</html>
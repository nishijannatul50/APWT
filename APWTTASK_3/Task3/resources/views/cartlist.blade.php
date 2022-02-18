@extends('layouts.app')
@section('content')
    <table class="table table-borded">
        <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Product Code</th>
            <th>Product Desc</th>
            <th>Quantity</th>
            <th>Price</th>
           
            
        </tr>

        @foreach($cart as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->code}}</td>
                <td>{{$item->desc}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->price}}</td>
                
                <td><a href="/cart/delete/{{$item->id}}/{{$item->name}}">Delete</a></td>
                  </tr>
        @endforeach
    </table>
@endsection
@extends('../../layouts.app')
@section('content')


<style>


h4 {
  text-align: right;
}
</style>

@if($cart==null)

    <p>Cart is empty</p>

@else
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Id</th>
      <th scope="col">Quantity</th>
      <th scope="col">Name</th>
      <th scope="col">Unit Price</th>
      <th scope="col">Total</th>
      
    </tr>
  </thead>
  <tbody>
  @php
            $total = 0
            @endphp
            
    @foreach ($cart as $item)
    
  

        <tr>
            <td>{{$item->p_id}}</td>
            <td>{{$item->p_name}}</td>
            <td>{{$item->p_quantity}}</td>
            <td>{{$item->p_price}}</td>

                    <td>{{$item->p_price * $item->p_quantity}}</td>
                    @php 
                        $total += $item->p_price * $item->p_quantity
                    @endphp
                </tr>
    @endforeach
    <tr>
                <td></td><td></td><td></td>
                <td>Grand Total</td>
                <td>{{$total}}</td>
            </tr>
  </tbody>
</table>

<td><a class="btn btn-primary" href="{{route('order')}}"><h6>Confirm Order</h6></a></td>



@endif
@endsection



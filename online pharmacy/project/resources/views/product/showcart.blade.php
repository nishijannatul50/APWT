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
      <th scope="col">Unit Price</th>
      <th scope="col">Total</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach ($cart as $item)
    
  

        <tr>
            <td>{{$item->p_id}}</td>
           
            <td>{{$item->p_quantity}}</td>
            
            
        </tr>
    @endforeach
  </tbody>
</table>

<td><a class="btn btn-primary" href="{{route('order')}}"><h6>Confirm Order</h6></a></td>



@endif
@endsection



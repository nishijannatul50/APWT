 @extends('../../layouts.app')
@section('content')




<table class="table">
  <head>
    <tr>
      
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Category</th>
      <th scope="col">Product Details</th>
      <th scope="col">Image</th>
    </tr>
  </head>
  <body>
  @php
            $total = 0
            @endphp
    @foreach ($products as $item)


        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td> 
            <td>{{$item->category}}</td>
            <td>{{$item->productDetails}}</td>
   
            

          <td><img class="card-img-top" src="{{ asset('uploads/products/'.$item->image) }}" style="width: 5rem;" alt="Card image cap"></td>

          
           <td><a href="{{route('product.addtocart',['id'=>$item->id])}}" class="btn btn-primary">Add to Cart</a> <input type="number" value="1" style="width:3rem;" ></td> 
        </tr>
    @endforeach
  </body>
</table>
@endsection
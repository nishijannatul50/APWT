@extends('layouts.app')
@section('content')
    <h1></h1>
    
    
    <div class="col-md-3">
        @foreach ($products as $item)
        
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="img/napa.jpeg" alt="Card image cap">
                <div class="card-body">
                <p class="card-text text-center">{{$item->ProductName}}<br>
                <span>Price: BDT{{$item->Price}}</span><br>
                <a href="{{route('products.addcart',['id'=>$item->id])}}" class="btn btn-primary" style="color:white">Add to Cart</a></p>
                </div>
            </div>
            
        @endforeach
        </div> 
@endsection
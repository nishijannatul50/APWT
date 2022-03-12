<div class="px-2 py-5" style="min-height: 88vh">
    <div class="text-center">

        <a class="btn btn-danger my-2 w-75 fw-bold" href="{{ route ('dashboard') }}"></i>User: {{ session('name') }}</a>
    </div>
    <div class="text-center">
        <a class="btn btn-primary my-2 w-75" href="{{route('product.list')}}"></i>All Product</a>
    </div>


    <div class="text-center">
        <a class="btn btn-primary my-2 w-75" href="{{ route ('product.showcart') }}"></i>My Cart</a>
    </div>
   
    <div class="text-center">
        <a class="btn btn-primary my-2 w-75" href="{{route('product.emptycart')}}"></i>Empty Cart</a>
    </div>

    <div class="text-center">
        <a class="btn btn-primary my-2 w-75" style="text-align: center" href={{ "/userOrders/" .session('id') }}><i
                class="fas fa-bars px-2 me-2"></i>My order</a>
    </div>
    <div class="text-center">
        <a class="btn btn-primary my-2 w-75"  style="text-align: center" href={{ '/productReviews/' .session('id') }} ><i
                class="fas fa-bars me-2 px-2"></i>P_Review</a>
    </div>

    <div class="text-center">
        <a class="btn btn-primary my-2 w-75" style="text-align: center" href="{{ route ('products') }}"><i
                class="fas fa-bars me-2 px-2 "></i>All Product Show</a>
    </div>
    
    <div class="text-center">
        <a class="btn btn-primary my-2 w-75" href="{{ route ('logout') }}"></i>Logout</a>
    </div>
    
</div>






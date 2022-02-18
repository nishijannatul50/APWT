@extends('layouts.app')
@section('content')



<html>

<head>
<style>
	
	


    
    
        
        
        .col-md-4 form-group {
            color: #FF0000;
        }
        h1{
            width:40%;
        margin:15px auto;
        box-shadow: 0 4px 8px 5px rgba(0, 0, 0, 0.8), 
                    0 6px 20px 0 rgba(0, 0, 0, 0.19);
        color: #B9770E ;
        }
        h2{
           text-align: center; }
      form{ 
          padding-top: 20px;
            text-align: center;
            font-size: 20px;}
      input{
           
        background-color: #AED6F1;
      width: 40%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border:none;
      border-radius: 10px;
      box-sizing: border-box;
      text-transform: capitalize;
      text-align: center;
      font-size: 17px;
     box-shadow: inset 0 0 10px black;
      }
      input[type="submit"] {
        padding: 5px 15px;
        background-color: green;
        border: 8px;
        color: #fff;
        border-radius: 8px;
    }  
      input[type="reset"] {
        padding: 5px 15px;
        background-color: gray;
        border: 8px;
        color: #fff;
        border-radius: 8px;
    
    }
    
      span{ font-size: 15px;
            text-align: center;  
          }
        </style>

    <form action="{{route('addProductSubmit')}}" class="col-md-6" method="post">
        <!-- Cross Site Request Forgery-->
        {{csrf_field()}}

        
        <div class="col-md-4 form-group">
            <span>Product Id</span>
            <input type="text" name="id" value="{{old('id')}}"class="form-control">
            @error('id')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        
        <div class="col-md-4 form-group">
            <span>Product Name</span>
            <input type="text" name="name" value="{{old('name')}}" class="form-control">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

            <div class="col-md-4 form-group">
            <span>Product Code</span>
            <input type="text" name="code" value="{{old('code')}}" class="form-control">
            @error('code')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

            <div class="col-md-4 form-group">
            <span>Product Description</span>
            <input type="text" name="desc" value="{{old('desc')}}" class="form-control">
            @error('desc')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

            <div class="col-md-4 form-group">
            <span>Product Category</span>
            <input type="text" name="cate" value="{{old('cate')}}" class="form-control">
            @error('cate')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

            <div class="col-md-4 form-group">
            <span>Product Price</span>
            <input type="text" name="price" value="{{old('price')}}" class="form-control">
            @error('price')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

            <div class="col-md-4 form-group">
            <span>Quantity</span>
            <input type="text" name="quantity" value="{{old('quantity')}}" class="form-control">
            @error('quantity')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

        <div class="col-md-4 form-group">

            <span>Stock Date</span>
            <input type="date" name="s_date" value="{{old('s_date')}}" class="form-control">
            @error('s_date')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="col-md-4 form-group">
            <span>Rating</span>
            <input type="text" name="rating" value="{{old('rating')}}" class="form-control">
            @error('rating')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>


        <div class="col-md-4 form-group">

        <span>Purchased Date</span>
        <input type="date" name="p_date" value="{{old('p_date')}}" class="form-control">
        @error('p_date')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <br>
        <input type="submit" class="btn btn-success" value="Add Product" >
    </form>
    </body>
    </html>



    @endsection
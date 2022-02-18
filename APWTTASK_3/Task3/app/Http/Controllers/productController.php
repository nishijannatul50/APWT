<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\product;

class productController extends Controller
{
    //
        function home()
    { 
        
        $products = Product::all();
        return view('home')->with("products",$products);
        
    }

    function AddProduct()
    {
        return view('addProduct');
    }

    function AddProductSubmit(Request $request)
    {{
        $this->validate(
            $request,
            [
                'name'=>'required|min:3|max:30',
                'id'=>'required',
                'code'=>'required',
                'desc'=>'required',
                'quantity'=>'required',
                'cate'=>'required',
                'price'=>'required',
                's_date'=>'required',
                'rating'=>'required',
                'p_date'=>'required',

            ],
            [
                'id.required'=>'Product is Id required',
                'name.required'=>'Please enter Product Name',
                'name.min'=>'Name must be more than 2 characters',
                'desc.required'=>'Enter Product Description',
                'quantity.required'=>'Enter Product Quantity',
                'cate.required'=>'Enter Product category',
                'price.required'=>'Enter Product price',
                's_date.required'=>'Enter Product Stock Date',
                'p_date.required'=>'Enter Product purchased Date',


    
    
            ]
        );
        $var = new Product();
        $var->ProductId= $request->id;
        $var->ProductName= $request->name;
        $var->ProductCode = $request->code;
        $var->ProductDesc = $request->desc;
        $var->Quantity=$request->quantity;
        $var->Category = $request->cate;
        $var->Price = $request->price;
        $var->StockDate = $request->s_date;
        $var->Rating = $request->rating;
        $var->PurchasedDate = $request->p_date;
        $var->save();
    

        return redirect()->route('product/List');
    
      
    }
    }

    public function list(){
        $products = Product::all();
        return view('productList')->with('products',$products);
    }

    public function edit(Request $request){
        //
        $id = $request->id;
        //$student = Student::where('id',$id)->get(); //for multiple values : return array
        $product = Product::where('ProductId',$id)->first();
        //$student = Student::where('id','>',$id)->first();//default operator =
        return view('editProduct')->with('product', $product);

    }


    public function editSubmit(Request $request){

        $this->validate(
            $request,
            [
                'name'=>'required|min:3|max:30',
                'id'=>'required',
                'code'=>'required',
                'desc'=>'required',
                'quantity'=>'required',
                'cate'=>'required',
                'price'=>'required',
                's_date'=>'required',
                'rating'=>'required',
                'p_date'=>'required',

            ],
            [
                'id.required'=>'Product Id is required',
                'name.required'=>'Please enter Product Name',
                'name.min'=>'Name must be more than 2 characters',
                'desc.required'=>'Enter Product Description',
                'quantity.required'=>'Enter Product Quantity',
                'cate.required'=>'Enter Product category',
                'price.required'=>'Enter Product price',
                's_date.required'=>'Enter Product Stock Date',
                'p_date.required'=>'Enter Product purchased Date',


    
    
            ]
        );
        $var = Product::where('ProductId',$request->id)->first();
        $var->ProductId= $request->id;
        $var->ProductName= $request->name;
        $var->ProductCode = $request->code;
        $var->ProductDesc = $request->desc;
        $var->Quantity=$request->quantity;
        $var->Category = $request->cate;
        $var->Price = $request->price;
        $var->StockDate = $request->s_date;
        $var->Rating = $request->rating;
        $var->PurchasedDate = $request->p_date;
        $var->save();
        return redirect()->route('product/List');
        
    }

    public function delete(Request $request){
        $var = Product::where('ProductId',$request->id)->first();
        $var->delete();
        return redirect()->route('product/List');

    }

    public function Addcart(Request $request){

        $var = Product::where('id',$request->id)->first();
        //return $var;
        $cart = [];
        if(session()->has('cart')){
            $cart = json_decode(session()->get('cart'));
        }
        

        $product = array('id'=>$request->id,'name'=>$var->ProductName,'code'=>$var->ProductCode , 'desc'=>$var->ProductDesc , 'quantity'=> "1" ,'price'=>$var->Price);
        $cart[] = (object)($product);

        $jsonCart = json_encode($cart);
        session()->put('cart',$jsonCart);
        //return session()->get('cart');
        return redirect()->route('product/cartlist');


    }
    public function cartlist(){

        $cart = json_decode(session()->get('cart'));
        return view("Cartlist")->with("cart",$cart);
           

    }


    
}

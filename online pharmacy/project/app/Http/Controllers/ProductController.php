<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Customer;
use App\Models\order;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    
        
    
        //
        public function list()
        {
            $products = Product::all();
    
            return view('product.list')->with('products',$products);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = 'product' . time() . '.' . $extension;
                $file->move('uploads/products/', $fileName);
                $var->image =  $fileName;
            }
            $var->save();
            $request->session()->flash('product-added', 'Product Added!');
            return redirect('product.list');


        }
    
        public function addtocart(Request $req)
        {
            
            $id=$req->id;
            $product=product::where("id",$id)->first();
            
            $cart=[];
            $product=array('p_id'=>$id,'p_quantity'=>1,'p_name'=>$product->name,'p_price'=>$product->price);
    
            if($req->session()->has('cart')){
                $cart=json_decode($req->session()->get('cart'));
            }
            $cart[]=(object)$product;
            $jsoncart= json_encode($cart);
            $req->session()->put('cart',$jsoncart);
    
            
            return redirect()->route('product.list');
              
            return redirect()->route('product.allProducts');

        
        }
    
        public function emptycart()
        {
            session()->forget('cart');
    
            return redirect()->route('products');
        }
    
        public function showcart()
        {
            
            $cart= json_decode(session()->get('cart'));
            
            return view('product.showcart')->with('cart',$cart);
            
        }
    
        public function confirmorder()
        {
            $cart=json_decode(session()->get('cart'));
    
            foreach($cart as $item){
               
                $user= User:: where('phone',session()->get('phone'))->first();
                $order = new order();
                // $order->id= $item->p_id;
                // $order->id= $user->c_id;
                $order->status= "ordered";
                $order->time= "10/112021";
                $order->save();
    
                
    
            }
            return "ok";
        }
    
        public function myorder()
        {
             $user= User:: where('phone',session()->get('phone'))->first();
          
             $order= order:: where('id',$user->id)->first();
    
           // $product= product:: where('p_id',2)->first();
    
            return $order->product;
        }
    


    
        //product page for all users
        public function showAllProducts()
        {
            $allProducts = Product::paginate(8);
            
            return view(
                'pages.product.allProducts',
                ['allProducts' => $allProducts],
                
            );
        }
     // show single product details
     public function showProductDetails(Request $request)
     {
 
         $product = Product::where('id', $request->id)->first();
         $productCategory = Product::all();
 
         return view('pages.product.productDetails', ['details' => $product], ['categories' => $productCategory]);
     }
        // show product on homePage 
        public function showProducts()
        {
            $featuredProduct = Product::orderBy('price', 'desc')->limit(2)->get();
            $latestProduct = Product::orderBy('created_at', 'desc')->limit(3)->get();
            $allProducts = Product::paginate(4);
            return view('pages.home.home')->with(['allProducts' => $allProducts, 'featuredProducts' => $featuredProduct, 'latestProducts' => $latestProduct]);
        }
        
    }
       
    
       
    
    
    
    
    
    
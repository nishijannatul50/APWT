<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;



class OrderController extends Controller
{
    
        // send product data to buy now page
        public function confirmProductShow($id){ 
            $products = Product::find($id);
            return view('pages.order.order', ['products' => $products]);
        }
       
        public function EditOrder($id){
            $order = Order::find($id);
            return view('pages.order.userEditOrder', ['order' => $order]);
        }
        // buy now
        public function buyNow(Request $request)
        {
            $this->validate(
                $request,
                [
                    'productName' => 'required',
                    'userName' => 'required',
                    'Address' => 'required',
                    'phone' => 'required',
                    'price' => 'required',
                    'status' => 'required',
                    'productId' => 'required',
                    'userId' => 'required',
                    'sellerId' => 'required',
                    'method' => 'required',
                ],
                [
                    'Address.required' => 'Address is Required',
                    'phone.required' => 'Phone is Required',
                    'userName.required' => 'Your name is Required',
                ]
            );
            $var = new Order();
            $var->productName = $request->productName;
            $var->customerName = $request->userName;
            $var->Address = $request->Address;
            $var->phone = $request->phone;
            $var->price = $request->price;
            $var->status = "Pending";
            $var->productId = $request->productId;
            $var->customerId = $request->userId;
            $var->sellerId = $request->sellerId;
            $var->method = $request->method;
            $var->save();
            $request->session()->flash('order-done', 'Order Place Successfully!');
            return redirect('/userOrders/'. session('id'));
            return redirect('product.showcart');
            
        }
        // delete order  by user
        function deleteOrder(Request $request)
        {
            $product = Order::where('id', $request->id)->first();
            $product->delete();
            $request->session()->flash('order-delete', 'Order Deleted Successfully!');
            return redirect('userOrders/'. session('id'));
        }
         
        //update order by user
        function updateOrder(Request $request)
        {
            $this->validate(
                $request,
                [
                    'productName' => 'required',
                    'userName' => 'required',
                    'Address' => 'required',
                    'phone' => 'required',
                    'price' => 'required',
                    'status' => 'required',
                    'productId' => 'required',
                    'userId' => 'required',
                    'method' => 'required',
                ],
            );
            $var = Order::find($request->id);
            $var->productName = $request->productName;
            $var->customerName = $request->userName;
            $var->Address = $request->Address;
            $var->phone = $request->phone;
            $var->price = $request->price;
            $var->status = $request->status;
            $var->productId = $request->productId;
            $var->customerId = $request->userId;
            $var->sellerId = $request->sellerId;
            $var->method = $request->method;
    
            $var->update();
            $request->session()->flash('order-update', 'Order Updated Successfully!');
            return redirect('userOrders/'. session('id'));
        }
        
        
}

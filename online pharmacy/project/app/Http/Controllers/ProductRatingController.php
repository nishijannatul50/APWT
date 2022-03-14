<?php

namespace App\Http\Controllers;

use App\Models\ProductRating;
use App\Http\Requests\StoreProductRatingRequest;
use App\Http\Requests\UpdateProductRatingRequest;

class ProductRatingController extends Controller
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
     * @param  \App\Http\Requests\StoreProductRatingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRatingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductRating  $productRating
     * @return \Illuminate\Http\Response
     */
    public function show(ProductRating $productRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductRating  $productRating
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductRating $productRating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRatingRequest  $request
     * @param  \App\Models\ProductRating  $productRating
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRatingRequest $request, ProductRating $productRating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductRating  $productRating
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductRating $productRating)
    {
        //
    }




    // send product data to ProductRatingForm page
    function showProductRatingForm($id)
    {
        $review = Product::find($id);
        return view('pages.product.productRatingForm', ['review' => $review]);
    }
    
    public function confirmProductRating(Request $request)
    {
        $this->validate(
            $request,
            [
                'rating' => 'required',
                'review' => 'required',
                'userId' => 'required',
                'productId' => 'required',
                'userrName' => 'required',
                'productName' => 'required',
            ],
        );
        $var = new ProductRating();
        $var->rating = $request->rating;
        $var->review = $request->review;
        $var->userId = $request->userId;
        $var->userName = $request->userName;
        $var->productName = $request->productName;
        $var->productId = $request->productId;
        $var->save();
        $request->session()->flash('rating-done', 'Product Rating Done!');
        return redirect('userOrders/'. $request->userId);
    }
    //product rating delete by user
    function deleteProductReview(Request $request)
    {
        $productRating = ProductRating::where('id', $request->id)->first();
        $productRating->delete();
        $request->session()->flash('review-delete', 'Product Reviews Successfully Deleted!');
        if(session('role') == 'seller'){
            return redirect('/productRatings/'. session('id'));
        }
        else{
            return redirect('/productReviews/'. session('id'));
        } 
    }
    // edit product review
    public function editProductReview($id){
        $review = ProductRating::find($id);
        return view('pages.product.productRatingEdit', ['review' => $review]);
    }
    // updateProductReview byuser
    function updateProductReview(Request $request)
    {
        $this->validate(
            $request,
            [
                'rating' => 'required',
                'review' => 'required',
                'userId' => 'required',
                'productId' => 'required',
                'userName' => 'required',
                'productName' => 'required',
            ],
        );
        $var = ProductRating::find($request->id);
        $var->rating = $request->rating;
        $var->review = $request->review;
        $var->userId = $request->userId;
        $var->userrName = $request->userrName;
        $var->userId = $request->userId;
        
        $var->update();
        $request->session()->flash('review-update', 'Review Updated Successfully!');
       if(session('role') == 'seller'){
        return redirect('productRatings/'. session('id'));
       }
       else{
        return redirect('productReviews/'. session('id'));
       }
    }
}


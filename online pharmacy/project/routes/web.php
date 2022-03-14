<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductRatingController;


use App\Http\Middleware\ValidSellerOrUser;
use App\Http\Middleware\ValidSProviderOrUser;
use App\Http\Middleware\ValidAdminOrUser;
use App\Http\Middleware\ValidUser;

Route::view(uri:'/', view:'welcome')->name('/');
Route::view(uri:'/contact', view:'pages.contact')->name('contact');
Route::get('/error', function () {
    return view('pages.error');
})->name('error');
Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->name('dashboard');
Route::get('/login',[LoginController::class,'show'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/dashboard',[LoginController::class,'loginValidation'])->name('dashboard');
Route::get('/registration',[RegisterController::class,'showReg'])->name('registration');
Route::post('/login',[RegisterController::class,'registrationValidation'])->name('login'); 

// user profile 
Route::get('/userDashboard',[UserController::class,'showUserProfile'])->name('userDashboard');
Route::get('/editUserProfile/{id}',[UserController::class,'EditUserProfile'])->name('editUserProfile/{id}')->middleware([ValidUser::class]);
Route::post('/updateUserProfile',[UserController::class,'updateUserProfile'])->name('updateUserProfile')->middleware([ValidUser::class]);
Route::get('/changeUserImage/{id}',[UserController::class,'changeUserImage'])->name('changeUserImage/{id}')->middleware([ValidUser::class]);
Route::post('/updateUserImage',[UserController::class,'updateUserImage'])->name('updateUserImage');
//products
Route::get('/product/list',[ProductController::class,'list'])->name('product.list');
Route::get('/addtocart/{id}',[ProductController::class,'addtocart'])->name('product.addtocart');
Route::get('/emptycart',[ProductController::class,'emptycart'])->name('product.emptycart');
Route::get('/showcart',[ProductController::class,'showcart'])->name('product.showcart');
Route::get('/confirmorder',[ProductController::class,'confirmorder'])->name('product.confirmorder');
Route::get('/myorder',[ProductController::class,'myorder'])->name('product.myorder');

Route::get('/products',[ProductController::class,'showAllProducts'])->name('product.list');
//Route::get('/products/{id}',[ProductController::class,'showProductDetails'])->name('products/{id}');


// order CRUD by (User)
Route::get('/order/{id}',[OrderController::class,'confirmProductShow'])->name('order/{id}')->middleware([ValidUser::class]);
Route::post('/order',[OrderController::class,'buyNow'])->name('order');

Route::get('deleteOrder/{id}',[OrderController::class,'deleteOrder'])->name('deleteOrder/{id}')->middleware([ValidUser::class]);
Route::get('updateOrder/{id}',[OrderController::class,'EditOrder'])->name('updateOrder/{id}')->middleware([ValidUser::class]);
Route::post('/updateOrder',[OrderController::class,'updateOrder'])->name('updateOrder');


// common 
Route::get('/productList',[ProductController::class,'productList'])->name('productList')->middleware([ValidAdminOrSeller::class]);
// valid admin or seller 
Route::get('deleteProduct/{id}',[ProductController::class,'deleteProduct'])->name('deleteProduct/{id}')->middleware([ValidAdminOrSeller::class]);
Route::get('/editProduct/{id}',[ProductController::class,'EditProduct'])->name('editProduct/{id}')->middleware([ValidAdminOrSeller::class]);
Route::post('/updateProduct',[ProductController::class,'updateProduct'])->name('updateProduct');
// single product many orders
Route::get('/productOrders/{id}',[ProductController::class,'productOrders'])->name('productOrders/{id}')->middleware([ValidAdminOrSeller::class]);

// product rating controller
Route::get('/productRating/{id}',[ProductRatingController::class,'showProductRatingForm'])->name('productRating/{id}')->middleware([ValidUser::class]);
Route::post('/productRating',[ProductRatingController::class,'confirmProductRating'])->name('productRating');
Route::get('/p_reviewList',[ProductRatingController::class,'p_ratingList'])->name('p_reviewList');
Route::get('deleteProductReview/{id}',[ProductRatingController::class,'deleteProductReview'])->name('deleteProductReview/{id}')->middleware([ValidSellerOrUser::class]);
Route::get('updateProductReview/{id}',[ProductRatingController::class,'editProductReview'])->name('updateProductReview/{id}')->middleware([ValidSellerOrUser::class]);
Route::post('updateProductReview',[ProductRatingController::class,'updateProductReview'])->name('updateProductReview');

//oder
Route::get('/userOrders/{id}',[UserController::class,'userOrders'])->name('customerOrders/{id}')->middleware([ValidAdminOrUser::class]);
Route::get('/products',[ProductController::class,'showAllProducts'])->name('products');
Route::get('/products/{id}',[ProductController::class,'showProductDetails'])->name('products/{id}');

Route::get('/productReviews/{id}',[UserController::class,'userP_rating'])->name('productReviews/{id}')->middleware([ValidUser::class]);


//Admin Profile 
Route::get('/adminDashboard',[AdminController::class,'showAdminProfile'])->name('adminDashboard');
Route::get('/editAdminProfile/{id}',[AdminController::class,'EditAdminProfile'])->name('editAdminProfile/{id}')->middleware([ValidAdmin::class]);
Route::post('/updateAdminProfile',[AdminController::class,'updateAdminProfile'])->name('updateAdminProfile')->middleware([ValidAdmin::class]);
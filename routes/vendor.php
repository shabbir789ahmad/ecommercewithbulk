<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vendor\VendorDataController;
use App\Http\Controllers\vendor\ProductController;
use App\Http\Controllers\vendor\VendorController;
use App\Http\Controllers\vendor\SupplierController;
use App\Http\Controllers\vendor\BannerController;
use App\Http\Controllers\vendor\CouponController;
use App\Http\Controllers\vendor\SaleController;
use App\Http\Controllers\vendor\OrderController;
use App\Http\Controllers\vendor\ProfileController;
use App\Http\Controllers\vendor\VendorAddressController;

//route for vendor

Route::group(['prefix'=>'vendor'],function()
{
 Route::group(['middleware'=>'vendor.guest'],function()
 {

     Route::get('login',[VendorController::class,'index'])->name('vendor.login');
     Route::post('login',[VendorController::class,'logIn'])->name('vendor.login');

     Route::view('register','admin.vendor_signin')->name('vendor.register');
     Route::post('register2',[VendorController::class,'vendorSign'])->name('vendor.register2');


  });


Route::group(['middleware'=>'vendor.auth'],function(){
 
    Route::post('logout',[VendorController::class,'logout'])->name('vendor.logout');

     Route::get('dashboard',[VendorDataController::class,'count'])->name('vendor.dashboard');



    Route::resource('product',ProductController::class);
    Route::resource('sales',SaleController::class);

    //vendor orders
    Route::get('orders/for/vendor',[OrderController::class,'index'])->name('orders.for.vendor');
    Route::get('orders/delivered/vendor',[OrderController::class,'delivered'])->name('orders.delivered.vendor');
    Route::get('orders/detail/{id}/vendor',[OrderController::class,'orderDetail'])->name('orders.detail.vendor');

    Route::delete('orders/delete/{id}/vendor',[OrderController::class,'destroy'])->name('orders.delete.vendor');
    Route::patch('change/order/status',[OrderController::class,'update'])->name('change.order.status');




  // Route::post('discount-update',[ProductController::class,'discountUp'])->name('vendor.discount-update');

    //get stock and update
    Route::resource('supplier',SupplierController::class);

    //store banner and data upload
    Route::resource('banner',BannerController::class);
   //route for coupon 
    Route::resource('coupon',CouponController::class);

    //route vendor Profile Update
    Route::resource('profile',ProfileController::class);
    Route::resource('addresess',VendorAddressController::class);

  });
});


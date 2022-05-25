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

//route for vendor

Route::group(['prefix'=>'vendor'],function(){
 Route::group(['middleware'=>'vendor.guest'],function(){

Route::get('login',[VendorController::class,'index'])->name('vendor.login');
Route::post('login',[VendorController::class,'logIn'])->name('vendor.login');

Route::view('register','admin.vendor_signin')->name('vendor.register');
Route::post('register2',[VendorController::class,'vendorSign'])->name('vendor.register2');


 });


Route::group(['middleware'=>'vendor.auth'],function(){
 
  Route::post('logout',[VendorController::class,'logout'])->name('vendor.logout');

Route::get('dashboard',[VendorDataController::class,'count'])->name('vendor.dashboard');

     // Route::get('add-stock-bulk',[StockController::class,'getSupplier2'])->name('vendor/add-stock-bulk');
  // Route::post('new-stock',[StockController::class,'newStock'])->name('vendor.new-stock');
// Route::post('bulk-stock',[StockController::class,'bulkStock'])->name('vendor.bulk-stock');


Route::resource('product',ProductController::class);
Route::resource('sales',SaleController::class);

//vendor orders
Route::get('orders/for/vendor',[OrderController::class,'index'])->name('orders.for.vendor');

Route::get('orders/detail/{id}/vendor',[OrderController::class,'orderDetail'])->name('orders.detail.vendor');

Route::get('orders/delete/{id}/vendor',[OrderController::class,'index'])->name('orders.delete.vendor');

// Route::get('stock-detail/{id}',[StockController::class,'stockDetail'])->name('vendor/stock-detail/{id}');


// Route::post('upate-price',[StockController::class,'updateSell'])->name('vendor.upate-price');
// Route::post('upate-discount',[StockController::class,'updateDiscount'])->name('vendor.upate-discount');
// Route::post('upate-stock',[StockController::class,'updateStock'])->name('vendor.upate-stock');
// Route::post('update-stock-detail',[StockController::class,'updateDetail'])->name('vendor.update-stock-detail');

//route for update filter



Route::post('discount-update',[ProductController::class,'discountUp'])->name('vendor.discount-update');

//route for colors store and size 


  //route for orders
// Route::get('orders',[OrderController::class,'getOrder'])->name('vendor.orders');
// Route::get('cancel-order/{id}',[OrderController::class,'cancelOrder'])->name('vendor.cancel-order/{id}');
// Route::get('show-order/{id}',[OrderController::class,'showOrder'])->name('vendor.show-order/{id}');

// Route::get('deleted-order',[OrderController::class,'deletedOrder'])->name('vendor/deleted-order');
// Route::get('restore-order/{id}',[OrderController::class,'restoreOrder'])->name('vendor/restore-order/{id}');
// Route::get('delivered',[OrderController::class,'delivered'])->name('vendor.delivered');


// Route::get('new-deals',[DealController::class,'index'])->name('vendor.new-deals');
// Route::post('deals',[DealController::class,'create'])->name('vendor.deals');
// Route::get('all-deals',[DealController::class,'show'])->name('vendor/all-deals');
// Route::get('deal-detail/{id}',[DealController::class,'detail'])->name('vendor.deal-detail/{id}');
// Route::post('update-deal',[DealController::class,'updateDeal'])->name('vendor/update-deal');
// Route::post('add-deal-product',[DealController::class,'update'])->name('vendor/add-deal-product');
// Route::get('delete-deal-product/{id}/{stock_id}',[DealController::class,'destory'])->name('vendor/delete-deal-product{id}/{stock_id}');
/*
Route::get('get/{id}',[DealController::class,'get'])->name('vendor.get/{id}');
Route::get('new-deals2/{id}',[DealController::class,'catOrder'])->name('vendor.new-deals2/{id}');


*/


//get stock and update
  
  Route::resource('supplier',SupplierController::class);

//store banner and data upload
Route::resource('banner',BannerController::class);




// Route::post('on-sale',[StoreController::class,'onSale'])->name('vendor.on-sale');
// Route::post('vendor-on-sale',[StoreController::class,'vendorOnSale'])->name('vendor.vendor-on-sale');
// Route::get('out-sale/{id}',[StoreController::class,'outSale'])->name('vendor.out-sale/{id}');
// Route::get('vendor-out-sale/{id}',[StoreController::class,'vendorOutSale'])->name('vendor.vendor-out-sale/{id}');

//promote product route
// Route::Post('sponser-product',[StockController::class,'sponserProduct2'])->name('vendor.sponser-product');

//vendor make sale route
// Route::view('new-sale','vendor.vendor_make_sale');
// Route::post('make-new-sale',[VendorSaleController::class,'vendorSale'])->name('vendor.make-new-sale');
// Route::get('all-sale',[VendorSaleController::class,'getSale'])->name('all-sale');
// Route::get('sale-delete/{id}',[VendorSaleController::class,'deleteSale'])->name('vendor/sale-delete/{id}');
// Route::get('sale-status',[VendorSaleController::class,'statusSale'])->name('vendor/sale-status');
// Route::post('update-vendor-sale',[VendorSaleController::class,'updateSale'])->name('vendor/update-vendor-sale');


//route for coupon 

Route::resource('coupon',CouponController::class);

  });
});


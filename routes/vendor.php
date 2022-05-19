<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vendor\VendorDataController;
use App\Http\Controllers\vendor\ProductController;
use App\Http\Controllers\vendor\VendorController;
use App\Http\Controllers\vendor\SupplierController;

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

     Route::get('add-stock-bulk',[StockController::class,'getSupplier2'])->name('vendor/add-stock-bulk');
  // Route::post('new-stock',[StockController::class,'newStock'])->name('vendor.new-stock');
// Route::post('bulk-stock',[StockController::class,'bulkStock'])->name('vendor.bulk-stock');


Route::resource('product',ProductController::class);
Route::get('stock-detail/{id}',[StockController::class,'stockDetail'])->name('vendor/stock-detail/{id}');

Route::get('cancel-stock/{id}',[PriceController::class,'deletedStock'])->name('vendor/cancel-stock/{id}');
Route::post('upate-price',[StockController::class,'updateSell'])->name('vendor.upate-price');
Route::post('upate-discount',[StockController::class,'updateDiscount'])->name('vendor.upate-discount');
Route::post('upate-stock',[StockController::class,'updateStock'])->name('vendor.upate-stock');
Route::post('update-stock-detail',[StockController::class,'updateDetail'])->name('vendor.update-stock-detail');

//route for update filter

Route::get('delete-image/{id}',[PriceController::class,'deleteImage'])->name('vendor.delete-image/{id}');
Route::post('update-image',[PriceController::class,'updateImage'])->name('vendor.update-image');
Route::get('delete-stock/{id}',[PriceController::class,'deleteStock'])->name('vendor/delete-stock/{id}');
Route::post('update-stock2',[PriceController::class,'updateStock'])->name('vendor/update-stock2');

Route::post('discount-update',[ProductController::class,'discountUp'])->name('vendor.discount-update');

//route for colors store and size 

Route::post('update-color',[PriceController::class,'updateColor'])->name('vendor.update-color');
Route::post('add-color',[PriceController::class,'addColor'])->name('admin.add-color');
Route::post('add-size',[PriceController::class,'addSize'])->name('admin.add-size');
Route::post('update-size',[PriceController::class,'updateSize'])->name('vendor.update-size');
Route::post('add-store',[PriceController::class,'addStore'])->name('admin.add-store');
Route::post('update-store',[PriceController::class,'updateStore'])->name('vendor.update-store');

Route::get('product-status',[ProductController::class,'productStatus'])->name('vendor.product-status');
Route::get('color-status',[ProductController::class,'colorStatus'])->name('vendor.color-status');
Route::get('size-status',[ProductController::class,'sizeStatus'])->name('vendor.size-status');
Route::get('brand-status',[ProductController::class,'brandStatus'])->name('vendor.brand-status');
Route::get('stock-status',[ProductController::class,'stockStatus'])->name('vendor.stock-status');
Route::get('delete-color/{id}',[PriceController::class,'deleteColor'])->name('vendor.delete-color/{id}');
Route::get('delete-size/{id}',[PriceController::class,'deleteSize'])->name('vendor.delete-size/{id}');
Route::get('delete-brand/{id}',[PriceController::class,'deleteBrand'])->name('vendor.delete-brand/{id}');

  //route for orders
Route::get('orders',[OrderController::class,'getOrder'])->name('vendor.orders');
Route::get('cancel-order/{id}',[OrderController::class,'cancelOrder'])->name('vendor.cancel-order/{id}');
Route::get('show-order/{id}',[OrderController::class,'showOrder'])->name('vendor.show-order/{id}');
Route::get('order-cat/{id}',[SubCategoryController::class,'catOrder'])->name('vendor/order-cat/{id}');
Route::get('deleted-order',[OrderController::class,'deletedOrder'])->name('vendor/deleted-order');
Route::get('restore-order/{id}',[OrderController::class,'restoreOrder'])->name('vendor/restore-order/{id}');
Route::get('delivered',[OrderController::class,'delivered'])->name('vendor.delivered');


Route::get('new-deals',[DealController::class,'index'])->name('vendor.new-deals');
Route::post('deals',[DealController::class,'create'])->name('vendor.deals');
Route::get('all-deals',[DealController::class,'show'])->name('vendor/all-deals');
Route::get('deal-detail/{id}',[DealController::class,'detail'])->name('vendor.deal-detail/{id}');
Route::post('update-deal',[DealController::class,'updateDeal'])->name('vendor/update-deal');
Route::post('add-deal-product',[DealController::class,'update'])->name('vendor/add-deal-product');
Route::get('delete-deal-product/{id}/{stock_id}',[DealController::class,'destory'])->name('vendor/delete-deal-product{id}/{stock_id}');
/*
Route::get('get/{id}',[DealController::class,'get'])->name('vendor.get/{id}');
Route::get('new-deals2/{id}',[DealController::class,'catOrder'])->name('vendor.new-deals2/{id}');


*/


//get stock and update
  
  Route::resource('supplier',SupplierController::class);



//store banner and data upload
Route::view('banner','vendor.store_banner');
Route::post('upload-banner',[StoreController::class,'upoloadBanner'])->name('vendor.upload-banner');
Route::get('get-banner',[StoreController::class,'getBanner'])->name('vendor.get-banner');

Route::get('delete-banner/{id}',[StoreController::class,'deletebanner'])->name('vendor.delete-banner/{id}');
Route::post('update-banner',[StoreController::class,'updatebanner'])->name('vendor.update-banner');

//store show to vendor
Route::get('store',[StoreController::class,'getStore'])->name('vendor.store');

Route::post('on-sale',[StoreController::class,'onSale'])->name('vendor.on-sale');
Route::post('vendor-on-sale',[StoreController::class,'vendorOnSale'])->name('vendor.vendor-on-sale');
Route::get('out-sale/{id}',[StoreController::class,'outSale'])->name('vendor.out-sale/{id}');
Route::get('vendor-out-sale/{id}',[StoreController::class,'vendorOutSale'])->name('vendor.vendor-out-sale/{id}');

//promote product route
Route::Post('sponser-product',[StockController::class,'sponserProduct2'])->name('vendor.sponser-product');

//vendor make sale route
Route::view('new-sale','vendor.vendor_make_sale');
Route::post('make-new-sale',[VendorSaleController::class,'vendorSale'])->name('vendor.make-new-sale');
Route::get('all-sale',[VendorSaleController::class,'getSale'])->name('all-sale');
Route::get('sale-delete/{id}',[VendorSaleController::class,'deleteSale'])->name('vendor/sale-delete/{id}');
Route::get('sale-status',[VendorSaleController::class,'statusSale'])->name('vendor/sale-status');
Route::post('update-vendor-sale',[VendorSaleController::class,'updateSale'])->name('vendor/update-vendor-sale');


//route for categrory from main
Route::get('product/{id}',[SubCategoryController::class,'subCategory2'])->name('admin.product/{id}');
Route::get('product2/{id}',[SubCategoryController::class,'stockDrop'])->name('vendor.product2/{id}');
Route::get('stock-cat/{id}',[SubCategoryController::class,'subCategory2'])->name('vendor/stock-cat/{id}');
Route::get('stock-drop/{id}',[SubCategoryController::class,'stockDrop'])->name('vendor/stock-drop/{id}');





//route for coupon 
Route::get('new-coupon',[CouponController::class,'index'])->name('vendor/new-coupon');
Route::post('coupon',[CouponController::class,'create'])->name('vendor/coupon');
Route::get('show-coupons',[CouponController::class,'show'])->name('vendor/show-coupons');
Route::get('delete-coupon/{id}',[CouponController::class,'destroy'])->name('vendor/delete-coupon/{id}');
Route::get('coupon-update',[CouponController::class,'update'])->name('vendor/coupon-update');
Route::get('coupon-status',[CouponController::class,'status'])->name('vendor/coupon-status');
Route::get('coupon-deletea',[CouponController::class,'delete'])->name('vendor/coupon-deletea');

  });
});


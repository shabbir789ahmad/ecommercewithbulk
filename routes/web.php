<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\panel\SliderController;
use App\Http\Controllers\panel\LogoController;
use App\Http\Controllers\panel\CategoryController;
use App\Http\Controllers\panel\MiddleCategoryController;
use App\Http\Controllers\panel\SubCategoryController;
use App\Http\Controllers\panel\BrandController;
use App\Http\Controllers\panel\CountController;
use App\Http\Controllers\panel\SizeController;
use App\Http\Controllers\panel\ColorController;
use App\Http\Controllers\panel\AdminVendorController;
use App\Http\Controllers\panel\SaleController;
use App\Http\Controllers\panel\ShippingController;




use App\Http\Controllers\CartController;
// use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\VendorSaleController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\DealController;



use App\Http\Controllers\HomeController;

Auth::routes();
Route::get('/',[HomeController::class,'index']);
Route::get('search',[HomeController::class,'search']);


// Route::get('mail',[RegisterController::class,'welcome']);


Route::view('affiliate','affiliate');
Route::view('shopping','shopping');



//all store with voucher
Route::get('/voucher',[CouponController::class,'AllStore']);
Route::get('/bcd',[UserController::class,'user']);



Route::get('product/{id}/detail',[HomeController::class,'productDetail'])->name('product.detail');

Route::get('product/{id}',[HomeController::class,'allProductBySubCategory'])->name('product/{id}');


Route::get('master',[SubCategoryController::class,'subCategory']);

Route::get('all-deals',[DealController::class,'allDeal'])->name('all-deals');



Route::get('cart',[CartController::class,'cart']);
Route::get('add-to-cart/{id}',[CartController::class,'addToCart'])->name('add-to-cart/{id}');
Route::get('send',[CartController::class,'send'])->name('send');

Route::patch('update-cart',[CartController::class,'update'])->name('update.cart');
Route::delete('remove-from-cart',[CartController::class,'remove'])->name('remove.from.cart');

Route::get('get-wishlist',[CartController::class,'getwishlist']);
Route::get('wishlist/{id}',[CartController::class,'wishlist']);
Route::patch('update-wishlist',[CartController::class,'updateWishlist'])->name('update.wishlist');
Route::delete('remove-from-wish',[CartController::class,'removeWish'])->name('remove.from.wish');





Route::get('visit/store/{id}',[StoreController::class,'showStore'])->name('visit.store');

Route::view('about','about_us');

// user contact to admin by message
Route::view('contact','contact_us');
Route::resource('contact',ContactController::class);

 Route::view('mail','mail.order_mail');
 Route::view('bcd','bcd');

 Route::view('checkout','checkout');
 Route::post('review',[ReviewController::class,'review']);
 Route::post('check-coupon',[CouponController::class,'checkCoupon']);
 Route::post('save-token',[CouponController::class,'saveCoupon']);
 Route::post('follow-this',[FollowController::class,'follow']);
 Route::post('unfollow-this',[FollowController::class,'unfollow']);
 

//global ajax route to
// get category amiddle and sub category
Route::get('/middl/category/ajax',[MiddleCategoryController::class,'middleCategory']);
Route::get('/sub/category/ajax',[SubCategoryController::class,'subCategory']);




//user route
Route::group(['middleware'=>'auth'],function(){

 Route::view('order-track','User.order_tracking');
 Route::get('user_dashborad',[Usercontroller::class,'order']);
 Route::get('order-track/{id}',[Usercontroller::class,'track']);
 Route::post('chechout2',[OrderController::class,'order']);
 Route::view('account','User.account');
 Route::get('login-and-securty',[UserController::class,'userDetail']);
 Route::post('update-user',[UserController::class,'updateUser']);
Route::get('user_profile',[UserController::class,'userprofile']);
// Route::post('cover-image',[UserController::class,'coverImage']);
 Route::view('user_message','User.user_message');
 //about route user
 // Route::post('about-user',[UserController::class,'aboutUser']);
});





//Route for admin works

Route::group(['prefix'=>'admin'],function(){
 Route::group(['middleware'=>'admin.guest'],function(){

Route::view('login','admin.admin_login')->name('admin.login');
Route::post('login',[AdminController::class,'adminLogin'])->name('admin.login');

 });

Route::group(['middleware'=>'admin.auth'],function(){

Route::post('logout',[AdminController::class,'logout'])->name('admin.logout');

Route::view('dashboard','Dashboard.admin')->name('admin.dashboard');
Route::get('dashboard',[CountController::class,'count2'])->name('admin.dashboard');


Route::resource('slider',SliderController::class);
// size route 
Route::resource('size',SizeController::class);
//color route
Route::resource('color',ColorController::class);

Route::get('search-product',[StockController::class,'searchStock'])->name('admin/search-product');
// Route::view('test','Dashboard.test')->name('admin.test');

// Route::post('status-up',[OrderController::class,'statusUp'])->name('admin.status-up');


//route for category
Route::resource('category',CategoryController::class);
Route::resource('middlecategory',MiddleCategoryController::class);

//sub cat 
Route::resource('sub',SubCategoryController::class);

//route for brand upload, update and delete
Route::resource('brand',BrandController::class);

//route for logo upload
Route::resource('logo',LogoController::class);
Route::resource('shipping',ShippingController::class);

//route for logo upload
Route::resource('sale',SaleController::class);

Route::get('sale-status',[SellController::class,'Status'])->name('admin.sale-status');






 Route::get('all/vendor',[AdminVendorController::class,'vendor'])->name('all.vendor');
Route::delete('delete/vendor/{id}',[AdminVendorController::class,'destroy'])->name('delete.vendor');
Route::get('block/vendor',[AdminVendorController::class,'blockvendor'])->name('block.vendor');



Route::get('restore-vendor/{id}',[UserController::class,'restorevendor'])->name('admin/restore-vendor/{id}');
Route::get('vendor-status',[UserController::class,'vendorStatus'])->name('admin/vendor-status');


//all user Route
Route::get('show-user',[UserController::class,'getUser'])->name('admin/show-user');
Route::get('delete-user/{id}',[UserController::class,'deleteuser'])->name('admin/delete-user/{id}');
Route::get('restore-user/{id}',[UserController::class,'restoreuser'])->name('admin/restore-user/{id}');
Route::get('block-user',[UserController::class,'blockuser'])->name('admin/block-user');
Route::get('user-status',[UserController::class,'userStatus'])->name('admin/user-status');
});

});
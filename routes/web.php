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
use App\Http\Controllers\panel\StateController;




use App\Http\Controllers\CartController;
// use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;

use App\Http\Controllers\MainController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\VendorSaleController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\WishController;


use App\Http\Controllers\user\CoverPhotoController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\OrderController;


use App\Http\Controllers\HomeController;

Auth::routes();
Route::get('/',[HomeController::class,'index']);
Route::get('search',[HomeController::class,'search']);
Route::get('product/{id}/detail',[HomeController::class,'productDetail'])->name('product.detail');

Route::get('product/{id}',[HomeController::class,'allProductBySubCategory'])->name('product.by.subcategory');

Route::get('all/product',[HomeController::class,'allProduct'])->name('all.product');


// Route::get('mail',[RegisterController::class,'welcome']);


Route::view('order_email','mail.order_mail');
Route::view('affiliate','affiliate');
Route::view('shopping','shopping')->name('shopping');



//all store with voucher
// Route::get('/voucher',[CouponController::class,'AllStore']);




// Route::get('master',[SubCategoryController::class,'subCategory']);

// Route::get('all-deals',[DealController::class,'allDeal'])->name('all-deals');


//cart route
Route::get('cart',[CartController::class,'cart']);
Route::get('add-to-cart/{id}',[CartController::class,'addToCart'])->name('add-to-cart/{id}');
// Route::get('send',[CartController::class,'send'])->name('send');
Route::patch('update-cart',[CartController::class,'update'])->name('update.cart');
Route::delete('remove-from-cart',[CartController::class,'remove'])->name('remove.from.cart');


//wishlist crud route
Route::resource('wishlist',WishController::class);



Route::get('visit/store/{id}',[StoreController::class,'showStore'])->name('visit.store');

//about use Page route
Route::view('about','about_us');

// user contact to admin by message
Route::resource('contact',ContactController::class);

//checkout view
 // Route::view('checkout','checkout')->name('checkout');

 //review route
 Route::post('review',[ReviewController::class,'review']);


//global ajax route to
// get category middle and sub category
Route::get('/middl/category/ajax',[MiddleCategoryController::class,'middleCategory']);
Route::get('/sub/category/ajax',[SubCategoryController::class,'subCategory']);




//user route
Route::group(['middleware'=>'auth'],function(){

Route::resource('user',Usercontroller::class);



 Route::get('checkout',[OrderController::class,'index'])->name('checkout');
 Route::post('user/order',[OrderController::class,'order'])->name('user.order');

 Route::view('order-track','User.order_tracking');
 Route::get('user_dashborad',[OrderController::class,'userOrder']);
 Route::get('order-track/{id}',[OrderController::class,'track']);



Route::resource('cover',CoverPhotoController::class);

Route::view('user_message','User.user_message');
 

 //about route user

  Route::patch('/update/phone',[UserController::class,'phoneUpdate']);
  Route::patch('/update/email',[UserController::class,'emailUpdate']);
  Route::post('/update/address',[UserController::class,'addressUpdate']);
  Route::get('/states',[StateController::class,'states']);
  Route::get('/cities',[ShippingController::class,'cities']);
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

// Route::get('search-product',[StockController::class,'searchStock'])->name('admin/search-product');
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

//route for state upload
Route::resource('state',StateController::class);

// Route::get('sale-status',[SellController::class,'Status'])->name('admin.sale-status');






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
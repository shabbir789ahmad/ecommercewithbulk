<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\panel\LogoController;
use App\Http\Controllers\panel\CategoryController;
use App\Http\Controllers\panel\MiddleCategoryController;
use App\Http\Controllers\panel\SubCategoryController;
use App\Http\Controllers\panel\BrandController;
use App\Http\Controllers\panel\CountController;




use App\Http\Controllers\ProductController;
use App\Http\Controllers\SingleProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PriceController;
// use App\Http\Controllers\BrandController;
use App\Http\Controllers\SocialController;
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


Route::get('/', function () {
    return view('home');
});
Auth::routes();
Route::get('mail',[RegisterController::class,'welcome']);


Route::view('affiliate','affiliate');
Route::view('shopping','shopping');



//all store with voucher
Route::get('/voucher',[CouponController::class,'AllStore']);
Route::get('/bcd',[UserController::class,'user']);

Route::get('/',[HomeController::class,'index']);
Route::get('search',[HomeController::class,'search']);
// Route::get('productpage/{id}/{drop_id}',[ProductController::class,'productDetail'])->name('productpage/{id}/{drop_id}');
Route::get('product/{id}/detail',[HomeController::class,'productDetail'])->name('product.detail');

Route::get('master',[SubCategoryController::class,'subCategory']);


Route::get('all-product-sale',[ProductController::class,'SaleProduct'])->name('all-product-sale');
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

Route::view('product','product');
Route::get('product/{id}',[ProductController::class,'allproduct'])->name('product/{id}');


Route::get('store/{id}',[StoreController::class,'showStore'])->name('store');
Route::view('about','about_us');
Route::view('contact','contact_us');
Route::post('contact2',[ContactController::class,'contact'])->name('contact2');

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
Route::post('cover-image',[UserController::class,'coverImage']);
 Route::view('user_message','User.user_message');
 //about route user
 Route::post('about-user',[UserController::class,'aboutUser']);
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


//main category route
// Route::view('main','Dashboard.main_upload')->name('admin.main');
// Route::post('main',[MainController::class,'uploadMain'])->name('admin.main');

// Route::get('get-main',[MainController::class,'getMain'])->name('admin.get-main');
// Route::get('delete-main/{id}',[MainController::class,'deleteMain'])->name('admin.delete-main/{id}');
// Route::get('update-main/{id}',[MainController::class,'updateMain'])->name('admin.update-main/{id}');
// Route::post('update-main2',[MainController::class,'updateMain2'])->name('admin.update-main2');


Route::get('search-product',[StockController::class,'searchStock'])->name('admin/search-product');
Route::view('test','Dashboard.test')->name('admin.test');
Route::get('delete-product/{id}',[ProductController::class,'deleteProduct'])->name('admin.delete-product/{id}');
Route::post('status-up',[OrderController::class,'statusUp'])->name('admin.status-up');


//route for category
Route::resource('category',CategoryController::class);
Route::resource('middlecategory',MiddleCategoryController::class);

//sub cat 
Route::resource('sub',SubCategoryController::class);

//route for brand upload, update and delete
Route::resource('brand',BrandController::class);





//route for social link upload
// Route::view('social-link','Dashboard.social_link_upload')->name('admin.social-link');
// Route::post('upload-social-link',[SocialController::class,'uploadLink'])->name('admin.upload-social-link');
// Route::get('show-link',[SocialController::class,'showlink'])->name('admin.show-link');
// Route::get('delete-link/{id}',[SocialController::class,'deletelink'])->name('admin.delete-link/{id}');
// Route::get('update-link/{id}',[SocialController::class,'updatelink'])->name('admin.update-link/{id}');
// Route::post('update-social-link',[SocialController::class,'updateLink2'])->name('admin.update-social-link');

//route for logo upload
Route::resource('logo',LogoController::class);


//route for search
Route::view('sell','Dashboard.make_sell');
Route::post('make-sell',[SellController::class,'Sell'])->name('admin.make-sell');
Route::get('show-sale',[SellController::class,'showSale'])->name('admin.show-sale');
Route::get('delete-sale/{id}',[SellController::class,'deleteSale'])->name('admin.delete-sale/{id}');
Route::post('update-sale',[SellController::class,'updateSale'])->name('admin.update-sale');
Route::get('sale-status',[SellController::class,'saleStatus'])->name('admin.sale-status');
Route::get('search-sale',[SellController::class,'searchSale'])->name('admin.search-sale');


//route for search


//route for color upload
Route::get('categories',[SocialController::class,'getCat'])->name('admin.categories');
Route::post('front',[SocialController::class,'front'])->name('admin.front');
Route::get('get-front',[SocialController::class,'showfront'])->name('admin.get-front');
Route::get('delete-front/{id}',[SocialController::class,'deleteFront'])->name('admin.delete-front/{id}');
Route::get('update-front/{id}',[SocialController::class,'updateFront'])->name('admin.update-front/{id}');
Route::post('update-front2',[SocialController::class,'updateFront2'])->name('admin.update-front');
//all vendor s route
Route::get('show-vendor',[UserController::class,'getvendor'])->name('admin/show-vendor');
Route::get('block-vendor',[UserController::class,'blockvendor'])->name('admin/block-vendor');
Route::get('delete-vendor/{id}',[UserController::class,'deletevendor'])->name('admin/delete-vendor/{id}');
Route::get('restore-vendor/{id}',[UserController::class,'restorevendor'])->name('admin/restore-vendor/{id}');
Route::get('vendor-status',[UserController::class,'vendorStatus'])->name('admin/vendor-status');

Route::get('vendor-product/{id}',[StockController::class,'adminProduct'])->name('admin.vendor-product/{id}');
Route::get('sponser-status',[StockController::class,'sponserStatus'])->name('admin.sponser-status');
Route::get('cancel-stock/{id}',[PriceController::class,'deletedStock'])->name('admin/cancel-stock/{id}');

//all user Route
Route::get('show-user',[UserController::class,'getUser'])->name('admin/show-user');
Route::get('delete-user/{id}',[UserController::class,'deleteuser'])->name('admin/delete-user/{id}');
Route::get('restore-user/{id}',[UserController::class,'restoreuser'])->name('admin/restore-user/{id}');
Route::get('block-user',[UserController::class,'blockuser'])->name('admin/block-user');
Route::get('user-status',[UserController::class,'userStatus'])->name('admin/user-status');
});
});
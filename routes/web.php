<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SingleProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\CountController;
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


Route::get('/', function () {
    return view('home');
});
Auth::routes();
Route::view('affiliate','affiliate');

Route::get('/',[SliderController::class,'women']);
Route::get('search',[SliderController::class,'search']);

Route::get('master',[SubCategoryController::class,'subCategory']);

Route::get('productpage/{id}/{drop_id}',[ProductController::class,'productDetail'])->name('productpage/{id}/{drop_id}');
Route::get('all-product-sale',[ProductController::class,'SaleProduct'])->name('all-product-sale');


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







//user route
Route::group(['middleware'=>'auth'],function(){

 Route::view('order-track','User.order_tracking');
 Route::get('user_dashborad',[Usercontroller::class,'order']);
 Route::get('order-track/{id}',[Usercontroller::class,'track']);
 Route::post('chechout2',[OrderController::class,'order']);
});


//route for vendor

Route::group(['prefix'=>'vendor'],function(){
 Route::group(['middleware'=>'vendor.guest'],function(){

Route::view('login','admin.vendor_login')->name('vendor.login');
Route::post('login',[VendorController::class,'Signin'])->name('vendor.login');

Route::view('register','admin.vendor_signin')->name('vendor.register');
Route::post('register2',[VendorController::class,'vendorSign'])->name('vendor.register2');

 });


Route::group(['middleware'=>'vendor.auth'],function(){
 
  Route::post('logout',[VendorController::class,'logout'])->name('vendor.logout');

Route::get('dashboard',[CountController::class,'count'])->name('vendor.dashboard');

  Route::get('add-stock',[StockController::class,'getSupplier'])->name('vendor/add-stock');
   Route::get('add-stock-bulk',[StockController::class,'getSupplier2'])->name('vendor/add-stock-bulk');
  Route::post('new-stock',[StockController::class,'newStock'])->name('vendor.new-stock');
Route::post('bulk-stock',[StockController::class,'bulkStock'])->name('vendor.bulk-stock');
Route::get('stock-show',[StockController::class,'getStock'])->name('vendor.stock-show');

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


//route for brand upload, update and delete

Route::view('brand','vendor.brand_upload')->name('vendor.brand');
Route::post('upload-brand',[BrandController::class,'uploadBrand'])->name('vendor.upload-brand');
Route::get('get-brand',[BrandController::class,'getBrand'])->name('vendor.get-brand');
Route::get('delete-brand/{id}',[BrandController::class,'deleteBrand'])->name('vendor.delete-brand/{id}');
Route::get('update-brand/{id}',[BrandController::class,'updateBrand'])->name('vendor.update-brand/{id}');
Route::post('update-brand2',[BrandController::class,'updateBrand2'])->name('vendor.update-brand2');

//get stock and update
Route::view('add-supplier','vendor.supplier_add');
Route::post('add-supplier',[StockController::class,'Add'])->name('vendor.add-supplier');
Route::get('show-supplier',[StockController::class,'showSupplier'])->name('vendor/show-supplier');
Route::get('delete-supplier/{id}',[StockController::class,'deleteSupplier'])->name('vendor/delete-supplier/{id}');


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



Route::view('slider','Dashboard.upload_slider')->name('admin.slider');
Route::post('slider',[SliderController::class,'uploadSlider'])->name('admin.slider');
Route::get('slider',[CategoryController::class,'getSlider'])->name('admin.slider');
Route::get('get-slider',[SliderController::class,'getSlider'])->name('admin.get-slider');
Route::get('delete-slider/{id}',[SliderController::class,'deleteSlider'])->name('admin.delete-slider/{id}');
Route::get('update-slider/{id}',[SliderController::class,'updateSlider'])->name('admin.update-slider/{id}');
Route::post('update-slider',[SliderController::class,'updateSlider2'])->name('admin.update-slider');

//main category route
Route::view('main','Dashboard.main_upload')->name('admin.main');
Route::post('main',[MainController::class,'uploadMain'])->name('admin.main');

Route::get('get-main',[MainController::class,'getMain'])->name('admin.get-main');
Route::get('delete-main/{id}',[MainController::class,'deleteMain'])->name('admin.delete-main/{id}');
Route::get('update-main/{id}',[MainController::class,'updateMain'])->name('admin.update-main/{id}');
Route::post('update-main2',[MainController::class,'updateMain2'])->name('admin.update-main2');


//route for product


Route::get('product/{id}',[ProductController::class,
    'subCategory2'])->name('admin.product/{id}');
Route::get('product2/{id}',[ProductController::class,
    'dropCat'])->name('admin.product2/{id}');






Route::get('stock-cat/{id}',[SubCategoryController::class,'subCategory2'])->name('admin/stock-cat/{id}');

Route::get('stock-drop/{id}',[SubCategoryController::class,'stockDrop'])->name('admin/stock-drop/{id}');
Route::get('search-product',[StockController::class,'searchStock'])->name('admin/search-product');




Route::view('test','Dashboard.test')->name('admin.test');
Route::get('delete-product/{id}',[ProductController::class,'deleteProduct'])->name('admin.delete-product/{id}');





Route::post('status-up',[OrderController::class,'statusUp'])->name('admin.status-up');


//route for category
Route::view('get-cat','Dashboard.category_uploads')->name('admin.get-cat');
Route::get('get-cat',[CategoryController::class,'getCat'])->name('admin.get-cat');
Route::post('upload-category',[CategoryController::class,'uploadCat'])->name('admin.upload-category');

Route::get('show-category',[CategoryController::class,'showCat'])->name('admin.show-category');
Route::get('delete-category/{id}',[CategoryController::class,'deleteCat'])->name('admin.delete-category/{id}');
Route::get('get-category/{id}',[CategoryController::class,'getCategory2'])->name('admin.get-category/{id}');
Route::post('update-category',[CategoryController::class,'updateCat'])->name('admin.update-category');


Route::view('get-sub-category','Dashboard.subcategory_uploads')->name('admin.get-sub-category');

Route::get('get-sub-category',[SubCategoryController::class,'subCategory'])->name('admin.get-sub-category');

Route::get('get-sub-category/{id}',[SubCategoryController::class,
    'subCategory2'])->name('admin.get-sub-category/{id}');
Route::post('upload-sub-category',[SubCategoryController::class,
    'uploadSubCategory'])->name('admin.upload-sub-category');

Route::get('show-sub-category',[SubCategoryController::class,'showSubCategory'])->name('admin.show-sub-category');

Route::get('delete-sub-category/{id}',[SubCategoryController::class,'deleteSubCategory'])->name('admin.delete-sub-category/{id}');
Route::get('update-sub-category/{id}',[SubCategoryController::class,'updateSubCategory'])->name('admin.update-sub-category/{id}');
Route::post('update2-sub-category',[SubCategoryController::class,'updateSubCategory2'])->name('admin.update2-sub-category');




//route for social link upload
Route::view('social-link','Dashboard.social_link_upload')->name('admin.social-link');
Route::post('upload-social-link',[SocialController::class,'uploadLink'])->name('admin.upload-social-link');
Route::get('show-link',[SocialController::class,'showlink'])->name('admin.show-link');
Route::get('delete-link/{id}',[SocialController::class,'deletelink'])->name('admin.delete-link/{id}');
Route::get('update-link/{id}',[SocialController::class,'updatelink'])->name('admin.update-link/{id}');
Route::post('update-social-link',[SocialController::class,'updateLink2'])->name('admin.update-social-link');

//route for logo upload
Route::view('logo','Dashboard.logo_upload')->name('admin.logo');
Route::post('upload-logo',[SliderController::class,'Logo'])->name('admin.upload-logo');

Route::get('get-logo',[SliderController::class,'getLogo'])->name('admin.get-logo');

Route::get('delete-logo/{id}',[SliderController::class,'deleteLogo'])->name('admin.delete-logo/{id}');

Route::get('update-logo/{id}',[SliderController::class,'updateLogo'])->name('admin.update-logo/{id}');

Route::post('update-logo2',[SliderController::class,'updateLogo2'])->name('admin.update-logo2');


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
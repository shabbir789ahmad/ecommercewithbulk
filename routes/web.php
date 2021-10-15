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
use App\Http\Controllers\DropdownController;


Route::get('/', function () {
    return view('home');
});
Auth::routes();
Route::get('/',[SliderController::class,'women']);
Route::get('search',[SliderController::class,'search']);

Route::get('master',[SubCategoryController::class,'subCategory']);

Route::get('productpage/{id}/{drop_id}',[ProductController::class,'productDetail'])->name('productpage/{id}/{drop_id}');


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

Route::view('about','about_us');
Route::view('contact','contact_us');
Route::post('contact2',[ContactController::class,'contact'])->name('contact2');

Route::view('mail','mail.order_mail');
Route::view('bcd','bcd');

Route::get('checkout',[OrderController::class,'check']);
 Route::post('review',[ReviewController::class,'review']);

Route::group(['middleware'=>'auth'],function(){

 
 Route::view('order-track','User.order_tracking');
 Route::get('user_dashborad',[Usercontroller::class,'order']);
 Route::get('order-track/{id}',[Usercontroller::class,'track']);
 Route::post('chechout2',[OrderController::class,'order']);
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
Route::get('dashboard',[CountController::class,'count'])->name('admin.dashboard');


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



//get stock and update
Route::view('add-supplier','Dashboard.supplier_add');
Route::post('add-supplier',[StockController::class,'Add'])->name('admin.add-supplier');
Route::get('show-supplier',[StockController::class,'showSupplier'])->name('admin/show-supplier');
Route::get('delete-supplier/{id}',[StockController::class,'deleteSupplier'])->name('admin/delete-supplier/{id}');


Route::get('add-stock',[StockController::class,'getSupplier'])->name('admin/add-stock');
Route::get('add-stock-bulk',[StockController::class,'getSupplier2'])->name('admin/add-stock-bulk');
Route::post('new-stock',[StockController::class,'newStock'])->name('admin.new-stock');
Route::post('bulk-stock',[StockController::class,'bulkStock'])->name('admin.bulk-stock');
Route::post('upate-price',[StockController::class,'updateSell'])->name('admin.upate-price');
Route::post('upate-discount',[StockController::class,'updateDiscount'])->name('admin.upate-discount');
Route::post('upate-stock',[StockController::class,'updateStock'])->name('admin.upate-stock');
Route::post('update-stock-detail',[StockController::class,'updateDetail'])->name('admin.update-stock-detail');
Route::get('stock-show',[StockController::class,'getStock'])->name('admin.stock-show');
Route::get('stock-detail/{id}',[StockController::class,'stockDetail'])->name('admin/stock-detail/{id}');
Route::get('cancel-stock/{id}',[PriceController::class,'deletedStock'])->name('admin/cancel-stock/{id}');

Route::get('delete-stock/{id}',[PriceController::class,'deleteStock'])->name('admin/delete-stock/{id}');
Route::post('update-stock2',[PriceController::class,'updateStock'])->name('admin/update-stock2');

Route::post('discount-update',[ProductController::class,'discountUp'])->name('admin.discount-update');



Route::get('stock-cat/{id}',[SubCategoryController::class,'subCategory2'])->name('admin/stock-cat/{id}');

Route::get('stock-drop/{id}',[SubCategoryController::class,'stockDrop'])->name('admin/stock-drop/{id}');
Route::get('search-product',[StockController::class,'searchStock'])->name('admin/search-product');




Route::view('test','Dashboard.test')->name('admin.test');
Route::get('delete-product/{id}',[ProductController::class,'deleteProduct'])->name('admin.delete-product/{id}');


Route::get('product-status',[ProductController::class,'productStatus'])->name('admin.product-status');
Route::get('color-status',[ProductController::class,'colorStatus'])->name('admin.color-status');
Route::get('size-status',[ProductController::class,'sizeStatus'])->name('admin.size-status');
Route::get('brand-status',[ProductController::class,'brandStatus'])->name('admin.brand-status');
Route::get('stock-status',[ProductController::class,'stockStatus'])->name('admin.stock-status');
Route::get('delete-color/{id}',[PriceController::class,'deleteColor'])->name('admin.delete-color/{id}');
Route::get('delete-size/{id}',[PriceController::class,'deleteSize'])->name('admin.delete-size/{id}');
Route::get('delete-brand/{id}',[PriceController::class,'deleteBrand'])->name('admin.delete-brand/{id}');
//route for orders
Route::get('orders',[OrderController::class,'getOrder'])->name('admin.orders');
Route::get('cancel-order/{id}',[OrderController::class,'cancelOrder'])->name('admin.cancel-order/{id}');
Route::get('show-order/{id}',[OrderController::class,'showOrder'])->name('admin.show-order/{id}');
Route::get('order-cat/{id}',[SubCategoryController::class,'catOrder'])->name('admin/order-cat/{id}');
Route::get('deleted-order',[OrderController::class,'deletedOrder'])->name('admin/deleted-order');
Route::get('restore-order/{id}',[OrderController::class,'restoreOrder'])->name('admin/restore-order/{id}');

Route::post('status-up',[OrderController::class,'statusUp'])->name('admin.status-up');
Route::get('delivered',[OrderController::class,'delivered'])->name('admin.delivered');

  


//route for update filter
Route::post('update-store',[PriceController::class,'updateStore'])->name('admin.update-store');
Route::post('update-size',[PriceController::class,'updateSize'])->name('admin.update-size');
Route::post('update-color',[PriceController::class,'updateColor'])->name('admin.update-color');
Route::get('delete-image/{id}',[PriceController::class,'deleteImage'])->name('admin.delete-image/{id}');
Route::post('update-image',[PriceController::class,'updateImage'])->name('admin.update-image');


Route::post('add-color',[PriceController::class,'addColor'])->name('admin.add-color');
Route::post('add-size',[PriceController::class,'addSize'])->name('admin.add-size');
Route::post('add-store',[PriceController::class,'addStore'])->name('admin.add-store');
//route for colors



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

//route for brand upload, update and delete

Route::view('brand','Dashboard.brand_upload')->name('admin.brand');
Route::post('upload-brand',[BrandController::class,'uploadBrand'])->name('admin.upload-brand');
Route::get('get-brand',[BrandController::class,'getBrand'])->name('admin.get-brand');
Route::get('delete-brand/{id}',[BrandController::class,'deleteBrand'])->name('admin.delete-brand/{id}');
Route::get('update-brand/{id}',[BrandController::class,'updateBrand'])->name('admin.update-brand/{id}');
Route::post('update-brand2',[BrandController::class,'updateBrand2'])->name('admin.update-brand2');


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


//route for color upload
Route::get('categories',[SocialController::class,'getCat'])->name('admin.categories');
Route::post('front',[SocialController::class,'front'])->name('admin.front');
Route::get('get-front',[SocialController::class,'showfront'])->name('admin.get-front');
Route::get('delete-front/{id}',[SocialController::class,'deleteFront'])->name('admin.delete-front/{id}');
Route::get('update-front/{id}',[SocialController::class,'updateFront'])->name('admin.update-front/{id}');
Route::post('update-front2',[SocialController::class,'updateFront2'])->name('admin.update-front');

});
});
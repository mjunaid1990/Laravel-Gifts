<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Admin\ScrapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::controller(CartController::class)->group(function(){
    Route::get('/carts', 'carts')->name('clientCarts');
    Route::post('/add-to-cart', 'addToCart')->name('clientAddToCart');
    Route::post('/update-cart', 'updateCart')->name('clientUpdateCart');
    Route::post('/delete-cart', 'deleteCart')->name('clientDeleteCart');
    Route::get('/show-minicart', 'showCart');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    // Shop
    Route::controller(ShopController::class)->group(function() {
        Route::post('/shop/create', 'create')->name('shopCreate');
        Route::get('/shop/detail', 'detail')->name('shopDetail');
        Route::post('/shop/update', 'update')->name('shopUpdate');
        Route::post('/shop/update-password', 'updatePassword')->name('shopUpdatePassword');
    });

    // Category
    Route::controller(CategoryController::class)->group(function() {
        Route::get('/admin/category', 'index')->name('category');
        Route::get('/admin/category/create', 'create')->name('categoryCreate');
        Route::post('/admin/category/check', 'check')->name('categoryCheck');
        Route::post('/admin/category/save', 'save')->name('categorySave');
        Route::get('/admin/category/edit/{product}', 'edit')->name('categoryEdit');
        Route::get('/admin/category/move-up/{id}', 'move_up');
        Route::get('/admin/category/move-down/{id}', 'move_down');
        Route::post('/admin/category/edit/{category}/{id}/save', 'editSave')->name('categoryEditSave');
        Route::get('/admin/category/delete/{id}', 'delete')->name('categoryDelete');
        Route::post('/admin/category/delete-all', 'delete_all');
    });
    
    Route::controller(MenuCategoryController::class)->group(function() {
        Route::get('/admin/menucategory', 'index')->name('menucategory');
        Route::get('/admin/menucategory/create', 'create')->name('menucategoryCreate');
        Route::post('/admin/menucategory/check', 'check')->name('menucategoryCheck');
        Route::post('/admin/menucategory/save', 'save')->name('menucategorySave');
        Route::get('/admin/menucategory/edit/{product}', 'edit')->name('menucategoryEdit');
        Route::get('/admin/menucategory/move-up/{id}', 'move_up');
        Route::get('/admin/menucategory/move-down/{id}', 'move_down');
        Route::post('/admin/menucategory/edit/{category}/{id}/save', 'editSave')->name('menucategoryEditSave');
        Route::get('/admin/menucategory/delete/{id}', 'delete')->name('menucategoryDelete');
        Route::post('/admin/menucategory/delete-all', 'delete_all');
    });
    

    // Product
    Route::controller(ProductController::class)->group(function() {
        Route::get('/admin/products', 'index')->name('products');
        Route::get('/admin/product/create', 'create')->name('productCreate');
        Route::post('/admin/product/check', 'check')->name('productCheck');
        Route::post('/admin/product/save', 'save')->name('producSave');
        Route::post('/admin/product/images/', 'getImages')->name('productGetImages');
        Route::get('/admin/product/images/{product}', 'addImages')->name('productAddImages');
        Route::post('/admin/product/images/save', 'addImagesSave')->name('productAddImagesSave');
        Route::post('/admin/product/images/delete', 'deleteImages')->name('productDeleteImages');
        Route::get('/admin/product/view/category/{id}', 'product_view')->name('productViewCategory');
        Route::get('/admin/product/edit/{product}', 'edit')->name('productEdit');
        Route::post('/admin/product/edit/{product}/{id}/save', 'editSave')->name('productEditSave');
        
        Route::get('/admin/product/copy/{product}', 'copy')->name('productCopy');
        Route::post('/admin/product/copy/{product}/{id}/save', 'copySave')->name('productCopySave');
        
        Route::get('/admin/product/multipleedit', 'edit_multiple')->name('productEditMultiple');
        Route::post('/admin/product/multiplesave/{category}', 'save_mulitple')->name('productEditMultipleSave');
        
        Route::get('/admin/product/delete/{id}', 'delete')->name('productDelete');
        Route::get('/admin/product/move-up/{id}', 'move_up');
        Route::get('/admin/product/move-down/{id}', 'move_down');
        Route::post('/admin/product/delete-all', 'delete_all');
    });

    // Orders
    Route::controller(OrderController::class)->group(function() {
        Route::get('/admin/orders', 'index')->name('orders');
        Route::get('/admin/order/{order_code}', 'detail')->name('orderDetail');
        Route::post('/admin/order/update-status/{order_code}', 'updateStatus')->name('orderUpdateStatus');
        Route::get('/admin/order/delete/{order_code}', 'delete')->name('orderDelete');
    });
    
    Route::controller(ScrapController::class)->group(function() {
        Route::get('/admin/scrap', 'index')->name('scapping');
        Route::post('/admin/scrap', 'index')->name('scapping-start');
    });
    
});


// Client

Route::controller(ClientController::class)->group(function(){
    Route::get('/', 'index')->name('clientHome');
    Route::get('/checkout/payment-rejected', 'checkout_message');
    Route::get('/{country}/{category}', 'categoryProducts');
    Route::get('/{country}/{category}/{product}', 'productDetail');
//    Route::get('/products', 'products')->name('clientProducts');
//    Route::get('/products-search', 'searchProduct')->name('clientProductSearch');
//    Route::get('/category', 'category')->name('clientCategory');
//    Route::get('/category/{category}', 'categoryProducts')->name('clientCategoryProducts');
//    Route::get('/product/{product}', 'productDetail')->name('clientProductDetail');
//    Route::get('/product/{product}', 'productDetail')->name('clientProductDetail');

    Route::get('/checkout', 'checkout')->name('clientCheckout');
    Route::post('/checkout-save', 'checkoutSave')->name('clientCheckoutSave');
    
    Route::get('/success/{order_code}', 'successOrder')->name('clientOrderCode');
    Route::get('/check-order', 'checkOrder')->name('clientCheckOrder');
    Route::post('/check-order-status', 'checkOrderStatus')->name('clientCheckOrderStatus');
    Route::get('/about', 'about')->name('clientAbout');
    Route::get('/privacy-policy', 'privacy');
    Route::get('/terms-and-conditions', 'terms');
    Route::get('/contact-us', 'contact');
    Route::post('/reset-password', 'reset_password')->name('clientResetPassword');
    Route::get('/reset-message', 'reset_message');
});
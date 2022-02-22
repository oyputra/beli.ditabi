<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/aboutus', function () {
//     return view('aboutus');
// });

Auth::routes();

// role admin
Route::group(['middleware' => ['auth','admin']], function() {    
    // dashboard
    Route::get('/db-admin', [App\Http\Controllers\DashboardAdminController::class, 'index'])->name('db-admin.index');
    
    // dashboard - profil
    Route::get('/db-admin/avatar', [App\Http\Controllers\DashboardAdminController::class, 'avatar'])->name('db-admin.avatar');
    Route::put('/db-admin/updateavatar', [App\Http\Controllers\UserController::class, 'updateavatar'])->name('db-admin.updateavatar');
    Route::delete('/db-admin/deleteavatar', [App\Http\Controllers\UserController::class, 'destroyavatar'])->name('db-admin.destroyavatar');
    Route::get('/db-admin/detail', [App\Http\Controllers\UserController::class, 'detail'])->name('db-admin.detail');
    Route::get('/db-admin/changedetail', [App\Http\Controllers\UserController::class, 'changedetail'])->name('db-admin.changedetail');
    Route::put('/db-admin/updatedetail', [App\Http\Controllers\UserController::class, 'updatedetail'])->name('db-admin.updatedetail');
    Route::get('/db-admin/changepassword', [App\Http\Controllers\DashboardAdminController::class, 'changepassword'])->name('db-admin.changepassword');
    Route::put('/db-admin/updatepassword', [App\Http\Controllers\UserController::class, 'updatepassword'])->name('db-admin.updatepassword');
    
    // dashboard - products
    Route::get('/db-admin/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('db-admin.category');
    Route::get('/db-admin/addcategory', [App\Http\Controllers\CategoryController::class, 'create'])->name('db-admin.addcategory');
    Route::post('/db-admin/storecategory', [App\Http\Controllers\CategoryController::class, 'store'])->name('db-admin.storecategory');
    Route::get('/db-admin/{id}/changecategory', [App\Http\Controllers\CategoryController::class, 'edit'])->name('db-admin.changecategory');
    Route::put('/db-admin/{id}/updatecategory', [App\Http\Controllers\CategoryController::class, 'update'])->name('db-admin.updatecategory');
    Route::delete('/db-admin/{id}/deletecategory', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('db-admin.destroycategory');

    Route::get('/db-admin/shop', [App\Http\Controllers\ProductController::class, 'index'])->name('db-admin.shop');  
    Route::get('/db-admin/addproduct', [App\Http\Controllers\ProductController::class, 'create'])->name('db-admin.addproduct');
    Route::post('/db-admin/storeproduct', [App\Http\Controllers\ProductController::class, 'store'])->name('db-admin.storeproduct');
    Route::get('/db-admin/{id}/changeproduct', [App\Http\Controllers\ProductController::class, 'edit'])->name('db-admin.changeproduct');
    Route::put('/db-admin/{id}/updateproduct', [App\Http\Controllers\ProductController::class, 'update'])->name('db-admin.updateproduct');
    Route::delete('/db-admin/{id}/deleteproduct', [App\Http\Controllers\ProductController::class, 'destroy'])->name('db-admin.destroyproduct');
    
    // dashboard - purchase
    Route::get('/db-admin/{id}/showorder', [App\Http\Controllers\DashboardAdminController::class, 'showorder'])->name('db-admin.showorder');
    Route::get('/db-admin/unpaid', [App\Http\Controllers\DashboardAdminController::class, 'unpaid'])->name('db-admin.unpaid');
    Route::get('/db-admin/delivery', [App\Http\Controllers\DashboardAdminController::class, 'delivery'])->name('db-admin.delivery');
    Route::get('/db-admin/history', [App\Http\Controllers\DashboardAdminController::class, 'history'])->name('db-admin.history');

    // dashboard - status
    Route::post('/order/{id}/status', [App\Http\Controllers\OrderController::class, 'status'])->name('order.status');
    Route::put('/showorder/{id}/itemhasbeensent', [App\Http\Controllers\OrderController::class, 'itemhasbeensent'])->name('dashboard.status.itemhasbeensent');

});

// role customer
Route::group(['middleware' => ['auth']], function() {
    // order
    Route::get('/order/{id}/create', [App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
    Route::post('/order/store', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
    Route::post('/order/{id}/status', [App\Http\Controllers\OrderController::class, 'status'])->name('order.status');
    
    // dashboard
    Route::get('/avatar', [App\Http\Controllers\DashboardController::class, 'avatar'])->name('dashboard.avatar');
    Route::put('/updateavatar', [App\Http\Controllers\UserController::class, 'updateavatar'])->name('dashboard.updateavatar');
    Route::delete('/deleteavatar', [App\Http\Controllers\UserController::class, 'destroyavatar'])->name('dashboard.destroyavatar');
    Route::get('/detail', [App\Http\Controllers\DashboardController::class, 'detail'])->name('dashboard.detail');
    Route::get('/changedetail', [App\Http\Controllers\DashboardController::class, 'changedetail'])->name('dashboard.changedetail');
    Route::put('/updatedetail', [App\Http\Controllers\UserController::class, 'updatedetail'])->name('dashboard.updatedetail');
    Route::get('/changepassword', [App\Http\Controllers\DashboardController::class, 'changepassword'])->name('dashboard.changepassword');
    Route::put('/updatepassword', [App\Http\Controllers\UserController::class, 'updatepassword'])->name('dashboard.updatepassword');
    Route::get('/unpaid', [App\Http\Controllers\DashboardController::class, 'unpaid'])->name('dashboard.unpaid');
    Route::get('/delivery', [App\Http\Controllers\DashboardController::class, 'delivery'])->name('dashboard.delivery');
    Route::get('/history', [App\Http\Controllers\DashboardController::class, 'history'])->name('dashboard.history');
    Route::get('/{id}/showorder', [App\Http\Controllers\DashboardController::class, 'showorder'])->name('dashboard.showorder');
    Route::put('/showorder/{id}/sentproof', [App\Http\Controllers\OrderController::class, 'sentproof'])->name('dashboard.status.sentproof');
    Route::put('/showorder/{id}/arrival', [App\Http\Controllers\OrderController::class, 'arrival'])->name('dashboard.status.arrival');
});

// general
Route::get('/product/{id}/show', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
Route::get('/product', [App\Http\Controllers\LandingPageController::class, 'products'])->name('products');
Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index'])->name('landingpage');
Route::get('/home', [App\Http\Controllers\LandingPageController::class, 'index'])->name('landingpage');
Route::get('/aboutus', [App\Http\Controllers\LandingPageController::class, 'aboutus'])->name('aboutus');
Route::get('/contactus', [App\Http\Controllers\LandingPageController::class, 'contactus'])->name('contactus');




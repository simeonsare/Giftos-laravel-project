<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\MpesaSTKPUSHController;
use App\Http\Controllers\PaymentController;


Route::post('/buy/{id}', [PaymentController::class, 'buy'])
->middleware(['auth', 'verified']); 
Route::post('/p', [PaymentController::class, 'handleCallback']); 


Route::post('/stkPush', [HomeController::class, 'stkPush'])
->middleware(['auth', 'verified']); 








route::get('/',[HomeController::class,'home']);
Route::get('/slider', [App\Http\Controllers\HomeController::class, 'slider'])->name('slider');


route::get('/dashboard',[HomeController::class,'login_home'])
->middleware(['auth', 'verified'])->name('dashboard');

route::get('/myorders',[HomeController::class,'myorders'])
->middleware(['auth', 'verified']); 

route::get('/why',[HomeController::class,'why']); 

route::get('/contact',[HomeController::class,'contact']); 

Route::get('/add_cart/{id}', [HomeController::class, 'add_cart'])->middleware('auth');
Route::get('/update-quantity/{id}/{change}', [HomeController::class, 'updateQuantity']);
Route::get('/delete-item/{id}', [HomeController::class, 'deleteItem'])->middleware('auth');


route::get('add_cart/{id}',[HomeController::class,'add_cart'])
->middleware(['auth', 'verified']); 
Route::post('/cart/update_quantity', [HomeController::class, 'updateQuantity'])->name('cart.updateQuantity');


route::get('mycart',[HomeController::class,'mycart'])
->middleware(['auth', 'verified']);

Route::get('/details/{id}', [HomeController::class, 'details'])->name('details')
->middleware(['auth', 'verified']);

Route::get('/buy_details/{id}', [HomeController::class, 'buy_details'])
->middleware(['auth', 'verified']);

route::post('confirm_order',[PaymentController::class,'buy'])
->middleware(['auth', 'verified']);




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




route::get('admin/dashboard', [HomeController::class,'index'])->
    middleware(['auth', 'admin']);

route::get('view_category', [AdminController::class,'view_category'])->
middleware(['auth', 'admin']);

route::post('add_category', [AdminController::class,'add_category'])->
middleware(['auth', 'admin']);

route::get('delete_category/{id}', [AdminController::class,'delete_category'])->
middleware(['auth', 'admin']);

route::get('edit_category/{id}', [AdminController::class,'edit_category'])->
middleware(['auth', 'admin']);

route::post('update_category/{id}', [AdminController::class,'update_category'])->
middleware(['auth', 'admin']);

route::get('add_product', [AdminController::class,'add_product'])->
middleware(['auth', 'admin']);

route::post('upload_product', [AdminController::class,'upload_product'])->
middleware(['auth', 'admin']);


route::get('view_product', [AdminController::class,'view_product'])->
middleware(['auth', 'admin']);

route::get('delete_product/{id}', [AdminController::class,'delete_product'])->
middleware(['auth', 'admin']);


route::get('edit_product/{id}', [AdminController::class,'edit_product'])->
middleware(['auth', 'admin']);

route::post('update_product/{id}', [AdminController::class,'update_product'])->
middleware(['auth', 'admin']);

route::post('product_search', [AdminController::class,'product_search'])->
middleware(['auth', 'admin']);

route::get('view_gallery/{id}', [AdminController::class,'view_galleryid'])->
middleware(['auth', 'admin']);

route::get('view_gallery}', [AdminController::class,'view_gallery'])->
middleware(['auth', 'admin']);


route::get('view_orders', [AdminController::class,'view_orders'])->
middleware(['auth', 'admin']);

route::get('filter_orders/new', [AdminController::class,'filter_new'])->
middleware(['auth', 'admin']);

route::get('filter_orders/confirmed', [AdminController::class,'filter_confirmed'])->
middleware(['auth', 'admin']);

route::get('filter_orders/delivered', [AdminController::class,'filter_delivered'])->
middleware(['auth', 'admin']);


Route::get('/filter_orders', [AdminController::class, 'filter_orders'])->
middleware(['auth', 'admin']);
Route::post('/update_order_status/{id}', [AdminController::class, 'update_order_status'])->
middleware(['auth', 'admin']);

route::get('/user_admin', [AdminController::class,'user_admin'])->
middleware(['auth', 'admin']);

route::get('/admin_user', [AdminController::class,'admin_user'])->
middleware(['auth', 'admin']);

route::get('/make_admin/{id}', [AdminController::class,'make_admin'])->
middleware(['auth', 'admin']);
route::get('/delete_user/{id}', [AdminController::class,'delete_user'])->
middleware(['auth', 'admin']);

route::get('/demote/{id}', [AdminController::class,'demote'])->
middleware(['auth', 'admin']);
route::get('/delete_admin/{id}', [AdminController::class,'delete_user'])->
middleware(['auth', 'admin']);
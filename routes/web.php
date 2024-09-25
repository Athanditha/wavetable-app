<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;

route::get('/home',[HomeController::class,'index']);
// Route to the home page
Route::get('/welcome', [PageController::class, 'welcome']);
Route::get('/login', [PageController::class,
'custlogin'])->name('login');
Route::get('/register', [PageController::class,
'custregister'])->name('register');
Route::get('/', [ItemController::class, 'showOnCustomerHome'])->name('itemsviewer');

Route::get('/admin/items', [HomeController::class, 'items'])->middleware('admin');
//Route::get('/admin/customer', [HomeController::class, 'customer'])->middleware('admin');
Route::get('/admin', [PageController::class, 'admin'])->middleware('admin');

Route::resource('items', ItemController::class)->middleware('admin');
//Route::resource('customer', CustomerController::class)->middleware('admin');




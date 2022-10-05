<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PoController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\PriceController;

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


Route::get('/', [UserController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/productadd', [ProductController::class, 'index']);
Route::get('/productedit/{id}', [ProductController::class, 'edit']);
Route::get('/productdetail/{id}', [ProductController::class, 'view']);
Route::get('/productlist', [ProductController::class, 'list']);
//Route::get('/productdetail', [ProductController::class, 'detail']);
//Route::get('/productadd', [ProductController::class, 'index']);
Route::get('/childproductadd', [ProductController::class, 'child']);
Route::get('/productlistajax', [ProductController::class, 'ajaxcall']);
Route::post('/product/removeimagebyid', [ProductController::class, 'removeimagebyid']);
Route::get('/supplierregister', [SupplierController::class, 'index']);
Route::get('/supplieredit/{id}', [SupplierController::class, 'edit']);
Route::get('/supplierdetail/{id}', [SupplierController::class, 'detail']);
Route::get('/supplierlist', [SupplierController::class, 'list']);
Route::get('/supplierlistajax', [SupplierController::class, 'ajaxcall']);
Route::get('/supplierpo', [SupplierController::class, 'supplierpo']);
Route::get('/dealeradd', [DealerController::class, 'index']);
Route::get('/dealerlist', [DealerController::class, 'list']);
Route::get('/dealerlistajax', [DealerController::class, 'ajaxcall']);

Route::get('/staffadd', [StaffController::class, 'index']);
Route::get('/staffedit/{id}', [StaffController::class, 'edit']);
Route::get('/staffview/{id}', [StaffController::class, 'view']);
Route::post('/staff/removeimagebyid', [StaffController::class, 'removeimagebyid']);
Route::post('/staff/removelabourimagebyid', [StaffController::class, 'removelabourimagebyid']);
Route::get('/stafflist', [StaffController::class, 'list']);
Route::get('/stafflistajax', [StaffController::class, 'ajaxcall']);
Route::post('/save/staff', [StaffController::class, 'save']);
Route::post('/update/staff', [StaffController::class, 'update']);

Route::get('/pocreate', [PoController::class, 'index']);
Route::get('/polist', [PoController::class, 'polist']);
Route::get('/getregionaldata', [RegionController::class, 'getregionaldata']);

Route::get('/dealeredit/{id}', [DealerController::class, 'edit']);
Route::get('/dealerdetail/{id}', [DealerController::class, 'detail']);

Route::get('/pricecreate', [PriceController::class, 'index']);
Route::get('/pricelist', [PriceController::class, 'pricelist']);

Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', [App\Http\Controllers\UserController::class, 'perform'])->name('logout.perform');
 });
  
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/* 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 */
 
Route::post('/savesupplier', [SupplierController::class, 'save']);
Route::post('/save/product', [ProductController::class, 'save']);
Route::post('/update/product', [ProductController::class, 'update']);
Route::post('/update/supplier', [SupplierController::class, 'update']);
Route::get('/product/generatecode', [ProductController::class, 'generatecode']);

Route::post('/save/customer', [DealerController::class, 'save']);
Route::post('/update/customer', [DealerController::class, 'update']);
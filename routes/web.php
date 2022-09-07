<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DealerController;


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
Route::get('/productlist', [ProductController::class, 'list']);
Route::get('/productdetail', [ProductController::class, 'detail']);
Route::get('/productadd', [ProductController::class, 'index']);
Route::get('/productlistajax', [ProductController::class, 'ajaxcall']);
Route::get('/supplierregister', [SupplierController::class, 'index']);
Route::get('/supplierlist', [SupplierController::class, 'list']);
Route::get('/supplierlistajax', [SupplierController::class, 'ajaxcall']);
Route::get('/dealeradd', [DealerController::class, 'index']);
Route::get('/dealerlist', [DealerController::class, 'list']);
Route::get('/dealerlistajax', [DealerController::class, 'ajaxcall']);




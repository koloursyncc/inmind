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
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\DeliveryController;
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
Route::get('/supplierpolist', [SupplierController::class, 'supplierpolist']);
Route::get('/ajaxcallPoList', [SupplierController::class, 'ajaxcallPoList']);
Route::get('/supplierlistajax', [SupplierController::class, 'ajaxcall']);
Route::get('/supplierpo', [SupplierController::class, 'supplierpo']);
Route::post('/supplierpo/save', [SupplierController::class, 'supplierposave']);
Route::post('/supplierpo/update', [SupplierController::class, 'supplierpoupdate']);
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

Route::post('po/updatepobyid', [ProductController::class, 'updatepobyid']);

Route::get('/podetail/{id}', [PoController::class, 'view']);
Route::get('/poedit/{id}', [PoController::class, 'edit']);
Route::post('/po/removeimagebyid', [PoController::class, 'removeimagebyid']);
Route::post('/po/updatestatusbyid', [PoController::class, 'updatestatusbyid']);
Route::post('/save/po', [PoController::class, 'save']);
Route::post('/update/po', [PoController::class, 'update']);

Route::get('/polistajax', [PoController::class, 'ajaxcall']);

Route::get('/polist', [PoController::class, 'polist']);
Route::get('/getregionaldata', [RegionController::class, 'getregionaldata']);

Route::get('/dealeredit/{id}', [DealerController::class, 'edit']);
Route::get('/dealerdetail/{id}', [DealerController::class, 'detail']);

Route::get('/pricecreate', [PriceController::class, 'index']);
Route::get('/pricelistajax', [PriceController::class, 'ajaxcall']);
Route::get('/pricelist', [PriceController::class, 'pricelist']);
Route::get('/priceedit/{id}', [PriceController::class, 'edit']);
Route::get('/price/getproductdetail', [PriceController::class, 'getproductdetail']);
Route::post('/pricesave', [PriceController::class, 'pricesave']);
Route::post('/priceupdate', [PriceController::class, 'priceupdate']);



Route::get('/inventory', [InventoryController::class, 'inventory']);
Route::get('/inventoryin', [InventoryController::class, 'inventoryin']);
Route::get('/inventoryout', [InventoryController::class, 'inventoryout']);
Route::get('/inventorymodify', [InventoryController::class, 'inventorymodify']);

Route::get('/deliverycreate', [DeliveryController::class, 'deliverycreate']);
Route::get('/deliveryreceived', [DeliveryController::class, 'deliveryreceived']);
Route::get('/deliverysearch', [DeliveryController::class, 'deliverysearch']);

/*********************************************************************************
 *                  Warehouse
 *********************************************************************************/
Route::get('/warehousecreate', [WarehouseController::class, 'index']);
Route::post('/warehousecreate', [WarehouseController::class, 'store'])
->name('storeWarehouse');
Route::get('/warehouselist', [WarehouseController::class, 'list']);

Route::get('/warehouselistajax', [WarehouseController::class, 'ajaxcall']);
Route::get('/getaddress', [SupplierController::class, 'getaddress']);
Route::get('/ajax-customers-store-list',[WarehouseController::class, 'ajax_get_stores'])
->name('ajaxGetCustomersStore');
Route::get('/ajax-customers-detail-by-store_id',[WarehouseController::class, 'ajax_get_customers_by_store_id'])
->name('ajaxGetCustomersDetailByStoreId');


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
Route::post('supplier/updatestatusbyid', [SupplierController::class, 'updatestatusbyid']);
Route::post('supplierpo/updatestatuspobyid', [SupplierController::class, 'updatestatuspobyid']);
Route::post('product/updatestatusbyid', [ProductController::class, 'updatestatusbyid']);
Route::post('customer/updatestatusbyid', [DealerController::class, 'updatestatusbyid']);
Route::post('staff/updatestatusbyid', [StaffController::class, 'updatestatusbyid']);
Route::post('/savesupplier', [SupplierController::class, 'save']);
Route::post('/save/product', [ProductController::class, 'save']);
Route::post('/update/product', [ProductController::class, 'update']);
Route::post('/update/supplier', [SupplierController::class, 'update']);
Route::get('/product/generatecode', [ProductController::class, 'generatecode']);
Route::get('/exchangerate', [PriceController::class, 'exchangerate']);
Route::get('/pricecompare', [PriceController::class, 'pricecompare']);
Route::get('/getcustomerproduct', [ProductController::class, 'getcustomerproduct']);
Route::get('/getbyproductid', [ProductController::class, 'getbyproductid']);

Route::get('/supplierpoedit/{id}', [SupplierController::class, 'supplierpoedit']);
Route::get('/supplierpoview/{id}', [SupplierController::class, 'supplierpoview']);

Route::post('/save/customer', [DealerController::class, 'save']);
Route::post('/update/customer', [DealerController::class, 'update']);

Route::get('/passwordreset', [ResetPasswordController::class, 'resetform']);
Route::get('searchcolor', [ProductController::class, 'searchcolor']);
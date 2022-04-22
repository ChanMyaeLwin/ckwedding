<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LocalizationController;
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
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/{username}', [HomeController::class, 'welcomewithusername'])->name('welcomewithusername');

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/make_as_read/{notification_id}/{document_id}', [HomeController::class, 'make_as_read'])->name('home.make_as_read');
    Route::get('/notifications',[HomeController::class, 'notifications'])->name('notification');
    Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

    Route::resource('roles', RoleController::class);
    Route::get('/users/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/users/update_profile', [UserController::class, 'update_profile'])->name('user.update_profile');

    Route::resource('users', UserController::class);

    Route::resource('branches', BranchController::class);
    Route::resource('departments', DepartmentController::class);
    Route::get('/documents/search_result', [DocumentController::class, 'search_result'])->name('document.search_result');
    Route::get('/documents/document_detail_search_result', [DocumentController::class, 'document_detail_search_result'])->name('document.document_detail_search_result');

    Route::get('/products/get_product_by_id/{id}/{branch}', [ProductController::class, 'get_product_by_id'])->name('get_product_by_id');
    Route::get('/products/product_list_by_document', [ProductController::class, 'product_list_by_document'])->name('document.product_list_by_document');
    
    Route::get('/documents/bm_approve', [DocumentController::class, 'bm_approve'])->name('document.bm_approve');
    Route::get('/documents/bm_reject', [DocumentController::class, 'bm_reject'])->name('document.bm_reject');
    Route::get('/documents/bm_supplier_cancel', [DocumentController::class, 'bm_supplier_cancel'])->name('document.bm_supplier_cancel');
    Route::get('/documents/change_to_return', [DocumentController::class, 'change_to_return'])->name('document.change_to_return');
    Route::get('/documents/change_to_previous_status', [DocumentController::class, 'change_to_previous_status'])->name('document.change_to_previous_status');
    
    Route::get('/documents/ch_approve', [DocumentController::class, 'ch_approve'])->name('document.ch_approve');
    Route::get('/documents/ch_reject', [DocumentController::class, 'ch_reject'])->name('document.ch_reject');
    
    Route::get('/documents/mm_approve', [DocumentController::class, 'mm_approve'])->name('document.mm_approve');
    Route::get('/documents/mm_reject', [DocumentController::class, 'mm_reject'])->name('document.mm_reject');
    
    Route::get('/documents/rg_out_complete', [DocumentController::class, 'rg_out_complete'])->name('document.rg_out_complete');
    
    Route::get('/documents/cn_complete', [DocumentController::class, 'cn_complete'])->name('document.cn_complete');
    
    Route::get('/documents/rg_in_complete', [DocumentController::class, 'rg_in_complete'])->name('document.rg_in_complete');
    
    Route::get('/documents/db_complete', [DocumentController::class, 'db_complete'])->name('document.db_complete');
    Route::get('/documents/exchange_deducted', [DocumentController::class, 'exchange_deducted'])->name('document.exchange_deducted');
    
    Route::get('/document_detail_listing', [DocumentController::class, 'document_detail_listing'])->name('document_detail_listing');
    

    Route::get('/documents/download_pdf/{document_id}', [DocumentController::class, 'download_pdf'])->name('document.download_pdf');
    Route::get('/products/attach_file/{product_id}', [ProductController::class, 'view_product_attach_file'])->name('product.view_product_attach_file');
    Route::get('/documents/excel_export/{document_id}', [DocumentController::class, 'excel_export'])->name('document.excel_export');
    Route::get('/documents/document_export/{from_date?}/{to_date?}/{other?}', [DocumentController::class, 'document_export'])->name('document.document_export');
    Route::get('/documents/attach_file/{documnent_id}/{attach_type}', [DocumentController::class, 'view_document_attach_file'])->name('document.view_document_attach_file');
        
    Route::get('/documents/{id}/delete', [DocumentController::class, 'destroy'])->name('destroy');
    Route::resource('documents', DocumentController::class);
    Route::resource('products', ProductController::class);
    Route::resource('suppliers', SupplierController::class);

});
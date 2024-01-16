<?php

use App\Http\Controllers\admin\AffiliateUserController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\InvoiceController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\PartnerController;
use App\Http\Controllers\admin\PermissionManagementController;
use App\Http\Controllers\admin\RoleManagementController;
use App\Http\Controllers\admin\UserManagementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProformaController;
use App\Http\Controllers\admin\ProjectManagerController;
use App\Http\Controllers\admin\RewardManagementeController;
use App\Http\Controllers\admin\SellerController;
use App\Http\Controllers\admin\StoreController;
use App\Models\Invoice;
use App\Models\Proforma;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['admin.subadmin', 'verified'])->group(function () {

    Route::get('/', [HomeController::class, 'index']);

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);

        Route::put('/user-management/update-email/{user}', [UserManagementController::class, 'updateEmail'])->name('users.updateEmail');

        Route::put('/user-management/update-password/{user}', [UserManagementController::class, 'updatePassword'])->name('users.updatePassword');

        Route::post('/user-management/update-status/{user}', [UserManagementController::class, 'updateStatus'])->name('users.update_status');

        Route::put('/user-management/update-role/{user}/', [UserManagementController::class, 'updateUserRole'])->name('users.updateRole');
        /** Role  */
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::get('/user-management/role-user/{role}', [RoleManagementController::class,'getRoleUsers'])->name('roles.roleUser');
        /** Permission  */
        Route::resource('/user-management/permissions', PermissionManagementController::class);
        /**affiliate user */
        Route::resource('/user-management/affiliate', AffiliateUserController::class);
        /**orders */
        Route::resource('/user-management/order', OrderController::class);

        /** start:: customer routes */
        Route::resource('/user-management/customer', CustomerController::class);
        Route::get('/user-management/customer/{customer}/orders', [OrderController::class, 'getCustomerOrder'])->name('customer.orders');
        Route::get('/user-management/customer/{customer}/reward-earn', [RewardManagementeController::class, 'getRewardPointHistory'])->name('customer.reward-earn');
        Route::get('/user-management/customer/{customer}/redeem-reward', [RewardManagementeController::class, 'getRedeemedRewardHistory'])->name('customer.redeemed-reward');
        /** end:: customer routes */

        /** start:: Partner routes */
        Route::resource('/user-management/partner', PartnerController::class);
        Route::get('/user-management/partner/{partner}/project-manager', [ProjectManagerController::class, 'getProjectManager'])->name('project-manager');
        Route::get('/user-management/partner/{partner}/seller', [SellerController::class, 'getSellers'])->name('seller-list');
        Route::get('/user-management/partner/{partner}/store', [StoreController::class, 'getStores'])->name('store-list');
        Route::get('/user-management/partner/{partner}/coupon', [CouponController::class, 'getPartnerCoupons'])->name('coupon-list');
        Route::get('/user-management/partner/{partner}/invoice', [InvoiceController::class, 'getInvoices'])->name('invoice-list');
        Route::get('/user-management/partner/{partner}/proforma', [ProformaController::class, 'getProformas'])->name('proforma-list');
        /** end:: Partner routes */
    });

    Route::name('store-management.')->group(function () {
        Route::resource('/store-management/store', StoreController::class);
        Route::get('/store-management/store/{store}/product', [ProductController::class, 'getStoreProducts'])->name('store.products');
        Route::get('/store-management/store/{store}/coupon', [CouponController::class, 'getStoreCoupons'])->name('coupon-list');
        Route::get('/store-management/store/{store}/project-manager', [ProjectManagerController::class, 'getStoreProjectManager'])->name('project-manager');
        Route::get('/store-management/store/{store}/seller', [SellerController::class, 'getStoreSellers'])->name('seller-list');
    });

    Route::name('product-management.')->group(function () {
        Route::resource('/product-management/product', ProductController::class);
        Route::get('/product-management/partner/{partner}/product', [ProductController::class, 'getPartnerProducts'])->name('partner.products');
        Route::resource('/product-management/category', CategoriesController::class);
    });
});

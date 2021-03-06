<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CmsPageController;
use App\Http\Controllers\Admin\ContactUsController as AdminContactUsController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\ExchangeOrderController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NewslatterSubscriberController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\OrderInvoiceController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\Admin\ReturnOrderController as AdminReturnOrderController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ShippingChargeController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        // ======================================================
        // BackFrontEnd :
        // ======================================================
        Route::prefix('/admin/')->as('admin.')->group(function () {
            Route::group(['middleware' => 'admin'], function () {
                Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

                // *************************************************************
                // *************************************************************
                // *************************************************************
                // Admins :
                Route::get('admins/index',                                      [AdminController::class, 'index'])->name('admins.index');
                Route::get('admins/create',                                     [AdminController::class, 'create'])->name('admins.create');
                Route::post('admins/store',                                     [AdminController::class, 'store'])->name('admins.store');
                Route::get('admins/edit/{admin}',                               [AdminController::class, 'edit'])->name('admins.edit');
                Route::post('admins/update/{admin}',                            [AdminController::class, 'update'])->name('admins.update');
                Route::get('delete-admin/{id}',                                 [AdminController::class, 'destroy'])->name('admins.destroy');
                Route::post('update-admin-status',                              [AdminController::class, 'updateStatus']);


                Route::get('settings',                                          [AdminSettingController::class, 'settings'])->name('settings');
                Route::post('check-current-password',                           [AdminSettingController::class, 'checkCurrentPassword'])->name('check.currnet.pwd');
                Route::post('update-password',                                  [AdminSettingController::class, 'updatePassword'])->name('update.password');
                Route::match(['get', 'post'], 'update-detail',                  [AdminSettingController::class, 'updateDetails'])->name('update.details');



                // *************************************************************
                // *************************************************************
                // *************************************************************
                // Settings :
                Route::get('website-settings/index',                            [SettingController::class, 'index'])->name('settings.index');
                Route::post('website-settings/update/{setting}',                [SettingController::class, 'update'])->name('settings.update');



                // *************************************************************
                // *************************************************************
                // *************************************************************
                // Users :
                Route::get('users/index',                                       [AdminUserController::class, 'index'])->name('users.index');
                Route::post('update-user-status',                               [AdminUserController::class, 'updateStatus']);
                Route::get('users/export',                                      [AdminUserController::class, 'export'])->name('users.export');



                // *************************************************************
                // *************************************************************
                // *************************************************************
                // Sections :
                Route::get('sections/index',                                    [SectionController::class, 'index'])->name('sections.index');
                Route::post('sections/add',                                     [SectionController::class, 'store'])->name('sections.store');
                Route::post('sections/update/{section}',                        [SectionController::class, 'update'])->name('sections.update');
                Route::post('update-section-status',                            [SectionController::class, 'updateStatus']);



                // *************************************************************
                // *************************************************************
                // *************************************************************
                // Banner :
                Route::get('banners/index',                                     [BannerController::class, 'index'])->name('banners.index');
                Route::post('banners/add',                                      [BannerController::class, 'store'])->name('banners.store');
                Route::post('banners/update/{banner}',                          [BannerController::class, 'update'])->name('banners.update');
                Route::post('update-banner-status',                             [BannerController::class, 'updateBannerStatus']);
                Route::get('delete-banner/{id}',                                [BannerController::class, 'destroy'])->name('banners.destroy');



                // *************************************************************
                // *************************************************************
                // *************************************************************
                // Categories :
                Route::get('categories/index',                                  [CategoryController::class, 'index'])->name('categories.index');
                Route::get('create-category',                                   [CategoryController::class, 'create'])->name('categories.create');
                Route::post('store-category',                                   [CategoryController::class, 'store'])->name('categories.store');
                Route::get('edit-category/{category}',                          [CategoryController::class, 'edit'])->name('categories.edit');
                Route::post('update-category/{category}',                       [CategoryController::class, 'update'])->name('categories.update');
                Route::get('delete-category/{category}',                        [CategoryController::class, 'destroy'])->name('categories.destroy');
                Route::post('update-category-status',                           [CategoryController::class, 'updateStatus']);
                Route::post('append-categories-level',                          [CategoryController::class, 'appendCategoriesLevel']);



                // *************************************************************
                // *************************************************************
                // *************************************************************
                //?Products :
                Route::get('products/index',                                    [ProductController::class, 'index'])->name('products.index');
                Route::get('create-product',                                    [ProductController::class, 'create'])->name('products.create');
                Route::post('store-product',                                    [ProductController::class, 'store'])->name('products.store');
                Route::get('edit-product/{product}',                            [ProductController::class, 'edit'])->name('products.edit');
                Route::post('update-product/{product}',                         [ProductController::class, 'update'])->name('products.update');
                Route::get('delete-product/{product}',                          [ProductController::class, 'destroy'])->name('products.destroy');
                Route::post('update-product-status',                            [ProductController::class, 'updateStatus']);

                //? Product Attributes :
                Route::get('create-attributes/{product}',                       [ProductAttributeController::class, 'create'])->name('product.attributes.create');
                Route::post('store-attributes',                                 [ProductAttributeController::class, 'store'])->name('product.attributes.store');
                Route::post('update-attributes/{product}',                      [ProductAttributeController::class, 'update'])->name('product.attributes.update');
                Route::post('update-attribute-status',                          [ProductAttributeController::class, 'updateAttributeStatus']);
                Route::get('delete-attribute/{id}',                             [ProductAttributeController::class, 'destroy'])->name('product.attributes.destroy');

                //? Product Images :
                Route::get('create-images/{product}',                           [ProductImageController::class, 'create'])->name('product.images.create');
                Route::post('store-images',                                     [ProductImageController::class, 'store'])->name('product.images.store');
                Route::get('delete-image/{id}',                                 [ProductImageController::class, 'destroy'])->name('product.images.destroy');
                Route::get('download-image/{id}',                               [ProductImageController::class, 'download'])->name('product.images.download');
                Route::get('delete-product-attachments/{id}',                   [ProductImageController::class, 'destroyAllProductAttachments'])->name('product.images.all.destroy');



                // *************************************************************
                // *************************************************************
                // *************************************************************
                // Ratings :
                Route::get('ratings/index',                                     [RatingController::class, 'index'])->name('ratings.index');
                Route::get('delete-rating/{id}',                                [RatingController::class, 'destroy'])->name('ratings.destroy');
                Route::post('update-rating-status',                             [RatingController::class, 'updateStatus']);



                // *************************************************************
                // *************************************************************
                // *************************************************************
                // Brands :
                Route::get('brands/index',                                      [BrandController::class, 'index'])->name('brands.index');
                Route::post('brands/store',                                     [BrandController::class, 'store'])->name('brands.store');
                Route::post('brands/update/{brand}',                            [BrandController::class, 'update'])->name('brands.update');
                Route::post('update-brand-status',                              [BrandController::class, 'updateStatus']);



                // *************************************************************
                // *************************************************************
                // *************************************************************
                // Coupons :
                Route::get('coupons/index',                                     [CouponController::class, 'index'])->name('coupons.index');
                Route::get('create-coupon',                                     [CouponController::class, 'create'])->name('coupons.create');
                Route::post('store-coupon',                                     [CouponController::class, 'store'])->name('coupons.store');
                Route::post('update-coupon-status',                             [CouponController::class, 'updateStatus']);
                Route::get('edit-coupon/{coupon}',                              [CouponController::class, 'edit'])->name('coupons.edit');
                Route::post('update-coupon/{coupon}',                           [CouponController::class, 'update'])->name('coupons.update');
                Route::get('delete-coupon/{coupon}',                            [CouponController::class, 'destroy'])->name('coupons.destroy');



                // *************************************************************
                // *************************************************************
                // *************************************************************
                // Orders :
                Route::get('orders/index',                                      [AdminOrderController::class, 'index'])->name('orders.index');
                Route::get('orders/show/{order}',                               [AdminOrderController::class, 'show'])->name('orders.show');
                Route::post('orders/update',                                    [AdminOrderController::class, 'update'])->name('orders.update');
                Route::get('orders/export',                                     [AdminOrderController::class, 'export'])->name('orders.export');

                Route::get('order-invoice/{order}',                             [OrderInvoiceController::class, 'show'])->name('orders.invoice.show');
                Route::get('order-invoice-pdf/{order}',                         [OrderInvoiceController::class, 'printPdfInvoice'])->name('orders.invoice.pdf');

                Route::get('return-orders/index',                               [AdminReturnOrderController::class, 'index'])->name('return.orders.index');
                Route::post('return-orders/update/{returnOrder}',               [AdminReturnOrderController::class, 'update'])->name('return.orders.update');

                Route::get('exchange-orders/index',                             [ExchangeOrderController::class, 'index'])->name('exchange.orders.index');
                Route::post('exchange-orders/update/{exchangeOrder}',           [ExchangeOrderController::class, 'update'])->name('exchange.orders.update');



                // *************************************************************
                // *************************************************************
                // *************************************************************
                // Shipping Charges :
                Route::get('shipping-charges/index',                            [ShippingChargeController::class, 'index'])->name('shipping-charges.index');
                Route::post('shipping-charges/update/{shippingCharge}',         [ShippingChargeController::class, 'update'])->name('shipping-charges.update');
                Route::post('update-shipping-charges-status',                   [ShippingChargeController::class, 'updateStatus']);



                // *************************************************************
                // *************************************************************
                // *************************************************************
                // Cms Pages :
                Route::get('cms-pages/index',                                   [CmsPageController::class, 'index'])->name('cms-pages.index');
                Route::post('update-cms-pages-status',                          [CmsPageController::class, 'updateStatus']);
                Route::post('cms-pages/add',                                    [CmsPageController::class, 'store'])->name('cms-pages.store');
                Route::get('delete-cms-pages/{id}',                             [CmsPageController::class, 'destroy'])->name('cms-pages.destroy');



                // *************************************************************
                // *************************************************************
                // *************************************************************
                // Contact Us :
                Route::get('contact-us/index',                                  [AdminContactUsController::class, 'index'])->name('contact-us.index');
                Route::post('update-message-status',                            [AdminContactUsController::class, 'updateStatus']);
                Route::get('delete-message/{id}',                               [AdminContactUsController::class, 'destroy'])->name('cms-pages.destroy');



                // *************************************************************
                // *************************************************************
                // *************************************************************
                // Subscriptions :
                Route::get('newslatter-subscribers/index',                      [NewslatterSubscriberController::class, 'index'])->name('newslatter-subscribers.index');
                Route::get('delete-subscriber/{id}',                            [NewslatterSubscriberController::class, 'destroy'])->name('newslatter-subscribers.destroy');
                Route::post('update-subscriber-status',                         [NewslatterSubscriberController::class, 'updateStatus']);
                Route::get('newslatter-subscribers/export',                     [NewslatterSubscriberController::class, 'export'])->name('newslatter-subscribers.export');



                // *************************************************************
                // *************************************************************
                // *************************************************************
                // Currencies Us :
                Route::get('currencies/index',                                  [CurrencyController::class, 'index'])->name('currencies.index');
                Route::post('currencies/store',                                 [CurrencyController::class, 'store'])->name('currencies.store');
                Route::post('currencies/update/{currency}',                     [CurrencyController::class, 'update'])->name('currencies.update');
                Route::get('delete-currency/{id}',                              [CurrencyController::class, 'destroy'])->name('currencies.destroy');
                Route::post('update-currency-status',                           [CurrencyController::class, 'updateStatus']);




                Route::get('logout',                                            [AdminController::class, 'logout'])->name('logout');
            });
            Route::match(['get', 'post'], '/login',                             [AdminController::class, 'login'])->name('login');
            Route::get('password/forget',                                       [AdminController::class, 'resetPasswordForm'])->name('forget.password.form');
            Route::post('password/send',                                        [AdminController::class, 'sendResetLink'])->name('forget.password.link');
            Route::get('password/reset/{token}',                                [AdminController::class, 'showResetForm'])->name('reset.password.form');
            Route::post('password/reset',                                       [AdminController::class, 'resetUserPassword'])->name('reset.password');
        });
    }
);
<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SectionController;
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

Auth::routes();

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::prefix('/admin')->group(function () {

            Route::group(['middleware' => 'admin'], function () {

                Route::get('/dashboard', function () {
                    return view('index');
                })->name('admin.dashboard');
                Route::get('settings',                                          [AdminSettingController::class, 'settings'])->name('admin.settings');
                Route::post('check-current-password',                           [AdminSettingController::class, 'checkCurrentPassword'])->name('admin.check.currnet.pwd');
                Route::post('update-password',                                  [AdminSettingController::class, 'updatePassword'])->name('admin.update.password');
                Route::match(['get', 'post'], 'update-detail',                  [AdminSettingController::class, 'updateDetails'])->name('admin.update.details');


                // **************************************************************
                // **************************************************************
                // **************************************************************
                // Sections :
                Route::get('sections/index',                                    [SectionController::class, 'index'])->name('admin.sections.index');
                Route::post('update-section-status',                            [SectionController::class, 'updateSectionStatus']);
                Route::post('sections/add',                                     [SectionController::class, 'store'])->name('admin.sections.store');
                Route::post('sections/update/{section}',                        [SectionController::class, 'update'])->name('admin.sections.update');


                // **************************************************************
                // **************************************************************
                // **************************************************************
                // Categories :
                Route::get('categories/index',                                  [CategoryController::class, 'index'])->name('admin.categories.index');
                Route::get('create-category',                                   [CategoryController::class, 'create'])->name('admin.categories.create');
                Route::post('store-category',                                   [CategoryController::class, 'store'])->name('admin.categories.store');
                Route::get('edit-category/{category}',                          [CategoryController::class, 'edit'])->name('admin.categories.edit');
                Route::post('update-category/{category}',                       [CategoryController::class, 'update'])->name('admin.categories.update');
                Route::get('delete-category/{category}',                        [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
                Route::post('update-category-status',                           [CategoryController::class, 'updateCategoryStatus']);
                Route::post('append-categories-level',                          [CategoryController::class, 'appendCategoriesLevel']);


                // **************************************************************
                // **************************************************************
                // **************************************************************
                //Products :
                // Route::resource('products',                                     ProductController::class);
                Route::get('products/index',                                    [ProductController::class, 'index'])->name('admin.products.index');
                Route::get('create-product',                                    [ProductController::class, 'create'])->name('admin.products.create');
                Route::post('store-product',                                    [ProductController::class, 'store'])->name('admin.products.store');
                Route::get('edit-product/{product}',                            [ProductController::class, 'edit'])->name('admin.products.edit');
                Route::post('update-product/{product}',                         [ProductController::class, 'update'])->name('admin.products.update');
                Route::get('delete-product/{product}',                          [ProductController::class, 'destroy'])->name('admin.products.destroy');
                Route::post('update-product-status',                            [ProductController::class, 'updateProductStatus']);

                // Product Attributes :
                Route::get('create-attributes/{product}',                       [ProductAttributeController::class, 'create'])->name('admin.attributes.create');
                Route::post('store-attributes',                                 [ProductAttributeController::class, 'store'])->name('admin.attributes.store');


                Route::get('logout',                                            [AdminController::class, 'logout'])->name('admin.logout');
            });
            Route::match(['get', 'post'], '/login',                             [AdminController::class, 'login'])->name('admin.login');
        });
        Route::get('/{page}',                                       [AdminController::class, 'index']);
    }
);
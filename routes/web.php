<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\FrontEnd\HomeController;
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
        Route::prefix('/admin')->as('admin.')->group(function () {

            Route::group(['middleware' => 'admin'], function () {

                Route::get('/dashboard', function () {
                    return view('index');
                })->name('dashboard');
                Route::get('settings',                                          [AdminSettingController::class, 'settings'])->name('settings');
                Route::post('check-current-password',                           [AdminSettingController::class, 'checkCurrentPassword'])->name('check.currnet.pwd');
                Route::post('update-password',                                  [AdminSettingController::class, 'updatePassword'])->name('update.password');
                Route::match(['get', 'post'], 'update-detail',                  [AdminSettingController::class, 'updateDetails'])->name('update.details');


                // **************************************************************
                // **************************************************************
                // **************************************************************
                // Sections :
                Route::get('sections/index',                                    [SectionController::class, 'index'])->name('sections.index');
                Route::post('sections/add',                                     [SectionController::class, 'store'])->name('sections.store');
                Route::post('sections/update/{section}',                        [SectionController::class, 'update'])->name('sections.update');
                Route::post('update-section-status',                            [SectionController::class, 'updateSectionStatus']);


                // **************************************************************
                // **************************************************************
                // **************************************************************
                // Categories :
                Route::get('categories/index',                                  [CategoryController::class, 'index'])->name('categories.index');
                Route::get('create-category',                                   [CategoryController::class, 'create'])->name('categories.create');
                Route::post('store-category',                                   [CategoryController::class, 'store'])->name('categories.store');
                Route::get('edit-category/{category}',                          [CategoryController::class, 'edit'])->name('categories.edit');
                Route::post('update-category/{category}',                       [CategoryController::class, 'update'])->name('categories.update');
                Route::get('delete-category/{category}',                        [CategoryController::class, 'destroy'])->name('categories.destroy');
                Route::post('update-category-status',                           [CategoryController::class, 'updateCategoryStatus']);
                Route::post('append-categories-level',                          [CategoryController::class, 'appendCategoriesLevel']);


                // **************************************************************
                // **************************************************************
                // **************************************************************
                //Products :
                // Route::resource('products',                                     ProductController::class);
                Route::get('products/index',                                    [ProductController::class, 'index'])->name('products.index');
                Route::get('create-product',                                    [ProductController::class, 'create'])->name('products.create');
                Route::post('store-product',                                    [ProductController::class, 'store'])->name('products.store');
                Route::get('edit-product/{product}',                            [ProductController::class, 'edit'])->name('products.edit');
                Route::post('update-product/{product}',                         [ProductController::class, 'update'])->name('products.update');
                Route::get('delete-product/{product}',                          [ProductController::class, 'destroy'])->name('products.destroy');
                Route::post('update-product-status',                            [ProductController::class, 'updateProductStatus']);


                // Product Attributes :
                Route::get('create-attributes/{product}',                       [ProductAttributeController::class, 'create'])->name('product.attributes.create');
                Route::post('store-attributes',                                 [ProductAttributeController::class, 'store'])->name('product.attributes.store');
                Route::post('update-attributes/{product}',                      [ProductAttributeController::class, 'update'])->name('product.attributes.update');
                Route::post('update-attribute-status',                          [ProductAttributeController::class, 'updateAttributeStatus']);
                Route::get('delete-attribute/{id}',                             [ProductAttributeController::class, 'destroy'])->name('product.attributes.destroy');

                // Product Images :
                Route::get('create-images/{product}',                           [ProductImageController::class, 'create'])->name('product.images.create');
                Route::post('store-images',                                     [ProductImageController::class, 'store'])->name('product.images.store');
                Route::get('delete-image/{id}',                                 [ProductImageController::class, 'destroy'])->name('product.images.destroy');
                Route::get('download-image/{id}',                               [ProductImageController::class, 'download'])->name('product.images.download');
                Route::get('delete-product-attachments/{id}',                   [ProductImageController::class, 'destroyAllProductAttachments'])->name('product.images.all.destroy');


                // **************************************************************
                // **************************************************************
                // **************************************************************
                // Brands :
                Route::get('brands/index',                                      [BrandController::class, 'index'])->name('brands.index');
                Route::post('brands/add',                                       [BrandController::class, 'store'])->name('brands.store');
                Route::post('brands/update/{brand}',                            [BrandController::class, 'update'])->name('brands.update');
                Route::post('update-brand-status',                              [BrandController::class, 'updateBrandStatus']);



                Route::get('logout',                                            [AdminController::class, 'logout'])->name('logout');
            });
            Route::match(['get', 'post'], '/login',                             [AdminController::class, 'login'])->name('login');
        });


        Route::group(['prefix' => '/'], function () {
            Route::get('index', [HomeController::class, 'index']);
        });
        Route::get('/{page}',                                       [AdminController::class, 'index']);
    }
);
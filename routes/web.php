<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\CategoryController;
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

                Route::get('settings',                              [AdminSettingController::class, 'settings'])->name('admin.settings');

                Route::post('check-current-password',               [AdminSettingController::class, 'checkCurrentPassword'])->name('admin.check.currnet.pwd');

                Route::post('update-password',                      [AdminSettingController::class, 'updatePassword'])->name('admin.update.password');

                Route::match(['get', 'post'], 'update-detail',      [AdminSettingController::class, 'updateDetails'])->name('admin.update.details');

                // Sections :
                Route::get('sections/index',                        [SectionController::class, 'index'])->name('admin.sections.index');

                Route::post('update-section-status',                [SectionController::class, 'updateSectionStatus']);

                Route::post('sections/add',                         [SectionController::class, 'store'])->name('admin.sections.store');

                Route::post('sections/update/{section}',            [SectionController::class, 'update'])->name('admin.sections.update');


                // Categories :
                Route::get('categories/index',                      [CategoryController::class, 'index'])->name('admin.categories.index');

                Route::post('update-category-status',               [CategoryController::class, 'updateCategoryStatus']);


                Route::get('logout',                                [AdminController::class, 'logout'])->name('admin.logout');
            });
            Route::match(['get', 'post'], '/login',                 [AdminController::class, 'login'])->name('admin.login');
        });
        Route::get('/{page}',                                       [AdminController::class, 'index']);
    }
);
